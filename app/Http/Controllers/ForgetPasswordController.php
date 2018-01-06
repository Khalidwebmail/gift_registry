<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Mail\ResetPassword;

class ForgetPasswordController extends Controller
{
    public function getForgetPassword()
    {
    	return view('public.forget_password');
    }	

    public function resetPassword(Request $request)
    {
        $this->validate($request,[
            'user_email' => 'required',
        ]);

        $data = request()->all();
        unset($data['_token']);
        $all_users=DB::table('mktk_users')->where('user_email',$data['user_email'])->first();
        if(count($all_users)>0){
            $users=DB::table('mktk_users')->where('user_email',$data['user_email'])->where('veryfiy_status',1)->first();
            if(count($users)>0) {
                $data['remember_token'] = md5(md5($request->user_email) . 'b1a652f7');
                //$data['status'] = 'pending';
                DB::table('mktk_users')->where('user_email', $data['user_email'])->update($data);
                // SEND MAIL
                \Mail::send(new ResetPassword());
                //SEND MAIL

                $request->session()->flash('message.content', '<span class="text-success"><strong>Success!</strong> confirmation email sent.</span> ');

                return redirect()->back();
            }else{
                $request->session()->flash('message.content', '<span class="text-danger"><strong>Sorry!</strong> Your account not active yet! please active first.</span> ');
                return redirect()->back();
            }
        }else{
            $request->session()->flash('message.content', '<span class="text-danger"><strong>Sorry!</strong> You are not valid user! please signup first.</span> ');
            //return redirect('admin/register');
        }
    }

    public function getNewpasswordPage($update_password)
    {
        return view('forget_password',compact('update_password'));
    }

    

    public  function updatePassword(Request $request){
        $this->validate($request,[
            'password' => 'required',
        ]);
        $data=$request->all();
        unset($data['_token']);
        unset($data['password_confirmation']);
        $check=DB::table('mktk_users')->where('remember_token',$data['remember_token'])->first();
        if(count($check)>0){
            $slug=$data['remember_token'];
            $data['remember_token']='';
            
            $data['password']=sha1($request->input('password'));
            DB::table('mktk_users')->where(['remember_token'=>$slug])->update($data);
            $request->session()->flash('message.content', '<span class="text-success"><strong>Please login.</strong></span> ');
            return redirect('/signin-page');
        }else{
            $request->session()->flash('message.content', '<span class="text-danger"><strong>Sorry!</strong> ERROR occurred. This link is invalid!</span> ');
            return redirect('/admin/login');
        }
    }
}
