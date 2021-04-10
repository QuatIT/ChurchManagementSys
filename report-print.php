<?php
session_start();
include 'assets/core/connection.php';
$churchID = $_SESSION['branch'];
if(isset($_GET['st'])){
    $Type = $_GET['st'];
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
    <?php 
        if($Type == 'service'){ 
            $sn = $_GET['sn'];
//           $serviceName = trim(htmlentities($_POST['service_name']));
            $servna = select("select * from service_tb where service_id='$sn' AND branch_id='$churchID'");
            foreach($servna as $servnadet){}
        ?>
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h2 class="text-center">REPORT FOR <?php echo strtoupper($servnadet['service_name']);?></h2>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="attrep" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>DATE</th>
                    <th>SERVICE</th>
                    <th>MEN</th>
                    <th>WOMEN</th>
                    <th>YOUTH</th>
                    <th>CHILDREN</th>
                    <th>NO LIMIT</th>
                    <th>TOTAL</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
            $counter = 0;
                 $gettransaction = select("SELECT * FROM attendance_tb WHERE ministry_id='$sn'");
                      if($gettransaction){
                    foreach($gettransaction as $transdet){
                        $counter++;
                        //GET service name
                        $sern = select("select * from service_tb where service_id='".$transdet['ministry_id']."'");
                        foreach($sern as $servgot){
                ?>
                  <tr>
                    <td> <?php echo $counter;?> </td>
                    <td> <?php echo $transdet['attend_date'];?> </td>
                    <td> <?php echo $servgot['service_name'];?> </td>
                    <td> <?php echo $transdet['men'];?> </td>
                    <td> <?php echo $transdet['women'];?> </td>
                    <td> <?php echo $transdet['youth'];?> </td>
                    <td> <?php echo $transdet['children'];?> </td>
                    <td> <?php echo $transdet['nolimit'];?> </td>
                    <td> <?php echo $transdet['population'];?> </td>
                  </tr>
                      <?php } }
                    }?>
                    
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        </div>
    <?php }?>
        
        
        
    <?php 
        if($Type == 'date'){ 
            $sd = $_GET['sd'];
//           $serviceName = trim(htmlentities($_POST['service_name']));
            $servna = select("select * from service_tb where service_id='$sd' AND branch_id='$churchID'");
            foreach($servna as $servnadet){}
        ?>
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h2 class="text-center">REPORT FOR <?php echo strtoupper(date("l jS F Y",strtotime($sd)));?></h2>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="attrep" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>DATE</th>
                    <th>SERVICE</th>
                    <th>MEN</th>
                    <th>WOMEN</th>
                    <th>YOUTH</th>
                    <th>CHILDREN</th>
                    <th>NO LIMIT</th>
                    <th>TOTAL</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
            $counter = 0;
                 $gettransaction = select("SELECT * FROM attendance_tb WHERE attend_date='$sd'");
                      if($gettransaction){
                    foreach($gettransaction as $transdet){
                        $counter++;
                        //GET service name
                        $sern = select("select * from service_tb where service_id='".$transdet['ministry_id']."'");
                        foreach($sern as $servgot){
                ?>
                  <tr>
                    <td> <?php echo $counter;?> </td>
                    <td> <?php echo $transdet['attend_date'];?> </td>
                    <td> <?php echo $servgot['service_name'];?> </td>
                    <td> <?php echo $transdet['men'];?> </td>
                    <td> <?php echo $transdet['women'];?> </td>
                    <td> <?php echo $transdet['youth'];?> </td>
                    <td> <?php echo $transdet['children'];?> </td>
                    <td> <?php echo $transdet['nolimit'];?> </td>
                    <td> <?php echo $transdet['population'];?> </td>
                  </tr>
                      <?php } }
                    }?>
                    
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        </div>
    <?php }?> 
        
        
        
              
    <?php if($Type == 'full'){ ?>
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h2 class="text-center">FULL ATTENDANCE REPORT</h2>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="attrep" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>DATE</th>
                    <th>SERVICE</th>
                    <th>MEN</th>
                    <th>WOMEN</th>
                    <th>YOUTH</th>
                    <th>CHILDREN</th>
                    <th>NO LIMIT</th>
                    <th>TOTAL</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                    $counter = 0;
                    $gettransaction = select("SELECT * FROM attendance_tb WHERE branch_id='$churchID'");
                      if($gettransaction){
                    foreach($gettransaction as $transdet){
                        $counter++;
                        //GET service name
                        $sern = select("select * from service_tb where service_id='".$transdet['ministry_id']."'");
                        foreach($sern as $servgot){
                ?>
                  <tr>
                    <td> <?php echo $counter;?> </td>
                    <td> <?php echo $transdet['attend_date'];?> </td>
                    <td> <?php echo $servgot['service_name'];?> </td>
                    <td> <?php echo $transdet['men'];?> </td>
                    <td> <?php echo $transdet['women'];?> </td>
                    <td> <?php echo $transdet['youth'];?> </td>
                    <td> <?php echo $transdet['children'];?> </td>
                    <td> <?php echo $transdet['nolimit'];?> </td>
                    <td> <?php echo $transdet['population'];?> </td>
                  </tr>
                      <?php } }
                    }?>
                    
                  </tbody>
                </table>
              </div>
            </div>
        </div>
        </div>
    <?php }?>   
        
        
                
        
              
    <?php 
        if($Type == 'daterange'){ 
            $df = $_GET['df'];
            $dt = $_GET['dt'];
//           $serviceName = trim(htmlentities($_POST['service_name']));
            $servna = select("select * from service_tb where service_id='$sd' AND branch_id='$churchID'");
            foreach($servna as $servnadet){}
        ?>
        <div class="row">
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <h4 class="text-center">REPORT FROM <?php echo strtoupper(date("l jS F Y",strtotime($df)));?> TO <?php echo strtoupper(date("l jS F Y",strtotime($dt)));?></h4>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="attrep" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>DATE</th>
                    <th>SERVICE</th>
                    <th>MEN</th>
                    <th>WOMEN</th>
                    <th>YOUTH</th>
                    <th>CHILDREN</th>
                    <th>NO LIMIT</th>
                    <th>TOTAL</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
            $counter = 0;
                 $gettransaction = select("SELECT * FROM attendance_tb WHERE attend_date BETWEEN '$df' AND '$dt'");
                      if($gettransaction){
                    foreach($gettransaction as $transdet){
                        $counter++;
                        //GET service name
                        $sern = select("select * from service_tb where service_id='".$transdet['ministry_id']."'");
                        foreach($sern as $servgot){
                ?>
                  <tr>
                    <td> <?php echo $counter;?> </td>
                    <td> <?php echo $transdet['attend_date'];?> </td>
                    <td> <?php echo $servgot['service_name'];?> </td>
                    <td> <?php echo $transdet['men'];?> </td>
                    <td> <?php echo $transdet['women'];?> </td>
                    <td> <?php echo $transdet['youth'];?> </td>
                    <td> <?php echo $transdet['children'];?> </td>
                    <td> <?php echo $transdet['nolimit'];?> </td>
                    <td> <?php echo $transdet['population'];?> </td>
                  </tr>
                      <?php } }
                    }?>
                    
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