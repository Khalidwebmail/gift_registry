<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;


class AdminSigninController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AdminLoginCheck(Request $request)
    {
        $this->validate($request,[

            'user_email'=>'required',
            'password'=>'required',
        ]);

        $user_email=$request->user_email;
        $password=sha1($request->password);
        $user_info=DB::table('mktk_users')->where(['user_email'=>$user_email,'password'=>$password])->first();
        //dd($user_info);
        if(count($user_info)>0){
            $request->session()->put('user.id',$user_info->id);
            $request->session()->put('user.user_name',$user_info->user_name);
            $request->session()->put('user.user_email',$user_info->user_email);
            $request->session()->put('user.user_type',$user_info->user_type);
            if($user_info->user_type == 8){
                //$request = session()->flash('user_message', 'Welcome to your profile-user');
                return Redirect::to('/dashboard');
            }
            else{
                //$request = session()->flash('vendor_message', 'Welcome to your profile-vendor');
                return Redirect::to('/admin_signin_mygift')->with('error', 'invalid Username and password');
            }
            // else{
            //     return Redirect::to('/');
            // }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AdminSignin  $adminSignin
     * @return \Illuminate\Http\Response
     */
    public function show(AdminSignin $adminSignin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminSignin  $adminSignin
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminSignin $adminSignin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminSignin  $adminSignin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminSignin $adminSignin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminSignin  $adminSignin
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminSignin $adminSignin)
    {
        //
    }
}
