<?php

session_start();

require 'assets/core/connection.php';
require 'assets/core/mail/phpmailer/class.phpmailer.php';
//error_reporting(0);

if(isset($_POST['log_in'])){



    $inputName = trim(htmlspecialchars($_POST['inputName']));
    $inputPassword = trim(htmlspecialchars($_POST['inputPassword']));


    $decision = query("SELECT * FROM church_login WHERE user='".$inputName."' && pass='".$inputPassword."'");

  if($decision){
     if(count($decision) > 0){

         foreach($decision as $decisions){
            $inputName1= $decisions['user'];
            $inputPassword1= $decisions['pass'];
             $a_level1= $decisions['a_level'];

        }

         if($a_level1 = '1'){

             $_SESSION['user']=$inputName1;
             $_SESSION['pass']=$inputPassword1;
             $_SESSION['a_level']=$a_level1;

             echo "<script>alert('LOGIN SUCCESSFUL')
                        window.location.href='dashboard.php'</script>";

         }else{

             echo "<script>alert('LOGIN FAILED')
                        window.location.href='index.php'</script>";

         }
     }else{

             echo "<script>alert('LOGIN FAILED')
                        window.location.href='index.php'</script>";

         }
      }

 }





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Church Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body#LoginForm{ background-image:url("https://hdwallsource.com/img/2014/9/blur-26347-27038-hd-wallpapers.jpg"); background-repeat:no-repeat; background-position:center; background-size:cover; padding:10px;}

.form-heading { color:#fff; font-size:23px;}
.panel h2{ color:#444444; font-size:18px; margin:0 0 8px 0;}
.panel p { color:#777777; font-size:14px; margin-bottom:30px; line-height:24px;}
.login-form .form-control {
  background: #f7f7f7 none repeat scroll 0 0;
  border: 1px solid #d4d4d4;
  border-radius: 4px;
  font-size: 14px;
  height: 50px;
  line-height: 50px;
}
.main-div {
  background: #ffffff none repeat scroll 0 0;
  border-radius: 2px;
  margin: 10px auto 30px;
  max-width: 38%;
  padding: 50px 70px 70px 71px;
}

.login-form .form-group {
  margin-bottom:10px;
}
.login-form{ text-align:center;}
.forgot a {
  color: #777777;
  font-size: 14px;
  text-decoration: underline;
}
.login-form  .btn.btn-primary {
  background: #f0ad4e none repeat scroll 0 0;
  border-color: #f0ad4e;
  color: #ffffff;
  font-size: 14px;
  width: 100%;
  height: 50px;
  line-height: 50px;
  padding: 0;
}
.forgot {
  text-align: left; margin-bottom:30px;
}
.botto-text {
  color: #ffffff;
  font-size: 14px;
  margin: auto;
}
.login-form .btn.btn-primary.reset {
  background: #ff9900 none repeat scroll 0 0;
}
.back { text-align: left; margin-top:10px;}
.back a {color: #444444; font-size: 13px;text-decoration: none;
}
#foot{
    font-size:20px;
    font-weight:bold;
}
#m_modal{
    float:left;
}
#send{
    width:64%;
    height:10%;



}
#e_head{
    font-weight:bold;
    font-size:20px;

}


    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>
<body>

<html>
  <head>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
  </head>
<body id="LoginForm">
<div class="container">
<br><br><br>
<center><h1 class="form-heading">ALPHA SIGMA</h1></center>
<!-- <center><h1 class="form-heading">CHURCH MANAGEMENT SYSTEM</h1></center> -->
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>ADMIN LOGIN</h2>
<!--
   <p>Please enter your username and password
   <br> Username: kofi<br> Password: Admin-3609919 <br></p>
-->
   </div>
    <form action="" method="post" name="Login" id="Login">

        <div class="form-group">
            <input type="text" class="form-control" id="inputName"  name="inputName"  >
</div>
         <div class="form-group">
             <input type="password" class="form-control" id="inputPassword" name="inputPassword" >
         </div>


<!-- modal Link-->
  <div class="forgot">
<a href="#" name="p_forgot" id="p_forgot" data-toggle="modal" data-target="#myModal">Forgot password?</a>
</div>

        <input type="submit" class="btn btn-primary" name="log_in" id="log_in" value="Login">
