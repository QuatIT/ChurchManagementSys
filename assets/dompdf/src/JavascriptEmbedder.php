<?php

namespace Dompdf;


class JavascriptEmbedder
{

    
    protected $V3mbiykvshg0;

    
    public function __construct(Dompdf $Vhvghaoacagz)
    {
        $this->_dompdf = $Vhvghaoacagz;
    }

    
    public function insert($Vxwmfnegxapy)
    {
        $this->_dompdf->getCanvas()->javascript($Vxwmfnegxapy);
    }

    
    public function render(Frame $Vnk2ly5jcvjf)
    {
        if (!$this->_dompdf->getOptions()->getIsJavascriptEnabled()) {
            return;
        }

        $this->insert($Vnk2ly5jcvjf->get_node()->nodeValue);
    }
}
