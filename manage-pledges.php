<?php
$dropactive = "account";
$active = "mpledgepage";
include 'layout/headside.php';

if(@$_GET['m']);
if(@$_GET['m'] == 'success'){
    echo "<script type='text/javascript'>toastr.success('PLEDGE SAVED','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['m'] == 'updatesuccess'){
    echo "<script type='text/javascript'>toastr.success('PLEDGE UPDATED','SUCCESS',{timeOut: 7000})</script>";
}

?>

  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">MANAGE PLEDGES</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="pledge">Pledge</a></li>
              <li class="breadcrumb-item active">Manage Pledge</li>
            </ol>
          </div>
        </div>
      </div>
    </div>

      
    <section class="content">
      <div class="container-fluid"> 
        <div class="row">
            <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>PLEDGE ID</th>
                    <th>NAME</th>
                    <th>AMOUNT</th>
                    <th>STATUS</th>
                    <th>DATE</th>
                    <th class="text-center">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $gettransaction = select("SELECT * FROM pledge_tb WHERE branch_id='$churchID'");
                      if($gettransaction){
                    foreach($gettransaction as $transdet){
                ?>
                  <tr>
                    <td> <?php echo $transdet['pledge_id'];?> </td>
                    <td> <?php echo $transdet['member_name'];?> </td>
                    <td> <?php echo $transdet['amount'];?> </td>
                    <td style="color:white;"> 
                        <?php if($transdet['pledge_status'] == 'Pledged'){?>
                        <a class="btn btn-warning btn-xs "><?php echo $transdet['pledge_status'];?></a>
                        <?php }?>
                        <?php if($transdet['pledge_status'] == 'Fulfilled'){?>
                        <a class="btn btn-success btn-xs "><?php echo $transdet['pledge_status'];?></a>
                        <?php }?>
                    </td>
                    <td> <?php echo $transdet['payment_date'];?> </td>
                    <td class="text-center"> 
                        <a class="btn btn-info btn-xs" href="update-pledge?pid=<?php echo encode5t($transdet['id']); ?>"><i class="fa fa-edit"></i> Edit</a> 
                    </td>
                  </tr>
                      <?php }}?>
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