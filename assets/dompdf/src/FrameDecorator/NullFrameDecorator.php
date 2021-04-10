<?php

namespace Dompdf\FrameDecorator;

use Dompdf\Dompdf;
use Dompdf\Frame;


class NullFrameDecorator extends AbstractFrameDecorator
{
    
    function __construct(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz)
    {
        parent::__construct($Vnk2ly5jcvjf, $Vhvghaoacagz);
        $Vdidzwb0w3vc = $this->_frame->get_style();
        $Vdidzwb0w3vc->width = 0;
        $Vdidzwb0w3vc->height = 0;
        $Vdidzwb0w3vc->margin = 0;
        $Vdidzwb0w3vc->padding = 0;
    }
}
