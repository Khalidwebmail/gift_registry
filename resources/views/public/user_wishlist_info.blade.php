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

<div class="col-md-4">  
<div class="profileIMGs">
<form class="form-group" action="{{ url('/search-wishlist') }}" method="post">
	{{ csrf_field() }}
	<input type="text" name="access_code">
	<input type="submit" name="" value="Submit">
</form>

</div>
<div class="AccountSecurity">
-----------
</div>

</div>
<div class="col-md-8">
	<div class="my-account-content" id="accordion2">
		<table class="table table-responsive table-border">
			<tr>
				<th>Username</th>
				<th>Function name</th>
				<th>Event date</th>
				<th>Event venue</th>
				<th>Event details</th>
				<th>Access code</th>
			</tr>

			@if(isset($search_wishlist))
			<tr>
				<td>{{ Session::get('user.user_email') }}</td>
				<td>{{ $search_wishlist->wish_list_name }}</td>
				<td>{{ $search_wishlist->event_date }}</td>
				<td>{{ $search_wishlist->event_venue }}</td>
				<td>{{ $search_wishlist->event_details }}</td>
				<td>{{ $search_wishlist->access_code}}</td>
			</tr>
			@endif
		</table>
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
