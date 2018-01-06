<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use DB;
use Redirect;
use Carbon\Carbon;
session_start();

class UserController extends Controller
{
    
    
    
    public function updateUserProfile(Request $request) 
    {
    	$this->validate($request,[
            'first_name'=>'required',
            'last_name'=>'',
            'cell_no'=>'required',
            'address'=>'required',
            'birth_date'=>'required',
            'gender'=>'required',
            'profession'=>'',
            'intro_text'=>'',
            'blood_group'=>'required'
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
           
            $upload_path = 'post_image/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            
            $current_image_path = public_path().'/post_image/'.$request->current_image;
            @unlink($current_image_path);
            
            
        }else{
           $image_full_name .= $request->current_image;
        }
         
    	//$data['user_id'] = Session::get('user.id');
        $data['created_at']=Carbon::now();

        unset($data['_token']);
    	//dd($data);
        $users = DB::table('mktk_users_detail')->where('user_id',$request->user_id)
                ->update([
                    'first_name'=>$request->first_name, 
                    'last_name'=>$request->last_name, 
                    'cell_no'=>$request->cell_no, 
                    'address'=>$request->address, 
                    'birth_date'=>$request->birth_date, 
                    'gender'=>$request->gender, 
                    'profession'=>$request->profession, 
                    'intro_text'=>$request->intro_text, 
                    'blood_group'=>$request->blood_group, 
                    'country'=>$request->country,
                    'state'=>$request->state,
                    'city_name'=>$request->city_name,
                    'zip_code'=>$request->zip_code,
                    'image'=> $image_full_name
                    
                        
                        
                        ]);
        
            if($users == 1){
                return redirect()->back()->with('success', 'Success! your information has been updated');
            }          
           
    
        
        }
        
        
        
        public function updateShippingAddress(Request $request) 
        {
            //dd($request);
        $this->validate($request,[
            'first_name'=>'',
            'last_name'=>'',
            'shipping_address'=>'',
            'country'=>'',
            'state'=>'',
            'city'=>'',
            'cell_number'=>'',
            'email_address'=>'',
            'additional_info'=>'',
        ]);
        
        $users = DB::table('mktk_shipping_address')->where('user_id','=',Session::get('user.id'))
                ->update([
                    'first_name'=>$request->first_name, 
                    'last_name'=>$request->last_name, 
                    
                    'shipping_address'=>$request->shipping_address, 
                    'country'=>$request->country, 
                    'state'=>$request->state, 
                    'city'=>$request->city, 
                    'cell_number'=>$request->cell_number, 
                    'email_address'=>$request->email_address, 
                    'additional_info'=>$request->additional_info,
                ]);
            if($users == 1){
                return redirect()->back()->with('success', 'Success! your information has been updated');
            }          
        }
        
        
        public function saveUserWishlist(Request $request)
    {
        $this->validate($request,[
            'type'=>'required',
            'wish_list_name'=>'required',
            'event_date' => 'required',
            'no_of_people'=>'required',
            'bride_name'=>'',
            'groom_name'=>'',
            'event_venue'=>'required',
            'event_details'=>'required',
            'access'=>'required',
        ]);

        $data = request()->all();
        unset($data['_token']);

        $data['user_id'] = Session::get('user.id');
        $data['access_code'] = rand(100000,900000);
        //$data['created_at'] = Carbon::now();
        // echo '<pre>';
        // print_r($data);
        // exit;
        $user_wishlist = DB::table('mktk_user_wish_list')->insert($data);

        if($user_wishlist){
            return redirect()->back()->with('success', 'Your wishlist is created');
        }

        
    }
        
        
        
        
        
}
