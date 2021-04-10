<?php

namespace Dompdf\FrameDecorator;

use DOMElement;
use Dompdf\Dompdf;
use Dompdf\Frame;
use Dompdf\Exception;


class Inline extends AbstractFrameDecorator
{

    
    function __construct(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz)
    {
        parent::__construct($Vnk2ly5jcvjf, $Vhvghaoacagz);
    }

    
    function split(Frame $Vnk2ly5jcvjf = null, $Vxx1fnm322ds = false)
    {
        if (is_null($Vnk2ly5jcvjf)) {
            $this->get_parent()->split($this, $Vxx1fnm322ds);
            return;
        }

        if ($Vnk2ly5jcvjf->get_parent() !== $this) {
            throw new Exception("Unable to split: frame is not a child of this one.");
        }

        $Vbr2bywdrplx = $this->_frame->get_node();

        if ($Vbr2bywdrplx instanceof DOMElement && $Vbr2bywdrplx->hasAttribute("id")) {
            $Vbr2bywdrplx->setAttribute("data-dompdf-original-id", $Vbr2bywdrplx->getAttribute("id"));
            $Vbr2bywdrplx->removeAttribute("id");
        }

        $Vnfpmsb2trrw = $this->copy($Vbr2bywdrplx->cloneNode());
        
        if ($Vnfpmsb2trrw->get_node()->nodeName == "dompdf_generated") {
            $Vnfpmsb2trrw->get_style()->content = "normal";
        }
        $this->get_parent()->insert_child_after($Vnfpmsb2trrw, $this);

        
        $Vdidzwb0w3vc = $this->_frame->get_style();
        $Vdidzwb0w3vc->margin_right = 0;
        $Vdidzwb0w3vc->padding_right = 0;
        $Vdidzwb0w3vc->border_right_width = 0;

        
        
        $Vdidzwb0w3vc = $Vnfpmsb2trrw->get_style();
        $Vdidzwb0w3vc->margin_left = 0;
        $Vdidzwb0w3vc->padding_left = 0;
        $Vdidzwb0w3vc->border_left_width = 0;

        
        
        
        if (($Vsp0omgzz2yw = $Vdidzwb0w3vc->background_image) && $Vsp0omgzz2yw !== "none"
            && ($Vuyi4mof3pfc = $Vdidzwb0w3vc->background_repeat) && $Vuyi4mof3pfc !== "repeat" && $Vuyi4mof3pfc !== "repeat-y"
        ) {
            $Vdidzwb0w3vc->background_image = "none";
        }

        
        $Vqz1antku1y3 = $Vnk2ly5jcvjf;
        while ($Vqz1antku1y3) {
            $Vnk2ly5jcvjf = $Vqz1antku1y3;
            $Vqz1antku1y3 = $Vqz1antku1y3->get_next_sibling();
            $Vnk2ly5jcvjf->reset();
            $Vnfpmsb2trrw->append_child($Vnk2ly5jcvjf);
        }

        $Va3lowltrssp = array("always", "left", "right");
        $Vnk2ly5jcvjf_style = $Vnk2ly5jcvjf->get_style();
        if ($Vxx1fnm322ds ||
            in_array($Vnk2ly5jcvjf_style->page_break_before, $Va3lowltrssp) ||
            in_array($Vnk2ly5jcvjf_style->page_break_after, $Va3lowltrssp)
        ) {
            $this->get_parent()->split($Vnfpmsb2trrw, true);
        }
    }

}
