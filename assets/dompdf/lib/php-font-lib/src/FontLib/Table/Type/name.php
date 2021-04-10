<?php


namespace FontLib\Table\Type;

use FontLib\Table\Table;
use FontLib\Font;


class name extends Table {
  private static $Vealq5l1kacr = array(
    "format"       => self::uint16,
    "count"        => self::uint16,
    "stringOffset" => self::uint16,
  );

  const NAME_COPYRIGHT          = 0;
  const NAME_NAME               = 1;
  const NAME_SUBFAMILY          = 2;
  const NAME_SUBFAMILY_ID       = 3;
  const NAME_FULL_NAME          = 4;
  const NAME_VERSION            = 5;
  const NAME_POSTSCRIPT_NAME    = 6;
  const NAME_TRADEMARK          = 7;
  const NAME_MANUFACTURER       = 8;
  const NAME_DESIGNER           = 9;
  const NAME_DESCRIPTION        = 10;
  const NAME_VENDOR_URL         = 11;
  const NAME_DESIGNER_URL       = 12;
  const NAME_LICENSE            = 13;
  const NAME_LICENSE_URL        = 14;
  const NAME_PREFERRE_FAMILY    = 16;
  const NAME_PREFERRE_SUBFAMILY = 17;
  const NAME_COMPAT_FULL_NAME   = 18;
  const NAME_SAMPLE_TEXT        = 19;

  static $Vozxotfbbbyv = array(
    0  => "Copyright",
    1  => "FontName",
    2  => "FontSubfamily",
    3  => "UniqueID",
    4  => "FullName",
    5  => "Version",
    6  => "PostScriptName",
    7  => "Trademark",
    8  => "Manufacturer",
    9  => "Designer",
    10 => "Description",
    11 => "FontVendorURL",
    12 => "FontDesignerURL",
    13 => "LicenseDescription",
    14 => "LicenseURL",
    
    16 => "PreferredFamily",
    17 => "PreferredSubfamily",
    18 => "CompatibleFullName",
    19 => "SampleText",
  );

  static $Vjklpl0oehsi = array(
    0 => "Unicode",
    1 => "Macintosh",
    
    3 => "Microsoft",
  );

  static $Vkl5fhmqb4ku = array(
    
    0 => array(
      0 => "Default semantics",
      1 => "Version 1.1 semantics",
      2 => "ISO 10646 1993 semantics (deprecated)",
      3 => "Unicode 2.0 or later semantics",
    ),

    
    1 => array(
      0  => "Roman",
      1  => "Japanese",
      2  => "Traditional Chinese",
      3  => "Korean",
      4  => "Arabic",
      5  => "Hebrew",
      6  => "Greek",
      7  => "Russian",
      8  => "RSymbol",
      9  => "Devanagari",
      10 => "Gurmukhi",
      11 => "Gujarati",
      12 => "Oriya",
      13 => "Bengali",
      14 => "Tamil",
      15 => "Telugu",
      16 => "Kannada",
      17 => "Malayalam",
      18 => "Sinhalese",
      19 => "Burmese",
      20 => "Khmer",
      21 => "Thai",
      22 => "Laotian",
      23 => "Georgian",
      24 => "Armenian",
      25 => "Simplified Chinese",
      26 => "Tibetan",
      27 => "Mongolian",
      28 => "Geez",
      29 => "Slavic",
      30 => "Vietnamese",
      31 => "Sindhi",
    ),

    
    3 => array(
      0  => "Symbol",
      1  => "Unicode BMP (UCS-2)",
      2  => "ShiftJIS",
      3  => "PRC",
      4  => "Big5",
      5  => "Wansung",
      6  => "Johab",
      
      
      
      10 => "Unicode UCS-4",
    ),
  );

  protected function _parse() {
    $V3h4z3hxorxj = $this->getFont();

    $V0i4v30hinuk = $V3h4z3hxorxj->pos();

    $Vb3z3shnu1vn = $V3h4z3hxorxj->unpack(self::$Vealq5l1kacr);

    $Vmmlhdr3tkee = array();
    for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vb3z3shnu1vn["count"]; $V3xsptcgzss2++) {
      $V44pmqzlwgvb      = new nameRecord();
      $V44pmqzlwgvb_data = $V3h4z3hxorxj->unpack(nameRecord::$Vmo4m3qpgbol);
      $V44pmqzlwgvb->map($V44pmqzlwgvb_data);

      $Vmmlhdr3tkee[] = $V44pmqzlwgvb;
    }

    $Vxqsydi5pak0 = array();
    foreach ($Vmmlhdr3tkee as $V44pmqzlwgvb) {
      $V3h4z3hxorxj->seek($V0i4v30hinuk + $Vb3z3shnu1vn["stringOffset"] + $V44pmqzlwgvb->offset);
      $Vujweq34gtl3                      = $V3h4z3hxorxj->read($V44pmqzlwgvb->length);
      $V44pmqzlwgvb->string         = Font::UTF16ToUTF8($Vujweq34gtl3);
      $Vxqsydi5pak0[$V44pmqzlwgvb->nameID] = $V44pmqzlwgvb;
    }

    $Vb3z3shnu1vn["records"] = $Vxqsydi5pak0;

    $this->data = $Vb3z3shnu1vn;
  }

  protected function _encode() {
    $V3h4z3hxorxj = $this->getFont();

    
    $Vmmlhdr3tkee       = $this->data["records"];
    $Vjgi2mm5c1dw = count($Vmmlhdr3tkee);

    $this->data["count"]        = $Vjgi2mm5c1dw;
    $this->data["stringOffset"] = 6 + $Vjgi2mm5c1dw * 12; 

    $Vjxpogd0afis = $V3h4z3hxorxj->pack(self::$Vealq5l1kacr, $this->data);

    $Vq154qppcleo = 0;
    foreach ($Vmmlhdr3tkee as $V44pmqzlwgvb) {
      $V44pmqzlwgvb->length = mb_strlen($V44pmqzlwgvb->getUTF16(), "8bit");
      $V44pmqzlwgvb->offset = $Vq154qppcleo;
      $Vq154qppcleo += $V44pmqzlwgvb->length;
      $Vjxpogd0afis += $V3h4z3hxorxj->pack(nameRecord::$Vmo4m3qpgbol, (array)$V44pmqzlwgvb);
    }

    foreach ($Vmmlhdr3tkee as $V44pmqzlwgvb) {
      $Vujweq34gtl3tr = $V44pmqzlwgvb->getUTF16();
      $Vjxpogd0afis += $V3h4z3hxorxj->write($Vujweq34gtl3tr, mb_strlen($Vujweq34gtl3tr, "8bit"));
    }

    return $Vjxpogd0afis;
  }
}
