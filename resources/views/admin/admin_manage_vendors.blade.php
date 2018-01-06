<?php
$pageInfo = ['pageTitle' => 'Manage Vendors',
    'pageSummery' => 'Manage Vendors',
    'tabTitle' => 'Manage Vendors',
    'bread1' => 'Dashboard',
    'bread1_url' => '',
    'bread2' => 'Manage Vendors',
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
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Vendor List</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                            title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                            title="Remove">
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
                        <th>Company Name</th>
                        <th>Vefication</th>
                        <th>Status</th>
                        <th>ID</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($value as $key=>$val)

                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{ $val->first_name }} {{$val->last_name}}</td>
                            <td>{{ $val->user_email }}</td>
                            <td>{{ $val->company_name }}</td>
                            @if($val->veryfiy_status ==1)
                                <td>Verified</td>
                            @else
                                <td>Unverified</td>
                            @endif
                            @if($val->activation==1)
                                <td>Active</td>
                            @else
                                <td>Inactive</td>
                            @endif
                            <td>{{ $val->id }}</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button"
                                            data-toggle="dropdown">Action
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a href="#" data-toggle="modal" data-target="#modal_update{{$key+1}}"> <i
                                                        class="fa fa-edit "></i> Update</a></li>
                                        <li><a href="#" data-toggle="modal" data-target="#modal_delete{{$key+1}}"> <i
                                                        class="fa fa-trash "></i> Delete</a></li>
                                        @if($val->activation==0)
                                            <li><a href="#" data-toggle="modal" data-target="#modal_enable{{$key+1}}"><i
                                                            class="fa fa-check "></i> Enable</a></li>
                                        @else
                                            <li><a href="#" data-toggle="modal" data-target="#modal_disable{{$key+1}}">
                                                    <i
                                                            class="fa fa-ban "></i> Disable</a></li>
                                        @endif
                                    </ul>
                                </div>


                                <div class="modal fade" id="modal_update{{$key+1}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Edit Attribute</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/manage_vendors_edit')}}/{{$val->id}}/update"
                                                      method="post">
                                                    {{ csrf_field() }}

                                                    <div class="box-body">
                                                        <div class="form-group has-feedback">
                                                            <label for="exampleInputPassword1">User Name:</label>
                                                            <input type="text" name="user_name" class="form-control"
                                                                   placeholder="User Name" value="{{$val->user_name}}">
                                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                                            <input type="hidden" name="current_user_name"
                                                                   class="form-control" placeholder="Password"
                                                                   value="{{$val->user_name}}">
                                                        </div>
                                                        <div class="form-group has-feedback">
                                                            <label for="exampleInputPassword1">User Email:</label>
                                                            <input type="email" name="user_email" class="form-control"
                                                                   placeholder="Email" value="{{$val->user_email}}">
                                                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                                            <input type="hidden" name="current_user_email"
                                                                   class="form-control" placeholder="Password"
                                                                   value="{{$val->user_email}}">
                                                        </div>
                                                        <div class="form-group has-feedback">
                                                            <label for="exampleInputPassword1">Password:</label>
                                                            <input type="password" name="new_password"
                                                                   class="form-control" placeholder="Password">
                                                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                                                            <input type="hidden" name="current_password"
                                                                   class="form-control" placeholder="Password"
                                                                   value="{{$val->password}}">
                                                        </div>
                                                    </div>
                                                    <!-- /.box-body -->
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default pull-left"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                        <button type="submit" class="btn btn-primary">Save changes
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>

                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->


                                <!-- delete modal start-->

                                <div class="modal fade" id="modal_delete{{$key+1}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Do you want to delete this user ?</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/manage_vendors_delete')}}/{{$val->id}}/delete"
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


                                <!-- delete modal start-->

                                <div class="modal fade" id="modal_enable{{$key+1}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Do you want to enable this user ?</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/manage_vendors_enable')}}/{{$val->id}}/enable"
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


                                <!-- delete modal start-->

                                <div class="modal fade" id="modal_disable{{$key+1}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Do you want to disable this user ?</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ url('/manage_vendors_disable')}}/{{$val->id}}/disable"
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
                    <tfoot>
                    <tr>
                        <th>SL</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Company Name</th>
                        <th>Vefication</th>
                        <th>Status</th>
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