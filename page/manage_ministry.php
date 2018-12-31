<?php
include 'layout/head.php';
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">


            <h3>MANAGE MINISTRY</h3>


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
                    <tr>
                        <td></td>
                        <td>MIN-0001</td>
                        <td>Youth</td>
                        <td><a href="view_ministry_member.php" class="text-primary"><i class="fa fa-eye"></i></a> | <a href="edit_ministry.php" class="text-primary"><i class="fa fa-pencil"></i></a> | <a href="" class=" text-danger"><i class="fa fa-trash"></i></a> | <a href="" class=" text-dark"><i class="fa fa-envelope"></i></a> </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>MIN-0002</td>
                        <td>Men</td>
                        <td><a href="" class="text-primary"><i class="fa fa-eye"></i></a> | <a href="edit_ministry.php" class="text-primary"><i class="fa fa-pencil"></i></a> | <a href="" class=" text-danger"><i class="fa fa-trash"></i></a> | <a href="" class=" text-dark"><i class="fa fa-envelope"></i></a></td>
                    </tr>
                </tbody>
            </table>


        </div>
    </div>
</div>


<?php
include 'layout/foot.php';
?>
