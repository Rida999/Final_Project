<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    function create(){
        return view('blank.Add');
    }

    function list(){
        return view('blank.List');
    }
}
