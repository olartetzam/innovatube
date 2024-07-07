<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home extends Controller
{
    function index(){
        return view('dashboard');
    }

    function favoritos(){
        return view('favoritos');
    }
}
