<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\App;

class lang
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
        if (!Session::has('locale'))
         {
           Session::put('locale',App::getLocale());
        }
        App::setLocale(session('locale'));
        
        if (!Session::has('popup')) {
            Session::put('popup',uniqid());
        }

        return $next($request);

    }
}
