<?php
$dropactive = "settings";
$active = "crttypeaccount";
include 'layout/headside.php';

if(isset($_POST['submit'])){
    $accTypeID = htmlspecialchars(trim($_POST['accTypeID']));
    $accName = htmlspecialchars(trim($_POST['accName']));
    
    $saveAccType = insert("INSERT INTO account_type_tb(branch_id,account_type_id,account_type_name) VALUES('$churchID','$accTypeID','$accName')");
    
    if($saveAccType){
        $s = "success";
        echo "<script>window.location.href='create-account-type?a=$s';</script>";
    }else{
        echo "<script type='text/javascript'>toastr.error('PLEASE TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
    }
}

//ALERT
if(@$_GET['a'] == 'success'){
    echo "<script type='text/javascript'>toastr.success('ACCOUNT TYPE SAVED','SUCCESS',{timeOut: 7000})</script>";
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">CREATE ACCOUNT TYPE</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Account</a></li>
              <li class="breadcrumb-item active">Create Account Type</li>
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
                              <label>Account Type ID</label>
                                <input type="text" class="form-control" name="accTypeID" value="<?php echo "ACT-".rand(10,50).rand(100,500).rand(42,98).rand(400,900);?>" placeholder="Account Type ID" required readonly />
                            </div>
                            <div class="form-group">
                              <label>Account Type Name</label>
                                  <input type="text" class="form-control" name="accName" placeholder="Account Name" required />
                            </div>
                            <div class="form-group">
                                <!--   <label>.</label>-->
            <input type="submit" name="submit" onclick="return confirm('CREATE ACCOUNT TYPE ?');" value="CREATE ACCOUNT TYPE" class="btn btn-primary btn-block btn-md" />  
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
                    <th>ACCOUNT ID</th>
                    <th>ACCOUNT NAME</th>
<!--                    <th>ACTION</th>-->
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getministry = select("SELECT account_type_id, account_type_name FROM account_type_tb WHERE branch_id='$churchID'");
                      if($getministry){
                    foreach($getministry as $mingotten){
                    
                ?>
                  <tr>
                    <td> <?php echo $mingotten['account_type_id'];?> </td>
                    <td> <?php echo $mingotten['account_type_name'];?> </td>
<!--                    <td> X </td>-->
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