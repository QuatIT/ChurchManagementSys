<?php


namespace FontLib\Table\Type;
use FontLib\Table\Table;


class kern extends Table {
  protected function _parse() {
    $V3h4z3hxorxj = $this->getFont();

    $Vb3z3shnu1vn = $V3h4z3hxorxj->unpack(array(
      "version"         => self::uint16,
      "nTables"         => self::uint16,

      
      "subtableVersion" => self::uint16,
      "length"          => self::uint16,
      "coverage"        => self::uint16,
    ));

    $Vb3z3shnu1vn["format"] = ($Vb3z3shnu1vn["coverage"] >> 8);

    $Veqbujijlzvr = array();

    switch ($Vb3z3shnu1vn["format"]) {
      case 0:
        $Veqbujijlzvr = $V3h4z3hxorxj->unpack(array(
          "nPairs"        => self::uint16,
          "searchRange"   => self::uint16,
          "entrySelector" => self::uint16,
          "rangeShift"    => self::uint16,
        ));

        $Vj2u3lnf5bq0 = array();
        $Vk50pfxtkvxy  = array();

        $V1vmg10tttdn = $V3h4z3hxorxj->readUInt16Many($Veqbujijlzvr["nPairs"] * 3);
        for ($V3xsptcgzss2 = 0, $V3xsptcgzss2dx = 0; $V3xsptcgzss2 < $Veqbujijlzvr["nPairs"]; $V3xsptcgzss2++) {
          $V0opnfka0og1  = $V1vmg10tttdn[$V3xsptcgzss2dx++];
          $Vqemi0kebtld = $V1vmg10tttdn[$V3xsptcgzss2dx++];
          $Vqfra35f14fv = $V1vmg10tttdn[$V3xsptcgzss2dx++];

          if ($Vqfra35f14fv >= 0x8000) {
            $Vqfra35f14fv -= 0x10000;
          }

          $Vj2u3lnf5bq0[] = array(
            "left"  => $V0opnfka0og1,
            "right" => $Vqemi0kebtld,
            "value" => $Vqfra35f14fv,
          );

          $Vk50pfxtkvxy[$V0opnfka0og1][$Vqemi0kebtld] = $Vqfra35f14fv;
        }

        
        $Veqbujijlzvr["tree"] = $Vk50pfxtkvxy;
        break;

      case 1:
      case 2:
      case 3:
        break;
    }

    $Vb3z3shnu1vn["subtable"] = $Veqbujijlzvr;

    $this->data = $Vb3z3shnu1vn;
  }
}
