<?php


namespace FontLib\Table\Type;
use FontLib\Table\Table;


class hmtx extends Table {
  protected function _parse() {
    $V3h4z3hxorxj   = $this->getFont();
    $Vq154qppcleo = $V3h4z3hxorxj->pos();

    $Vpx51lkre0pp = $V3h4z3hxorxj->getData("hhea", "numOfLongHorMetrics");
    $Vtvgyzy3yyq2           = $V3h4z3hxorxj->getData("maxp", "numGlyphs");

    $V3h4z3hxorxj->seek($Vq154qppcleo);

    $Vb3z3shnu1vn = array();
    $Vpti5mkeztqq = $V3h4z3hxorxj->readUInt16Many($Vpx51lkre0pp * 2);
    for ($Vmfzzxc0mebw = 0, $Vd000gvtsti2 = 0; $Vmfzzxc0mebw < $Vpx51lkre0pp; $Vmfzzxc0mebw++) {
      $Vx42vruwy53v    = isset($Vpti5mkeztqq[$Vd000gvtsti2]) ? $Vpti5mkeztqq[$Vd000gvtsti2] : 0;
      $Vd000gvtsti2 += 1;
      $Vqxsv2fi3vyk = isset($Vpti5mkeztqq[$Vd000gvtsti2]) ? $Vpti5mkeztqq[$Vd000gvtsti2] : 0;
      $Vd000gvtsti2 += 1;
      $Vb3z3shnu1vn[$Vmfzzxc0mebw]      = array($Vx42vruwy53v, $Vqxsv2fi3vyk);
    }

    if ($Vpx51lkre0pp < $Vtvgyzy3yyq2) {
      $Vxwkk0tlwy0y = end($Vb3z3shnu1vn);
      $Vb3z3shnu1vn      = array_pad($Vb3z3shnu1vn, $Vtvgyzy3yyq2, $Vxwkk0tlwy0y);
    }

    $this->data = $Vb3z3shnu1vn;
  }

  protected function _encode() {
    $V3h4z3hxorxj   = $this->getFont();
    $V2nxahdpg1do = $V3h4z3hxorxj->getSubset();
    $Vb3z3shnu1vn   = $this->data;

    $Vjxpogd0afis = 0;

    foreach ($V2nxahdpg1do as $Vmfzzxc0mebw) {
      $Vjxpogd0afis += $V3h4z3hxorxj->writeUInt16($Vb3z3shnu1vn[$Vmfzzxc0mebw][0]);
      $Vjxpogd0afis += $V3h4z3hxorxj->writeUInt16($Vb3z3shnu1vn[$Vmfzzxc0mebw][1]);
    }

    return $Vjxpogd0afis;
  }
}
