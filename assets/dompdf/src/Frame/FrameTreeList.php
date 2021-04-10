<?php
namespace Dompdf\Frame;

use IteratorAggregate;
use Dompdf\Frame;


class FrameTreeList implements IteratorAggregate
{
    
    protected $Vnjwlrkwnjsn;

    
    public function __construct(Frame $Vzlqynjxsspd)
    {
        $this->_root = $Vzlqynjxsspd;
    }

    
    public function getIterator()
    {
        return new FrameTreeIterator($this->_root);
    }
}
