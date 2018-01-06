<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\URl;
use Closure;
use Previous;
use Redirect;

use Illuminate\Support\Facades\Auth;

class RevalidateBackHistory
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
        if ($chkLogin==1 && $user_type==2 ){
            return redirect('/user-profile');

        }elseif($chkLogin==1 && $user_type==3 ){
            return  redirect('/vendor-profile');

        }
        else{
            return $next($request);
//            return redirect(URL::previous());
        }

    }
}
