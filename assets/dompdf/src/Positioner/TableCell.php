<?php


namespace Dompdf\Positioner;

use Dompdf\FrameDecorator\AbstractFrameDecorator;
use Dompdf\FrameDecorator\Table;


class TableCell extends AbstractPositioner
{

    
    function position(AbstractFrameDecorator $Vnk2ly5jcvjf)
    {
        $Vahqmfi4rdgw = Table::find_parent_table($Vnk2ly5jcvjf);
        $Vdgy2mwoncbb = $Vahqmfi4rdgw->get_cellmap();
        $Vnk2ly5jcvjf->set_position($Vdgy2mwoncbb->get_frame_position($Vnk2ly5jcvjf));
    }
}
