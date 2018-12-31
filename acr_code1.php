<?php
include 'assets/core/connection.php';

$q = $_GET['id'];
//echo "<script>alert('{$q}')</script>";
//exit;
$sql = select("SELECT * FROM account_tb WHERE account_id='$q' ");

if(count($sql) > 0){
foreach($sql as $query){}

//    echo 'Account Number <input type="text" name="credit_ac_number" class="form-control" value="'.$query['account_id'].'" readonly> ';
    echo 'Account Balance <input type="text" name="credit_ac_balance" class="form-control" value="'.$query['acc_balance'].'" readonly>';

}else{
    echo '<div class="alert alert-dismissible alert-secondary">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Sorry!</strong> Account number not found.
</div>';
}


?>
