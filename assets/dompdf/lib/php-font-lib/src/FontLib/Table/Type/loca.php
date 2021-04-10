<?php


namespace FontLib\Table\Type;
use FontLib\Table\Table;


class loca extends Table {
  protected function _parse() {
    $V3h4z3hxorxj   = $this->getFont();
    $Vq154qppcleo = $V3h4z3hxorxj->pos();

    $Vojpf41wfceg = $V3h4z3hxorxj->getData("head", "indexToLocFormat");
    $Vtvgyzy3yyq2        = $V3h4z3hxorxj->getData("maxp", "numGlyphs");

    $V3h4z3hxorxj->seek($Vq154qppcleo);

    $Vb3z3shnu1vn = array();

    
    if ($Vojpf41wfceg == 0) {
      $Vcyg5xmwfpxo   = $V3h4z3hxorxj->read(($Vtvgyzy3yyq2 + 1) * 2);
      $V2bnxagb2ztu = unpack("n*", $Vcyg5xmwfpxo);

      for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 <= $Vtvgyzy3yyq2; $V3xsptcgzss2++) {
        $Vb3z3shnu1vn[] = isset($V2bnxagb2ztu[$V3xsptcgzss2 + 1]) ?  $V2bnxagb2ztu[$V3xsptcgzss2 + 1] * 2 : 0;
      }
    }

    
    else {
      if ($Vojpf41wfceg == 1) {
        $Vcyg5xmwfpxo   = $V3h4z3hxorxj->read(($Vtvgyzy3yyq2 + 1) * 4);
        $V2bnxagb2ztu = unpack("N*", $Vcyg5xmwfpxo);

        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 <= $Vtvgyzy3yyq2; $V3xsptcgzss2++) {
          $Vb3z3shnu1vn[] = isset($V2bnxagb2ztu[$V3xsptcgzss2 + 1]) ? $V2bnxagb2ztu[$V3xsptcgzss2 + 1] : 0;
        }
      }
    }

    $this->data = $Vb3z3shnu1vn;
  }

  function _encode() {
    $V3h4z3hxorxj = $this->getFont();
    $Vb3z3shnu1vn = $this->data;

    $Vojpf41wfceg = $V3h4z3hxorxj->getData("head", "indexToLocFormat");
    $Vtvgyzy3yyq2        = $V3h4z3hxorxj->getData("maxp", "numGlyphs");
    $Vjxpogd0afis           = 0;

    
    if ($Vojpf41wfceg == 0) {
      for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 <= $Vtvgyzy3yyq2; $V3xsptcgzss2++) {
        $Vjxpogd0afis += $V3h4z3hxorxj->writeUInt16($Vb3z3shnu1vn[$V3xsptcgzss2] / 2);
      }
    }

    
    else {
      if ($Vojpf41wfceg == 1) {
        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 <= $Vtvgyzy3yyq2; $V3xsptcgzss2++) {
          $Vjxpogd0afis += $V3h4z3hxorxj->writeUInt32($Vb3z3shnu1vn[$V3xsptcgzss2]);
        }
      }
    }

    return $Vjxpogd0afis;
  }
}
