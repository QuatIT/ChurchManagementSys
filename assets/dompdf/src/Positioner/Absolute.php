<?php


namespace Dompdf\Positioner;

use Dompdf\FrameDecorator\AbstractFrameDecorator;


class Absolute extends AbstractPositioner
{

    
    function position(AbstractFrameDecorator $Vnk2ly5jcvjf)
    {
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();

        $Vksopkgqixky = $Vnk2ly5jcvjf->find_positionned_parent();

        list($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa) = $Vnk2ly5jcvjf->get_containing_block();

        $Vnre3z2vvgov = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->top, $Vjlmjalejjxa);
        $Vqemi0kebtld = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->right, $Vhoifq2kocyt);
        $Vs4qcjm3btdq = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->bottom, $Vjlmjalejjxa);
        $V0opnfka0og1 = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->left, $Vhoifq2kocyt);

        if ($Vksopkgqixky && !($V0opnfka0og1 === "auto" && $Vqemi0kebtld === "auto")) {
            
            list($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa) = $Vksopkgqixky->get_padding_box();
        }

        list($Vhoifq2kocytidth, $Vjlmjalejjxaeight) = array($Vnk2ly5jcvjf->get_margin_width(), $Vnk2ly5jcvjf->get_margin_height());

        $Vfdmsptgjprm = $Vnk2ly5jcvjf->get_original_style();
        $Vtt0rdyy3vqm = $Vfdmsptgjprm->width;
        $Vsuy4wzmsutu = $Vfdmsptgjprm->height;

        

        if ($V0opnfka0og1 === "auto") {
            if ($Vqemi0kebtld === "auto") {
                
                $Vs4gloy23a1d = $Vs4gloy23a1d + $Vnk2ly5jcvjf->find_block_parent()->get_current_line_box()->w;
            } else {
                if ($Vtt0rdyy3vqm === "auto") {
                    
                    $Vs4gloy23a1d += $Vhoifq2kocyt - $Vhoifq2kocytidth - $Vqemi0kebtld;
                } else {
                    
                    $Vs4gloy23a1d += $Vhoifq2kocyt - $Vhoifq2kocytidth - $Vqemi0kebtld;
                }
            }
        } else {
            if ($Vqemi0kebtld === "auto") {
                
                $Vs4gloy23a1d += (float)$V0opnfka0og1;
            } else {
                if ($Vtt0rdyy3vqm === "auto") {
                    
                    $Vs4gloy23a1d += (float)$V0opnfka0og1;
                } else {
                    
                    $Vs4gloy23a1d += (float)$V0opnfka0og1;
                }
            }
        }

        
        if ($Vnre3z2vvgov === "auto") {
            if ($Vs4qcjm3btdq === "auto") {
                
                $Vopgub02o3q2 = $Vnk2ly5jcvjf->find_block_parent()->get_current_line_box()->y;
            } else {
                if ($Vsuy4wzmsutu === "auto") {
                    
                    $Vopgub02o3q2 += (float)$Vjlmjalejjxa - $Vjlmjalejjxaeight - (float)$Vs4qcjm3btdq;
                } else {
                    
                    $Vopgub02o3q2 += (float)$Vjlmjalejjxa - $Vjlmjalejjxaeight - (float)$Vs4qcjm3btdq;
                }
            }
        } else {
            if ($Vs4qcjm3btdq === "auto") {
                
                $Vopgub02o3q2 += (float)$Vnre3z2vvgov;
            } else {
                if ($Vsuy4wzmsutu === "auto") {
                    
                    $Vopgub02o3q2 += (float)$Vnre3z2vvgov;
                } else {
                    
                    $Vopgub02o3q2 += (float)$Vnre3z2vvgov;
                }
            }
        }

        $Vnk2ly5jcvjf->set_position($Vs4gloy23a1d, $Vopgub02o3q2);
    }
}
