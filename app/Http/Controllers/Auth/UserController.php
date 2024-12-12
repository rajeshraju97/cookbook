<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;

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
        return redirect()->route('user.login');
    }
}
