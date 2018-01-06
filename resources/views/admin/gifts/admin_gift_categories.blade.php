<?php
$pageInfo = ['pageTitle' => 'Gift Categories', 
    'pageSummery' => 'Create/edit/delete Gift Categories', 
    'tabTitle' => 'Gift Categories', 
    'bread1' => 'Dashboard', 
    'bread1_url' => '',
    'bread2' => 'Gift Categories',
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
    <section class="col-lg-5 content">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"> Cteate Gift Category </h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
            <form role="form" action="{{url('/save-gift-category')}}" method="POST">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <label for="categoryName">Category Name</label>
                  <input type="text" class="form-control" id="cat_name" placeholder="Category Name" name="name" onkeyup="ActiveAlias(this.value)">
                </div>
                <div class="form-group">
                  <label for="alias">Alias</label>
                  <input type="text" class="form-control" id="alias" placeholder="Alias" name="alias">
                </div>
               
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Create Category</button>
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
          <h3 class="box-title"> Category list </h3>

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
                  <th>Name</th>
                  <th>Slug</th>
                  <th>Publication status</th>

                  <th>Action</th>
                </tr>
                </thead>

                <tbody>
                  @foreach($all_category as $key=>$category)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$category->name}}</td>
                  <td>{{$category->alias}}</td>
                  <td>{{$category->publish}}</td>

                  <td> 
                  
                      <div class="dropdown">
                        <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Action
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">

                          <li><a href="#" data-toggle="modal" data-target="#{{$key+1}}modal-edit"> <i class="fa fa-edit "></i> Update</a></li>

                          <li><a href="#" data-toggle="modal" data-target="#modal_delete{{$key+1}}"> <i class="fa fa-trash "></i> Delete</a></li>

                            <li><a href="{{URL::to('/publish-category/'.$category->id)}}"><i class="fa fa-check "></i> Publish</a></li>

                          <li><a href="{{URL::to('/unpublish-category/'.$category->id)}}"><i class="fa fa-ban "></i> Unpublish</a></li>
                        </ul>
                      </div>
                      
                      <div class="modal fade" id="{{$key+1}}modal-edit">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title">Edit Attribute</h4>
                        </div>
                          <form action="{{url('/update-gift-category')}}/{{$category->id}}" method="post">
                            {{csrf_field()}}
                        <div class="modal-body">
                          
                              <div class="box-body">
                                <div class="form-group">
                                  <label for="categoryName">Category Name*</label>
                                  <input type="text" class="form-control" placeholder="Category Name" value="{{$category->name}}" name="name">
                                </div>
                              </div>

                              <div class="box-body">
                                <div class="form-group">
                                  <label for="alias">Alias*</label>
                                  <input type="text" class="form-control" placeholder="Alias Name" value="{{$category->alias}}" name="alias">
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
                                <form action="{{URL('/delete-category')}}/{{$category->id}}"
                                      method="post">
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
    function ActiveAlias(cat_name) {
        
        var hyphened = cat_name.replace(/ /g, '-');
             document.getElementById('alias').value = hyphened.toLowerCase();
             
    }
</script>