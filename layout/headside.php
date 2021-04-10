<?php
session_start();
require 'assets/core/connection.php';
 if(!$_SESSION['user'] && !$_SESSION['pass'] && !$_SESSION['a_level']){
     echo "<script>window.location.href='index'</script>";
 }else{     
     //get details
    $churchID = $_SESSION['branch'];
    $getfullchurch = select("SELECT * FROM branch_tb WHERE branch_id='$churchID'");
     foreach($getfullchurch as $getfullchurchd){}
 }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>ALPHA SIGMA </title>
    <link rel="icon" type="image/png" sizes="32x32" href="dist/img/icon.png">
<!--    <link rel="icon" type="image/png" sizes="16x16" href="dist/img/icon.png">-->
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="plugins/toastr/toastr.min.css">

  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 -->
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
<!--     layout-navbar-fixed -->
<!--    sidebar-collapse  -->
<!--     layout-fixed  -->
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
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fa fa-cogs"></i>
<!--          <span class="badge badge-danger navbar-badge">0</span>-->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <?php if($_SESSION['a_level'] == 1  || $_SESSION['a_level'] == 2 ){ ?>
          <a href="events" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <i class="fa fa-calendar fa-1x img-size-30 mr-3 img-circle"></i>
              <div class="media-body">
                <h3 class="dropdown-item-title">
                    MANAGE EVENT
                </h3>
              </div>
            </div>
          </a>
          <div class="dropdown-divider"></div>
          <a href="attendance" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
                <i class="fa fa-clock fa-1x img-size-30 mr-3"></i>
              <div class="media-body">
                <h3 class="dropdown-item-title">
                    ATTENDANCE
                </h3>
              </div>
            </div>
          </a>
            <?php }?>
          <div class="dropdown-divider"></div>
            <a href="logout" class="dropdown-item">
            <!-- Message Start -->
            
              <div class="media text-danger">
                <i class="fa fa-power-off img-size-30 mr-3 img-circle"></i>
                  <div class="media-body">
                    <h3 class="dropdown-item-title"> LOGOUT </h3>
                  </div>
              </div>
            
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
      <img src="dist/img/icon.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
        <?php if($_SESSION['a_level'] != 0){?>
      <span class="brand-text font-weight-light"><?php echo $getfullchurchd['branch_name'];?></span>
        <?php }?>
        <?php if($_SESSION['a_level'] == 0){?>
      <span class="brand-text font-weight-light"> AlphaSIGMA </span>
        <?php }?>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image"></div>
        <div class="info">
          <a href="" class="d-block"><?php echo $_SESSION['user'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 text-xs">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!--  DASHBOARD NAV          -->
          <li class="nav-item">
            <a href="dashboard" class="nav-link text-bold <?php if(@$active == "dashboard"){ echo "active";} ?>">
              <i class="nav-icon fas fa-tachometer-alt text-warning"></i>
              <p>
                DASHBOARD
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
            
        <?php if($_SESSION['a_level'] == 4 || $_SESSION['a_level'] == 1  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2){ ?>
            <!--  MEMBERSHIP NAV          -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if(@$dropactive == "membership"){ echo "active";} ?>">
              <i class="nav-icon fas fa-users text-warning"></i>
              <p>
                MEMBERSHIP
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="new-member" class="nav-link <?php if(@$active == "newmember"){ echo "active";} ?>">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Register Member</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-member" class="nav-link <?php if(@$active == "managemember"){ echo "active";} ?>">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Manage Members</p>
                </a>
              </li>
            
              <li class="nav-item">
                <a href="new-guest" class="nav-link <?php  if(@$active == "newguests"){ echo "active";} ?>">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Register Guest</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-guest" class="nav-link <?php if(@$active == "manageguest"){ echo "active";} ?>">
                  <i class="fa fa-users nav-icon"></i>
                  <p>Manage Guests</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-non-members" class="nav-link <?php if(@$active == "managenonmember"){ echo "active";} ?>">
                  <i class="fa fa-users text-danger nav-icon"></i>
                  <p>Flagged Member</p>
                </a>
              </li>
            </ul>
          </li>
            
            <!--  SPECIALS NAV          -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if(@$dropactive == "specials"){ echo "active";} ?>">
              <i class="nav-icon fas fa-gift text-warning"></i>
              <p>
                SPECIALS
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a href="specials-birthdays" class="nav-link <?php if(@$active == "birthdays"){ echo "active";} ?>">
                  <i class="fa fa-calendar nav-icon"></i>
                  <p>Birthdays</p>
                </a>
              </li>   
            </ul>
          </li>
            
            
            <!--  ATTENDANCE NAV    -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if(@$dropactive == "attendance"){ echo "active";} ?>">
              <i class="nav-icon fas fa-check-circle text-warning"></i>
              <p>
                ATTENDANCE
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="headcount" class="nav-link <?php if(@$active == "headcount"){ echo "active";} ?>">
                  <i class="fa fa-stopwatch nav-icon"></i>
                  <p>Head Count</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="attendance" class="nav-link <?php if(@$active == "markattendance"){ echo "active";} ?>">
                  <i class="fa fa-check-square nav-icon"></i>
                  <p>Mark Attendance</p>
                </a>
              </li>
            </ul>
          </li>
            <?php }?>
            
            <?php if(($_SESSION['a_level'] == 0) AND ($churchID == 'quat')){ ?>
            <!--  CHURCH NAV          -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if(@$dropactive == "church"){ echo "active";} ?>">
              <i class="nav-icon fas fa-home text-warning"></i>
              <p>
                CHURCH
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="admin-new-church" class="nav-link <?php if(@$active == "newchurch"){ echo "active";} ?>">
                  <i class="fa fa-home nav-icon"></i>
                  <p>New Church</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="admin-church-users" class="nav-link <?php if(@$active == "manchurch"){ echo "active";} ?>">
                  <i class="fa fa-user nav-icon"></i>
                  <p>Church Admin</p>
                </a>
              </li>
            </ul>
          </li>
            <?php }?>
            
             <?php if($_SESSION['a_level'] == 1  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2){ ?>
            <!--  MINISTRY NAV          -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if(@$dropactive == "ministry"){ echo "active";} ?>">
              <i class="nav-icon fas fa-chart-pie text-warning"></i>
              <p>
                MINISTRY
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="manage-ministry" class="nav-link <?php if(@$active == "manministry"){ echo "active";} ?>">
                  <i class="fa fa-chart-pie nav-icon"></i>
                  <p>Manage Ministry</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-groups" class="nav-link <?php if(@$active == "gministry"){ echo "active";} ?>">
                  <i class="fa fa-chart-pie nav-icon"></i>
                  <p>Other Groups</p>
                </a>
              </li>
            </ul>
          </li>
            <?php }?>
            
        <?php  if($_SESSION['a_level'] == 3 || $_SESSION['a_level'] == 1  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2){  ?>
            <!--  ACCOUNT TAB          -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if(@$dropactive == "account"){ echo "active";} ?>">
              <i class="nav-icon fas fa-money-check-alt text-warning"></i>
              <p>
                ACCOUNTS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
<!--
              <li class="nav-item">
                <a href="record-offering" class="nav-link <?#php if(@$active == "offeringaccount"){ echo "active";} ?>">
                  <i class="fa fa-money-check-alt nav-icon"></i>
                  <p>Record Offering</p>
                </a>
              </li>
-->
              <li class="nav-item">
                <a href="tithe-account" class="nav-link <?php if(@$active == "titheaccount"){ echo "active";} ?>">
                  <i class="fa fa-money-check-alt nav-icon"></i>
                  <p>Record Tithe</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pledge" class="nav-link <?php if(@$active == "cpledgepage"){ echo "active";} ?>">
                  <i class="fa fa-money-check-alt nav-icon"></i>
                  <p>Record Pledge</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-pledges" class="nav-link <?php if(@$active == "mpledgepage"){ echo "active";} ?>">
                  <i class="fa fa-money-check-alt nav-icon"></i>
                  <p>Pledge Management</p>
                </a>
              </li>
                
              <li class="nav-item">
                <a href="post-account" class="nav-link <?php if(@$active == "postaccount"){ echo "active";} ?>">
                  <i class="fa fa-money-check-alt nav-icon"></i>
                  <p>Post Account</p>
                </a>
              </li>
            </ul>
          </li>            
        <?php }?> 
            
        <?php  if($_SESSION['a_level'] == 5 || $_SESSION['a_level'] == 1  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2){  ?>
            <!-- COUNSELLING   -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if(@$dropactive == "COUNSELLING"){ echo "active";} ?>">
              <i class="nav-icon fas fa-heartbeat text-warning"></i>
              <p>
                COUNSELLING
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="new-councelling" class="nav-link <?php if(@$active == "newcounselling"){ echo "active";} ?>">
                  <i class="fa fa-heartbeat nav-icon"></i>
                  <p>New Counselling</p>
                </a>
              </li>
<!--
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Counseling</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Finished Counseling</p>
                </a>
              </li>
-->
            </ul>
          </li>  
        <?php }?>
            
                      
        <?php  if($_SESSION['a_level'] == 1  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2){  ?>    
            <!--  INVENTORY    -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if(@$dropactive == "inventory"){ echo "active";} ?>">
              <i class="nav-icon fas fa-list text-warning"></i>
              <p>
                INVENTORY
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="inventory" class="nav-link <?php if(@$active == "addinventory"){ echo "active";} ?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>New Inventory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="manage-inventory" class="nav-link <?php if(@$active == "maninventory"){ echo "active";} ?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Manage Inventory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="flagged-inventory" class="nav-link <?php if(@$active == "flaggedinventory"){ echo "active";} ?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Flagged Inventory</p>
                </a>
              </li>
            </ul>
          </li> 
            <?php }?>
                        
            <!--  SYSTEM SETTINGS -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if(@$dropactive == "settings"){ echo "active";} ?>">
              <i class="nav-icon fas fa-cog text-warning"></i>
              <p>
                SETTINGS
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                
                <?php  if($_SESSION['a_level'] == 3 || $_SESSION['a_level'] == 1  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2){  ?>
              <li class="nav-item">
                <a href="create-account-type" class="nav-link <?php if(@$active == "crttypeaccount"){ echo "active";} ?>">
                  <i class="fa fa-money-check-alt nav-icon"></i>
                  <p>Account Type</p>
                </a>
              </li>
                
              <li class="nav-item">
                <a href="create-account" class="nav-link <?php if(@$active == "crtaccount"){ echo "active";} ?>">
                  <i class="fa fa-money-check-alt nav-icon"></i>
                  <p>Account</p>
                </a>
              </li>
                <?php }?>
                
            <?php  if($_SESSION['a_level'] == 4 || $_SESSION['a_level'] == 1  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2){  ?>
              <li class="nav-item">
                <a href="services" class="nav-link <?php if(@$active == "services"){ echo "active";} ?>">
                  <i class="fa fa-list nav-icon"></i>
                  <p>Services</p>
                </a>
              </li>
            <?php }?>
                
            <?php  if($_SESSION['a_level'] == 1  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2){  ?>
              <li class="nav-item">
                <a href="branches" class="nav-link <?php if(@$active == "branches"){ echo "active";} ?>">
                  <i class="fa fa-sitemap nav-icon"></i>
                  <p>Branches</p>
                </a>
              </li>
                      
              <li class="nav-item">
                <a href="users" class="nav-link <?php if(@$active == "manusers"){ echo "active";} ?>">
                  <i class="fa fa-users nav-icon"></i>
                  <p>System Users</p>
                </a>
              </li>
             <?php }?>
            </ul>
          </li>            
              
            <!-- REPORTS   -->
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?php if(@$dropactive == "reports"){ echo "active";} ?>">
              <i class="nav-icon fas fa-folder text-warning"></i>
              <p> REPORTS <i class="right fas fa-angle-left"></i> </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="report-general" class="nav-link <?php if(@$active == "generalrep"){ echo "active";} ?>">
                  <i class="fa fa-file nav-icon"></i>
                  <p>General Reports</p>
                </a>
              </li>
                
            <?php  if($_SESSION['a_level'] == 4 || $_SESSION['a_level'] == 1  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2){  ?>
              <li class="nav-item">
                <a href="report-attendance" class="nav-link <?php if(@$active == "attendanceReport"){ echo "active";} ?>">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Attendance Reports</p>
                </a>
              </li>
                
              <li class="nav-item">
                <a href="report-ministry" class="nav-link <?php if(@$active == "minreport"){ echo "active";} ?>">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Ministry Reports</p>
                </a>
              </li>
                <?php }?>
                
            <?php  if($_SESSION['a_level'] == 3 || $_SESSION['a_level'] == 1  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2){  ?>
              <li class="nav-item">
                <a href="report-transaction" class="nav-link <?php if(@$active == "transactions"){ echo "active";} ?>">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Transaction Reports</p>
                </a>
              </li>
            <?php }?>
                
            <?php  if($_SESSION['a_level'] == 1  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2  || $_SESSION['a_level'] == 2){  ?>
              <li class="nav-item">
                <a href="report-inventory" class="nav-link <?php if(@$active == "inventrep"){ echo "active";} ?>">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Inventory Reports</p>
                </a>
              </li>
                <?php }?>
            </ul>
          </li>
        
            <!-- LOGOUT    -->
          <li class="nav-item">
            <a href="logout" class="nav-link text-danger text-bold">
              <i class="nav-icon fas fa-power-off"></i>
              <p>
                LOGOUT
                <span class="right badge badge-success">New</span>
              </p>
            </a>
          </li>
            
        </ul>
      </nav>
    </div>
  </aside>