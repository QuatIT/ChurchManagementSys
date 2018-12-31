<?php
include 'layout/head.php';
?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">


            <h3>CREATE MINISTRY</h3>


            <form action="" method="post">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            Ministry ID <input type="text" name="ministry_id" class="form-control">
                        </div>
                        <div class="col-md-4">
                            Ministry Name <input type="text" name="ministry_name" class="form-control">
                        </div>
                        <div class="col-md-4">
                            &nbsp;<br> <input type="submit" name="btnSubmit" class="btn btn-primary" value="Create">
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
