<?php
namespace Dompdf\Frame;

use Dompdf\Frame;
use IteratorAggregate;


class FrameList implements IteratorAggregate
{
    
    protected $Vtabfexfghu0;

    
    function __construct($Vnk2ly5jcvjf)
    {
        $this->_frame = $Vnk2ly5jcvjf;
    }

    
    function getIterator()
    {
        return new FrameListIterator($this->_frame);
    }
}
