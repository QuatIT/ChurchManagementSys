
<?php
include 'layout/head.php';


$_GET['gp'];
$_GET['de'];
$_GET['stat'];
$_GET['pn'];
$_GET['md'];
$_GET['nm'];

//pick values passed

$other_info = select("SELECT * FROM membership_tb WHERE member_id='$md'");
foreach($other_info as $other_infox){}



// edit attendance
if(isset($_POST['at_edit'])){
    $att = filter_input(INPUT_POST,'att',FILTER_SANITIZE_STRING);
    

$edit_attend = update("UPDATE mem_attendance SET status='$att', flag1='1' WHERE member_id='".$_GET['md']."' && doe='".$_GET['de']."' ");
if($edit_attend){
    echo "<script>alert('Attendance Edited Successfully');
    window.location='mem_attendance_search.php'</script>";
}



}


$get_gender = select("SELECT * FROM membership_tb WHERE member_id='".$_GET['md']."'");
foreach($get_gender as $get_genders){}
  
//   echo "<script>alert('{$_GET['gp']}')</script>";
  

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">

            <h3>MEMBER ATTENDANCE EDIT</h3>
</ul>
<div id="myTabContent" class="tab-content">
    <form action="" method="post" enctype="multipart/form-data">
   <div class="tab-pane fade active show" id="home">
      <div class="container-fluid">
        <div class="row" style="padding-top:1%; margin-left:140px;">





          </div>
      </div>
  </div>

 <p></p>
  <div class="container" style="text-align:center;overflow:scroll; height:390px;">
    <div class="col-md-12">

      <table class="table table-striped">


      <tr>
          <td>MINISTRY NAME</td><td><input type='text' name='' id='' value='<?php echo $_GET['gp'];?>'readonly></td> </tr>
           <tr>
           <td> NAME</td><td><input type='text' name='' id='' readonly='on' value='<?php echo $_GET['nm'];?>'></td>
           </tr>
           <tr>
           <td>GENDER</td><td><input type='text' name='' id='' value='<?php echo $get_genders['gender']; ?>'readonly></td>
            </tr>
           <tr>
           <td>PHONE</td><td><input type='text' name='' id='' readonly='on' value='<?php echo $_GET['pn']; ?>'></td>
            </tr>
           <tr>
            <td>STATUS</td><td><input type='text' name='' id='' style='margin-left:130px;' value='<?php echo $_GET['stat']; ?>'readonly>&nbsp;&nbsp;&nbsp;<select required name='att' id='att' ><option value=''>Edit Attendance</option>
           <option value='absent'>absent</option>
           <option value='present'>present</option></select></td>
             </tr>
           <tr>
           <td>ATTENDANCE DATE</td><td><input type='text' name='' id='' value='<?php echo $_GET['de']; ?>'readonly></td> </tr>
           <tr>
          <td></td><td><input class='btn btn-primary' name='at_edit' id='at_edit' type='submit' value='Save' style='width:200px;'></td>
     

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
