<?php 
session_start();
if (!isset($_SESSION['userData'])) {
   echo "<script>window.location.href='index.php';</script>";
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Kamhan | Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/style.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- datatable -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- end -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/dpr-logo.png" alt="AdminLTELogo">
  </div> -->

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../index.php" target="_blank">Visit Website</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto align-items-center">
      <!-- Navbar Search -->

      <li class="nav-item">
        <span class="name">
          <?php 
            $name = substr($_SESSION['userData']['type'], 0, 1);
            echo ucfirst($name);
          ?>  
        </span>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" role="button">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="javascript:void(0);" class="brand-link">
      <img src="dist/img/kamhanlogo.png" alt="AdminLTE Logo" class="brand-image">
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item <?php echo $page == 'manage_password' ? 'menu-is-opening menu-open':''; ?>">
             <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Administrator
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="<?php echo $page == 'manage_password' ? 'display: block;':'display: none;'; ?>">
              <li class="nav-item">
                <a href="manage-password.php" class="nav-link  <?php echo $page == 'manage_password' ? 'active':''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Password</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php echo $page == 'news&event' ? 'menu-is-opening menu-open':''; ?>">
            <a href="#" class="nav-link <?php echo $page == 'news&event' ? 'ative':''; ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                News and Event
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="<?php echo $page == 'news&event' ? 'display: block;':'display: none;'; ?>">
              <li class="nav-item">
                <a href="new-and-event.php" class="nav-link <?php echo $page == 'news&event' ? 'active':''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php echo $page == 'category' || $page == 'sub_category' ? 'menu-is-opening menu-open':''; ?>">
            <a href="#" class="nav-link <?php echo $page == 'category' || $page == 'sub_category' ? 'ative':''; ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Category
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="<?php echo $page == 'category' || $page == 'sub_category' ? 'display: block;':'display: none;'; ?>">
              <li class="nav-item">
                <a href="main-category.php" class="nav-link <?php echo $page == 'category' ? 'active':''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Main Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="sub-category.php" class="nav-link <?php echo $page == 'sub_category' ? 'active':''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Sub Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php echo $page == 'products' ? 'menu-is-opening menu-open':''; ?>">
            <a href="#" class="nav-link <?php echo $page == 'products' ? 'ative':''; ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="<?php echo $page == 'products' || $page == 'view_products' ? 'display: block;':'display: none;'; ?>">
              <li class="nav-item">
                <a href="add-products.php" class="nav-link <?php echo $page == 'products' ? 'active':''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="view-and-edit.php" class="nav-link <?php echo $page == 'view_products' ? 'active':''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View/Edit</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item <?php echo $page == 'slider' ? 'menu-is-opening menu-open':''; ?>">
            <a href="#" class="nav-link <?php echo $page == 'slider' ? 'ative':''; ?>">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Slider
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="<?php echo $page == 'slider' ? 'display: block;':'display: none;'; ?>">
              <li class="nav-item">
                <a href="add-slider.php" class="nav-link <?php echo $page == 'slider' ? 'active':''; ?>">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Slider</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a href="logout.php" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                  Logout
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <p>
                OFFER 
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">