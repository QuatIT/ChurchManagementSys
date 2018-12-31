<?php
include 'layout/head.php';
require 'assets/mail1/phpmailer/class.phpmailer.php';

@$group_id = $_GET['g_id'];

$g_sql = select("SELECT * FROM g_ministry_tb");


//$group_mem_del= delete("DELETE FROM g_assign_member WHERE member_id='$member'");

if(isset($_POST['group_del'])){
    $gr_del=delete("DELETE FROM g_ministry_tb WHERE g_id= '$group_id' ");
    if($gr_del){

        echo "<script>alert('Group Has Been Removed');
        document.location.href('other_group.php')</script>";
    }
    }



?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:auto;padding:30px;padding-bottom:20px;background-color:#fff;">


            <h3>MANAGE GROUPS
                <small class="pull-right">
                    <span><a href="create_other_group.php"><i class="fa fa-plus"></i> Add Group</a></span> |
                    <span><a href="assign_member.php"><i class="fa fa-user"></i> Assign member to Group</a></span>
                </small>
            </h3>
            <hr>


<!--            <div class="container-fluid">-->
                <div class="row">

                    <?php foreach($g_sql as $g_row){ ?>
                    <div class="col-md-4">

                    <a href="view_member_group.php?g_id=<?php echo $g_row['g_id']; ?>" style="color:#fff;">
                    <div class="card text-white bg-secondary mb-2" style="max-width: 20rem;">
<!--                          <div class="card-header">Header</div>-->
                          <div class="card-body text-center">
                            <h4 class="card-title"><?php echo $g_row['g_name']; ?></h4>
                            <p class="card-text">
                                <br><br>
                                <span class="pull-right">

                                <a href="view_member_group.php?g_id=<?php echo $g_row['g_id']; ?>" class="btn btn-primary" title="View Group Members">
                                        <i class="fa fa-eye"></i>
                                    </a> |
                                    <a href="other_groupEdit.php?g_id=<?php echo $g_row['g_id']; ?>"  class="btn btn-primary" style="color:#fff;" title="Edit Group">
                                        <i class="fa fa-pencil"></i>
                                    </a> |
                                    <a href="delete_group_ministry.php?g_id=<?php echo $g_row['g_id']; ?>" name="group_del"  class="btn btn-danger" title="Delete Group">
                                        <i class="fa fa-trash-o"></i>
                                    </a> |
                                    <a href="group_sms.php?g_id=<?php echo $g_row['g_id']; ?>" name="group_del"  class="btn btn-primary" title="Send SMS">
                                        <i class="fa fa-envelope"></i>
                                    </a>
<!--
                                    <a href="group_email.php?g_id=<?php# echo $g_row['g_id']; ?>" class="text-dark">
                                        <i class="fa fa-envelope"></i>
                                    </a>
-->

                                </span>
                              </p>
                          </div>
                        </div>
                        </a>

                    </div>
                    <?php } ?>

                </div>
<!--            </div>-->

<!--
               <div class="card text-white bg-secondary mb-2" style="max-width: 15rem;">
  <div class="card-header">Header</div>
  <div class="card-body">
    <h4 class="card-title">Primary card title</h4>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
  </div>
</div>
-->



        </div>
    </div>
</div>


<?php
include 'layout/foot.php';
?>
