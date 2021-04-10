<?php

namespace Dompdf\Renderer;

use Dompdf\Frame;
use Dompdf\Image\Cache;


class Image extends Block
{

    
    function render(Frame $Vnk2ly5jcvjf)
    {
        
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        $Vavdpq045wub = $Vnk2ly5jcvjf->get_containing_block();
        list($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa) = $Vnk2ly5jcvjf->get_border_box();

        $this->_set_opacity($Vnk2ly5jcvjf->get_opacity($Vdidzwb0w3vc->opacity));

        list($Vz2hkt0r22ia, $Vzmfvefqwysh, $Vxo14t4heoku, $V5e5dzlyursk) = $Vdidzwb0w3vc->get_computed_border_radius($Vhoifq2kocyt, $Vjlmjalejjxa);

        $Vjlmjalejjxaas_border_radius = $Vz2hkt0r22ia + $Vzmfvefqwysh + $Vxo14t4heoku + $V5e5dzlyursk > 0;

        if ($Vjlmjalejjxaas_border_radius) {
            $this->_canvas->clipping_roundrectangle($Vs4gloy23a1d, $Vopgub02o3q2, (float)$Vhoifq2kocyt, (float)$Vjlmjalejjxa, $Vz2hkt0r22ia, $Vzmfvefqwysh, $Vxo14t4heoku, $V5e5dzlyursk);
        }

        if (($Vbk1alfdu2xe = $Vdidzwb0w3vc->background_color) !== "transparent") {
            $this->_canvas->filled_rectangle($Vs4gloy23a1d, $Vopgub02o3q2, (float)$Vhoifq2kocyt, (float)$Vjlmjalejjxa, $Vbk1alfdu2xe);
        }

        if (($Vsp0omgzz2yw = $Vdidzwb0w3vc->background_image) && $Vsp0omgzz2yw !== "none") {
            $this->_background_image($Vsp0omgzz2yw, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vdidzwb0w3vc);
        }

        if ($Vjlmjalejjxaas_border_radius) {
            $this->_canvas->clipping_end();
        }

        $this->_render_border($Vnk2ly5jcvjf);
        $this->_render_outline($Vnk2ly5jcvjf);

        list($Vs4gloy23a1d, $Vopgub02o3q2) = $Vnk2ly5jcvjf->get_padding_box();

        $Vs4gloy23a1d += (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->padding_left, $Vavdpq045wub["w"]);
        $Vopgub02o3q2 += (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->padding_top, $Vavdpq045wub["h"]);

        $Vhoifq2kocyt = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->width, $Vavdpq045wub["w"]);
        $Vjlmjalejjxa = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->height, $Vavdpq045wub["h"]);

        if ($Vjlmjalejjxaas_border_radius) {
            list($Vhoifq2kocytt, $Vhoifq2kocytr, $Vhoifq2kocytb, $Vhoifq2kocytl) = array(
                $Vdidzwb0w3vc->border_top_width,
                $Vdidzwb0w3vc->border_right_width,
                $Vdidzwb0w3vc->border_bottom_width,
                $Vdidzwb0w3vc->border_left_width,
            );

            
            if ($Vz2hkt0r22ia > 0) {
                $Vz2hkt0r22ia -= ($Vhoifq2kocytt + $Vhoifq2kocytl) / 2;
            }
            if ($Vzmfvefqwysh > 0) {
                $Vzmfvefqwysh -= ($Vhoifq2kocytt + $Vhoifq2kocytr) / 2;
            }
            if ($Vxo14t4heoku > 0) {
                $Vxo14t4heoku -= ($Vhoifq2kocytb + $Vhoifq2kocytr) / 2;
            }
            if ($V5e5dzlyursk > 0) {
                $V5e5dzlyursk -= ($Vhoifq2kocytb + $Vhoifq2kocytl) / 2;
            }

            $this->_canvas->clipping_roundrectangle($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vz2hkt0r22ia, $Vzmfvefqwysh, $Vxo14t4heoku, $V5e5dzlyursk);
        }

        $Veo0deounvgk = $Vnk2ly5jcvjf->get_image_url();
        $Vyynnxlbqs2n = null;

        if (Cache::is_broken($Veo0deounvgk) &&
            $Vyynnxlbqs2n = $Vnk2ly5jcvjf->get_node()->getAttribute("alt")
        ) {
            $V3h4z3hxorxj = $Vdidzwb0w3vc->font_family;
            $Vlak25col1u3 = $Vdidzwb0w3vc->font_size;
            $Vuwwdaccmizk = $Vdidzwb0w3vc->word_spacing;
            $this->_canvas->text(
                $Vs4gloy23a1d,
                $Vopgub02o3q2,
                $Vyynnxlbqs2n,
                $V3h4z3hxorxj,
                $Vlak25col1u3,
                $Vdidzwb0w3vc->color,
                $Vuwwdaccmizk
            );
        } else {
            $this->_canvas->image($Veo0deounvgk, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vdidzwb0w3vc->image_resolution);
        }

        if ($Vjlmjalejjxaas_border_radius) {
            $this->_canvas->clipping_end();
        }

        if ($Vmgxrjtj0g2j = $Vnk2ly5jcvjf->get_image_msg()) {
            $V2crka1tlwcy = preg_split("/\s*\n\s*/", $Vmgxrjtj0g2j);
            $Vjlmjalejjxaeight = 10;
            $Voi0k3v0og1c = $Vyynnxlbqs2n ? $Vopgub02o3q2 + $Vjlmjalejjxa - count($V2crka1tlwcy) * $Vjlmjalejjxaeight : $Vopgub02o3q2;

            foreach ($V2crka1tlwcy as $V3xsptcgzss2 => $V1no5st1xhsr) {
                $this->_canvas->text($Vs4gloy23a1d, $Voi0k3v0og1c + $V3xsptcgzss2 * $Vjlmjalejjxaeight, $V1no5st1xhsr, "times", $Vjlmjalejjxaeight * 0.8, array(0.5, 0.5, 0.5));
            }
        }

        if ($this->_dompdf->getOptions()->getDebugLayout() && $this->_dompdf->getOptions()->getDebugLayoutBlocks()) {
            $this->_debug_layout($Vnk2ly5jcvjf->get_border_box(), "blue");
            if ($this->_dompdf->getOptions()->getDebugLayoutPaddingBox()) {
                $this->_debug_layout($Vnk2ly5jcvjf->get_padding_box(), "blue", array(0.5, 0.5));
            }
        }

        $V3xsptcgzss2d = $Vnk2ly5jcvjf->get_node()->getAttribute("id");
        if (strlen($V3xsptcgzss2d) > 0)  {
            $this->_canvas->add_named_dest($V3xsptcgzss2d);
        }
    }
}
