<?php

$pageInfo = [
    'Account Security',
    'Home/User Dashboard/Account Security',
    'acc_security'
    ];

    
    $verifyStatus = Session::get('user.verify_status');


?>   
@include('user.header')


<div class="wrapper">

     @include('user.user_main_navigation')   
     @include('user.user_breadcrumbs')   

      
        <div id="page-content" class="page-wrapper">
            <div class="container"> 
                @include('public.notification_message')
            </div>
            
           @if($verifyStatus == 0) 
            <div class="container">
                <div class="alert alert-warning">
                 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
                  A Verification Link has been sent to your email. Please click on that link to verify your account. 
             </div> 
            </div>
           @endif
            
            
            <!-- LOGIN SECTION START -->
            <div class="login-section mb-80">
                <div class="container">
                    <div class="row">
                        
                       <div class="col-md-2">  
                           <div class="profileIMGs">
                               @if(!empty($image))
                               <img class="userProfileImg" src="{{asset('post_image')}}/{{$image}}" />
                               @else
                               <img class="userProfileImg" src="{{asset('frontend/images/default_user_image.png')}}" />
                               @endif
                           </div>
                           <div class="AccountSecurity">
                               
                               <p><a href="{{url('/user-profile')}}"><span><i class="fa fa-dashboard" aria-hidden="true"></i></span>  <span> &nbsp; Dashboard</span></a></p>
                               <p><a href="{{url('/manage-user-wishlist')}}"><span><i class="fa fa-dashboard" aria-hidden="true"></i></span>  <span> &nbsp; Manage Wishlist</span></a></p>
                               <p><a href="{{url('/account-security')}}"><span><i class="fa fa-lock" aria-hidden="true"></i></span>  <span> &nbsp; Account Security</span></a></p>
                               <p><a href="{{url('/user-settings')}}"><span><i class="fa fa-cog" aria-hidden="true"></i></span>  <span> &nbsp; Settings </span></a></p>
                               <p><a href="{{url('/signout')}}"><span><i class="fa fa-sign-out" aria-hidden="true"></i></span>  <span> &nbsp; Sign Out </span></a></p>
                           </div>
                       
                       </div>
                        <div class="col-md-10">
                            <div class="account_security_wrapper">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6">
                                        <form action="{{url('/account-security-save')}}" method="post" >
                                            {{ csrf_field() }}
                                            <h3 style="padding-bottom:10px;">New Information</h3>
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <input type="text" name="new_email" value=""  placeholder="New Email*">
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="password" name="new_password" value=""  placeholder="New Password*">
                                                </div>
                                            </div>
                                            <h3 style="padding-bottom:10px;">Current Information</h3>
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <input type="text" name="current_email" value=""  placeholder="Current Email*">
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="password" name="current_password" value=""  placeholder="Current Password*">
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <button class="submit-btn-1 mt-20 btn-hover-1" >Update Information</button>
                                                </div>
                                                
                                            </div>
                                            
                                        </form>
                                        
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>
                            </div>
                        </div>
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
            </div>
            <!-- LOGIN SECTION END -->
        </div>
        <!-- End page content -->

        
        

        
    </div>
    <!-- Body main wrapper end -->
    

@include('public.footer')
