<?php
include 'layout/head.php';

$group_id=$_GET['group_id'];

$grp_sql = select("SELECT * FROM ministry_tb WHERE group_id='$group_id' ");
foreach($grp_sql as $grp){}

    $indiv_member=select("SELECT * FROM membership_tb WHERE group_name='$group_id' ");
    foreach($indiv_member as $row){}

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px; margin-top:15px; margin-bottom:0px; border:2px solid #760373; height:auto; padding:30px; background-color:#fff;">


            <h3>VIEW MINISTRY MEMBERS - <?php echo $grp['group_name']; ?></h3><hr>


            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Member ID</th>
                        <th>Member Full Name</th>
                        <th>Date of Birth</th>
                        <th>Image</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                //$group_name=$_GET['group_name'];

                foreach($indiv_member as $indiv_members) {

                   echo"<tr>
                        <td></td>
                        <td>".$indiv_members['member_id']."</td>
                        <td>".$indiv_members['first_name'].' '.$indiv_members['other_name'].' '.$indiv_members['last_name']."</td>
                        <td>".$indiv_members['dob']."</td>
                        <td><img src='upload/image/".$indiv_members['member_image']."' style='width:35px;height:35px;'></td>
                        <td>
                            <a href='group_member_manage.php?member_id=".$indiv_members['member_id']."' class=' btn btn-primary'>
                                <i class='fa fa-eye'></i>
                            </a> |
                            <a href='sms_ministry_member.php?member_id=".$indiv_members['member_id']."' class='btn btn-primary'>
                                <i class='fa fa-envelope'></i>
                            </a>
                        </td>
                    </tr>";
                }?>
                   <!-- <tr>
                        <td></td>
                        <td>MEM-0001</td>
                        <td>Richard Kanfrah</td>
                        <td>1998-12-02</td>
                        <td>image</td>
                        <td><a href="" class="text-primary"><i class="fa fa-eye"></i></a> | <a href="" class=" text-dark"><i class="fa fa-envelope"></i></a></td>
                    </tr>-->
                </tbody>

            </table>


        </div>
    </div>
</div>


<?php
include 'layout/foot.php';
?>
