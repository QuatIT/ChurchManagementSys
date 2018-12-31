<?php
include 'layout/head.php';


  //attendance
  if(isset($_POST['fetch_att'])){
    $name = filter_input(INPUT_POST,"nam",FILTER_SANITIZE_STRING);
    $start = filter_input(INPUT_POST,'start_date',FILTER_SANITIZE_STRING);
    $end =  filter_input(INPUT_POST,'end_date',FILTER_SANITIZE_STRING);

  $get_att = select("SELECT * FROM attendance_tb WHERE doe BETWEEN '".$start."' AND '".$end."'");



}


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">

            <h3>HEAD COUNT REPORT</h3>
</ul>
<div id="myTabContent" class="tab-content">
    <form action="" method="post" enctype="multipart/form-data">
   <div class="tab-pane fade active show" id="home">
      <div class="container-fluid">
        <div class="row" style="padding-top:1%; margin-left:330px;">

<!-- <div class="col-md-3" style="z-index:1;">
        Name <input type="text" name="nam" class="form-control"/>
      </div> -->

   <div class="col-md-4" style="z-index:1;">
        Start Date <input type="date" name="start_date" class="form-control"/>
      </div>

      <div class="col-md-4" style="z-index:1">
        End Date <input type="date" name="end_date" class="form-control"/>
      </div>

      <div class="col-md-3 move" style="z-index:2;">
       <input type="submit" name="fetch_att" class="btn btn-primary" style="margin-top:22px;width:120px; "  value="FETCH REPORT">
      </div>


          </div>
      </div>
  </div>

 <p></p>
  <div class="container" style="text-align:center;overflow:scroll; height:365px;">
    <div class="col-md-12">

      <table class="table table-striped">

        <thead class="thead-dark">
        <tr>

  <th>MINISTRY NAME</th>
  <th>MEN</th>
    <th>WOMEN</th>
    <th>CHILDREN</th>
     <th>YOUTH</th>
     <th>POPULATION</th>
    <th>ATTENDANCE DATE</th>
        </thead>
        <tbody>
       <?php foreach($get_att as $get_atts){
        $grab_name = select("SELECT * FROM ministry_tb WHERE group_id ='".$get_atts['ministry_id']."' ");
        foreach($grab_name as $grab_names){}
  ?>
      <tr>

          <td><?php echo $grab_names['group_name'];?></td>
          <td><?php echo $get_atts['men'];?></td>
           <td><?php echo $get_atts['women'];?></td>
           <td><?php echo $get_atts['children'];?></td>
           <td><?php echo $get_atts['youth'];?></td>
           <td><?php echo $get_atts['population'];?></td>
          <td><?php echo $get_atts['attend_date'];?></td>
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
