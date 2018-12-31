<?php
include 'layout/head.php';




$member_id = $_GET['member_id'];



$edit_member= select("SELECT * FROM membership_tb WHERE member_id = '$member_id' ");
foreach($edit_member as $row){}

  //attendance
  if(isset($_POST['fetch_att'])){
    $start = filter_input(INPUT_POST,'start_date',FILTER_SANITIZE_STRING);
    $end =  filter_input(INPUT_POST,'end_date',FILTER_SANITIZE_STRING);

  $get_att = select("SELECT * FROM mem_attendance WHERE doe BETWEEN '".$start."' AND '".$end."' && member_id='".$_GET['member_id']."' ");


}
        // move_uploaded_file($fileName, "upload/image/{$member_image}");




?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">

            <h3>MEMBER ATTENDANCE REPORT</h3>

  <ul class="nav nav-tabs">
  <li class="nav-item">
  <a class="nav-link active show" data-toggle="tab" href="#home">Attendance Information<input type="submit" name="go_back" class="btn btn-primary" style="margin-left:725px;width:120px; margin-top:-40px;" onclick="history.back(-1)" value="GO BACK"></a>
  </li>


</ul>
<div id="myTabContent" class="tab-content">
    <form action="" method="post" enctype="multipart/form-data6">
   <div class="tab-pane fade active show" id="home">
      <div class="container-fluid">
        <div class="row" style="padding-top:1%; margin-left:320px;">

   <div class="col-md-4" style="z-index:1;">
        Start Date <input type="date" name="start_date" class="form-control" style="width:160px;"/>
      </div>

      <div class="col-md-4" style="z-index:1">
        End Date <input type="date" name="end_date" class="form-control" style="width:160px;"/>
      </div>

      <div class="col-md-4 move" style="z-index:2;">
       <input type="submit" name="fetch_att" class="btn btn-primary" style="margin-top:22px;width:120px; margin-left:10px;"  value="FETCH REPORT">
      </div>


          </div>
      </div>
  </div>

 <p></p>
  <div class="container" style="text-align:center;overflow:scroll; height:300px;">
    <div class="col-md-12">

      <table class="table table-striped">

        <thead class="thead-dark">
        <tr>
<th>MEMBER ID</th>
<th>ATTENDANCE ID</th>
  <th>MINISTRY ID</th>
    <th>GENDER</th>
    <th>PHONE</th>
     <th>STATUS</th>
    <th>ATTENDANCE DATE</th>
        </thead>
        <tbody>
       <?php foreach($get_att as $get_atts){ ?>
      <tr>
        <td><?php echo $get_atts['member_id'];?></td>
          <td><?php echo $get_atts['attendance_id'];?></td>
          <td><?php echo $get_atts['ministry_id'];?></td>
          <td><?php echo $get_atts['gender'];?></td>
           <td><?php echo $get_atts['phone'];?></td>
           <td><?php echo $get_atts['status'];?></td>
          <td><?php echo $get_atts['doe'];?></td>
        </tr>
        <?php } ?>
         </tbody>

</table>



  </div></div>



  </div>

            </form>
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
