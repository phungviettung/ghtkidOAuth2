<?php

namespace App\Http\Middleware;

use Closure;

class CheckLoginClient
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
        session_start();
        if (isset($_SESSION['id_title'])) {
            if ($_SESSION['id_title']==2) {
                return $next($request);
            }else{
                return redirect('getlogin');

            }
        }
        
    }
}
