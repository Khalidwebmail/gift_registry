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
    
    @include('vendor.vendor_breadcrumbs')
    <section class="containerx content-header">
        @include('vendor.vendor_notification')
    </section>

    <!-- Main content -->
    <section class="contentddd">
     
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
          <h3 class="box-title"> Vendor Info </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
       <div class="box-body">
           <form role="form" action="{{ url('/save-vendor-profile') }}" method="post" enctype="multipart/form-data">
               {{ csrf_field() }}
               <input type="hidden" value="{{ Session::get('user.id') }}" name="user_id">

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" class="form-control" name="first_name" placeholder="First name..." value="{{$first_name}}">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Last Name</label>
                  <input type="text" class="form-control" name="last_name"  placeholder="Last name.." value="{{$last_name}}">
                </div>
                
                <div class="form-group">
                  <label>Personal Address</label>
                  <textarea class="form-control" name="personal_address" rows="3" placeholder="Enter personal address...">{{$personal_address}} </textarea>
                </div>

                 <div class="form-group">
                  <label for="exampleInputPassword1">Contact No(Mobile)</label>
                  <input type="text" class="form-control" name="cell_no" placeholder="Mobile number" value="{{$cell_no}}">
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1">Company Name</label>
                  <input type="text" class="form-control" name="company_name"  placeholder="Company name.." value="{{$company_name}}">
                </div>
                
                <div class="form-group">
                  <label>Company Address</label>
                  <textarea class="form-control" name="compnay_address" rows="3" placeholder="Enter company address...">{{$compnay_address}} </textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputPassword1"> Business Type</label>
                  <input type="text" class="form-control" name="business_type"  placeholder="Business type..." value="{{$business_type}}">
                </div>


                <div class="form-group">
                  <label>Intro Text</label>
                  <textarea class="form-control" name="intro_text" rows="3" placeholder="Enter business type...">{{$intro_text}} </textarea>
                </div>

                <div class="form-group col-md-6">
                  <label for="exampleInputFile">Upload Logo</label>
                  <input type="file" name="image" >

                </div> 
                @if(isset($image))
                  <img src="vendor_image/{{$image}}" style="height: 50px;">
                  <input type="hidden" name="default_image" value="{{$image}}">
                @endif               
                
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
                        <div class="desc">{{$first_name}} {{$last_name}}</div>
                    </div>
                    <div class="desc">{{$company_name}}</div>
                    <div class="desc">{{$compnay_address}}</div>
                    <div class="desc">{{$cell_no}}</div>
                    <div class="desc">{{Session::get('user.user_email')}}</div>
                    <div class="desc">{{$business_type}}</div>
                    <div class="desc">{{$intro_text}}</div>
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

        </section>

    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@include('vendor.vendor_footer')