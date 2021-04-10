<html>
<head>
<title>PHPMailer - MySQL Database - SMTP basic test with authentication</title>
</head>
<body>

<?php


error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');

require_once('../class.phpmailer.php');


$Vbfod5qpq0lc                = new PHPMailer();

$V0dtmgmxxnsq                = file_get_contents('contents.html');
$V0dtmgmxxnsq                = eregi_replace("[\]",'',$V0dtmgmxxnsq);

$Vbfod5qpq0lc->IsSMTP(); 
$Vbfod5qpq0lc->Host          = "smtp1.site.com;smtp2.site.com";
$Vbfod5qpq0lc->SMTPAuth      = true;                  
$Vbfod5qpq0lc->SMTPKeepAlive = true;                  
$Vbfod5qpq0lc->Host          = "mail.yourdomain.com"; 
$Vbfod5qpq0lc->Port          = 26;                    
$Vbfod5qpq0lc->Username      = "yourname@yourdomain"; 
$Vbfod5qpq0lc->Password      = "yourpassword";        
$Vbfod5qpq0lc->SetFrom('list@mydomain.com', 'List manager');
$Vbfod5qpq0lc->AddReplyTo('list@mydomain.com', 'List manager');

$Vbfod5qpq0lc->Subject       = "PHPMailer Test Subject via smtp, basic with authentication";

@MYSQL_CONNECT("localhost","root","password");
@mysql_select_db("my_company");
$Vgs5eqsoia35  = "SELECT full_name, email, photo FROM employee WHERE id=$Vkriocz2qep2";
$Vxrvbhqnqlwj = @MYSQL_QUERY($Vgs5eqsoia35);

while ($Vnwijnctkkq3 = mysql_fetch_array ($Vxrvbhqnqlwj)) {
  $Vbfod5qpq0lc->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
  $Vbfod5qpq0lc->MsgHTML($V0dtmgmxxnsq);
  $Vbfod5qpq0lc->AddAddress($Vnwijnctkkq3["email"], $Vnwijnctkkq3["full_name"]);
  $Vbfod5qpq0lc->AddStringAttachment($Vnwijnctkkq3["photo"], "YourPhoto.jpg");

  if(!$Vbfod5qpq0lc->Send()) {
    echo "Mailer Error (" . str_replace("@", "&#64;", $Vnwijnctkkq3["email"]) . ') ' . $Vbfod5qpq0lc->ErrorInfo . '<br />';
  } else {
    echo "Message sent to :" . $Vnwijnctkkq3["full_name"] . ' (' . str_replace("@", "&#64;", $Vnwijnctkkq3["email"]) . ')<br />';
  }
  
  $Vbfod5qpq0lc->ClearAddresses();
  $Vbfod5qpq0lc->ClearAttachments();
}
?>

</body>
</html>
