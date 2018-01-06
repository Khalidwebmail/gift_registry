<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
use Carbon\Carbon;
use App\Mail\ResetPassword;
use App\Mail\Registration;

session_start();

class SigninSignupController extends Controller {

    public function signupUser(Request $request) {
        $this->validate($request, [

            'user_email' => 'required',
            'password' => 'required',
            'user_type' => 'required',
        ]);
        $data = request()->all();
        unset($data['_token']);
        unset($data['confirm_password']);
        $data['password'] = sha1($request->password);
        $data['remember_token'] = md5(md5($request->user_email) . 'b1a652f7');
        $data['created_at'] = Carbon::now();
        //dd($data);
        $registration = DB::table('mktk_users')->insertGetId($data);

        /* Email sending part */
        if (!empty($registration)) {
            $user_id['user_id'] = $registration;
            if ($request->user_type == 2) {
                $user_detail = DB::table('mktk_users_detail')->insert($user_id);
                $user_shipping_add = DB::table('mktk_shipping_address')->insert($user_id);
                $user_settings = DB::table('mktk_user_settings')->insert($user_id);
            } else {
                $user_detail = DB::table('mktk_users_vendor')->insert($user_id);
                $vendor_settings=DB::table('mktk_user_settings')->insert($user_id);
            }
            //dd($user_detail);
            if ($user_detail) {
                //$request->session()->flash('message', '<span class="text-success"><strong>Success!</strong> confirmation email sent.</span> ');
                //\Mail::send(new Registration());
                return Redirect::to('/signin-page')->with('success', 'Your Regitration has been successfull. Please login to verify your Account');
            }
        }
    }

    public function loginCheck(Request $request) {
        $this->validate($request, [

            'user_email' => 'required',
            'password' => 'required',
        ]);

        $user_email = $request->user_email;
        $password = sha1($request->password);
        $user_info = DB::table('mktk_users')->where(['user_email' => $user_email, 'password' => $password])->first();
        //dd($user_info);
        if (count($user_info) > 0) {
            $request->session()->put('user.id', $user_info->id);
            $request->session()->put('user.user_name', $user_info->user_name);
            $request->session()->put('user.user_email', $user_info->user_email);
            $request->session()->put('user.user_type', $user_info->user_type);
            $request->session()->put('user.veryfiy_status', $user_info->veryfiy_status);

            $user_info = DB::table('mktk_users')->where(['user_email' => $user_email, 'password' => $password])->first();

            if ($user_info->user_type == 2) {
                $request = session()->flash('user_message', 'Welcome to your profile-user');
                return Redirect::to('/user-profile');
            } if ($user_info->user_type == 3) {
                //dd($user_info);
                $user_info = DB::table('mktk_users_vendor')->where('user_id' ,$user_info->id)->first();
                $request->session()->put('user.first_name', $user_info->first_name);
                $request->session()->put('user.last_name', $user_info->last_name);

                $request->session()->put('user.cell_no', $user_info->cell_no);

                $request->session()->put('user.company_name', $user_info->company_name);

                $request->session()->put('user.compnay_address', $user_info->compnay_address);

                $request->session()->put('user.business_type', $user_info->business_type);

                $request->session()->put('user.intro_text', $user_info->intro_text);


                $request->session()->put('user.image', $user_info->image);

                $request = session()->flash('vendor_message', 'Welcome to your profile-vendor');
                return Redirect::to('/vendor-dashboard');
            }
        }
    }

    /* Logout from profile */

    public function logout(Request $request) {
        $request->session()->pull('user');
        $request->session()->flush('user');
        echo "Lougot funcion";
        return redirect('/');
    }

    /* Active user from email */

    public function activeUser(Request $request, $remember_token) {
        $check = DB::table('mktk_users')->where(['remember_token' => $remember_token, 'veryfiy_status' => 0])->first();
        if (count($check) > 0) {
            $data['remember_token'] = '';
            $data['veryfiy_status'] = 1;
            DB::table('mktk_users')->where(['remember_token' => $remember_token])->update($data);
            return redirect('/signin-page');
        }//else{
        //     $request->session()->flash('message.content', '<span class="text-danger"><strong>Sorry!</strong> ERROR occurred. This link is invalid!</span> ');
        //     return redirect('/admin/login');
        // }
    }

}
