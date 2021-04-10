<?php
$dropactive = "settings";
$active = "manusers";
include 'layout/headside.php';

$_SESSION['pass'];

//generate password
$gen_pass = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 9)), 0, 9);             

$pic_acc = select("SELECT * FROM church_login WHERE user = '".$_SESSION['user']."' && pass='".$_SESSION['pass']."'");
foreach($pic_acc as $pic_accs){}

if(isset($_POST['reg_user'])){
    $f_name = filter_input(INPUT_POST,'f_name',FILTER_SANITIZE_STRING);
    $u_name = filter_input(INPUT_POST,'u_name',FILTER_SANITIZE_STRING);
    $p_ass = filter_input(INPUT_POST,'p_ass',FILTER_SANITIZE_STRING);
    $access = filter_input(INPUT_POST,'access',FILTER_SANITIZE_STRING);
    $e_mail = filter_input(INPUT_POST,'e_mail',FILTER_SANITIZE_STRING);
    $tel = filter_input(INPUT_POST,'tel',FILTER_SANITIZE_STRING);

    if($_SESSION['a_level'] == 1){
        $branch = filter_input(INPUT_POST,'branch',FILTER_SANITIZE_STRING); 
    }else{
        $branch = $churchID;
    }
    
    $new_user = insert("INSERT INTO church_login(fullname,user,pass,a_level,email,tel,branch,flag,dateInsert)VALUES('$f_name','$u_name','$p_ass',' $access','$e_mail','$tel','$branch','',CURDATE())");
        if($new_user){       
            $s = "success";
            echo "<script>window.location.href='users?m=$s';</script>";
        }
}

if(@$_GET['m']);
if(@$_GET['m'] == 'success'){
    echo "<script type='text/javascript'>toastr.success('User Successfully Registered','SUCCESS',{timeOut: 7000})</script>";
}

if(@$_GET['fa'] == 'flagsuccess'){
    echo "<script type='text/javascript'>toastr.success('USER FLAGGED','SUCCESS',{timeOut: 7000})</script>";
}
if(@$_GET['fa'] == 'flagerror'){
    echo "<script type='text/javascript'>toastr.error('USER FLAGGING FAILED','FAILED',{timeOut: 7000})</script>";
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark text-lg">SYSTEM USERS</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">System Users</a></li>
              <li class="breadcrumb-item active">Manage Users</li>
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
<!--
                  <div class="card-header">
                    <h3 class="card-title">CREATE ACCOUNT</h3>
                    <div class="card-tools">
                    </div>
                  </div>
-->
                    <form class="form" action="" method="post" enctype="multipart/form-data">

                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <div class="form-group">
                                <input type="text" placeholder="Full Name" class="form-control"  name="f_name" id="f_name" required />
                            </div>
                            
                             <div class="form-group">
                                 <input type="email" placeholder="Email" class="form-control" name="e_mail" required />
                            </div>
                            
                            <div class="form-group">
                                <input type="number" class="form-control" name="tel" id="tel" placeholder="Phone e.g 504432198" required />
                            </div>
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                         <input type="text" placeholder="User Name" class="form-control" name="u_name" id="u_name" required />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <input type="text" class="form-control" value="<?php echo $gen_pass; ?>" name="p_ass" id="p_ass" required/>
                                    </div>
                                </div>
                                
                            </div>
                            
                            <div class="form-group">
                                <select required name="access" id="access" data-placeholder="Select Access Level" class="form-control select2" >
                                    <option></option>
                                    <?php if($_SESSION['a_level'] == 1){ ?>
                                    <option value="1">Administrator</option>
                                    <?php }?>
                                    <option value="3">Accountant</option>
                                    <option value="4">Registry / Host</option>
                                    <option value="5">Pastor</option>
                                    <option value="6">Counsellor</option>
                                </select>
                            </div>
                            
                            
                            <?php
                            if($_SESSION['a_level'] == 1){
                            ?>
                            <div class="form-group">
                                <select class="form-control select2" name="branch" data-placeholder="Select Branch" required>
                                    <option></option>
                                    <?php 
                                    $getbranches = select("SELECT * FROM branch_tb WHERE main_branch='$churchID'");
                                    foreach($getbranches as $branchgot){
                                    ?>
                                <option value="<?php echo $branchgot['branch_id']?>"><?php echo $branchgot['branch_name'];?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <?php } ?>
                            
                            <div class="form-group">
                                <input type="submit" name="reg_user" id="reg_user" onclick="return confirm('REGISTER NEW USER ?');" value="REGISTER NEW USER" class="btn btn-primary btn-block btn-md" />  
                            </div>
                        </div>
                        
                    </div>
                  </div>
                    </form>
                </div>
            </div>  
            
            
            <div class="col-md-8">
            <div class="card">
<!--
              <div class="card-header">
                <h3 class="card-title">CREATED ACCOUNT LIST</h3>
              </div>
-->
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                      <tr>
                        <th>FULL NAME</th>
                        <th>USER</th>
                        <th>PHONE</th>
                        <th class="text-center">ACTION</th>
                      </tr>
                  </thead>
                  <tbody>
                <?php
                 $getministry = select("SELECT * FROM church_login WHERE flag='0' AND branch='$churchID'");
                      if($getministry){
                    foreach($getministry as $mingotten){
                ?>
                  <tr>
                    <td> <?php echo $mingotten['fullname'];?> </td>
                    <td> <?php echo $mingotten['user'];?> </td>
                    <td> <?php echo $mingotten['tel'];?> </td>
                    <td class="text-center"> 
<!--
                        <a href="update-user?iid=<?php // echo encode5t($mingotten['id']);?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i>
                        </a>
-->
                        <a  href="flag-user?uid=<?php echo encode5t($mingotten['id']);?>" onclick="return confirm('FLAG USER ?');" class="btn btn-danger btn-sm">
                            <i class="fa fa-flag"></i> Flag
                        </a>  
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
<?php
include 'layout/footer.php';    
?>