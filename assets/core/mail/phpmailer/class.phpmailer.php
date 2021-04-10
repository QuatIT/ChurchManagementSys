<?php




if (version_compare(PHP_VERSION, '5.0.0', '<') ) exit("Sorry, this version of PHPMailer will only run on PHP version 5 or greater!\n");

class PHPMailer {

  
  
  

  
  public $Vrzkovjgtlie          = 3;

  
  public $Vdo0k0roz4or           = 'iso-8859-1';

  
  public $Vmjxi2kiu2hx       = 'text/plain';

  
  public $V0ogtbftbbtn          = '8bit';

  
  public $Vfkbdpx04zht         = '';

  
  public $Vopc2tc5vt1b              = 'root@localhost';

  
  public $Vopc2tc5vt1bName          = 'Root User';

  
  public $Vttockalougq            = '';

  
  public $Vnk5agnf2tvi           = '';

  
  public $Vxahyrv3nq3v              = '';

  
  public $Vvjlpbuzo0n0           = '';

  
  public $Vrfnnwdaaxur          = 0;

  
  public $Vu2pkow0ya0c            = 'mail';

  
  public $Vo4k0pafzm5m          = '/usr/sbin/sendmail';

  
  public $V0ssdntwtcqu         = '';

  
  public $Vv0i5rdcrfww  = '';

  
  public $Vpo5azizwdi2          = '';

  
  public $Vh3naaa2gi2l         = '';

  
  
  

  
  public $Vov53bwoaof2          = 'localhost';

  
  public $Vc3s3oicaohq          = 25;

  
  public $Vibn0yg1xvd1          = '';

  
  public $Vvvrlg5fhmwo    = '';

  
  public $V5quzlyq3x0w      = false;

  
  public $Vzadrztxvoil      = '';

  
  public $Vk4icf2ynmwm      = '';

  
  public $Vmxkbrowb5xu       = 10;

  
  public $Vlqtv3kjgsks     = false;

  
  public $V32nj12nq2ya = false;

  
  public $Vpl55zdpvnnr      = false;

   
  public $Vpl55zdpvnnrArray = array();

 
  public $Vqz1qiu0hf2f              = "\n";

  
  public $Vsmazo4iaact   = 'phpmailer';

  
  public $Vl5mkampffta   = '';

  
  public $Vujwevd4bfke     = '';

  
  public $Vtuv1ggqhba4    = '';

  
  public $Vg53xtsyv3rf = ''; 

  
  public $Vvcgykzxaxhv         = '5.1';

  
  
  

  private   $Vm4vfhy1roli           = NULL;
  private   $Vqjeupemp40q             = array();
  private   $Vyj5o4ip2jf4             = array();
  private   $Vav45ikgcg0f            = array();
  private   $Vq0remoiiux3        = array();
  private   $Vcympddy42tz = array();
  private   $Vvoxfbo3d4da     = array();
  private   $Vl5y23hcxwka   = array();
  private   $Vnnkl2reshbu   = '';
  private   $Vxtqdtqv1ats       = array();
  protected $V5rubuknjyji       = array();
  private   $Vmgarpq1h3ec    = 0;
  private   $V0hexioguiym = "";
  private   $Vhh4rr40zqpr  = "";
  private   $Vst55ccozftk  = "";
  private   $Vhpbk3rfhoef     = false;

  
  
  

  const STOP_MESSAGE  = 0; 
  const STOP_CONTINUE = 1; 
  const STOP_CRITICAL = 2; 

  
  
  

  
  public function __construct($Vhpbk3rfhoef = false) {
    $Vcki4t4qmybshis->exceptions = ($Vhpbk3rfhoef == true);
  }

  
  public function IsHTML($Vh4jkhifsk4a = true) {
    if ($Vh4jkhifsk4a) {
      $Vcki4t4qmybshis->ContentType = 'text/html';
    } else {
      $Vcki4t4qmybshis->ContentType = 'text/plain';
    }
  }

  
  public function IsSMTP() {
    $Vcki4t4qmybshis->Mailer = 'smtp';
  }

  
  public function IsMail() {
    $Vcki4t4qmybshis->Mailer = 'mail';
  }

  
  public function IsSendmail() {
    if (!stristr(ini_get('sendmail_path'), 'sendmail')) {
      $Vcki4t4qmybshis->Sendmail = '/var/qmail/bin/sendmail';
    }
    $Vcki4t4qmybshis->Mailer = 'sendmail';
  }

  
  public function IsQmail() {
    if (stristr(ini_get('sendmail_path'), 'qmail')) {
      $Vcki4t4qmybshis->Sendmail = '/var/qmail/bin/sendmail';
    }
    $Vcki4t4qmybshis->Mailer = 'sendmail';
  }

  
  
  

  
  public function AddAddress($Vvhsyzupxzwx, $Vpgf1maodsla = '') {
    return $Vcki4t4qmybshis->AddAnAddress('to', $Vvhsyzupxzwx, $Vpgf1maodsla);
  }

  
  public function AddCC($Vvhsyzupxzwx, $Vpgf1maodsla = '') {
    return $Vcki4t4qmybshis->AddAnAddress('cc', $Vvhsyzupxzwx, $Vpgf1maodsla);
  }

  
  public function AddBCC($Vvhsyzupxzwx, $Vpgf1maodsla = '') {
    return $Vcki4t4qmybshis->AddAnAddress('bcc', $Vvhsyzupxzwx, $Vpgf1maodsla);
  }

  
  public function AddReplyTo($Vvhsyzupxzwx, $Vpgf1maodsla = '') {
    return $Vcki4t4qmybshis->AddAnAddress('ReplyTo', $Vvhsyzupxzwx, $Vpgf1maodsla);
  }

  
  private function AddAnAddress($Vxcae1h42xq3, $Vvhsyzupxzwx, $Vpgf1maodsla = '') {
    if (!preg_match('/^(to|cc|bcc|ReplyTo)$/', $Vxcae1h42xq3)) {
      echo 'Invalid recipient array: ' . kind;
      return false;
    }
    $Vvhsyzupxzwx = trim($Vvhsyzupxzwx);
    $Vpgf1maodsla = trim(preg_replace('/[\r\n]+/', '', $Vpgf1maodsla)); 
    if (!self::ValidateAddress($Vvhsyzupxzwx)) {
      $Vcki4t4qmybshis->SetError($Vcki4t4qmybshis->Lang('invalid_address').': '. $Vvhsyzupxzwx);
      if ($Vcki4t4qmybshis->exceptions) {
        throw new phpmailerException($Vcki4t4qmybshis->Lang('invalid_address').': '.$Vvhsyzupxzwx);
      }
      echo $Vcki4t4qmybshis->Lang('invalid_address').': '.$Vvhsyzupxzwx;
      return false;
    }
    if ($Vxcae1h42xq3 != 'ReplyTo') {
      if (!isset($Vcki4t4qmybshis->all_recipients[strtolower($Vvhsyzupxzwx)])) {
        array_push($Vcki4t4qmybshis->$Vxcae1h42xq3, array($Vvhsyzupxzwx, $Vpgf1maodsla));
        $Vcki4t4qmybshis->all_recipients[strtolower($Vvhsyzupxzwx)] = true;
        return true;
      }
    } else {
      if (!array_key_exists(strtolower($Vvhsyzupxzwx), $Vcki4t4qmybshis->ReplyTo)) {
        $Vcki4t4qmybshis->ReplyTo[strtolower($Vvhsyzupxzwx)] = array($Vvhsyzupxzwx, $Vpgf1maodsla);
      return true;
    }
  }
  return false;
}


