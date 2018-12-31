<?php
include 'layout/head.php';


$group_id = $_GET['group_id'];


$min= select("SELECT * FROM ministry_tb WHERE group_id = '$group_id' ");

foreach($min as $mins){}



  if(isset($_POST['btn_Submit'])){

    $ministry_id = trim(htmlspecialchars($_POST['ministry_id']));
    $ministry_name= trim(htmlspecialchars($_POST['ministry_name']));

  $ministry_revised = update("UPDATE ministry_tb SET group_name ='$ministry_name' WHERE group_id='$group_id' ");



  if($ministry_revised){
    echo "<script>alert('Information Has Been Updated')
                        window.location.href='manage_ministry.php'</script>";
  }
}


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px; margin-top:15px; margin-bottom:0px; border:2px solid #760373; height:auto; padding:30px; background-color:#fff;">


            <h3>EDIT MINISTRY</h3><hr>


            <form action="" method="post">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>Ministry ID</label>
                            <input type="text" name="ministry_id" value= "<?php echo $mins['group_id']; ?>" class="form-control"readonly>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Ministry Name</label>
                            <input type="text" name="ministry_name" value="<?php echo $mins['group_name'];?>" class="form-control">
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6 form-group">
                            <input type="submit" name="btn_Submit" class="btn btn-primary btn-block" value="Edit Ministry">
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
