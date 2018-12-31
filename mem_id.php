<?php
include 'assets/core/connection.php';

$q = $_GET['mid'];
//echo "<script>alert('{$q}')</script>";
//exit;
$sql = select("SELECT * FROM membership_tb WHERE member_id='$q' ");

if(count($sql) > 0){
foreach($sql as $query){}

    echo '<label>Member Name</label>
            <input type="text" name="member_id" class="form-control" value="'.$query['member_id'].'" readonly>';
//  echo 'Account Balance <input type="text" name="credit_ac_balance" class="form-control" value="'.$query['acc_balance'].'" readonly>';

}else{
    echo '<div class="alert alert-dismissible alert-secondary">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Sorry!</strong> Member not found.
</div>';
}


?>
