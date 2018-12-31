<?php
include 'assets/core/connection.php';

$q = $_GET['id'];

$sql = select("SELECT * FROM account_tb WHERE account_id='$q'");

if(count($sql) > 0){
foreach($sql as $query){}


    echo 'Account Balance <input type="text" name="debit_ac_balance" class="form-control" value="'.$query['acc_balance'].'" readonly>';

}else{
    echo '<div class="alert alert-dismissible alert-secondary">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Sorry!</strong> Account number not found.
</div>';
}


?>
