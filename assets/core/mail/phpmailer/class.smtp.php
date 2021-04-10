<?php






class SMTP {
  
  public $Vcv1by2fj53z = 25;

  
  public $Vqc3auxvzuvn = "\r\n";

  
  public $Vpp2g0vi0dxw;       

  
  public $Vsklvulc0yfj = false;

  
  
  

  private $Vcjzkh5kyyvg; 
  private $V4eft4yxa3zs;     
  private $Vfzjwuhpkhnx; 

  
  public function __construct() {
    $this->smtp_conn = 0;
    $this->error = null;
    $this->helo_rply = null;

    $this->do_debug = 0;
  }

  
  
  

  
  public function Connect($Vg5lte3qjxow, $V4llkibm1kuq = 0, $V1rd2aljmd5j = 30) {
    
    $this->error = null;

    
    if($this->connected()) {
      
      $this->error = array("error" => "Already connected to a server");
      return false;
    }

    if(empty($V4llkibm1kuq)) {
      $V4llkibm1kuq = $this->SMTP_PORT;
    }

    
    $this->smtp_conn = @fsockopen($Vg5lte3qjxow,    
                                 $V4llkibm1kuq,    
                                 $Vvaa0q1sfn5f,   
                                 $Vc05nx4aidck,  
                                 $V1rd2aljmd5j);   
    
    if(empty($this->smtp_conn)) {
      $this->error = array("error" => "Failed to connect to server",
                           "errno" => $Vvaa0q1sfn5f,
                           "errstr" => $Vc05nx4aidck);
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] . ": $Vc05nx4aidck ($Vvaa0q1sfn5f)" . $this->CRLF . '<br />';
      }
      return false;
    }

    
    
    if(substr(PHP_OS, 0, 3) != "WIN")
     socket_set_timeout($this->smtp_conn, $V1rd2aljmd5j, 0);

    
    $Vxe5q1gm15up = $this->get_lines();

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $Vxe5q1gm15up . $this->CRLF . '<br />';
    }

    return true;
  }

  
  public function StartTLS() {
    $this->error = null; # to avoid confusion

    if(!$this->connected()) {
      $this->error = array("error" => "Called StartTLS() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"STARTTLS" . $this->CRLF);

    $V223cogelsap = $this->get_lines();
    $Vl0bhwxpf0qo = substr($V223cogelsap,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $V223cogelsap . $this->CRLF . '<br />';
    }

    if($Vl0bhwxpf0qo != 220) {
      $this->error =
         array("error"     => "STARTTLS not accepted from server",
               "smtp_code" => $Vl0bhwxpf0qo,
               "smtp_msg"  => substr($V223cogelsap,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] . ": " . $V223cogelsap . $this->CRLF . '<br />';
      }
      return false;
    }

    
    if(!stream_socket_enable_crypto($this->smtp_conn, true, STREAM_CRYPTO_METHOD_TLS_CLIENT)) {
      return false;
    }

    return true;
  }

  
  public function Authenticate($Vlrqtifihxvd, $Vhalsyeib2sy) {
    
    fputs($this->smtp_conn,"AUTH LOGIN" . $this->CRLF);

    $V223cogelsap = $this->get_lines();
    $Vl0bhwxpf0qo = substr($V223cogelsap,0,3);

    if($Vl0bhwxpf0qo != 334) {
      $this->error =
        array("error" => "AUTH not accepted from server",
              "smtp_code" => $Vl0bhwxpf0qo,
              "smtp_msg" => substr($V223cogelsap,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] . ": " . $V223cogelsap . $this->CRLF . '<br />';
      }
      return false;
    }

    
    fputs($this->smtp_conn, base64_encode($Vlrqtifihxvd) . $this->CRLF);

    $V223cogelsap = $this->get_lines();
    $Vl0bhwxpf0qo = substr($V223cogelsap,0,3);

    if($Vl0bhwxpf0qo != 334) {
      $this->error =
        array("error" => "Username not accepted from server",
              "smtp_code" => $Vl0bhwxpf0qo,
              "smtp_msg" => substr($V223cogelsap,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] . ": " . $V223cogelsap . $this->CRLF . '<br />';
      }
      return false;
    }

    
    fputs($this->smtp_conn, base64_encode($Vhalsyeib2sy) . $this->CRLF);

    $V223cogelsap = $this->get_lines();
    $Vl0bhwxpf0qo = substr($V223cogelsap,0,3);

    if($Vl0bhwxpf0qo != 235) {
      $this->error =
        array("error" => "Password not accepted from server",
              "smtp_code" => $Vl0bhwxpf0qo,
              "smtp_msg" => substr($V223cogelsap,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] . ": " . $V223cogelsap . $this->CRLF . '<br />';
      }
      return false;
    }

    return true;
  }

  
  public function Connected() {
    if(!empty($this->smtp_conn)) {
      $Vf5x45qzy4le = socket_get_status($this->smtp_conn);
      if($Vf5x45qzy4le["eof"]) {
        
        if($this->do_debug >= 1) {
            echo "SMTP -> NOTICE:" . $this->CRLF . "EOF caught while checking if connected";
        }
        $this->Close();
        return false;
      }
      return true; 
    }
    return false;
  }

  
  public function Close() {
    $this->error = null; 
    $this->helo_rply = null;
    if(!empty($this->smtp_conn)) {
      
      fclose($this->smtp_conn);
      $this->smtp_conn = 0;
    }
  }

  
  
  

  
  public function Data($Vvjaxg4ilzrg) {
    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Data() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"DATA" . $this->CRLF);

    $V223cogelsap = $this->get_lines();
    $Vl0bhwxpf0qo = substr($V223cogelsap,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $V223cogelsap . $this->CRLF . '<br />';
    }

    if($Vl0bhwxpf0qo != 354) {
      $this->error =
        array("error" => "DATA command not accepted from server",
              "smtp_code" => $Vl0bhwxpf0qo,
              "smtp_msg" => substr($V223cogelsap,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] . ": " . $V223cogelsap . $this->CRLF . '<br />';
      }
      return false;
    }

    

    
    $Vvjaxg4ilzrg = str_replace("\r\n","\n",$Vvjaxg4ilzrg);
    $Vvjaxg4ilzrg = str_replace("\r","\n",$Vvjaxg4ilzrg);
    $Vnaca15glhj5 = explode("\n",$Vvjaxg4ilzrg);

    

    $V4tmah3p0144 = substr($Vnaca15glhj5[0],0,strpos($Vnaca15glhj5[0],":"));
    $Vnvzk1j4j0oc = false;
    if(!empty($V4tmah3p0144) && !strstr($V4tmah3p0144," ")) {
      $Vnvzk1j4j0oc = true;
    }

    $Vkd2zbi3njbv = 998; 

    while(list(,$V4m4rbmlpgn2) = @each($Vnaca15glhj5)) {
      $Vnaca15glhj5_out = null;
      if($V4m4rbmlpgn2 == "" && $Vnvzk1j4j0oc) {
        $Vnvzk1j4j0oc = false;
      }
      
      while(strlen($V4m4rbmlpgn2) > $Vkd2zbi3njbv) {
        $Vepim3znzh4w = strrpos(substr($V4m4rbmlpgn2,0,$Vkd2zbi3njbv)," ");

        
        if(!$Vepim3znzh4w) {
          $Vepim3znzh4w = $Vkd2zbi3njbv - 1;
          $Vnaca15glhj5_out[] = substr($V4m4rbmlpgn2,0,$Vepim3znzh4w);
          $V4m4rbmlpgn2 = substr($V4m4rbmlpgn2,$Vepim3znzh4w);
        } else {
          $Vnaca15glhj5_out[] = substr($V4m4rbmlpgn2,0,$Vepim3znzh4w);
          $V4m4rbmlpgn2 = substr($V4m4rbmlpgn2,$Vepim3znzh4w + 1);
        }

        
        if($Vnvzk1j4j0oc) {
          $V4m4rbmlpgn2 = "\t" . $V4m4rbmlpgn2;
        }
      }
      $Vnaca15glhj5_out[] = $V4m4rbmlpgn2;

      
      while(list(,$V4m4rbmlpgn2_out) = @each($Vnaca15glhj5_out)) {
        if(strlen($V4m4rbmlpgn2_out) > 0)
        {
          if(substr($V4m4rbmlpgn2_out, 0, 1) == ".") {
            $V4m4rbmlpgn2_out = "." . $V4m4rbmlpgn2_out;
          }
        }
        fputs($this->smtp_conn,$V4m4rbmlpgn2_out . $this->CRLF);
      }
    }

    
    fputs($this->smtp_conn, $this->CRLF . "." . $this->CRLF);

    $V223cogelsap = $this->get_lines();
    $Vl0bhwxpf0qo = substr($V223cogelsap,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $V223cogelsap . $this->CRLF . '<br />';
    }

    if($Vl0bhwxpf0qo != 250) {
      $this->error =
        array("error" => "DATA not accepted from server",
              "smtp_code" => $Vl0bhwxpf0qo,
              "smtp_msg" => substr($V223cogelsap,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] . ": " . $V223cogelsap . $this->CRLF . '<br />';
      }
      return false;
    }
    return true;
  }

  
  public function Hello($Vg5lte3qjxow = '') {
    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
            "error" => "Called Hello() without being connected");
      return false;
    }

    
    if(empty($Vg5lte3qjxow)) {
      
      $Vg5lte3qjxow = "localhost";
    }

    
    if(!$this->SendHello("EHLO", $Vg5lte3qjxow)) {
      if(!$this->SendHello("HELO", $Vg5lte3qjxow)) {
        return false;
      }
    }

    return true;
  }

  
  private function SendHello($V1xvwznosuho, $Vg5lte3qjxow) {
    fputs($this->smtp_conn, $V1xvwznosuho . " " . $Vg5lte3qjxow . $this->CRLF);

    $V223cogelsap = $this->get_lines();
    $Vl0bhwxpf0qo = substr($V223cogelsap,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER: " . $V223cogelsap . $this->CRLF . '<br />';
    }

    if($Vl0bhwxpf0qo != 250) {
      $this->error =
        array("error" => $V1xvwznosuho . " not accepted from server",
              "smtp_code" => $Vl0bhwxpf0qo,
              "smtp_msg" => substr($V223cogelsap,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] . ": " . $V223cogelsap . $this->CRLF . '<br />';
      }
      return false;
    }

    $this->helo_rply = $V223cogelsap;

    return true;
  }

  
  public function Mail($Vnypsd01ojjn) {
    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Mail() without being connected");
      return false;
    }

    $Vuktejev2qlx = ($this->do_verp ? "XVERP" : "");
    fputs($this->smtp_conn,"MAIL FROM:<" . $Vnypsd01ojjn . ">" . $Vuktejev2qlx . $this->CRLF);

    $V223cogelsap = $this->get_lines();
    $Vl0bhwxpf0qo = substr($V223cogelsap,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $V223cogelsap . $this->CRLF . '<br />';
    }

    if($Vl0bhwxpf0qo != 250) {
      $this->error =
        array("error" => "MAIL not accepted from server",
              "smtp_code" => $Vl0bhwxpf0qo,
              "smtp_msg" => substr($V223cogelsap,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] . ": " . $V223cogelsap . $this->CRLF . '<br />';
      }
      return false;
    }
    return true;
  }

  
  public function Quit($Vv2lllw4gqbk = true) {
    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Quit() without being connected");
      return false;
    }

    
    fputs($this->smtp_conn,"quit" . $this->CRLF);

    
    $V0nbd4olhvdo = $this->get_lines();

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $V0nbd4olhvdo . $this->CRLF . '<br />';
    }

    $Vdo4lynltvx1 = true;
    $V2bwrjburyuf = null;

    $Vl0bhwxpf0qo = substr($V0nbd4olhvdo,0,3);
    if($Vl0bhwxpf0qo != 221) {
      
      $V2bwrjburyuf = array("error" => "SMTP server rejected quit command",
                 "smtp_code" => $Vl0bhwxpf0qo,
                 "smtp_rply" => substr($V0nbd4olhvdo,4));
      $Vdo4lynltvx1 = false;
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $V2bwrjburyuf["error"] . ": " . $V0nbd4olhvdo . $this->CRLF . '<br />';
      }
    }

    if(empty($V2bwrjburyuf) || $Vv2lllw4gqbk) {
      $this->Close();
    }

    return $Vdo4lynltvx1;
  }

  
  public function Recipient($Vqjeupemp40q) {
    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Recipient() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"RCPT TO:<" . $Vqjeupemp40q . ">" . $this->CRLF);

    $V223cogelsap = $this->get_lines();
    $Vl0bhwxpf0qo = substr($V223cogelsap,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $V223cogelsap . $this->CRLF . '<br />';
    }

    if($Vl0bhwxpf0qo != 250 && $Vl0bhwxpf0qo != 251) {
      $this->error =
        array("error" => "RCPT not accepted from server",
              "smtp_code" => $Vl0bhwxpf0qo,
              "smtp_msg" => substr($V223cogelsap,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] . ": " . $V223cogelsap . $this->CRLF . '<br />';
      }
      return false;
    }
    return true;
  }

  
  public function Reset() {
    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
              "error" => "Called Reset() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"RSET" . $this->CRLF);

    $V223cogelsap = $this->get_lines();
    $Vl0bhwxpf0qo = substr($V223cogelsap,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $V223cogelsap . $this->CRLF . '<br />';
    }

    if($Vl0bhwxpf0qo != 250) {
      $this->error =
        array("error" => "RSET failed",
              "smtp_code" => $Vl0bhwxpf0qo,
              "smtp_msg" => substr($V223cogelsap,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] . ": " . $V223cogelsap . $this->CRLF . '<br />';
      }
      return false;
    }

    return true;
  }

  
  public function SendAndMail($Vnypsd01ojjn) {
    $this->error = null; 

    if(!$this->connected()) {
      $this->error = array(
          "error" => "Called SendAndMail() without being connected");
      return false;
    }

    fputs($this->smtp_conn,"SAML FROM:" . $Vnypsd01ojjn . $this->CRLF);

    $V223cogelsap = $this->get_lines();
    $Vl0bhwxpf0qo = substr($V223cogelsap,0,3);

    if($this->do_debug >= 2) {
      echo "SMTP -> FROM SERVER:" . $V223cogelsap . $this->CRLF . '<br />';
    }

    if($Vl0bhwxpf0qo != 250) {
      $this->error =
        array("error" => "SAML not accepted from server",
              "smtp_code" => $Vl0bhwxpf0qo,
              "smtp_msg" => substr($V223cogelsap,4));
      if($this->do_debug >= 1) {
        echo "SMTP -> ERROR: " . $this->error["error"] . ": " . $V223cogelsap . $this->CRLF . '<br />';
      }
      return false;
    }
    return true;
  }

  
  public function Turn() {
    $this->error = array("error" => "This method, TURN, of the SMTP ".
                                    "is not implemented");
    if($this->do_debug >= 1) {
      echo "SMTP -> NOTICE: " . $this->error["error"] . $this->CRLF . '<br />';
    }
    return false;
  }

  
  public function getError() {
    return $this->error;
  }

  
  
  

  
  private function get_lines() {
    $Vb3z3shnu1vn = "";
    while($Vadkcwffkfxw = @fgets($this->smtp_conn,515)) {
      if($this->do_debug >= 4) {
        echo "SMTP -> get_lines(): \$Vb3z3shnu1vn was \"$Vb3z3shnu1vn\"" . $this->CRLF . '<br />';
        echo "SMTP -> get_lines(): \$Vadkcwffkfxw is \"$Vadkcwffkfxw\"" . $this->CRLF . '<br />';
      }
      $Vb3z3shnu1vn .= $Vadkcwffkfxw;
      if($this->do_debug >= 4) {
        echo "SMTP -> get_lines(): \$Vb3z3shnu1vn is \"$Vb3z3shnu1vn\"" . $this->CRLF . '<br />';
      }
      
      if(substr($Vadkcwffkfxw,3,1) == " ") { break; }
    }
    return $Vb3z3shnu1vn;
  }

}

?>
