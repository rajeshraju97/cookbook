<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\UserAddress;
use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    //

    public function addToCart(Request $request)
    {
        $validatedData = $request->validate([
            'dish_id' => 'required|integer',
            'ingredients' => 'required|array',
            'total_amount' => 'required'
        ]);

        $user_id = Auth::guard('user')->user()->id;
        // Check if a cart already exists for the user and the same dish
        $cart = Order::where('user_id', $user_id)
            ->where('dish_id', $validatedData['dish_id'])
            ->where('status', 'Cart')
            ->first();

        if ($cart) {
            // Update existing cart
            $cart->ingredients = json_encode($validatedData['ingredients']);
            $cart->updated_at = now();
            $cart->save();
        } else {
            // Create a new cart entry
            Order::create([
                'user_id' => $user_id,
                'dish_id' => $validatedData['dish_id'],
                'ingredients' => json_encode($validatedData['ingredients']),
                'total_amount' => $validatedData['total_amount'],
                'status' => 'Cart',

            ]);
        }

        return redirect()->route('user.cart')->with('success', 'Ingredients added to cart!');
    }

    public function viewCart()
    {
        $user_id = Auth::guard('user')->user()->id;

        // Fetch orders with associated dish details
        $cartItems = Order::where('user_id', $user_id)
            ->where('status', 'Cart')
            ->with('dishes') // Assuming you have a relationship with dishes
            ->get();

        // User address
        $addresses = UserAddress::where('user_id', $user_id)->get(); //

        return view('user.cart', [
            'cartItems' => $cartItems,
            'addresses' => $addresses,
        ]);
    }












}
