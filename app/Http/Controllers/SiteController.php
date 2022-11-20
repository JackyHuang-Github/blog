<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function hello()
    {
        return 'Hello';
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function gallery2()
    {
        return view('gallery2');
    }

}

