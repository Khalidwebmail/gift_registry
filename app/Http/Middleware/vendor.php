<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\URl;
use Closure;
use Previous; 

use Illuminate\Support\Facades\Auth;

class vendor
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
         
  
        if ($chkLogin==1 && $user_type==3 ){
            return $next($request);

        }
        if ($chkLogin==0){
            return redirect('/')->with('error','You have not Vendor access. Please login as vendor');

        }
       
       return redirect(URL::previous())->with('error','You have not Vendor access. Please login as vendor');
    }
}
