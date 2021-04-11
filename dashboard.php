<?php
$active = "dashboard";
include 'layout/headside.php';

$churchName = $getfullchurchd['branch_name'];
if(@$_GET['m']);
if(@$_GET['m'] == 'success'){
    if($_SESSION['a_level'] == 1 or $_SESSION['a_level'] == 2 or $_SESSION['a_level'] == 3 or $_SESSION['a_level'] == 5 or $_SESSION['a_level'] == 4 ){
       echo "<script type='text/javascript'>toastr.success('$churchName','Login Success',{timeOut: 10000})</script>"; 
    }else{
        echo "<script type='text/javascript'>toastr.success('AlphaSIGMA Admin','Login Success',{timeOut: 10000})</script>"; 
    }
    
}?>




  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-top:40px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
      </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
           
          <div class="col-12 col-sm-6 col-md-3">
<!--               <a href="manage-member" style="color:black;">-->
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">MEMBERHIP</span>
                <span class="info-box-number">
                  <?php echo count(select("SELECT * FROM membership_tb WHERE branch_id='$churchID'"));?>
                </span>
              </div>
            </div>
<!--            </a>-->
          </div>
            
        
          <div class="col-12 col-sm-6 col-md-3">
<!--              <a href="manage-ministry" style="color:black;">-->
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-chart-pie"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">MINISTRY</span>
                <span class="info-box-number"><?php echo count(select("SELECT * FROM ministry_tb WHERE branch_id='$churchID'"));?></span>
              </div>
            </div>
          </div>
        
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">PLEDGE</span>
                <span class="info-box-number">
                  <?php echo count(select("SELECT * FROM pledge_tb WHERE branch_id='$churchID'"));?>
                </span>
              </div>
            </div>
          </div>


          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
<!--              <a href="create-account" style="color:black;">-->
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-money-check-alt"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">ACCOUNTS</span>
                <span class="info-box-number"><?php echo count(select("SELECT * FROM account_tb WHERE branch_id='$churchID'"));?></span>
              </div>
            </div>
<!--              </a>-->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
<!--              <a href="new-councelling" style="color:black;">-->
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-heartbeat"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">COUNSELING</span>
                <span class="info-box-number"><?php echo count(select("SELECT * FROM counselling WHERE branch_id='$churchID'"));?></span>
              </div>
            </div>
<!--              </a>-->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
<!--              <a href="manage-inventory" style="color:black;">-->
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-list"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">INVENTORY</span>
                <span class="info-box-number"><?php echo count(select("SELECT * FROM inventory WHERE branch_id='$churchID'"));?></span>
              </div>
            </div>
<!--              </a>-->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
<!--              <a href="users" style="color:black;">-->
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">SYSTEM USERS</span>
                <span class="info-box-number"><?php echo count(select("SELECT * FROM church_login WHERE branch='$churchID'"));?></span>
              </div>
            </div>
<!--              </a>-->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
<!--              <a href="report-general" style="color:black;">-->
                <div class="info-box mb-3">
                  <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-folder"></i></span>
                  <div class="info-box-content">
                    <span class="info-box-text">REPORTS</span>
                    <span class="info-box-number">VIEW</span>
                  </div>
                </div>
<!--              </a>-->
          </div>
          <!-- /.col -->
        </div>

        <!-- Main row -->
        <div class="row">
          <div class="col-md-8">
              
            <!-- Bar chart -->
            <div class="card card-warning card-outline">
              <div class="card-header">
                <h3 class="card-title text-bold">
                  <i class="far fa-chart-bar"></i>
                  Monthly Attendance Chart
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="bar-chart" style="height: 300px;"></div>
              </div>
            </div>
			  
			</div>
          <div class="col-md-4">
              
            <!-- Bar chart -->
            <div class="card card-warning card-outline">
              <div class="card-header">
                <h3 class="card-title text-bold">
                  <i class="far fa-chart-bar"></i>
                  Weekly Attendance Chart
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="current-attendance-bar-chart" style="height: 300px;"></div>
              </div>
            </div>
			  
			</div>
 			<div class="col-md-5" style="display:none;">
            <!-- /.card -->

            <!-- Area chart -->
            <div class="card card-warning card-outline">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Offerings Chart
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="area-chart" style="height: 338px;" class="full-width-chart"></div>
              </div>
            </div>
            <!-- /.card -->

          </div>
            
          <div class="col-md-6">

            <!-- /.card -->

            <!-- Donut chart -->
            <div class="card card-warning card-outline collapse">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Financial Chart
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="donut-chart" style="height: 300px;"></div>
              </div>
            </div>
            <!-- /.card -->
              
              
                        <!-- Line chart -->
            <div class="card card-warning card-outline collapse">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Line Chart
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="line-chart" style="height: 300px;"></div>
              </div>
              <!-- /.card-body-->
            </div>
          </div>
        </div>
        <!-- /.row -->
          
        <!-- /.row -->
        <div class="row" style="display:none;">
          <div class="col-12">
             interactive chart 
            <div class="card card-warning card-outline collapse">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="far fa-chart-bar"></i>
                  Interactive Area Chart
                </h3>

                <div class="card-tools">
                  Real time
                  <div class="btn-group" id="realtime" data-toggle="btn-toggle">
                    <button type="button" class="btn btn-default btn-sm active" data-toggle="on">On</button>
                    <button type="button" class="btn btn-default btn-sm" data-toggle="off">Off</button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div id="interactive" style="height: 300px;"></div>
              </div>
            </div>
          </div>
        </div>
		  
		  
      </div>
    </section>
    <!-- /.content -->
  </div>

