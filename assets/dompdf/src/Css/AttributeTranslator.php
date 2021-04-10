<?php

namespace Dompdf\Css;

use Dompdf\Frame;


class AttributeTranslator
{
    static $Vw5xf5zlbnxa = "_html_style_attribute";

    
    
    
    static private $Virhqnzggdec = array(
        
        'img' => array(
            'align' => array(
                'bottom' => 'vertical-align: baseline;',
                'middle' => 'vertical-align: middle;',
                'top' => 'vertical-align: top;',
                'left' => 'float: left;',
                'right' => 'float: right;'
            ),
            'border' => 'border: %0.2Fpx solid;',
            'height' => 'height: %spx;',
            'hspace' => 'padding-left: %1$0.2Fpx; padding-right: %1$0.2Fpx;',
            'vspace' => 'padding-top: %1$0.2Fpx; padding-bottom: %1$0.2Fpx;',
            'width' => 'width: %spx;',
        ),
        'table' => array(
            'align' => array(
                'left' => 'margin-left: 0; margin-right: auto;',
                'center' => 'margin-left: auto; margin-right: auto;',
                'right' => 'margin-left: auto; margin-right: 0;'
            ),
            'bgcolor' => 'background-color: %s;',
            'border' => '!set_table_border',
            'cellpadding' => '!set_table_cellpadding', 
            'cellspacing' => '!set_table_cellspacing',
            'frame' => array(
                'void' => 'border-style: none;',
                'above' => 'border-top-style: solid;',
                'below' => 'border-bottom-style: solid;',
                'hsides' => 'border-left-style: solid; border-right-style: solid;',
                'vsides' => 'border-top-style: solid; border-bottom-style: solid;',
                'lhs' => 'border-left-style: solid;',
                'rhs' => 'border-right-style: solid;',
                'box' => 'border-style: solid;',
                'border' => 'border-style: solid;'
            ),
            'rules' => '!set_table_rules',
            'width' => 'width: %s;',
        ),
        'hr' => array(
            'align' => '!set_hr_align', 
            'noshade' => 'border-style: solid;',
            'size' => '!set_hr_size', 
            'width' => 'width: %s;',
        ),
        'div' => array(
            'align' => 'text-align: %s;',
        ),
        'h1' => array(
            'align' => 'text-align: %s;',
        ),
        'h2' => array(
            'align' => 'text-align: %s;',
        ),
        'h3' => array(
            'align' => 'text-align: %s;',
        ),
        'h4' => array(
            'align' => 'text-align: %s;',
        ),
        'h5' => array(
            'align' => 'text-align: %s;',
        ),
        'h6' => array(
            'align' => 'text-align: %s;',
        ),
        
        'input' => array(
            'size' => '!set_input_width'
        ),
        'p' => array(
            'align' => 'text-align: %s;',
        ),








        'tbody' => array(
            'align' => '!set_table_row_align',
            'valign' => '!set_table_row_valign',
        ),
        'td' => array(
            'align' => 'text-align: %s;',
            'bgcolor' => '!set_background_color',
            'height' => 'height: %s;',
            'nowrap' => 'white-space: nowrap;',
            'valign' => 'vertical-align: %s;',
            'width' => 'width: %s;',
        ),
        'tfoot' => array(
            'align' => '!set_table_row_align',
            'valign' => '!set_table_row_valign',
        ),
        'th' => array(
            'align' => 'text-align: %s;',
            'bgcolor' => '!set_background_color',
            'height' => 'height: %s;',
            'nowrap' => 'white-space: nowrap;',
            'valign' => 'vertical-align: %s;',
            'width' => 'width: %s;',
        ),
        'thead' => array(
            'align' => '!set_table_row_align',
            'valign' => '!set_table_row_valign',
        ),
        'tr' => array(
            'align' => '!set_table_row_align',
            'bgcolor' => '!set_table_row_bgcolor',
            'valign' => '!set_table_row_valign',
        ),
        'body' => array(
            'background' => 'background-image: url(%s);',
            'bgcolor' => '!set_background_color',
            'link' => '!set_body_link',
            'text' => '!set_color',
        ),
        'br' => array(
            'clear' => 'clear: %s;',
        ),
        'basefont' => array(
            'color' => '!set_color',
            'face' => 'font-family: %s;',
            'size' => '!set_basefont_size',
        ),
        'font' => array(
            'color' => '!set_color',
            'face' => 'font-family: %s;',
            'size' => '!set_font_size',
        ),
        'dir' => array(
            'compact' => 'margin: 0.5em 0;',
        ),
        'dl' => array(
            'compact' => 'margin: 0.5em 0;',
        ),
        'menu' => array(
            'compact' => 'margin: 0.5em 0;',
        ),
        'ol' => array(
            'compact' => 'margin: 0.5em 0;',
            'start' => 'counter-reset: -dompdf-default-counter %d;',
            'type' => 'list-style-type: %s;',
        ),
        'ul' => array(
            'compact' => 'margin: 0.5em 0;',
            'type' => 'list-style-type: %s;',
        ),
        'li' => array(
            'type' => 'list-style-type: %s;',
            'value' => 'counter-reset: -dompdf-default-counter %d;',
        ),
        'pre' => array(
            'width' => 'width: %s;',
        ),
    );

