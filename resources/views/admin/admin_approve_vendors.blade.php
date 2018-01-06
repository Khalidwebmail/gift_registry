<?php
$pageInfo = ['pageTitle' => 'Approve Vendors', 
    'pageSummery' => 'Approve Vendor Registration', 
    'tabTitle' => 'Approve Vendors', 
    'bread1' => 'Dashboard', 
    'bread1_url' => '',
    'bread2' => 'Approve Vendors',
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

    <!-- Main content -->
    <section class="content">
     
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Un-approved Vendor List</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>SL</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Vefication</th>
                  <th>Status</th>
                  <th>Approval</th>
                  <th>ID</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                
                <tr>
                  <td>1</td>
                  <td>Zobair Khondaker</td>
                  <td>rion.mrk@gmail.com</td>
                  <td>Verified</td>
                  <td>Active</td>
                  <td>Not Approved</td>
                  <td>1</td>
                  <td>
                      <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-edit "></i> Update</a></li>
                          <li><a href="#" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-trash "></i> Delete</a></li>
                          <li><a href="#" data-toggle="modal" data-target="#modal-default"><i class="fa fa-check "></i> Enable</a></li>
                          <li><a href="#" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-ban "></i> Disable</a></li>
                          <li><a href="#" data-toggle="modal" data-target="#modal-default"> <i class="fa fa-thumbs-up "></i> Approve</a></li>
                        </ul>
                      </div>
                      
                      
                    <div class="modal fade" id="modal-default">
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
                                <label for="exampleInputEmail1">Category Name*</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Attribute Name">
                              </div>

                            </div>
                            <!-- /.box-body -->

                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                      
                      
                      
                      
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Zobair Khondaker</td>
                  <td>rion.mrk@gmail.com</td>
                  <td>Verified</td>
                  <td>Active</td>
                  <td>Not Approved</td>
                  <td>2</td>
                  <td>
                      <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#">Update</a></li>
                          <li><a href="#">Delete</a></li>
                          <li><a href="#">Enable</a></li>
                          <li><a href="#">Disable</a></li>
                        </ul>
                      </div>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>SL</th>
                  <th>Full Name</th>
                  <th>Email</th>
                  <th>Vefication</th>
                  <th>Status</th>
                  <td>Approval</td>
                  <th>ID</th>
                  
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  







@include('admin.admin_footer')