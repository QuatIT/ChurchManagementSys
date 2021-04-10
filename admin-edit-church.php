<?php
$dropactive = "church";
$active = "newchurch";
include 'layout/headside.php';

if(isset($_GET['bid'])){
    $branchID = $_GET['bid'];
}else{
    echo "<script>windows.locations.href='admin-new-church';</script>";
}

$getChurch= select("SELECT * FROM branch_tb WHERE branch_id='$branchID'");
foreach($getChurch as $churchgot){}
//$churchID = "ASC-".sprintf('%04s',$churchnum);

if(isset($_POST['regChurch'])){
    $church_id = htmlspecialchars(trim($_POST['church_id']));
    $church_name = htmlspecialchars(trim($_POST['branch_name']));
    $church_prefix = htmlspecialchars(trim($_POST['branch_prefix']));
    $location = htmlspecialchars(trim($_POST['location']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['tel']));
    
    $update_church = update("UPDATE branch_tb SET branch_name='$church_name', branch_prefix='$church_prefix', location='$location', email='$email', phone='$phone' WHERE branch_id='$branchID'");

    $update_church_login = update("UPDATE church_login SET fullname='$church_name', email='$email', tel='$phone' WHERE branch='$branchID'");
    
//    $new_church_admin = insert("INSERT INTO church_login(fullname,user,pass,a_level,email,tel,branch,dateInsert) VALUES('$church_name','$gen_user','$gen_password','1','$email','$phone','$church_id',CURDATE())");
    
    if($update_church and $update_church_login){       
        $s = "success";
        echo "<script>window.location.href='admin-new-church?ua=$s';</script>";
    }else{
        echo "<script type='text/javascript'>toastr.error('TRY AGAIN LATER','FAILED',{timeOut: 7000})</script>";
    }
}

//if(@$_GET['ca'] == 'success'){
//    echo "<script type='text/javascript'>toastr.success('CHURCH REGISTERED','SUCCESS',{timeOut: 7000})</script>";
//}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3 class="m-0 text-dark"> <i class="fa fa-home"></i> CHURCH</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Church</a></li>
              <li class="breadcrumb-item active">New Church</li>
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
                                <input type="text" placeholder="church ID" class="form-control" value="<?php echo $churchgot['branch_id'];?>"  name="church_id" required readonly />
                            </div>
                            
                            <div class="form-group">
                            <input type="text" placeholder="Church Name" class="form-control" value="<?php echo $churchgot['branch_name'];?>"  name="branch_name" required />
                            </div>
                            
                            <div class="form-group">
                                <input type="text" placeholder="Church Prefix e.g RPL" class="form-control" value="<?php echo $churchgot['branch_prefix'];?>"  name="branch_prefix" required />
                            </div>
                            
                             <div class="form-group">
                                 <input type="text" placeholder="Location" value="<?php echo $churchgot['location'];?>" class="form-control" name="location" required />
                            </div>
                            
                            <div class="form-group">
                                 <input type="email" placeholder="Email" value="<?php echo $churchgot['email'];?>" class="form-control" name="email" required />
                            </div>
                            
                            <div class="form-group">
                            <input type="number" class="form-control" name="tel" id="tel" value="<?php echo $churchgot['phone'];?>" placeholder="Phone e.g 504432198" required />
                            </div>
                            
                            <div class="form-group">
                                <input type="submit" name="regChurch" id="reg_user" onclick="return confirm('UPDATE RECORDS ?');" value="UPDATE RECORDS" class="btn btn-primary btn-block btn-md" />  
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
                        <th>CHURCH NAME</th>
                        <th>LOCATION</th>
                        <th>PHONE</th>
<!--                        <th class="text-center">ACTION</th>-->
                      </tr>
                  </thead>
                  <tbody>
                <?php
                 $getministry = select("SELECT * FROM branch_tb WHERE branch_type='1'");
                      if($getministry){
                    foreach($getministry as $mingotten){
                ?>
                  <tr>
                    <td> <?php echo $mingotten['branch_name'];?> </td>
                    <td> <?php echo $mingotten['location'];?> </td>
                    <td> <?php echo $mingotten['phone'];?> </td>
<!--
                    <td class="text-center"> 
                        <a href="update-user?bid=<?#php  echo $mingotten['branch_id'];?>" class="btn btn-info btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <a  href="flag-user?bid=<?#php echo $mingotten['branch_id'];?>" onclick="return confirm('FLAG USER ?');" class="btn btn-danger btn-sm">
                            <i class="fa fa-flag"></i> Flag
                        </a>  
                    </td>
-->
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