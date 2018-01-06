<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\URl;
use Closure;
use Previous; 

use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        $chkLogin= $request->session()->exists('user');
        $user_type= $request->session()->get('user.user_type');
         
  
        if ($chkLogin==1 && $user_type==8 ){
            return $next($request);

        }
       
       return redirect(URL::previous())->with('error','You are not authorized to view this content');
    }
}
