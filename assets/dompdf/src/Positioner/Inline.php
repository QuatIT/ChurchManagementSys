<?php


namespace Dompdf\Positioner;

use Dompdf\FrameDecorator\AbstractFrameDecorator;
use Dompdf\FrameDecorator\Inline as InlineFrameDecorator;
use Dompdf\Exception;


class Inline extends AbstractPositioner
{

    
    function position(AbstractFrameDecorator $Vnk2ly5jcvjf)
    {
        
        $Vksopkgqixky = $Vnk2ly5jcvjf->find_block_parent();

        

        
        
        

        

        if (!$Vksopkgqixky) {
            throw new Exception("No block-level parent found.  Not good.");
        }

        $V4ljftfdeqpl = $Vnk2ly5jcvjf;

        $Vavdpq045wub = $V4ljftfdeqpl->get_containing_block();
        $V4m4rbmlpgn2 = $Vksopkgqixky->get_current_line_box();

        
        $V2a5vva5ex13 = false;
        while ($V4ljftfdeqpl = $V4ljftfdeqpl->get_parent()) {
            if ($V4ljftfdeqpl->get_style()->position === "fixed") {
                $V2a5vva5ex13 = true;
                break;
            }
        }

        $V4ljftfdeqpl = $Vnk2ly5jcvjf;

        if (!$V2a5vva5ex13 && $V4ljftfdeqpl->get_parent() &&
            $V4ljftfdeqpl->get_parent() instanceof InlineFrameDecorator &&
            $V4ljftfdeqpl->is_text_node()
        ) {
            $Vudnscpdhcpx = $V4ljftfdeqpl->get_reflower()->get_min_max_width();

            
            if ($Vudnscpdhcpx["min"] > ($Vavdpq045wub["w"] - $V4m4rbmlpgn2->left - $V4m4rbmlpgn2->w - $V4m4rbmlpgn2->right)) {
                $Vksopkgqixky->add_line();
            }
        }

        $V4ljftfdeqpl->set_position($Vavdpq045wub["x"] + $V4m4rbmlpgn2->w, $V4m4rbmlpgn2->y);
    }
}
