<html>
<head>
<title>PHPMailer - SMTP basic test with authentication</title>
</head>
<body>

<?php


error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');

require_once('../class.phpmailer.php');


$Vbfod5qpq0lc             = new PHPMailer();

$V0dtmgmxxnsq             = file_get_contents('contents.html');
$V0dtmgmxxnsq             = eregi_replace("[\]",'',$V0dtmgmxxnsq);

$Vbfod5qpq0lc->IsSMTP(); 
$Vbfod5qpq0lc->Host       = "mail.yourdomain.com"; 
$Vbfod5qpq0lc->SMTPDebug  = 2;                     
                                           
                                           
$Vbfod5qpq0lc->SMTPAuth   = true;                  
$Vbfod5qpq0lc->Host       = "mail.yourdomain.com"; 
$Vbfod5qpq0lc->Port       = 26;                    
$Vbfod5qpq0lc->Username   = "yourname@yourdomain"; 
$Vbfod5qpq0lc->Password   = "yourpassword";        

$Vbfod5qpq0lc->SetFrom('name@yourdomain.com', 'First Last');

$Vbfod5qpq0lc->AddReplyTo("name@yourdomain.com","First Last");

$Vbfod5qpq0lc->Subject    = "PHPMailer Test Subject via smtp, basic with authentication";

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
