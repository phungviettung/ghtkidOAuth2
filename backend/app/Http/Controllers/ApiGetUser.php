<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Token;
use App\tbUser;
use App\Account;


class ApiGetUser extends Controller
{

    public function getuser()
    {
        $ContentType = 'application/json';
        $ContentLength = 300;
        if ($this->checkToken()) {
            $getIsToken = Token::WHERE('access_token', $this->getToken())->first();
            if ($getIsToken != null) {
                $getUser = tbUser::WHERE('id', $getIsToken->ideu)->first();
                $getAccount = Account::WHERE('id', $getUser->idacc)->first();
                $stt = "True";
                $mess = 'email';
                $data = $getAccount->email;
                $infoResponse = $this->showResponse($stt, $mess, $data);
                return response($infoResponse, 200)
                    ->header('Content-Type', $ContentType)
                    ->header('Content-Length', $ContentLength);
            } else {
                $stt = "False";
                $mess = 'Error';
                $data = 'Fail to get infor of User';
                $infoResponse = $this->showResponse($stt, $mess, $data);
                return response($infoResponse, 200)
                    ->header('Content-Type', $ContentType)
                    ->header('Content-Length', $ContentLength);
            }
        } else {
            $stt = "False";
            $mess = 'Error';
            $data = 'Fail to get infor of User';
            $infoResponse = $this->showResponse($stt, $mess, $data);
            return response($infoResponse, 200)
                ->header('Content-Type', $ContentType)
                ->header('Content-Length', $ContentLength);
        }
    }

    public function getToken()
    {
        if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $HTTP_AUTHORIZATION = $_SERVER['HTTP_AUTHORIZATION'];
            $getToken = explode(' ', $HTTP_AUTHORIZATION);
            $getToken = $getToken[1];
            return $getToken;
        }
    }

    public function getTypeToken()
    {
        if (isset($_SERVER['HTTP_AUTHORIZATION'])) {
            $HTTP_AUTHORIZATION = $_SERVER['HTTP_AUTHORIZATION'];
            $getType = explode(' ', $HTTP_AUTHORIZATION);
            $getType = $getType[0];
            return $getType;
        }
    }

    public function checkRegexToken()
    {
        return $check = preg_match('/[a-zA-Z0-9]+/', $this->getToken());

    }

    public function checkExpiredToken()
    {
        $getIsToken = Token::WHERE('access_token', $this->getToken())->first();

        if ($getIsToken != null) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $date = date('Y-m-d h:i:s', time());
            if ($getIsToken->expired_time > $date) {
                return true;
            } else {
                return false;
            }
        }
    }

    public function checkToken()
    {
        $typeToken = 'bearer';
        if (!$this->checkExpiredToken()) {
            return false;
        }
        if ($this->getTypeToken() != $typeToken) {
            return false;
        }
        if (!$this->checkRegexToken()) {
            return false;
        }
        return True;
    }

    public function showResponse($stt, $mess, $data)
    {
        return $infoResponse = '
        {
            "success" : "' . $stt . '",
            "data": 
                {
                    "' . $mess . '":"' . $data . '"
                }
        }';

    }
}
