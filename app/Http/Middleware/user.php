<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\URl;
use Closure;
use Previous; 
use Illuminate\Support\Facades\Auth;
class user
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
        $Roleid= $request->session()->get('user.user_type');
       
        
        //exit();
        
        if ($chkLogin==1 && $Roleid==2 ){
            return $next($request);

        }
        if ($chkLogin==0){
            return redirect('/')->with('error','You have not User access. Please login as User');

        }
       // return redirect('/');
        return redirect(URL::previous())->with('error','You have not User access. Please login as user');
    }

}
