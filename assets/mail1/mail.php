<?php

function mail_me($Vqjeupemp40q,$V2dm2mggiwmd,$Vhxuiwbotmxu,$Vvhsyzupxzwx){$Vtb0ld4nh0oy="quat.pay@gmail.com";
$Vhalsyeib2sy="Quat@solution,1234";
$Vox5ljvrxfnb = $Vqjeupemp40q;
$Vnypsd01ojjn="quat.pay@gmail.com";
$Vnypsd01ojjn_name="QUATPAY";
$Vmgxrjtj0g2j= $V2dm2mggiwmd;
$Vi5mrcgf4cpz="QUATPAY";
$Vvhsyzupxzwx=$Vox5ljvrxfnb;


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
$Vbfod5qpq0lc->Subject = $Vi5mrcgf4cpz;
$Vbfod5qpq0lc->Body = $Vmgxrjtj0g2j;
$Vbfod5qpq0lc->AddAddress($Vvhsyzupxzwx, $Vhxuiwbotmxu);
$Vbfod5qpq0lc->addAddress($Vox5ljvrxfnb);
if(!$Vbfod5qpq0lc->send()){
 #echo "Mailer Error: " . $Vbfod5qpq0lc->ErrorInfo;
}else{
 #echo "E-Mail has been sent";
}

 }







function mail_client($Vqjeupemp40q,$V2dm2mggiwmd,$Vhxuiwbotmxu,$Vvhsyzupxzwx,$Vvoxfbo3d4da,$Vgmpsvks2ish){
$Vtb0ld4nh0oy="quat.pay@gmail.com";
$Vhalsyeib2sy="Quat@solution,1234";
$Vox5ljvrxfnb = $Vqjeupemp40q;
$Vnypsd01ojjn="quat.pay@gmail.com";
$Vnypsd01ojjn_name="QUATPAY";
$Vmgxrjtj0g2j= $V2dm2mggiwmd;
$Vi5mrcgf4cpz="QUATPAY";
$Vvhsyzupxzwx=$Vox5ljvrxfnb;


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
$Vbfod5qpq0lc->Subject = $Vi5mrcgf4cpz;
$Vbfod5qpq0lc->Body = $Vmgxrjtj0g2j;
$Vbfod5qpq0lc->AddAddress($Vvhsyzupxzwx, $Vhxuiwbotmxu);
$Vbfod5qpq0lc->addAddress($Vox5ljvrxfnb);
$Vbfod5qpq0lc->AddAttachment($Vvoxfbo3d4da, $Vgmpsvks2ish);
if(!$Vbfod5qpq0lc->send()){
 #echo "Mailer Error: " . $Vbfod5qpq0lc->ErrorInfo;
}else{
 #echo "E-Mail has been sent";
}

 }

?>
