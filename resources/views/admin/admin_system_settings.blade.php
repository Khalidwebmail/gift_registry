<?php
$pageInfo = ['pageTitle' => 'System Settings', 
    'pageSummery' => 'Manage all settings', 
    'tabTitle' => 'System Settings', 
    'bread1' => 'Dashboard', 
    'bread1_url' => '',
    'bread2' => 'System Settings',
    'bread2_url' => '',
    'bread3' => '',
    'bread3_url' => ''
    
    ];




?> 





@include('admin.admin_header')
@include('admin.admin_top_navigation')
@include('admin.admin_left_navigation')




<div class="content-wrapper" style="height: auto; overflow: hidden;">
    <!-- Content Header (Page header) -->
    
    @include('admin.admin_breadcrumbs')
    <section class="containerx content-header">
        @include('admin.admin_notification')
    </section>
   
    
    <!-- Main content -->
    <section class="col-lg-6 content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> System Info </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
       <div class="box-body">
           <form role="form" action="{{ url('/system-settings-save') }}/system_settings" method="post" enctype="multipart/form-data">
               {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">System Title</label>
                  <input type="text" class="form-control" name="system_title" placeholder="system_title" value="{{$system_title}}">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">System Email</label>
                  <input type="text" class="form-control" name="system_email"  placeholder="system_email" value="{{$system_email}}">
                </div>
                  
                 <div class="form-group">
                  <label for="exampleInputPassword1">Contact No(Mobile)</label>
                  <input type="text" class="form-control" name="cell_no" placeholder="Mobile no" value="{{$cell_no}}">
                </div>
                  
                <div class="form-group">
                  <label for="exampleInputPassword1">Contact No(Telephone)</label>
                  <input type="text" class="form-control" name="telephone" placeholder="Telephone no" value="{{$telephone}}">
                </div>
                
                <div class="form-group">
                  <label>Address</label>
                  <textarea class="form-control" name="address" rows="3" placeholder="Enter ..."> {{$address}} </textarea>
                </div>
                
                <div class="form-group col-md-6">
                  <label for="exampleInputFile">Upload Logo</label>
                  <input type="file" name="site_logo" >

                </div> 
                <div class="form-group col-md-6">
                    <img src="{{asset('frontend/images/logo')}}/{{$image}}" >
                    <input type="hidden" name="current_image" value="{{$image}}">
                </div>
               
                
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
          <h3 class="box-title"> System Permission</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <form role="form" action="{{ url('/system-settings-save') }}/system_permission" method="post">
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                    <label>Site offline</label>
                        <select class="form-control" name="system_offline" style="width: 100%;">
                            
                            <?php if($system_offline == '0') {?>
                            <option selected="selected" value="0">No</option>
                            <?php } ?>
                            <?php if($system_offline == '1') {?>
                            <option selected="selected" value="1">Yes</option>
                            <?php } ?>
                            <option  value="0">No</option>
                            <option  value="1">Yes</option>
                            
                        </select>
                </div> 
                  
                  
                   <div class="form-group">
                        <label>Coupon Service</label>
                        <select class="form-control" name="coupon_service" style="width: 100%;">
                            
                            <?php if($coupon_service == '0') {?>
                            <option selected="selected" value="0">Disable</option>
                            <?php } ?>
                            <?php if($coupon_service == '1') {?>
                            <option selected="selected" value="1">Enable</option>
                            <?php } ?>
                            <option  value="0">Disable</option>
                            <option  value="1">Enable</option>
                            
                        </select>                                     
                    </div>    
            
               
                
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
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title"> Currency Settings </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <form role="form" action="{{ url('/system-settings-save') }}/currency_settings" method="post">
                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                    <label>Select Currency</label>
                        <select class="form-control" name="currency_name" style="width: 100%;">
                            
                            <?php if($currency_name == 'bd') {?>
                            <option selected="selected" value="0">Bangladeshi Taka</option>
                            <?php } ?>
                            <?php if($currency_name == 'usa') {?>
                            <option selected="selected" value="1">Americal Doller(USD)</option>
                            <?php } ?>
                            <option  value="bd">Bangladeshi Taka</option>
                            <option  value="usa">Americal Doller(USD)</option>
                            
                        </select>
                </div> 
                  
                  
                   <div class="form-group">
                        <label>Currency Symbol</label>
                        <select class="form-control" name="currency_symbol" style="width: 100%;">
                            
                            <?php if($currency_symbol == 'BDT') {?>
                            <option selected="selected" value="0">BDT</option>
                            <?php } ?>
                            <?php if($currency_symbol == 'USD') {?>
                            <option selected="selected" value="1">USD</option>
                            <?php } ?>
                            <option  value="BDT">BDT</option>
                            <option  value="USD">USD</option>
                            
                        </select>                                     
                    </div>    
            
               
                
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
          <h3 class="box-title"> Meta Data </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
       <div class="box-body">
            <form role="form" action="{{ url('/system-settings-save') }}/meta_data" method="post">
                {{ csrf_field() }}
              <div class="box-body">
         
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="description" rows="3" placeholder="Enter ..."> {{$description}} </textarea>
                </div>
                <div class="form-group">
                  <label>Meta Keywords</label>
                  <textarea class="form-control" name="meta_key_word" rows="3" placeholder="Enter ..."> {{$meta_key_word}} </textarea>
                </div>
                <div class="form-group">
                  <label>Meta description</label>
                  <textarea class="form-control" name="meta_description" rows="3" placeholder="Enter ..."> {{$meta_description}} </textarea>
                </div>
               
                
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
    
    
    
    
    
</div>
  <!-- /.content-wrapper -->


  







@include('admin.admin_footer')