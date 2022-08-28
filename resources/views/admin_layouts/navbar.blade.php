  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('home')}}" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
               <!--  <i class="right fas fa-angle-left"></i> -->
              </p>
            </a>
           
          </li>
          <li class="nav-item">
            <a href="{{route('users')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Users
               
              </p>
            </a>
          </li>
          <?php $role=Auth::user()->user_role;
          if($role==1){ ?>
          <li class="nav-item">
            <a href="{{route('user_role')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Users Roles
               
              </p>
            </a>
          </li>
        <?php } ?>
          <li class="nav-item">
            <a href="{{route('user_deposit')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Users Deposit Data
                
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('users_withdraw')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Users Withdraw Data
               
              </p>
            </a>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>