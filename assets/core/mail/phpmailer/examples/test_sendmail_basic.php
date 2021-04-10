<html>
<head>
<title>PHPMailer - Sendmail basic test</title>
</head>
<body>

<?php

require_once('../class.phpmailer.php');

$Vbfod5qpq0lc             = new PHPMailer(); 

$Vbfod5qpq0lc->IsSendmail(); 

$V0dtmgmxxnsq             = file_get_contents('contents.html');
$V0dtmgmxxnsq             = eregi_replace("[\]",'',$V0dtmgmxxnsq);

$Vbfod5qpq0lc->AddReplyTo("name@yourdomain.com","First Last");

$Vbfod5qpq0lc->SetFrom('name@yourdomain.com', 'First Last');

$Vbfod5qpq0lc->AddReplyTo("name@yourdomain.com","First Last");

$Vvhsyzupxzwx = "whoto@otherdomain.com";
$Vbfod5qpq0lc->AddAddress($Vvhsyzupxzwx, "John Doe");

$Vbfod5qpq0lc->Subject    = "PHPMailer Test Subject via Sendmail, basic";

$Vbfod5qpq0lc->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 

$Vbfod5qpq0lc->MsgHTML($V0dtmgmxxnsq);

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
