<?php
$dropactive = "reports";
$active = "minreport";
include 'layout/headside.php';


if(isset($_POST['fetch'])){
    $searchtype = trim(htmlentities($_POST['searchtype']));
    
    if($searchtype == "service"){
        $serviceName = trim(htmlentities($_POST['service_name']));
        echo 'report-attendance?st=$searchtype&sid=$serviceName';
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
            <h1 class="m-0 text-dark text-lg">MINISTRY & GROUP REPORTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Reports</a></li>
              <li class="breadcrumb-item active">Ministry & Group Reports</li>
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
                    <th width="50%">MINISTRY NAME</th>
                    <th>NO. OF MEMBERS</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getmin = select("SELECT * FROM ministry_tb");
                      if($getmin){
                    foreach($getmin as $getmind){
                        $sern = select("select * from membership_tb where group_name='".$getmind['group_id']."' or group_name='".$getmind['group_name']."'");
//                        if($sern){
                            $numMembers = count($sern)
                ?>
                  <tr>
                    <td> <?php echo $getmind['group_name'];?> </td>
                    <td> <?php echo $numMembers;?> </td>
                  </tr>
                      <?php  } }?>
                      

                  </tbody>
                    <tfoot>
                        <tr> 
                        <td colspan="1"></td>
                            <td class="text-right"> 
                                <a href="report-printm?mt=ministry" target="_blank" class="btn btn-warning btn-sm">
                                    <i class="fa fa-print"></i> PRINT REPORT
                                </a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
              </div>
            </div>
        </div>  
            
        <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table id="attrep" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="50%">GROUP NAME</th>
                    <th>NO. OF MEMBERS</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $getgmin = select("SELECT * FROM g_ministry_tb");
                      if($getgmin){
                    foreach($getgmin as $getgmind){
                        $serng = select("select * from membership_tb where group_name='".$getgmind['g_id']."' or group_name='".$getgmind['g_name']."'");
                            $numMembersg = count($serng)
                ?>
                  <tr>
                    <td> <?php echo $getgmind['g_name'];?> </td>
                    <td> <?php echo $numMembersg;?> </td>
                  </tr>
                      <?php  }
                    }?>
                  </tbody>
                    <tfoot>
                        <tr> 
                        <td colspan="1"></td>
                            <td class="text-right"> 
                                <a href="report-printm?mt=group" target="_blank" class="btn btn-warning btn-sm">
                                    <i class="fa fa-print"></i> PRINT REPORT
                                </a>
                            </td>
                        </tr>
                    </tfoot>
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
    function input_type(val){
        $('#loader').html("Please Wait...");
        $('#seaarchtype').load('at-report-type.php?rt='+val, function(){
        $('#loader').html("");
        });
    } 
</script>