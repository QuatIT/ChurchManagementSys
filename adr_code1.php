<?php
include 'assets/core/connection.php';

$V1ghrtyc0rr3 = $_GET['id'];

$V12ext3gtwse = select("SELECT * FROM account_tb WHERE account_id='$V1ghrtyc0rr3'");

if(count($V12ext3gtwse) > 0){
foreach($V12ext3gtwse as $V1ghrtyc0rr3uery){}


    echo '<label>Account Balance<i class="text-danger">*</i></label> <input type="text" name="debit_ac_balance" class="form-control" value="'.$V1ghrtyc0rr3uery['acc_balance'].'" readonly>';

}else{
    echo '<div class="alert alert-dismissible alert-secondary">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Sorry!</strong> Account number not found.
</div>';
}


?>