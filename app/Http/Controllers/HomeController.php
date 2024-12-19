<?php

namespace App\Http\Controllers;

use App\Models\Dishes;
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
        return view('recipes');
    }

    public function search()
    {
        return view('search');
    }

    public function contact()
    {
        return view('contact');
    }

    public function recipe_single_page($id)
    {

        $dish = Dishes::find($id);


        return view('recipes_single_page', compact('dish'));
    }
}
