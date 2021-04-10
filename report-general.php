<?php
$dropactive = "reports";
$active = "generalrep";
include 'layout/headside.php';


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">GENERAL REPORT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Reports</a></li>
              <li class="breadcrumb-item active">General Reports</li>
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
                <table id="exampl" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="50%" >CHECK LIST</th>
                    <th>VALUES</th>
<!--                    <th>COST (GHC)</th>-->
                  </tr>
                  </thead>
                  <tbody>

                  <tr>
                    <td> Number Of Members </td>
                    <td> <?php echo count(select("SELECT * FROM membership_tb WHERE branch_id='$churchID'"));?> </td>
                  </tr>

                  <tr>
                    <td> Number Of Ministries </td>
                    <td> <?php echo count(select("SELECT * FROM ministry_tb WHERE branch_id='$churchID'"));?> </td>
                  </tr>

                  <tr>
                    <td> Number Of Groups </td>
                    <td> <?php echo count(select("SELECT * FROM g_ministry_tb WHERE branch_id='$churchID'"));?> </td>
                  </tr>

                  <tr>
                    <td> Number Of Account Type </td>
                    <td> <?php echo count(select("SELECT * FROM account_type_tb WHERE branch_id='$churchID'"));?> </td>
                  </tr>

                  <tr>
                    <td> Number Of Accounts</td>
                    <td> <?php echo count(select("SELECT * FROM account_tb WHERE branch_id='$churchID'"));?> </td>
                  </tr>

                  <tr>
                    <td> Number Of Counsellings </td>
                    <td> <?php echo count(select("SELECT * FROM counselling WHERE branch_id='$churchID'"));?> </td>
                  </tr>
                      
                  <tr>
                    <td> Number Of Inventory </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE branch_id='$churchID'"));?> </td>
                  </tr>
                      
                      
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