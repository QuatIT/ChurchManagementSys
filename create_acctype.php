<?php
include 'layout/head.php';

$msg = '';
$error = '';

//$acc_type = select("SELECT * FROM account_type_tb ");
//$acc_type_sql = select("SELECT * FROM account_type_tb ");
//foreach($acc_type_sql as $ac){}

if(isset($_POST['btnSubmit'])){
    $acctype_id = trim($_POST['acctype_id']);
    $acctype_name = trim($_POST['acctype_name']);

    if(empty($acctype_id) || empty($acctype_name)){
          $msg = '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Warning!</strong> Please fill in a inputs.
</div>';
//        echo "<script>window.location.href='create_account.php'</script>";
    }else{
    $sql = insert("INSERT INTO account_type_tb(account_type_id,account_type_name) VALUES('$acctype_id','$acctype_name')");

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
        <div class="col-md-8" style="margin-left:15px; margin-top:15px; margin-bottom:0px; border:2px solid #760373; height:auto; padding:30px; background-color:#fff;">



            <h3>CREATE ACCOUNT TYPE</h3><hr>

            <div class="col-md-12">
            <?php
                if(isset($msg)){
                    echo $msg;
                }else{
                    echo $error;
                }
            ?>
            </div>


            <form action="" method="post" enctype="multipart/form-data">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Account Type ID</label>
                        <input type="text" name="acctype_id" value="<?php echo "ACT-".mt_rand(1,9).mt_rand(1000,9999).mt_rand(100,999).date('s'); ?>" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Account Type Name</label>
                            <input type="text" name="acctype_name" class="form-control">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6 form-group">
                        <input type="submit" name="btnSubmit" class="btn btn-primary btn-block" value="Create Account Type">
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
