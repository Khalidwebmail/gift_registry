<?php
$pageInfo = ['pageTitle' => 'Vendor profile ', 
    'pageSummery' => 'Vendor profile control', 
    'tabTitle' => 'Vendor profile', 
    'bread1' => 'Vendor', 
    'bread1_url' => '',
    'bread2' => 'Dashboard',
    'bread2_url' => '',
    'bread3' => '',
    'bread3_url' => ''
    
    ];

?> 


@include('vendor.vendor_header')

@section('profile_css')

@endsection
@include('vendor.vendor_top_navigation')
@include('vendor.vendor_left_navigation')



<div class="content-wrapper" style="overflow: hidden; height: auto;">
    <!-- Content Header (Page header) -->
    
    @include('admin.admin_breadcrumbs')
     <section class="containerx content-header">
        @include('vendor.vendor_notification')
 </section>
    <!-- Main content -->
    <section class="content">
     
      <!-- Default box -->
        <!-- <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div> -->
    <section class="col-lg-6 content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> Account Security </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
       <div class="box-body">
           <form role="form" action="{{ url('/vendor-account-security-save') }}" method="post">
               {{ csrf_field() }}
               <input type="hidden" value="{{ Session::get('user.id') }}" name="user_id">

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Existing email</label>
                  <input type="email" class="form-control" name="user_email" placeholder="Please type your existing email..">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Existing password</label>
                  <input type="password" class="form-control" name="password" placeholder="Type existing password...">
                </div>


                <div class="form-group">
                  <label for="exampleInputEmail1">New email</label>
                  <input type="text" class="form-control" name="new_email" placeholder="New Email...">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">New password</label>
                  <input type="password" class="form-control" name="new_password"  placeholder="New Password...">
                </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>

            </form>
        </div>
            <!-- /.box-body -->
      
      </div>
      <!-- /.box -->
     </section>

    <section class="col-lg-6 content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> Vendor Info </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>


       <div class="box-body">

    <div class="col-lg-12 col-sm-12">

            <div class="card hovercard">
                <div class="cardheader">

                </div>
                <div class="avatar">
                    <img alt="Profile pic" src="vendor_image/{{Session::get('user.image')}}">
                </div>
                <div class="info">
                    <div class="title">
                        <div class="desc">{{Session::get('user.first_name')}} {{Session::get('user.last_name')}}</div>
                    </div>
                    <!-- <div class="desc"></div>
                    <div class="desc"></div>
                    <div class="desc"></div>
                    <div class="desc"></div>
                    <div class="desc"></div> -->
                </div>
                <div class="bottom">
                    <a class="btn btn-primary btn-twitter btn-sm" href="#">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" rel="publisher"
                       href="#">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" rel="publisher"
                       href="#">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a class="btn btn-warning btn-sm" rel="publisher" href="#">
                        <i class="fa fa-behance"></i>
                    </a>
                </div>
            </div>

        </div>


       </div>
            <!-- /.box-body -->
      
      </div>
      <!-- /.box -->
     </section>

            <!-- /.box-body -->
        <!-- <div class="box-footer">
          Footer
        </div> -->
        <!-- /.box-footer-->

      <!-- /.box -->

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('vendor.vendor_footer')