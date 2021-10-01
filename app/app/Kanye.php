<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Kanye extends Model
{
    //
    protected $fillable = [
        'userId', 'userEmail','quoteFirst','quoteSecond', 'quoteThird','quoteFourth','quoteFifth'
    ];

/*********
* Store Kanye quotes
*********/

    public static function storeUpdateKanye($kanye_result_arr){
        $user = Auth::user();
        date_default_timezone_set('Australia/Melbourne');
        $currentTime = date('G:i:s');
        $kanye_arr = $kanye_result_arr;
        $user_checker_bool = self::check_if_user_already_exist_in_db($user->id); //check if user already exist in the kanye table  

        try{
            if($user_checker_bool == true){
            //update
            
            }else{
            //store
                self::storeKanye($user->id,$user->email,$currentTime,$kanye_arr);
            }
        }catch(\PDOException $e){
            dd($e->getMessage());
        }catch(\Exception $e){
            dd($e->getMessage(). 'not sql error');
        }    
    }

/**********
* Check if user already generated quotes previously by counting userid in the table
**********/

    private static function check_if_user_already_exist_in_db($userId){
        $user_count = self::where('userId','=',$userId)->count();
        if($user_count < 1){
            return(false);
        }else{
            return(true);
        }
    }


/********** 
* Store kanyes quotes, current_time and userid
**********/

    private static function storeKanye($userId,$userEmail,$currentTime,$kanyeQuotes){
        try{
            DB::beginTransaction();
            $kanyeStore = new Kanye();
            $kanyeStore->userId = $userId;
            $kanyeStore->userEmail = $userEmail;
            $kanyeStore->quoteFirst = $kanyeQuotes[0];
            $kanyeStore->quoteSecond = $kanyeQuotes[1];
            $kanyeStore->quoteThird = $kanyeQuotes[2];
            $kanyeStore->quoteFourth = $kanyeQuotes[3];
            $kanyeStore->quoteFifth = $kanyeQuotes[4];
//            $kanyeStore->save();
//            DB::commit();
        }catch(\PDOException $e){
            DB::rollback();
            dd($e->getMessage());
        }catch(\Exception $e){
            DB::rollback();
            dd($e->getMessage(). 'not sql error');
        }
    }
}
