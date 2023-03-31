<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Andres</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('AdminLTE/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            @can('admin.apprentices.index')
          <li class="nav-item">
            <a href="{{ route('admin.apprentices.index') }}" class="nav-link" {{  ! Route::is('admin.apprentices.index*')?: 'active' }}>
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{ trans('menu.Apprentices') }}
              </p>
            </a>
          </li>
          @endcan
          @can('admin.products')
          
          <li class="nav-item">
            <a href="{{ route('admin.products') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{ trans('menu.Products') }}
              </p>
            </a>
          </li>
          @endcan
          @can('admin.caculator')
          
          <li class="nav-item">
            <a href="{{ route('admin.calculator') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                {{ trans('menu.Calculator') }}
              </p>
            </a>
          </li>
          @endcan
          @can('admin.users.index')
          <li class="nav-item">
            <a href="{{ route('admin.users.index') }}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Usuarios
              </p>
            </a>
          </li>
          @endcan
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
