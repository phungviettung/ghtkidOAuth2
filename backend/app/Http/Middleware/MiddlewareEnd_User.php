<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\DB;

use Closure;

class MiddlewareEnd_User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(isset($_COOKIE['session_token']))
        {
            $session = DB::table('sessions')
                            ->where('session_token', $_COOKIE['session_token'])
                            ->first();
            if($session->title == 3)
            {
                return $next($request);  
            }
            else
            {
                return redirect()->route('viphamquyen');
            }
        }
        else
        {
            return redirect()->route('getlogin');
        }
    }
}
