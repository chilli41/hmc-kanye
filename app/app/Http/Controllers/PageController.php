<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        //
        // if(Auth::guest() == false){
        //     // return view('/home');
        // }else{
            // return view('auth.login');
            return redirect()->route('kanye');
        // }
    }
}
