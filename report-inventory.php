<?php
$dropactive = "reports";
$active = "inventrep";
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
            <h1 class="m-0 text-dark text-lg">INVENTORY REPORTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Reports</a></li>
              <li class="breadcrumb-item active">Inventory Reports</li>
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
                    <th>COST (GHC)</th>
                  </tr>
                  </thead>
                  <tbody>

                  <tr>
                    <td> Number Of Invetory Items </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE status='Active'"));?> </td>
                    <td> 
                        <?php 
                                $sum = select("SELECT SUM(item_value) FROM inventory WHERE status='Active'");
                                echo $sum;
                        ?> 
                    </td>
                  </tr>

                  <tr>
                    <td> Number Of Exellent Items </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE item_status='Excellent'"));?> </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE item_status='Excellent'"));?> </td>
                  </tr>

                  <tr>
                    <td> Number Of Good Items </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE item_status='Good'"));?> </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE item_status='Good'"));?> </td>
                  </tr>

                  <tr>
                    <td> Number Of Bad Items </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE item_status='Bad'"));?> </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE item_status='Bad'"));?> </td>
                  </tr>

                  <tr>
                    <td> Number Of Worst Items </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE item_status='Worst'"));?> </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE item_status='Worst'"));?> </td>
                  </tr>

                  <tr>
                    <td> Number Of Damaged Items </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE item_status='Damaged'"));?> </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE item_status='Damaged'"));?> </td>
                  </tr>
                      
                  <tr>
                    <td> Number Of Flagged Items </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE status!='Active'"));?> </td>
                    <td> <?php echo count(select("SELECT * FROM inventory WHERE status!='Active'"));?> </td>
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