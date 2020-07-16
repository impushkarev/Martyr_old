<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function welcome()
    {
        return view('welcome.welcome');
    }

    public function about()
    {
        return view('static.about');
    }

    public function privacy()
    {
        return view('static.privacy');
    }

    public function careers()
    {
        return view('static.careers');
    }
}