<?php 
//get attendance for january
$jan =  select("SELECT * FROM attendance_tb WHERE month(attend_date)='01' AND branch_id='$churchID'");
foreach($jan as $jandet){
    @$jantotal += $jandet['population'];  
} 

//get attendance for february
$feb =  select("SELECT * FROM attendance_tb WHERE month(attend_date)='02' AND branch_id='$churchID'");
foreach($feb as $febdet){
    @$febtotal += $febdet['population'];  
} 
//get attendance for march
$jan3 =  select("SELECT * FROM attendance_tb WHERE month(attend_date)='03' AND branch_id='$churchID'");
foreach($jan3 as $jan3det){
    @$jantotal3 += $jan3det['population'];  
} 
//get attendance for april
$jan4 =  select("SELECT * FROM attendance_tb WHERE month(attend_date)='04' AND branch_id='$churchID'");
foreach($jan4 as $jan4det){
    @$jantotal4 += $jan4det['population'];  
}
//get attendance for May
$jan5 =  select("SELECT * FROM attendance_tb WHERE month(attend_date)='05' AND branch_id='$churchID'");
foreach($jan5 as $jan5det){
    @$jantotal5 += $jan5det['population'];  
}
//get attendance for june
$jan6 =  select("SELECT * FROM attendance_tb WHERE month(attend_date)='06' AND branch_id='$churchID'");
foreach($jan6 as $jan6det){
    @$jantotal6 += $jan6det['population'];  
}
//get attendance for july
$jan7 =  select("SELECT * FROM attendance_tb WHERE month(attend_date)='07' AND branch_id='$churchID'");
foreach($jan7 as $jan7det){
    @$jantotal7 += $jan7det['population'];  
}
//get attendance for august
$jan8 =  select("SELECT * FROM attendance_tb WHERE month(attend_date)='08' AND branch_id='$churchID'");
foreach($jan8 as $jan8det){
    @$jantotal8 += $jan8det['population'];  
}
//get attendance for september
$jan9 =  select("SELECT * FROM attendance_tb WHERE month(attend_date)='09' AND branch_id='$churchID'");
foreach($jan9 as $jan9det){
    @$jant9 += $jan9det['population'];  
}
//get attendance for october
$jan10 =  select("SELECT * FROM attendance_tb WHERE month(attend_date)='10' AND branch_id='$churchID'");
foreach($jan10 as $jan10det){
    @$jantotal10 += $jan10det['population'];  
}
//get attendance for november
$jan11 =  select("SELECT * FROM attendance_tb WHERE month(attend_date)='11' AND branch_id='$churchID'");
foreach($jan11 as $jan11det){
    @$jantotal11 += $jan11det['population'];  
}
//get attendance for december
$jan12 =  select("SELECT * FROM attendance_tb WHERE month(attend_date)='12' AND branch_id='$churchID'");
foreach($jan12 as $jan12det){
    @$jantotal12 += $jan12det['population'];  
}


$getCurrentAttendance = select("SELECT * FROM attendance_tb WHERE branch_id = '$churchID' ORDER BY attend_date DESC LIMIT 1 ");
foreach($getCurrentAttendance as $currentAttendance){
  $men = $currentAttendance['men'];
  $women = $currentAttendance['women'];
  $children = $currentAttendance['children'];
  $youth = $currentAttendance['youth'];
  $nolimit = $currentAttendance['nolimit'];
}


include 'layout/footer.php'; 

?>