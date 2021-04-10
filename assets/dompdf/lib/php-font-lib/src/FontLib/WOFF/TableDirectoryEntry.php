<?php


namespace FontLib\WOFF;

use FontLib\Table\DirectoryEntry;


class TableDirectoryEntry extends DirectoryEntry {
  public $Vzahziqcliqh;

  function __construct(File $V3h4z3hxorxj) {
    parent::__construct($V3h4z3hxorxj);
  }

  function parse() {
    parent::parse();

    $V3h4z3hxorxj             = $this->font;
    $this->offset     = $V3h4z3hxorxj->readUInt32();
    $this->length     = $V3h4z3hxorxj->readUInt32();
    $this->origLength = $V3h4z3hxorxj->readUInt32();
    $this->checksum   = $V3h4z3hxorxj->readUInt32();
  }
}
