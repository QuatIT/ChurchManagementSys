<?php
include 'layout/head.php';

$msg = '';
$error = '';

//$acc_type = select("SELECT * FROM account_type_tb ");
$pid = trim($_GET['pid']);
$pledge_sql = select("SELECT * FROM pledge_tb WHERE pledge_id='$pid' ");
foreach($pledge_sql as $pld){}

if(isset($_POST['updatePledge'])){
    $pledge_status = trim($_POST['pledge_status']);
    $pledge_id = trim($_POST['pledge_id']);

    if(empty($pledge_status)){
          $msg = '<div class="alert alert-dismissible alert-warning">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Warning!</strong> Please fill in a inputs.
                    </div>';
//        echo "<script>window.location.href='create_account.php'</script>";
    }else{
            $sql = update("UPDATE pledge_tb SET pledge_status='$pledge_status' WHERE pledge_id='$pledge_id'");

            if($sql){
                $msg = '<div class="alert alert-dismissible alert-secondary">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <strong>Well done!</strong> Pledge Updated Successfully.
                            </div>';
                header('Location: manage_pledges.php');
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



            <h4>UPDATE PLEDGE <small class="pull-right"> <a href="manage_pledges.php"> <i class="fa fa-edit"></i> MANAGE PLEDGES</a></small></h4><hr>

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
                            <input type="text" name="pledge_id" value="<?php echo $pld['pledge_id']; ?>" class="form-control" readonly>
                        </div>
                        <div class="col-md-4 form-group">
                           <label> Membership type </label>
                             <input type="text" name="member_type" value="<?php echo $pld['member_type']; ?>" class="form-control" readonly>
                        </div>

                        <div class="col-md-4 form-group">
                            <label> Member Name </label>
                            <input type="text" name="member_name" value="<?php echo $pld['member_name']; ?>" class="form-control" readonly>
                        </div>

                        <div class="col-md-4 form-group">
                            <label> Event Name</label>
                            <input type="text" class="form-control" value="<?php echo $pld['event_name']; ?>"  name="event_name" readonly>
                        </div>

                        <div class="col-md-4 form-group">
                            <label> Payment Date</label>
                            <input type="date" class="form-control" value="<?php echo $pld['payment_date']; ?>" name="payment_date" readonly>
                        </div>

                        <div class="col-md-4 form-group">
                            <label>Amount</label>
                            <input type="number" class="form-control" min="1" name="amount" value="<?php echo $pld['amount']; ?>" readonly>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Phone</label>
                            <input type="tel" class="form-control" value="<?php echo $pld['phone']; ?>" name="phone" readonly>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>Status</label>
                            <select class="form-control" name="pledge_status" required>
                                <option value="<?php echo $pld['pledge_status']?>"><?php echo $pld['pledge_status']?></option>
                                <option value="Pledged">Pledged</option>
                                <option value="Fulfilled"> Fulfilled</option>
                            </select>
                        </div>
                        <div class="col-md-4 form-group">
                            <label>.</label>
                            <input type="submit" name="updatePledge" class="btn btn-primary btn-block form-control" value="Update Pledge">
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
