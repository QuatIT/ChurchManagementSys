<?php

namespace Dompdf\FrameDecorator;

use Dompdf\Dompdf;
use Dompdf\Frame;
use Dompdf\FrameDecorator\Table as TableFrameDecorator;


class TableRow extends AbstractFrameDecorator
{
    
    function __construct(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz)
    {
        parent::__construct($Vnk2ly5jcvjf, $Vhvghaoacagz);
    }

    

    
    function normalise()
    {
        
        $Vksopkgqixky = TableFrameDecorator::find_parent_table($this);

        $Vwpzyzjex4bg = array();
        foreach ($this->get_children() as $Vtcc233inn5m) {
            $Vsagginauquc = $Vtcc233inn5m->get_style()->display;

            if ($Vsagginauquc !== "table-cell") {
                $Vwpzyzjex4bg[] = $Vtcc233inn5m;
            }
        }

        
        foreach ($Vwpzyzjex4bg as $Vnk2ly5jcvjf) {
            $Vksopkgqixky->move_after($Vnk2ly5jcvjf);
        }
    }

    function split(Frame $Vtcc233inn5m = null, $Vxx1fnm322ds = false)
    {
        $this->_already_pushed = true;

        if (is_null($Vtcc233inn5m)) {
            parent::split();
            return;
        }

        parent::split($Vtcc233inn5m, $Vxx1fnm322ds);
    }
}
