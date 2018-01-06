
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          
          <img src="vendor_image/{{Session::get('user.image')}}" class="img-circle">
        </div>
        <div class="pull-left info">
          <p>{{Session::get('user.user_email')}}</p>
          <a href="#"><i class="fa fa-circle text-success"></i></a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>

        <li class="active_rion">
          <a href="{{ url('/vendor-dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        


           <li><a href="{{url('/vendor-profile')}}"><i class="fa fa-book"></i> <span>Vendor Profile</span></a></li>

        <li><a href="{{URL::to('/vendor-account-security')}}"><i class="fa fa-lock"></i> <span>Account Security</span></a></li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Manage Gifts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('/gift-categories') }}"><i class="fa fa-circle-o"></i> 
                    <span>Gift Categories</span>
                     <span class="pull-right-container">
                     <small class="label pull-right bg-red">3</small>
                    </span>
                </a>
            </li>
            <li><a href="{{ url('/create-gifts') }}"><i class="fa fa-circle-o"></i> Create Gifts </a></li>
            <li><a href="{{ url('/list-of-gifts') }}"><i class="fa fa-circle-o"></i> 
                    <span>List of Gifts</span>
                     <span class="pull-right-container">
                     <small class="label pull-right bg-blue">112</small>
                    </span>
                </a>
            </li>
            <li class="active_rion"><a href="{{ url('/gift-attributes') }}"><i class="fa fa-circle-o"></i> 
                <span>Gift Attributes</span>
                <span class="pull-right-container">
                    <small class="label pull-right bg-blue">112</small>
                </span>
            </a>
              </li>
            
          </ul>
        </li>
        
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Manage WishList</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/wishlist-categories')}}"><i class="fa fa-circle-o"></i> 
                    <span>Wishlist Categories</span>
                     <span class="pull-right-container">
                     <small class="label pull-right bg-red">3</small>
                    </span>
                </a>
            </li>
            <li><a href="{{url('/manage-wishlist')}}"><i class="fa fa-circle-o"></i> 
                    <span>Wishlists</span>
                     <span class="pull-right-container">
                     <small class="label pull-right bg-blue">112</small>
                    </span>
                </a>
            </li>
            
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Manage Accounts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{url('/manage-order-list')}}"><i class="fa fa-circle-o"></i> 
                    <span> Order List </span>
                     <span class="pull-right-container">
                     <small class="label pull-right bg-red">3</small>
                    </span>
                </a>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> 
                    <span> Transaction Details </span>
                     <span class="pull-right-container">
                     <small class="label pull-right bg-blue">112</small>
                    </span>
                </a>
            </li>
            
          </ul>
        </li>
        
        
        
       
        
        
        <li>
          <a href="#">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        
        
        <li><a href="{{url('/system-settings')}}"><i class="fa fa-book"></i> <span>System Information</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Logged in Users</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span> Logged in Vendors </span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span> Admin Login History </span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>