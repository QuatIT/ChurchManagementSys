<?php
include 'layout/head.php';

$msg = '';
$error = '';

//fetch from tables
$acc_type = select("SELECT * FROM account_type_tb ");
$acc_type_sql = select("SELECT * FROM account_type_tb ");
$assign_sql = select("SELECT membership_tb.member_id,membership_tb.full_name FROM membership_tb ");



foreach($acc_type_sql as $ac){}

if(isset($_POST['btnSubmit'])){
    $tithe_id = trim($_POST['tithe_id']);
    $member_id = trim($_POST['member_id']);
    $member_name = trim($_POST['member_name']);
    $tithe_amount = trim($_POST['tithe_amount']);
    $tithe_date = trim($_POST['tithe_date']);
    $transaction_type = trim('Tithe');

    if(empty($tithe_id) || empty($member_id) || empty($tithe_amount) || empty($tithe_date)){
          $msg = '<div class="alert alert-dismissible alert-warning">
                      <button type="button" class="close" data-dismiss="alert">&times;</button>
                      <strong>Warning!</strong> Please fill in a inputs.
                    </div>';
//        echo "<script>window.location.href='create_account.php'</script>";
    }else{

    //insert initial figures before transactions...
    $sql = insert("INSERT INTO tithe(tithe_id,member_id,tithe_amount,tithe_date) VALUES('$tithe_id','$member_id','$tithe_amount','$tithe_date')");


    //get name from id

$map_name= select("SELECT * FROM membership_tb WHERE member_id = '$member_id'");
foreach($map_name as $map_names){}

    //insert figures after transactions
    $sql .= insert("INSERT INTO transaction_tb(amount,member_id,member_name,transaction_type,naration,date) VALUES('$tithe_amount','$member_id','".$map_names['full_name']."','$transaction_type','$transaction_type','$tithe_date')");

    if($sql){
        $msg = '<div class="alert alert-dismissible alert-secondary">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong> Tithe Transaction Created Successfully.
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



            <h3>TITHE ACCOUNT</h3><hr>

            <div class="col-md-6">
            <?php
                if(isset($msg)){
                    echo $msg;
                }else{
                    echo $error;
                }
            ?>
            </div>


            <form action="" method="post">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label>TITHE ID </label>
                            <input type="text" name="tithe_id" value="<?php echo "TITH-".mt_rand(1,9).mt_rand(1000,9999).mt_rand(100,999).date('s'); ?>" class="form-control">
                        </div>
                        <div class="col-md-3 form-group">
                           <label>Member</label>  <select class="form-control" name="member_id" onchange="m_id(this.value);">
                            <?php foreach($assign_sql as $ass_row){ ?>
                                        <option value="default"> -- Select Member --</option>
                                        <option value="<?php echo $ass_row['member_id']; ?>">
                                            <?php echo $ass_row['full_name']; ?>
                                        </option>

                            <?php } ?>
                                    </select>
                        </div>
                        <div class="col-md-3 form-group">
                            <span id="memd"></span>
                        </div>
                        <div class="col-md-6 form-group">
                           <label> Tithe Amount </label>
                            <input type="number" name="tithe_amount" class="form-control" required>
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Payment Date</label>
                            <input type="date" class="form-control" name="tithe_date" required>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6 form-group">
                            <label>.</label>
                            <input type="submit" name="btnSubmit" class="btn btn-primary btn-block form-control" value="Save Tithe">
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
function m_id(val){
	// load the select option data into a div
        $('#loader').html("Please Wait...");
        $('#memd').load('mem_id.php?mid='+val, function(){
		$('#loader').html("");
       });
}
</script>
