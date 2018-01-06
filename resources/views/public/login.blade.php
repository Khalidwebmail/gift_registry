
<?php

$pageInfo = [
    'Signin',
    'Home/User Signin',
    'login'
    ];

?>  


@include('public.header')


<div class="wrapper">

     @include('public.main_navigation')   
     @include('public.breadcrumbs')   

      
        

        <!-- Start page content -->
        <div id="page-content" class="page-wrapper">

             <div class="container"> 
                @include('public.notification_message')
            </div>
            
            
            
            <!-- LOGIN SECTION START -->
            <div class="login-section mb-80">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="registered-customers">
                               
                            
                                    <div class="login-account p-30 box-shadow">
                                        <button class="submit-btn-1 btn-hover-1" type="submit" style="width:100%; height: 42px;">Sign in With Google</button>
                                    </div>
                                    
                                     <form action="{{ url('/login') }}" method="post" >
                                        {{ csrf_field() }}
                                        <div class="login-account p-30 box-shadow">
                                       
                                        <p>If you have an account with us, Please log in.</p>
                                        <input type="text" name="user_email" placeholder="Email Address" value="{{old('user_email')}}">
                                        <input type="password" name="password" placeholder="Password">
                                        
                                        <p><small><a href="#">Forgot our password?</a></small></p>
                                        <button class="submit-btn-1 btn-hover-1" type="submit" style="width:100%; height: 42px;">Sign in</button>
                                      
                                        </div>
                                    </form>
                            </div>
                        </div>
                        <!-- new-customers -->
                        <div class="col-md-4">
                            <div class="new-customers">
                                
                                <a href="{{ url('/user-signup-page') }}">
                                    <div class="login-account p-30 box-shadow divHover">
                                        <h1 class="">USER</h1> 
                                        <h1 class="">Sign Up</h1>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                         <div class="col-md-4">
                            <div class="new-customers">
                              
                                   <a href="{{ url('/vendor-signup-page') }}">
                                    <div class="login-account p-30 box-shadow divHover">
                                        <h1 class="">VENDOR</h1> 
                                        <h1 class="">SIGNUP</h1>
                                    </div>
                                   </a>    
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
