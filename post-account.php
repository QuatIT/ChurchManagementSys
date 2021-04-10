<?php
$dropactive = "account";
$active = "postaccount";
include 'layout/headside.php';

$V5a4o2bmraei = select("SELECT * FROM account_tb WHERE branch_id='$churchID'");

if(isset($_POST['postAcc'])){

    $Vddmzupydkhp = trim($_POST['credit_ac_id']);
    $Vqwxhl4wxfek = trim($_POST['credit_ac_name']);
    $Vkslmbkhzm1x = trim($_POST['debit_ac_id']);
    $V0qx0c2ob3wb = trim($_POST['debit_ac_name']);
    $Vqcnum22ptbg = trim($_POST['credit_ac_number']);
    $V41y1yak2cka = trim($_POST['credit_ac_balance']);
    $V0xeiaqzpl4k = trim($_POST['debit_ac_number']);
    $Vwfvagpsj1zq = trim($_POST['debit_ac_balance']);
    $Vovknnn341bi = trim($_POST['amount']);
    $V3glc3mjo1t1 = trim($_POST['narration']);
    $Vgc0usxqfufi = date('Y-m-d, h:m:i');
    $Vmleqbmpejyx = trim('Account Post');
    
    $Vnb3mtcxyfv0  = ($V41y1yak2cka + $Vovknnn341bi);
    $Vcuur5b5wkrs = ($Vwfvagpsj1zq - $Vovknnn341bi);

    $V12ext3gtwse = update("UPDATE account_tb SET acc_balance='$Vnb3mtcxyfv0' WHERE account_id='$Vddmzupydkhp' AND branch_id='$churchID'");
    $V12ext3gtwse .= update("UPDATE account_tb SET acc_balance='$Vcuur5b5wkrs' WHERE account_id='$Vkslmbkhzm1x' AND branch_id='$churchID'");
    $V12ext3gtwse .= insert("INSERT into transaction_tb(branch_id,creditAccName,creditAccID,creditAccBal,debitAccName,debitAccID,debitAccBal,amount,transaction_type,naration,date) VALUES('$churchID','$Vqwxhl4wxfek','$Vddmzupydkhp','$V41y1yak2cka','$V0qx0c2ob3wb','$Vkslmbkhzm1x','$Vwfvagpsj1zq','$Vovknnn341bi','$Vmleqbmpejyx','$V3glc3mjo1t1','$Vgc0usxqfufi')");
    $V12ext3gtwse .= insert("INSERT into transaction_tb(branch_id,creditAccName,creditAccID,creditAccBal,debitAccName,debitAccID,debitAccBal,amount,transaction_type,naration,date) VALUES('$churchID','$Vqwxhl4wxfek','$Vddmzupydkhp','$Vnb3mtcxyfv0','$V0qx0c2ob3wb','$Vkslmbkhzm1x','$Vcuur5b5wkrs','$Vovknnn341bi','$Vmleqbmpejyx','$V3glc3mjo1t1','$Vgc0usxqfufi')");

    if($V12ext3gtwse){
        echo "<script type='text/javascript'>toastr.success('Account Posted','SUCCESS',{timeOut: 7000})</script>";
        echo "<script>window.location.href='post-account';</script>";
    }else{
        echo "<script type='text/javascript'>toastr.error('PLEASE TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
    }
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">POST ACCOUNT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Account</a></li>
              <li class="breadcrumb-item active">Create Account</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    
                    <form class="form" action="" method="post" enctype="multipart/form-data">

                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                              <label>Credit Account <i class="text-danger">*</i></label>
                                <select name="credit_ac_id" class="form-control select2" data-placeholder="Select Credit Account" onchange="ac_code(this.value);">
                                    <option></option>
                                    <?php foreach($V5a4o2bmraei as $Vvgi0ibukqd1){ ?>
                                        <option value="<?php echo $Vvgi0ibukqd1['account_id']; ?>">
                                            <?php echo $Vvgi0ibukqd1['account_name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            
                            <div class="form-group">
                            <label>Debit Account <i class="text-danger">*</i></label>
                                
                             <select name="debit_ac_id" class="form-control select2" data-placeholder="Select Debit Account" onchange="adr_code(this.value);">
                                 <option></option>
                                    <?php foreach($V5a4o2bmraei as $Vyi5p0pvan30){ ?>
                                        <option value="<?php echo $Vyi5p0pvan30['account_id']; ?>">
                                            <?php echo $Vyi5p0pvan30['account_name']; ?>
                                        </option>
                                    <?php } ?>
                            </select>
                            </div>
                            
                            <div class="form-group">
                              <label>Amount <i class="text-danger">*</i></label>
                                  <input type="number" class="form-control" min="1" name="amount" placeholder="Amount" required />
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            
                            <div class="form-group">
                            <span id="cde"></span>
                        </div>
                            
                            <div class="form-group">
                                <span id="dr"></span>
                            </div>
                            
                            <div class="form-group">
                              <label>Narration <i class="text-danger">*</i></label>
                                  <input type="text" class="form-control" name="narration" placeholder="Narration" required />
                            </div>
                        </div>
                        
                        
                        <div class="col-md-4">
                            
                        <div class="form-group">
                            <span id="cde1"></span>
                        </div>
                            
                        
                        <div class="form-group">
                            <span id="dr1"></span>
                        </div>
                            
                        <div class="form-group">
                            <label style="color:white;">.</label>
                            <input type="submit" name="postAcc" onclick="return confirm('POST ACCOUNT ?');" value="POST ACCOUNT" class="btn btn-primary btn-block btn-sm" />  
                        </div>
                        </div>
                    </div>
                  </div>
                    </form>
                </div>
            </div>  
            
            
            <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>DATE</th>
                    <th>CREDIT ACCOUNT</th>
                    <th>BALANCE</th>
                    <th>DEBIT ACCOUNT</th>
                    <th>BALANCE</th>
                    <th>AMOUNT</th>
                    <th>NARATION</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $gettransaction = select("SELECT creditAccName, creditAccBal, debitAccName, debitAccBal, amount, naration, doe FROM transaction_tb WHERE branch_id='$churchID'");
                      if($gettransaction){
                    foreach($gettransaction as $transdet){
                ?>
                  <tr>
                    <td> <?php echo $transdet['doe'];?> </td>
                    <td> <?php echo $transdet['creditAccName'];?> </td>
                    <td> <?php echo $transdet['creditAccBal'];?> </td>
                    <td> <?php echo $transdet['debitAccName'];?> </td>
                    <td> <?php echo $transdet['debitAccBal'];?> </td>
                    <td> <?php echo $transdet['amount'];?> </td>
                    <td> <?php echo $transdet['naration'];?> </td>
                  </tr>
                      <?php } 
                    }?>
                  </tbody>
                </table>
              </div>
            </div>
            </div>  
        </div>
      </div>
    </section>
  </div>

<?php include 'layout/footer.php'; ?>
<script>

function ac_code(val){
	
        $('#loader').html("Please Wait...");
        $('#cde').load('acr_code.php?id='+val, function(){
		$('#loader').html("");
       });

        $('#cde1').load('acr_code1.php?id='+val, function(){
		$('#loader').html("");
       });
}

function adr_code(val){
	
        $('#loader').html("Please Wait...");
        $('#dr').load('adr_code.php?id='+val, function(){
		$('#loader').html("");
       });

        $('#dr1').load('adr_code1.php?id='+val, function(){
		$('#loader').html("");
       });
}
</script>