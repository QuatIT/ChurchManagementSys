<?php
$dropactive = "settings";
$active = "branches";
include 'layout/headside.php';

//generate password
//$gen_pass = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 9)), 0, 9);


$churchnum = count(select("SELECT * FROM branch_tb WHERE branch_type='2' AND main_branch='$churchID'")) + 1;
$brachID = $getfullchurchd['branch_prefix']."B-".sprintf('%04s',$churchnum);

if(isset($_POST['regChurch'])){
    $church_id = htmlspecialchars(trim($_POST['church_id']));
    $church_name = htmlspecialchars(trim($_POST['branch_name']));
    $church_prefix = htmlspecialchars(trim($_POST['branch_prefix']));
    $location = htmlspecialchars(trim($_POST['location']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['tel']));
    $branch_type = 2;
    
    //generate password
    $gen_password = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 9)), 0, 9);
    $gen_user = "churchadmin";

    $new_church = insert("INSERT INTO branch_tb(branch_id,branch_name,branch_prefix,main_branch,branch_type,location,email,phone)VALUES('$church_id','$church_name','$church_prefix','$churchID','$branch_type','$location','$email','$phone')");
    
    $new_church_admin = insert("INSERT INTO church_login(fullname,user,pass,a_level,email,tel,branch,dateInsert) VALUES('$church_name','$gen_user','$gen_password','2','$email','$phone','$church_id',CURDATE())");
    
    $to   = $email;
    $from = 'info@alphasigma.quatitsolutions.com';
    $name = 'ALPHA SIGMA';
    $subj = 'Branch Details';
    $msg = 'Hello, branch church created Successfully, see login Details Below. 
    <br> Branch ID: '.$church_id.'<br> Branch Name: '.$church_name.'<br> UserName: '.$gen_user.'<br> Password: '.$gen_password.'<br>THANK YOU.';
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg);
    if($error == 0){
        echo "<script type='text/javascript'>toastr.error('Branch Details Failed To Send','FAILED',{timeOut: 7000})</script>";
    }elseif($error==1){
        echo "<script type='text/javascript'>toastr.success('Branch Details Sent To Mail','SUCCESS',{timeOut: 7000})</script>";
    }
    
    if($new_church and $new_church_admin){       
        $s = "success";
        echo "<script>window.location.href='branches?ca=$s';</script>";
    }else{
        echo "<script type='text/javascript'>toastr.error('TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
    }
}

if(@$_GET['ca'] == 'success'){
    echo "<script type='text/javascript'>toastr.success('CHURCH REGISTERED','SUCCESS',{timeOut: 7000})</script>";
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark"> <i class="fa fa-sitemap"></i> BRANCHES</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Settings</a></li>
              <li class="breadcrumb-item active">Branches</li>
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
            <div class="col-md-4">
                <div class="card card-default">
                    <form class="form" action="" method="post" enctype="multipart/form-data">

                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="form-group">
                                <input type="text" placeholder="church ID" class="form-control" value="<?php echo $brachID;?>"  name="church_id" required readonly />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" placeholder="Church Name" class="form-control"  name="branch_name" required />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" placeholder="Church Prefix e.g RPL" class="form-control"  name="branch_prefix" required />
                            </div>
                            
                             <div class="form-group">
                                 <input type="text" placeholder="Location" class="form-control" name="location" required />
                            </div>
                            
                            <div class="form-group">
                                 <input type="email" placeholder="Email" class="form-control" name="email" required />
                            </div>
                            
                            <div class="form-group">
                            <input type="number" class="form-control" name="tel" id="tel" placeholder="Phone e.g 504432198" required />
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="regChurch" id="reg_user" onclick="return confirm('REGISTER NEW CHURCH ?');" value="REGISTER NEW CHURCH" class="btn btn-primary btn-block btn-md" />  
                            </div>
                        </div>
                        
                    </div>
                  </div>
                    </form>
                </div>
            </div>  
            
            
            <div class="col-md-8">
            <div class="card">
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>BRANCH NAME</th>
                        <th>LOCATION</th>
                        <th>PHONE</th>
<!--                        <th class="text-center">ACTION</th>-->
                      </tr>
                  </thead>
                  <tbody>
                <?php
                 $getministry = select("SELECT * FROM branch_tb WHERE main_branch='$churchID' AND branch_type='2'");
                      if($getministry){
                    foreach($getministry as $mingotten){
                ?>
                  <tr>
                    <td> <?php echo $mingotten['branch_name'];?> </td>
                    <td> <?php echo $mingotten['location'];?> </td>
                    <td> <?php echo $mingotten['phone'];?> </td>
<!--                    <td class="text-center"> -->
<!--
                        <a href="update-user?bid=<?php // echo $mingotten['branch_id'];?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a  href="flag-user?bid=<?php //echo $mingotten['branch_id'];?>" onclick="return confirm('FLAG USER ?');" class="btn btn-danger btn-sm">
                            <i class="fa fa-flag"></i> Flag
                        </a>  
-->
<!--                    </td>-->
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
<?php
include 'layout/footer.php';    
?>