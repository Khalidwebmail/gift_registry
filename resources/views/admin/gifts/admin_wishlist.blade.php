<?php
$pageInfo = ['pageTitle' => 'Manage Wishlist', 
    'pageSummery' => 'View/delete Wishlist listing', 
    'tabTitle' => 'Manage Wishlist', 
    'bread1' => 'Dashboard', 
    'bread1_url' => '',
    'bread2' => 'Manage Wishlist',
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
    <section class="col-lg-12 content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> Wishlist </h3>

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
                  <th>Wishlist Name</th>
                  <th>Code</th>
                  <th>Wishlist Holder ID</th>
                  <th>Wishlist Holder Name</th>
                  <th>View</th>
                 
                  <th>Delete</th>
                 
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1</td>
                  <td>Internet
                    Explorer 4.0
                  </td>
                  <td>1039GX</td>
                  <td>Win 95+</td>
                  <td>Win 95+</td>
                  <td>Win 95+</td>
                  <td> 
                  <center><a href="#" data-toggle="modal" data-target="#modal-default"><i class="fa fa-edit "></i></a></center></td>
                  
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
             
                </tr>
                <tr>
                  <td>2</td>
                  <td>Win 95+</td>
                  <td>1039GX</td>
                  <td>5</td>
                  <td>Win 95+</td>
                  <td>Win 95+</td>
                 
                  <td> 4</td>
                 
                </tr>
                <tr>
                  <td>3</td>
                  <td>Win 95+</td>
                  <td>1039GX</td>
                  <td>5.5</td>
                  <td>Win 95+</td>
                  <td>Win 95+</td>
                 
                  
                  <td>X</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Win 98+</td>
                  <td>1039GX</td>
                  <td>6</td>
                  <td>Win 95+</td>
                  <td>Win 95+</td>
                 
                  
                  <td>X</td>
                </tr>
                <tr>
                  <td>5</td>
                  <td>Win XP SP2+</td>
                  <td>1039GX</td>
                  <td>7</td>
                  <td>A</td>
                  <td>Win 95+</td>
                  
                  <td>X</td>
                </tr>
                <tr>
                  <td>6</td>
                  <td>Win XP</td>
                  <td>1039GX</td>
                  <td>6</td>
                  <td>Win 95+</td>
                  <td>Win 95+</td>
                 
                 
                  <td>X</td>
                </tr>
               
                
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