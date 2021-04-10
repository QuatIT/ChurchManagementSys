<?php


namespace FontLib\TrueType;

use FontLib\AdobeFontMetrics;
use FontLib\Font;
use FontLib\BinaryStream;
use FontLib\Table\Table;
use FontLib\Table\DirectoryEntry;
use FontLib\Table\Type\glyf;
use FontLib\Table\Type\name;
use FontLib\Table\Type\nameRecord;


class File extends BinaryStream {
  
  public $Vbcafeycvjtp = array();

  private $V0i4v30hinuk = 0; 

  private static $Vogke1dtifpg = false;

  protected $Vbyfroljvzlq = array();
  protected $Vb3z3shnu1vn = array();

  protected $Vtum53y0clq2 = array();

  public $Vscdcke3r22s = array();

  static $Vr5spanzdhzp = array(
    ".notdef", ".null", "CR",
    "space", "exclam", "quotedbl", "numbersign",
    "dollar", "percent", "ampersand", "quotesingle",
    "parenleft", "parenright", "asterisk", "plus",
    "comma", "hyphen", "period", "slash",
    "zero", "one", "two", "three",
    "four", "five", "six", "seven",
    "eight", "nine", "colon", "semicolon",
    "less", "equal", "greater", "question",
    "at", "A", "B", "C", "D", "E", "F", "G",
    "H", "I", "J", "K", "L", "M", "N", "O",
    "P", "Q", "R", "S", "T", "U", "V", "W",
    "X", "Y", "Z", "bracketleft",
    "backslash", "bracketright", "asciicircum", "underscore",
    "grave", "a", "b", "c", "d", "e", "f", "g",
    "h", "i", "j", "k", "l", "m", "n", "o",
    "p", "q", "r", "s", "t", "u", "v", "w",
    "x", "y", "z", "braceleft",
    "bar", "braceright", "asciitilde", "Adieresis",
    "Aring", "Ccedilla", "Eacute", "Ntilde",
    "Odieresis", "Udieresis", "aacute", "agrave",
    "acircumflex", "adieresis", "atilde", "aring",
    "ccedilla", "eacute", "egrave", "ecircumflex",
    "edieresis", "iacute", "igrave", "icircumflex",
    "idieresis", "ntilde", "oacute", "ograve",
    "ocircumflex", "odieresis", "otilde", "uacute",
    "ugrave", "ucircumflex", "udieresis", "dagger",
    "degree", "cent", "sterling", "section",
    "bullet", "paragraph", "germandbls", "registered",
    "copyright", "trademark", "acute", "dieresis",
    "notequal", "AE", "Oslash", "infinity",
    "plusminus", "lessequal", "greaterequal", "yen",
    "mu", "partialdiff", "summation", "product",
    "pi", "integral", "ordfeminine", "ordmasculine",
    "Omega", "ae", "oslash", "questiondown",
    "exclamdown", "logicalnot", "radical", "florin",
    "approxequal", "increment", "guillemotleft", "guillemotright",
    "ellipsis", "nbspace", "Agrave", "Atilde",
    "Otilde", "OE", "oe", "endash",
    "emdash", "quotedblleft", "quotedblright", "quoteleft",
    "quoteright", "divide", "lozenge", "ydieresis",
    "Ydieresis", "fraction", "currency", "guilsinglleft",
    "guilsinglright", "fi", "fl", "daggerdbl",
    "periodcentered", "quotesinglbase", "quotedblbase", "perthousand",
    "Acircumflex", "Ecircumflex", "Aacute", "Edieresis",
    "Egrave", "Iacute", "Icircumflex", "Idieresis",
    "Igrave", "Oacute", "Ocircumflex", "applelogo",
    "Ograve", "Uacute", "Ucircumflex", "Ugrave",
    "dotlessi", "circumflex", "tilde", "macron",
    "breve", "dotaccent", "ring", "cedilla",
    "hungarumlaut", "ogonek", "caron", "Lslash",
    "lslash", "Scaron", "scaron", "Zcaron",
    "zcaron", "brokenbar", "Eth", "eth",
    "Yacute", "yacute", "Thorn", "thorn",
    "minus", "multiply", "onesuperior", "twosuperior",
    "threesuperior", "onehalf", "onequarter", "threequarters",
    "franc", "Gbreve", "gbreve", "Idot",
    "Scedilla", "scedilla", "Cacute", "cacute",
    "Ccaron", "ccaron", "dmacron"
  );

