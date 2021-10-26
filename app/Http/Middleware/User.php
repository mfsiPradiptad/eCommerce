<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class User
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        header('Cache-Control: no-cache, must-revalidate, max-age=0');

        if(!((session()->get('user')=='user') && (session()->get('role')=='7') && (session()->get('userId')!='') && (session()->get('userEmail')!=''))){
            return redirect('login');
        }
        return $next($request);
    }
}
