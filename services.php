<?php
$dropactive = "settings";
$active = "services";
include 'layout/headside.php';

if(isset($_POST['submit'])){
    $serviceID = htmlspecialchars(trim($_POST['serviceID']));
    $serviceName = htmlspecialchars(trim($_POST['serviceName']));
    
    $saveService = insert("INSERT INTO service_tb(branch_id,service_id,service_name) VALUES('$churchID','$serviceID','$serviceName')");
    
    if($saveService){
        $s = "savesuccess";
        echo "<script>window.location.href='services?a=$s';</script>";
    }else{
        $s = "saveerror";
        echo "<script>window.location.href='services?a=$s';</script>";
    }
}

//ALERT
if(@$_GET['a'] == 'savesuccess'){
    echo "<script type='text/javascript'>toastr.success('SERVICE SAVED','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['a'] == 'saveerror'){
    echo "<script type='text/javascript'>toastr.error('SAVING FAILED, TRY AGAIN','ERROR',{timeOut: 7000})</script>";
}
//ALERT
if(@$_GET['ua'] == 'updatesucc'){
    echo "<script type='text/javascript'>toastr.success('UPDATE SAVED','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['ua'] == 'updateerror'){
    echo "<script type='text/javascript'>toastr.error('UPDATE FAILED, TRY AGAIN','ERROR',{timeOut: 7000})</script>";
}
//ALERT
if(@$_GET['ta'] == 'trashsuccess'){
    echo "<script type='text/javascript'>toastr.success('SERVICE TRASHED','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['ta'] == 'trasherror'){
    echo "<script type='text/javascript'>toastr.error('UPDATE FAILED, TRY AGAIN','ERROR',{timeOut: 7000})</script>";
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">MANAGE SERVICES</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Services</a></li>
              <li class="breadcrumb-item active">Manage Services</li>
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
                                <input type="text" class="form-control" name="serviceID" value="<?php echo "SRV-".rand(10,50).rand(100,500).rand(42,98).rand(400,900);?>" placeholder="Service ID" required readonly />
                            </div>
                            <div class="form-group">
                              <label>Service Name</label>
                                  <input type="text" class="form-control" name="serviceName" placeholder="Service Name" required />
                            </div>
                            <div class="form-group">
                                <!--   <label>.</label>-->
            <input type="submit" name="submit" onclick="return confirm('CREATE SERVICE ?');" value="CREATE SERVICE" class="btn btn-primary btn-block btn-md" />  
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
                    <th class="text-center">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getministry = select("SELECT * FROM service_tb WHERE branch_id='$churchID'");
                      if($getministry){
                    foreach($getministry as $mingotten){
                    
                ?>
                  <tr>
                    <td> <?php echo $mingotten['service_id'];?> </td>
                    <td> <?php echo $mingotten['service_name'];?> </td>
                    <td class="text-center"> 
                        <a href="update-service?sid=<?php echo $mingotten['service_id'];?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        
                            <a href="trash-service?id=<?php echo $mingotten['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('TRASH RECORD');"><i class="fa fa-trash"></i> Trash</a>
                      
                      </td>
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