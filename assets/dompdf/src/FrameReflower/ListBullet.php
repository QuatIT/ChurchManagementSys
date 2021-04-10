<?php

namespace Dompdf\FrameReflower;

use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
use Dompdf\FrameDecorator\AbstractFrameDecorator;


class ListBullet extends AbstractFrameReflower
{

    
    function __construct(AbstractFrameDecorator $Vnk2ly5jcvjf)
    {
        parent::__construct($Vnk2ly5jcvjf);
    }

    
    function reflow(BlockFrameDecorator $Vwoflziz3q5d = null)
    {
        $Vdidzwb0w3vc = $this->_frame->get_style();

        $Vdidzwb0w3vc->width = $this->_frame->get_width();
        $this->_frame->position();

        if ($Vdidzwb0w3vc->list_style_position === "inside") {
            $Vksopkgqixky = $this->_frame->find_block_parent();
            $Vksopkgqixky->add_frame_to_line($this->_frame);
        }
    }
}
