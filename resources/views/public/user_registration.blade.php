
<?php

$pageInfo = [
    'User Signup',
    'Home/User Signup'
    ];

?> 


@include('public.header')


<div class="wrapper">

     @include('public.main_navigation')   
     @include('public.breadcrumbs')   

      
        

       <!-- Start page content -->
        <div id="page-content" class="page-wrapper">
            @include('public.notification_message') 
            
            <!-- LOGIN SECTION START -->
            <div class="login-section mb-80">
                <div class="container">
                    <div class="row">
                        
                        <!-- new-customers -->
                         <div class="col-md-3 col-sm-12 col-xs-12">
                            
                        </div>
                        
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="registered-customers">
                               
                               <form action="{{ url('/user-signup-submission')}}" method="post">
                                   {{ csrf_field() }}
                                    <div class="login-account p-30 box-shadow">
                                        <button class="submit-btn-1 btn-hover-1" type="submit" style="width:100%; height: 42px;">Signup With Google</button>
                                    </div>
                                    <div class="login-account p-30 box-shadow">
                                        <p>If you don't have an account with us, Please Signup.</p>
                                        <input type="text" name="user_email" placeholder="Email Address">
                                        <input type="hidden" name="user_type" value="2">
                                        <input type="password" name="password" placeholder="Password">
                                        <input type="password" name="confirm_password" placeholder="Confirm Password">
                                        
                                        <button class="submit-btn-1 btn-hover-1" type="submit" style="width:100%; height: 42px;">Signup</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                         <div class="col-md-3 col-sm-12 col-xs-12">
                            
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
