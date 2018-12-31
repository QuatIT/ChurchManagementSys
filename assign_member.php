<?php
include 'layout/head.php';

$msg='';
$error='';


$assign_sql = select("SELECT membership_tb.member_id,membership_tb.first_name,membership_tb.other_name,membership_tb.last_name FROM membership_tb WHERE NOT EXISTS (SELECT g_assign_member.member_id FROM g_assign_member WHERE g_assign_member.member_id = membership_tb.member_id) ");

$mins_sql = select("SELECT * FROM g_ministry_tb ");

if(isset($_POST['btnSubmit'])){

$member = trim(htmlspecialchars($_POST['member']));
$min_name = trim(htmlspecialchars($_POST['min_name']));

if(empty($member) || empty($min_name)){
      $msg =  "<script>
                            document.write('<strong>Warning!</strong> Please, fill in Blank Spaces.');
                            window.location='assign_member.php';
                        </script>";
}else{

   $new_ministry= insert("INSERT INTO g_assign_member(member_id,group_id) VALUES('".$member."','".$min_name."')");

   if($new_ministry){
         $msg = "<script>
                            document.write('<strong>Well done!</strong> Group Created Successfully.');
                            window.location='assign_member.php';
                        </script>";
   }else{
         $error = "<script>
                            document.write('<strong>Sorry!</strong> Group Creation failed.');
                            window.location='assign_member.php';
                        </script>";
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
                /*if(isset($msg)){
                    echo $msg;
                }else{
                    echo $error;
                }*/
            ?>

                 <!---Printing messages to the user-->
                    <?php if($msg){ ?>
                    <h5 class="text-center alert alert-success alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
                        <?php echo $msg; ?>
                    </h5>
                    <?php } ?>

                    <?php if($error){ ?>
                    <h5 class="text-center alert alert-danger alert-dismissable">
                        <a href="#" class="close" data-dismiss="alert" aria-lable="close">&times;</a>
                        <?php echo $error; ?>
                    </h5>
                    <?php } ?>
                    <!--- End of Printing messages to the user-->
            </div>


            <form action="" method="post">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            Member <select class="form-control" name="member">
                            <?php foreach($assign_sql as $ass_row){ ?>
                                        <option value="<?php echo $ass_row['member_id']; ?>"><?php echo $ass_row['first_name']." ".$ass_row['other_name']." ".$ass_row['last_name']; ?></option>
                            <?php } ?>
                                    </select>
                        </div>
                        <div class="col-md-6">
                            Ministry Name <select name="min_name" class="form-control">
                            <?php foreach($mins_sql as $min_row){ ?>
                                        <option value="<?php echo $min_row['g_id']; ?>"><?php echo $min_row['g_name']; ?></option>
                            <?php } ?>
                                    </select>
                        </div>
                        <div class="col-md-6">
                            &nbsp;<br> <input type="submit" name="btnSubmit" class="btn btn-primary btn-block" value="Assign To Group">
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
