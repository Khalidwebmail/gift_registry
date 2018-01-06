<?php
$pageInfo = ['pageTitle' => 'Wishlist Categories', 
    'pageSummery' => 'Create/edit/delete Wishlist Categories and Listing', 
    'tabTitle' => 'Wishlist Categories', 
    'bread1' => 'Dashboard', 
    'bread1_url' => '',
    'bread2' => 'Wishlist Categories',
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
    <section class="col-lg-5 content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> Create Wishlist Categories </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <form role="form" method="post" action="{{ url('/save-wishlist') }}"> 
              {{ csrf_field() }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Category Name*</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Category name..." name="category_name">
                </div>

              </div>

              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Alias*</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Alias..." name="category_alias">
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
    
    
    <section class="col-lg-7 content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Category of wishlist</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <table id="categoryTable_no" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Category Name</th>
                  <th>Alias</th>
                  <th>Edit</th>
                  <th>Delete</th>
                 
                </tr>
                </thead>
                <tbody>
                  @foreach($wishlist_category as $key=>$wishlist)
                <tr>

                  <td>{{ $key+1 }}</td>
                  <td>{{ $wishlist->category_name }}</td>
                  <td>{{ $wishlist->category_alias }}</td>
                  <td> 
                    <center>
                      <a href="{{ url('/update-wishlist-category') }}/{{ $wishlist->id }}" data-toggle="modal" data-target="#{{$key+1}}modal-default"><i class="fa fa-edit"></i>
                      </a>
                    </center>
                 </td>
                  <td><center><a href="{{ url('/delete-wishlist-category') }}/{{ $wishlist->id }}"><i class="fa  fa-trash-o"></i></a></center></td>
                  <div class="modal fade" id="{{$key+1}}modal-default">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>

                          <h4 class="modal-title">Edit category wishlist</h4>
                        </div>
                        <form action="{{url('/update-wishlist-category')}}/{{ $wishlist->id }}" method="post">
                              {{ csrf_field() }}
                        <div class="modal-body">

                            <div class="box-body">
                              <div class="form-group">
                                <label for="exampleInputEmail1">Category Name*</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="category_name" value="{{ $wishlist->category_name }}">
                              </div>

                              <div class="form-group">
                                <label for="exampleInputEmail1">Alias*</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="category_alias" value="{{ $wishlist->category_alias }}">
                              </div>

                            </div>
                            <!-- /.box-body -->

                        </div>

                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                      </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
             
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