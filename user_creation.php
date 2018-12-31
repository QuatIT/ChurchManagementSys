<?php
include 'layout/head.php';

$msg='';
$error = '';

if(isset($_POST['btnSubmit'])){

$username = trim(htmlspecialchars($_POST['username']));
$fullname = trim(htmlspecialchars($_POST['fullname']));
$a_level = trim(htmlspecialchars($_POST['ac_code']));
$email = trim(htmlspecialchars($_POST['email']));
$length = 4;
$pass = randomString($length);

if(empty($username) || empty($fullname) || empty($a_level) || empty($email)){
      $msg = '<div class="alert alert-dismissible alert-warning">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Warning!</strong> Please fill in a inputs.
</div>';
}else{

   $usr_sql= insert("INSERT INTO church_login(user,pass,fullname,a_level,email) VALUES('".$username."','".$pass."','$fullname','$a_level','$email')");

   if($usr_sql){
       $send_to = $email;
       $body = "Hwllo, Kindly find your Credential below<br><br>Username: <b>".$username."</b>Password: <b>".$pass."</b><br><br>Thank you.";
       $subj = "CREDENTIAL FOR ChMS";

       send_mail($send_to,$body,$subj);

       $msg = '<div class="alert alert-dismissible alert-secondary">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Well done!</strong> User created successfully.
</div>';
   }else{
        $error = '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Try again!</strong> User creation failed.
</div>';
   }
   }

}


?>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px; margin-top:15px; margin-bottom:0px; border:2px solid #760373; height:auto; padding:30px; background-color:#fff;">

            <h3>USER CREATION</h3><hr>

            <div class="col-md-12">
            <?php
                if(isset($msg)){
                    echo $msg;
                }else{
                    echo $error;
                }
            ?>
            </div>


            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">


            <form action="" method="post">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6 form-group">
                             <label>Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Full Name</label>
                            <input type="text" name="fullname" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="col-md-6 form-group">
                            <label>Access Level</label>
                            <select name="ac_code" class="form-control">
                                    <option value="1">Administrator</option>
                                    <option value="2">Accounts</option>
                                    <option value="3">Clerk</option>
                            </select>
                        </div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                           <input type="submit" name="btnSubmit" class="btn btn-primary btn-block" value="Create User Account">
                        </div>
                    </div>
                </div>

            </form>

                    </div>
                    <div class="col-md-2"></div>
                </div>
            </div>

        </div>
    </div>
</div>


<?php
include 'layout/foot.php';
?>
