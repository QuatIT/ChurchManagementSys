<?php
include 'layout/head.php';

$msg = '';
$error = '';

$acc_type = select("SELECT * FROM account_type_tb ");
$acc_type_sql = select("SELECT * FROM account_type_tb ");



foreach($acc_type_sql as $ac){}

if(isset($_POST['btnSubmit'])){
    $pledge_id = trim($_POST['pledge_id']);
    $member_type = trim($_POST['member_type']);
    $member_name = trim($_POST['member_name']);
    $event_name = trim($_POST['event_name']);
    $payment_date = trim($_POST['payment_date']);
    $amount = trim($_POST['amount']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['address']);
    $pledge_status = trim('Pledged');

    if(empty($member_name) || empty($event_name) || empty($payment_date)|| empty($amount)||empty($phone)){
          $msg = '<div class="alert alert-dismissible alert-warning">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Warning!</strong> Please fill in a inputs.
                    </div>';
//        echo "<script>window.location.href='create_account.php'</script>";
    }else{
            $sql = insert("INSERT INTO pledge_tb(pledge_id,member_type,member_name,event_name,payment_date,amount,phone,address,pledge_status) VALUES('$pledge_id','$member_type','$member_name','$event_name','$payment_date','$amount','$phone','$address','$pledge_status')");

            if($sql){
                $msg = '<div class="alert alert-dismissible alert-secondary">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Well done!</strong> Pledge Created Successfully.
                            </div>';
            }else{
                $error = '<div class="alert alert-dismissible alert-danger">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Sorry!</strong> Something happened.
                            </div>';
            }
        }
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:auto;padding:30px;background-color:#fff;">



            <h4>CREATE PLEDGE <small class="pull-right"> <a href="manage_pledges.php"> <i class="fa fa-edit"></i> MANAGE PLEDGES</a></small></h4><hr>

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
                        <div class="col-md-4 form-group">
                            <label>Pledge ID </label>

                            <input type="text" name="pledge_id" value="<?php echo "PLDG-".mt_rand(1,9).mt_rand(1000,9999).mt_rand(100,999).date('s'); ?>" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 form-group">
                           <label> Membership type </label>
                                <select class="form-control" name="member_type" onchange="m_type(this.value);">
                                    <option value="default"> -- Select Membership --</option>
                                    <option value="Member"> Member</option>
                                    <option value="Visitor"> Visitor</option>
                                </select>
                        </div>

                        <div class="col-md-4 form-group">
                            <span id="memt"></span>
                        </div>

                        <div class="col-md-4 form-group">
                            <label> Event Name</label>
                            <input type="text" class="form-control" name="event_name" placeholder="Name Of Event" required>
                        </div>

                        <div class="col-md-4 form-group">
                            <label> Payment Date</label>
                            <input type="date" class="form-control" name="payment_date" required>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Amount</label>
                            <input type="number" class="form-control" min="1" name="amount" placeholder="Amount in Ghc" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Phone</label>
                            <input type="tel" class="form-control" placeholder="Active Phone Number" name="phone" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" name="address" placeholder="Valid Home/Work Address" required>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>.</label>
                            <input type="submit" name="btnSubmit" class="btn btn-primary btn-block form-control" value="Save Pledge">
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
function m_type(val){
	// load the select option data into a div
        $('#loader').html("Please Wait...");
        $('#memt').load('mem_type.php?mtp='+val, function(){
		$('#loader').html("");
       });
}
</script>