  function getTable() {
    $this->parseTableEntries();

    return $this->directory;
  }

  function setTableOffset($Vq154qppcleo) {
    $this->tableOffset = $Vq154qppcleo;
  }

  function parse() {
    $this->parseTableEntries();

    $this->data = array();

    foreach ($this->directory as $Vudn5fb5ck4i => $Vahqmfi4rdgw) {
      if (empty($this->data[$Vudn5fb5ck4i])) {
        $this->readTable($Vudn5fb5ck4i);
      }
    }
  }

  function utf8toUnicode($Vadkcwffkfxw) {
    $V1st2w4mm2ug = strlen($Vadkcwffkfxw);
    $Vpu0eaxrabtr = array();

    for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $V1st2w4mm2ug; $V3xsptcgzss2++) {
      $Vzmpyxz554ug = -1;
      $Vjlmjalejjxa   = ord($Vadkcwffkfxw[$V3xsptcgzss2]);

      if ($Vjlmjalejjxa <= 0x7F) {
        $Vzmpyxz554ug = $Vjlmjalejjxa;
      }
      elseif ($Vjlmjalejjxa >= 0xC2) {
        if (($Vjlmjalejjxa <= 0xDF) && ($V3xsptcgzss2 < $V1st2w4mm2ug - 1)) {
          $Vzmpyxz554ug = ($Vjlmjalejjxa & 0x1F) << 6 | (ord($Vadkcwffkfxw[++$V3xsptcgzss2]) & 0x3F);
        }
        elseif (($Vjlmjalejjxa <= 0xEF) && ($V3xsptcgzss2 < $V1st2w4mm2ug - 2)) {
          $Vzmpyxz554ug = ($Vjlmjalejjxa & 0x0F) << 12 | (ord($Vadkcwffkfxw[++$V3xsptcgzss2]) & 0x3F) << 6 | (ord($Vadkcwffkfxw[++$V3xsptcgzss2]) & 0x3F);
        }
        elseif (($Vjlmjalejjxa <= 0xF4) && ($V3xsptcgzss2 < $V1st2w4mm2ug - 3)) {
          $Vzmpyxz554ug = ($Vjlmjalejjxa & 0x0F) << 18 | (ord($Vadkcwffkfxw[++$V3xsptcgzss2]) & 0x3F) << 12 | (ord($Vadkcwffkfxw[++$V3xsptcgzss2]) & 0x3F) << 6 | (ord($Vadkcwffkfxw[++$V3xsptcgzss2]) & 0x3F);
        }
      }

      if ($Vzmpyxz554ug >= 0) {
        $Vpu0eaxrabtr[] = $Vzmpyxz554ug;
      }
    }

