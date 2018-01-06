<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Session;
use Carbon\Carbon;
session_start();

class UserPageController extends Controller
{
    public function getUserRegistration()
    {
        return view('public.user_registration');
    }
    
   
    
    public function getUserProfile(Request $request)
    {   
        
        
        if($request->session()->has('user.id')){

        $user_info = DB::table('mktk_users_detail')
            ->where('user_id','=',Session::get('user.id'))->get();
           
            $first_name = $user_info[0]->first_name;
            $last_name = $user_info[0]->last_name;

            $cell_no= $user_info[0]->cell_no;
            $address= $user_info[0]->address;
            $gender= $user_info[0]->gender;
            $profession= $user_info[0]->profession;
            $blood_group= $user_info[0]->blood_group;
            $intro_text= $user_info[0]->intro_text;
            $birth_date= $user_info[0]->birth_date;
            $country= $user_info[0]->country;
            $state= $user_info[0]->state;
            $city_name= $user_info[0]->city_name;
            $zip_code= $user_info[0]->zip_code;
            $image= $user_info[0]->image;
            
            
        $shipping_add = DB::table('mktk_shipping_address')
            ->where('user_id','=',Session::get('user.id'))->get();
            
            // returing data to views
            return view('user.profile',[
            'first_name'=>$first_name,
            'last_name'=>$last_name,
            'cell_no'=>$cell_no,
            'address'=>$address,
            'gender'=>$gender,
            'profession'=>$profession, 
            'blood_group'=>$blood_group, 
            'intro_text'=>$intro_text,
            'country'=>$country,
            'state'=>$state,
            'city_name'=>$city_name,
            'zip_code'=>$zip_code,
            'birth_date'=>$birth_date,
            'image'=>$image,
            'shipping_address'=>$shipping_add
                
            ]);

        }
        else{
            return view('public.welcome');
        }
    }
    
    
    public function getUser_accountSecurity(Request $request) {
        
         
        if($request->session()->has('user.id')){

        $user_info = DB::table('mktk_users_detail')
            ->where('user_id','=',Session::get('user.id'))->get();
            $image= $user_info[0]->image;

            // returing data to views
            return view('user.user_account_security',[
            'image'=>$image,  
            ]);
        }
        else{
            return view('public.welcome');
        }
       
    }
    
    
    public function getUser_accountSecurity_save(Request $request) {
        
         
        if($request->session()->has('user.id')){

        $new_email = $request->new_email;
        $new_password = sha1($request->new_password);
        $current_email = $request->current_email;
        $current_password = sha1($request->current_password);
        
     
        
        $userData = DB::table('mktk_users')
            ->where('id','=',Session::get('user.id'))->get();
            $user_email = $userData[0]->user_email;
            $password = $userData[0]->password;
            
         if($current_email == $user_email && $current_password == $password) {
            
             $updateUserInfo = DB::table('mktk_users')
                               ->where('id', Session::get('user.id'))
                               ->update(['user_email' => $new_email, 'password' => $new_password]);
                               
             $request->session()->flush('user');
             return Redirect('/signin-page')->with('success', 'Information Updated, Email/Password has been changed. Please login with new user info');
         } else {
             return Redirect('/account-security')->with('error', 'Error! Please put correct Current information');
         }
            

        }
        else{
            return view('public.welcome');
        }
       
    }
    
    
    
    public function getUser_settings(Request $request) {
        
         
        if($request->session()->has('user.id')){

        $user_info = DB::table('mktk_users_detail')
            ->where('user_id','=',Session::get('user.id'))->get();
            $image= $user_info[0]->image;
            
        $user_settings = DB::table('mktk_user_settings')
            ->where('user_id','=',Session::get('user.id'))->get();
            $activation= $user_settings[0]->activation;
            $email_notification= $user_settings[0]->email_notification;
            $subscribe_newsletter= $user_settings[0]->newsletter_subscription;

            // returing data to views
            return view('user.user_settings',[
            'image'=>$image,  
            'activation'=>$activation,
            'email_notification'=>$email_notification,
            'subscribe_newsletter'=>$subscribe_newsletter
             
            ]);
        }
        else{
            return view('public.welcome');
        }
       
    }
    
