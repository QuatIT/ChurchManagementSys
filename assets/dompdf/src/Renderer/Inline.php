<?php

namespace Dompdf\Renderer;

use Dompdf\Frame;
use Dompdf\Helpers;


class Inline extends AbstractRenderer
{

    
    function render(Frame $Vnk2ly5jcvjf)
    {
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();

        if (!$Vnk2ly5jcvjf->get_first_child()) {
            return; 
        }

        
        $Vhkhr2kulnam = $Vdidzwb0w3vc->get_border_properties();
        $V2ubuz5km5bi = array(
            (float)$Vdidzwb0w3vc->length_in_pt($Vhkhr2kulnam["top"]["width"]),
            (float)$Vdidzwb0w3vc->length_in_pt($Vhkhr2kulnam["right"]["width"]),
            (float)$Vdidzwb0w3vc->length_in_pt($Vhkhr2kulnam["bottom"]["width"]),
            (float)$Vdidzwb0w3vc->length_in_pt($Vhkhr2kulnam["left"]["width"])
        );

        
        
        list($Vs4gloy23a1d, $Vopgub02o3q2) = $Vnk2ly5jcvjf->get_first_child()->get_position();
        $Vhoifq2kocyt = null;
        $Vjlmjalejjxa = 0;
        
        

        $this->_set_opacity($Vnk2ly5jcvjf->get_opacity($Vdidzwb0w3vc->opacity));

        $Viclhhgxlf1q = true;

        $Vzdflwsw3lpg = $this->_dompdf->getOptions()->getDebugLayout() && $this->_dompdf->getOptions()->getDebugLayoutInline();

        foreach ($Vnk2ly5jcvjf->get_children() as $Vtcc233inn5m) {
            list($Vtcc233inn5m_x, $Vtcc233inn5m_y, $Vtcc233inn5m_w, $Vtcc233inn5m_h) = $Vtcc233inn5m->get_padding_box();

            if (!is_null($Vhoifq2kocyt) && $Vtcc233inn5m_x < $Vs4gloy23a1d + $Vhoifq2kocyt) {
                
                
                
                
                

                
                

                
                if (($Vbk1alfdu2xe = $Vdidzwb0w3vc->background_color) !== "transparent") {
                    $this->_canvas->filled_rectangle($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vbk1alfdu2xe);
                }

                if (($Vsp0omgzz2yw = $Vdidzwb0w3vc->background_image) && $Vsp0omgzz2yw !== "none") {
                    $this->_background_image($Vsp0omgzz2yw, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vdidzwb0w3vc);
                }

                
                if ($Viclhhgxlf1q) {
                    if ($Vhkhr2kulnam["left"]["style"] !== "none" && $Vhkhr2kulnam["left"]["color"] !== "transparent" && $Vhkhr2kulnam["left"]["width"] > 0) {
                        $V1svcpcbr4nm = "_border_" . $Vhkhr2kulnam["left"]["style"];
                        $this->$V1svcpcbr4nm($Vs4gloy23a1d, $Vopgub02o3q2, $Vjlmjalejjxa + $V2ubuz5km5bi[0] + $V2ubuz5km5bi[2], $Vhkhr2kulnam["left"]["color"], $V2ubuz5km5bi, "left");
                    }
                    $Viclhhgxlf1q = false;
                }

                
                if ($Vhkhr2kulnam["top"]["style"] !== "none" && $Vhkhr2kulnam["top"]["color"] !== "transparent" && $Vhkhr2kulnam["top"]["width"] > 0) {
                    $V1svcpcbr4nm = "_border_" . $Vhkhr2kulnam["top"]["style"];
                    $this->$V1svcpcbr4nm($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt + $V2ubuz5km5bi[1] + $V2ubuz5km5bi[3], $Vhkhr2kulnam["top"]["color"], $V2ubuz5km5bi, "top");
                }

                if ($Vhkhr2kulnam["bottom"]["style"] !== "none" && $Vhkhr2kulnam["bottom"]["color"] !== "transparent" && $Vhkhr2kulnam["bottom"]["width"] > 0) {
                    $V1svcpcbr4nm = "_border_" . $Vhkhr2kulnam["bottom"]["style"];
                    $this->$V1svcpcbr4nm($Vs4gloy23a1d, $Vopgub02o3q2 + $Vjlmjalejjxa + $V2ubuz5km5bi[0] + $V2ubuz5km5bi[2], $Vhoifq2kocyt + $V2ubuz5km5bi[1] + $V2ubuz5km5bi[3], $Vhkhr2kulnam["bottom"]["color"], $V2ubuz5km5bi, "bottom");
                }

                
                $Vojudhu1ormc = null;
                if ($Vnk2ly5jcvjf->get_node()->nodeName === "a") {
                    $Vojudhu1ormc = $Vnk2ly5jcvjf->get_node();
                } else if ($Vnk2ly5jcvjf->get_parent()->get_node()->nodeName === "a") {
                    $Vojudhu1ormc = $Vnk2ly5jcvjf->get_parent()->get_node();
                }

                if ($Vojudhu1ormc && $Vjlmjalejjxaref = $Vojudhu1ormc->getAttribute("href")) {
                    $Vjlmjalejjxaref = Helpers::build_url($this->_dompdf->getProtocol(), $this->_dompdf->getBaseHost(), $this->_dompdf->getBasePath(), $Vjlmjalejjxaref);
                    $this->_canvas->add_link($Vjlmjalejjxaref, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa);
                }

                $Vs4gloy23a1d = $Vtcc233inn5m_x;
                $Vopgub02o3q2 = $Vtcc233inn5m_y;
                $Vhoifq2kocyt = (float)$Vtcc233inn5m_w;
                $Vjlmjalejjxa = (float)$Vtcc233inn5m_h;
                continue;
            }

            if (is_null($Vhoifq2kocyt)) {
                $Vhoifq2kocyt = (float)$Vtcc233inn5m_w;
            }else {
                $Vhoifq2kocyt += (float)$Vtcc233inn5m_w;
            }

            $Vjlmjalejjxa = max($Vjlmjalejjxa, $Vtcc233inn5m_h);

            if ($Vzdflwsw3lpg) {
                $this->_debug_layout($Vtcc233inn5m->get_border_box(), "blue");
                if ($this->_dompdf->getOptions()->getDebugLayoutPaddingBox()) {
                    $this->_debug_layout($Vtcc233inn5m->get_padding_box(), "blue", array(0.5, 0.5));
                }
            }
        }

        
        if (($Vbk1alfdu2xe = $Vdidzwb0w3vc->background_color) !== "transparent") {
            $this->_canvas->filled_rectangle($Vs4gloy23a1d + $V2ubuz5km5bi[3], $Vopgub02o3q2 + $V2ubuz5km5bi[0], $Vhoifq2kocyt, $Vjlmjalejjxa, $Vbk1alfdu2xe);
        }

        
        
        
        
        
        
        
        
        if (($Vsp0omgzz2yw = $Vdidzwb0w3vc->background_image) && $Vsp0omgzz2yw !== "none") {
            $this->_background_image($Vsp0omgzz2yw, $Vs4gloy23a1d + $V2ubuz5km5bi[3], $Vopgub02o3q2 + $V2ubuz5km5bi[0], $Vhoifq2kocyt, $Vjlmjalejjxa, $Vdidzwb0w3vc);
        }

        
        $Vhoifq2kocyt += (float)$V2ubuz5km5bi[1] + (float)$V2ubuz5km5bi[3];
        $Vjlmjalejjxa += (float)$V2ubuz5km5bi[0] + (float)$V2ubuz5km5bi[2];

        
        $Vruar0biy5gi = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_left);
        $Vs4gloy23a1d += $Vruar0biy5gi;

        
        if ($Viclhhgxlf1q && $Vhkhr2kulnam["left"]["style"] !== "none" && $Vhkhr2kulnam["left"]["color"] !== "transparent" && $V2ubuz5km5bi[3] > 0) {
            $V1svcpcbr4nm = "_border_" . $Vhkhr2kulnam["left"]["style"];
            $this->$V1svcpcbr4nm($Vs4gloy23a1d, $Vopgub02o3q2, $Vjlmjalejjxa, $Vhkhr2kulnam["left"]["color"], $V2ubuz5km5bi, "left");
        }

        
        if ($Vhkhr2kulnam["top"]["style"] !== "none" && $Vhkhr2kulnam["top"]["color"] !== "transparent" && $V2ubuz5km5bi[0] > 0) {
            $V1svcpcbr4nm = "_border_" . $Vhkhr2kulnam["top"]["style"];
            $this->$V1svcpcbr4nm($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vhkhr2kulnam["top"]["color"], $V2ubuz5km5bi, "top");
        }

