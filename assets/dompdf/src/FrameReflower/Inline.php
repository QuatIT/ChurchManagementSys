<?php

namespace Dompdf\FrameReflower;

use Dompdf\Frame;
use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
use Dompdf\FrameDecorator\Text as TextFrameDecorator;


class Inline extends AbstractFrameReflower
{

    
    function __construct(Frame $Vnk2ly5jcvjf)
    {
        parent::__construct($Vnk2ly5jcvjf);
    }

    
    function reflow(BlockFrameDecorator $Vwoflziz3q5d = null)
    {
        $Vnk2ly5jcvjf = $this->_frame;

        
        $Vc0dirmmlvo4 = $Vnk2ly5jcvjf->get_root();
        $Vc0dirmmlvo4->check_forced_page_break($Vnk2ly5jcvjf);

        if ($Vc0dirmmlvo4->is_full()) {
            return;
        }

        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();

        
        $this->_set_content();

        $Vnk2ly5jcvjf->position();

        $Vavdpq045wub = $Vnk2ly5jcvjf->get_containing_block();

        
        if (($V4ljftfdeqpl = $Vnk2ly5jcvjf->get_first_child()) && $V4ljftfdeqpl instanceof TextFrameDecorator) {
            $V4ljftfdeqpl_style = $V4ljftfdeqpl->get_style();
            $V4ljftfdeqpl_style->margin_left = $Vdidzwb0w3vc->margin_left;
            $V4ljftfdeqpl_style->padding_left = $Vdidzwb0w3vc->padding_left;
            $V4ljftfdeqpl_style->border_left = $Vdidzwb0w3vc->border_left;
        }

        if (($V3nb02w01gr5 = $Vnk2ly5jcvjf->get_last_child()) && $V3nb02w01gr5 instanceof TextFrameDecorator) {
            $V3nb02w01gr5_style = $V3nb02w01gr5->get_style();
            $V3nb02w01gr5_style->margin_right = $Vdidzwb0w3vc->margin_right;
            $V3nb02w01gr5_style->padding_right = $Vdidzwb0w3vc->padding_right;
            $V3nb02w01gr5_style->border_right = $Vdidzwb0w3vc->border_right;
        }

        if ($Vwoflziz3q5d) {
            $Vwoflziz3q5d->add_frame_to_line($this->_frame);
        }

        
        
        foreach ($Vnk2ly5jcvjf->get_children() as $Vtcc233inn5m) {
            $Vtcc233inn5m->set_containing_block($Vavdpq045wub);
            $Vtcc233inn5m->reflow($Vwoflziz3q5d);
        }
    }

    
    public function calculate_auto_width()
    {
        $Vztt3qdrrikx = 0;

        foreach ($this->_frame->get_children() as $Vtcc233inn5m) {
            if ($Vtcc233inn5m->get_original_style()->width == 'auto') {
                $Vztt3qdrrikx += $Vtcc233inn5m->calculate_auto_width();
            } else {
                $Vztt3qdrrikx += $Vtcc233inn5m->get_margin_width();
            }
        }

        $this->_frame->get_style()->width = $Vztt3qdrrikx;

        return $this->_frame->get_margin_width();
    }
}
