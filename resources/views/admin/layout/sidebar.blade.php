 <aside class="main-sidebar sidebar-dark-primary elevation-4">
  
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/logo/logo.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>
        </div>
      </div>

   

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{ url('admin/dashboard') }}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               
              </p>
            </a>
            
          </li>
         
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-bars"></i>
              <p>
                Menu
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('admin/manage-menu') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Menu</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/add-menu') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Menu</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-bars"></i>
              <p>
                News
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="{{ url('admin/all-news') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All News</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/add-news') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add News</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('admin/all-video') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Video</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('admin/add-video') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Video</p>
                </a>
              </li>

              
            </ul>
          </li>

           <li class="nav-item">
            <a href="{{ url('admin/logout')}}" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
                
              </p>
            </a>
          </li>


         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
