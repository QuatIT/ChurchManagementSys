<?php
include 'layout/head.php';
//error_reporting(0);


@$group_id = $_GET['g_id'];


$min= select("SELECT * FROM g_ministry_tb WHERE g_id ='$group_id' ");

foreach($min as $mins){}



  if(isset($_POST['btn_Submit'])){

    $gr_id = trim(htmlspecialchars($_POST['gr_id']));
    $gr_name= trim(htmlspecialchars($_POST['gr_name']));

  $ministry_revised = update("UPDATE g_ministry_tb SET g_name ='$gr_name' WHERE g_id='$gr_id' ");
  $membership_revised =update("UPDATE membership_tb SET group_name ='$gr_name'");



  if($ministry_revised){
    echo "<script>alert('Information Has Been Updated')
                        window.location.href='other_group.php'</script>";
  }
}


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:auto;padding:30px;background-color:#fff;">


            <h3>EDIT GROUP</h3><hr>


            <form action="" method="post">

<!--                <div class="container-fluid">-->
                    <div class="row">
                        <div class="col-md-6">
                            GROUP ID <input type="text" name="gr_id" value= "<?php echo $mins['g_id']; ?>" class="form-control"readonly>
                        </div>
                        <div class="col-md-6">
                            Group Name <input type="text" name="gr_name" value="<?php echo $mins['g_name'];?>" class="form-control">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            &nbsp;<br> <input type="submit" name="btn_Submit" class="btn btn-primary btn-block" value="Edit Group">
                        </div>
                    </div>
<!--                </div>-->

            </form>

        </div>
    </div>
</div>


<?php
include 'layout/foot.php';
?>
