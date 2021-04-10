<?php
$dropactive = "reports";
$active = "transactions";
include 'layout/headside.php';

$V5a4o2bmraei = select("SELECT * FROM account_tb");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">TRANSACTION REPORTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Reports</a></li>
              <li class="breadcrumb-item active">Transaction Reports</li>
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
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="transrep" class="table table-bordered table-striped">
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
                 $gettransaction = select("SELECT creditAccName, creditAccBal, debitAccName, debitAccBal, amount, naration, doe FROM transaction_tb");
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
              <!-- /.card-body -->
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