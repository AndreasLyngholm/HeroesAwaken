<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function createGroup()
    {
        // TODO: Not implemented
        return redirect('admin');
    }

    public function deleteGroup()
    {
        // TODO: Not implemented
        return redirect('admin');
    }
}
