<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class landing extends Controller
{
    public function index()
    {
        return view('landing');
    }    

    public function create()
    {
        $landing = new landing();
        return view('/landing',compact('landing'));
    }
}
