<?php

namespace Dompdf\Renderer;

use Dompdf\Frame;
use Dompdf\FrameDecorator\AbstractFrameDecorator;
use Dompdf\Helpers;


class Block extends AbstractRenderer
{

    
    function render(Frame $Vnk2ly5jcvjf)
    {
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        $Vbr2bywdrplx = $Vnk2ly5jcvjf->get_node();

        list($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa) = $Vnk2ly5jcvjf->get_border_box();

        $this->_set_opacity($Vnk2ly5jcvjf->get_opacity($Vdidzwb0w3vc->opacity));

        if ($Vbr2bywdrplx->nodeName === "body") {
            $Vjlmjalejjxa = $Vnk2ly5jcvjf->get_containing_block("h") - (float)$Vdidzwb0w3vc->length_in_pt(array(
                        $Vdidzwb0w3vc->margin_top,
                        $Vdidzwb0w3vc->border_top_width,
                        $Vdidzwb0w3vc->border_bottom_width,
                        $Vdidzwb0w3vc->margin_bottom),
                    (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->width));
        }

        
        if ($Vbr2bywdrplx->nodeName === "a" && $Vjlmjalejjxaref = $Vbr2bywdrplx->getAttribute("href")) {
            $Vjlmjalejjxaref = Helpers::build_url($this->_dompdf->getProtocol(), $this->_dompdf->getBaseHost(), $this->_dompdf->getBasePath(), $Vjlmjalejjxaref);
            $this->_canvas->add_link($Vjlmjalejjxaref, $Vs4gloy23a1d, $Vopgub02o3q2, (float)$Vhoifq2kocyt, (float)$Vjlmjalejjxa);
        }

        
        list($Vz2hkt0r22ia, $Vzmfvefqwysh, $Vxo14t4heoku, $V5e5dzlyursk) = $Vdidzwb0w3vc->get_computed_border_radius($Vhoifq2kocyt, $Vjlmjalejjxa);

        if ($Vz2hkt0r22ia + $Vzmfvefqwysh + $Vxo14t4heoku + $V5e5dzlyursk > 0) {
            $this->_canvas->clipping_roundrectangle($Vs4gloy23a1d, $Vopgub02o3q2, (float)$Vhoifq2kocyt, (float)$Vjlmjalejjxa, $Vz2hkt0r22ia, $Vzmfvefqwysh, $Vxo14t4heoku, $V5e5dzlyursk);
        }

        if (($Vbk1alfdu2xe = $Vdidzwb0w3vc->background_color) !== "transparent") {
            $this->_canvas->filled_rectangle($Vs4gloy23a1d, $Vopgub02o3q2, (float)$Vhoifq2kocyt, (float)$Vjlmjalejjxa, $Vbk1alfdu2xe);
        }

        if (($Vsp0omgzz2yw = $Vdidzwb0w3vc->background_image) && $Vsp0omgzz2yw !== "none") {
            $this->_background_image($Vsp0omgzz2yw, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vdidzwb0w3vc);
        }

        if ($Vz2hkt0r22ia + $Vzmfvefqwysh + $Vxo14t4heoku + $V5e5dzlyursk > 0) {
            $this->_canvas->clipping_end();
        }

        $V3hrei4dpdod = array($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa);
        $this->_render_border($Vnk2ly5jcvjf, $V3hrei4dpdod);
        $this->_render_outline($Vnk2ly5jcvjf, $V3hrei4dpdod);

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

    
    protected function _render_border(AbstractFrameDecorator $Vnk2ly5jcvjf, $V3hrei4dpdod = null, $Vck4jlniu1ko = "bevel")
    {
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        $Vhkhr2kulnam = $Vdidzwb0w3vc->get_border_properties();

        if (empty($V3hrei4dpdod)) {
            $V3hrei4dpdod = $Vnk2ly5jcvjf->get_border_box();
        }

        
        $V4tsg1pc0dnr = $Vdidzwb0w3vc->get_computed_border_radius($V3hrei4dpdod[2], $V3hrei4dpdod[3]); 

        
        if (
            in_array($Vhkhr2kulnam["top"]["style"], array("solid", "dashed", "dotted")) &&
            $Vhkhr2kulnam["top"] == $Vhkhr2kulnam["right"] &&
            $Vhkhr2kulnam["right"] == $Vhkhr2kulnam["bottom"] &&
            $Vhkhr2kulnam["bottom"] == $Vhkhr2kulnam["left"] &&
            array_sum($V4tsg1pc0dnr) == 0
        ) {
            $Vwscsokrbo32 = $Vhkhr2kulnam["top"];
            if ($Vwscsokrbo32["color"] === "transparent" || $Vwscsokrbo32["width"] <= 0) {
                return;
            }

            list($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa) = $V3hrei4dpdod;
            $Vhoifq2kocytidth = (float)$Vdidzwb0w3vc->length_in_pt($Vwscsokrbo32["width"]);
            $Vsxwpun1fvg4 = $this->_get_dash_pattern($Vwscsokrbo32["style"], $Vhoifq2kocytidth);
            $this->_canvas->rectangle($Vs4gloy23a1d + $Vhoifq2kocytidth / 2, $Vopgub02o3q2 + $Vhoifq2kocytidth / 2, (float)$Vhoifq2kocyt - $Vhoifq2kocytidth, (float)$Vjlmjalejjxa - $Vhoifq2kocytidth, $Vwscsokrbo32["color"], $Vhoifq2kocytidth, $Vsxwpun1fvg4);
            return;
        }

        
        $Vhoifq2kocytidths = array(
            (float)$Vdidzwb0w3vc->length_in_pt($Vhkhr2kulnam["top"]["width"]),
            (float)$Vdidzwb0w3vc->length_in_pt($Vhkhr2kulnam["right"]["width"]),
            (float)$Vdidzwb0w3vc->length_in_pt($Vhkhr2kulnam["bottom"]["width"]),
            (float)$Vdidzwb0w3vc->length_in_pt($Vhkhr2kulnam["left"]["width"])
        );

        foreach ($Vhkhr2kulnam as $Voj5js1i2adw => $Vwscsokrbo32) {
            list($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa) = $V3hrei4dpdod;
            $Vjxpogd0afis = 0;
            $Vflxal01hfm5 = 0;
            $Vmsjiwqai3ku = 0;

            if (!$Vwscsokrbo32["style"] ||
                $Vwscsokrbo32["style"] === "none" ||
                $Vwscsokrbo32["width"] <= 0 ||
                $Vwscsokrbo32["color"] == "transparent"
            ) {
                continue;
            }

            switch ($Voj5js1i2adw) {
                case "top":
                    $Vjxpogd0afis = (float)$Vhoifq2kocyt;
                    $Vflxal01hfm5 = $V4tsg1pc0dnr["top-left"];
                    $Vmsjiwqai3ku = $V4tsg1pc0dnr["top-right"];
                    break;

                case "bottom":
                    $Vjxpogd0afis = (float)$Vhoifq2kocyt;
                    $Vopgub02o3q2 += (float)$Vjlmjalejjxa;
                    $Vflxal01hfm5 = $V4tsg1pc0dnr["bottom-left"];
                    $Vmsjiwqai3ku = $V4tsg1pc0dnr["bottom-right"];
                    break;

                case "left":
                    $Vjxpogd0afis = (float)$Vjlmjalejjxa;
                    $Vflxal01hfm5 = $V4tsg1pc0dnr["top-left"];
                    $Vmsjiwqai3ku = $V4tsg1pc0dnr["bottom-left"];
                    break;

                case "right":
                    $Vjxpogd0afis = (float)$Vjlmjalejjxa;
                    $Vs4gloy23a1d += (float)$Vhoifq2kocyt;
                    $Vflxal01hfm5 = $V4tsg1pc0dnr["top-right"];
                    $Vmsjiwqai3ku = $V4tsg1pc0dnr["bottom-right"];
                    break;
                default:
                    break;
            }
            $V1svcpcbr4nm = "_border_" . $Vwscsokrbo32["style"];

            
            $this->$V1svcpcbr4nm($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vwscsokrbo32["color"], $Vhoifq2kocytidths, $Voj5js1i2adw, $Vck4jlniu1ko, $Vflxal01hfm5, $Vmsjiwqai3ku);
        }
    }

    
    protected function _render_outline(AbstractFrameDecorator $Vnk2ly5jcvjf, $V3hrei4dpdod = null, $Vck4jlniu1ko = "bevel")
    {
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();

        $Vwscsokrbo32 = array(
            "width" => $Vdidzwb0w3vc->outline_width,
            "style" => $Vdidzwb0w3vc->outline_style,
            "color" => $Vdidzwb0w3vc->outline_color,
        );

        if (!$Vwscsokrbo32["style"] || $Vwscsokrbo32["style"] === "none" || $Vwscsokrbo32["width"] <= 0) {
            return;
        }

        if (empty($V3hrei4dpdod)) {
            $V3hrei4dpdod = $Vnk2ly5jcvjf->get_border_box();
        }

        $Vq154qppcleo = (float)$Vdidzwb0w3vc->length_in_pt($Vwscsokrbo32["width"]);
        $Vsxwpun1fvg4 = $this->_get_dash_pattern($Vwscsokrbo32["style"], $Vq154qppcleo);

        
        if (in_array($Vwscsokrbo32["style"], array("solid", "dashed", "dotted"))) {
            $V3hrei4dpdod[0] -= $Vq154qppcleo / 2;
            $V3hrei4dpdod[1] -= $Vq154qppcleo / 2;
            $V3hrei4dpdod[2] += $Vq154qppcleo;
            $V3hrei4dpdod[3] += $Vq154qppcleo;

            list($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa) = $V3hrei4dpdod;
            $this->_canvas->rectangle($Vs4gloy23a1d, $Vopgub02o3q2, (float)$Vhoifq2kocyt, (float)$Vjlmjalejjxa, $Vwscsokrbo32["color"], $Vq154qppcleo, $Vsxwpun1fvg4);
            return;
        }

        $V3hrei4dpdod[0] -= $Vq154qppcleo;
        $V3hrei4dpdod[1] -= $Vq154qppcleo;
        $V3hrei4dpdod[2] += $Vq154qppcleo * 2;
        $V3hrei4dpdod[3] += $Vq154qppcleo * 2;

        $V1svcpcbr4nm = "_border_" . $Vwscsokrbo32["style"];
        $Vhoifq2kocytidths = array_fill(0, 4, (float)$Vdidzwb0w3vc->length_in_pt($Vwscsokrbo32["width"]));
        $Voj5js1i2adws = array("top", "right", "left", "bottom");
        $Vjxpogd0afis = 0;

        foreach ($Voj5js1i2adws as $Voj5js1i2adw) {
            list($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa) = $V3hrei4dpdod;

            switch ($Voj5js1i2adw) {
                case "top":
                    $Vjxpogd0afis = (float)$Vhoifq2kocyt;
                    break;

                case "bottom":
                    $Vjxpogd0afis = (float)$Vhoifq2kocyt;
                    $Vopgub02o3q2 += (float)$Vjlmjalejjxa;
                    break;

                case "left":
                    $Vjxpogd0afis = (float)$Vjlmjalejjxa;
                    break;

                case "right":
                    $Vjxpogd0afis = (float)$Vjlmjalejjxa;
                    $Vs4gloy23a1d += (float)$Vhoifq2kocyt;
                    break;
                default:
                    break;
            }

            $this->$V1svcpcbr4nm($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vwscsokrbo32["color"], $Vhoifq2kocytidths, $Voj5js1i2adw, $Vck4jlniu1ko);
        }
    }
}
