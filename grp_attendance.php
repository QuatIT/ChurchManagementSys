<?php
include 'layout/head.php';

date_default_timezone_set("Africa/Accra");

$msg='';
$error='';
$checked = '';

//select list for g_ministry_tb
$get_grp = select("SELECT * FROM g_ministry_tb");

//select list for ministry_tb
$get_min = select("SELECT * FROM ministry_tb");

if(isset($_POST['fet_rep'])){

//select list
$sel_grp= filter_input(INPUT_POST,'sel_grp',FILTER_SANITIZE_STRING);

echo "<script>alert('{$sel_grp}');</script>";
//get ministry name comparing select option in order to fetch ministry id
$frm_grp = select("SELECT * FROM ministry_tb WHERE group_id='".$sel_grp."'");
foreach($frm_grp as $frm_grps){
  //$frm_grps['group_id'];
}

 //fetch details of member by ministry in membership_tb
   $attendance= select("SELECT * FROM membership_tb WHERE group_name='".$sel_grp."'");
}else{
  $attendance ='';
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">

            <h3>MINISTRY/GROUP ATTENDANCE</h3>



            <div class="col-md-12">
            <?php
                if(isset($msg)){
                    echo $msg;
                }else{
                    echo $error;
                }
            ?>
            </div>


             <form action="" method="POST">
  <ul class="nav nav-tabs">
  <li class="nav-item">

  <a class="nav-link active show" data-toggle="tab" href="#home">

    Attendance Information</a>
 <select name="sel_grp" id='sel_grp' style="margin-left:550px;">
<?php if($_POST['sel_grp']){ ?>
  <option value="<?php echo $_POST['sel_grp']; ?>"><?php echo $_POST['sel_grp']; ?></option>
<?php }else{ ?>
      <option value="">Select Group/ministry</option>
    <?php } ?>
    <?php foreach($get_grp as $get_grps){
      echo "<option>".$get_grps['g_name']."</option>";
    }?>
       <?php foreach($get_min as $get_mins){
echo "<option value=".$get_mins['group_id'].">".$get_mins['group_name']."</option>";
}?>
    </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="fet_rep" value="FETCH REPORT" class="btn btn-primary">
  </li>


</ul>

<!-- </form> -->

<div id="myTabContent" class="tab-content">

<div class="row" style="padding-top:1%; margin-left:360px;">

  </div>

 <p></p>
  <div class="container" style="text-align:center;overflow:scroll; height:320px;">

    <div class="col-md-12">

 <!-- <form action="" method="post" > -->

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
<?php
  foreach($attendance as $attendancex){
    $img = $attendancex['member_image'];
    $min_name = select("SELECT * FROM ministry_tb WHERE group_id ='".$attendancex['group_name']."'");
    foreach($min_name as $min_names){}


?>
      <tr>
          <td><img src="upload/image/<?php echo $img;?>"width=60 height=40></td>
         <td><input type='text' name='meme_id'  id='meme_id'  style ='border:0px;background:transparent;width:100px;' value='<?php echo $attendancex['member_id']; ?>'></td>
         <td><input type='text' name='mini_name' id='mini_name' style ='border:0px;background:transparent;'  value='<?php echo $min_names['group_name']; ?>'></td>
         <td><input type='text' name='f_name' id='f_name' style ='border:0px;background:transparent;width:100px;' value='<?php echo $attendancex['full_name']; ?>'></td>
         <td><input type='text' name='g_end' id='g_end' style ='border:0px;background:transparent;width:100px;' value='<?php echo $attendancex['gender']; ?>'></td>
         <td><input type='text' name='p_num' id='p_num' style ='border:0px;background:transparent;width:100px;' value='<?php echo $attendancex['phone_number']; ?>'></td>
         <td><!-- <select name="mark"> -->

          <label><input type='checkbox' name='pres<?php echo $attendancex['member_id']; ?>' id='present' class='btn btn-primary' value='present' <?php echo $checked; ?> > Mark<?php echo $attendancex['member_id']; ?></label>


         </td>
      </tr>

         <?php
       // }
if(isset($_POST['mrkatt'])){
          // if(isset($_POST['pres'.$attendancex['member_id']])){
            echo "<script>alert('hhhhhhhh')</script>";
           }
       }

       ?>


         </tbody>

</table>
<!-- <button type="submit" name="fet_mark" class="btn btn-primary pull-right">Mark Attendance</button> -->

<button type="submit" name="mrkatt">sss</button>

</form>
</div></div>



  </div>

 </div>
      </div>
        </div>



        <div class="col-md-4">

</div>
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

