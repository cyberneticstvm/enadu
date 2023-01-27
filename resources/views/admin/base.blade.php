<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 3</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ public_path().'/admin/plugins/fontawesome-free/css/all.min.css' }}">

  <link rel="stylesheet" href="{{ public_path().'/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css' }}">
  <link rel="stylesheet" href="{{ public_path().'/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css' }}">
  <link rel="stylesheet" href="{{ public_path().'/admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css' }}">

  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ public_path().'/admin/dist/css/adminlte.min.css' }}">
  <link rel="stylesheet" href="{{ public_path().'/admin/dist/css/style.css' }}">
</head>
<div class="wrapper">
	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-slide="true" href="/logout" title="Sign Out" role="button">
          <i class="fa fa-power-off"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ public_path().'/admin/dist/img/AdminLTELogo.png' }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{ Auth::user()->user_type }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ public_path().'/admin/dist/img/user2-160x160.jpg' }}" class="img-circle elevation-2" alt="User Image">
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
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Navigation
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/admin/order" class="nav-link">
                  <i class="fa fa-truck nav-icon"></i>
                  <p>Orders</p>
                </a>
              </li>
			        <li class="nav-item">
                <a href="/admin/category" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Category Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/product" class="nav-link">
                  <i class="fa fa-gift nav-icon"></i>
                  <p>Product Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/staff" class="nav-link">
                  <i class="far fa-user nav-icon"></i>
                  <p>Staff Management</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="/admin/feedback" class="nav-link">
                  <i class="far fa-comment nav-icon"></i>
                  <p>Feedback Management</p>
                </a>
              </li>               
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
	@yield('content')
</div>
<script src="{{ public_path().'/admin/plugins/jquery/jquery.min.js' }}"></script>
<!-- Bootstrap -->
<script src="{{ public_path().'/admin/plugins/bootstrap/js/bootstrap.bundle.min.js' }}"></script>

<script src="{{ public_path().'/admin/plugins/datatables/jquery.dataTables.min.js' }}"></script>
<script src="{{ public_path().'/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js' }}"></script>
<script src="{{ public_path().'/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js' }}"></script>
<script src="{{ public_path().'/admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js' }}"></script>
<script src="{{ public_path().'/admin/plugins/datatables-buttons/js/dataTables.buttons.min.js' }}"></script>
<script src="{{ public_path().'/admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js' }}"></script>


<!-- AdminLTE -->
<script src="{{ public_path().'/admin/dist/js/adminlte.js' }}"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="{{ public_path().'/admin/plugins/chart.js/Chart.min.js' }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ public_path().'/admin/dist/js/demo.js' }}"></script>
<script src="{{ public_path().'/admin/dist/js/script.js' }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ public_path().'/admin/dist/js/pages/dashboard3.js' }}"></script>
</body>
</html>