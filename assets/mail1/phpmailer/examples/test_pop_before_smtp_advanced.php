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

$Vbfod5qpq0lc = new PHPMailer(true); 

$Vbfod5qpq0lc->IsSMTP();

try {
  $Vbfod5qpq0lc->SMTPDebug = 2;
  $Vbfod5qpq0lc->Host     = 'pop3.yourdomain.com';
  $Vbfod5qpq0lc->AddReplyTo('name@yourdomain.com', 'First Last');
  $Vbfod5qpq0lc->AddAddress('whoto@otherdomain.com', 'John Doe');
  $Vbfod5qpq0lc->SetFrom('name@yourdomain.com', 'First Last');
  $Vbfod5qpq0lc->AddReplyTo('name@yourdomain.com', 'First Last');
  $Vbfod5qpq0lc->Subject = 'PHPMailer Test Subject via mail(), advanced';
  $Vbfod5qpq0lc->AltBody = 'To view the message, please use an HTML compatible email viewer!'; 
  $Vbfod5qpq0lc->MsgHTML(file_get_contents('contents.html'));
  $Vbfod5qpq0lc->AddAttachment('images/phpmailer.gif');      
  $Vbfod5qpq0lc->AddAttachment('images/phpmailer_mini.gif'); 
  $Vbfod5qpq0lc->Send();
  echo "Message Sent OK</p>\n";
} catch (phpmailerException $V2bwrjburyuf) {
  echo $V2bwrjburyuf->errorMessage(); 
} catch (Exception $V2bwrjburyuf) {
  echo $V2bwrjburyuf->getMessage(); 
}
?>

</body>
</html>
