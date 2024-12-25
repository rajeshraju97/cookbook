<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;
use App\Models\UserAddress;


class UserController extends Controller
{

    public function signin()
    {
        return view("auth.user_register");
    }

    public function register(Request $request)
    {

        $request->validate(
            [
                'name' => 'required|max:256|string',
                'username' => 'required|max:256|string|Unique:users,username',
                'email' => 'required|max:256|string|Unique:users',
                'mobile' => 'required|max:10|Unique:users',
                'password' => 'required|string|min:8|confirmed',
            ]

        );
        $user = new User();
        $user->full_name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->password = bcrypt($request->password);
        $user->save();

        // Log the user in
        Auth::guard('user')->login($user);

        return redirect()->route('welcome')->with('success', 'User registered and logged in successfully');
    }
    //
    public function showLoginForm()
    {
        return view('auth.user_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (
            Auth::guard('user')->attempt([
                'email' => $request->email,
                'password' => $request->password,
            ], $request->remember)
        ) {
            return redirect()->route('welcome')->with('success', 'Login successful!');
        }

        return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }


    public function logout(Request $request)
    {
        Auth::guard('user')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('user.login');
    }

    public function addAddress(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:50',
            'address_line_1' => 'required|string',
            'city' => 'required|string',
            'pincode' => 'required|numeric',
        ]);

        $user_id = Auth::guard('user')->user()->id;

        UserAddress::create([
            'user_id' => $user_id,
            'label' => $request->input('label'),
            'address_line_1' => $request->input('address_line_1'),
            'address_line_2' => $request->input('address_line_2'),
            'city' => $request->input('city'),
            'pincode' => $request->input('pincode'),
        ]);

        return back()->with('success', 'Address added successfully!');
    }

    public function editAddress(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:user_addresses,id',
            'address_line_1' => 'required|string',
            'address_line_2' => 'nullable|string',
            'city' => 'required|string',
            'pincode' => 'required|numeric',
        ]);

        $user_id = Auth::guard('user')->id();

        UserAddress::where('id', $request->address_id)
            ->where('user_id', $user_id)
            ->update([
                'address_line_1' => $request->input('address_line_1'),
                'address_line_2' => $request->input('address_line_2'),
                'city' => $request->input('city'),
                'pincode' => $request->input('pincode'),
            ]);

        return back()->with('success', 'Address updated successfully!');
    }



    public function selectAddress(Request $request)
    {
        $request->validate([
            'address_id' => 'required|exists:user_addresses,id',
            'is_default' => 'required|boolean',
        ]);

        $user_id = Auth::guard('user')->id();
        $address = UserAddress::where('id', $request->address_id)
            ->where('user_id', $user_id)
            ->firstOrFail();

        if ($request->is_default) {
            // Set the current address as default and unset all others
            UserAddress::where('user_id', $user_id)->update(['is_default' => false]);
            $address->is_default = true;
            $address->save();
        } else {
            // Remove default status from the current address
            $address->is_default = false;
            $address->save();
        }

        // Save selected address to user's session or orders table
        session(['selected_address' => $address->toArray()]);

        $message = $request->is_default ? 'Address set as default!' : 'Default address removed!';
        return response()->json(['message' => $message]);
    }


}