    static protected $V4aq2qll1pfa = 3;
    static protected $Vgqwdvcexwb5 = array(
        
        -3 => "4pt",
        -2 => "5pt",
        -1 => "6pt",
        0 => "7pt",

        1 => "8pt",
        2 => "10pt",
        3 => "12pt",
        4 => "14pt",
        5 => "18pt",
        6 => "24pt",
        7 => "34pt",

        
        8 => "48pt",
        9 => "44pt",
        10 => "52pt",
        11 => "60pt",
    );

    
    static function translate_attributes(Frame $Vnk2ly5jcvjf)
    {
        $Vbr2bywdrplx = $Vnk2ly5jcvjf->get_node();
        $Vudn5fb5ck4i = $Vbr2bywdrplx->nodeName;

        if (!isset(self::$Virhqnzggdec[$Vudn5fb5ck4i])) {
            return;
        }

        $Via0htgwmksk = self::$Virhqnzggdec[$Vudn5fb5ck4i];
        $Vtcc1ivip2fh = $Vbr2bywdrplx->attributes;
        $Vdidzwb0w3vc = rtrim($Vbr2bywdrplx->getAttribute(self::$Vw5xf5zlbnxa), "; ");
        if ($Vdidzwb0w3vc != "") {
            $Vdidzwb0w3vc .= ";";
        }

        foreach ($Vtcc1ivip2fh as $Vfhakhidzne2 => $Vfhakhidzne2_node) {
            if (!isset($Via0htgwmksk[$Vfhakhidzne2])) {
                continue;
            }

            $Vqfra35f14fv = $Vfhakhidzne2_node->value;

            $Vu4wqouveu13 = $Via0htgwmksk[$Vfhakhidzne2];

            
            if (is_array($Vu4wqouveu13)) {
                if (isset($Vu4wqouveu13[$Vqfra35f14fv])) {
                    $Vdidzwb0w3vc .= " " . self::_resolve_target($Vbr2bywdrplx, $Vu4wqouveu13[$Vqfra35f14fv], $Vqfra35f14fv);
                }
            } else {
                
                $Vdidzwb0w3vc .= " " . self::_resolve_target($Vbr2bywdrplx, $Vu4wqouveu13, $Vqfra35f14fv);
            }
        }

        if (!is_null($Vdidzwb0w3vc)) {
            $Vdidzwb0w3vc = ltrim($Vdidzwb0w3vc);
            $Vbr2bywdrplx->setAttribute(self::$Vw5xf5zlbnxa, $Vdidzwb0w3vc);
        }

    }

    
    static protected function _resolve_target(\DOMNode $Vbr2bywdrplx, $Vu4wqouveu13, $Vqfra35f14fv)
    {
        if ($Vu4wqouveu13[0] === "!") {
            
            $Vhhv3tomoeyc = "_" . mb_substr($Vu4wqouveu13, 1);

            return self::$Vhhv3tomoeyc($Vbr2bywdrplx, $Vqfra35f14fv);
        }

        return $Vqfra35f14fv ? sprintf($Vu4wqouveu13, $Vqfra35f14fv) : "";
    }

    
    static function append_style(\DOMElement $Vbr2bywdrplx, $Vvkp23uyeydw)
    {
        $Vdidzwb0w3vc = rtrim($Vbr2bywdrplx->getAttribute(self::$Vw5xf5zlbnxa), ";");
        $Vdidzwb0w3vc .= $Vvkp23uyeydw;
        $Vdidzwb0w3vc = ltrim($Vdidzwb0w3vc, ";");
        $Vbr2bywdrplx->setAttribute(self::$Vw5xf5zlbnxa, $Vdidzwb0w3vc);
    }

    
    static protected function get_cell_list(\DOMNode $Vbr2bywdrplx)
    {
        $Vxp0j315zxdb = new \DOMXpath($Vbr2bywdrplx->ownerDocument);

        switch ($Vbr2bywdrplx->nodeName) {
            default:
            case "table":
                $Vgs5eqsoia35 = "tr/td | thead/tr/td | tbody/tr/td | tfoot/tr/td | tr/th | thead/tr/th | tbody/tr/th | tfoot/tr/th";
                break;

            case "tbody":
            case "tfoot":
            case "thead":
                $Vgs5eqsoia35 = "tr/td | tr/th";
                break;

            case "tr":
                $Vgs5eqsoia35 = "td | th";
                break;
        }

        return $Vxp0j315zxdb->query($Vgs5eqsoia35, $Vbr2bywdrplx);
    }

    
    static protected function _get_valid_color($Vqfra35f14fv)
    {
        if (preg_match('/^#?([0-9A-F]{6})$/i', $Vqfra35f14fv, $Vxve4maip4vq)) {
            $Vqfra35f14fv = "#$Vxve4maip4vq[1]";
        }

        return $Vqfra35f14fv;
    }

    
    static protected function _set_color(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        $Vqfra35f14fv = self::_get_valid_color($Vqfra35f14fv);

        return "color: $Vqfra35f14fv;";
    }

    
    static protected function _set_background_color(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        $Vqfra35f14fv = self::_get_valid_color($Vqfra35f14fv);

        return "background-color: $Vqfra35f14fv;";
    }

    
    static protected function _set_table_cellpadding(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        $Vpp1x5clcznq = self::get_cell_list($Vbr2bywdrplx);

        foreach ($Vpp1x5clcznq as $Vclbxxw1bsss) {
            self::append_style($Vclbxxw1bsss, "; padding: {$Vqfra35f14fv}px;");
        }

        return null;
    }

    
    static protected function _set_table_border(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        $Vpp1x5clcznq = self::get_cell_list($Vbr2bywdrplx);

        foreach ($Vpp1x5clcznq as $Vclbxxw1bsss) {
            $Vdidzwb0w3vc = rtrim($Vclbxxw1bsss->getAttribute(self::$Vw5xf5zlbnxa));
            $Vdidzwb0w3vc .= "; border-width: " . ($Vqfra35f14fv > 0 ? 1 : 0) . "pt; border-style: inset;";
            $Vdidzwb0w3vc = ltrim($Vdidzwb0w3vc, ";");
            $Vclbxxw1bsss->setAttribute(self::$Vw5xf5zlbnxa, $Vdidzwb0w3vc);
        }

        $Vdidzwb0w3vc = rtrim($Vbr2bywdrplx->getAttribute(self::$Vw5xf5zlbnxa), ";");
        $Vdidzwb0w3vc .= "; border-width: $Vqfra35f14fv" . "px; ";

        return ltrim($Vdidzwb0w3vc, "; ");
    }

    
    static protected function _set_table_cellspacing(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        $Vdidzwb0w3vc = rtrim($Vbr2bywdrplx->getAttribute(self::$Vw5xf5zlbnxa), ";");

        if ($Vqfra35f14fv == 0) {
            $Vdidzwb0w3vc .= "; border-collapse: collapse;";
        } else {
            $Vdidzwb0w3vc .= "; border-spacing: {$Vqfra35f14fv}px; border-collapse: separate;";
        }

        return ltrim($Vdidzwb0w3vc, ";");
    }

    
    static protected function _set_table_rules(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        $Vvkp23uyeydw = "; border-collapse: collapse;";

        switch ($Vqfra35f14fv) {
            case "none":
                $Vvkp23uyeydw .= "border-style: none;";
                break;

            case "groups":
                
                return null;

            case "rows":
                $Vvkp23uyeydw .= "border-style: solid none solid none; border-width: 1px; ";
                break;

            case "cols":
                $Vvkp23uyeydw .= "border-style: none solid none solid; border-width: 1px; ";
                break;

            case "all":
                $Vvkp23uyeydw .= "border-style: solid; border-width: 1px; ";
                break;

            default:
                
                return null;
        }

        $Vpp1x5clcznq = self::get_cell_list($Vbr2bywdrplx);

        foreach ($Vpp1x5clcznq as $Vclbxxw1bsss) {
            $Vdidzwb0w3vc = $Vclbxxw1bsss->getAttribute(self::$Vw5xf5zlbnxa);
            $Vdidzwb0w3vc .= $Vvkp23uyeydw;
            $Vclbxxw1bsss->setAttribute(self::$Vw5xf5zlbnxa, $Vdidzwb0w3vc);
        }

        $Vdidzwb0w3vc = rtrim($Vbr2bywdrplx->getAttribute(self::$Vw5xf5zlbnxa), ";");
        $Vdidzwb0w3vc .= "; border-collapse: collapse; ";

        return ltrim($Vdidzwb0w3vc, "; ");
    }

    
    static protected function _set_hr_size(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        $Vdidzwb0w3vc = rtrim($Vbr2bywdrplx->getAttribute(self::$Vw5xf5zlbnxa), ";");
        $Vdidzwb0w3vc .= "; border-width: " . max(0, $Vqfra35f14fv - 2) . "; ";

        return ltrim($Vdidzwb0w3vc, "; ");
    }

    
    static protected function _set_hr_align(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        $Vdidzwb0w3vc = rtrim($Vbr2bywdrplx->getAttribute(self::$Vw5xf5zlbnxa), ";");
        $Vztt3qdrrikx = $Vbr2bywdrplx->getAttribute("width");

        if ($Vztt3qdrrikx == "") {
            $Vztt3qdrrikx = "100%";
        }

        $V4jtpwyd3efq = 100 - (double)rtrim($Vztt3qdrrikx, "% ");

        switch ($Vqfra35f14fv) {
            case "left":
                $Vdidzwb0w3vc .= "; margin-right: $V4jtpwyd3efq %;";
                break;

            case "right":
                $Vdidzwb0w3vc .= "; margin-left: $V4jtpwyd3efq %;";
                break;

            case "center":
                $Vdidzwb0w3vc .= "; margin-left: auto; margin-right: auto;";
                break;

            default:
                return null;
        }

        return ltrim($Vdidzwb0w3vc, "; ");
    }

    
    static protected function _set_input_width(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        if (empty($Vqfra35f14fv)) { return null; }

        if ($Vbr2bywdrplx->hasAttribute("type") && in_array(strtolower($Vbr2bywdrplx->getAttribute("type")), array("text","password"))) {
            return sprintf("width: %Fem", (((int)$Vqfra35f14fv * .65)+2));
        } else {
            return sprintf("width: %upx;", (int)$Vqfra35f14fv);
        }
    }

    
    static protected function _set_table_row_align(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        $Vpp1x5clcznq = self::get_cell_list($Vbr2bywdrplx);

        foreach ($Vpp1x5clcznq as $Vclbxxw1bsss) {
            self::append_style($Vclbxxw1bsss, "; text-align: $Vqfra35f14fv;");
        }

        return null;
    }

    
    static protected function _set_table_row_valign(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        $Vpp1x5clcznq = self::get_cell_list($Vbr2bywdrplx);

        foreach ($Vpp1x5clcznq as $Vclbxxw1bsss) {
            self::append_style($Vclbxxw1bsss, "; vertical-align: $Vqfra35f14fv;");
        }

        return null;
    }

    
    static protected function _set_table_row_bgcolor(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        $Vpp1x5clcznq = self::get_cell_list($Vbr2bywdrplx);
        $Vqfra35f14fv = self::_get_valid_color($Vqfra35f14fv);

        foreach ($Vpp1x5clcznq as $Vclbxxw1bsss) {
            self::append_style($Vclbxxw1bsss, "; background-color: $Vqfra35f14fv;");
        }

        return null;
    }

    
    static protected function _set_body_link(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        $Vgqxodhfatsj = $Vbr2bywdrplx->getElementsByTagName("a");
        $Vqfra35f14fv = self::_get_valid_color($Vqfra35f14fv);

        foreach ($Vgqxodhfatsj as $Vrr3orqjztc2) {
            self::append_style($Vrr3orqjztc2, "; color: $Vqfra35f14fv;");
        }

        return null;
    }

    
    static protected function _set_basefont_size(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        
        
        self::$V4aq2qll1pfa = $Vqfra35f14fv;

        return null;
    }

    
    static protected function _set_font_size(\DOMElement $Vbr2bywdrplx, $Vqfra35f14fv)
    {
        $Vdidzwb0w3vc = $Vbr2bywdrplx->getAttribute(self::$Vw5xf5zlbnxa);

        if ($Vqfra35f14fv[0] === "-" || $Vqfra35f14fv[0] === "+") {
            $Vqfra35f14fv = self::$V4aq2qll1pfa + (int)$Vqfra35f14fv;
        }

        if (isset(self::$Vgqwdvcexwb5[$Vqfra35f14fv])) {
            $Vdidzwb0w3vc .= "; font-size: " . self::$Vgqwdvcexwb5[$Vqfra35f14fv] . ";";
        } else {
            $Vdidzwb0w3vc .= "; font-size: $Vqfra35f14fv;";
        }

        return ltrim($Vdidzwb0w3vc, "; ");
    }
}
