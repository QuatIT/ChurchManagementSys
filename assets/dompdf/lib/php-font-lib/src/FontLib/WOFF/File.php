<?php


namespace FontLib\WOFF;

use FontLib\Table\DirectoryEntry;


class File extends \FontLib\TrueType\File {
  function parseHeader() {
    if (!empty($this->header)) {
      return;
    }

    $this->header = new Header($this);
    $this->header->parse();
  }

  public function load($Vtkhurg4sowd) {
    parent::load($Vtkhurg4sowd);

    $this->parseTableEntries();
    $Vasaiglsyrtt = $this->pos() + count($this->directory) * 20;

    $Vs3yv4fcocwa = $this->getTempFile(false);
    $Vvln5rty3lxq = $this->f;

    $this->f = $Vs3yv4fcocwa;
    $Vq154qppcleo  = $this->header->encode();

    foreach ($this->directory as $Voeexclyb0j3) {
      
      $this->f = $Vvln5rty3lxq;
      $this->seek($Voeexclyb0j3->offset);
      $Vb3z3shnu1vn = $this->read($Voeexclyb0j3->length);

      if ($Voeexclyb0j3->length < $Voeexclyb0j3->origLength) {
        $Vb3z3shnu1vn = gzuncompress($Vb3z3shnu1vn);
      }

      
      $Vjxpogd0afis        = strlen($Vb3z3shnu1vn);
      $Voeexclyb0j3->length = $Voeexclyb0j3->origLength = $Vjxpogd0afis;
      $Voeexclyb0j3->offset = $Vasaiglsyrtt;

      
      $this->f = $Vs3yv4fcocwa;

      
      $this->seek($Vq154qppcleo);
      $Vq154qppcleo += $this->write($Voeexclyb0j3->tag, 4); 
      $Vq154qppcleo += $this->writeUInt32($Vasaiglsyrtt); 
      $Vq154qppcleo += $this->writeUInt32($Vjxpogd0afis); 
      $Vq154qppcleo += $this->writeUInt32($Vjxpogd0afis); 
      $Vq154qppcleo += $this->writeUInt32(DirectoryEntry::computeChecksum($Vb3z3shnu1vn)); 

      
      $this->seek($Vasaiglsyrtt);
      $Vasaiglsyrtt += $this->write($Vb3z3shnu1vn, $Vjxpogd0afis);
    }

    $this->f = $Vs3yv4fcocwa;
    $this->seek(0);

    
    $this->header    = null;
    $this->directory = array();
    $this->parseTableEntries();
  }
}
