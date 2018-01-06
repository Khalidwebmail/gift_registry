<?php
$pageInfo = ['pageTitle' => 'Gift Attributes', 
    'pageSummery' => 'Create Gift Attributes and Listing', 
    'tabTitle' => 'Gift Attributes', 
    'bread1' => 'Dashboard', 
    'bread1_url' => '',
    'bread2' => 'Gift Attributes',
    'bread2_url' => '',
    'bread3' => '',
    'bread3_url' => ''
    
    ];

?> 


@include('admin.admin_header')
@include('admin.admin_top_navigation')
@include('admin.admin_left_navigation')




<div class="content-wrapper" style="overflow: hidden; height: auto;">
    <!-- Content Header (Page header) -->
    
    @include('admin.admin_breadcrumbs')
    <section class="containerx content-header">
        @include('admin.admin_notification')
    </section>

    <!-- Main content -->
    <section class="col-lg-4 content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> Create Gift Attributes </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <form role="form" action="{{ url('/gift-attributes-save') }}/create/create" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Attribute Name*</label>
                  <input type="text" class="form-control" name="attribute_name" placeholder="Attribute Name">
                </div>

              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
        </div>
            <!-- /.box-body -->
       
      </div>
      <!-- /.box -->
     </section>
    
    
    <section class="col-lg-8 content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"> Attribute list </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <table id="attributeList" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Attribute Name</th>
                  <th><center>ID</center></th>
                  <th><center>Status</center></th>
                  <th><center>Edit</center></th>
                  <th><center>Delete</center></th>
                 
                </tr>
                </thead>
                <tbody>
                    
                 @foreach($attRibute as $att=>$value)
                <tr>
                  <td>{{$att+1}}</td>
                  <td>{{$value->attribute_name}}</td>
                  <td><center>{{$value->attribute_id}}</center></td>
                  <td>
                    <center>
                        
                        @if($value->status == 1)
                        <a href="{{URL::to('/gift-attributes-status/unpublish/'.$value->attribute_id)}}"><i class="fa fa-check" style="color:green;"></i></a>
                        @endif
                        @if($value->status == 0)
                        <a href="{{URL::to('/gift-attributes-status/publish/'.$value->attribute_id)}}"><i class="fa fa-ban" style="color:red;"></i></a>
                        @endif
                    </center>
                  </td>
                  <td> 
                  <center><a href="#" data-toggle="modal" data-target="#modal-default{{$att+1}}"><i class="fa fa-edit "></i></a></center>
                  <form role="form" action="{{ url('/gift-attributes-save') }}/update/{{$value->attribute_id}}" method="post" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                  <div class="modal fade" id="modal-default{{$att+1}}">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Attribute</h4>
                        </div>
                        <div class="modal-body">

                            <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Attribute Name*</label>
                                <input type="text" class="form-control" name="update_attribute_name" value="{{$value->attribute_name}}" placeholder="Attribute Name">
                              </div>

                            </div>
                            <!-- /.box-body -->

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                  </form>
                  
                  
                  </td>
                  <td> <center><a href="#" data-toggle="modal" data-target="#modal_delete{{$att+1}}"><i class="fa fa-trash "></i></a></center>
                 
                    <div class="modal fade" id="modal_delete{{$att+1}}">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Do you want to delete this Attribute?</h4>
                            </div>
                            <div class="modal-body">
                                <form action="{{URL('/gift-attributes-save')}}/delete/{{$value->attribute_id}}" method="post">
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

<script>
  $(function () {
    
    $('#attributeList').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>