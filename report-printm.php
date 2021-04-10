<?php
include 'assets/core/connection.php';
    $churchID = $_SESSION['branch'];
if(isset($_GET['mt'])){
    $Type = $_GET['mt'];
}
?>

<html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>THE ROHI CHURCH - ALPHA SIGMA </title>
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
    <body>
        <h1 class="text-center"> THE ROHI CHURCH </h1>
        
    <?php if($Type == 'group'){ ?>
        <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3> GROUP REPORTS</h3>
                </div>
              <div class="card-body">
                <table id="attrep" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="50%">GROUP NAME</th>
                    <th>NO. OF MEMBERS</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getgmin = select("SELECT * FROM g_ministry_tb WHERE branch_id='$churchID'");
                      if($getgmin){
                    foreach($getgmin as $getgmind){
                        $serng = select("select * from membership_tb where group_name='".$getgmind['g_id']."' or group_name='".$getgmind['g_name']."'");
                            $numMembersg = count($serng)
                ?>
                  <tr>
                    <td> <?php echo $getgmind['g_name'];?> </td>
                    <td> <?php echo $numMembersg;?> </td>
                  </tr>
                      <?php  }
                    }?>
                  </tbody>
                </table>
              </div>
            </div>
        </div> 
        </div>
    <?php }?>  
        
    <?php if($Type == 'ministry'){ ?>
        <div class="row">
        <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
                <div class="card-header">
                    <h3>MINISTRY REPORT</h3>
                </div>
              <div class="card-body">
                <table id="transrep" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="50%">MINISTRY NAME</th>
                    <th>NO. OF MEMBERS</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getmin = select("SELECT * FROM ministry_tb WHERE branch_id='$churchID'");
                      if($getmin){
                    foreach($getmin as $getmind){
                        $sern = select("select * from membership_tb where group_name='".$getmind['group_id']."' or group_name='".$getmind['group_name']."'");
                        $numMembers = count($sern)
                ?>
                  <tr>
                    <td> <?php echo $getmind['group_name'];?> </td>
                    <td> <?php echo $numMembers;?> </td>
                  </tr>
                      <?php  } }?>
                      

                  </tbody>
                </table>
              </div>
            </div>
        </div>  
        </div>
    <?php }?>   
        
        
        
    </body>
    <script>window.print()</script>
</html>