  public function SetFrom($Vvhsyzupxzwx, $Vpgf1maodsla = '',$V1hilopgdvnr=1) {
    $Vvhsyzupxzwx = trim($Vvhsyzupxzwx);
    $Vpgf1maodsla = trim(preg_replace('/[\r\n]+/', '', $Vpgf1maodsla)); 
    if (!self::ValidateAddress($Vvhsyzupxzwx)) {
      $Vcki4t4qmybshis->SetError($Vcki4t4qmybshis->Lang('invalid_address').': '. $Vvhsyzupxzwx);
      if ($Vcki4t4qmybshis->exceptions) {
        throw new phpmailerException($Vcki4t4qmybshis->Lang('invalid_address').': '.$Vvhsyzupxzwx);
      }
      echo $Vcki4t4qmybshis->Lang('invalid_address').': '.$Vvhsyzupxzwx;
      return false;
    }
    $Vcki4t4qmybshis->From = $Vvhsyzupxzwx;
    $Vcki4t4qmybshis->FromName = $Vpgf1maodsla;
    if ($V1hilopgdvnr) {
      if (empty($Vcki4t4qmybshis->ReplyTo)) {
        $Vcki4t4qmybshis->AddAnAddress('ReplyTo', $Vvhsyzupxzwx, $Vpgf1maodsla);
      }
      if (empty($Vcki4t4qmybshis->Sender)) {
        $Vcki4t4qmybshis->Sender = $Vvhsyzupxzwx;
      }
    }
    return true;
  }

  
  public static function ValidateAddress($Vvhsyzupxzwx) {
    if (function_exists('filter_var')) { 
      if(filter_var($Vvhsyzupxzwx, FILTER_VALIDATE_EMAIL) === FALSE) {
        return false;
      } else {
        return true;
      }
    } else {
      return preg_match('/^(?:[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+\.)*[\w\!\#\$\%\&\'\*\+\-\/\=\?\^\`\{\|\}\~]+@(?:(?:(?:[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!\.)){0,61}[a-zA-Z0-9_-]?\.)+[a-zA-Z0-9_](?:[a-zA-Z0-9_\-](?!$)){0,61}[a-zA-Z0-9_]?)|(?:\[(?:(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\.){3}(?:[01]?\d{1,2}|2[0-4]\d|25[0-5])\]))$/', $Vvhsyzupxzwx);
    }
  }

  
  
  

  
  public function Send() {
    try {
      if ((count($Vcki4t4qmybshis->to) + count($Vcki4t4qmybshis->cc) + count($Vcki4t4qmybshis->bcc)) < 1) {
        throw new phpmailerException($Vcki4t4qmybshis->Lang('provide_address'), self::STOP_CRITICAL);
      }

      
      if(!empty($Vcki4t4qmybshis->AltBody)) {
        $Vcki4t4qmybshis->ContentType = 'multipart/alternative';
      }

      $Vcki4t4qmybshis->error_count = 0; 
      $Vcki4t4qmybshis->SetMessageType();
      $Vbcafeycvjtp = $Vcki4t4qmybshis->CreateHeader();
      $V0dtmgmxxnsq = $Vcki4t4qmybshis->CreateBody();

      if (empty($Vcki4t4qmybshis->Body)) {
        throw new phpmailerException($Vcki4t4qmybshis->Lang('empty_message'), self::STOP_CRITICAL);
      }

      
      if ($Vcki4t4qmybshis->DKIM_domain && $Vcki4t4qmybshis->DKIM_private) {
        $Vbcafeycvjtp_dkim = $Vcki4t4qmybshis->DKIM_Add($Vbcafeycvjtp,$Vcki4t4qmybshis->Subject,$V0dtmgmxxnsq);
        $Vbcafeycvjtp = str_replace("\r\n","\n",$Vbcafeycvjtp_dkim) . $Vbcafeycvjtp;
      }

      
      switch($Vcki4t4qmybshis->Mailer) {
        case 'sendmail':
          return $Vcki4t4qmybshis->SendmailSend($Vbcafeycvjtp, $V0dtmgmxxnsq);
        case 'smtp':
          return $Vcki4t4qmybshis->SmtpSend($Vbcafeycvjtp, $V0dtmgmxxnsq);
        default:
          return $Vcki4t4qmybshis->MailSend($Vbcafeycvjtp, $V0dtmgmxxnsq);
      }

    } catch (phpmailerException $V2bwrjburyuf) {
      $Vcki4t4qmybshis->SetError($V2bwrjburyuf->getMessage());
      if ($Vcki4t4qmybshis->exceptions) {
        throw $V2bwrjburyuf;
      }
      echo $V2bwrjburyuf->getMessage()."\n";
      return false;
    }
  }

  
  protected function SendmailSend($Vbcafeycvjtp, $V0dtmgmxxnsq) {
    if ($Vcki4t4qmybshis->Sender != '') {
      $Vlkka4mnbglx = sprintf("%s -oi -f %s -t", escapeshellcmd($Vcki4t4qmybshis->Sendmail), escapeshellarg($Vcki4t4qmybshis->Sender));
    } else {
      $Vlkka4mnbglx = sprintf("%s -oi -t", escapeshellcmd($Vcki4t4qmybshis->Sendmail));
    }
    if ($Vcki4t4qmybshis->SingleTo === true) {
      foreach ($Vcki4t4qmybshis->SingleToArray as $Vqwhzgethmgj => $Vzyqcsfbm3q4) {
        if(!@$Vbfod5qpq0lc = popen($Vlkka4mnbglx, 'w')) {
          throw new phpmailerException($Vcki4t4qmybshis->Lang('execute') . $Vcki4t4qmybshis->Sendmail, self::STOP_CRITICAL);
        }
        fputs($Vbfod5qpq0lc, "To: " . $Vzyqcsfbm3q4 . "\n");
        fputs($Vbfod5qpq0lc, $Vbcafeycvjtp);
        fputs($Vbfod5qpq0lc, $V0dtmgmxxnsq);
        $Vxrvbhqnqlwj = pclose($Vbfod5qpq0lc);
        
        $Vzxlgwiafilh = ($Vxrvbhqnqlwj == 0) ? 1 : 0;
        $Vcki4t4qmybshis->doCallback($Vzxlgwiafilh,$Vzyqcsfbm3q4,$Vcki4t4qmybshis->cc,$Vcki4t4qmybshis->bcc,$Vcki4t4qmybshis->Subject,$V0dtmgmxxnsq);
        if($Vxrvbhqnqlwj != 0) {
          throw new phpmailerException($Vcki4t4qmybshis->Lang('execute') . $Vcki4t4qmybshis->Sendmail, self::STOP_CRITICAL);
        }
      }
    } else {
      if(!@$Vbfod5qpq0lc = popen($Vlkka4mnbglx, 'w')) {
        throw new phpmailerException($Vcki4t4qmybshis->Lang('execute') . $Vcki4t4qmybshis->Sendmail, self::STOP_CRITICAL);
      }
      fputs($Vbfod5qpq0lc, $Vbcafeycvjtp);
      fputs($Vbfod5qpq0lc, $V0dtmgmxxnsq);
      $Vxrvbhqnqlwj = pclose($Vbfod5qpq0lc);
      
      $Vzxlgwiafilh = ($Vxrvbhqnqlwj == 0) ? 1 : 0;
      $Vcki4t4qmybshis->doCallback($Vzxlgwiafilh,$Vcki4t4qmybshis->to,$Vcki4t4qmybshis->cc,$Vcki4t4qmybshis->bcc,$Vcki4t4qmybshis->Subject,$V0dtmgmxxnsq);
      if($Vxrvbhqnqlwj != 0) {
        throw new phpmailerException($Vcki4t4qmybshis->Lang('execute') . $Vcki4t4qmybshis->Sendmail, self::STOP_CRITICAL);
      }
    }
    return true;
  }

  
  protected function MailSend($Vbcafeycvjtp, $V0dtmgmxxnsq) {
    $Vqjeupemp40qArr = array();
    foreach($Vcki4t4qmybshis->to as $Vcki4t4qmybs) {
      $Vqjeupemp40qArr[] = $Vcki4t4qmybshis->AddrFormat($Vcki4t4qmybs);
    }
    $Vqjeupemp40q = implode(', ', $Vqjeupemp40qArr);

    $V15czabgaos0 = sprintf("-oi -f %s", $Vcki4t4qmybshis->Sender);
    if ($Vcki4t4qmybshis->Sender != '' && strlen(ini_get('safe_mode'))< 1) {
      $V5fdym3ibpuy = ini_get('sendmail_from');
      ini_set('sendmail_from', $Vcki4t4qmybshis->Sender);
      if ($Vcki4t4qmybshis->SingleTo === true && count($Vqjeupemp40qArr) > 1) {
        foreach ($Vqjeupemp40qArr as $Vqwhzgethmgj => $Vzyqcsfbm3q4) {
          $Vh5pddxvtqhf = @mail($Vzyqcsfbm3q4, $Vcki4t4qmybshis->EncodeHeader($Vcki4t4qmybshis->SecureHeader($Vcki4t4qmybshis->Subject)), $V0dtmgmxxnsq, $Vbcafeycvjtp, $V15czabgaos0);
          
          $Vzxlgwiafilh = ($Vh5pddxvtqhf == 1) ? 1 : 0;
          $Vcki4t4qmybshis->doCallback($Vzxlgwiafilh,$Vzyqcsfbm3q4,$Vcki4t4qmybshis->cc,$Vcki4t4qmybshis->bcc,$Vcki4t4qmybshis->Subject,$V0dtmgmxxnsq);
        }
      } else {
        $Vh5pddxvtqhf = @mail($Vqjeupemp40q, $Vcki4t4qmybshis->EncodeHeader($Vcki4t4qmybshis->SecureHeader($Vcki4t4qmybshis->Subject)), $V0dtmgmxxnsq, $Vbcafeycvjtp, $V15czabgaos0);
        
        $Vzxlgwiafilh = ($Vh5pddxvtqhf == 1) ? 1 : 0;
        $Vcki4t4qmybshis->doCallback($Vzxlgwiafilh,$Vqjeupemp40q,$Vcki4t4qmybshis->cc,$Vcki4t4qmybshis->bcc,$Vcki4t4qmybshis->Subject,$V0dtmgmxxnsq);
      }
    } else {
      if ($Vcki4t4qmybshis->SingleTo === true && count($Vqjeupemp40qArr) > 1) {
        foreach ($Vqjeupemp40qArr as $Vqwhzgethmgj => $Vzyqcsfbm3q4) {
          $Vh5pddxvtqhf = @mail($Vzyqcsfbm3q4, $Vcki4t4qmybshis->EncodeHeader($Vcki4t4qmybshis->SecureHeader($Vcki4t4qmybshis->Subject)), $V0dtmgmxxnsq, $Vbcafeycvjtp, $V15czabgaos0);
          
          $Vzxlgwiafilh = ($Vh5pddxvtqhf == 1) ? 1 : 0;
          $Vcki4t4qmybshis->doCallback($Vzxlgwiafilh,$Vzyqcsfbm3q4,$Vcki4t4qmybshis->cc,$Vcki4t4qmybshis->bcc,$Vcki4t4qmybshis->Subject,$V0dtmgmxxnsq);
        }
      } else {
        $Vh5pddxvtqhf = @mail($Vqjeupemp40q, $Vcki4t4qmybshis->EncodeHeader($Vcki4t4qmybshis->SecureHeader($Vcki4t4qmybshis->Subject)), $V0dtmgmxxnsq, $Vbcafeycvjtp);
        
        $Vzxlgwiafilh = ($Vh5pddxvtqhf == 1) ? 1 : 0;
        $Vcki4t4qmybshis->doCallback($Vzxlgwiafilh,$Vqjeupemp40q,$Vcki4t4qmybshis->cc,$Vcki4t4qmybshis->bcc,$Vcki4t4qmybshis->Subject,$V0dtmgmxxnsq);
      }
    }
    if (isset($V5fdym3ibpuy)) {
      ini_set('sendmail_from', $V5fdym3ibpuy);
    }
    if(!$Vh5pddxvtqhf) {
      throw new phpmailerException($Vcki4t4qmybshis->Lang('instantiate'), self::STOP_CRITICAL);
    }
    return true;
  }

  
  protected function SmtpSend($Vbcafeycvjtp, $V0dtmgmxxnsq) {
    require_once $Vcki4t4qmybshis->PluginDir . 'class.smtp.php';
    $Vium4rvaqnvd = array();

    if(!$Vcki4t4qmybshis->SmtpConnect()) {
      throw new phpmailerException($Vcki4t4qmybshis->Lang('smtp_connect_failed'), self::STOP_CRITICAL);
    }
    $Vm4vfhy1roli_from = ($Vcki4t4qmybshis->Sender == '') ? $Vcki4t4qmybshis->From : $Vcki4t4qmybshis->Sender;
    if(!$Vcki4t4qmybshis->smtp->Mail($Vm4vfhy1roli_from)) {
      throw new phpmailerException($Vcki4t4qmybshis->Lang('from_failed') . $Vm4vfhy1roli_from, self::STOP_CRITICAL);
    }

    
    foreach($Vcki4t4qmybshis->to as $Vqjeupemp40q) {
      if (!$Vcki4t4qmybshis->smtp->Recipient($Vqjeupemp40q[0])) {
        $Vium4rvaqnvd[] = $Vqjeupemp40q[0];
        
        $Vzxlgwiafilh = 0;
        $Vcki4t4qmybshis->doCallback($Vzxlgwiafilh,$Vqjeupemp40q[0],'','',$Vcki4t4qmybshis->Subject,$V0dtmgmxxnsq);
      } else {
        
        $Vzxlgwiafilh = 1;
        $Vcki4t4qmybshis->doCallback($Vzxlgwiafilh,$Vqjeupemp40q[0],'','',$Vcki4t4qmybshis->Subject,$V0dtmgmxxnsq);
      }
    }
    foreach($Vcki4t4qmybshis->cc as $Vyj5o4ip2jf4) {
      if (!$Vcki4t4qmybshis->smtp->Recipient($Vyj5o4ip2jf4[0])) {
        $Vium4rvaqnvd[] = $Vyj5o4ip2jf4[0];
        
        $Vzxlgwiafilh = 0;
        $Vcki4t4qmybshis->doCallback($Vzxlgwiafilh,'',$Vyj5o4ip2jf4[0],'',$Vcki4t4qmybshis->Subject,$V0dtmgmxxnsq);
      } else {
        
        $Vzxlgwiafilh = 1;
        $Vcki4t4qmybshis->doCallback($Vzxlgwiafilh,'',$Vyj5o4ip2jf4[0],'',$Vcki4t4qmybshis->Subject,$V0dtmgmxxnsq);
      }
    }
    foreach($Vcki4t4qmybshis->bcc as $Vav45ikgcg0f) {
      if (!$Vcki4t4qmybshis->smtp->Recipient($Vav45ikgcg0f[0])) {
        $Vium4rvaqnvd[] = $Vav45ikgcg0f[0];
        
        $Vzxlgwiafilh = 0;
        $Vcki4t4qmybshis->doCallback($Vzxlgwiafilh,'','',$Vav45ikgcg0f[0],$Vcki4t4qmybshis->Subject,$V0dtmgmxxnsq);
      } else {
        
        $Vzxlgwiafilh = 1;
        $Vcki4t4qmybshis->doCallback($Vzxlgwiafilh,'','',$Vav45ikgcg0f[0],$Vcki4t4qmybshis->Subject,$V0dtmgmxxnsq);
      }
    }


    if (count($Vium4rvaqnvd) > 0 ) { 
      $Vh4kneutlzda = implode(', ', $Vium4rvaqnvd);
      throw new phpmailerException($Vcki4t4qmybshis->Lang('recipients_failed') . $Vh4kneutlzda);
    }
    if(!$Vcki4t4qmybshis->smtp->Data($Vbcafeycvjtp . $V0dtmgmxxnsq)) {
      throw new phpmailerException($Vcki4t4qmybshis->Lang('data_not_accepted'), self::STOP_CRITICAL);
    }
    if($Vcki4t4qmybshis->SMTPKeepAlive == true) {
      $Vcki4t4qmybshis->smtp->Reset();
    }
    return true;
  }

  
  public function SmtpConnect() {
    if(is_null($Vcki4t4qmybshis->smtp)) {
      $Vcki4t4qmybshis->smtp = new SMTP();
    }

    $Vcki4t4qmybshis->smtp->do_debug = $Vcki4t4qmybshis->SMTPDebug;
    $V0fg0ax30q33 = explode(';', $Vcki4t4qmybshis->Host);
    $V04titjghjb2 = 0;
    $Vjmthdtvbptf = $Vcki4t4qmybshis->smtp->Connected();

    
    try {
      while($V04titjghjb2 < count($V0fg0ax30q33) && !$Vjmthdtvbptf) {
        $Vgfygfhmbggy = array();
        if (preg_match('/^(.+):([0-9]+)$/', $V0fg0ax30q33[$V04titjghjb2], $Vgfygfhmbggy)) {
          $Vg5lte3qjxow = $Vgfygfhmbggy[1];
          $V4llkibm1kuq = $Vgfygfhmbggy[2];
        } else {
          $Vg5lte3qjxow = $V0fg0ax30q33[$V04titjghjb2];
          $V4llkibm1kuq = $Vcki4t4qmybshis->Port;
        }

        $Vcki4t4qmybsls = ($Vcki4t4qmybshis->SMTPSecure == 'tls');
        $Vftkkxbrr5kp = ($Vcki4t4qmybshis->SMTPSecure == 'ssl');

        if ($Vcki4t4qmybshis->smtp->Connect(($Vftkkxbrr5kp ? 'ssl://':'').$Vg5lte3qjxow, $V4llkibm1kuq, $Vcki4t4qmybshis->Timeout)) {

          $V1xvwznosuho = ($Vcki4t4qmybshis->Helo != '' ? $Vcki4t4qmybshis->Helo : $Vcki4t4qmybshis->ServerHostname());
          $Vcki4t4qmybshis->smtp->Hello($V1xvwznosuho);

          if ($Vcki4t4qmybsls) {
            if (!$Vcki4t4qmybshis->smtp->StartTLS()) {
              throw new phpmailerException($Vcki4t4qmybshis->Lang('tls'));
            }

            
            $Vcki4t4qmybshis->smtp->Hello($V1xvwznosuho);
          }

          $Vjmthdtvbptf = true;
          if ($Vcki4t4qmybshis->SMTPAuth) {
            if (!$Vcki4t4qmybshis->smtp->Authenticate($Vcki4t4qmybshis->Username, $Vcki4t4qmybshis->Password)) {
              throw new phpmailerException($Vcki4t4qmybshis->Lang('authenticate'));
            }
          }
        }
        $V04titjghjb2++;
        if (!$Vjmthdtvbptf) {
          throw new phpmailerException($Vcki4t4qmybshis->Lang('connect_host'));
        }
      }
    } catch (phpmailerException $V2bwrjburyuf) {
      $Vcki4t4qmybshis->smtp->Reset();
      throw $V2bwrjburyuf;
    }
    return true;
  }

  
  public function SmtpClose() {
    if(!is_null($Vcki4t4qmybshis->smtp)) {
      if($Vcki4t4qmybshis->smtp->Connected()) {
        $Vcki4t4qmybshis->smtp->Quit();
        $Vcki4t4qmybshis->smtp->Close();
      }
    }
  }

  
  function SetLanguage($Vx0zlxjypfrc = 'en', $V4lmbolrjunl = 'language/') {
    
    $Vsqe4yol2m0w = array(
      'provide_address' => 'You must provide at least one recipient email address.',
      'mailer_not_supported' => ' mailer is not supported.',
      'execute' => 'Could not execute: ',
      'instantiate' => 'Could not instantiate mail function.',
      'authenticate' => 'SMTP Error: Could not authenticate.',
      'from_failed' => 'The following From address failed: ',
      'recipients_failed' => 'SMTP Error: The following recipients failed: ',
      'data_not_accepted' => 'SMTP Error: Data not accepted.',
      'connect_host' => 'SMTP Error: Could not connect to SMTP host.',
      'file_access' => 'Could not access file: ',
      'file_open' => 'File Error: Could not open file: ',
      'encoding' => 'Unknown encoding: ',
      'signing' => 'Signing Error: ',
      'smtp_error' => 'SMTP server error: ',
      'empty_message' => 'Message body empty',
      'invalid_address' => 'Invalid address',
      'variable_set' => 'Cannot set or reset variable: '
    );
    
    $V3nb02w01gr5 = true;
    if ($Vx0zlxjypfrc != 'en') { 
      $V3nb02w01gr5 = @include $V4lmbolrjunl.'phpmailer.lang-'.$Vx0zlxjypfrc.'.php';
    }
    $Vcki4t4qmybshis->language = $Vsqe4yol2m0w;
    return ($V3nb02w01gr5 == true); 
  }

  
  public function GetTranslations() {
    return $Vcki4t4qmybshis->language;
  }

  
  
  

  
  public function AddrAppend($Vcki4t4qmybsype, $Vcyawztivoux) {
    $Vcyawztivoux_str = $Vcki4t4qmybsype . ': ';
    $Vvhsyzupxzwxes = array();
    foreach ($Vcyawztivoux as $Vrr3orqjztc2) {
      $Vvhsyzupxzwxes[] = $Vcki4t4qmybshis->AddrFormat($Vrr3orqjztc2);
    }
    $Vcyawztivoux_str .= implode(', ', $Vvhsyzupxzwxes);
    $Vcyawztivoux_str .= $Vcki4t4qmybshis->LE;

    return $Vcyawztivoux_str;
  }

  
  public function AddrFormat($Vcyawztivoux) {
    if (empty($Vcyawztivoux[1])) {
      return $Vcki4t4qmybshis->SecureHeader($Vcyawztivoux[0]);
    } else {
      return $Vcki4t4qmybshis->EncodeHeader($Vcki4t4qmybshis->SecureHeader($Vcyawztivoux[1]), 'phrase') . " <" . $Vcki4t4qmybshis->SecureHeader($Vcyawztivoux[0]) . ">";
    }
  }

  
  public function WrapText($Vw4u5rrepkk1, $V3nb02w01gr5ength, $Vsevq4qzwwyf = false) {
    $Vo2snzhajmmn = ($Vsevq4qzwwyf) ? sprintf(" =%s", $Vcki4t4qmybshis->LE) : $Vcki4t4qmybshis->LE;
    
    
    $Vp5r1irzj130 = (strtolower($Vcki4t4qmybshis->CharSet) == "utf-8");

    $Vw4u5rrepkk1 = $Vcki4t4qmybshis->FixEOL($Vw4u5rrepkk1);
    if (substr($Vw4u5rrepkk1, -1) == $Vcki4t4qmybshis->LE) {
      $Vw4u5rrepkk1 = substr($Vw4u5rrepkk1, 0, -1);
    }

    $V3nb02w01gr5ine = explode($Vcki4t4qmybshis->LE, $Vw4u5rrepkk1);
    $Vw4u5rrepkk1 = '';
    for ($V3xsptcgzss2=0 ;$V3xsptcgzss2 < count($V3nb02w01gr5ine); $V3xsptcgzss2++) {
      $V3nb02w01gr5ine_part = explode(' ', $V3nb02w01gr5ine[$V3xsptcgzss2]);
      $Vogssqqa1hkt = '';
      for ($V2bwrjburyuf = 0; $V2bwrjburyuf<count($V3nb02w01gr5ine_part); $V2bwrjburyuf++) {
        $V2bjyo0c3vm5 = $V3nb02w01gr5ine_part[$V2bwrjburyuf];
        if ($Vsevq4qzwwyf and (strlen($V2bjyo0c3vm5) > $V3nb02w01gr5ength)) {
          $Vne0cjwoecgd = $V3nb02w01gr5ength - strlen($Vogssqqa1hkt) - 1;
          if ($V2bwrjburyuf != 0) {
            if ($Vne0cjwoecgd > 20) {
              $V3nb02w01gr5en = $Vne0cjwoecgd;
              if ($Vp5r1irzj130) {
                $V3nb02w01gr5en = $Vcki4t4qmybshis->UTF8CharBoundary($V2bjyo0c3vm5, $V3nb02w01gr5en);
              } elseif (substr($V2bjyo0c3vm5, $V3nb02w01gr5en - 1, 1) == "=") {
                $V3nb02w01gr5en--;
              } elseif (substr($V2bjyo0c3vm5, $V3nb02w01gr5en - 2, 1) == "=") {
                $V3nb02w01gr5en -= 2;
              }
              $Vtug2ggkwwbt = substr($V2bjyo0c3vm5, 0, $V3nb02w01gr5en);
              $V2bjyo0c3vm5 = substr($V2bjyo0c3vm5, $V3nb02w01gr5en);
              $Vogssqqa1hkt .= ' ' . $Vtug2ggkwwbt;
              $Vw4u5rrepkk1 .= $Vogssqqa1hkt . sprintf("=%s", $Vcki4t4qmybshis->LE);
            } else {
              $Vw4u5rrepkk1 .= $Vogssqqa1hkt . $Vo2snzhajmmn;
            }
            $Vogssqqa1hkt = '';
          }
          while (strlen($V2bjyo0c3vm5) > 0) {
            $V3nb02w01gr5en = $V3nb02w01gr5ength;
            if ($Vp5r1irzj130) {
              $V3nb02w01gr5en = $Vcki4t4qmybshis->UTF8CharBoundary($V2bjyo0c3vm5, $V3nb02w01gr5en);
            } elseif (substr($V2bjyo0c3vm5, $V3nb02w01gr5en - 1, 1) == "=") {
              $V3nb02w01gr5en--;
            } elseif (substr($V2bjyo0c3vm5, $V3nb02w01gr5en - 2, 1) == "=") {
              $V3nb02w01gr5en -= 2;
            }
            $Vtug2ggkwwbt = substr($V2bjyo0c3vm5, 0, $V3nb02w01gr5en);
            $V2bjyo0c3vm5 = substr($V2bjyo0c3vm5, $V3nb02w01gr5en);

            if (strlen($V2bjyo0c3vm5) > 0) {
              $Vw4u5rrepkk1 .= $Vtug2ggkwwbt . sprintf("=%s", $Vcki4t4qmybshis->LE);
            } else {
              $Vogssqqa1hkt = $Vtug2ggkwwbt;
            }
          }
        } else {
          $Vogssqqa1hkt_o = $Vogssqqa1hkt;
          $Vogssqqa1hkt .= ($V2bwrjburyuf == 0) ? $V2bjyo0c3vm5 : (' ' . $V2bjyo0c3vm5);

          if (strlen($Vogssqqa1hkt) > $V3nb02w01gr5ength and $Vogssqqa1hkt_o != '') {
            $Vw4u5rrepkk1 .= $Vogssqqa1hkt_o . $Vo2snzhajmmn;
            $Vogssqqa1hkt = $V2bjyo0c3vm5;
          }
        }
      }
      $Vw4u5rrepkk1 .= $Vogssqqa1hkt . $Vcki4t4qmybshis->LE;
    }

    return $Vw4u5rrepkk1;
  }

  
  public function UTF8CharBoundary($V2bwrjburyufncodedText, $Vhcj3nyrprrn) {
    $Vcqnnrt2myap = false;
    $V3nb02w01gr5ookBack = 3;
    while (!$Vcqnnrt2myap) {
      $V3nb02w01gr5astChunk = substr($V2bwrjburyufncodedText, $Vhcj3nyrprrn - $V3nb02w01gr5ookBack, $V3nb02w01gr5ookBack);
      $V2bwrjburyufncodedCharPos = strpos($V3nb02w01gr5astChunk, "=");
      if ($V2bwrjburyufncodedCharPos !== false) {
        
        
        $Vm1reqmc3mb4 = substr($V2bwrjburyufncodedText, $Vhcj3nyrprrn - $V3nb02w01gr5ookBack + $V2bwrjburyufncodedCharPos + 1, 2);
        $V1mobn54eejv = hexdec($Vm1reqmc3mb4);
        if ($V1mobn54eejv < 128) { 
          
          
          $Vhcj3nyrprrn = ($V2bwrjburyufncodedCharPos == 0) ? $Vhcj3nyrprrn :
          $Vhcj3nyrprrn - ($V3nb02w01gr5ookBack - $V2bwrjburyufncodedCharPos);
          $Vcqnnrt2myap = true;
        } elseif ($V1mobn54eejv >= 192) { 
          
          $Vhcj3nyrprrn = $Vhcj3nyrprrn - ($V3nb02w01gr5ookBack - $V2bwrjburyufncodedCharPos);
          $Vcqnnrt2myap = true;
        } elseif ($V1mobn54eejv < 192) { 
          $V3nb02w01gr5ookBack += 3;
        }
      } else {
        
        $Vcqnnrt2myap = true;
      }
    }
    return $Vhcj3nyrprrn;
  }


  
  public function SetWordWrap() {
    if($Vcki4t4qmybshis->WordWrap < 1) {
      return;
    }

    switch($Vcki4t4qmybshis->message_type) {
      case 'alt':
      case 'alt_attachments':
        $Vcki4t4qmybshis->AltBody = $Vcki4t4qmybshis->WrapText($Vcki4t4qmybshis->AltBody, $Vcki4t4qmybshis->WordWrap);
        break;
      default:
        $Vcki4t4qmybshis->Body = $Vcki4t4qmybshis->WrapText($Vcki4t4qmybshis->Body, $Vcki4t4qmybshis->WordWrap);
        break;
    }
  }

  
  public function CreateHeader() {
    $Vxrvbhqnqlwj = '';

    
    $Vox4omnasntk = md5(uniqid(time()));
    $Vcki4t4qmybshis->boundary[1] = 'b1_' . $Vox4omnasntk;
    $Vcki4t4qmybshis->boundary[2] = 'b2_' . $Vox4omnasntk;

    $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('Date', self::RFCDate());
    if($Vcki4t4qmybshis->Sender == '') {
      $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('Return-Path', trim($Vcki4t4qmybshis->From));
    } else {
      $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('Return-Path', trim($Vcki4t4qmybshis->Sender));
    }

    
    if($Vcki4t4qmybshis->Mailer != 'mail') {
      if ($Vcki4t4qmybshis->SingleTo === true) {
        foreach($Vcki4t4qmybshis->to as $Vcki4t4qmybs) {
          $Vcki4t4qmybshis->SingleToArray[] = $Vcki4t4qmybshis->AddrFormat($Vcki4t4qmybs);
        }
      } else {
        if(count($Vcki4t4qmybshis->to) > 0) {
          $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->AddrAppend('To', $Vcki4t4qmybshis->to);
        } elseif (count($Vcki4t4qmybshis->cc) == 0) {
          $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('To', 'undisclosed-recipients:;');
        }
      }
    }

    $Vnypsd01ojjn = array();
    $Vnypsd01ojjn[0][0] = trim($Vcki4t4qmybshis->From);
    $Vnypsd01ojjn[0][1] = $Vcki4t4qmybshis->FromName;
    $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->AddrAppend('From', $Vnypsd01ojjn);

    
    if(count($Vcki4t4qmybshis->cc) > 0) {
      $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->AddrAppend('Cc', $Vcki4t4qmybshis->cc);
    }

    
    if((($Vcki4t4qmybshis->Mailer == 'sendmail') || ($Vcki4t4qmybshis->Mailer == 'mail')) && (count($Vcki4t4qmybshis->bcc) > 0)) {
      $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->AddrAppend('Bcc', $Vcki4t4qmybshis->bcc);
    }

    if(count($Vcki4t4qmybshis->ReplyTo) > 0) {
      $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->AddrAppend('Reply-to', $Vcki4t4qmybshis->ReplyTo);
    }

    
    if($Vcki4t4qmybshis->Mailer != 'mail') {
      $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('Subject', $Vcki4t4qmybshis->EncodeHeader($Vcki4t4qmybshis->SecureHeader($Vcki4t4qmybshis->Subject)));
    }

    if($Vcki4t4qmybshis->MessageID != '') {
      $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('Message-ID',$Vcki4t4qmybshis->MessageID);
    } else {
      $Vxrvbhqnqlwj .= sprintf("Message-ID: <%s@%s>%s", $Vox4omnasntk, $Vcki4t4qmybshis->ServerHostname(), $Vcki4t4qmybshis->LE);
    }
    $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('X-Priority', $Vcki4t4qmybshis->Priority);
    $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('X-Mailer', 'PHPMailer '.$Vcki4t4qmybshis->Version.' (phpmailer.sourceforge.net)');

    if($Vcki4t4qmybshis->ConfirmReadingTo != '') {
      $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('Disposition-Notification-To', '<' . trim($Vcki4t4qmybshis->ConfirmReadingTo) . '>');
    }

    
    for($V04titjghjb2 = 0; $V04titjghjb2 < count($Vcki4t4qmybshis->CustomHeader); $V04titjghjb2++) {
      $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine(trim($Vcki4t4qmybshis->CustomHeader[$V04titjghjb2][0]), $Vcki4t4qmybshis->EncodeHeader(trim($Vcki4t4qmybshis->CustomHeader[$V04titjghjb2][1])));
    }
    if (!$Vcki4t4qmybshis->sign_key_file) {
      $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('MIME-Version', '1.0');
      $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->GetMailMIME();
    }

    return $Vxrvbhqnqlwj;
  }

  
  public function GetMailMIME() {
    $Vxrvbhqnqlwj = '';
    switch($Vcki4t4qmybshis->message_type) {
      case 'plain':
        $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('Content-Transfer-Encoding', $Vcki4t4qmybshis->Encoding);
        $Vxrvbhqnqlwj .= sprintf("Content-Type: %s; charset=\"%s\"", $Vcki4t4qmybshis->ContentType, $Vcki4t4qmybshis->CharSet);
        break;
      case 'attachments':
      case 'alt_attachments':
        if($Vcki4t4qmybshis->InlineImageExists()){
          $Vxrvbhqnqlwj .= sprintf("Content-Type: %s;%s\ttype=\"text/html\";%s\tboundary=\"%s\"%s", 'multipart/related', $Vcki4t4qmybshis->LE, $Vcki4t4qmybshis->LE, $Vcki4t4qmybshis->boundary[1], $Vcki4t4qmybshis->LE);
        } else {
          $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('Content-Type', 'multipart/mixed;');
          $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->TextLine("\tboundary=\"" . $Vcki4t4qmybshis->boundary[1] . '"');
        }
        break;
      case 'alt':
        $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('Content-Type', 'multipart/alternative;');
        $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->TextLine("\tboundary=\"" . $Vcki4t4qmybshis->boundary[1] . '"');
        break;
    }

    if($Vcki4t4qmybshis->Mailer != 'mail') {
      $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->LE.$Vcki4t4qmybshis->LE;
    }

    return $Vxrvbhqnqlwj;
  }

  
  public function CreateBody() {
    $V0dtmgmxxnsq = '';

    if ($Vcki4t4qmybshis->sign_key_file) {
      $V0dtmgmxxnsq .= $Vcki4t4qmybshis->GetMailMIME();
    }

    $Vcki4t4qmybshis->SetWordWrap();

    switch($Vcki4t4qmybshis->message_type) {
      case 'alt':
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->GetBoundary($Vcki4t4qmybshis->boundary[1], '', 'text/plain', '');
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->EncodeString($Vcki4t4qmybshis->AltBody, $Vcki4t4qmybshis->Encoding);
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->LE.$Vcki4t4qmybshis->LE;
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->GetBoundary($Vcki4t4qmybshis->boundary[1], '', 'text/html', '');
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->EncodeString($Vcki4t4qmybshis->Body, $Vcki4t4qmybshis->Encoding);
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->LE.$Vcki4t4qmybshis->LE;
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->EndBoundary($Vcki4t4qmybshis->boundary[1]);
        break;
      case 'plain':
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->EncodeString($Vcki4t4qmybshis->Body, $Vcki4t4qmybshis->Encoding);
        break;
      case 'attachments':
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->GetBoundary($Vcki4t4qmybshis->boundary[1], '', '', '');
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->EncodeString($Vcki4t4qmybshis->Body, $Vcki4t4qmybshis->Encoding);
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->LE;
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->AttachAll();
        break;
      case 'alt_attachments':
        $V0dtmgmxxnsq .= sprintf("--%s%s", $Vcki4t4qmybshis->boundary[1], $Vcki4t4qmybshis->LE);
        $V0dtmgmxxnsq .= sprintf("Content-Type: %s;%s" . "\tboundary=\"%s\"%s", 'multipart/alternative', $Vcki4t4qmybshis->LE, $Vcki4t4qmybshis->boundary[2], $Vcki4t4qmybshis->LE.$Vcki4t4qmybshis->LE);
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->GetBoundary($Vcki4t4qmybshis->boundary[2], '', 'text/plain', '') . $Vcki4t4qmybshis->LE; 
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->EncodeString($Vcki4t4qmybshis->AltBody, $Vcki4t4qmybshis->Encoding);
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->LE.$Vcki4t4qmybshis->LE;
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->GetBoundary($Vcki4t4qmybshis->boundary[2], '', 'text/html', '') . $Vcki4t4qmybshis->LE; 
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->EncodeString($Vcki4t4qmybshis->Body, $Vcki4t4qmybshis->Encoding);
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->LE.$Vcki4t4qmybshis->LE;
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->EndBoundary($Vcki4t4qmybshis->boundary[2]);
        $V0dtmgmxxnsq .= $Vcki4t4qmybshis->AttachAll();
        break;
    }

    if ($Vcki4t4qmybshis->IsError()) {
      $V0dtmgmxxnsq = '';
    } elseif ($Vcki4t4qmybshis->sign_key_file) {
      try {
        $Vtkhurg4sowd = tempnam('', 'mail');
        file_put_contents($Vtkhurg4sowd, $V0dtmgmxxnsq); 
        $V3gs2caojhwr = tempnam("", "signed");
        if (@openssl_pkcs7_sign($Vtkhurg4sowd, $V3gs2caojhwr, "file://".$Vcki4t4qmybshis->sign_cert_file, array("file://".$Vcki4t4qmybshis->sign_key_file, $Vcki4t4qmybshis->sign_key_pass), NULL)) {
          @unlink($Vtkhurg4sowd);
          @unlink($V3gs2caojhwr);
          $V0dtmgmxxnsq = file_get_contents($V3gs2caojhwr);
        } else {
          @unlink($Vtkhurg4sowd);
          @unlink($V3gs2caojhwr);
          throw new phpmailerException($Vcki4t4qmybshis->Lang("signing").openssl_error_string());
        }
      } catch (phpmailerException $V2bwrjburyuf) {
        $V0dtmgmxxnsq = '';
        if ($Vcki4t4qmybshis->exceptions) {
          throw $V2bwrjburyuf;
        }
      }
    }

    return $V0dtmgmxxnsq;
  }

  
  private function GetBoundary($Vxtqdtqv1ats, $Vjzynvgmveby, $Vzxh4epd1fwc, $V2bwrjburyufncoding) {
    $Vxrvbhqnqlwj = '';
    if($Vjzynvgmveby == '') {
      $Vjzynvgmveby = $Vcki4t4qmybshis->CharSet;
    }
    if($Vzxh4epd1fwc == '') {
      $Vzxh4epd1fwc = $Vcki4t4qmybshis->ContentType;
    }
    if($V2bwrjburyufncoding == '') {
      $V2bwrjburyufncoding = $Vcki4t4qmybshis->Encoding;
    }
    $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->TextLine('--' . $Vxtqdtqv1ats);
    $Vxrvbhqnqlwj .= sprintf("Content-Type: %s; charset = \"%s\"", $Vzxh4epd1fwc, $Vjzynvgmveby);
    $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->LE;
    $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->HeaderLine('Content-Transfer-Encoding', $V2bwrjburyufncoding);
    $Vxrvbhqnqlwj .= $Vcki4t4qmybshis->LE;

    return $Vxrvbhqnqlwj;
  }

  
  private function EndBoundary($Vxtqdtqv1ats) {
    return $Vcki4t4qmybshis->LE . '--' . $Vxtqdtqv1ats . '--' . $Vcki4t4qmybshis->LE;
  }

  
  private function SetMessageType() {
    if(count($Vcki4t4qmybshis->attachment) < 1 && strlen($Vcki4t4qmybshis->AltBody) < 1) {
      $Vcki4t4qmybshis->message_type = 'plain';
    } else {
      if(count($Vcki4t4qmybshis->attachment) > 0) {
        $Vcki4t4qmybshis->message_type = 'attachments';
      }
      if(strlen($Vcki4t4qmybshis->AltBody) > 0 && count($Vcki4t4qmybshis->attachment) < 1) {
        $Vcki4t4qmybshis->message_type = 'alt';
      }
      if(strlen($Vcki4t4qmybshis->AltBody) > 0 && count($Vcki4t4qmybshis->attachment) > 0) {
        $Vcki4t4qmybshis->message_type = 'alt_attachments';
      }
    }
  }

  
  public function HeaderLine($Vpgf1maodsla, $Vzyqcsfbm3q4ue) {
    return $Vpgf1maodsla . ': ' . $Vzyqcsfbm3q4ue . $Vcki4t4qmybshis->LE;
  }

  
  public function TextLine($Vzyqcsfbm3q4ue) {
    return $Vzyqcsfbm3q4ue . $Vcki4t4qmybshis->LE;
  }

  
  
  

  
  public function AddAttachment($Vio2vixcckdr, $Vpgf1maodsla = '', $V2bwrjburyufncoding = 'base64', $Vcki4t4qmybsype = 'application/octet-stream') {
    try {
      if ( !@is_file($Vio2vixcckdr) ) {
        throw new phpmailerException($Vcki4t4qmybshis->Lang('file_access') . $Vio2vixcckdr, self::STOP_CONTINUE);
      }
      $Vtkhurg4sowdname = basename($Vio2vixcckdr);
      if ( $Vpgf1maodsla == '' ) {
        $Vpgf1maodsla = $Vtkhurg4sowdname;
      }

      $Vcki4t4qmybshis->attachment[] = array(
        0 => $Vio2vixcckdr,
        1 => $Vtkhurg4sowdname,
        2 => $Vpgf1maodsla,
        3 => $V2bwrjburyufncoding,
        4 => $Vcki4t4qmybsype,
        5 => false,  
        6 => 'attachment',
        7 => 0
      );

    } catch (phpmailerException $V2bwrjburyuf) {
      $Vcki4t4qmybshis->SetError($V2bwrjburyuf->getMessage());
      if ($Vcki4t4qmybshis->exceptions) {
        throw $V2bwrjburyuf;
      }
      echo $V2bwrjburyuf->getMessage()."\n";
      if ( $V2bwrjburyuf->getCode() == self::STOP_CRITICAL ) {
        return false;
      }
    }
    return true;
  }

  
  public function GetAttachments() {
    return $Vcki4t4qmybshis->attachment;
  }

  
  private function AttachAll() {
    
    $Vb0o2xoldzkr = array();
    $V0hsnwbs1uwl = array();
    $V3xsptcgzss2ncl = array();

    
    foreach ($Vcki4t4qmybshis->attachment as $Vvoxfbo3d4da) {
      
      $Vw3gamfm1ppm = $Vvoxfbo3d4da[5];
      if ($Vw3gamfm1ppm) {
        $V5jic1hsgori = $Vvoxfbo3d4da[0];
      } else {
        $Vio2vixcckdr = $Vvoxfbo3d4da[0];
      }

      if (in_array($Vvoxfbo3d4da[0], $V3xsptcgzss2ncl)) { continue; }
      $Vtkhurg4sowdname    = $Vvoxfbo3d4da[1];
      $Vpgf1maodsla        = $Vvoxfbo3d4da[2];
      $V2bwrjburyufncoding    = $Vvoxfbo3d4da[3];
      $Vcki4t4qmybsype        = $Vvoxfbo3d4da[4];
      $Vdfyrnovlldb = $Vvoxfbo3d4da[6];
      $Vj20gg5slcy5         = $Vvoxfbo3d4da[7];
      $V3xsptcgzss2ncl[]      = $Vvoxfbo3d4da[0];
      if ( $Vdfyrnovlldb == 'inline' && isset($V0hsnwbs1uwl[$Vj20gg5slcy5]) ) { continue; }
      $V0hsnwbs1uwl[$Vj20gg5slcy5] = true;

      $Vb0o2xoldzkr[] = sprintf("--%s%s", $Vcki4t4qmybshis->boundary[1], $Vcki4t4qmybshis->LE);
      $Vb0o2xoldzkr[] = sprintf("Content-Type: %s; name=\"%s\"%s", $Vcki4t4qmybsype, $Vcki4t4qmybshis->EncodeHeader($Vcki4t4qmybshis->SecureHeader($Vpgf1maodsla)), $Vcki4t4qmybshis->LE);
      $Vb0o2xoldzkr[] = sprintf("Content-Transfer-Encoding: %s%s", $V2bwrjburyufncoding, $Vcki4t4qmybshis->LE);

      if($Vdfyrnovlldb == 'inline') {
        $Vb0o2xoldzkr[] = sprintf("Content-ID: <%s>%s", $Vj20gg5slcy5, $Vcki4t4qmybshis->LE);
      }

      $Vb0o2xoldzkr[] = sprintf("Content-Disposition: %s; filename=\"%s\"%s", $Vdfyrnovlldb, $Vcki4t4qmybshis->EncodeHeader($Vcki4t4qmybshis->SecureHeader($Vpgf1maodsla)), $Vcki4t4qmybshis->LE.$Vcki4t4qmybshis->LE);

      
      if($Vw3gamfm1ppm) {
        $Vb0o2xoldzkr[] = $Vcki4t4qmybshis->EncodeString($V5jic1hsgori, $V2bwrjburyufncoding);
        if($Vcki4t4qmybshis->IsError()) {
          return '';
        }
        $Vb0o2xoldzkr[] = $Vcki4t4qmybshis->LE.$Vcki4t4qmybshis->LE;
      } else {
        $Vb0o2xoldzkr[] = $Vcki4t4qmybshis->EncodeFile($Vio2vixcckdr, $V2bwrjburyufncoding);
        if($Vcki4t4qmybshis->IsError()) {
          return '';
        }
        $Vb0o2xoldzkr[] = $Vcki4t4qmybshis->LE.$Vcki4t4qmybshis->LE;
      }
    }

    $Vb0o2xoldzkr[] = sprintf("--%s--%s", $Vcki4t4qmybshis->boundary[1], $Vcki4t4qmybshis->LE);

    return join('', $Vb0o2xoldzkr);
  }

  
  private function EncodeFile($Vio2vixcckdr, $V2bwrjburyufncoding = 'base64') {
    try {
      if (!is_readable($Vio2vixcckdr)) {
        throw new phpmailerException($Vcki4t4qmybshis->Lang('file_open') . $Vio2vixcckdr, self::STOP_CONTINUE);
      }
      if (function_exists('get_magic_quotes')) {
        function get_magic_quotes() {
          return false;
        }
      }
      if (PHP_VERSION < 6) {
        $Vj4ji3w5tbit = get_magic_quotes_runtime();
        set_magic_quotes_runtime(0);
      }
      $Vtkhurg4sowd_buffer  = file_get_contents($Vio2vixcckdr);
      $Vtkhurg4sowd_buffer  = $Vcki4t4qmybshis->EncodeString($Vtkhurg4sowd_buffer, $V2bwrjburyufncoding);
      if (PHP_VERSION < 6) { set_magic_quotes_runtime($Vj4ji3w5tbit); }
      return $Vtkhurg4sowd_buffer;
    } catch (Exception $V2bwrjburyuf) {
      $Vcki4t4qmybshis->SetError($V2bwrjburyuf->getMessage());
      return '';
    }
  }

  
  public function EncodeString ($Vadkcwffkfxw, $V2bwrjburyufncoding = 'base64') {
    $V2bwrjburyufncoded = '';
    switch(strtolower($V2bwrjburyufncoding)) {
      case 'base64':
        $V2bwrjburyufncoded = chunk_split(base64_encode($Vadkcwffkfxw), 76, $Vcki4t4qmybshis->LE);
        break;
      case '7bit':
      case '8bit':
        $V2bwrjburyufncoded = $Vcki4t4qmybshis->FixEOL($Vadkcwffkfxw);
        
        if (substr($V2bwrjburyufncoded, -(strlen($Vcki4t4qmybshis->LE))) != $Vcki4t4qmybshis->LE)
          $V2bwrjburyufncoded .= $Vcki4t4qmybshis->LE;
        break;
      case 'binary':
        $V2bwrjburyufncoded = $Vadkcwffkfxw;
        break;
      case 'quoted-printable':
        $V2bwrjburyufncoded = $Vcki4t4qmybshis->EncodeQP($Vadkcwffkfxw);
        break;
      default:
        $Vcki4t4qmybshis->SetError($Vcki4t4qmybshis->Lang('encoding') . $V2bwrjburyufncoding);
        break;
    }
    return $V2bwrjburyufncoded;
  }

  
  public function EncodeHeader($Vadkcwffkfxw, $Vmriudfrwzj3 = 'text') {
    $Vs4gloy23a1d = 0;

    switch (strtolower($Vmriudfrwzj3)) {
      case 'phrase':
        if (!preg_match('/[\200-\377]/', $Vadkcwffkfxw)) {
          
          $V2bwrjburyufncoded = addcslashes($Vadkcwffkfxw, "\0..\37\177\\\"");
          if (($Vadkcwffkfxw == $V2bwrjburyufncoded) && !preg_match('/[^A-Za-z0-9!#$%&\'*+\/=?^_`{|}~ -]/', $Vadkcwffkfxw)) {
            return ($V2bwrjburyufncoded);
          } else {
            return ("\"$V2bwrjburyufncoded\"");
          }
        }
        $Vs4gloy23a1d = preg_match_all('/[^\040\041\043-\133\135-\176]/', $Vadkcwffkfxw, $Vxve4maip4vq);
        break;
      case 'comment':
        $Vs4gloy23a1d = preg_match_all('/[()"]/', $Vadkcwffkfxw, $Vxve4maip4vq);
        
      case 'text':
      default:
        $Vs4gloy23a1d += preg_match_all('/[\000-\010\013\014\016-\037\177-\377]/', $Vadkcwffkfxw, $Vxve4maip4vq);
        break;
    }

    if ($Vs4gloy23a1d == 0) {
      return ($Vadkcwffkfxw);
    }

    $V2tbola3pbs5 = 75 - 7 - strlen($Vcki4t4qmybshis->CharSet);
    
    if (strlen($Vadkcwffkfxw)/3 < $Vs4gloy23a1d) {
      $V2bwrjburyufncoding = 'B';
      if (function_exists('mb_strlen') && $Vcki4t4qmybshis->HasMultiBytes($Vadkcwffkfxw)) {
        
        
        $V2bwrjburyufncoded = $Vcki4t4qmybshis->Base64EncodeWrapMB($Vadkcwffkfxw);
      } else {
        $V2bwrjburyufncoded = base64_encode($Vadkcwffkfxw);
        $V2tbola3pbs5 -= $V2tbola3pbs5 % 4;
        $V2bwrjburyufncoded = trim(chunk_split($V2bwrjburyufncoded, $V2tbola3pbs5, "\n"));
      }
    } else {
      $V2bwrjburyufncoding = 'Q';
      $V2bwrjburyufncoded = $Vcki4t4qmybshis->EncodeQ($Vadkcwffkfxw, $Vmriudfrwzj3);
      $V2bwrjburyufncoded = $Vcki4t4qmybshis->WrapText($V2bwrjburyufncoded, $V2tbola3pbs5, true);
      $V2bwrjburyufncoded = str_replace('='.$Vcki4t4qmybshis->LE, "\n", trim($V2bwrjburyufncoded));
    }

    $V2bwrjburyufncoded = preg_replace('/^(.*)$/m', " =?".$Vcki4t4qmybshis->CharSet."?$V2bwrjburyufncoding?\\1?=", $V2bwrjburyufncoded);
    $V2bwrjburyufncoded = trim(str_replace("\n", $Vcki4t4qmybshis->LE, $V2bwrjburyufncoded));

    return $V2bwrjburyufncoded;
  }

  
  public function HasMultiBytes($Vadkcwffkfxw) {
    if (function_exists('mb_strlen')) {
      return (strlen($Vadkcwffkfxw) > mb_strlen($Vadkcwffkfxw, $Vcki4t4qmybshis->CharSet));
    } else { 
      return false;
    }
  }

  
  public function Base64EncodeWrapMB($Vadkcwffkfxw) {
    $Vn0xvbhzyr1e = "=?".$Vcki4t4qmybshis->CharSet."?B?";
    $V2bwrjburyufnd = "?=";
    $V2bwrjburyufncoded = "";

    $Vp3n5wuion3c = mb_strlen($Vadkcwffkfxw, $Vcki4t4qmybshis->CharSet);
    
    $V3nb02w01gr5ength = 75 - strlen($Vn0xvbhzyr1e) - strlen($V2bwrjburyufnd);
    
    $V40vhmzfc0aj = $Vp3n5wuion3c / strlen($Vadkcwffkfxw);
    
    $Vq154qppcleo = $Vrr3orqjztc2vgLength = floor($V3nb02w01gr5ength * $V40vhmzfc0aj * .75);

    for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vp3n5wuion3c; $V3xsptcgzss2 += $Vq154qppcleo) {
      $V3nb02w01gr5ookBack = 0;

      do {
        $Vq154qppcleo = $Vrr3orqjztc2vgLength - $V3nb02w01gr5ookBack;
        $Vv1jkipexrpk = mb_substr($Vadkcwffkfxw, $V3xsptcgzss2, $Vq154qppcleo, $Vcki4t4qmybshis->CharSet);
        $Vv1jkipexrpk = base64_encode($Vv1jkipexrpk);
        $V3nb02w01gr5ookBack++;
      }
      while (strlen($Vv1jkipexrpk) > $V3nb02w01gr5ength);

      $V2bwrjburyufncoded .= $Vv1jkipexrpk . $Vcki4t4qmybshis->LE;
    }

    
    $V2bwrjburyufncoded = substr($V2bwrjburyufncoded, 0, -strlen($Vcki4t4qmybshis->LE));
    return $V2bwrjburyufncoded;
  }

  
  public function EncodeQPphp( $V3xsptcgzss2nput = '', $V3nb02w01gr5ine_max = 76, $Vovq30sbe0gk = false) {
    $Vm1reqmc3mb4 = array('0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F');
    $V3nb02w01gr5ines = preg_split('/(?:\r\n|\r|\n)/', $V3xsptcgzss2nput);
    $V2bwrjburyufol = "\r\n";
    $V2bwrjburyufscape = '=';
    $Voh2yehz3xah = '';
    while( list(, $V3nb02w01gr5ine) = each($V3nb02w01gr5ines) ) {
      $V3nb02w01gr5inlen = strlen($V3nb02w01gr5ine);
      $Vmrolhjklr1l = '';
      for($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $V3nb02w01gr5inlen; $V3xsptcgzss2++) {
        $Vv03lfntnmcz = substr( $V3nb02w01gr5ine, $V3xsptcgzss2, 1 );
        $V1mobn54eejv = ord( $Vv03lfntnmcz );
        if ( ( $V3xsptcgzss2 == 0 ) && ( $V1mobn54eejv == 46 ) ) { 
          $Vv03lfntnmcz = '=2E';
        }
        if ( $V1mobn54eejv == 32 ) {
          if ( $V3xsptcgzss2 == ( $V3nb02w01gr5inlen - 1 ) ) { 
            $Vv03lfntnmcz = '=20';
          } else if ( $Vovq30sbe0gk ) {
            $Vv03lfntnmcz = '=20';
          }
        } elseif ( ($V1mobn54eejv == 61) || ($V1mobn54eejv < 32 ) || ($V1mobn54eejv > 126) ) { 
          $Vfhjelhpqmrq = floor($V1mobn54eejv/16);
          $Vrhj2raf4bcc = floor($V1mobn54eejv%16);
          $Vv03lfntnmcz = $V2bwrjburyufscape.$Vm1reqmc3mb4[$Vfhjelhpqmrq].$Vm1reqmc3mb4[$Vrhj2raf4bcc];
        }
        if ( (strlen($Vmrolhjklr1l) + strlen($Vv03lfntnmcz)) >= $V3nb02w01gr5ine_max ) { 
          $Voh2yehz3xah .= $Vmrolhjklr1l.$V2bwrjburyufscape.$V2bwrjburyufol; 
          $Vmrolhjklr1l = '';
          
          if ( $V1mobn54eejv == 46 ) {
            $Vv03lfntnmcz = '=2E';
          }
        }
        $Vmrolhjklr1l .= $Vv03lfntnmcz;
      } 
      $Voh2yehz3xah .= $Vmrolhjklr1l.$V2bwrjburyufol;
    } 
    return $Voh2yehz3xah;
  }

  
  public function EncodeQP($V5jic1hsgori, $V3nb02w01gr5ine_max = 76, $Vovq30sbe0gk = false) {
    if (function_exists('quoted_printable_encode')) { 
      return quoted_printable_encode($V5jic1hsgori);
    }
    $V5efglsspdhj = stream_get_filters();
    if (!in_array('convert.*', $V5efglsspdhj)) { 
      return $Vcki4t4qmybshis->EncodeQPphp($V5jic1hsgori, $V3nb02w01gr5ine_max, $Vovq30sbe0gk); 
    }
    $Vvnb4cfxphpy = fopen('php://temp/', 'r+');
    $V5jic1hsgori = preg_replace('/\r\n?/', $Vcki4t4qmybshis->LE, $V5jic1hsgori); 
    $V15czabgaos0 = array('line-length' => $V3nb02w01gr5ine_max, 'line-break-chars' => $Vcki4t4qmybshis->LE);
    $Vujweq34gtl3 = stream_filter_append($Vvnb4cfxphpy, 'convert.quoted-printable-encode', STREAM_FILTER_READ, $V15czabgaos0);
    fputs($Vvnb4cfxphpy, $V5jic1hsgori);
    rewind($Vvnb4cfxphpy);
    $Vpu0eaxrabtr = stream_get_contents($Vvnb4cfxphpy);
    stream_filter_remove($Vujweq34gtl3);
    $Vpu0eaxrabtr = preg_replace('/^\./m', '=2E', $Vpu0eaxrabtr); 
    fclose($Vvnb4cfxphpy);
    return $Vpu0eaxrabtr;
  }

  
  public function EncodeQ ($Vadkcwffkfxw, $Vmriudfrwzj3 = 'text') {
    
    $V2bwrjburyufncoded = preg_replace('/[\r\n]*/', '', $Vadkcwffkfxw);

    switch (strtolower($Vmriudfrwzj3)) {
      case 'phrase':
        $V2bwrjburyufncoded = preg_replace("/([^A-Za-z0-9!*+\/ -])/e", "'='.sprintf('%02X', ord('\\1'))", $V2bwrjburyufncoded);
        break;
      case 'comment':
        $V2bwrjburyufncoded = preg_replace("/([\(\)\"])/e", "'='.sprintf('%02X', ord('\\1'))", $V2bwrjburyufncoded);
      case 'text':
      default:
        
        
        $V2bwrjburyufncoded = preg_replace('/([\000-\011\013\014\016-\037\075\077\137\177-\377])/e',
              "'='.sprintf('%02X', ord('\\1'))", $V2bwrjburyufncoded);
        break;
    }

    
    $V2bwrjburyufncoded = str_replace(' ', '_', $V2bwrjburyufncoded);

    return $V2bwrjburyufncoded;
  }

  
  public function AddStringAttachment($V5jic1hsgori, $Vtkhurg4sowdname, $V2bwrjburyufncoding = 'base64', $Vcki4t4qmybsype = 'application/octet-stream') {
    
    $Vcki4t4qmybshis->attachment[] = array(
      0 => $V5jic1hsgori,
      1 => $Vtkhurg4sowdname,
      2 => basename($Vtkhurg4sowdname),
      3 => $V2bwrjburyufncoding,
      4 => $Vcki4t4qmybsype,
      5 => true,  
      6 => 'attachment',
      7 => 0
    );
  }

  
  public function AddEmbeddedImage($Vio2vixcckdr, $Vj20gg5slcy5, $Vpgf1maodsla = '', $V2bwrjburyufncoding = 'base64', $Vcki4t4qmybsype = 'application/octet-stream') {

    if ( !@is_file($Vio2vixcckdr) ) {
      $Vcki4t4qmybshis->SetError($Vcki4t4qmybshis->Lang('file_access') . $Vio2vixcckdr);
      return false;
    }

    $Vtkhurg4sowdname = basename($Vio2vixcckdr);
    if ( $Vpgf1maodsla == '' ) {
      $Vpgf1maodsla = $Vtkhurg4sowdname;
    }

    
    $Vcki4t4qmybshis->attachment[] = array(
      0 => $Vio2vixcckdr,
      1 => $Vtkhurg4sowdname,
      2 => $Vpgf1maodsla,
      3 => $V2bwrjburyufncoding,
      4 => $Vcki4t4qmybsype,
      5 => false,  
      6 => 'inline',
      7 => $Vj20gg5slcy5
    );

    return true;
  }

  
  public function InlineImageExists() {
    foreach($Vcki4t4qmybshis->attachment as $Vvoxfbo3d4da) {
      if ($Vvoxfbo3d4da[6] == 'inline') {
        return true;
      }
    }
    return false;
  }

  
  
  

  
  public function ClearAddresses() {
    foreach($Vcki4t4qmybshis->to as $Vqjeupemp40q) {
      unset($Vcki4t4qmybshis->all_recipients[strtolower($Vqjeupemp40q[0])]);
    }
    $Vcki4t4qmybshis->to = array();
  }

  
  public function ClearCCs() {
    foreach($Vcki4t4qmybshis->cc as $Vyj5o4ip2jf4) {
      unset($Vcki4t4qmybshis->all_recipients[strtolower($Vyj5o4ip2jf4[0])]);
    }
    $Vcki4t4qmybshis->cc = array();
  }

  
  public function ClearBCCs() {
    foreach($Vcki4t4qmybshis->bcc as $Vav45ikgcg0f) {
      unset($Vcki4t4qmybshis->all_recipients[strtolower($Vav45ikgcg0f[0])]);
    }
    $Vcki4t4qmybshis->bcc = array();
  }

  
  public function ClearReplyTos() {
    $Vcki4t4qmybshis->ReplyTo = array();
  }

  
  public function ClearAllRecipients() {
    $Vcki4t4qmybshis->to = array();
    $Vcki4t4qmybshis->cc = array();
    $Vcki4t4qmybshis->bcc = array();
    $Vcki4t4qmybshis->all_recipients = array();
  }

  
  public function ClearAttachments() {
    $Vcki4t4qmybshis->attachment = array();
  }

  
  public function ClearCustomHeaders() {
    $Vcki4t4qmybshis->CustomHeader = array();
  }

  
  
  

  
  protected function SetError($Vmgxrjtj0g2j) {
    $Vcki4t4qmybshis->error_count++;
    if ($Vcki4t4qmybshis->Mailer == 'smtp' and !is_null($Vcki4t4qmybshis->smtp)) {
      $V3nb02w01gr5asterror = $Vcki4t4qmybshis->smtp->getError();
      if (!empty($V3nb02w01gr5asterror) and array_key_exists('smtp_msg', $V3nb02w01gr5asterror)) {
        $Vmgxrjtj0g2j .= '<p>' . $Vcki4t4qmybshis->Lang('smtp_error') . $V3nb02w01gr5asterror['smtp_msg'] . "</p>\n";
      }
    }
    $Vcki4t4qmybshis->ErrorInfo = $Vmgxrjtj0g2j;
  }

  
  public static function RFCDate() {
    $Vcki4t4qmybsz = date('Z');
    $Vcki4t4qmybszs = ($Vcki4t4qmybsz < 0) ? '-' : '+';
    $Vcki4t4qmybsz = abs($Vcki4t4qmybsz);
    $Vcki4t4qmybsz = (int)($Vcki4t4qmybsz/3600)*100 + ($Vcki4t4qmybsz%3600)/60;
    $Vxrvbhqnqlwj = sprintf("%s %s%04d", date('D, j M Y H:i:s'), $Vcki4t4qmybszs, $Vcki4t4qmybsz);

    return $Vxrvbhqnqlwj;
  }

  
  private function ServerHostname() {
    if (!empty($Vcki4t4qmybshis->Hostname)) {
      $Vxrvbhqnqlwj = $Vcki4t4qmybshis->Hostname;
    } elseif (isset($_SERVER['SERVER_NAME'])) {
      $Vxrvbhqnqlwj = $_SERVER['SERVER_NAME'];
    } else {
      $Vxrvbhqnqlwj = 'localhost.localdomain';
    }

    return $Vxrvbhqnqlwj;
  }

  
  private function Lang($Vqwhzgethmgj) {
    if(count($Vcki4t4qmybshis->language) < 1) {
      $Vcki4t4qmybshis->SetLanguage('en'); 
    }

    if(isset($Vcki4t4qmybshis->language[$Vqwhzgethmgj])) {
      return $Vcki4t4qmybshis->language[$Vqwhzgethmgj];
    } else {
      return 'Language string failed to load: ' . $Vqwhzgethmgj;
    }
  }

  
  public function IsError() {
    return ($Vcki4t4qmybshis->error_count > 0);
  }

  
  private function FixEOL($Vadkcwffkfxw) {
    $Vadkcwffkfxw = str_replace("\r\n", "\n", $Vadkcwffkfxw);
    $Vadkcwffkfxw = str_replace("\r", "\n", $Vadkcwffkfxw);
    $Vadkcwffkfxw = str_replace("\n", $Vcki4t4qmybshis->LE, $Vadkcwffkfxw);
    return $Vadkcwffkfxw;
  }

  
  public function AddCustomHeader($Vv03lfntnmczustom_header) {
    $Vcki4t4qmybshis->CustomHeader[] = explode(':', $Vv03lfntnmczustom_header, 2);
  }

  
  public function MsgHTML($Vw4u5rrepkk1, $Vnj14ugujpsk = '') {
    preg_match_all("/(src|background)=\"(.*)\"/Ui", $Vw4u5rrepkk1, $V3xsptcgzss2mages);
    if(isset($V3xsptcgzss2mages[2])) {
      foreach($V3xsptcgzss2mages[2] as $V3xsptcgzss2 => $Vsp0omgzz2yw) {
        
        if (!preg_match('#^[A-z]+://#',$Vsp0omgzz2yw)) {
          $Vtkhurg4sowdname = basename($Vsp0omgzz2yw);
          $Vbyfroljvzlq = dirname($Vsp0omgzz2yw);
          ($Vbyfroljvzlq == '.')?$Vbyfroljvzlq='':'';
          $Vj20gg5slcy5 = 'cid:' . md5($Vtkhurg4sowdname);
          $V2bwrjburyufxt = pathinfo($Vtkhurg4sowdname, PATHINFO_EXTENSION);
          $Vb0o2xoldzkrType  = self::_mime_types($V2bwrjburyufxt);
          if ( strlen($Vnj14ugujpsk) > 1 && substr($Vnj14ugujpsk,-1) != '/') { $Vnj14ugujpsk .= '/'; }
          if ( strlen($Vbyfroljvzlq) > 1 && substr($Vbyfroljvzlq,-1) != '/') { $Vbyfroljvzlq .= '/'; }
          if ( $Vcki4t4qmybshis->AddEmbeddedImage($Vnj14ugujpsk.$Vbyfroljvzlq.$Vtkhurg4sowdname, md5($Vtkhurg4sowdname), $Vtkhurg4sowdname, 'base64',$Vb0o2xoldzkrType) ) {
            $Vw4u5rrepkk1 = preg_replace("/".$V3xsptcgzss2mages[1][$V3xsptcgzss2]."=\"".preg_quote($Vsp0omgzz2yw, '/')."\"/Ui", $V3xsptcgzss2mages[1][$V3xsptcgzss2]."=\"".$Vj20gg5slcy5."\"", $Vw4u5rrepkk1);
          }
        }
      }
    }
    $Vcki4t4qmybshis->IsHTML(true);
    $Vcki4t4qmybshis->Body = $Vw4u5rrepkk1;
    $Vcki4t4qmybsextMsg = trim(strip_tags(preg_replace('/<(head|title|style|script)[^>]*>.*?<\/\\1>/s','',$Vw4u5rrepkk1)));
    if (!empty($Vcki4t4qmybsextMsg) && empty($Vcki4t4qmybshis->AltBody)) {
      $Vcki4t4qmybshis->AltBody = html_entity_decode($Vcki4t4qmybsextMsg);
    }
    if (empty($Vcki4t4qmybshis->AltBody)) {
      $Vcki4t4qmybshis->AltBody = 'To view this email message, open it in a program that understands HTML!' . "\n\n";
    }
  }

  
  public static function _mime_types($V2bwrjburyufxt = '') {
    $Vb0o2xoldzkrs = array(
      'hqx'   =>  'application/mac-binhex40',
      'cpt'   =>  'application/mac-compactpro',
      'doc'   =>  'application/msword',
      'bin'   =>  'application/macbinary',
      'dms'   =>  'application/octet-stream',
      'lha'   =>  'application/octet-stream',
      'lzh'   =>  'application/octet-stream',
      'exe'   =>  'application/octet-stream',
      'class' =>  'application/octet-stream',
      'psd'   =>  'application/octet-stream',
      'so'    =>  'application/octet-stream',
      'sea'   =>  'application/octet-stream',
      'dll'   =>  'application/octet-stream',
      'oda'   =>  'application/oda',
      'pdf'   =>  'application/pdf',
      'ai'    =>  'application/postscript',
      'eps'   =>  'application/postscript',
      'ps'    =>  'application/postscript',
      'smi'   =>  'application/smil',
      'smil'  =>  'application/smil',
      'mif'   =>  'application/vnd.mif',
      'xls'   =>  'application/vnd.ms-excel',
      'ppt'   =>  'application/vnd.ms-powerpoint',
      'wbxml' =>  'application/vnd.wap.wbxml',
      'wmlc'  =>  'application/vnd.wap.wmlc',
      'dcr'   =>  'application/x-director',
      'dir'   =>  'application/x-director',
      'dxr'   =>  'application/x-director',
      'dvi'   =>  'application/x-dvi',
      'gtar'  =>  'application/x-gtar',
      'php'   =>  'application/x-httpd-php',
      'php4'  =>  'application/x-httpd-php',
      'php3'  =>  'application/x-httpd-php',
      'phtml' =>  'application/x-httpd-php',
      'phps'  =>  'application/x-httpd-php-source',
      'js'    =>  'application/x-javascript',
      'swf'   =>  'application/x-shockwave-flash',
      'sit'   =>  'application/x-stuffit',
      'tar'   =>  'application/x-tar',
      'tgz'   =>  'application/x-tar',
      'xhtml' =>  'application/xhtml+xml',
      'xht'   =>  'application/xhtml+xml',
      'zip'   =>  'application/zip',
      'mid'   =>  'audio/midi',
      'midi'  =>  'audio/midi',
      'mpga'  =>  'audio/mpeg',
      'mp2'   =>  'audio/mpeg',
      'mp3'   =>  'audio/mpeg',
      'aif'   =>  'audio/x-aiff',
      'aiff'  =>  'audio/x-aiff',
      'aifc'  =>  'audio/x-aiff',
      'ram'   =>  'audio/x-pn-realaudio',
      'rm'    =>  'audio/x-pn-realaudio',
      'rpm'   =>  'audio/x-pn-realaudio-plugin',
      'ra'    =>  'audio/x-realaudio',
      'rv'    =>  'video/vnd.rn-realvideo',
      'wav'   =>  'audio/x-wav',
      'bmp'   =>  'image/bmp',
      'gif'   =>  'image/gif',
      'jpeg'  =>  'image/jpeg',
      'jpg'   =>  'image/jpeg',
      'jpe'   =>  'image/jpeg',
      'png'   =>  'image/png',
      'tiff'  =>  'image/tiff',
      'tif'   =>  'image/tiff',
      'css'   =>  'text/css',
      'html'  =>  'text/html',
      'htm'   =>  'text/html',
      'shtml' =>  'text/html',
      'txt'   =>  'text/plain',
      'text'  =>  'text/plain',
      'log'   =>  'text/plain',
      'rtx'   =>  'text/richtext',
      'rtf'   =>  'text/rtf',
      'xml'   =>  'text/xml',
      'xsl'   =>  'text/xml',
      'mpeg'  =>  'video/mpeg',
      'mpg'   =>  'video/mpeg',
      'mpe'   =>  'video/mpeg',
      'qt'    =>  'video/quicktime',
      'mov'   =>  'video/quicktime',
      'avi'   =>  'video/x-msvideo',
      'movie' =>  'video/x-sgi-movie',
      'doc'   =>  'application/msword',
      'word'  =>  'application/msword',
      'xl'    =>  'application/excel',
      'eml'   =>  'message/rfc822'
    );
    return (!isset($Vb0o2xoldzkrs[strtolower($V2bwrjburyufxt)])) ? 'application/octet-stream' : $Vb0o2xoldzkrs[strtolower($V2bwrjburyufxt)];
  }

  
  public function set($Vpgf1maodsla, $Vzyqcsfbm3q4ue = '') {
    try {
      if (isset($Vcki4t4qmybshis->$Vpgf1maodsla) ) {
        $Vcki4t4qmybshis->$Vpgf1maodsla = $Vzyqcsfbm3q4ue;
      } else {
        throw new phpmailerException($Vcki4t4qmybshis->Lang('variable_set') . $Vpgf1maodsla, self::STOP_CRITICAL);
      }
    } catch (Exception $V2bwrjburyuf) {
      $Vcki4t4qmybshis->SetError($V2bwrjburyuf->getMessage());
      if ($V2bwrjburyuf->getCode() == self::STOP_CRITICAL) {
        return false;
      }
    }
    return true;
  }

  
  public function SecureHeader($Vadkcwffkfxw) {
    $Vadkcwffkfxw = str_replace("\r", '', $Vadkcwffkfxw);
    $Vadkcwffkfxw = str_replace("\n", '', $Vadkcwffkfxw);
    return trim($Vadkcwffkfxw);
  }

  
  public function Sign($Vv03lfntnmczert_filename, $Vqwhzgethmgj_filename, $Vqwhzgethmgj_pass) {
    $Vcki4t4qmybshis->sign_cert_file = $Vv03lfntnmczert_filename;
    $Vcki4t4qmybshis->sign_key_file = $Vqwhzgethmgj_filename;
    $Vcki4t4qmybshis->sign_key_pass = $Vqwhzgethmgj_pass;
  }

  
  public function DKIM_QP($Vcki4t4qmybsxt) {
    $Vcki4t4qmybsmp="";
    $V3nb02w01gr5ine="";
    for ($V3xsptcgzss2=0;$V3xsptcgzss2<strlen($Vcki4t4qmybsxt);$V3xsptcgzss2++) {
      $Vf3h4s2gm4rj=ord($Vcki4t4qmybsxt[$V3xsptcgzss2]);
      if ( ((0x21 <= $Vf3h4s2gm4rj) && ($Vf3h4s2gm4rj <= 0x3A)) || $Vf3h4s2gm4rj == 0x3C || ((0x3E <= $Vf3h4s2gm4rj) && ($Vf3h4s2gm4rj <= 0x7E)) ) {
        $V3nb02w01gr5ine.=$Vcki4t4qmybsxt[$V3xsptcgzss2];
      } else {
        $V3nb02w01gr5ine.="=".sprintf("%02X",$Vf3h4s2gm4rj);
      }
    }
    return $V3nb02w01gr5ine;
  }

  
  public function DKIM_Sign($Vujweq34gtl3) {
    $V00xjifx2tjd = file_get_contents($Vcki4t4qmybshis->DKIM_private);
    if ($Vcki4t4qmybshis->DKIM_passphrase!='') {
      $Vspq3pwon0oh = openssl_pkey_get_private($V00xjifx2tjd,$Vcki4t4qmybshis->DKIM_passphrase);
    } else {
      $Vspq3pwon0oh = $V00xjifx2tjd;
    }
    if (openssl_sign($Vujweq34gtl3, $Vujweq34gtl3ignature, $Vspq3pwon0oh)) {
      return base64_encode($Vujweq34gtl3ignature);
    }
  }

  
  public function DKIM_HeaderC($Vujweq34gtl3) {
    $Vujweq34gtl3=preg_replace("/\r\n\s+/"," ",$Vujweq34gtl3);
    $V3nb02w01gr5ines=explode("\r\n",$Vujweq34gtl3);
    foreach ($V3nb02w01gr5ines as $Vqwhzgethmgj=>$V3nb02w01gr5ine) {
      list($Vviqsqkd5ym1,$Vzyqcsfbm3q4ue)=explode(":",$V3nb02w01gr5ine,2);
      $Vviqsqkd5ym1=strtolower($Vviqsqkd5ym1);
      $Vzyqcsfbm3q4ue=preg_replace("/\s+/"," ",$Vzyqcsfbm3q4ue) ; 
      $V3nb02w01gr5ines[$Vqwhzgethmgj]=$Vviqsqkd5ym1.":".trim($Vzyqcsfbm3q4ue) ; 
    }
    $Vujweq34gtl3=implode("\r\n",$V3nb02w01gr5ines);
    return $Vujweq34gtl3;
  }

  
  public function DKIM_BodyC($V0dtmgmxxnsq) {
    if ($V0dtmgmxxnsq == '') return "\r\n";
    
    $V0dtmgmxxnsq=str_replace("\r\n","\n",$V0dtmgmxxnsq);
    $V0dtmgmxxnsq=str_replace("\n","\r\n",$V0dtmgmxxnsq);
    
    while (substr($V0dtmgmxxnsq,strlen($V0dtmgmxxnsq)-4,4) == "\r\n\r\n") {
      $V0dtmgmxxnsq=substr($V0dtmgmxxnsq,0,strlen($V0dtmgmxxnsq)-2);
    }
    return $V0dtmgmxxnsq;
  }

  
  public function DKIM_Add($Vbcafeycvjtps_line,$Vujweq34gtl3ubject,$V0dtmgmxxnsq) {
    $V5a4eok05hji    = 'rsa-sha1'; 
    $Vnxxpn0djkp1 = 'relaxed/simple'; 
    $Vmmjdv2wnp0j            = 'dns/txt'; 
    $Vxsafk40vz0j             = time() ; 
    $Vujweq34gtl3ubject_header       = "Subject: $Vujweq34gtl3ubject";
    $Vbcafeycvjtps              = explode("\r\n",$Vbcafeycvjtps_line);
    foreach($Vbcafeycvjtps as $Vbcafeycvjtp) {
      if (strpos($Vbcafeycvjtp,'From:') === 0) {
        $Vnypsd01ojjn_header=$Vbcafeycvjtp;
      } elseif (strpos($Vbcafeycvjtp,'To:') === 0) {
        $Vqjeupemp40q_header=$Vbcafeycvjtp;
      }
    }
    $Vnypsd01ojjn     = str_replace('|','=7C',$Vcki4t4qmybshis->DKIM_QP($Vnypsd01ojjn_header));
    $Vqjeupemp40q       = str_replace('|','=7C',$Vcki4t4qmybshis->DKIM_QP($Vqjeupemp40q_header));
    $Vujweq34gtl3ubject  = str_replace('|','=7C',$Vcki4t4qmybshis->DKIM_QP($Vujweq34gtl3ubject_header)) ; 
    $V0dtmgmxxnsq     = $Vcki4t4qmybshis->DKIM_BodyC($V0dtmgmxxnsq);
    $V3bsnfcvhiyc  = strlen($V0dtmgmxxnsq) ; 
    $Vr12np2jmg2m  = base64_encode(pack("H*", sha1($V0dtmgmxxnsq))) ; 
    $V3xsptcgzss2dent    = ($Vcki4t4qmybshis->DKIM_identity == '')? '' : " i=" . $Vcki4t4qmybshis->DKIM_identity . ";";
    $Vpyep2jckof1 = "DKIM-Signature: v=1; a=" . $V5a4eok05hji . "; q=" . $Vmmjdv2wnp0j . "; l=" . $V3bsnfcvhiyc . "; s=" . $Vcki4t4qmybshis->DKIM_selector . ";\r\n".
                "\tt=" . $Vxsafk40vz0j . "; c=" . $Vnxxpn0djkp1 . ";\r\n".
                "\th=From:To:Subject;\r\n".
                "\td=" . $Vcki4t4qmybshis->DKIM_domain . ";" . $V3xsptcgzss2dent . "\r\n".
                "\tz=$Vnypsd01ojjn\r\n".
                "\t|$Vqjeupemp40q\r\n".
                "\t|$Vujweq34gtl3ubject;\r\n".
                "\tbh=" . $Vr12np2jmg2m . ";\r\n".
                "\tb=";
    $Vqjeupemp40qSign   = $Vcki4t4qmybshis->DKIM_HeaderC($Vnypsd01ojjn_header . "\r\n" . $Vqjeupemp40q_header . "\r\n" . $Vujweq34gtl3ubject_header . "\r\n" . $Vpyep2jckof1);
    $V3gs2caojhwr   = $Vcki4t4qmybshis->DKIM_Sign($Vqjeupemp40qSign);
    return "X-PHPMAILER-DKIM: phpmailer.worxware.com\r\n".$Vpyep2jckof1.$V3gs2caojhwr."\r\n";
  }

  protected function doCallback($Vzxlgwiafilh,$Vqjeupemp40q,$Vyj5o4ip2jf4,$Vav45ikgcg0f,$Vujweq34gtl3ubject,$V0dtmgmxxnsq) {
    if (!empty($Vcki4t4qmybshis->action_function) && function_exists($Vcki4t4qmybshis->action_function)) {
      $V15czabgaos0 = array($Vzxlgwiafilh,$Vqjeupemp40q,$Vyj5o4ip2jf4,$Vav45ikgcg0f,$Vujweq34gtl3ubject,$V0dtmgmxxnsq);
      call_user_func_array($Vcki4t4qmybshis->action_function,$V15czabgaos0);
    }
  }
}

class phpmailerException extends Exception {
  public function errorMessage() {
    $V2bwrjburyufrrorMsg = '<strong>' . $Vcki4t4qmybshis->getMessage() . "</strong><br />\n";
    return $V2bwrjburyufrrorMsg;
  }
}
?>
