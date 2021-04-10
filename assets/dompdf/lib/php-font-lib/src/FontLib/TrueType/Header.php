<?php


namespace FontLib\TrueType;


class Header extends \FontLib\Header {
  protected $Vfztuniizpxp = array(
    "format"        => self::uint32,
    "numTables"     => self::uint16,
    "searchRange"   => self::uint16,
    "entrySelector" => self::uint16,
    "rangeShift"    => self::uint16,
  );

  public function parse() {
    parent::parse();

    $Vmo4m3qpgbol                   = $this->data["format"];
    $this->data["formatText"] = $this->convertUInt32ToStr($Vmo4m3qpgbol);
  }
}