</form>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog" name="m_modal" id="m_modal">
  <form action='' method='post'>
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span>RESET PASSWORD</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &times;</button>

      </div>
      <div class="modal-body"><br>
        <p><span name="e_head" id="e_head">Enter Email</span> &nbsp; &nbsp;&nbsp;<input type="email" class="form-control" name="e_mail" id="e_mail" size="8" onfocus="if(this.value == 'value') { this.value = ''; }" value="value"></p>

        <button type="submit" class="btn btn-default"  name="send" id="send" onclick="check()">SEND</button>

        <?php
if(isset($_POST['send'])){

  $email_info = trim(htmlspecialchars($_POST['e_mail']));
  $_SESSION['e_mail']=$email_info;

  $email_search = select("SELECT * FROM church_login WHERE email = '".$email_info."' ");

    if($email_search){
        foreach($email_search as $email_searchs){}

      $new_password = trim("Admin-".mt_rand(1,7).mt_rand(50,800).mt_rand(900,990));



     $replace_new = update("UPDATE church_login SET pass='$new_password' WHERE email='".$email_info."' ");


    // $subject = "Reset Password";
    //  $body =  "Request for password has been accepted " .$new_password. " is the new login password ";


// echo "<script>alert('$email_info}')</script>";

//$to_query = select("SELECT * FROM members");
//foreach($replace_new as $to_row){
//$to = $to_row['e_mail'];
$tel =$email_searchs['tel'];



//SMS to members
function sendsms($body,$subject,$tel,$new_password){
 
     
$username = 'richardkanfrah';
$password = 'godwin1.';
// $subject = 'The Church Rohi';
 $subject = "Reset Password";
 $body =  "Request for password has been accepted " .$new_password. " is the new login password ";
$message= $subject.PHP_EOL.$body;

$from = "Rohi Church";//your senderid example "kwamena"max is 11 chars;
$baseurl = "http://isms.wigalsolutions.com/ismsweb/sendmsg/";

//All numbers must have a country code. delimit them with comma(,)

$params = "username=".$username."&password=".$password."&from=".$from."&to=".$tel."&message=".$message ;


//send the message
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$baseurl);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_POST,1);
curl_setopt($ch,CURLOPT_POSTFIELDS,$params);
$return = curl_exec($ch);
curl_close($ch);

$send = explode(" :: ",$return);
if(stristr($send[0],"SUCCESS") != FALSE){
echo "<script>alert('message sent')</script>";

}else{
echo "<script>alert('message could not be sent')</script>";


}
}
//sendsms($body,$subject,$tel);
sendsms($body,$subject,$tel,$new_password);
}


// $account="attservice.tech@gmail.com";
// $password="eternalking77";
// $from="attservice.tech@gmail.com";
// $from_name="CHURCH ";
// $msg= $bdy; // HTML message

// $mail = new PHPMailer();
// $mail->IsSMTP();
// $mail->CharSet = 'UTF-8';
// $mail->Host = "smtp.gmail.com";
// $mail->SMTPAuth= true;
// $mail->Port = 465; // Or 587
// //    $mail->SMTPDebug  = 2;
// $mail->Username= $account;
// $mail->Password= $password;
// $mail->SMTPSecure = 'ssl';
// $mail->From = $from;
// $mail->FromName= $from_name;
// $mail->isHTML(true);
// $mail->Subject = $subject;
// $mail->Body = $msg;
// $mail->addAddress($to);
// if(!$mail->send()){
//  echo "<script>alert('Incorrect Email Address') .'<br>'. Mailer Error:  . $mail->ErrorInfo;
//  window.location='index.php';</script>";
// }else{
//  echo "<script>alert('Password Has Been Sent');
//  window.location='index.php';</script>";


//     }
//   }

    }


?>
      </div>

      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
</form>
    </div>

    <p class="botto-text" name="foot" id="foot">Powered By Quat I.T Solutions &copy All Rights Reserved</p>
</div></div></div>


</body>
</html>

<script type="text/javascript">
function check(){
  if(document.getElementById('inputName').value==""){
    alert("");
    document.location.href('church_login.php');

  }else if(document.getElementById('inputPassword').value==""){
    alert("");
    document.location.href('church_login.php');
  }
}

</script>
</body>
</html>
