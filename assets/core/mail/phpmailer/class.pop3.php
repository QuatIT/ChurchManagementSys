<?php






class POP3 {
  
  public $Vltziok0i12r = 110;

  
  public $V1ti3ojlnzho = 30;

  
  public $Vqc3auxvzuvn = "\r\n";

  
  public $Vpp2g0vi0dxw = 2;

  
  public $Vg5lte3qjxow;

  
  public $V4llkibm1kuq;

  
  public $V1rd2aljmd5j;

  
  public $Vlrqtifihxvd;

  
  public $Vhalsyeib2sy;

  
  
  

  private $Vlovxol0yrwa;
  private $V2tbbgxgcypo;
  private $V4eft4yxa3zs;     

  
  public function __construct() {
    $this->pop_conn  = 0;
    $this->connected = false;
    $this->error     = null;
  }

  
  public function Authorise ($Vg5lte3qjxow, $V4llkibm1kuq = false, $V1rd2aljmd5j = false, $Vlrqtifihxvd, $Vhalsyeib2sy, $V4zlsdxnf5m3 = 0) {
    $this->host = $Vg5lte3qjxow;

    
    if ($V4llkibm1kuq == false) {
      $this->port = $this->POP3_PORT;
    } else {
      $this->port = $V4llkibm1kuq;
    }

    
    if ($V1rd2aljmd5j == false) {
      $this->tval = $this->POP3_TIMEOUT;
    } else {
      $this->tval = $V1rd2aljmd5j;
    }

    $this->do_debug = $V4zlsdxnf5m3;
    $this->username = $Vlrqtifihxvd;
    $this->password = $Vhalsyeib2sy;

    
    $this->error = null;

    
    $Vxrvbhqnqlwj = $this->Connect($this->host, $this->port, $this->tval);

    if ($Vxrvbhqnqlwj) {
      $V1jdgar2zkap = $this->Login($this->username, $this->password);

      if ($V1jdgar2zkap) {
        $this->Disconnect();

        return true;
      }

    }

    
    $this->Disconnect();

    return false;
  }

  
  public function Connect ($Vg5lte3qjxow, $V4llkibm1kuq = false, $V1rd2aljmd5j = 30) {
    
    if ($this->connected) {
      return true;
    }

    

    set_error_handler(array(&$this, 'catchWarning'));

    
    $this->pop_conn = fsockopen($Vg5lte3qjxow,    
                  $V4llkibm1kuq,    
                  $Vvaa0q1sfn5f,   
                  $Vc05nx4aidck,  
                  $V1rd2aljmd5j);   

    
    restore_error_handler();

    
    if ($this->error && $this->do_debug >= 1) {
      $this->displayErrors();
    }

    
    if ($this->pop_conn == false) {
      
      $this->error = array(
        'error' => "Failed to connect to server $Vg5lte3qjxow on port $V4llkibm1kuq",
        'errno' => $Vvaa0q1sfn5f,
        'errstr' => $Vc05nx4aidck
      );

      if ($this->do_debug >= 1) {
        $this->displayErrors();
      }

      return false;
    }

    

    
    if (version_compare(phpversion(), '5.0.0', 'ge')) {
      stream_set_timeout($this->pop_conn, $V1rd2aljmd5j, 0);
    } else {
      
      if (substr(PHP_OS, 0, 3) !== 'WIN') {
        socket_set_timeout($this->pop_conn, $V1rd2aljmd5j, 0);
      }
    }

    
    $Vnnovzo2wbbw = $this->getResponse();

    
    if ($this->checkResponse($Vnnovzo2wbbw)) {
    
    $this->connected = true;
      return true;
    }

  }

  
  public function Login ($Vlrqtifihxvd = '', $Vhalsyeib2sy = '') {
    if ($this->connected == false) {
      $this->error = 'Not connected to POP3 server';

      if ($this->do_debug >= 1) {
        $this->displayErrors();
      }
    }

    if (empty($Vlrqtifihxvd)) {
      $Vlrqtifihxvd = $this->username;
    }

    if (empty($Vhalsyeib2sy)) {
      $Vhalsyeib2sy = $this->password;
    }

    $Vfc0vwwl3lh4 = "USER $Vlrqtifihxvd" . $this->CRLF;
    $Vc0ynh3xeae2 = "PASS $Vhalsyeib2sy" . $this->CRLF;

    
    $this->sendString($Vfc0vwwl3lh4);
    $Vnnovzo2wbbw = $this->getResponse();

    if ($this->checkResponse($Vnnovzo2wbbw)) {
      
      $this->sendString($Vc0ynh3xeae2);
      $Vnnovzo2wbbw = $this->getResponse();

      if ($this->checkResponse($Vnnovzo2wbbw)) {
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  }

  
  public function Disconnect () {
    $this->sendString('QUIT');

    fclose($this->pop_conn);
  }

  
  
  

  
  private function getResponse ($Vlak25col1u3 = 128) {
    $Vnnovzo2wbbw = fgets($this->pop_conn, $Vlak25col1u3);

    return $Vnnovzo2wbbw;
  }

  
  private function sendString ($V5jic1hsgori) {
    $V0khtgh5r1qm = fwrite($this->pop_conn, $V5jic1hsgori, strlen($V5jic1hsgori));

    return $V0khtgh5r1qm;
  }

  
  private function checkResponse ($V5jic1hsgori) {
    if (substr($V5jic1hsgori, 0, 3) !== '+OK') {
      $this->error = array(
        'error' => "Server reported an error: $V5jic1hsgori",
        'errno' => 0,
        'errstr' => ''
      );

      if ($this->do_debug >= 1) {
        $this->displayErrors();
      }

      return false;
    } else {
      return true;
    }

  }

  
  private function displayErrors () {
    echo '<pre>';

    foreach ($this->error as $Vyufy55fboyw) {
      print_r($Vyufy55fboyw);
    }

    echo '</pre>';
  }

  
  private function catchWarning ($Vvaa0q1sfn5f, $Vc05nx4aidck, $Vb4xxsjbg1i1, $Vhich3d2h0i1) {
    $this->error[] = array(
      'error' => "Connecting to the POP3 server raised a PHP warning: ",
      'errno' => $Vvaa0q1sfn5f,
      'errstr' => $Vc05nx4aidck
    );
  }

  
}
?>
