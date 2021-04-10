<?php


require '../class.phpmailer.php';

try {
	$Vbfod5qpq0lc = new PHPMailer(true); 

	$V0dtmgmxxnsq             = file_get_contents('contents.html');
	$V0dtmgmxxnsq             = preg_replace('/\\\\/','', $V0dtmgmxxnsq); 

	$Vbfod5qpq0lc->IsSMTP();                           
	$Vbfod5qpq0lc->SMTPAuth   = true;                  
	$Vbfod5qpq0lc->Port       = 25;                    
	$Vbfod5qpq0lc->Host       = "mail.yourdomain.com"; 
	$Vbfod5qpq0lc->Username   = "name@domain.com";     
	$Vbfod5qpq0lc->Password   = "password";            

	$Vbfod5qpq0lc->IsSendmail();  

	$Vbfod5qpq0lc->AddReplyTo("name@domain.com","First Last");

	$Vbfod5qpq0lc->From       = "name@domain.com";
	$Vbfod5qpq0lc->FromName   = "First Last";

	$Vqjeupemp40q = "someone@example...com";

	$Vbfod5qpq0lc->AddAddress($Vqjeupemp40q);

	$Vbfod5qpq0lc->Subject  = "First PHPMailer Message";

	$Vbfod5qpq0lc->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
	$Vbfod5qpq0lc->WordWrap   = 80; 

	$Vbfod5qpq0lc->MsgHTML($V0dtmgmxxnsq);

	$Vbfod5qpq0lc->IsHTML(true); 

	$Vbfod5qpq0lc->Send();
	echo 'Message has been sent.';
} catch (phpmailerException $V2bwrjburyuf) {
	echo $V2bwrjburyuf->errorMessage();
}
?>
