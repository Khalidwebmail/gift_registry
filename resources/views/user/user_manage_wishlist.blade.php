<?php

$pageInfo = [
    'Manage Wishlist',
    'Home/User Dashboard/Manage Wishlist',
    'manage_wishlist'
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
                                    <div class="col-md-12 WlistBody" style="color:#989898;" >
                                        <h3>Manage Wishlist</h3>
                                        
                                        <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th>SL</th>
                                                <th>WishLish Name</th>
                                                <th>Status</th>
                                                <th>Type</th>
                                                 <th>Code</th>
                                                <th>Created Date</th>
                                                <th>Detail</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                                
                                               @foreach($wishList as $key=>$wishList)  
                                              <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{$wishList->wish_list_name}}</td>
                                                 <td>
                                                    <center>
                        
                                                        @if($wishList->status == 1)
                                                        <a href="{{URL::to('/wishlist-status-update/unpublish/'.$wishList->id)}}"><i class="fa fa-check" style="color:green;"></i></a>
                                                        @endif
                                                        @if($wishList->status == 0)
                                                        <a href="{{URL::to('/wishlist-status-update/publish/'.$wishList->id)}}"><i class="fa fa-ban" style="color:red;"></i></a>
                                                        @endif
                                                    </center>
                                                </td>
                                                <td>
                                                   {{$wishList->category_name}}
                                                </td>
                                                 <td>
                                                   {{$wishList->access_code}}
                                                </td>
                                               
                                                <td>{{$wishList->created_date}}</td>
                                                <td><center><a href="#"><i class="fa fa-eye "></i></a></center></td>
                                                <td><center><a href="{{URL('/update-user-wishlist')}}/{{$wishList->id}}"><i class="fa fa-edit "></i></a></center></td>
                                                <td> <center><a href="#" data-toggle="modal" data-target="#modal_delete{{$key+1}}"><i class="fa fa-trash "></i></a></center>
                 
                                                    <div class="modal fade" id="modal_delete{{$key+1}}">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span></button>
                                                                <h4 class="modal-title">Do you want to delete this wishlist?</h4>
                                                            </div>
                                                            <div class="modal-body" style="height: 71px;">
                                                                <form action="{{URL('/delete-user-wishlist')}}/{{$wishList->id}}" method="post">
                                                                    {{ csrf_field() }}

                                                                    <div class="box-body">
                                                                        <button type="button" class="btn btn-default pull-left"
                                                                                data-dismiss="modal">!No
                                                                        </button>
                                                                        <button type="submit" class="btn btn-primary pull-right ">Yes!
                                                                        </button>
                                                                    </div>
                                                                    <!-- /.box-body -->

                                                                </form>
                                                            </div>

                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </td>
                                              </tr>
                                              @endforeach
                                             
                                            </tbody>
                                          </table>
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
