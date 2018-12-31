<?php
include 'layout/head.php';
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">


            <h3>MANAGE MEMBERSHIP</h3>


            <table class="table">
                <thead>
                    <tr>
                        <td></td>
                        <td>MemberID</td>
                        <td>Member Full Name</td>
                        <td>Date of Birth</td>
                        <td>Phone Number</td>
                        <td>Group</td>
                        <td>Image</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>MEM-0001</td>
                        <td>Richard Kanfrah</td>
                        <td>1987-12-02</td>
                        <td>233 549 565 568</td>
                        <td>Youth</td>
                        <td>Image</td>
                        <td><a href="edit_member_detail.php" class="text-primary"><i class="fa fa-pencil"></i></a> | <a href="" class=" text-danger"><i class="fa fa-trash"  aria-hidden="true"></i></a> | <a href="" class=" text-dark"><i class="fa fa-envelope"></i></a></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>MEM-0001</td>
                        <td>Richard Kanfrah</td>
                        <td>1987-12-02</td>
                        <td>233 549 565 568</td>
                        <td>Youth</td>
                        <td>Image</td>
                        <td><a href="edit_member_detail.php" class="text-primary"><i class="fa fa-pencil"></i></a> | <a href="" class=" text-danger"><i class="fa fa-trash"></i></a> | <a href="" class=" text-dark"><i class="fa fa-envelope"></i></a></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>


<?php
include 'layout/foot.php';
?>
