<?php
//session_start();
include 'layout/head.php';
error_reporting(0);
//require 'assets/core/connection.php';
date_default_timezone_set("Africa/Accra");





$get_memb = select("SELECT * FROM membership_tb");
// $get_counselled = select("SELECT * FROM counselling WHERE full_name='".$get_membs['full_name']."'");

  // $i_d = trim(htmlspecialchars($_POST['i_d']));

if(isset($_POST['fet_inf'])){
	$coun = $_POST['coun'];
    // echo "<script>alert('{$coun}')</script>";

	$get_memDet = select("SELECT * FROM counselling WHERE full_name = '".$coun."'");
    foreach($get_memDet as $get_memDets){}


            $get_img = select("SELECT * FROM membership_tb WHERE full_name='".$coun."'");
        foreach($get_img as $get_imgs){}
            // echo "<script>alert('{$get_imgs['member_id']}')</script>";
         //    $m_id = $get_imgs['member_id'];
         // $f_nome = $get_imgs['full_name'];
         //  $couns = $get_imgs['counsellor'];

}


//@$get_memDet=array();
//insert
if(isset($_POST['save_btn'])){


    $mem_msg = trim(htmlspecialchars($_POST['mem_msg']));
     $n_ame = trim(htmlspecialchars($_POST['n_ame']));
    $counsell = trim(htmlspecialchars($_POST['counse']));
    

    $pick_name = select("SELECT * FROM membership_tb WHERE member_id='".$n_ame."'");
    foreach($pick_name as $pick_names){}

       

$save_notes = insert("INSERT INTO counselling(member_id,full_name,counsellor,msg,dateInsert)VALUES('".$n_ame."','".$pick_names['full_name']."','$counsell','$mem_msg',CURDATE())");
if(true){
    echo "<script>alert('Counselling Notes Saved');
    window.location='counselling.php'</script>";

}
}


?>

<div class="container-fluid">
    <form action='' method='POST'>
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">


            <h3>MEMBER COUNSELLING</h3>

            <select name='coun' id='coun' class='form-control' style='margin-left:400px;width:200px;margin-top:-40px;'>
            	<!-- <option value='<?php #echo @$_POST['coun']; ?>'><?php #echo @$_POST['coun']; ?></option> -->
            <option value=''>--Select By Member--</option>
            <?php foreach($get_memb as $get_membs){?>
            <option value='<?php echo $get_membs['full_name']; ?>'><?php echo $get_membs['full_name'];} ?></option></select>
            <input type='submit' class='btn btn-primary' name='fet_inf' id='fet_inf' style='margin-left:620px;margin-top:-55px;' value='FETCH INFORMATION'><input type='text' name='n_ame' id='n_ame' class='form-control' value ="<?php echo $get_imgs['member_id'];?>" style='margin-left:800px;width:200px;margin-top:-55px;'>
            <br><br>

            <div class='container' style='margin-left:300px;overflow:auto; height:400px;width:700px;'>
                <div class='col-md-6'>
            <table class='table table-bordered'style='width:500px;margin-top:-10px;'>
            <thead class='' >
            <tr>
            <th>IMAGE</th>
            <th>ID</th>
            <th>NAME</th>
            <th>DATE</th>
            <th>COUNSELLOR</th>
            <th>MESSAGE</th>
            </tr>
            </thead>
            <tbody>

           <?php foreach($get_memDet as $get_memDets){?>
            <tr>
            	<td><?php if($get_imgs['member_image']==''){ echo 'No Image';}else{?><img src='upload/image/<?php echo $get_imgs['member_image']; ?>'width=60 height=40></td>
            <?php }?>
            <td><input type='text' style = 'width:80px;border:0px;background:transparent;'name='i_d' value='<?php echo $get_imgs['member_id']; ?>'></td>
            <td><input type='text' style = 'width:120px;border:0px;background:transparent;'name='f_nome'value='<?php echo $get_memDets['full_name']; ?>'></td>
            <td><?php echo @$get_memDets['dateInsert']; ?></td>
            <td><?php echo @$get_memDets['counsellor']; ?></td>
            <td><?php echo @$get_memDets['msg']; ?></td>
            </tr>
        <?php } ?>
            </tbody>
            </table>
</div></div>

<div class= 'container'>
    <div class='col-md-4'>

<textarea name ='mem_msg'  placeholder = 'Counsellor Notes' class='form-control'style='width:200px;height:250px; margin-top:-400px;'></textarea><br>
<input type='text' name='counse' style='width:200px; border-style:solid;'placeholder='Enter Counsellor Name' /><br><br>
<input type='submit' name='save_btn' id='save_btn' class='btn btn-primary' value='Save Information' style='width:200px;'>

</div>




</div>
</div>
</form>
        </div>

