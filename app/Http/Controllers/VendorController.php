<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use DB;
use Redirect;
use Carbon\Carbon;
//session_start();
class VendorController extends Controller {
    public function updateVendorProfile(Request $request) 
    {
        // print_r($request);
        // exit();
        $this->validate($request,[
            'first_name'=>'',
            'last_name'=>'',
            'personal_address'=>'',
            'cell_no'=>'',
            'company_name'=>'',
            'compnay_address'=>'',
            'business_type'=>'',
            'profession'=>'',
            'intro_text'=>'',
            'blood_group'=>''
        ]);

        $image_full_name='';
        $image = $request->file('image');
        if (!empty($image)) {
            $this->validate($request,[
                'image'=>'mimes:jpeg,png,jpg',
            ]);
            $image_name = str_random(20);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name .= $image_name . '.' . $ext;
           
            $upload_path = 'vendor_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
        }else{
           $image_full_name .= $request->default_image;
        }
         
        $data['created_at']=Carbon::now();

        unset($data['_token']);

        $users = DB::table('mktk_users_vendor')->where('user_id','=',$request->user_id)->update([
                'first_name'=>$request->first_name,
                'last_name'=>$request->last_name,
                'personal_address'=>$request->personal_address,
                'cell_no'=>$request->cell_no,
                'company_name'=>$request->company_name,
                'compnay_address'=>$request->compnay_address, 
                'business_type'=>$request->business_type,
                'intro_text'=>$request->intro_text,
                'image'=>$image_full_name
            ]);

        return redirect()->back()->with('success','Vendor Profile updated');
        }

    public function updateCredential(Request $request)
    {
        $this->validate($request,[
            'user_email'=>'required',
            'password'=>'required',
            'new_email'=>'',
            'new_password'=>'',
        ]);
        //dd($request);
        $data['updated_at']=Carbon::now();

        unset($data['_token']);

        $existing_info = DB::table('mktk_users')
            ->where('user_email', $request->user_email)
            ->where('password', sha1($request->password))->first();

        if(count($existing_info)<0)
        {
            return redirect()->back()->with('','Please give your existing information');
        }

        else{
            if (!empty($request->new_password && empty($request->new_email))) {
                $credential = DB::table('mktk_users')
                    ->where('user_email',$request->user_email)
                    ->update([
                        'password'=>sha1($request->new_password),
                ]);
            }

            else if (!empty($request->new_email) && empty($request->new_password)) {
                $credential = DB::table('mktk_users')
                    ->where('user_email',$request->user_email)
                    ->update([
                        'user_email'=>$request->new_email,
                ]);
            }

            else if(!empty($request->new_email) && !empty($request->new_password)){
                $credential = DB::table('mktk_users')
                    ->where('user_email',$request->user_email)  
                    ->update([
                        'user_email'=>$request->new_email,
                        'password'=>sha1($request->new_password),
                ]);
                    //dd($credential);
            }
            else{
                return redirect()->back()->with('error','Please give atleast any one new email or new password');
            }
            $request->session()->pull('user');
            $request->session()->flush('user');
            return redirect('/signin-page')->with('success','Your credential is updated, Please login again');
        }
    }
}
