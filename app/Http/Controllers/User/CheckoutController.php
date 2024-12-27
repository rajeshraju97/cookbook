<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use App\Models\Order;
use App\Models\Coupon;
use Illuminate\Support\Facades\Auth;
use App\Notifications\OrderPlacedNotification;
use App\Models\Admin; // Use the Admin model

class CheckoutController extends Controller
{
    //

    public function applyCoupon(Request $request)
    {
        $request->validate(['promo_code' => 'required|string']);

        $user = Auth::guard('user')->user();
        $coupon = Coupon::where('code', $request->promo_code)
            ->where('active', true)
            ->whereDate('expiry_date', '>=', now())
            ->first();

        if (!$coupon) {
            return response()->json(['success' => false, 'message' => 'Invalid or expired coupon.']);
        }

        $alreadyUsed = $user->couponUsages()->where('coupon_id', $coupon->id)->exists();

        if ($alreadyUsed) {
            return response()->json(['success' => false, 'message' => 'You have already used this coupon.']);
        }

        $cartItems = Order::where('user_id', $user->id)
            ->where('status', 'Cart')
            ->get();

        if ($cartItems->isEmpty()) {
            return response()->json(['success' => false, 'message' => 'Your cart is empty.']);
        }

        $cartTotal = $cartItems->sum('total_amount');

        if ($coupon->minimum_order_value && $cartTotal < $coupon->minimum_order_value) {
            return response()->json(['success' => false, 'message' => 'Cart total is less than the minimum required.']);
        }

        $discount = $coupon->type === 'percentage'
            ? ($cartTotal * ($coupon->value / 100))
            : $coupon->value;

        $newTotal = max(0, $cartTotal - $discount);

        // Update orders with coupon and discount
        foreach ($cartItems as $item) {
            \Log::info('Updating Order ID: ' . $item->id, [
                'applied_coupon_id' => $coupon->id,
                'discount_amount' => $discount / $cartItems->count(),
            ]);

            $item->update([
                'applied_coupon_id' => $coupon->id,
                'discount_amount' => $discount / $cartItems->count(),
            ]);
        }



        // Save coupon usage
        $user->couponUsages()->create(['coupon_id' => $coupon->id]);

        return response()->json([
            'success' => true,
            'discount' => $discount,
            'new_total' => $newTotal,
        ]);
    }







    public function checkout(Request $request)
    {
        $request->validate([
            "payment_method" => "required",
            'total_amount' => "required",
        ]);

        $user = Auth::guard('user')->user();
        $orderIds = explode(',', $request->input('order_ids'));
        $paymentMethod = $request->input('payment_method');
        $totalAmountInput = $request->input('total_amount');
        $totalAmount = intval(round((float) str_replace(',', '', $totalAmountInput) * 100));
        $selected_address = session('selected_address') ?? $user->addresses()->where('is_default', 1)->first();

        if (!$selected_address) {
            return redirect()->back()->withErrors('No default address available.');
        }

        if ($paymentMethod === 'COD') {
            // Update orders
            Order::whereIn('id', $orderIds)->where('user_id', $user->id)->update([
                'status' => 'Completed',
                'payment_status' => 'COD',
                'selected_address' => json_encode($selected_address),
            ]);

            // Notify the admin
            $admin = Admin::first(); // Assuming a single admin user
            if ($admin) {
                $orderDetails = [
                    'user_id' => $user->id,
                    'order_ids' => $orderIds,
                    'payment_method' => $paymentMethod,
                    'total_amount' => $totalAmount / 100,
                    'selected_address' => $selected_address,
                    'status' => 'Completed',
                ];
                $admin->notify(new OrderPlacedNotification($orderDetails));
            }

            return redirect('user/order-confirmation')->with('success', 'Order placed successfully with COD.');
        }

        if ($paymentMethod === 'Online') {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $order = $api->order->create([
                'amount' => $totalAmount,
                'currency' => 'INR',
                'payment_capture' => 1,
            ]);

            return view('user.razorpay-payment', [
                'razorpayOrderId' => $order->id,
                'key' => env('RAZORPAY_KEY'),
                'amount' => $totalAmount * 100,
                'currency' => 'INR',
                'orderIds' => $orderIds,
                'mobile' => $user->mobile,
            ]);
        }

        return back()->withErrors('Invalid payment method.');
    }



    public function createPaymentOrder(Request $request)
    {
        $user = Auth::guard('user')->user(); // Get the authenticated user

        // Calculate the total amount to be paid
        $totalAmount = $request->input('amount') * 100; // Amount in paise

        try {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            // Create a new order
            $order = $api->order->create([
                'amount' => $totalAmount,
                'currency' => 'INR',
                'receipt' => 'order_rcpt_' . uniqid(),
                'payment_capture' => 1, // Auto-capture payment
            ]);

            // Return the order details as a response
            return response()->json([
                'success' => true,
                'key' => env('RAZORPAY_KEY'),
                'amount' => $totalAmount,
                'currency' => 'INR',
                'order_id' => $order->id,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }


    public function testRazorpay()
    {
        try {
            $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
            $order = $api->order->create([
                'amount' => 100, // Amount in paise (₹1.00)
                'currency' => 'INR',
                'receipt' => 'test_receipt',
                'payment_capture' => 1,
            ]);

            return response()->json($order);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function updateOrderStatus(Request $request)
    {
        $user = Auth::guard('user')->user();
        $selected_address = session('selected_address') ?? $user->addresses()->where('is_default', 1)->first();

        if (!$selected_address) {
            return response()->json(['success' => false, 'message' => 'No address selected.']);
        }

        $orderIds = explode(',', $request->input('order_ids'));
        $paymentStatus = $request->input('payment_status');
        $paymentId = $request->input('payment_id');
        $amount = $request->input('amount');

        try {
            Order::whereIn('id', $orderIds)
                ->where('user_id', $user->id)
                ->update([
                    'status' => 'Completed',
                    'payment_status' => $paymentStatus,
                    'razorpay_payment_id' => $paymentId ?? null,
                    'selected_address' => json_encode($selected_address),
                ]);

            // Notify the admin
            $admin = Admin::first();
            if ($admin) {
                $orderDetails = [
                    'user_id' => $user->id,
                    'order_ids' => $orderIds,
                    'payment_method' => 'Online',
                    'total_amount' => $amount / 100,
                    'selected_address' => $selected_address,
                    'status' => 'Completed',
                ];
                $admin->notify(new OrderPlacedNotification($orderDetails));
            }

            return response()->json(['success' => true, 'message' => 'Order statuses updated successfully.']);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Order Status Update Error: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }

    }


    public function destroy($id)
    {
        // Find the order item by ID
        $order = Order::findOrFail($id);

        // Ensure the item belongs to the current user (optional for security)
        if ($order->user_id !== auth('user')->user()->id) {
            return redirect()->back()->with('error', 'Unauthorized action.');
        }

        $order->status = "Cancelled";

        // Delete the item
        $order->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Item removed from your cart!');
    }



}


