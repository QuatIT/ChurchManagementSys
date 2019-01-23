<?php
include 'layout/head.php';


$del=delete("DELETE FROM membership_tb WHERE full_name= '' ");

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px; margin-top:15px; margin-bottom:0px; border:2px solid #760373; height:auto; padding:30px; background-color:#fff;">


            <h3>MANAGE MEMBERSHIP</h3>


            <table class="table">
                <thead>
                    <tr>
                        <td></td>
                        <th>MemberID</th>
                        <th>Member Full Name</th>
                        <th>Date of Birth</th>
                        <th>Group</th>
                        <th>Image</th>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                <?php
                $display = select("SELECT * FROM membership_tb ");

                    foreach($display as $displays){

                       echo "<tr>
                        <td></td>
                        <td>".$displays['member_id']."</td>
                        <td>".$displays['first_name'].' ' .$displays['other_name'].' '.$displays['last_name']."</td>
                        <td>".$displays['dob']."</td>
                        <td>".$displays['group_name']."</td>
                        <td><img src='upload/image/".$displays['member_image']."' style='width:50px;height:50px;' ></td>
                        <td>
                        <a href='edit_member_detail.php?member_id=".$displays['member_id']."' class='btn btn-primary'>
                            <i class='fa fa-pencil'></i>
                        </a> |
                        <a href='delete_member_detail.php?member_id=".$displays['member_id']."' class='btn btn-danger'>
                            <i class='fa fa-trash-o'></i>
                        </a> |
                        <a href='sms_member_detail.php?member_id=".$displays['member_id']."' class='btn btn-primary'>
                            <i class='fa fa-envelope'></i>
                        </a>|
                        <a href='church_member_detail.php?member_id=".$displays['member_id']."' class='btn btn-danger'>
                            <i class='fa fa-eye'></i>
                        </a>
                        </td>

                    </tr>";
                }   ?>

                    </tbody>

                    </table>


        </div>
    </div>
</div>

    <script>


    </script>

<?php
include 'layout/foot.php';
?>
