<?php
namespace Dompdf\Frame;

use Iterator;
use Dompdf\Frame;


class FrameTreeIterator implements Iterator
{
    
    protected $Vnjwlrkwnjsn;

    
    protected $V0h3aou20d2y = array();

    
    protected $V5fbz1ntsxwy;

    
    public function __construct(Frame $Vzlqynjxsspd)
    {
        $this->_stack[] = $this->_root = $Vzlqynjxsspd;
        $this->_num = 0;
    }

    
    public function rewind()
    {
        $this->_stack = array($this->_root);
        $this->_num = 0;
    }

    
    public function valid()
    {
        return count($this->_stack) > 0;
    }

    
    public function key()
    {
        return $this->_num;
    }

    
    public function current()
    {
        return end($this->_stack);
    }

    
    public function next()
    {
        $Vbz3vmbr1h2v = end($this->_stack);

        
        unset($this->_stack[key($this->_stack)]);
        $this->_num++;

        
        if ($Vv03lfntnmcz = $Vbz3vmbr1h2v->get_last_child()) {
            $this->_stack[] = $Vv03lfntnmcz;
            while ($Vv03lfntnmcz = $Vv03lfntnmcz->get_prev_sibling()) {
                $this->_stack[] = $Vv03lfntnmcz;
            }
        }

        return $Vbz3vmbr1h2v;
    }
}

