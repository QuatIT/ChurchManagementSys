<?php


namespace Dompdf\Positioner;

use Dompdf\FrameDecorator\AbstractFrameDecorator;


class Block extends AbstractPositioner {

    function position(AbstractFrameDecorator $Vnk2ly5jcvjf)
    {
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        $Vavdpq045wub = $Vnk2ly5jcvjf->get_containing_block();
        $Vksopkgqixky = $Vnk2ly5jcvjf->find_block_parent();

        if ($Vksopkgqixky) {
            $Vzte0430tk0z = $Vdidzwb0w3vc->float;

            if (!$Vzte0430tk0z || $Vzte0430tk0z === "none") {
                $Vksopkgqixky->add_line(true);
            }
            $Vopgub02o3q2 = $Vksopkgqixky->get_current_line_box()->y;

        } else {
            $Vopgub02o3q2 = $Vavdpq045wub["y"];
        }

        $Vs4gloy23a1d = $Vavdpq045wub["x"];

        
        if ($Vdidzwb0w3vc->position === "relative") {
            $Vnre3z2vvgov = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->top, $Vavdpq045wub["h"]);
            
            
            $V0opnfka0og1 = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->left, $Vavdpq045wub["w"]);

            $Vs4gloy23a1d += $V0opnfka0og1;
            $Vopgub02o3q2 += $Vnre3z2vvgov;
        }

        $Vnk2ly5jcvjf->set_position($Vs4gloy23a1d, $Vopgub02o3q2);
    }
}
