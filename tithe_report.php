<?php
include 'layout/head.php';





//$edit_member= select("SELECT * FROM membership_tb WHERE member_id = '$member_id' ");
//foreach($edit_member as $row){}

  //WELFARE
  if(isset($_POST['fetch_report'])){
    $m_id = filter_input(INPUT_POST,'m_id',FILTER_SANITIZE_STRING);
    $start = filter_input(INPUT_POST,'start_date',FILTER_SANITIZE_STRING);
    $end =  filter_input(INPUT_POST,'end_date',FILTER_SANITIZE_STRING);
  $get_welfare = select("SELECT * FROM tithe WHERE doe BETWEEN '".$start."' AND '".$end."' && member_id='".$m_id."' ");


}else{
      $get_welfare = select("SELECT * FROM tithe");
  }
        // move_uploaded_file($fileName, "upload/image/{$member_image}");

// if(isset($_POST['go_back'])){
//   echo "<script>window.location.href('member_report.php?member_id=".$displays['member_id']."'')</script>";
// }


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">

            <h3>MEMBER TITHE REPORT</h3>
         <form method="POST" action="">
  <ul class="nav nav-tabs">
  <li class="nav-item"
  <a class="nav-link active show" data-toggle="tab" href="#home">Tithe Information
    <!-- <input type="submit" name="go_back" class="btn btn-primary" style="margin-left:695px;width:120px;" onclick="history.back(-1)" value="GO BACK"> -->
  </a>
  </li>
 </ul>
</form>
<div id="myTabContent" class="tab-content">
    <form action="" method="post" enctype="multipart/form-data">
   <div class="tab-pane fade active show" id="home">
      <div class="container-fluid">
        <div class="row" style="padding-top:1%;">

           <div class="col-md-3" style="z-index:1;">
               <label style="margin-left:20px;margin-bottom:-2px;">Member ID</label> <select name="m_id" class="form-control" ><option></option><?php $s_mem = select("select * from membership_tb"); foreach($s_mem as $smem){ ?><option value="<?php echo $smem['member_id']; ?>"><?php echo $smem['full_name']; ?></option><?php } ?></select>
      </div>

   <div class="col-md-3" style="z-index:1;">
        Start Date <input type="date" name="start_date" class="form-control" />
      </div>

      <div class="col-md-3" style="z-index:1">
        End Date <input type="date" name="end_date" class="form-control" />
      </div>

      <div class="col-md-3 move" style="z-index:2;">
       <input type="submit" name="fetch_report" class="btn btn-primary" style="margin-top:22px;width:120px;margin-left:37px; "  value="FETCH REPORT">
      </div>


          </div>
      </div>
  </div>

 <p></p>
  <div class="container" style="text-align:center;overflow:scroll; height:340px;">
    <div class="col-md-12">

      <table class="table table-stripped">

        <thead class="thead-dark">
        <tr>
<th>TITHE ID</th>
<th>NAME</th>
  <th>TITHE AMOUNT</th>
    <th>PAYMENT DATE</th>
        </thead>
    <?php if(count($get_welfare) > 0){ ?>
        <tbody>
       <?php foreach($get_welfare as $get_welfares){
        $grab_nome = select("SELECT * FROM membership_tb WHERE member_id ='".$get_welfares['member_id']."' ");
        foreach($grab_nome as $grab_nomes){}?>
      <tr>
          <td><?php echo @$get_welfares['tithe_id'];?></td>
          <td><?php echo @$grab_nomes['full_name'];?></td>
          <td><?php echo @$get_welfares['tithe_amount'];?></td>
          <td><?php echo @$get_welfares['tithe_date'];?></td>
        </tr>
        <?php } ?>
         </tbody>
       <?php }else{echo "<p class='btn btn-danger'>No record found</p>"; } ?>
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
