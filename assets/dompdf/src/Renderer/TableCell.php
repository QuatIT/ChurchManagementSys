<?php

namespace Dompdf\Renderer;

use Dompdf\Frame;
use Dompdf\FrameDecorator\Table;


class TableCell extends Block
{

    
    function render(Frame $Vnk2ly5jcvjf)
    {
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();

        if (trim($Vnk2ly5jcvjf->get_node()->nodeValue) === "" && $Vdidzwb0w3vc->empty_cells === "hide") {
            return;
        }

        $this->_set_opacity($Vnk2ly5jcvjf->get_opacity($Vdidzwb0w3vc->opacity));
        list($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa) = $Vnk2ly5jcvjf->get_border_box();

        
        if (($Vbk1alfdu2xe = $Vdidzwb0w3vc->background_color) !== "transparent") {
            $this->_canvas->filled_rectangle($Vs4gloy23a1d, $Vopgub02o3q2, (float)$Vhoifq2kocyt, (float)$Vjlmjalejjxa, $Vbk1alfdu2xe);
        }

        if (($Vsp0omgzz2yw = $Vdidzwb0w3vc->background_image) && $Vsp0omgzz2yw !== "none") {
            $this->_background_image($Vsp0omgzz2yw, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vdidzwb0w3vc);
        }

        $Vahqmfi4rdgw = Table::find_parent_table($Vnk2ly5jcvjf);

        if ($Vahqmfi4rdgw->get_style()->border_collapse !== "collapse") {
            $this->_render_border($Vnk2ly5jcvjf);
            $this->_render_outline($Vnk2ly5jcvjf);
            return;
        }

        
        

        $Vdgy2mwoncbb = $Vahqmfi4rdgw->get_cellmap();
        $Vneuyusyb51k = $Vdgy2mwoncbb->get_spanned_cells($Vnk2ly5jcvjf);

        if (is_null($Vneuyusyb51k)) {
            return;
        }

        $V0eivvdconcj = $Vdgy2mwoncbb->get_num_rows();
        $Vwe4j1xo44cn = $Vdgy2mwoncbb->get_num_cols();

        
        $V3xsptcgzss2 = $Vneuyusyb51k["rows"][0];
        $V2my3d13vy4b = $Vdgy2mwoncbb->get_row($V3xsptcgzss2);

        
        
        
        if (in_array($V0eivvdconcj - 1, $Vneuyusyb51k["rows"])) {
            $Vybgnq3bvihz = true;
            $Vbu23w3b4i1y = $Vdgy2mwoncbb->get_row($V0eivvdconcj - 1);
        } else {
            $Vybgnq3bvihz = false;
        }

        
        foreach ($Vneuyusyb51k["columns"] as $V0hg12l10vfx) {
            $Vhkhr2kulnam = $Vdgy2mwoncbb->get_border_properties($V3xsptcgzss2, $V0hg12l10vfx);

            $Vopgub02o3q2 = $V2my3d13vy4b["y"] - $Vhkhr2kulnam["top"]["width"] / 2;

            $Vhxdswanopzr = $Vdgy2mwoncbb->get_column($V0hg12l10vfx);
            $Vs4gloy23a1d = $Vhxdswanopzr["x"] - $Vhkhr2kulnam["left"]["width"] / 2;
            $Vhoifq2kocyt = $Vhxdswanopzr["used-width"] + ($Vhkhr2kulnam["left"]["width"] + $Vhkhr2kulnam["right"]["width"]) / 2;

            if ($Vhkhr2kulnam["top"]["style"] !== "none" && $Vhkhr2kulnam["top"]["width"] > 0) {
                $Vhoifq2kocytidths = array(
                    (float)$Vhkhr2kulnam["top"]["width"],
                    (float)$Vhkhr2kulnam["right"]["width"],
                    (float)$Vhkhr2kulnam["bottom"]["width"],
                    (float)$Vhkhr2kulnam["left"]["width"]
                );
                $V1svcpcbr4nm = "_border_" . $Vhkhr2kulnam["top"]["style"];
                $this->$V1svcpcbr4nm($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vhkhr2kulnam["top"]["color"], $Vhoifq2kocytidths, "top", "square");
            }

            if ($Vybgnq3bvihz) {
                $Vhkhr2kulnam = $Vdgy2mwoncbb->get_border_properties($V0eivvdconcj - 1, $V0hg12l10vfx);
                if ($Vhkhr2kulnam["bottom"]["style"] === "none" || $Vhkhr2kulnam["bottom"]["width"] <= 0) {
                    continue;
                }

                $Vopgub02o3q2 = $Vbu23w3b4i1y["y"] + $Vbu23w3b4i1y["height"] + $Vhkhr2kulnam["bottom"]["width"] / 2;

                $Vhoifq2kocytidths = array(
                    (float)$Vhkhr2kulnam["top"]["width"],
                    (float)$Vhkhr2kulnam["right"]["width"],
                    (float)$Vhkhr2kulnam["bottom"]["width"],
                    (float)$Vhkhr2kulnam["left"]["width"]
                );
                $V1svcpcbr4nm = "_border_" . $Vhkhr2kulnam["bottom"]["style"];
                $this->$V1svcpcbr4nm($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vhkhr2kulnam["bottom"]["color"], $Vhoifq2kocytidths, "bottom", "square");

            }
        }

        $V0hg12l10vfx = $Vneuyusyb51k["columns"][0];

        $V4bxgq3zvdro = $Vdgy2mwoncbb->get_column($V0hg12l10vfx);

        if (in_array($Vwe4j1xo44cn - 1, $Vneuyusyb51k["columns"])) {
            $V4facgk0c4uc = true;
            $Vl51al3cn4kp = $Vdgy2mwoncbb->get_column($Vwe4j1xo44cn - 1);
        } else {
            $V4facgk0c4uc = false;
        }

        
        foreach ($Vneuyusyb51k["rows"] as $V3xsptcgzss2) {
            $Vhkhr2kulnam = $Vdgy2mwoncbb->get_border_properties($V3xsptcgzss2, $V0hg12l10vfx);

            $Vs4gloy23a1d = $V4bxgq3zvdro["x"] - $Vhkhr2kulnam["left"]["width"] / 2;

            $Vnwijnctkkq3 = $Vdgy2mwoncbb->get_row($V3xsptcgzss2);

            $Vopgub02o3q2 = $Vnwijnctkkq3["y"] - $Vhkhr2kulnam["top"]["width"] / 2;
            $Vjlmjalejjxa = $Vnwijnctkkq3["height"] + ($Vhkhr2kulnam["top"]["width"] + $Vhkhr2kulnam["bottom"]["width"]) / 2;

            if ($Vhkhr2kulnam["left"]["style"] !== "none" && $Vhkhr2kulnam["left"]["width"] > 0) {
                $Vhoifq2kocytidths = array(
                    (float)$Vhkhr2kulnam["top"]["width"],
                    (float)$Vhkhr2kulnam["right"]["width"],
                    (float)$Vhkhr2kulnam["bottom"]["width"],
                    (float)$Vhkhr2kulnam["left"]["width"]
                );

                $V1svcpcbr4nm = "_border_" . $Vhkhr2kulnam["left"]["style"];
                $this->$V1svcpcbr4nm($Vs4gloy23a1d, $Vopgub02o3q2, $Vjlmjalejjxa, $Vhkhr2kulnam["left"]["color"], $Vhoifq2kocytidths, "left", "square");
            }

            if ($V4facgk0c4uc) {
                $Vhkhr2kulnam = $Vdgy2mwoncbb->get_border_properties($V3xsptcgzss2, $Vwe4j1xo44cn - 1);
                if ($Vhkhr2kulnam["right"]["style"] === "none" || $Vhkhr2kulnam["right"]["width"] <= 0) {
                    continue;
                }

                $Vs4gloy23a1d = $Vl51al3cn4kp["x"] + $Vl51al3cn4kp["used-width"] + $Vhkhr2kulnam["right"]["width"] / 2;

                $Vhoifq2kocytidths = array(
                    (float)$Vhkhr2kulnam["top"]["width"],
                    (float)$Vhkhr2kulnam["right"]["width"],
                    (float)$Vhkhr2kulnam["bottom"]["width"],
                    (float)$Vhkhr2kulnam["left"]["width"]
                );

                $V1svcpcbr4nm = "_border_" . $Vhkhr2kulnam["right"]["style"];
                $this->$V1svcpcbr4nm($Vs4gloy23a1d, $Vopgub02o3q2, $Vjlmjalejjxa, $Vhkhr2kulnam["right"]["color"], $Vhoifq2kocytidths, "right", "square");
            }
        }

        $V3xsptcgzss2d = $Vnk2ly5jcvjf->get_node()->getAttribute("id");
        if (strlen($V3xsptcgzss2d) > 0)  {
            $this->_canvas->add_named_dest($V3xsptcgzss2d);
        }
    }
}
