<?php
include 'layout/head.php';



// @$member_id = $_GET['member_id'];

// $attend_id= 'ATT-'.mt_rand(0,99).mt_rand(105,699);

$attendance= select("SELECT * FROM membership_tb ");

foreach($attendance as $attendances){
        $img     = $attendances['member_image'];
       $mem_id   = $attendances['member_id'];
       $gp_name  = $attendances['group_name'];
       $fll_name = $attendances['full_name'];
       $gender   = $attendances['gender'];
       $p_num    = $attendances['phone_number'];
}

if(isset($_POST['pre_sent'])){
  $present=insert("INSERT INTO mem_attendance(attendance_id,member_id,ministry_id,ministry_name,full_name,gender,phone,status)VALUES('$attend_id','".$mem_id."','".$gp_name."','".$min_name."',".$fll_name."','".$gender."','".$p_num."','present')");
}


if(isset($_POST['ab_sent'])){
  $present=insert("INSERT INTO mem_attendance(attendance_id,member_id,ministry_id,ministry_name,full_name,gender,phone,status)VALUES('$attend_id','".$mem_id."','".$gp_name."','".$min_name."','".$fll_name."','".$gender."','".$p_num."','absent')");

}








?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">

            <h3>CHURCH ATTENDANCE</h3>

  <ul class="nav nav-tabs">
  <li class="nav-item">
  <a class="nav-link active show" data-toggle="tab" href="#home">Attendance Information</a>
  </li>


</ul>
<div id="myTabContent" class="tab-content">


        <div class="row" style="padding-top:1%; margin-left:360px;">



  </div>

 <p></p>
  <div class="container" style="text-align:center;overflow:scroll; height:380px;">
  <form action="" method="post" enctype="multipart/form-data">
    <div class="col-md-12">

      <table class="table table-striped">

        <thead class="thead-dark">
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
        ?>
      <tr>
          <td><?php echo $img;?></td>
          <td><?php echo $mem_id;?></td>
          <td><?php echo $gp_name;?></td>
          <td><?php echo $fll_name;?></td>
          <td><?php echo $gender;?></td>
          <td><?php echo $p_num;?></td>
         <td><button type="submit" class ="btn-sm btn-primary" name="pre_sent"><i class="fa fa-check"></i></button>
        <button type="submit" class ="btn-sm btn-primary" name="ab_sent"><i class="fa fa-close"></i></button></td>
        </tr>
        <?php } ?>
         </tbody>

</table>



  </div></div>



  </div>

            </form>
</div>       </div>
      </div>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
<br><br><br><br><br><br>
<!-- <div class="col-md-4 move" style="margin-top:-180px;z-index:2">
       <input type="submit" name="go_back" class="btn btn-info" style="margin-top:24px;width:120px;margin-left:760px; margin-top:8px; background-color:purple;" value="GO BACK">
      </div> -->
<?php
include 'layout/foot.php';
?>
