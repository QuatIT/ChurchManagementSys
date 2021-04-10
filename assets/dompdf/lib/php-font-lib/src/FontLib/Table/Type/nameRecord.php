<?php

namespace FontLib\Table\Type;

use FontLib\Font;
use FontLib\BinaryStream;


class nameRecord extends BinaryStream {
  public $Vkxeseczumej;
  public $V0tv3hdxb22c;
  public $Vwocn1oopkrp;
  public $Vw4qj1nq5cez;
  public $Vjxpogd0afis;
  public $Vq154qppcleo;
  public $V5jic1hsgori;

  public static $Vmo4m3qpgbol = array(
    "platformID"         => self::uint16,
    "platformSpecificID" => self::uint16,
    "languageID"         => self::uint16,
    "nameID"             => self::uint16,
    "length"             => self::uint16,
    "offset"             => self::uint16,
  );

  public function map($Vb3z3shnu1vn) {
    foreach ($Vb3z3shnu1vn as $Vqwhzgethmgj => $Vqfra35f14fv) {
      $this->$Vqwhzgethmgj = $Vqfra35f14fv;
    }
  }

  public function getUTF8() {
    return $this->string;
  }

  public function getUTF16() {
    return Font::UTF8ToUTF16($this->string);
  }

  function __toString() {
    return $this->string;
  }
}
