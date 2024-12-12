<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        return view('welcome');
    }

    public function signin()
    {
        return view('auth.sign-in');
    }

    public function signup()
    {
        return view('auth.sign-up');
    }

    public function recipe()
    {
        return view('recipe');
    }

    public function search()
    {
        return view('search');
    }

    public function contact()
    {
        return view('contact');
    }
}
