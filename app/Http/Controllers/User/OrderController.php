<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\CouponUsage;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Razorpayment;

class OrderController extends Controller
{
    //

    public function addToCart(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'dish_id' => 'required|integer',
            'ingredients' => 'required|array',
            'total_amount' => 'required|numeric',
        ]);

        $user_id = Auth::guard('user')->user()->id;

        // Check if the cart already has the same dish with the same ingredients
        $cart = Order::where('user_id', $user_id)
            ->where('dish_id', $validatedData['dish_id'])
            ->where('ingredients', json_encode($validatedData['ingredients']))  // Compare based on ingredients
            ->where('status', 'Cart')
            ->first();

        if ($cart) {
            // If the cart item already exists, update it
            $cart->total_amount = $validatedData['total_amount'];  // Update total_amount if necessary
            $cart->updated_at = now();
            $cart->save();
        } else {
            // If no cart item exists, create a new one
            Order::create([
                'user_id' => $user_id,
                'dish_id' => $validatedData['dish_id'],
                'ingredients' => json_encode($validatedData['ingredients']),
                'total_amount' => $validatedData['total_amount'],
                'status' => 'Cart',
            ]);
        }

        // Recalculate the cart total after adding the new dish
        $cartItems = Order::where('user_id', $user_id)
            ->where('status', 'Cart')
            ->get();

        $cartTotal = $cartItems->sum('total_amount');  // Calculate the new cart total

        // Check if a coupon discount is applied and recalculate the new total
        $couponDiscount = session('coupon_discount', 0);
        if ($couponDiscount > 0) {
            // Apply the coupon discount to the new total
            $newTotal = $cartTotal - $couponDiscount;
            session(['new_total' => $newTotal]);  // Update the session with the new total
        } else {
            // If no coupon is applied, just store the new total
            session(['new_total' => $cartTotal]);
        }

        return redirect()->route('user.cart')->with('success', 'Ingredients added to cart!');
    }



    public function viewCart()
    {
        $user = Auth::guard('user')->user();
        $user_id = $user->id;

        $cartItems = Order::where('user_id', $user_id)
            ->where('status', 'Cart')
            ->with('dishes')
            ->get();

        $cartTotal = $cartItems->sum('total_amount');
        $discountTotal = $cartItems->sum('discount_amount');
        $finalTotal = $cartTotal - $discountTotal;

        $addresses = UserAddress::where('user_id', $user_id)->get();

        // Fetch used and unused coupons logic remains the same
        $usedCouponIds = CouponUsage::where('user_id', $user_id)->pluck('coupon_id')->toArray();
        $allCoupons = Coupon::where('active', true)
            ->whereDate('expiry_date', '>=', now())
            ->where(function ($query) use ($cartTotal) {
                $query->whereNull('minimum_order_value')
                    ->orWhere('minimum_order_value', '<=', $cartTotal);
            })
            ->get();
        $usedCoupons = $allCoupons->whereIn('id', $usedCouponIds);
        $unusedCoupons = $allCoupons->whereNotIn('id', $usedCouponIds);

        return view('user.cart', [
            'cartItems' => $cartItems,
            'addresses' => $addresses,
            'usedCoupons' => $usedCoupons,
            'unusedCoupons' => $unusedCoupons,
            'cartTotal' => $cartTotal,
            'discountTotal' => $discountTotal,
            'finalTotal' => $finalTotal,
        ]);
    }


    public function order_confirmation()
    {
        return view('user.order-confirmation');
    }










}
