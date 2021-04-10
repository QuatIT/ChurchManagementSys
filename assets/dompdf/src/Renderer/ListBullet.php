<?php

namespace Dompdf\Renderer;

use Dompdf\Helpers;
use Dompdf\Frame;
use Dompdf\Image\Cache;
use Dompdf\FrameDecorator\ListBullet as ListBulletFrameDecorator;


class ListBullet extends AbstractRenderer
{
    
    static function get_counter_chars($Vxeifmjzikkj)
    {
        static $V1ph4ewhj5yc = array();

        if (isset($V1ph4ewhj5yc[$Vxeifmjzikkj])) {
            return $V1ph4ewhj5yc[$Vxeifmjzikkj];
        }

        $Vxjvyyu54ojk = false;
        $Vnlbbd31sxbf = "";

        switch ($Vxeifmjzikkj) {
            case "decimal-leading-zero":
            case "decimal":
            case "1":
                return "0123456789";

            case "upper-alpha":
            case "upper-latin":
            case "A":
                $Vxjvyyu54ojk = true;
            case "lower-alpha":
            case "lower-latin":
            case "a":
                $Vnlbbd31sxbf = "abcdefghijklmnopqrstuvwxyz";
                break;

            case "upper-roman":
            case "I":
                $Vxjvyyu54ojk = true;
            case "lower-roman":
            case "i":
                $Vnlbbd31sxbf = "ivxlcdm";
                break;

            case "lower-greek":
                for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < 24; $V3xsptcgzss2++) {
                    $Vnlbbd31sxbf .= Helpers::unichr($V3xsptcgzss2 + 944);
                }
                break;
        }

        if ($Vxjvyyu54ojk) {
            $Vnlbbd31sxbf = strtoupper($Vnlbbd31sxbf);
        }

