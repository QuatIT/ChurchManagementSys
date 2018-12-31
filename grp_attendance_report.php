<?php
include 'layout/head.php';


  //attendance
  if(isset($_POST['fetch_att'])){
    $grpm = filter_input(INPUT_POST,"grpm",FILTER_SANITIZE_STRING);
    $start = filter_input(INPUT_POST,'start_date',FILTER_SANITIZE_STRING);
    $end =  filter_input(INPUT_POST,'end_date',FILTER_SANITIZE_STRING);

  $grp_mem = select("SELECT * FROM min_grp_attend WHERE group_id = '".$grpm."' && date_reg BETWEEN '".$start."' AND '".$end."'");
   foreach($grp_mem as $grp_mems){}

}



?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">

            <h3>GROUP/MINISTRY ATTENDANCE REPORT</h3>
</ul>
<div id="myTabContent" class="tab-content">
    <form action="" method="post" enctype="multipart/form-data">
   <div class="tab-pane fade active show" id="home">
      <div class="container-fluid">
        <div class="row" style="padding-top:1%; margin-left:0px;">

<!-- <div class="col-md-3" style="z-index:1;">
        Name <input type="text" name="nam" class="form-control"/>
      </div> -->
      <?php
      $sel_group = select("SELECT * FROM g_ministry_tb");

       $sel_ministry = select("SELECT * FROM ministry_tb");
       ?>
    <div class="col-md-3" style="z-index:1;">
    Group/Ministry <select  name="grpm" id="grpm" class="form-control"/>
    <option>Select Group/Ministry</option>
    <?php foreach($sel_group as $sel_groups){?>
    <option value='<?php echo $sel_groups['g_id']  ?>'><?php echo $sel_groups['g_name']; }?></option>
<?php foreach($sel_ministry as $sel_ministryx){?>
  <option value='<?php echo $sel_ministryx['group_id']  ?>'><?php echo $sel_ministryx['group_name']; }?></option>


  </select>

      </div>

   <div class="col-md-3" style="z-index:1;">
        Start Date <input type="date" name="start_date" class="form-control"/>
      </div>

      <div class="col-md-3" style="z-index:1">
        End Date <input type="date" name="end_date" class="form-control"/>
      </div>

      <div class="col-md-3 " style="z-index:2;">
       <input type="submit" name="fetch_att" class="btn btn-primary" style="margin-left:0px;margin-top:22px;width:120px; "  value="FETCH REPORT">
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

  <th>MINISTRY/GROUP NAME</th>
  <th>MEMBER NAME</th>
     <th>STATUS</th>
    <th>ATTENDANCE DATE</th>
        </thead>
        <tbody>

  <?php foreach($grp_mem as $grp_mems){ ?>
      <tr>
             <td><?php echo $grp_mems['group_name'];?></td>
             <td><?php echo $grp_mems['full_name'];?></td>
          <td><?php echo $grp_mems['status'];?></td>
           <td><?php echo $grp_mems['date_reg'];?></td>

       <?php }?>
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
