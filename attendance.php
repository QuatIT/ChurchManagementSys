<?php
include 'layout/head.php';

$_SESSION['pass'];

$pic_acc = select("SELECT * FROM church_login WHERE user = '".$_SESSION['user']."' && pass='".$_SESSION['pass']."'");


if(isset($_POST['h_count'])){
    echo "<script>window.location.assign('head_count.php')</script>";
}
if(isset($_POST['h_count_rep'])){
    echo "<script>window.location.assign('head_count_report.php')</script>";
}
if(isset($_POST['m_att'])){
    echo "<script>window.location.assign('attendance_report.php')</script>";
}
if(isset($_POST['m_att_rep'])){
echo "<script>window.location.assign('mem_attendance_search.php')</script>";
}

if(isset($_POST['grp_att'])){
echo "<script>window.location.assign('grp_attendance.php')</script>";
}
if(isset($_POST['grp_att_rep'])){
echo "<script>window.location.assign('grp_attendance_report.php')</script>";
}



?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:auto; padding:30px;background-color:#fff;">

            <h3>ROHI CHURCH ATTENDANCE</h3><hr>

          <!--   <div class="row">
                <div class="col-md-12">


                </div>
            </div> -->


            <form action="" method="post" enctype="multipart/form-data">
                     <div class="container-fluid" style="margin-left:20px;">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <table class="table table-borderless">

                                    <?php
                                    foreach($pic_acc as $pic_accs){?>
                                    <tr>
                                        <?php
                                        if($pic_accs['a_level']=='2'||$pic_accs['a_level']=='1'){?>
                                        <td>HEAD COUNT</td><td><input type="submit" class="btn btn-primary" value="HEAD COUNT" name="h_count" style="width:225px;"/></td>
                                    </tr>

                                    <tr>
                                        <td>HEAD COUNT REPORT</td><td><input type="submit" class="btn btn-primary" value="HEAD COUNT REPORT" style="width:225px;" name="h_count_rep"/></td>
                                    </tr>

                                    <tr>
                                        <td>MARK MEMBER ATTENDANCE</td><td><input type="submit" class="btn btn-primary" value="MARK MEMBER ATTENDANCE" style="width:225px;" name="m_att"/></td>
                                    </tr>
                                    <tr>
                                        <td>MEMBER ATTENDANCE REPORT</td><td><input type="submit" class="btn btn-primary" value="MEMBER ATTENDANCE  REPORT" style="width:225px;" name="m_att_rep"/></td>
                                    </tr>
                                    <?php }?>
                                    <tr>
                                        <?php
                                        if($pic_accs['a_level']=='3'||$pic_accs['a_level']=='1'){?>

                                        <td>MINISTRY/GROUP ATTENDANCE</td><td><input type="submit" class="btn btn-primary" value="MINISTRY/GROUP ATTENDANCE" style="width:225px;" name="grp_att"/></td>
                                    </tr>

                                    <tr>
                                        <td>MINISTRY/GROUP ATTENDANCE REPORT</td><td><input type="submit" class="btn btn-primary" value="MINISTRY ATTENDANCE REPORT" style="width:225px;" name="grp_att_rep" id="grp_att_rep"/></td>
                                    </tr>
                                    <?php }}?>

                    </table>
                </form>
            </div></div>
    </div>
    <div class="col-md-4"></div>
</div>


<?php
include 'layout/foot.php';
?>
