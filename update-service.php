<?php
$dropactive = "settings";
$active = "services";
include 'layout/headside.php';

//if(isset($_POST['submit'])){
//    $serviceID = htmlspecialchars(trim($_POST['serviceID']));
//    $serviceName = htmlspecialchars(trim($_POST['serviceName']));
//    
//    $saveService = insert("INSERT INTO service_tb(service_id,service_name) VALUES('$serviceID','$serviceName')");
//    
//    if($saveService){
//        $s = "savesuccess";
//        echo "<script>window.location.href='services?a=$s';</script>";
//    }else{
//        $s = "saveerror";
//        echo "<script>window.location.href='services?a=$s';</script>";
//    }
//}

//get
$sid = $_GET['sid'];
$fetchService = select("SELECT * FROM service_tb WHERE service_id='$sid'");
foreach($fetchService as $servgot){}


if(isset($_POST['update'])){
    $servid = htmlspecialchars($_POST['serviceID']);
    $servname = htmlspecialchars($_POST['serviceName']);
    
    $update = update("UPDATE service_tb SET service_name='$servname' WHERE service_id='$sid'");
    if($update){
        $s = "updatesucc";
        echo "<script>window.location.href='services?ua=$s';</script>";
    }else{
        $s = "updateerror";
        echo "<script>window.location.href='services?ua=$s';</script>";
    }
}
////ALERT
//if(@$_GET['a'] == 'savesuccess'){
//    echo "<script type='text/javascript'>toastr.success('SERVICE SAVED','SUCCESS',{timeOut: 7000})</script>";
//}
//if(@$_GET['a'] == 'saveerror'){
//    echo "<script type='text/javascript'>toastr.error('SAVING FAILED, TRY AGAIN','ERROR',{timeOut: 7000})</script>";
//}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">UPDATE SERVICES</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Service</a></li>
              <li class="breadcrumb-item active">Update Service</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <div class="row">
            <div class="col-md-4">
                <div class="card card-default">
<!--
                  <div class="card-header">
                    <h3 class="card-title">CREATE ACCOUNT</h3>
                    <div class="card-tools">
                    </div>
                  </div>
-->
                    <form class="form" action="" method="post" enctype="multipart/form-data">

                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                              <label>Service ID</label>
                                <input type="text" class="form-control" name="serviceID" value="<?php echo $servgot['service_id'];?>" placeholder="Service ID" required />
                            </div>
                            <div class="form-group">
                              <label>Service Name</label>
                                  <input type="text" class="form-control" name="serviceName" value="<?php echo $servgot['service_name'];?>" placeholder="Service Name" required />
                            </div>
                            <div class="form-group">
                                <!--   <label>.</label>-->
            <input type="submit" name="update" onclick="return confirm('UPDATE SERVICE ?');" value="UPDATE SERVICE" class="btn btn-primary btn-block btn-md" />  
                            </div>
                        </div>
                        
                    </div>
                  </div>
                    </form>
<!--                  <div class="card-footer"></div>-->
                </div>
            </div>  
            
            
            <div class="col-md-8">
            <div class="card">
<!--
              <div class="card-header">
                <h3 class="card-title">CREATED ACCOUNT LIST</h3>
              </div>
-->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>SERVICE ID</th>
                    <th>SERVICE NAME</th>
<!--                    <th>ACTION</th>-->
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getministry = select("SELECT * FROM service_tb");
                      if($getministry){
                    foreach($getministry as $mingotten){
                    
                ?>
                  <tr>
                    <td> <?php echo $mingotten['service_id'];?> </td>
                    <td> <?php echo $mingotten['service_name'];?> </td>
<!--                    <td> <a href="update-service?sid=<?php echo $mingotten['service_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i></a> </td>-->
                  </tr>
                      <?php }}?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            </div>  
        </div>
      </div>
    </section>
  </div>

<?php
include 'layout/footer.php';    
?>