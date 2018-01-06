<?php
$pageInfo = ['pageTitle' => 'List of Gifts', 
    'pageSummery' => 'List of Gifts', 
    'tabTitle' => 'List of Gifts', 
    'bread1' => 'Dashboard', 
    'bread1_url' => '',
    'bread2' => 'List of Gifts',
    'bread2_url' => '',
    'bread3' => '',
    'bread3_url' => ''
    
    ];

?> 


@include('admin.admin_header')
@include('admin.admin_top_navigation')
@include('admin.admin_left_navigation')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    @include('admin.admin_breadcrumbs')
    <section class="containerx content-header">
        @include('admin.admin_notification')
    </section>
    <!-- Main content -->
    <section class="col-lg-12 content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> Gift List </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <table id="giftList" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Name </th>
                  <th>Status</th>
                  <th>Category</th>
                  <th>Hits</th>
                  <th> Created Date</th>
                  <th> Updated Date</th>
                  <th>ID</th>
                  <th>Edit</th>
                  <th>Delete</th>
                 
                </tr>
                </thead>
                <tbody>
                @foreach($value as $key=>$val)
                 <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$val->gift_name}}</td>
                  <td>
                     
                      <center>
                        
                        @if($val->publish == 1)
                        <a href="{{URL::to('/gift-publish-status/unpublish/'.$val->giftId)}}"><i class="fa fa-check" style="color:green;"></i></a>
                        @endif
                        @if($val->publish == 0)
                        <a href="{{URL::to('/gift-publish-status/publish/'.$val->giftId)}}"><i class="fa fa-ban" style="color:red;"></i></a>
                        @endif
                    </center>
                  </td>
                  <td>{{$val->name}}</td>
                  <td>{{$val->hits}}</td>
                  <td>{{$val->created_at}}</td>
                  <td>{{$val->updated_at}}</td>
                  <td>{{$val->giftId}}</td>
                  <td><center><a href="{{URL('/update-gifts')}}/{{$val->giftId}}"><i class="fa fa-edit "></i></a></center></td>
                  <td> <center><a href="#" data-toggle="modal" data-target="#modal_delete{{$key+1}}"><i class="fa fa-trash "></i></a></center>
                 
                    <div class="modal fade" id="modal_delete{{$key+1}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Do you want to delete this category ?</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{URL('/delete-gifts')}}/{{$val->giftId}}" method="post">
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
            <!-- /.box-body -->
      
      </div>
      <!-- /.box -->
     </section>
    
    
    
  </div>
  <!-- /.content-wrapper -->




@include('admin.admin_footer')