    return $Vpu0eaxrabtr;
  }

  function getUnicodeCharMap() {
    $Veqbujijlzvr = null;
    foreach ($this->getData("cmap", "subtables") as $V5wth3hje3v5) {
      if ($V5wth3hje3v5["platformID"] == 0 || $V5wth3hje3v5["platformID"] == 3 && $V5wth3hje3v5["platformSpecificID"] == 1) {
        $Veqbujijlzvr = $V5wth3hje3v5;
        break;
      }
    }

    if ($Veqbujijlzvr) {
      return $Veqbujijlzvr["glyphIndexArray"];
    }

    return null;
  }

  function setSubset($V2nxahdpg1do) {
    if (!is_array($V2nxahdpg1do)) {
      $V2nxahdpg1do = $this->utf8toUnicode($V2nxahdpg1do);
    }

    $V2nxahdpg1do = array_unique($V2nxahdpg1do);

    $V3u3z4peocbp = $this->getUnicodeCharMap();

    if (!$V3u3z4peocbp) {
      return;
    }

    $V4q2sucnmzwp = array(
      0, 
      1, 
    );

    foreach ($V2nxahdpg1do as $Vl0bhwxpf0qo) {
      if (!isset($V3u3z4peocbp[$Vl0bhwxpf0qo])) {
        continue;
      }

      $Vmfzzxc0mebw        = $V3u3z4peocbp[$Vl0bhwxpf0qo];
      $V4q2sucnmzwp[$Vmfzzxc0mebw] = $Vmfzzxc0mebw;
    }

    
    $Vsx5n5wlhs3g = $this->getTableObject("glyf");
    $V4q2sucnmzwp = $Vsx5n5wlhs3g->getGlyphIDs($V4q2sucnmzwp);

    sort($V4q2sucnmzwp);

    $this->glyph_subset = $V4q2sucnmzwp;
    $this->glyph_all    = array_values($V3u3z4peocbp); 
  }

  function getSubset() {
    if (empty($this->glyph_subset)) {
      return $this->glyph_all;
    }

    return $this->glyph_subset;
  }

  function encode($Vudn5fb5ck4is = array()) {
    if (!self::$Vogke1dtifpg) {
      $Vudn5fb5ck4is = array_merge(array("head", "hhea", "cmap", "hmtx", "maxp", "glyf", "loca", "name", "post"), $Vudn5fb5ck4is);
    }
    else {
      $Vudn5fb5ck4is = array_keys($this->directory);
    }

    $V3fwpvclcxbz = count($Vudn5fb5ck4is);
    $V1qcutcuyu3m          = 16; 

    Font::d("Tables : " . implode(", ", $Vudn5fb5ck4is));

    
    $Vf3rr0rozzw0 = array();
    foreach ($Vudn5fb5ck4is as $Vudn5fb5ck4i) {
      if (!isset($this->directory[$Vudn5fb5ck4i])) {
        Font::d("  >> '$Vudn5fb5ck4i' table doesn't exist");
        continue;
      }

      $Vf3rr0rozzw0[$Vudn5fb5ck4i] = $this->directory[$Vudn5fb5ck4i];
    }

    $this->header->data["numTables"] = $V3fwpvclcxbz;
    $this->header->encode();

    $Vbyfroljvzlq_offset = $this->pos();
    $Vq154qppcleo           = $Vbyfroljvzlq_offset + $V3fwpvclcxbz * $V1qcutcuyu3m;
    $this->seek($Vq154qppcleo);

    $V3xsptcgzss2 = 0;
    foreach ($Vf3rr0rozzw0 as $Voeexclyb0j3) {
      $Voeexclyb0j3->encode($Vbyfroljvzlq_offset + $V3xsptcgzss2 * $V1qcutcuyu3m);
      $V3xsptcgzss2++;
    }
  }

  function parseHeader() {
    if (!empty($this->header)) {
      return;
    }

    $this->seek($this->tableOffset);

    $this->header = new Header($this);
    $this->header->parse();
  }

  function getFontType(){
    $Vuokd0bpgo0x = explode("\\", get_class($this));
    return $Vuokd0bpgo0x[1];
  }

  function parseTableEntries() {
    $this->parseHeader();

    if (!empty($this->directory)) {
      return;
    }

    if (empty($this->header->data["numTables"])) {
      return;
    }


    $Vxeifmjzikkj = $this->getFontType();
    $V4ulrrtmqxqc = "FontLib\\$Vxeifmjzikkj\\TableDirectoryEntry";

    for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $this->header->data["numTables"]; $V3xsptcgzss2++) {
      
      $Voeexclyb0j3 = new $V4ulrrtmqxqc($this);
      $Voeexclyb0j3->parse();

      $this->directory[$Voeexclyb0j3->tag] = $Voeexclyb0j3;
    }
  }

  function normalizeFUnit($Vqfra35f14fv, $Vofecoce1dwt = 1000) {
    return round($Vqfra35f14fv * ($Vofecoce1dwt / $this->getData("head", "unitsPerEm")));
  }

  protected function readTable($Vudn5fb5ck4i) {
    $this->parseTableEntries();

    if (!self::$Vogke1dtifpg) {
      $V1qcutcuyu3mame_canon = preg_replace("/[^a-z0-9]/", "", strtolower($Vudn5fb5ck4i));

      $V4ulrrtmqxqc = "FontLib\\Table\\Type\\$V1qcutcuyu3mame_canon";

      if (!isset($this->directory[$Vudn5fb5ck4i]) || !@class_exists($V4ulrrtmqxqc)) {
        return;
      }
    }
    else {
      $V4ulrrtmqxqc = "FontLib\\Table\\Table";
    }

    
    $Vahqmfi4rdgw = new $V4ulrrtmqxqc($this->directory[$Vudn5fb5ck4i]);
    $Vahqmfi4rdgw->parse();

    $this->data[$Vudn5fb5ck4i] = $Vahqmfi4rdgw;
  }

  
  public function getTableObject($V1qcutcuyu3mame) {
    return $this->data[$V1qcutcuyu3mame];
  }

  public function setTableObject($V1qcutcuyu3mame, Table $Vb3z3shnu1vn) {
    $this->data[$V1qcutcuyu3mame] = $Vb3z3shnu1vn;
  }

  public function getData($V1qcutcuyu3mame, $Vqwhzgethmgj = null) {
    $this->parseTableEntries();

    if (empty($this->data[$V1qcutcuyu3mame])) {
      $this->readTable($V1qcutcuyu3mame);
    }

    if (!isset($this->data[$V1qcutcuyu3mame])) {
      return null;
    }

    if (!$Vqwhzgethmgj) {
      return $this->data[$V1qcutcuyu3mame]->data;
    }
    else {
      return $this->data[$V1qcutcuyu3mame]->data[$Vqwhzgethmgj];
    }
  }

  function addDirectoryEntry(DirectoryEntry $Voeexclyb0j3) {
    $this->directory[$Voeexclyb0j3->tag] = $Voeexclyb0j3;
  }

  function saveAdobeFontMetrics($Vtkhurg4sowd, $Vgpqcvfkvgzo = null) {
    $V1xwbch0npf2 = new AdobeFontMetrics($this);
    $V1xwbch0npf2->write($Vtkhurg4sowd, $Vgpqcvfkvgzo);
  }

  
  function getNameTableString($V1qcutcuyu3mameID) {
    
    $Vmmlhdr3tkee = $this->getData("name", "records");

    if (!isset($Vmmlhdr3tkee[$V1qcutcuyu3mameID])) {
      return null;
    }

    return $Vmmlhdr3tkee[$V1qcutcuyu3mameID]->string;
  }

  
  function getFontCopyright() {
    return $this->getNameTableString(name::NAME_COPYRIGHT);
  }

  
  function getFontName() {
    return $this->getNameTableString(name::NAME_NAME);
  }

  
  function getFontSubfamily() {
    return $this->getNameTableString(name::NAME_SUBFAMILY);
  }

  
  function getFontSubfamilyID() {
    return $this->getNameTableString(name::NAME_SUBFAMILY_ID);
  }

  
  function getFontFullName() {
    return $this->getNameTableString(name::NAME_FULL_NAME);
  }

  
  function getFontVersion() {
    return $this->getNameTableString(name::NAME_VERSION);
  }

  
  function getFontWeight() {
    return $this->getTableObject("OS/2")->data["usWeightClass"];
  }

  
  function getFontPostscriptName() {
    return $this->getNameTableString(name::NAME_POSTSCRIPT_NAME);
  }

  function reduce() {
    $V1qcutcuyu3mames_to_keep = array(
      name::NAME_COPYRIGHT,
      name::NAME_NAME,
      name::NAME_SUBFAMILY,
      name::NAME_SUBFAMILY_ID,
      name::NAME_FULL_NAME,
      name::NAME_VERSION,
      name::NAME_POSTSCRIPT_NAME,
    );

    foreach ($this->data["name"]->data["records"] as $V3xsptcgzss2d => $Vh0zzcsd3eeo) {
      if (!in_array($V3xsptcgzss2d, $V1qcutcuyu3mames_to_keep)) {
        unset($this->data["name"]->data["records"][$V3xsptcgzss2d]);
      }
    }
  }
}
