<?php
include 'assets/core/connection.php';
$V1ghrtyc0rr3 = $_GET['id'];
$V12ext3gtwse = select("SELECT * FROM account_tb WHERE account_id='$V1ghrtyc0rr3' ");
if (count($V12ext3gtwse) > 0) {
    foreach ($V12ext3gtwse as $V1ghrtyc0rr3uery) {
    }
    echo '<label> Account Number<i class="text-danger">*</i></label> <input type="text" name="credit_ac_number" class="form-control" value="' . $V1ghrtyc0rr3uery['account_id'] . '" readonly> <input type="text" name="credit_ac_name" class="form-control" value="' . $V1ghrtyc0rr3uery['account_name'] . '" hidden="hidden"> ';
} else {
    echo '<div class="alert alert-dismissible alert-secondary">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Sorry!</strong> Account number not found.
</div>';
}
?>