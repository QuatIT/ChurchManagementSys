<?php


namespace FontLib\TrueType;

use FontLib\Table\DirectoryEntry;


class TableDirectoryEntry extends DirectoryEntry {
  function __construct(File $V3h4z3hxorxj) {
    parent::__construct($V3h4z3hxorxj);
  }

  function parse() {
    parent::parse();

    $V3h4z3hxorxj           = $this->font;
    $this->checksum = $V3h4z3hxorxj->readUInt32();
    $this->offset   = $V3h4z3hxorxj->readUInt32();
    $this->length   = $V3h4z3hxorxj->readUInt32();
    $this->entryLength += 12;
  }
}

