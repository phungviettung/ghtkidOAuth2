<?php

namespace App\Http\Controllers;

use App\App;
use App\Session;
use App\User;
use DateTime;
use DatePeriod;
use DateInterval;
use http\Header;
use Illuminate\Http\Request;
use PhpParser\JsonDecoder;
use Psy\Util\Json;
use Symfony\Component\CssSelector\Parser\Token;
use Illuminate\Support\Facades\DB;

class OAuth2Controller extends Controller
{
    //
    public function access_grant($callback , $euid)
    {
        $token = bin2hex(random_bytes(20));
        $id = bin2hex(random_bytes(5));

        $now = new DateTime();
        //echo($token);
        $ex_time= new DateTime();;
        $ex_time = $ex_time->add(new DateInterval('P1D'));


        //dd($euid);
        DB::table('tokens')->insert([
            'id' => $id ,
            'access_token' => $token,
            'status' => 1 ,
            'created_at' => $now->format('Y-m-d H:i:s') ,
            'updated_at' => $now->format('Y-m-d H:i:s') ,
            'expired_time' => $ex_time ,
            'ideu' => $euid
        ]);

        header("Location: $callback?access_token=$token");


    }
    public function checkLogin()
    {
        //set cookie temp for test
        $cookie_name = "session_token";
        $cookie_value = "12309812312380";
        if(isset($_GET['appid']))
        $app_id=$_GET['appid'];
        if(isset($_GET['callback']))
        $callback_url=$_GET['callback'];


    if(isset($app_id) && isset($callback_url) ){
        $app_check= App::where('id',$app_id)->where('callback_url','=',$callback_url)->exists();
        if($app_check===true) {
            //check if cookie is set then compare to session
            if (isset($_COOKIE[$cookie_name])) {

                $session_token = $_COOKIE[$cookie_name];
                $session_check = Session::where('session_token', $session_token)->where('status', '=', 1)->exists();

                if ($session_check === true) {//session is valid -> return callback url with access token
                    $sess = Session::where('session_token', $session_token)->get()->toJson();
                    $sess = json_decode($sess, true);
                    //dd($sess);
                    $user_id = $sess[0];

                    $this->access_grant($callback_url, $user_id['sessionid']);
                    die();
                } else {//session expired -> login again
                    return view('login', compact('app_id', 'callback_url'));
                    //die();
                }


            } else { // if cookie is not set then return login form
                return view('login', compact('app_id', 'callback_url'));
                //die();
            }
        }else { //invalid app_id
            return view('403');
        }

    }else{//invalid request
        return view('403');
    }




    }
    public function login()
    {

        return view('auth.login',compact('user_list'));
    }

}
