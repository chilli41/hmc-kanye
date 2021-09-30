<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::guest() == false){
dd('hre');
            $client = new Client();
            $request = $client->get('https://api.kanye.rest');
            $response = $request->getBody();
            dd($response);
//            return view('welcome');
        }else{
            return view('auth.login');
	}
    }
}
