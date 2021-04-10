<?php

namespace Dompdf;


class PhpEvaluator
{

    
    protected $Vuxbwvazzzwh;

    
    public function __construct(Canvas $Vvzurwoc24em)
    {
        $this->_canvas = $Vvzurwoc24em;
    }

    
    public function evaluate($Vl0bhwxpf0qo, $Vjtba0lz024s = array())
    {
        if (!$this->_canvas->get_dompdf()->getOptions()->getIsPhpEnabled()) {
            return;
        }

        
        $Vsvnz5bsmrgs = $this->_canvas;
        $Vj1pbeciqvz4 = $Vsvnz5bsmrgs->get_dompdf()->getFontMetrics();
        $Vluq23se3xsk = $Vsvnz5bsmrgs->get_page_number();
        $Vvkmmu1xk2sf = $Vsvnz5bsmrgs->get_page_count();

        
        foreach ($Vjtba0lz024s as $Vgu5dsd35kdp => $Vpszt12nvbau) {
            $$Vgu5dsd35kdp = $Vpszt12nvbau;
        }

        eval($Vl0bhwxpf0qo);
    }

    
    public function render(Frame $Vnk2ly5jcvjf)
    {
        $this->evaluate($Vnk2ly5jcvjf->get_node()->nodeValue);
    }
}
