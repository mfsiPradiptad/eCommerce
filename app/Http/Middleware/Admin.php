<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        if(!((session()->get('user')=='admin') && (session()->get('role')=='1'))){
            return redirect('login');

        }
        return $next($request);
    }
}
