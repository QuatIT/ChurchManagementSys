<?php
$dropactive = "account";
$active = "crtaccount";
include 'layout/headside.php';

if(isset($_POST['submit'])){
    $account_id = htmlspecialchars(trim($_POST['accID']));
    $account_name = htmlspecialchars(trim($_POST['accName']));
    $account_type_id = htmlspecialchars(trim($_POST['accType']));
    
    $saveAccType = insert("INSERT INTO account_tb(account_id,branch_id,account_name,account_type_id) VALUES('$account_id','$churchID','$account_name','$account_type_id')");
    
    if($saveAccType){
//        $s = "success";
        echo "<script>window.location.href='create-account';</script>";
        echo "<script type='text/javascript'>toastr.success('ACCOUNT TYPE CREATED','SUCCESS',{timeOut: 7000})</script>";
    }else{
        echo "<script type='text/javascript'>toastr.error('PLEASE TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
    }
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">CREATE ACCOUNT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Account</a></li>
              <li class="breadcrumb-item active">Create Account</li>
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
                              <label>Account ID</label>
        <input type="text" class="form-control" name="accID" value="<?php echo "ACC-".rand(10,50).rand(100,999).rand(42,98).rand(60,500);?>" placeholder="Account ID" required readonly />
                            </div>
                            <div class="form-group">
                              <label>Account Name</label>
                                  <input type="text" class="form-control" name="accName" placeholder="Account Name" required />
                            </div>
                            <div class="form-group">
                              <label>Account Type <i class="text-danger">*</i></label>
                              <select class="form-control select2" data-placeholder="Select an Account Type" name="accType" style="width: 100%;" required>
                                <option></option>
                                  <?php
                                  $getaccType = select("SELECT * FROM account_type_tb WHERE branch_id='$churchID'");
                                  if(count($getaccType) > 0){
                                      foreach($getaccType as $getaccTyped){
                                  ?>
                                <option value="<?php echo $getaccTyped['account_type_id'];?>"><?php echo $getaccTyped['account_type_name'];?></option>
                                  <?php }}?>
                              </select>
                            </div>
                            <div class="form-group">
<!--                                <label>.</label>-->
                                <input type="submit" name="submit" onclick="return confirm('CREATE ACCOUNT ?');" value="CREATE ACCOUNT" class="btn btn-primary btn-block btn-md" />  
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
                    <th>BALANCE</th>
                    <th>ACCOUNT TYPE</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getministry = select("SELECT account_id, account_type_id, account_name,acc_balance FROM account_tb WHERE branch_id='$churchID'");
                      if($getministry){
                    foreach($getministry as $mingotten){
                    $accTypeid = $mingotten['account_type_id'];
                        $acctype = select("SELECT account_type_name from account_type_tb WHERE account_type_id='$accTypeid'");
                   
                            foreach($acctype as $acctypeName){
                                $accountNameT = $acctypeName['account_type_name'];
                            }
                ?>
                  <tr>
                    <td> <?php echo $mingotten['account_id'];?> </td>
                    <td> <?php echo $mingotten['account_name'];?> </td>
                    <td> <?php echo $mingotten['acc_balance'];?> </td>
                    <td> <?php echo $accountNameT;?> </td>
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