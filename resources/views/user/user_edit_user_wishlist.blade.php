<?php
$pageInfo = [
    'Update Wishlist',
    'Home/User Dashboard/Update Wishlist',
    'update_wishlist'
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
                        <div class="manage_wishlist_wrapper">
                            <div class="row">
                                 <form action="{{ url('/update-user-wishlist-save') }}/{{$wishlist_id}}" method="post">
                                        {{ csrf_field() }}
                                <div class="col-md-12 WlistBody"  >
                                    <h3>Update Wishlist</h3>

                                    <div class="billing-details p-30" style="color:#444;">
                                        <?php
                                        $wish_list_name = DB::table('mktk_wishlist_category')->get();
                                        ?>

                                        <select class="custom-select" name="type" id="mySelect" onchange="myFunction(this.value)">
                                            
                                            <?php
                                            
                                            $defaultCat = DB::table('mktk_wishlist_category')->where('id', $type)->first();
                                            $defaultCatVal = $defaultCat->id;
                                            $defaultCatName = $defaultCat->category_name ;
                                            ?>
                                            <option value="{{ $defaultCatVal }}" selected>{{ $defaultCatName }}</option>
                                            @foreach($wish_list_name as $wishlist_category)
                                            <option value="{{ $wishlist_category->id }}">{{ $wishlist_category->category_name }}</option>
                                            @endforeach
                                        </select>


                                        <input type="text"  placeholder="Wishlist Name..." name="wish_list_name" value="{{$wishlist_name}}">

                                        <div id="demo"></div>
                                        <input type="text"  placeholder="Event Date..." name="event_date" value="{{$event_date}}">


                <!-- <input type="text"  placeholder="Bride Name..." name="bride_name">
                <input type="text"  placeholder="Groom Name..." name="groom_name"> -->

                                        <input type="text"  placeholder="Number of people Attending..." name="no_of_people" value="{{$no_of_people}}">



                                        <textarea class="custom-textarea" placeholder="Event Venue Address..." name="event_venue" style="margin-bottom: 16px;">
                                            {{$event_venue}}
                                        </textarea>

                                        <textarea class="custom-textarea" placeholder="Description of the Event..." name="event_details" style="margin-bottom: 16px;">
                                           {{$event_details}}
                                        </textarea>

                                        <select class="custom-select" name="access">
                                            <option value="defalt">Wishlist Privacy</option>
                                            @if($access == 'private')
                                            <option value="private" selected>Private</option>
                                            <option value="public">Public</option>
                                            @elseif($access == 'public')
                                            <option value="public" selected>Public</option>
                                            <option value="private">Private</option>
                                            @else
                                            <option value="private">Private</option>
                                            <option value="public">Public</option>
                                            @endif
                                        </select>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <button class="submit-btn-1 mt-20 btn-hover-1" type="submit" value="register">Update</button>
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
        if (wedding == 6) {
            document.getElementById("demo").innerHTML = '<input type="text"  name="bride_name" placeholder="Bride Name...">' +
                    '<input type="text"  name="groom_name" placeholder="Groom Name...">';
        } else {
            document.getElementById("demo").innerHTML = '';
        }
    }
</script>