<?php

namespace App\Http\Controllers;

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
            try{
                $kanye_result = $this->multiply_kanye(5);
                return view('welcome')->with(compact('kanye_result'));
            }catch(RequestException $e){
                dd($e->getMessage());
            }

        }else{
            return view('auth.login');
	}
    }
    
/***********
* Kanye API Mulitplier
***********/
    private function multiply_kanye($kanye_qoute_multiplier){
        $kanye_multiplier = 0;
        $kanye_result_arr = array();
        try{
            $kanye_multiplier += $kanye_qoute_multiplier;
            for($kanye_ctr = 0; $kanye_ctr < $kanye_multiplier; $kanye_ctr++){
                 array_push($kanye_result_arr, $this->get_kanye());
            }
        }catch(RequestException $e){
            dd($e->getMessage());
        }
        return($kanye_result_arr);
    }    

/***********
* Function to fetch kanye api
***********/

    private function get_kanye(){
        $result_arr_kanye= array();
        try{
            $client = new \GuzzleHttp\Client();

            $request = $client->get('https://api.kanye.rest');

            $response = $request->getBody();

            $result_arr_kanye = json_decode($response,true);
        }catch(RequestException $e){
            dd($e->getMessage());
        }
        return $result_arr_kanye['quote'];
    }


}
