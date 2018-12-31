<?php
include 'layout/head.php';

$msg='';
$error='';

if(isset($_POST['btnSubmit'])){

$ministry_id = trim(htmlspecialchars($_POST['ministry_id']));
$ministry_name = trim(htmlspecialchars($_POST['ministry_name']));

if(empty($ministry_id) || empty($ministry_name)){
      $msg = '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Warning!</strong> Please, fill in Blank Spaces.
</div>';
}else{

   $new_ministry= insert("INSERT INTO ministry_tb(group_id,group_name) VALUES('".$ministry_id."','".$ministry_name."')");

   if($new_ministry){
         $msg = '<div class="alert alert-dismissible alert-secondary">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong> Ministry Created Successfully.
</div>';
   }else{
         $error = '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Warning!</strong> Please fill in a inputs.
</div>';
   }
   }

}


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px; margin-top:15px; margin-bottom:0px; border:2px solid #760373; height:auto; padding:30px; background-color:#fff;">


            <h3>CREATE MINISTRY</h3><hr>


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
                        <div class="col-md-6 form-group">
                            <label>Ministry ID</label>
                            <input type="text" name="ministry_id" value="<?php echo "MINS-".mt_rand(1,9).mt_rand(1000,9999); ?>" class="form-control" readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ministry Name</label>
                            <input type="text" name="ministry_name" class="form-control" placeholder="Ministry Name" required>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6 form-group">
                            <input type="submit" name="btnSubmit" class="btn btn-primary btn-block" value="Create Ministry">
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