    public function getUser_settings_save(Request $request) {
        
         
        if($request->session()->has('user.id')){

        $activation = $request->activation;
        $email_notification = $request->email_notification;
        $subscribe_newsletter = $request->newsletter_subscription;

            
         if($activation != '' || $email_notification != '' || $subscribe_newsletter != '') {
            
             $updateUserInfo = DB::table('mktk_user_settings')
                               ->where('user_id', Session::get('user.id'))
                               ->update(['activation' => $activation, 'email_notification' => $email_notification, 'newsletter_subscription' => $subscribe_newsletter]);
                               
             //$request->session()->flush('user');
             return Redirect('/user-settings')->with('success', 'Information Updated, Settings have been changed.');
 
             
         } else {
             return Redirect('/user-settings')->with('error', 'Error! Please put correct Current information');
         }
            

        }
        else{
            return view('public.welcome');
        }
       
    } 
    
    
    public function getManage_wishlist(Request $request) {
        if($request->session()->has('user.id')){

        $user_info = DB::table('mktk_users_detail')
            ->where('user_id','=',Session::get('user.id'))->get();
            $image= $user_info[0]->image;
            
        //$wishlists = DB::table('mktk_user_wish_list')->get();
        $wishlists = DB::table('mktk_user_wish_list')
                    ->join('mktk_wishlist_category', 'mktk_user_wish_list.type', '=', 'mktk_wishlist_category.id')
                    ->select('mktk_wishlist_category.category_name','mktk_user_wish_list.*')
                    ->get();
        
        
        
        $wishList = [];
        foreach ($wishlists as $key => $val) {
            $wishList[$key] = $val;
        }   

            // returing data to views
            return view('user.user_manage_wishlist',[
            'image'=> $image, 
            'wishList' => $wishList
            ]);
        }
        else{
            return view('public.welcome');
        }
    }
    
    
    public function get_wishlist_status($param1 = '', $param2 = '') {

        if ($param1 == 'unpublish') {
            //dd($param1);
            //exit();
            $unpublishVal = 0;
            $dataUnpublish = DB::table('mktk_user_wish_list')
                    ->where('id', $param2)
                    ->update([
                'status' => $unpublishVal
            ]);
            return Redirect('/manage-user-wishlist')->with('success', 'Attribute has been Unpublished.');
        }
        if ($param1 == 'publish') {
            //dd($param1);
            //exit();
            $unpublishVal = 1;
            $dataUnpublish = DB::table('mktk_user_wish_list')
                    ->where('id', $param2)
                    ->update([
                'status' => $unpublishVal
            ]);
            return Redirect('/manage-user-wishlist')->with('success', 'Attribute has been Published.');
        }
    }
    
    
    public function get_deleteUser_wishlist($param1 = '') {
        
       $wishlistDelete = DB::table('mktk_user_wish_list')->where('id', '=', $param1)->delete();
       return Redirect('/manage-user-wishlist')->with('success', 'WishList has been deleted successfully');
    }
    
    public function get_editUser_wishlist(Request $request, $param1 = '') {
         if($request->session()->has('user.id')){

            $user_info = DB::table('mktk_users_detail')
                        ->where('user_id','=',Session::get('user.id'))->get();
                        $image= $user_info[0]->image;
            
            
            $wishlistInfo = DB::table('mktk_user_wish_list')
                        ->where('id','=',$param1)->get();
                         $wishlist_id= $wishlistInfo[0]->id;
                         $type= $wishlistInfo[0]->type;
                         $wishlist_name= $wishlistInfo[0]->wish_list_name;
                         $event_date = $wishlistInfo[0]->event_date ;
                         $no_of_people= $wishlistInfo[0]->no_of_people;
                         $bride_name = $wishlistInfo[0]->bride_name;
                         $groom_name  = $wishlistInfo[0]->groom_name ;
                         $event_details = $wishlistInfo[0]->event_details;
                         $event_venue  = $wishlistInfo[0]->event_venue;
                         $access  = $wishlistInfo[0]->access ;
                         
            
            
            
            
             return view('user.user_edit_user_wishlist',[
            'wishlist_id' => $wishlist_id,
            'image'=> $image,
            'type'=> $type,
            'wishlist_name'=> $wishlist_name,
            'event_date'=> $event_date,
            'no_of_people'=> $no_of_people,
            'bride_name'=> $bride_name,
            'groom_name'=> $groom_name,
            'event_details'=> $event_details,
            'event_venue' => $event_venue,
            'access'=> $access
                 
            
            ]);
             
             
         }
        
      
       
    }
    
    
     public function get_editUser_wishlist_save(Request $request, $param1 = '') {
         
        $type= $request->type;
        $wishlist_name= $request->wish_list_name;
        $event_date = $request->event_date;
        $no_of_people= $request->no_of_people;
        $bride_name = $request->bride_name;
        $groom_name  = $request->groom_name;
        $event_details = $request->event_details;
        $event_venue  = $request->event_venue;
        $access  = $request->access;              
         
                         
         $dataUpdate = DB::table('mktk_user_wish_list')
                    ->where('id', $param1)
                    ->update([
                'type' => $type,
                'wish_list_name' => $wishlist_name,
                'event_date' => $event_date,
                'no_of_people' => $no_of_people,
                'bride_name' => $bride_name,
                'groom_name' => $groom_name,
                'event_venue' => $event_venue,
                'event_details' => $event_details,
                'access' => $access,
                'updated_date' => Carbon::now()
                ]);                
                         
         return Redirect('/manage-user-wishlist')->with('success', 'WishList has been Updated successfully');
     }
    
    
    
    
}