        if ($Vhkhr2kulnam["bottom"]["style"] !== "none" && $Vhkhr2kulnam["bottom"]["color"] !== "transparent" && $V2ubuz5km5bi[2] > 0) {
            $V1svcpcbr4nm = "_border_" . $Vhkhr2kulnam["bottom"]["style"];
            $this->$V1svcpcbr4nm($Vs4gloy23a1d, $Vopgub02o3q2 + $Vjlmjalejjxa, $Vhoifq2kocyt, $Vhkhr2kulnam["bottom"]["color"], $V2ubuz5km5bi, "bottom");
        }

        
        
        
        if ($Vhkhr2kulnam["right"]["style"] !== "none" && $Vhkhr2kulnam["right"]["color"] !== "transparent" && $V2ubuz5km5bi[1] > 0) {
            $V1svcpcbr4nm = "_border_" . $Vhkhr2kulnam["right"]["style"];
            $this->$V1svcpcbr4nm($Vs4gloy23a1d + $Vhoifq2kocyt, $Vopgub02o3q2, $Vjlmjalejjxa, $Vhkhr2kulnam["right"]["color"], $V2ubuz5km5bi, "right");
        }

        $Vkriocz2qep2 = $Vnk2ly5jcvjf->get_node()->getAttribute("id");
        if (strlen($Vkriocz2qep2) > 0)  {
            $this->_canvas->add_named_dest($Vkriocz2qep2);
        }

        
        $Vojudhu1ormc = null;
        if ($Vnk2ly5jcvjf->get_node()->nodeName === "a") {
            $Vojudhu1ormc = $Vnk2ly5jcvjf->get_node();

            if (($Vpgf1maodsla = $Vojudhu1ormc->getAttribute("name"))) {
                $this->_canvas->add_named_dest($Vpgf1maodsla);
            }
        }

        if ($Vnk2ly5jcvjf->get_parent() && $Vnk2ly5jcvjf->get_parent()->get_node()->nodeName === "a") {
            $Vojudhu1ormc = $Vnk2ly5jcvjf->get_parent()->get_node();
        }

        
        if ($Vojudhu1ormc) {
            if ($Vjlmjalejjxaref = $Vojudhu1ormc->getAttribute("href")) {
                $Vjlmjalejjxaref = Helpers::build_url($this->_dompdf->getProtocol(), $this->_dompdf->getBaseHost(), $this->_dompdf->getBasePath(), $Vjlmjalejjxaref);
                $this->_canvas->add_link($Vjlmjalejjxaref, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa);
            }
        }
    }
}
