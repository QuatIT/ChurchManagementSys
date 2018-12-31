<?php
include 'layout/head.php';

$_SESSION['pass'];

//generate password
$gen_pass = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 8)), 0, 8);


$pic_acc = select("SELECT * FROM church_login WHERE user = '".$_SESSION['user']."' && pass='".$_SESSION['pass']."'");
foreach($pic_acc as $pic_accs){}

if(isset($_POST['reg_user'])){
$f_name = filter_input(INPUT_POST,'f_name',FILTER_SANITIZE_STRING);
 $u_name = filter_input(INPUT_POST,'u_name',FILTER_SANITIZE_STRING);
  $p_ass = filter_input(INPUT_POST,'p_ass',FILTER_SANITIZE_STRING);
   $access = filter_input(INPUT_POST,'access',FILTER_SANITIZE_STRING);
    $e_mail = filter_input(INPUT_POST,'e_mail',FILTER_SANITIZE_STRING);
    $tel = filter_input(INPUT_POST,'tel',FILTER_SANITIZE_STRING);
     $branch = filter_input(INPUT_POST,'branch',FILTER_SANITIZE_STRING);

$new_user = insert("INSERT INTO church_login(fullname,user,pass,a_level,email,tel,branch,dateInsert)VALUES('$f_name','$u_name','$p_ass',' $access','$e_mail','$tel','$branch',CURDATE())");
if($new_user){
    echo "<script>alert('User Successfully Registered');
    window.location='register_user.php'</script>";
}


}



?>
<?php
if($pic_accs['a_level']=='1'){?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8" style="margin-left:15px;margin-top:15px;margin-bottom:0px;border:2px solid #760373;height:auto; padding:30px;background-color:#fff;">

            <h3>ROHI CHURCH USER REGISTRATION</h3><hr>

          <!--   <div class="row">
                <div class="col-md-12">


                </div>
            </div> -->


            <form action="" method="post" enctype="multipart/form-data">
                     <div class="container-fluid" style="margin-left:22px;">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <table class="table table-borderless" style="font-weight:bolder;font-size:22px;font-family:Times New Roman;">


                                    <tr>

                                        <td>Full name</td><td><input type="text" class="form-control"  name="f_name" id="f_name" style="width:225px;font-size:20px;"/></td>
                                    </tr>

                                    <tr>
                                        <td>UserName</td><td><input type="text" class="form-control" style="width:225px;font-size:20px;" name="u_name" id="u_name"/></td>
                                    </tr>

                                    <tr>
                                        <td>Password</td><td><input type="text" class="form-control"  style="width:225px;font-size:24px;" value="<?php echo $gen_pass; ?>" name="p_ass" id="p_ass" readonly/></td>
                                    </tr>
                                    <tr>
                                        <td>Access Level</td><td><select name="access" id="access"  class="form-control" style="width:225px;font-size:20px;"/><option value="">Make A Selection</option>
                                            <option value="1">Administrator</option>
                                            <option value="2">Clerk</option>
                                            <option value="3">Ministry/Group Leader</option>
                                            <option value="4">Accountant</option>
                                            <option value="5">Counsellor</option>
                                        </select></td>
                                    </tr>

                                    <tr>
                                        <td>Email</td><td><input type="email" class="form-control"  style="width:225px;font-size:20px;" name="e_mail"/></td>
                                    </tr>

                                    <tr>

                                        <td>Phone Number</td><td><input type="number" class="form-control"  style="width:225px;font-size:20px;" name="tel" id="tel" placeholder="format 504432198" /></td>
                                    </tr>

                                    <tr>

                                        <td>Branch</td><td><input type="text" class="form-control" value="branch1" style="width:225px;font-size:20px;" name="branch" id="branch" readonly/></td>
                                    </tr>
                                    <tr>


                                        <td></td><td><input type="submit" class="btn btn-primary" value="REGISTER NEW USER" style="width:225px;" name="reg_user" id="reg_user"/></td>
                                    </tr>

                    </table>
                </form>
            </div></div>
    </div>
    <div class="col-md-4"></div>
</div>


<?php
include 'layout/foot.php';
?>
<?php } ?>
