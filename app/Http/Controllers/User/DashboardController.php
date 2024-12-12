<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        if (!Auth::guard('user')->check()) {
            return redirect()->route('user.login');
        }

        return view('user.dashboard');
    }

}
