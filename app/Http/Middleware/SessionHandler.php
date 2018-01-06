<?php

namespace App\Http\Middleware;
use Redirect;
use Closure;

class SessionHandler
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

        if(!$request->session()->exists('user')){
           return redirect('/');
        }

        return $next($request);
    }
}
