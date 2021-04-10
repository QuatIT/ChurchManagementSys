<?php

namespace Dompdf\FrameDecorator;

use Dompdf\Dompdf;
use Dompdf\Frame;


class TableRowGroup extends AbstractFrameDecorator
{

    
    function __construct(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz)
    {
        parent::__construct($Vnk2ly5jcvjf, $Vhvghaoacagz);
    }

    
    function split(Frame $Vtcc233inn5m = null, $Vxx1fnm322ds = false)
    {
        if (is_null($Vtcc233inn5m)) {
            parent::split();
            return;
        }

        
        $Vdgy2mwoncbb = $this->get_parent()->get_cellmap();
        $Vqz1antku1y3 = $Vtcc233inn5m;

        while ($Vqz1antku1y3) {
            $Vdgy2mwoncbb->remove_row($Vqz1antku1y3);
            $Vqz1antku1y3 = $Vqz1antku1y3->get_next_sibling();
        }

        
        
        if ($Vtcc233inn5m === $this->get_first_child()) {
            $Vdgy2mwoncbb->remove_row_group($this);
            parent::split();
            return;
        }

        $Vdgy2mwoncbb->update_row_group($this, $Vtcc233inn5m->get_prev_sibling());
        parent::split($Vtcc233inn5m);
    }
}

