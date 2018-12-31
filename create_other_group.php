<?php
include 'layout/head.php';

$msg='';
$error='';

if(isset($_POST['btnSubmit'])){

$g_group_id = trim(htmlspecialchars($_POST['g_group_id']));
$g_group_name = trim(htmlspecialchars($_POST['g_group_name']));

if(empty($g_group_id) || empty($g_group_name)){
      $msg = '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Warning!</strong> Please, fill in Blank Spaces.
</div>';
}else{

   $new_ministry= insert("INSERT INTO g_ministry_tb(g_id,g_name) VALUES('".$g_group_id."','".$g_group_name."')");

   if($new_ministry){
         $msg = '<div class="alert alert-dismissible alert-secondary">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong> Group Created Successfully.
</div>';
   }else{
         $error = '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Sorry!</strong> Group Creation failed.
</div>';
   }
   }

}


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:300px;padding-top:10px;background-color:#fff;">


            <h3>CREATE OTHER GROUP</h3>


            <div class="col-md-12">
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
                        <div class="col-md-6">
                            Group ID <input type="text" name="g_group_id" value="<?php echo "G-MINS-".mt_rand(1,9).mt_rand(1000,9999); ?>" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            Group Name <input type="text" name="g_group_name" class="form-control">
                        </div>
                        <div class="col-md-6">
                            &nbsp;<br> <input type="submit" name="btnSubmit" class="btn btn-primary btn-block" value="Create Group">
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
