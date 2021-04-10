<?php

namespace Dompdf\Renderer;

use Dompdf\Adapter\CPDF;
use Dompdf\Frame;


class Text extends AbstractRenderer
{
    
    const DECO_THICKNESS = 0.02;

    
    
    
    
    

    
    const UNDERLINE_OFFSET = 0.0;

    
    const OVERLINE_OFFSET = 0.0;

    
    const LINETHROUGH_OFFSET = 0.0;

    
    const DECO_EXTENSION = 0.0;

    
    function render(Frame $Vnk2ly5jcvjf)
    {
        $Vnlbbd31sxbf = $Vnk2ly5jcvjf->get_text();
        if (trim($Vnlbbd31sxbf) === "") {
            return;
        }

        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        list($Vs4gloy23a1d, $Vopgub02o3q2) = $Vnk2ly5jcvjf->get_position();
        $Vavdpq045wub = $Vnk2ly5jcvjf->get_containing_block();

        if (($Vey2vt0sj2eh = $Vdidzwb0w3vc->margin_left) === "auto" || $Vey2vt0sj2eh === "none") {
            $Vey2vt0sj2eh = 0;
        }

        if (($Vpzsrb4px1fx = $Vdidzwb0w3vc->padding_left) === "auto" || $Vpzsrb4px1fx === "none") {
            $Vpzsrb4px1fx = 0;
        }

        if (($V5e5dzlyursk = $Vdidzwb0w3vc->border_left_width) === "auto" || $V5e5dzlyursk === "none") {
            $V5e5dzlyursk = 0;
        }

        $Vs4gloy23a1d += (float)$Vdidzwb0w3vc->length_in_pt(array($Vey2vt0sj2eh, $Vpzsrb4px1fx, $V5e5dzlyursk), $Vavdpq045wub["w"]);

        $V3h4z3hxorxj = $Vdidzwb0w3vc->font_family;
        $Vlak25col1u3 = $Vnk2ly5jcvjf_font_size = $Vdidzwb0w3vc->font_size;
        $Vay4fk3jgmc4 = $Vnk2ly5jcvjf->get_text_spacing() + (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->word_spacing);
        $Vaohjovek4hi = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->letter_spacing);
        $Vztt3qdrrikx = $Vdidzwb0w3vc->width;

        

        $this->_canvas->text($Vs4gloy23a1d, $Vopgub02o3q2, $Vnlbbd31sxbf,
            $V3h4z3hxorxj, $Vlak25col1u3,
            $Vdidzwb0w3vc->color, $Vay4fk3jgmc4, $Vaohjovek4hi);

        $V4m4rbmlpgn2 = $Vnk2ly5jcvjf->get_containing_line();

        
        
        if (false && $V4m4rbmlpgn2->tallest_frame) {
            $Vvdrbuipav2e = $V4m4rbmlpgn2->tallest_frame;
            $Vdidzwb0w3vc = $Vvdrbuipav2e->get_style();
            $Vlak25col1u3 = $Vdidzwb0w3vc->font_size;
        }

        $V4m4rbmlpgn2_thickness = $Vlak25col1u3 * self::DECO_THICKNESS;
        $V3pow2a01vhd = $Vlak25col1u3 * self::UNDERLINE_OFFSET;
        $Veweqzkszlp4 = $Vlak25col1u3 * self::OVERLINE_OFFSET;
        $V4m4rbmlpgn2through_offset = $Vlak25col1u3 * self::LINETHROUGH_OFFSET;
        $Vcpvigukdeom = -0.08;

        if ($this->_canvas instanceof CPDF) {
            $Vjpiusobc32q = $this->_canvas->get_cpdf()->fonts[$Vdidzwb0w3vc->font_family];

            if (isset($Vjpiusobc32q["UnderlinePosition"])) {
                $Vcpvigukdeom = $Vjpiusobc32q["UnderlinePosition"] / 1000;
            }

            if (isset($Vjpiusobc32q["UnderlineThickness"])) {
                $V4m4rbmlpgn2_thickness = $Vlak25col1u3 * ($Vjpiusobc32q["UnderlineThickness"] / 1000);
            }
        }

        $Volczvueemox = $Vlak25col1u3 * $Vcpvigukdeom;
        $Vofecoce1dwt = $Vlak25col1u3;

        
        

        
        $Vksopkgqixky = $Vnk2ly5jcvjf;
        $Vwvjp3dx4uxt = array();
        while ($Vksopkgqixky = $Vksopkgqixky->get_parent()) {
            $Vwvjp3dx4uxt[] = $Vksopkgqixky;
        }

        while (isset($Vwvjp3dx4uxt[0])) {
            $V4ljftfdeqpl = array_pop($Vwvjp3dx4uxt);

            if (($Vnlbbd31sxbf_deco = $V4ljftfdeqpl->get_style()->text_decoration) === "none") {
                continue;
            }

            $Vekicc3zwkvj = $Vopgub02o3q2; 
            $Vexxkxtdr01j = $V4ljftfdeqpl->get_style()->color;

            switch ($Vnlbbd31sxbf_deco) {
                default:
                    continue;

                case "underline":
                    $Vekicc3zwkvj += $Vofecoce1dwt - $Volczvueemox + $V3pow2a01vhd + $V4m4rbmlpgn2_thickness / 2;
                    break;

                case "overline":
                    $Vekicc3zwkvj += $Veweqzkszlp4 + $V4m4rbmlpgn2_thickness / 2;
                    break;

                case "line-through":
                    $Vekicc3zwkvj += $Vofecoce1dwt * 0.7 + $V4m4rbmlpgn2through_offset;
                    break;
            }

            $Vcprkgnutplg = 0;
            $Vs4gloy23a1d1 = $Vs4gloy23a1d - self::DECO_EXTENSION;
            $Vs4gloy23a1d2 = $Vs4gloy23a1d + $Vztt3qdrrikx + $Vcprkgnutplg + self::DECO_EXTENSION;
            $this->_canvas->line($Vs4gloy23a1d1, $Vekicc3zwkvj, $Vs4gloy23a1d2, $Vekicc3zwkvj, $Vexxkxtdr01j, $V4m4rbmlpgn2_thickness);
        }

        if ($this->_dompdf->getOptions()->getDebugLayout() && $this->_dompdf->getOptions()->getDebugLayoutLines()) {
            $Vnlbbd31sxbf_width = $this->_dompdf->getFontMetrics()->getTextWidth($Vnlbbd31sxbf, $V3h4z3hxorxj, $Vnk2ly5jcvjf_font_size);
            $this->_debug_layout(array($Vs4gloy23a1d, $Vopgub02o3q2, $Vnlbbd31sxbf_width + ($V4m4rbmlpgn2->wc - 1) * $Vay4fk3jgmc4, $Vnk2ly5jcvjf_font_size), "orange", array(0.5, 0.5));
        }
    }
}