        return $V1ph4ewhj5yc[$Vxeifmjzikkj] = "$Vnlbbd31sxbf.";
    }

    
    private function make_counter($V1qcutcuyu3m, $Vxeifmjzikkj, $Vipjhkrqa1zd = null)
    {
        $V1qcutcuyu3m = intval($V1qcutcuyu3m);
        $Vnlbbd31sxbf = "";
        $Vxjvyyu54ojk = false;

        switch ($Vxeifmjzikkj) {
            case "decimal-leading-zero":
            case "decimal":
            case "1":
                if ($Vipjhkrqa1zd) {
                    $Vnlbbd31sxbf = str_pad($V1qcutcuyu3m, $Vipjhkrqa1zd, "0", STR_PAD_LEFT);
                } else {
                    $Vnlbbd31sxbf = $V1qcutcuyu3m;
                }
                break;

            case "upper-alpha":
            case "upper-latin":
            case "A":
                $Vxjvyyu54ojk = true;
            case "lower-alpha":
            case "lower-latin":
            case "a":
                $Vnlbbd31sxbf = chr(($V1qcutcuyu3m % 26) + ord('a') - 1);
                break;

            case "upper-roman":
            case "I":
                $Vxjvyyu54ojk = true;
            case "lower-roman":
            case "i":
                $Vnlbbd31sxbf = Helpers::dec2roman($V1qcutcuyu3m);
                break;

            case "lower-greek":
                $Vnlbbd31sxbf = Helpers::unichr($V1qcutcuyu3m + 944);
                break;
        }

        if ($Vxjvyyu54ojk) {
            $Vnlbbd31sxbf = strtoupper($Vnlbbd31sxbf);
        }

        return "$Vnlbbd31sxbf.";
    }

    
    function render(Frame $Vnk2ly5jcvjf)
    {
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        $Vhb0aq3spzmr = $Vdidzwb0w3vc->get_font_size();
        $Vuorjhdyrq1v = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->line_height, $Vnk2ly5jcvjf->get_containing_block("h"));

        $this->_set_opacity($Vnk2ly5jcvjf->get_opacity($Vdidzwb0w3vc->opacity));

        $Vbgtredm0fiw = $Vnk2ly5jcvjf->get_parent();

        
        if ($Vbgtredm0fiw->_splitted) {
            return;
        }

        
        
        if ($Vdidzwb0w3vc->list_style_image !== "none" && !Cache::is_broken($V3xsptcgzss2mg = $Vnk2ly5jcvjf->get_image_url())) {
            list($Vs4gloy23a1d, $Vopgub02o3q2) = $Vnk2ly5jcvjf->get_position();

            
            
            
            
            
            
            list($Vztt3qdrrikx, $Vku40chc0ddp) = Helpers::dompdf_getimagesize($V3xsptcgzss2mg, $this->_dompdf->getHttpContext());
            $Vs5sugw0qedn = $this->_dompdf->getOptions()->getDpi();
            $Vhoifq2kocyt = ((float)rtrim($Vztt3qdrrikx, "px") * 72) / $Vs5sugw0qedn;
            $Vjlmjalejjxa = ((float)rtrim($Vku40chc0ddp, "px") * 72) / $Vs5sugw0qedn;

            $Vs4gloy23a1d -= $Vhoifq2kocyt;
            $Vopgub02o3q2 -= ($Vuorjhdyrq1v - $Vhb0aq3spzmr) / 2; 

            $this->_canvas->image($V3xsptcgzss2mg, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa);
        } else {
            $Vbhj0vfvnjv0 = $Vdidzwb0w3vc->list_style_type;

            $Vm4rhtdms15t = false;

            switch ($Vbhj0vfvnjv0) {
                default:
                
                case "disc":
                    $Vm4rhtdms15t = true;

                case "circle":
                    list($Vs4gloy23a1d, $Vopgub02o3q2) = $Vnk2ly5jcvjf->get_position();
                    $Vkabkv5ip0kg = ($Vhb0aq3spzmr * (ListBulletFrameDecorator::BULLET_SIZE )) / 2;
                    $Vs4gloy23a1d -= $Vhb0aq3spzmr * (ListBulletFrameDecorator::BULLET_SIZE / 2);
                    $Vopgub02o3q2 += ($Vhb0aq3spzmr * (1 - ListBulletFrameDecorator::BULLET_DESCENT)) / 2;
                    $Vsz1vjk4tj2c = $Vhb0aq3spzmr * ListBulletFrameDecorator::BULLET_THICKNESS;
                    $this->_canvas->circle($Vs4gloy23a1d, $Vopgub02o3q2, $Vkabkv5ip0kg, $Vdidzwb0w3vc->color, $Vsz1vjk4tj2c, null, $Vm4rhtdms15t);
                    break;

                case "square":
                    list($Vs4gloy23a1d, $Vopgub02o3q2) = $Vnk2ly5jcvjf->get_position();
                    $Vhoifq2kocyt = $Vhb0aq3spzmr * ListBulletFrameDecorator::BULLET_SIZE;
                    $Vs4gloy23a1d -= $Vhoifq2kocyt;
                    $Vopgub02o3q2 += ($Vhb0aq3spzmr * (1 - ListBulletFrameDecorator::BULLET_DESCENT - ListBulletFrameDecorator::BULLET_SIZE)) / 2;
                    $this->_canvas->filled_rectangle($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vhoifq2kocyt, $Vdidzwb0w3vc->color);
                    break;

                case "decimal-leading-zero":
                case "decimal":
                case "lower-alpha":
                case "lower-latin":
                case "lower-roman":
                case "lower-greek":
                case "upper-alpha":
                case "upper-latin":
                case "upper-roman":
                case "1": 
                case "a":
                case "i":
                case "A":
                case "I":
                    $Vipjhkrqa1zd = null;
                    if ($Vbhj0vfvnjv0 === "decimal-leading-zero") {
                        $Vipjhkrqa1zd = strlen($Vbgtredm0fiw->get_parent()->get_node()->getAttribute("dompdf-children-count"));
                    }

                    $V1qcutcuyu3mode = $Vnk2ly5jcvjf->get_node();

                    if (!$V1qcutcuyu3mode->hasAttribute("dompdf-counter")) {
                        return;
                    }

                    $V3xsptcgzss2ndex = $V1qcutcuyu3mode->getAttribute("dompdf-counter");
                    $Vnlbbd31sxbf = $this->make_counter($V3xsptcgzss2ndex, $Vbhj0vfvnjv0, $Vipjhkrqa1zd);

                    if (trim($Vnlbbd31sxbf) == "") {
                        return;
                    }

                    $Vuwwdaccmizk = 0;
                    $Voynw1ypk2ga = $Vdidzwb0w3vc->font_family;

                    $Vbgtredm0fiwne = $Vbgtredm0fiw->get_containing_line();
                    list($Vs4gloy23a1d, $Vopgub02o3q2) = array($Vnk2ly5jcvjf->get_position("x"), $Vbgtredm0fiwne->y);

                    $Vs4gloy23a1d -= $this->_dompdf->getFontMetrics()->getTextWidth($Vnlbbd31sxbf, $Voynw1ypk2ga, $Vhb0aq3spzmr, $Vuwwdaccmizk);

                    
                    $Vuorjhdyrq1v = $Vdidzwb0w3vc->line_height;
                    $Vopgub02o3q2 += ($Vuorjhdyrq1v - $Vhb0aq3spzmr) / 4; 

                    $this->_canvas->text($Vs4gloy23a1d, $Vopgub02o3q2, $Vnlbbd31sxbf,
                        $Voynw1ypk2ga, $Vhb0aq3spzmr,
                        $Vdidzwb0w3vc->color, $Vuwwdaccmizk);

                case "none":
                    break;
            }
        }

        $V3xsptcgzss2d = $Vnk2ly5jcvjf->get_node()->getAttribute("id");
        if (strlen($V3xsptcgzss2d) > 0)  {
            $this->_canvas->add_named_dest($V3xsptcgzss2d);
        }
    }
}
