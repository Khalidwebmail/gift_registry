<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Session;
use Redirect;
session_start();
class VendorPageController extends Controller
{
//	public function __construct()
//    {
//        $this->middleware('userSession');
//    }
	public function getVendorRegistration()
	{
		return view('public.vendor_registration');
	}
        
        public function getVendorDashboard()
	{
		return view('vendor.vendor_dashboard');
	}

	
        public function getVendorProfile(Request $request)
        {
            if($request->session()->has('user.id')){

            $user_info = DB::table('mktk_users_vendor')
                ->where('user_id','=',Session::get('user.id'))->get();

            $first_name = $user_info[0]->first_name;
            $last_name = $user_info[0]->last_name;

            $personal_address= $user_info[0]->personal_address;
            $cell_no= $user_info[0]->cell_no;
            $company_name= $user_info[0]->company_name;
            $compnay_address= $user_info[0]->compnay_address;
            $business_type= $user_info[0]->business_type;

            $intro_text= $user_info[0]->intro_text;
            $image= $user_info[0]->image;

            return view('vendor.vendor_profile',['first_name'=>$first_name,'last_name'=>$last_name,'cell_no'=>$cell_no,'personal_address'=>$personal_address,'cell_no'=>$cell_no,'company_name'=>$company_name,'compnay_address'=>$compnay_address,'business_type'=>$business_type,'intro_text'=>$intro_text, 'image'=>$image]);
            }

            else{
                return view('public.welcome');
            }
        }

    public function getAccountSecurity()
    {
        return view('vendor.account_security');
    }
        
        
        
}
