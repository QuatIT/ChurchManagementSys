<?php
include 'layout/head.php';
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px; margin-top:15px; margin-bottom:0px; border:2px solid #760373; height:auto; padding:30px; background-color:#fff;">


            <h3>MANAGE MINISTRY</h3><hr>


            <table class="table">
                <thead>
                    <tr>
                        <th></th>
                        <th>Ministry ID</th>
                        <th>Ministry Name</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $m_ministry= select("SELECT * FROM ministry_tb");

                    foreach($m_ministry as $m_ministries){

                       echo "<tr>
                        <td></td>
                        <td>".$m_ministries['group_id']."</td>

                        <td>".$m_ministries['group_name']."</td>
                        <td>
                            <a href='view_ministry_member.php?group_id=".$m_ministries['group_id']." ' class='btn btn-primary' title='View Ministry'>
                                <i class='fa fa-eye'></i>
                            </a> |
                            <a href='edit_ministry.php?group_id=".$m_ministries['group_id']."' class='btn btn-primary' title='Edit Ministry'>
                                <i class='fa fa-pencil'></i>
                            </a> |
                            <a href='delete_ministry.php?group_id=".$m_ministries['group_id']." ' class='btn btn-danger' title='Trash Ministry'>
                                <i class='fa fa-trash-o'></i>
                            </a> |
                            <a href='sms_ministry.php?group_id=".$m_ministries['group_id']."' class='btn btn-primary' title='Send SMS To Ministry'>
                                <i class='fa fa-envelope'></i>
                            </a>
                        </td>
                    </tr>";
                }   ?>
                    <!--<tr>
                        <td></td>
                        <td>MIN-0001</td>
                        <td>Youth</td>
                        <td><a href="view_ministry_member.php" class="text-primary"><i class="fa fa-eye"></i></a> | <a href="edit_ministry.php" class="text-primary"><i class="fa fa-pencil"></i></a> | <a href="" class=" text-danger"><i class="fa fa-trash"></i></a> | <a href="" class=" text-dark"><i class="fa fa-envelope"></i></a></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>MIN-0002</td>
                        <td>Men</td>
                        <td><a href="" class="text-primary"><i class="fa fa-eye"></i></a> | <a href="edit_ministry.php? echo" class="text-primary"><i class="fa fa-pencil"></i></a> | <a href="" class=" text-danger"><i class="fa fa-trash"></i></a> | <a href="" class=" text-dark"><i class="fa fa-envelope"></i></a></td>
                    </tr>-->
                </tbody>
            </table>


        </div>
    </div>
</div>


<?php
include 'layout/foot.php';
?>
