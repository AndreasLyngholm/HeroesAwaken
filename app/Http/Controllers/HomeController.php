<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function doLogout()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
