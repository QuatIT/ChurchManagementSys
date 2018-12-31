<?php
include 'layout/head.php';

@$member_id = $_GET['g_id'];



?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:auto;padding:30px;background-color:#fff;">


            <h3>MANAGE GROUP MEMBER</h3>


            <table class="table">
                <thead>
                    <tr>

                        <th>MemberID</th>
                        <th>Member Full Name</th>
                        <th>Date of Birth</th>
                        <th>Image</th>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
<?php
$g_mem = select("SELECT * FROM g_assign_member WHERE group_id='$member_id'");
if($g_mem){
    $g_detail=select("SELECT * FROM membership_tb");
    foreach($g_detail as $g_details){

        echo"<tr>
                        <td>".$g_details['member_id']."</td>
                        <td>".$g_details['first_name'].' '.$g_details['other_name'].' '.$g_details['last_name']."</td>
                        <td>".$g_details['dob'] ."</td>
                         <td>".$g_details['member_image']."</td>
                        <td>
                            <a href='view_member_groupEdit.php?member_id=".$g_details['member_id']."' class='btn btn-primary' title='Edit Member'>
                                <i class='fa fa-pencil'></i>
                            </a> |
                            <a href='view_member_groupSms.php?member_id=".$g_details['member_id']."' class='btn btn-primary' title='SEnd SMS To Member'>
                            <i class='fa fa-envelope'></i>
                            </a> |
                           <!-- <a href='view_member_groupEmail.php?member_id=".$g_details['member_id']."' class='btn btn-primary'>
                            <i class='fa fa-envelope'></i>
                            </a>| -->
                            <a href='view_member_group.php?member_id=".$g_details['member_id']."' name ='trash' class='btn btn-danger' title='Trash Member'>
                            <i class='fa fa-trash-o'></i>
                            </a>

                        </td>

                    </tr>";
                    } }?>
                    </tbody>

                    </table>
                    <?php
                  if(isset($_POST['trash'])) {
                    $group_mem_del= delete("DELETE FROM g_assign_member WHERE member_id='$member'");
                  }
              ?>
        </div>
    </div>
</div>

    <script>


    </script>

<?php
include 'layout/foot.php';
?>
