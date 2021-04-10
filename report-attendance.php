<?php
$dropactive = "reports";
$active = "attendanceReport";
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
            <h1 class="m-0 text-dark text-lg">ATTENDANCE REPORTS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Reports</a></li>
              <li class="breadcrumb-item active">Attendance Reports</li>
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
                <form class="form" method="post" id="headcount" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                              <select class="form-control select2" onchange="input_type(this.value);" data-placeholder="FILTER BY" name="searchtype" required>
                                <option></option>
                                <option value="service"> Service</option>
                                <option value="date"> Date</option>
                                <option value="daterange"> Date Range</option>
<!--                                <option value="all"> All Attendance</option>-->
                                  </select>
                            </div>
                        </div>
                        <div class="col-md-4" id="seaarchtype"></div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <input type="submit" name="fetch" value="FETCH REPORT" class="btn btn-primary btn-block btn-md" />  
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
<!--                                <input type="R" name="reset" value="RESET" class="btn btn-danger btn-block btn-md" />-->
                                <a href="report-attendance" class="btn btn-danger btn-md btn-block"> RESET</a>
                            </div>
                        </div>
                        
                    </div>
                  </div>
                    </form>
                </div>
            </div> 
            
            <?php
                if(isset($_POST['fetch'])){
                    $searchtype = trim(htmlentities($_POST['searchtype']));

                    if($searchtype == "service"){
                        $serviceName = trim(htmlentities($_POST['service_name']));
                        $servna = select("select * from service_tb where service_id='$serviceName' AND branch_id='$churchID'");
                        foreach($servna as $servnadet){}
//                    }

//                }
            ?>    
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <b>REPORT FOR <?php echo strtoupper($servnadet['service_name']);?></b>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="attrep" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>DATE</th>
                    <th>SERVICE</th>
                    <th>MEN</th>
                    <th>WOMEN</th>
                    <th>YOUTH</th>
                    <th>CHILDREN</th>
                    <th>NO LIMIT</th>
                    <th>TOTAL</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $gettransaction = select("SELECT * FROM attendance_tb WHERE ministry_id='$serviceName' AND branch_id='$churchID'");
                      if($gettransaction){
                    foreach($gettransaction as $transdet){
                        //GET service name
                        $sern = select("select * from service_tb where service_id='".$transdet['ministry_id']."'");
                        foreach($sern as $servgot){
                ?>
                  <tr>
                    <td> <?php echo $transdet['attend_date'];?> </td>
                    <td> <?php echo $servgot['service_name'];?> </td>
                    <td> <?php echo $transdet['men'];?> </td>
                    <td> <?php echo $transdet['women'];?> </td>
                    <td> <?php echo $transdet['youth'];?> </td>
                    <td> <?php echo $transdet['children'];?> </td>
                    <td> <?php echo $transdet['nolimit'];?> </td>
                    <td> <?php echo $transdet['population'];?> </td>
                  </tr>
                      <?php } }
                    }?>
                    
                  </tbody>
                    <tfoot>
                        <tr> 
                        <td colspan="7"></td>
                            <td> 
                                <a href="report-print?st=<?php echo $searchtype;?>&sn=<?php echo $serviceName;?>" target="_blank" class="btn btn-warning btn-sm btn-block">
                                    <i class="fa fa-print"></i> PRINT REPORT
                                </a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
              </div>
            </div>
        </div> 
            <?php  
                    }elseif($searchtype == "date"){
                        $serviceDate = trim(htmlentities($_POST['date']));
            ?>
            
            
            <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <b>REPORT FOR <?php echo strtoupper(date("l jS F Y",strtotime($serviceDate)));?></b>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="attrep" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>DATE</th>
                    <th>SERVICE</th>
                    <th>MEN</th>
                    <th>WOMEN</th>
                    <th>YOUTH</th>
                    <th>CHILDREN</th>
                    <th>NO LIMIT</th>
                    <th>TOTAL</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $gettransaction = select("SELECT * FROM attendance_tb WHERE attend_date='$serviceDate'");
                      if($gettransaction){
                    foreach($gettransaction as $transdet){
                        //GET service name
                        $sern = select("select * from service_tb where service_id='".$transdet['ministry_id']."'");
                        foreach($sern as $servgot){
                ?>
                  <tr>
                    <td> <?php echo $transdet['attend_date'];?> </td>
                    <td> <?php echo $servgot['service_name'];?> </td>
                    <td> <?php echo $transdet['men'];?> </td>
                    <td> <?php echo $transdet['women'];?> </td>
                    <td> <?php echo $transdet['youth'];?> </td>
                    <td> <?php echo $transdet['children'];?> </td>
                    <td> <?php echo $transdet['nolimit'];?> </td>
                    <td> <?php echo $transdet['population'];?> </td>
                  </tr>
                      <?php } }
                    }?>
                  </tbody>
                    <tfoot>
                        <tr> 
                        <td colspan="7"></td>
                            <td> 
                                <a href="report-print?st=<?php echo $searchtype;?>&sd=<?php echo $serviceDate;?>" target="_blank" class="btn btn-warning btn-sm btn-block">
                                    <i class="fa fa-print"></i> PRINT REPORT
                                </a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
              </div>
            </div>
        </div>
            
            <?php 
                    }elseif($searchtype == "daterange"){
                    $datefrom = trim(htmlentities($_POST['datefrom']));
                    $dateto = trim(htmlentities($_POST['dateto']));
                ?>
            
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                <b>REPORT FROM <?php echo strtoupper(date("l jS F Y",strtotime($datefrom)));?> TO <?php echo strtoupper(date("l jS F Y",strtotime($dateto)));?></b>
                </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="attrep" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>DATE</th>
                    <th>SERVICE</th>
                    <th>MEN</th>
                    <th>WOMEN</th>
                    <th>YOUTH</th>
                    <th>CHILDREN</th>
                    <th>NO LIMIT</th>
                    <th>TOTAL</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $gettransaction = select("SELECT * FROM attendance_tb WHERE branch_id='$churchID' AND attend_date BETWEEN '$datefrom' AND '$dateto'");
                      if($gettransaction){
                    foreach($gettransaction as $transdet){
                        //GET service name
                        $sern = select("select * from service_tb where service_id='".$transdet['ministry_id']."'");
                        foreach($sern as $servgot){
                ?>
                  <tr>
                    <td> <?php echo $transdet['attend_date'];?> </td>
                    <td> <?php echo $servgot['service_name'];?> </td>
                    <td> <?php echo $transdet['men'];?> </td>
                    <td> <?php echo $transdet['women'];?> </td>
                    <td> <?php echo $transdet['youth'];?> </td>
                    <td> <?php echo $transdet['children'];?> </td>
                    <td> <?php echo $transdet['nolimit'];?> </td>
                    <td> <?php echo $transdet['population'];?> </td>
                  </tr>
                      <?php } }
                    }?>
                  </tbody>
                    <tfoot>
                        <tr> 
                        <td colspan="7"></td>
                            <td> 
                                <a href="report-print?st=<?php echo $searchtype;?>&df=<?php echo $datefrom;?>&dt=<?php echo $dateto; ?>" target="_blank" class="btn btn-warning btn-sm btn-block">
                                    <i class="fa fa-print"></i> PRINT REPORT
                                </a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
              </div>
            </div>
        </div>
            
            
            
            
            
            
            
            
         <?php } }?>   
            
            
        <div class="col-md-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="transrep" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>DATE</th>
                    <th>SERVICE</th>
                    <th>MEN</th>
                    <th>WOMEN</th>
                    <th>YOUTH</th>
                    <th>CHILDREN</th>
                    <th>NO LIMIT</th>
                    <th>TOTAL</th>
                  </tr>
                  </thead>
                  <tbody>
                <?php
                 $gettransaction = select("SELECT * FROM attendance_tb");
                      if($gettransaction){
                    foreach($gettransaction as $transdet){
                        //GET service name
                        $sern = select("select * from service_tb where service_id='".$transdet['ministry_id']."' AND branch_id='$churchID'");
                        foreach($sern as $servgot){
                ?>
                  <tr>
                    <td> <?php echo $transdet['attend_date'];?> </td>
                    <td> <?php echo $servgot['service_name'];?> </td>
                    <td> <?php echo $transdet['men'];?> </td>
                    <td> <?php echo $transdet['women'];?> </td>
                    <td> <?php echo $transdet['youth'];?> </td>
                    <td> <?php echo $transdet['children'];?> </td>
                    <td> <?php echo $transdet['nolimit'];?> </td>
                    <td> <?php echo $transdet['population'];?> </td>
                  </tr>
                      <?php } }
                    }?>
                  </tbody>
                    <tfoot>
                        <tr> 
                        <td colspan="7"></td>
                            <td> 
                                <a href="report-print?st=full" target="_blank" class="btn btn-warning btn-sm btn-block">
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