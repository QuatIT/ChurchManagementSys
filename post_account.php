<?php
include 'layout/head.php';

$msg = '';
$error = '';

$acc_sql = select("SELECT * FROM account_tb");

if(isset($_POST['postAcc'])){

    //Get Data from from fields...
    $credit_ac_id = trim($_POST['credit_ac_id']);
    $credit_ac_name = trim($_POST['credit_ac_name']);
    $debit_ac_id = trim($_POST['debit_ac_id']);
    $debit_ac_name = trim($_POST['debit_ac_name']);
    $credit_ac_number = trim($_POST['credit_ac_number']);
    $credit_ac_balance = trim($_POST['credit_ac_balance']);
    $debit_ac_number = trim($_POST['debit_ac_number']);
    $debit_ac_balance = trim($_POST['debit_ac_balance']);
    $amount = trim($_POST['amount']);
    $narration = trim($_POST['narration']);
    $date = date('Y-m-d, h:m:i');
    $transaction_type = trim('Account Post');

    //transaction Calulations..
    $newCreditBalance  = ($credit_ac_balance + $amount);
    $newDebitBalance = ($debit_ac_balance - $amount);

    //updating and inserting into tables....
    $sql = update("UPDATE account_tb SET acc_balance='$newCreditBalance' WHERE account_id='$credit_ac_id'");
    $sql .= update("UPDATE account_tb SET acc_balance='$newDebitBalance' WHERE account_id='$debit_ac_id'");
    $sql .= insert("INSERT into transaction_tb(creditAccName,creditAccID,creditAccBal,debitAccName,debitAccID,debitAccBal,amount,transaction_type,naration,date) VALUES('$credit_ac_name','$credit_ac_id','$credit_ac_balance','$debit_ac_name','$debit_ac_id','$debit_ac_balance','$amount','$transaction_type','$narration','$date')");
    $sql .= insert("INSERT into transaction_tb(creditAccName,creditAccID,creditAccBal,debitAccName,debitAccID,debitAccBal,amount,transaction_type,naration,date) VALUES('$credit_ac_name','$credit_ac_id','$newCreditBalance','$debit_ac_name','$debit_ac_id','$newDebitBalance','$amount','$transaction_type','$narration','$date')");

    if($sql){
        $msg = '<div class="alert alert-dismissible alert-secondary">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Well done!</strong> Account Posted Successfully.
                </div>';
    }else{
        $error = '<div class="alert alert-dismissible alert-danger">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Sorry!</strong> Something happened.
            </div>';
    }



}

?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px; margin-top:15px; margin-bottom:0px; border:2px solid #760373; height:auto; padding:30px; background-color:#fff;">


            <h3>POST ACCOUNT</h3><hr>


            <div class="col-md-6">
            <?php
                if(isset($msg)){
                    echo $msg;
                }else{
                    echo $error;
                }
            ?>
            </div>


            <form action="" method="post" enctype="multipart/form-data">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            Credit Account
                                <select name="credit_ac_id" class="form-control" onchange="ac_code(this.value);">
                                    <?php foreach($acc_sql as $cr_ac){ ?>
                                        <option value="<?php echo $cr_ac['account_id']; ?>">
                                            <?php echo $cr_ac['account_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
<!--                                <input type="text" value="<?php// echo $credit_acc_name;?>" class="form-control">-->

                        </div>
                        <div class="col-md-3 form-group">
                            <span id="cde"></span>
                        </div>
                        <div class="col-md-3 form-group">
                            <span id="cde1"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            Debit Account
                            <select name="debit_ac_id" class="form-control" onchange="adr_code(this.value);">
                                    <?php foreach($acc_sql as $dr_ac){ ?>
                                        <option value="<?php echo $dr_ac['account_id']; ?>">
                                            <?php echo $dr_ac['account_name']; ?>
                                        </option>
                                    <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <span id="dr"></span>
                        </div>
                        <div class="col-md-3 form-group">
                            <span id="dr1"></span>
                        </div>
                        <div class="col-md-6 form-group">
                            Amount <input type="number" min="0" name="amount" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                             Narration <input type="text" name="narration" class="form-control" >
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6 form-group">
                            <input type="submit" name="postAcc" class="btn btn-primary btn-block" value="Post Account">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
include 'layout/foot.php';
?>

<script>

function ac_code(val){
	// load the select option data into a div
        $('#loader').html("Please Wait...");
        $('#cde').load('acr_code.php?id='+val, function(){
		$('#loader').html("");
       });

        $('#cde1').load('acr_code1.php?id='+val, function(){
		$('#loader').html("");
       });
}

function adr_code(val){
	// load the select option data into a div
        $('#loader').html("Please Wait...");
        $('#dr').load('adr_code.php?id='+val, function(){
		$('#loader').html("");
       });

        $('#dr1').load('adr_code1.php?id='+val, function(){
		$('#loader').html("");
       });
}

</script>
