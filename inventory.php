<?php
//session_start();
include 'layout/head.php';
//require 'assets/core/connection.php';
date_default_timezone_set("Africa/Accra");



 // echo "<script>alert('{$_SESSION['user']}')</script>";

$serial = 'Rohi-'.mt_rand(23,698).mt_rand(700,998);

$sel_product = select("SELECT * FROM inventory");

$_SESSION['user'];




// $user_det = select("SELECT * FROM membership_tb WHERE user ='".$_SESSION['user']."'");


if(isset($_POST['add_it'])){
    $item_id = trim(htmlspecialchars($_POST['item_id1']));
    $item_name = trim(htmlspecialchars($_POST['item_name1']));
    $item_state = trim(htmlspecialchars($_POST['item_state1']));
    $item_location = trim(htmlspecialchars($_POST['item_location']));
    $item_quantity = trim(htmlspecialchars($_POST['item_quantity1']));
    $item_value = trim(htmlspecialchars($_POST['item_value1']));
    // $item_date = trim(htmlspecialchars($_POST['item_date1']));


 $add_items = insert("INSERT INTO inventory(item_id,item_name,item_status,item_location,item_quantity,item_value,dateInsert)VALUES('$item_id','$item_name','$item_state','$item_location',$item_quantity','$item_value',CURDATE())");

 if($add_items){
 echo "<script>alert('Item Successfully Entered');
 window.location.assign('inventory.php')</script>";
}
}


?>

<div class="container-fluid">
  <form action='inventory.php' method='POST'>
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:500px;padding-top:10px;background-color:#fff;">


            <h3>CHURCH INVENTORY</h3>

<div class='col-md-4'>

<input type='text' name='item_id1' class='form-control' value='<?php echo $serial;?>' readonly>
ITEM NAME<input type='text' name='item_name1' class='form-control'required>
ITEM STATE<select name='item_state1' class='form-control' required>
    <option value=''>Select item state</option>
    <option value='Excellent'>Excellent</option>
    <option value='Good'>Good</option>
    <option value='Bad'>Bad</option>
    <option value='Worse'>Worse</option>
    <option value='Damaged'>Damaged</option>

</select>
QUANTITY<input type='number' name='item_quantity1' class='form-control' required >
LOCATION<select name='item_location' id='item_location' class='form-control' required >
    <option value=''><b>Select Location</b></option>
    <option value='Media room'>Media room</option>
    <option value='Lead Pastor office'>Lead Pastor's office</option>
    <option value='Main Auditorium'>Main Auditorium</option>
    <option value='Storeroom '>Storeroom </option>
    <option value=' Rehearsal room'> Rehearsal room</option>
    <option value='Pastoral Care Office'>Pastoral Care Office</option>
    <option value='Associate Pastor Office'>Associate Pastor's Office</option>
    <option value='No Limit Church '>No Limit Church </option>
    <option value='Sunday Service'>Sunday Service</option>
    <option value=' Ushers Room'> Ushers Room</option>
    <option value='Guest Pastor Room'>Guest Pastor's Room</option>
    <option value=' Kitchen '> Kitchen </option>
    <option value='GOS '>GOS </option>
    <option value='General '>General </option>
</select>
ESTIMATED VALUE<input type='number' name='item_value1' class='form-control' required>
DATE<input type='date' name='item_date1' class='form-control' value='<?php echo date('Y-m-d');?>' readonly><br>
<!-- INVENTORY TAKEN BY<input type='text' name='item_ids' class='form-control' value='<?php #echo $serial;?>' readonly> -->
<button type='submit' name='add_it' id='add_it' class='btn btn-primary' style='width:200px;'>ADD TO INVENTORY</button>
</form>
</div>

 <div class='container' style='margin-left:300px;margin-top:-440px;width:620px;height:420px;overflow:scroll;'>
    <div class ='col-md-8'>
    <table name='invent' id='invent' class='table table-bordered'>
        <thead class='thead-dark'>
            <tr>
                <th>ID</th>
                <th>ITEM</th>
                <th>LOCATION</th>
                <th>STATUS</th>
                <th>QUANTITY</th>
                <th>VALUE</th>
                 <th>BRANCH</th>
                 <th>BY</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($sel_product as $sel_products){
            #foreach($user_det as $user_dets){} ?>
        <tr>
            <td><?php echo @$sel_products['item_id']; ?></td>
            <td><?php echo @$sel_products['item_name']; ?></td>
            <td><?php  echo @$sel_products['item_location']; ?></td>
            <td><?php  echo @$sel_products['item_status']; ?></td>
            <td><?php  echo @$sel_products['item_quantity']; ?></td>
            <td><?php echo @$sel_products['item_value']; ?></td>
             <td><?php echo 'branch1';  ?></td>

            <td><?php echo $_SESSION['user'];?></td>
        </tr>
      <?php }?>
    </tbody>
</table>

</div>

    </div>

</div>
 </div>













</div>
        </div>

