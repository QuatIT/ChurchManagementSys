<?php


namespace Dompdf\Positioner;

use Dompdf\FrameDecorator\AbstractFrameDecorator;


class Fixed extends AbstractPositioner
{

    
    function position(AbstractFrameDecorator $Vnk2ly5jcvjf)
    {
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_original_style();
        $Vzlqynjxsspd = $Vnk2ly5jcvjf->get_root();
        $Vfeqddcgp1py = $Vzlqynjxsspd->get_containing_block();
        $Vfeqddcgp1py_style = $Vzlqynjxsspd->get_style();

        $Vksopkgqixky = $Vnk2ly5jcvjf->find_block_parent();
        if ($Vksopkgqixky) {
            $Vksopkgqixky->add_line();
        }

        
        $Vb45p50ln1ha = (float)$Vfeqddcgp1py_style->length_in_pt($Vfeqddcgp1py_style->margin_top, $Vfeqddcgp1py["h"]);
        $Vskh3m1tp4gb = (float)$Vfeqddcgp1py_style->length_in_pt($Vfeqddcgp1py_style->margin_right, $Vfeqddcgp1py["w"]);
        $Vvl5hqffa30x = (float)$Vfeqddcgp1py_style->length_in_pt($Vfeqddcgp1py_style->margin_bottom, $Vfeqddcgp1py["h"]);
        $Vwz0hmf5ziti = (float)$Vfeqddcgp1py_style->length_in_pt($Vfeqddcgp1py_style->margin_left, $Vfeqddcgp1py["w"]);

        
        $Vku40chc0ddp = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->height, $Vfeqddcgp1py["h"]);
        $Vztt3qdrrikx = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->width, $Vfeqddcgp1py["w"]);

        $Vnre3z2vvgov = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->top, $Vfeqddcgp1py["h"]);
        $Vqemi0kebtld = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->right, $Vfeqddcgp1py["w"]);
        $Vs4qcjm3btdq = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->bottom, $Vfeqddcgp1py["h"]);
        $V0opnfka0og1 = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->left, $Vfeqddcgp1py["w"]);

        $Vopgub02o3q2 = $Vb45p50ln1ha;
        if (isset($Vnre3z2vvgov)) {
            $Vopgub02o3q2 = (float)$Vnre3z2vvgov + $Vb45p50ln1ha;
            if ($Vnre3z2vvgov === "auto") {
                $Vopgub02o3q2 = $Vb45p50ln1ha;
                if (isset($Vs4qcjm3btdq) && $Vs4qcjm3btdq !== "auto") {
                    $Vopgub02o3q2 = $Vfeqddcgp1py["h"] - $Vs4qcjm3btdq - $Vvl5hqffa30x;
                    if ($Vnk2ly5jcvjf->is_auto_height()) {
                        $Vopgub02o3q2 -= $Vku40chc0ddp;
                    } else {
                        $Vopgub02o3q2 -= $Vnk2ly5jcvjf->get_margin_height();
                    }
                }
            }
        }

        $Vs4gloy23a1d = $Vwz0hmf5ziti;
        if (isset($V0opnfka0og1)) {
            $Vs4gloy23a1d = (float)$V0opnfka0og1 + $Vwz0hmf5ziti;
            if ($V0opnfka0og1 === "auto") {
                $Vs4gloy23a1d = $Vwz0hmf5ziti;
                if (isset($Vqemi0kebtld) && $Vqemi0kebtld !== "auto") {
                    $Vs4gloy23a1d = $Vfeqddcgp1py["w"] - $Vqemi0kebtld - $Vskh3m1tp4gb;
                    if ($Vnk2ly5jcvjf->is_auto_width()) {
                        $Vs4gloy23a1d -= $Vztt3qdrrikx;
                    } else {
                        $Vs4gloy23a1d -= $Vnk2ly5jcvjf->get_margin_width();
                    }
                }
            }
        }

        $Vnk2ly5jcvjf->set_position($Vs4gloy23a1d, $Vopgub02o3q2);

        $Vrzhplmxukeb = $Vnk2ly5jcvjf->get_children();
        foreach ($Vrzhplmxukeb as $Vtcc233inn5m) {
            $Vtcc233inn5m->set_position($Vs4gloy23a1d, $Vopgub02o3q2);
        }
    }
}
