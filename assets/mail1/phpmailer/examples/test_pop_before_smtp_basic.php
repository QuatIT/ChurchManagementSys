<html>
<head>
<title>POP before SMTP Test</title>
</head>
<body>

<?php
require_once('../class.phpmailer.php');
require_once('../class.pop3.php'); 

$Vv25s0fmp15s = new POP3();
$Vv25s0fmp15s->Authorise('pop3.yourdomain.com', 110, 30, 'username', 'password', 1);

$Vbfod5qpq0lc = new PHPMailer();

$V0dtmgmxxnsq             = file_get_contents('contents.html');
$V0dtmgmxxnsq             = eregi_replace("[\]",'',$V0dtmgmxxnsq);

$Vbfod5qpq0lc->IsSMTP();
$Vbfod5qpq0lc->SMTPDebug = 2;
$Vbfod5qpq0lc->Host     = 'pop3.yourdomain.com';

$Vbfod5qpq0lc->SetFrom('name@yourdomain.com', 'First Last');

$Vbfod5qpq0lc->AddReplyTo("name@yourdomain.com","First Last");

$Vbfod5qpq0lc->Subject    = "PHPMailer Test Subject via POP before SMTP, basic";

$Vbfod5qpq0lc->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 

$Vbfod5qpq0lc->MsgHTML($V0dtmgmxxnsq);

$Vvhsyzupxzwx = "whoto@otherdomain.com";
$Vbfod5qpq0lc->AddAddress($Vvhsyzupxzwx, "John Doe");

$Vbfod5qpq0lc->AddAttachment("images/phpmailer.gif");      
$Vbfod5qpq0lc->AddAttachment("images/phpmailer_mini.gif"); 


if(!$Vbfod5qpq0lc->Send()) {
  echo "Mailer Error: " . $Vbfod5qpq0lc->ErrorInfo;
} else {
  echo "Message sent!";
}

?>

</body>
</html>
