<?php


namespace Dompdf\Positioner;

use Dompdf\FrameDecorator\AbstractFrameDecorator;


class TableRow extends AbstractPositioner
{

    
    function position(AbstractFrameDecorator $Vnk2ly5jcvjf)
    {
        $Vavdpq045wub = $Vnk2ly5jcvjf->get_containing_block();
        $Vksopkgqixky = $Vnk2ly5jcvjf->get_prev_sibling();

        if ($Vksopkgqixky) {
            $Vopgub02o3q2 = $Vksopkgqixky->get_position("y") + $Vksopkgqixky->get_margin_height();
        } else {
            $Vopgub02o3q2 = $Vavdpq045wub["y"];
        }
        $Vnk2ly5jcvjf->set_position($Vavdpq045wub["x"], $Vopgub02o3q2);
    }
}
