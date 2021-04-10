<?php


namespace FontLib\TrueType;

use Countable;
use FontLib\BinaryStream;
use Iterator;
use OutOfBoundsException;


class Collection extends BinaryStream implements Iterator, Countable {
  
  private $Vmriudfrwzj3 = 0;

  protected $Vwghks1pc0ks = array();
  protected $Vafhpfmnqxvz = array();
  protected $Vw1yjchm5her;
  protected $Vf2dci1t3mrr;

  function parse() {
    if (isset($this->numFonts)) {
      return;
    }

    $this->read(4); 

    $this->version  = $this->readFixed();
    $this->numFonts = $this->readUInt32();

    for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $this->numFonts; $V3xsptcgzss2++) {
      $this->collectionOffsets[] = $this->readUInt32();
    }
  }

  
  function getFont($V0odjf2y4off) {
    $this->parse();

    if (!isset($this->collectionOffsets[$V0odjf2y4off])) {
      throw new OutOfBoundsException();
    }

    if (isset($this->collection[$V0odjf2y4off])) {
      return $this->collection[$V0odjf2y4off];
    }

    $V3h4z3hxorxj    = new File();
    $V3h4z3hxorxj->f = $this->f;
    $V3h4z3hxorxj->setTableOffset($this->collectionOffsets[$V0odjf2y4off]);

    return $this->collection[$V0odjf2y4off] = $V3h4z3hxorxj;
  }

  function current() {
    return $this->getFont($this->position);
  }

  function key() {
    return $this->position;
  }

  function next() {
    return ++$this->position;
  }

  function rewind() {
    $this->position = 0;
  }

  function valid() {
    $this->parse();

    return isset($this->collectionOffsets[$this->position]);
  }

  function count() {
    $this->parse();

    return $this->numFonts;
  }
}
