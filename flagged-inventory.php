<?php
$dropactive = "inventory";
$active = "flaggedinventory";
include 'layout/headside.php';

//if(@$_GET['m']);
//if(@$_GET['m'] == 'success'){
//    echo "<script type='text/javascript'>toastr.success('ITEM ADDED TO INVENTORY','SAVE SUCCESSFUL',{timeOut: 7000})</script>";
//}
//
//if(@$_GET['m'] == 'updatesuccess'){
//    echo "<script type='text/javascript'>toastr.success('ITEM UPDATED','SUCCESS',{timeOut: 7000})</script>";
//}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">FLAGGED INVENTORY</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Inventory</a></li>
              <li class="breadcrumb-item active">Flagged Inventory</li>
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>ITEM</th>
                    <th>LOCATION</th>
                    <th>STATUS</th>
                    <th>QUANTITY</th>
                    <th>VALUE</th>
                    <th class="text-center">ACTION</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getmember = select("SELECT * FROM inventory WHERE status='Flagged' AND branch_id='$churchID'");
                      if($getmember){
                    foreach($getmember as $memgotten){
                ?>
                  <tr>
                    <td><?php echo $memgotten['item_id'];?></td>
                    <td><?php echo $memgotten['item_name'];?></td>
                    <td><?php echo $memgotten['item_location'];?></td>
                       <td style="color:white;">
                        <?php if( $memgotten['item_status'] == 'Excellent'){?>
                        <a class="btn btn-success btn-xs "><?php echo  $memgotten['item_status'];?></a>
                        <?php }?>
                        <?php if( $memgotten['item_status'] == 'Good'){?>
                        <a class="btn btn-primary btn-xs "><?php echo  $memgotten['item_status'];?></a>
                        <?php }?>
                        <?php if( $memgotten['item_status'] == 'Bad'){?>
                        <a class="btn btn-warning btn-xs "><?php echo  $memgotten['item_status'];?></a>
                        <?php }?>
                        <?php if( $memgotten['item_status'] == 'Worse'){?>
                        <a class="btn btn-secondary btn-xs "><?php echo  $memgotten['item_status'];?></a>
                        <?php }?>
                        <?php if( $memgotten['item_status'] == 'Damaged'){?>
                        <a class="btn btn-danger btn-xs "><?php echo  $memgotten['item_status'];?></a>
                        <?php }?>
                    </td>
                    <td><?php echo $memgotten['item_quantity'];?></td>
                    <td><?php echo $memgotten['item_value'];?></td>
                    <td class="text-center">
                        <a href="unflag-inventory?vid=<?php echo encode5t($memgotten['id']);?>" onclick="return confirm('UNFLAG ITEM ?');" class="btn btn-success btn-sm">
                            <i class="fa fa-check"></i> UNFLAG
                        </a>
<!--
                        <a  href="flag-inventory?iid=<?php // echo encode5t($memgotten['id']);?>" class="btn btn-danger btn-sm">
                            <i class="fa fa-flag"></i>
                        </a>
-->
                    </td>
                  </tr>
                    <?php }}?>
                </table>
              </div>
            </div>
            </div>
          </div>
      </div>
    </section>
  </div>

<?php include 'layout/footer.php';?>