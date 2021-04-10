<?php

namespace Dompdf\FrameReflower;

use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
use Dompdf\FrameDecorator\Table as TableFrameDecorator;
use Dompdf\FrameDecorator\TableRow as TableRowFrameDecorator;
use Dompdf\Exception;


class TableRow extends AbstractFrameReflower
{
    
    function __construct(TableRowFrameDecorator $Vnk2ly5jcvjf)
    {
        parent::__construct($Vnk2ly5jcvjf);
    }

    
    function reflow(BlockFrameDecorator $Vwoflziz3q5d = null)
    {
        $Vc0dirmmlvo4 = $this->_frame->get_root();

        if ($Vc0dirmmlvo4->is_full()) {
            return;
        }

        $this->_frame->position();
        $Vdidzwb0w3vc = $this->_frame->get_style();
        $Vavdpq045wub = $this->_frame->get_containing_block();

        foreach ($this->_frame->get_children() as $Vtcc233inn5m) {
            if ($Vc0dirmmlvo4->is_full()) {
                return;
            }

            $Vtcc233inn5m->set_containing_block($Vavdpq045wub);
            $Vtcc233inn5m->reflow();
        }

        if ($Vc0dirmmlvo4->is_full()) {
            return;
        }

        $Vahqmfi4rdgw = TableFrameDecorator::find_parent_table($this->_frame);
        $Vdgy2mwoncbb = $Vahqmfi4rdgw->get_cellmap();
        $Vdidzwb0w3vc->width = $Vdgy2mwoncbb->get_frame_width($this->_frame);
        $Vdidzwb0w3vc->height = $Vdgy2mwoncbb->get_frame_height($this->_frame);

        $this->_frame->set_position($Vdgy2mwoncbb->get_frame_position($this->_frame));
    }

    
    function get_min_max_width()
    {
        throw new Exception("Min/max width is undefined for table rows");
    }
}
