<?php

$pageInfo = [
    'User Dashboard',
    'Home/user Dashboard',
    'profile'
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
                            <div class="my-account-content" id="accordion2">
                                <!-- My Personal Information -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#personal_info">Update Personal Information</a>
                                        </h4>
                                    </div>
                                    <div id="personal_info" class="panel-collapse collapse in" role="tabpanel">
                                        <div class="panel-body">
                                            <form action="{{ url('/save-user-profile') }}" method="POST" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="new-customers">
                                                    <div class="p-30">
                                                        <div class="row">
                                                            <div class="col-sm-6">
                                                                <input type="hidden" value="{{ Session::get('user.id') }}" name="user_id">
                                                                <input type="text" name="first_name" value="{{$first_name}}"  placeholder="First Name*">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" name="last_name" value="{{$last_name}}"  placeholder="last Name*">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select class="custom-select" name="gender">
                                                                    <option value="0">Gender*</option>
                                                                    <option <?php if($gender == 1){echo'selected';} ?> value="1">Male</option>
                                                                    <option <?php if($gender ==2 ){echo'selected';} ?> value="2">Female</option>
                                                                    <option <?php if($gender ==3 ){echo'selected';} ?> value="3">Other</option>
                                                                    
                                                                </select>
                                                            </div>
                                                             <div class="col-sm-6">
                                                                <input type="text" name="birth_date" value="{{$birth_date}}"  placeholder="Birth Date*">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select class="custom-select" name="profession">
                                                                    <option value="">Profession*</option>
                                                                    <option <?php if($profession == 1){echo'selected';} ?> value="1">Business Man</option>
                                                                    <option <?php if($profession ==2 ){echo'selected';} ?> value="2">Job Holder</option>
                                                                    <option <?php if($profession ==3 ){echo'selected';} ?> value="3">Student</option>
                                                                    <option <?php if($profession ==4 ){echo'selected';} ?> value="4">Other</option>
                                                                    
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <select class="custom-select" name="blood_group">
                                                                    <option value="">Blood Group*</option>
                                                                    
                                                                    <option <?php if($blood_group == 'A+'){echo'selected';} ?> value="A+">A+ (A Positive)</option>
                                                                    <option <?php if($blood_group == 'B+'){echo'selected';} ?> value="B+">B+ (B Positive)</option>
                                                                    <option <?php if($blood_group == 'O+'){echo'selected';} ?> value="O+">O+ (O Positive)</option>
                                                                    <option <?php if($blood_group == 'AB+'){echo'selected';} ?> value="AB+">AB+ (AB Positive)</option>
                                                                    <option <?php if($blood_group == 'A-'){echo'selected';} ?> value="A-">A+ (A Negative)</option>
                                                                    <option <?php if($blood_group == 'B-'){echo'selected';} ?> value="B-">B+ (B Negative)</option>
                                                                    <option <?php if($blood_group == 'O-'){echo'selected';} ?> value="O-">O+ (O Negative)</option>
                                                                    <option <?php if($blood_group == 'AB-'){echo'selected';} ?> value="AB-">AB+ (AB Negative)</option>
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="col-sm-6">
                                                               <input type="text" name="country" value="{{$country}}"  placeholder="Country Name*">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" name="state" value="{{$state}}"  placeholder="state*">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" name="city_name" value="{{$city_name}}"  placeholder="City Name*">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" name="zip_code" value="{{$zip_code}}"  placeholder="zip_code">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="text" name="cell_no" value="{{$cell_no}}"  placeholder="Cell No*">
                                                            </div>
                                                             <div class="col-sm-6">
                                                                 <input type="text"  placeholder="" value="{{ Session::get('user.user_email') }}" disabled>
                                                            </div>
                                                        </div>
                                                        <input type="text" name="address" value="{{$address}}" placeholder="Personal House Address">
                                                        
                                                        <textarea class="custom-textarea" name="intro_text"  placeholder="About Myself..."> {{$intro_text}} </textarea>
                                                        
                                                        
                                                        <div class="col-sm-6">
                                                            <level>Upload Profile Picture</level>
                                                            <input type="hidden" name="current_image" value="{{$image}}">
                                                            <input type="file" name="image">
                                                         </div>
                                                        <div class="col-sm-6">
                                                           Uploaded Image
                                                        </div>
                                                         
                                                        
                                                        
                                                        <div class="col-sm-12">
                                                        <div class="checkbox">
                                                            <label class="mr-10"> 
                                                                <small>
                                                                    <input type="checkbox" name="signup">I wish to subscribe to the 69 Fashion newsletter.
                                                                </small>
                                                            </label>
                                                            <br>
                                                            <label> 
                                                                <small>
                                                                    <input type="checkbox" name="signup">I have read and agree to the <a href="#">Privacy Policy</a>
                                                                </small>
                                                            </label>
                                                        </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Save</button>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset">Clear</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- My shipping address -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#my_shipping">My shipping address</a>
                                        </h4>
                                    </div>
                                    <div id="my_shipping" class="panel-collapse collapse" role="tabpanel" >
                                        <div class="panel-body">
                                            <form action="{{ url('/save-shipping-address') }}" method="post">
                                                {{ csrf_field() }}
                                                <div class="new-customers p-30">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input type="text" name="first_name"  placeholder="First Name" value="{{$shipping_address[0]->first_name}}">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="last_name"  placeholder="last Name" value="{{$shipping_address[0]->last_name}}">
                                                        </div>
                                                        <div class="col-sm-12">
                                                        <input type="text" name="shipping_address"  placeholder="House Address..." value="{{$shipping_address[0]->shipping_address}}">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text" name="country"  placeholder="Country" value="{{$shipping_address[0]->country}}">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            
                                                            <input type="text" name="state"  placeholder="State" value="{{$shipping_address[0]->state}}">
                                                        </div>
                                                        <div class="col-sm-6">
                                                           
                                                            <input type="text" name="city"  placeholder="State" value="{{$shipping_address[0]->city}}">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text"  name="cell_number" placeholder="Phone here..." value="{{$shipping_address[0]->cell_number}}">
                                                        </div>
                                                    </div>
                                                    
                                                    <input type="text" name="email_address" placeholder="Email address here..." value="{{$shipping_address[0]->email_address}}">
                                                    <textarea class="custom-textarea" name="additional_info" placeholder="Additional information...">{{$shipping_address[0]->additional_info}}</textarea>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Save</button>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset">Clear</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- My billing details -->
                                <div class="panel panel-default">
<div class="panel-heading">
    <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion2" href="#billing_address">Create Wishlist</a>
    </h4>
</div>
<div id="billing_address" class="panel-collapse collapse" role="tabpanel" >
    <div class="panel-body">
        <form action="{{ url('/save-user-wishlist') }}" method="post">
            {{ csrf_field() }}
            <div class="billing-details p-30">
                <?php 
                    $wish_list_name = DB::table('mktk_wishlist_category')->get();
                ?>
              
                <select class="custom-select" name="type" id="mySelect" onchange="myFunction(this.value)">
                    <option value="" selected>Select Wishlist Category</option>
                    @foreach($wish_list_name as $wishlist_category)
                        <option value="{{ $wishlist_category->id }}">{{ $wishlist_category->category_name }}</option>
                    @endforeach
                </select>
           
               
                <input type="text"  placeholder="Wishlist Name..." name="wish_list_name">
                
                <div id="demo"></div>
                <input type="text"  placeholder="Event Date..." name="event_date">


                <!-- <input type="text"  placeholder="Bride Name..." name="bride_name">
                <input type="text"  placeholder="Groom Name..." name="groom_name"> -->

                <input type="text"  placeholder="Number of people Attending..." name="no_of_people">
                
               
                
                <textarea class="custom-textarea" placeholder="Event Venue Address..." name="event_venue" style="margin-bottom: 16px;"></textarea>

                <textarea class="custom-textarea" placeholder="Description of the Event..." name="event_details" style="margin-bottom: 16px;"></textarea>

                <select class="custom-select" name="access">
                    <option value="defalt">Wishlist Privacy</option>
                    <option value="private">Private</option>
                    <option value="public">Public</option>
                   
                </select>
                <div class="row">
                    <div class="col-md-6">
                        <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Save</button>
                    </div>
                    <div class="col-md-6">
                        <button class="submit-btn-1 mt-20 btn-hover-1 f-right" type="reset">Clear</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
                                <!-- My Order info -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#My_order_info">My Order info</a>
                                        </h4>
                                    </div>
                                    <div id="My_order_info" class="panel-collapse collapse" role="tabpanel" >
                                        <div class="panel-body">
                                            <form action="#">
                                                <!-- our order -->
                                                <div class="payment-details p-30">
                                                    <table>
                                                        <tr>
                                                            <td class="td-title-1">Dummy Product Name x 2</td>
                                                            <td class="td-title-2">$1855.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Dummy Product Name</td>
                                                            <td class="td-title-2">$555.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Cart Subtotal</td>
                                                            <td class="td-title-2">$2410.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Shipping and Handing</td>
                                                            <td class="td-title-2">$15.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="td-title-1">Vat</td>
                                                            <td class="td-title-2">$00.00</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="order-total">Order Total</td>
                                                            <td class="order-total-price">$2425.00</td>
                                                        </tr>
                                                    </table>
                                                    <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Save</button>
                                                </div> 
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- Payment Method -->
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion2" href="#My_payment_method">Payment Method</a>
                                        </h4>
                                    </div>
                                    <div id="My_payment_method" class="panel-collapse collapse" role="tabpanel" >
                                        <div class="panel-body">
                                            <form action="#">
                                                <div class="new-customers p-30">
                                                    <select class="custom-select">
                                                        <option value="defalt">Card Type</option>
                                                        <option value="c-1">Master Card</option>
                                                        <option value="c-2">Paypal</option>
                                                        <option value="c-3">Paypal</option>
                                                        <option value="c-4">Paypal</option>
                                                    </select>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input type="text"  placeholder="Card Number">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <input type="text"  placeholder="Card Security Code">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="custom-select">
                                                                <option value="defalt">Month</option>
                                                                <option value="c-1">January</option>
                                                                <option value="c-2">February</option>
                                                                <option value="c-3">March</option>
                                                                <option value="c-4">April</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <select class="custom-select">
                                                                <option value="defalt">Year</option>
                                                                <option value="c-4">2017</option>
                                                                <option value="c-1">2016</option>
                                                                <option value="c-2">2015</option>
                                                                <option value="c-3">2014</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">pay now</button>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">cancel order</button>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <button class="submit-btn-1 mt-20 f-right btn-hover-1" type="submit" value="register">continue</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
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


<script>
function myFunction(wedding) {
    if(wedding == 6){
    document.getElementById("demo").innerHTML = '<input type="text"  name="bride_name" placeholder="Bride Name...">'+
    '<input type="text"  name="groom_name" placeholder="Groom Name...">' ;
}
else{
    document.getElementById("demo").innerHTML = '';
}
}
</script>