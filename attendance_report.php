<?php
include 'layout/head.php';

date_default_timezone_set("Africa/Accra");

$msg='';
$error='';


$attendance= select("SELECT * FROM membership_tb ");

foreach($attendance as $attendances){}



?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">

            <h3>CHURCH ATTENDANCE</h3>



            <div class="col-md-12">
            <?php
                if(isset($msg)){
                    echo $msg;
                }else{
                    echo $error;
                }
            ?>
            </div>


  <ul class="nav nav-tabs">
  <li class="nav-item">
  <a class="nav-link active show" data-toggle="tab" href="#home">Attendance Information</a>


</ul>
<div id="myTabContent" class="tab-content">

  </li>

        <div class="row" style="padding-top:1%; margin-left:360px;">



  </div>

 <p></p>
  <div class="container" style="text-align:center;overflow:scroll; height:380px;">
  <form action="" method="post" enctype="multipart/form-data" id="myForm">
    <div class="col-md-12">

      <table class="table table-striped">

        <thead class="thead-dark" >
        <tr>
<th>IMAGE</th>
<th>MEMBER ID</th>
<th>MINISTRY</th>
<th>FULL NAME</th>
  <th>GENDER</th>
    <th>PHONE</th>
    <th>ATTENDANCE</th>

        </thead>
        <tbody>
       <?php foreach($attendance as $attendances){
        $img     = $attendances['member_image'];
       $mem_id   = $attendances['member_id'];
       $gp_name  = $attendances['group_name'];
       $fll_name = $attendances['full_name'];
       $gender   = $attendances['gender'];
       $p_num    = $attendances['phone_number'];

       $minn = select("SELECT * FROM ministry_tb WHERE group_id='$gp_name' ");
       foreach($minn as $minnrow){}
          $mn_at = select("SELECT * FROM mem_attendance WHERE member_id='$mem_id' ");
        foreach($mn_at as $mn_row){}
        ?>
      <tr>
          <td><img src="upload/image/<?php echo $img;?>" width=60 height=40></td>
          <td><input type="text" name="mem" id="mem" style="width:90px; border:none;background-color: transparent;" value="<?php echo $attendances['member_id'];?>"readonly></td>
          <td><input type="text" name="gp" id="gp" style="width:90px; border:none;background-color: transparent;" value="<?php echo $minnrow['group_name'];?>"readonly></td>
          <td><input type="text" name="fn" id="fn" style="width:145px; border:none;background-color: transparent;" value="<?php echo $fll_name;?>"readonly></td>
          <td><input type="text" name="gen" id="gen" style="width:60px; border:none;background-color: transparent;" value="<?php echo $gender;?>"readonly></td>
          <td><input type="text" name="po" id="po"  style="width:90px; border:none;background-color: transparent;" value="<?php echo $p_num;?>"readonly></td>

         <td>

          <button type="submit" class="btn btn-primary"  id="checkx<?php echo $attendancex['member_id'];?>"  name="checkx<?php echo $mem_id;?>"><i class="fa fa-check"></i></button>
          <?php
if(isset($_POST['checkx'.$mem_id])){
  $flag1 =1;
  $checkx = $_POST['checkx'.$mem_id];
  $m_attendance = insert("INSERT INTO mem_attendance(member_id,ministry_id,ministry_name,full_name,gender,phone,status,date_reg,flag1)VALUES('".$attendances['member_id']."','$gp_name','".$minnrow['group_name']."','".$fll_name."','".$gender."','".$p_num."','present',CURDATE(),'$flag1');)");

  echo "<script>window.location.href='attendance_report'</script>";
}
?>


<button type="submit" class="btn btn-primary"  id="check_x<?php echo $mem_id;?>"  name="check_x<?php echo $mem_id;?>"><i class="fa fa-close"></i></button>

<?php
if(isset($_POST['check_x'.$mem_id])){
  $flag1 =1;
  $check_x = $_POST['check_x'.$mem_id];
  $m_attendance = insert("INSERT INTO mem_attendance(member_id,ministry_id,ministry_name,full_name,gender,phone,status,date_reg,flag1)VALUES('".$attendances['member_id']."','$gp_name','".$minnrow['group_name']."','".$fll_name."','".$gender."','".$p_num."','absent',CURDATE(),'$flag1');)");
echo "<script>window.location.href='attendance_report'</script>";
}
}
?>
          </td>
        </tr>

         </tbody>

</table>

</div></div>



  </div>

 </div>
      </div>
        </div>



        <div class="col-md-4">

</form></div>
    </div>
</div>
<div>

</div>


<?php
include 'layout/foot.php';
?>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>



  <script>
    $(document).ready(function(){
      $('#checkx').click(function(evt){
        $('#checkx').hide();
        $('#check_x').hide();


      });

    });

  </script>
