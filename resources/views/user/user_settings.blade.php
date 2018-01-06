<?php

$pageInfo = [
    'User Settings',
    'Home/User Dashboard/User Settings',
    'settings'
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
                                        <form action="{{url('/user-settings-save')}}" method="post" >
                                            {{ csrf_field() }}
                                            
                                            <div class="row">
                                                
                                                <div class="form-group">
                                                    <label>Account Activation</label>
                                                    <select  class="custom-select" name="activation">
                                                        <?php if($activation == 1) {?>
                                                        <option value="1" selected> Activated   </option>
                                                        <?php } ?>
                                                        <?php if($activation == 0) {?>
                                                        <option value="0" selected> Deactivated   </option>
                                                        <?php } ?>
                                                        <option value="1">Active</option>
                                                        <option value="0">Deactive</option>
            
                                                    </select>
                                                  </div>
                                                <div class="form-group">
                                                    <label>Email Notification</label>
                                                    <select class="custom-select" name="email_notification">
                                                                    
                                                        <?php if($email_notification == 1) {?>
                                                        <option value="1" selected> Yes  </option>
                                                        <?php } ?>
                                                        <?php if($email_notification == 0) {?>
                                                        <option value="0" selected> No   </option>
                                                        <?php } ?>
                                                        <option value="1">Yes</option>
                                                         <option value="0">No</option>
                                                                    
                                                                    
                                                    </select>
                                                  </div>
                                                
                                                <div class="form-group">
                                                    <label>Newsletter Subscription</label>
                                                    <select class="custom-select" name="newsletter_subscription">
                                                        <?php if($subscribe_newsletter == 1) {?>
                                                        <option value="1" selected> Subscribed  </option>
                                                        <?php } ?>
                                                        <?php if($subscribe_newsletter == 0) {?>
                                                        <option value="0" selected> Unsubscribed   </option>
                                                        <?php } ?>          
                                                        <option value="1">Subscribe</option>
                                                        <option value="0">Unsubscribe</option>
                                                                    
                                                                    
                                                    </select>
                                                  </div>
                                               
                                            </div>
                                            
                                            
                                            
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <button class="submit-btn-1 mt-20 btn-hover-1" >Update Settings</button>
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
