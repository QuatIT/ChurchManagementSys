<?php

namespace Dompdf\FrameReflower;

use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
use Dompdf\FrameDecorator\Table as TableFrameDecorator;


class TableRowGroup extends AbstractFrameReflower
{

    
    function __construct($Vnk2ly5jcvjf)
    {
        parent::__construct($Vnk2ly5jcvjf);
    }

    
    function reflow(BlockFrameDecorator $Vwoflziz3q5d = null)
    {
        $Vc0dirmmlvo4 = $this->_frame->get_root();

        $Vdidzwb0w3vc = $this->_frame->get_style();

        
        $Vahqmfi4rdgw = TableFrameDecorator::find_parent_table($this->_frame);

        $Vavdpq045wub = $this->_frame->get_containing_block();

        foreach ($this->_frame->get_children() as $Vtcc233inn5m) {
            
            if ($Vc0dirmmlvo4->is_full()) {
                return;
            }

            $Vtcc233inn5m->set_containing_block($Vavdpq045wub["x"], $Vavdpq045wub["y"], $Vavdpq045wub["w"], $Vavdpq045wub["h"]);
            $Vtcc233inn5m->reflow();

            
            $Vc0dirmmlvo4->check_page_break($Vtcc233inn5m);
        }

        if ($Vc0dirmmlvo4->is_full()) {
            return;
        }

        $Vdgy2mwoncbb = $Vahqmfi4rdgw->get_cellmap();
        $Vdidzwb0w3vc->width = $Vdgy2mwoncbb->get_frame_width($this->_frame);
        $Vdidzwb0w3vc->height = $Vdgy2mwoncbb->get_frame_height($this->_frame);

        $this->_frame->set_position($Vdgy2mwoncbb->get_frame_position($this->_frame));

        if ($Vahqmfi4rdgw->get_style()->border_collapse === "collapse") {
            
            $Vdidzwb0w3vc->border_style = "none";
        }
    }
}
