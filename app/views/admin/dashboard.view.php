<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Signature Cuisine: Dashboard</title>

  <!-- Custom CSS -->

  <link href="assets/admin-assets/assets/libs/flot/css/float-chart.css" rel="stylesheet" />
  <!-- Custom CSS -->
  <!-- <link href="assets/admin-assets/dist/css/style.min.css" rel="stylesheet" /> -->
  <link href="assets/admin-assets/dist/css/style.min.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="assets/admin-assets/assets/extra-libs/multicheck/multicheck.css" />
  <link href="assets/admin-assets/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />

  <script src="assets/admin-assets/assets/libs/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap tether Core JavaScript -->
  <script src="assets/admin-assets/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>




</head>

<body>
  <!-- ============================================================== -->
  <!-- Preloader - style you can find in spinners.css -->
  <!-- ============================================================== -->
  <div class="preloader">
    <div class="lds-ripple">
      <div class="lds-pos"></div>
      <div class="lds-pos"></div>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- Main wrapper - style you can find in pages.scss -->
  <!-- ============================================================== -->
  <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <header class="topbar" data-navbarbg="skin5">
      <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin5">
          <!-- ============================================================== -->
          <!-- Logo -->
          <!-- ============================================================== -->
          <a class="navbar-brand" href="<?= BASE_URL ?>/admin-dashboard">
            <!-- Logo icon -->
            <b class="logo-icon ps-2">
              <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
              <!-- Dark Logo icon -->

              <img src="assets/admin-assets/assets/images/logo.png" alt="homepage" class="light-logo" width="25" />
            </b>
            <!--End Logo icon -->
            <!-- Logo text -->
            <span class="logo-text ms-2">
              <!-- dark Logo text -->
              Dashboard
            </span>


          </a>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Toggle which is visible on mobile only -->
          <!-- ============================================================== -->
          <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
          <!-- ============================================================== -->
          <!-- toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-start me-auto">
            <li class="nav-item d-none d-lg-block">
              <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
            </li>

            <!-- add bootstrap title to navbar -->
            <li class="nav-item d-none d-lg-block fs-8">
              <a class="nav-link" href="<?= BASE_URL ?>/admin-dashboard">Signature Cuisine: Dashboard</a>
            </li>





          </ul>
          <!-- ============================================================== -->
          <!-- Right side toggle and nav items -->
          <!-- ============================================================== -->
          <ul class="navbar-nav float-end">

            <li class="nav-item dropdown">
              <a class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                <img src="assets/admin-assets/assets/images/chef.png" alt="user" class="rounded-circle" width="31" style="background-color: white;" />
              </a>
              <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="javascript:void(0)"><i class="mdi mdi-account me-1 ms-1"></i> My
                  Profile</a>

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0)" onclick="logout()"><i class="fa fa-power-off me-1 ms-1"></i> Logout</a>

                <script>
                  function logout() {
                    Swal.fire({
                      title: 'Do you want to log out?',
                      icon: 'question',
                      showCancelButton: true,
                      confirmButtonColor: '#FF0000', // Red color for "Yes"
                      confirmButtonText: 'Yes',
                      cancelButtonText: 'Cancel'
                    }).then((result) => {
                      if (result.isConfirmed) {
                        // User clicked "Yes," redirect to /logout
                        window.location.href = '<?= BASE_URL ?>/admin-logout';
                      }
                    });
                  }
                </script>

              </ul>
            </li>
            <!-- ============================================================== -->
            <!-- User profile and search -->
            <!-- ============================================================== -->
          </ul>
        </div>
      </nav>
    </header>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->

    <?php

    if (isset($_SESSION['temp_msg'])) {
      echo '
            <script>
                Swal.fire({
                    title: "' . $_SESSION['temp_msg'] . '",
                    text: "' . (isset($_SESSION['temp_msg_secondery']) ? $_SESSION['temp_msg_secondery'] : '') . '",
                    icon: "' . (isset($_SESSION['temp_msg_type']) ? $_SESSION['temp_msg_type'] : 'success') . '",
                    showCancelButton: false,
                    confirmButtonText: "Continue"
                });
            </script>
            ';
      unset($_SESSION['temp_msg']);
      unset($_SESSION['temp_msg_secondery']);
      unset($_SESSION['temp_msg_type']);
    }

    ?>



    <?php

    $pages = [
      'food-items' => 'food-items',
      'add-food-item' => 'food-items',
      'edit-food-item' => 'food-items',
      'categories' => 'categories',
      'orders' => 'orders',
      'view-order' => 'orders',
      'customers' => 'customers',
      'reservations' => 'reservations',
      'view-reservation' => 'reservations',
      'add-reservation' => 'reservations',
      'contact-us' => 'contact-us',
      'branches' => 'branches',
      'add-branch' => 'branches',
      'edit-branch' => 'branches',
      'members' => 'members',
      'add-member' => 'members',


    ];

    $page = 'dashboard';

    if (isset($_GET['page'])) {
      if (array_key_exists($_GET['page'], $pages)) {
        $page = $pages[$_GET['page']];
      }
    }

    ?>

    <aside class="left-sidebar" data-sidebarbg="skin5">
      <!-- Sidebar scroll-->
      <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
          <ul id="sidebarnav" class="pt-4">
            <li class="sidebar-item <?php if ($page == 'dashboard') {
                                      echo 'selected';
                                    } ?>">
              <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if ($page == 'dashboard') {
                                                                            echo 'active';
                                                                          } ?>" href="<?= BASE_URL ?>/admin-dashboard" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
            </li>
            <li class="sidebar-item <?php if ($page == 'food-items') {
                                      echo 'selected';
                                    } ?>">
              <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if ($page == 'food-items') {
                                                                            echo 'active';
                                                                          } ?>" href="<?= BASE_URL ?>/admin-dashboard?page=food-items" aria-expanded="false"><i class="mdi mdi-food"></i><span class="hide-menu">Food Items</span></a>
            </li>
            <li class="sidebar-item <?php if ($page == 'categories') {
                                      echo 'selected';
                                    } ?>">
              <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if ($page == 'categories') {
                                                                            echo 'active';
                                                                          } ?>" href="<?= BASE_URL ?>/admin-dashboard?page=categories" aria-expanded="false"><i class="mdi mdi-chart-bubble"></i><span class="hide-menu">Categories</span></a>
            </li>
            <li class="sidebar-item <?php if ($page == 'orders') {
                                      echo 'selected';
                                    } ?>">
              <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if ($page == 'orders') {
                                                                            echo 'active';
                                                                          } ?>" href="<?= BASE_URL ?>/admin-dashboard?page=orders" aria-expanded="false"><i class="mdi mdi-package"></i><span class="hide-menu">Orders</span></a>
            </li>
            <li class="sidebar-item <?php if ($page == 'reservations') {
                                      echo 'selected';
                                    } ?>">
              <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if ($page == 'reservations') {
                                                                            echo 'active';
                                                                          } ?>" href="<?= BASE_URL ?>/admin-dashboard?page=reservations" aria-expanded="false"><i class="mdi mdi-book"></i><span class="hide-menu">Reservations</span></a>
            </li>
            <li class="sidebar-item <?php if ($page == 'contact-us') {
                                      echo 'selected';
                                    } ?>">
              <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if ($page == 'contact-us') {
                                                                            echo 'active';
                                                                          } ?>" href="<?= BASE_URL ?>/admin-dashboard?page=contact-us" aria-expanded="false"><i class="fas fa-comment"></i><span class="hide-menu">Contact Us</span></a>
            </li>

            <?php if ($_SESSION['admin_role'] == 'admin') { ?>

              <li class="sidebar-item <?php if ($page == 'customers') {
                                        echo 'selected';
                                      } ?>">
                <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if ($page == 'customers') {
                                                                              echo 'active';
                                                                            } ?>" href="<?= BASE_URL ?>/admin-dashboard?page=customers" aria-expanded="false"><i class="mdi mdi-human-greeting"></i><span class="hide-menu">Customers</span></a>
              </li>
              <li class="sidebar-item <?php if ($page == 'branches') {
                                        echo 'selected';
                                      } ?>">
                <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if ($page == 'branches') {
                                                                              echo 'active';
                                                                            } ?>" href="<?= BASE_URL ?>/admin-dashboard?page=branches" aria-expanded="false"><i class="mdi mdi-store"></i><span class="hide-menu">Branches</span></a>
              </li>

              <li class="sidebar-item <?php if ($page == 'members') {
                                        echo 'selected';
                                      } ?>">
                <a class="sidebar-link waves-effect waves-dark sidebar-link <?php if ($page == 'members') {
                                                                              echo 'active';
                                                                            } ?>" href="<?= BASE_URL ?>/admin-dashboard?page=members" aria-expanded="false"><i class="fas fa-chess"></i><span class="hide-menu">Admins & Staff</span></a>
              </li>

            <?php } ?>

          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->

    <?php include("app/views/admin/subpages/$subpage.php"); ?>


    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
  </div>
  <!-- ============================================================== -->




  <script src="assets/admin-assets/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
  <script src="assets/admin-assets/assets/extra-libs/sparkline/sparkline.js"></script>
  <!--Wave Effects -->
  <script src="assets/admin-assets/dist/js/waves.js"></script>
  <!--Menu sidebar -->
  <script src="assets/admin-assets/dist/js/sidebarmenu.js"></script>
  <!--Custom JavaScript -->
  <script src="assets/admin-assets/dist/js/custom.min.js"></script>
  <!--This page JavaScript -->
  <!-- <script src="assets/admin-assets/dist/js/pages/dashboards/dashboard1.js"></script> -->
  <!-- Charts js Files -->
  <script src="assets/admin-assets/assets/libs/flot/excanvas.js"></script>
  <script src="assets/admin-assets/assets/libs/flot/jquery.flot.js"></script>
  <script src="assets/admin-assets/assets/libs/flot/jquery.flot.pie.js"></script>
  <script src="assets/admin-assets/assets/libs/flot/jquery.flot.time.js"></script>
  <script src="assets/admin-assets/assets/libs/flot/jquery.flot.stack.js"></script>
  <script src="assets/admin-assets/assets/libs/flot/jquery.flot.crosshair.js"></script>
  <script src="assets/admin-assets/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
  <script src="assets/admin-assets/dist/js/pages/chart/chart-page-init.js"></script>

  <script src="assets/admin-assets/assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
  <script src="assets/admin-assets/assets/extra-libs/multicheck/jquery.multicheck.js"></script>
  <script src="assets/admin-assets/assets/extra-libs/DataTables/datatables.min.js"></script>
  <script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $("#zero_config").DataTable();
  </script>
</body>

</html>