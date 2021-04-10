<?php

namespace Dompdf\Renderer;

use Dompdf\Frame;


class TableRowGroup extends Block
{

    
    function render(Frame $Vnk2ly5jcvjf)
    {
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();

        $this->_set_opacity($Vnk2ly5jcvjf->get_opacity($Vdidzwb0w3vc->opacity));

        $this->_render_border($Vnk2ly5jcvjf);
        $this->_render_outline($Vnk2ly5jcvjf);

        if ($this->_dompdf->getOptions()->getDebugLayout() && $this->_dompdf->getOptions()->getDebugLayoutBlocks()) {
            $this->_debug_layout($Vnk2ly5jcvjf->get_border_box(), "red");
            if ($this->_dompdf->getOptions()->getDebugLayoutPaddingBox()) {
                $this->_debug_layout($Vnk2ly5jcvjf->get_padding_box(), "red", array(0.5, 0.5));
            }
        }

        if ($this->_dompdf->getOptions()->getDebugLayout() && $this->_dompdf->getOptions()->getDebugLayoutLines() && $Vnk2ly5jcvjf->get_decorator()) {
            foreach ($Vnk2ly5jcvjf->get_decorator()->get_line_boxes() as $V4m4rbmlpgn2) {
                $Vnk2ly5jcvjf->_debug_layout(array($V4m4rbmlpgn2->x, $V4m4rbmlpgn2->y, $V4m4rbmlpgn2->w, $V4m4rbmlpgn2->h), "orange");
            }
        }

        $Vkriocz2qep2 = $Vnk2ly5jcvjf->get_node()->getAttribute("id");
        if (strlen($Vkriocz2qep2) > 0)  {
            $this->_canvas->add_named_dest($Vkriocz2qep2);
        }
    }
}
