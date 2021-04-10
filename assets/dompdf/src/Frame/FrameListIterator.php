<?php
namespace Dompdf\Frame;

use Iterator;
use Dompdf\Frame;


class FrameListIterator implements Iterator
{

    
    protected $Veb0klnlntfo;

    
    protected $V3vuihl0scep;

    
    protected $V5fbz1ntsxwy;

    
    public function __construct(Frame $Vnk2ly5jcvjf)
    {
        $this->_parent = $Vnk2ly5jcvjf;
        $this->_cur = $Vnk2ly5jcvjf->get_first_child();
        $this->_num = 0;
    }

    
    public function rewind()
    {
        $this->_cur = $this->_parent->get_first_child();
        $this->_num = 0;
    }

    
    public function valid()
    {
        return isset($this->_cur); 
    }

    
    public function key()
    {
        return $this->_num;
    }

    
    public function current()
    {
        return $this->_cur;
    }

    
    public function next()
    {
        $Vc00k54nbbvf = $this->_cur;
        if (!$Vc00k54nbbvf) {
            return null;
        }

        $this->_cur = $this->_cur->get_next_sibling();
        $this->_num++;
        return $Vc00k54nbbvf;
    }
}
