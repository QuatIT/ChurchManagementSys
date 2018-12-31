<?php
include 'layout/head.php';

$msg = '';
$error = '';

$acc_type = select("SELECT * FROM account_type_tb ");
$acc_type_sql = select("SELECT * FROM account_type_tb ");
foreach($acc_type_sql as $ac){}

if(isset($_POST['btnSubmit'])){
    $account_id = trim($_POST['account_id']);
    $account_name = trim($_POST['account_name']);
    $account_type = trim($_POST['account_type']);

    if(empty($account_id) || empty($account_name) || empty($account_type)){
          $msg = '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Warning!</strong> Please fill in a inputs.
</div>';
//        echo "<script>window.location.href='create_account.php'</script>";
    }else{
    $sql = insert("INSERT INTO account_tb(account_id,account_name,account_type_id) VALUES('$account_id','$account_name','$account_type')");

    if($sql){
        $msg = '<div class="alert alert-dismissible alert-secondary">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong> Account Created Successfully.
</div>';
    }else{
        $error = '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Sorry!</strong> Something happened.
</div>';
    }
}
}

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:auto;padding:30px;background-color:#fff;">



            <h3>CREATE ACCOUNT  <small class="pull-right"> <a href="create_acctype.php"> <i class="fa fa-edit"></i> CREATE ACCOUNT TYPE</a></small></h3><hr>

            <div class="col-md-6">
            <?php
                if(isset($msg)){
                    echo $msg;
                }else{
                    echo $error;
                }
            ?>
            </div>


            <form action="" method="post">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Account ID </label>

                            <input type="text" name="account_id" value="<?php echo "ACC-".mt_rand(1,9).mt_rand(1000,9999).mt_rand(100,999).date('s'); ?>" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                           <label> Account Name </label>
                            <input type="text" name="account_name" value="<?php echo @$_POST['account_name']; ?>" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Account Type</label>

                            <select name="account_type" class="form-control">
                                            <option value="<?php echo @$ac['account_type_id']; ?>">
                                                <?php echo @$ac['account_type_name']; ?>
                                            </option>
                                        <?php foreach($acc_type as $ac_ty){ ?>
                                            <option value="<?php echo $ac_ty['account_type_id']; ?>">
                                                <?php echo $ac_ty['account_type_name']; ?>
                                            </option>
                                        <?php } ?>
                                        </select>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>.</label>
                            <input type="submit" name="btnSubmit" class="btn btn-primary btn-block form-control" value="Create Account">
                        </div>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>


<?php
include 'layout/foot.php';
?>
