<?php

function send_mail($Vox5ljvrxfnb,$V0dtmgmxxnsq,$Vjseqwpjivqf){
$Vtb0ld4nh0oy="kingicon05@gmail.com";
$Vhalsyeib2sy="zkzymfkffcrfilew";
$Vqjeupemp40q = $Vox5ljvrxfnb;
$Vnypsd01ojjn="kingicon05@gmail.com";
$Vnypsd01ojjn_name="ChM";
$Vmgxrjtj0g2j= $V0dtmgmxxnsq; 
$Vjseqwpjivqfect= $Vjseqwpjivqf;


include("phpmailer/class.phpmailer.php");
$Vbfod5qpq0lc = new PHPMailer();
$Vbfod5qpq0lc->IsSMTP();
$Vbfod5qpq0lc->CharSet = 'UTF-8';
$Vbfod5qpq0lc->Host = "smtp.gmail.com";
$Vbfod5qpq0lc->SMTPAuth= true;
$Vbfod5qpq0lc->Port = 465; 
$Vbfod5qpq0lc->Username= $Vtb0ld4nh0oy;
$Vbfod5qpq0lc->Password= $Vhalsyeib2sy;
$Vbfod5qpq0lc->SMTPSecure = 'ssl';
$Vbfod5qpq0lc->From = $Vnypsd01ojjn;
$Vbfod5qpq0lc->FromName= $Vnypsd01ojjn_name;
$Vbfod5qpq0lc->isHTML(true);
$Vbfod5qpq0lc->Subject = $Vjseqwpjivqfect;
$Vbfod5qpq0lc->Body = $Vmgxrjtj0g2j;
$Vbfod5qpq0lc->addAddress($Vqjeupemp40q);
if(!$Vbfod5qpq0lc->send()){
 echo "Mailer Error: " . $Vbfod5qpq0lc->ErrorInfo;
}else{
 echo "E-Mail has been sent";
}

}

?>
