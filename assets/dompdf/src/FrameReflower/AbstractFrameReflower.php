<?php

namespace Dompdf\FrameReflower;

use Dompdf\Adapter\CPDF;
use Dompdf\Css\Style;
use Dompdf\Dompdf;
use Dompdf\Helpers;
use Dompdf\Frame;
use Dompdf\FrameDecorator\Block;
use Dompdf\Frame\Factory;


abstract class AbstractFrameReflower
{

    
    protected $Vtabfexfghu0;

    
    protected $V5dbawoo4gm2;

    
    function __construct(Frame $Vnk2ly5jcvjf)
    {
        $Vcki4t4qmybshis->_frame = $Vnk2ly5jcvjf;
        $Vcki4t4qmybshis->_min_max_cache = null;
    }

    function dispose()
    {
    }

    
    function get_dompdf()
    {
        return $Vcki4t4qmybshis->_frame->get_dompdf();
    }

    
    protected function _collapse_margins()
    {
        $Vnk2ly5jcvjf = $Vcki4t4qmybshis->_frame;
        $Vavdpq045wub = $Vnk2ly5jcvjf->get_containing_block();
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();

        
        if (!$Vnk2ly5jcvjf->is_in_flow() || $Vnk2ly5jcvjf->is_inline_block()) {
            return;
        }

        $Vcki4t4qmybs = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_top, $Vavdpq045wub["h"]);
        $Vbz3vmbr1h2v = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_bottom, $Vavdpq045wub["h"]);

        
        if ($Vcki4t4qmybs === "auto") {
            $Vdidzwb0w3vc->margin_top = "0pt";
            $Vcki4t4qmybs = 0;
        }

        if ($Vbz3vmbr1h2v === "auto") {
            $Vdidzwb0w3vc->margin_bottom = "0pt";
            $Vbz3vmbr1h2v = 0;
        }

        
        $V1qcutcuyu3m = $Vnk2ly5jcvjf->get_next_sibling();
        if ( $V1qcutcuyu3m && !$V1qcutcuyu3m->is_block() & !$V1qcutcuyu3m->is_table() ) {
            while ($V1qcutcuyu3m = $V1qcutcuyu3m->get_next_sibling()) {
                if ($V1qcutcuyu3m->is_block() || $V1qcutcuyu3m->is_table()) {
                    break;
                }

                if (!$V1qcutcuyu3m->get_first_child()) {
                    $V1qcutcuyu3m = null;
                    break;
                }
            }
        }

        if ($V1qcutcuyu3m) {
            $V1qcutcuyu3m_style = $V1qcutcuyu3m->get_style();
            $V1qcutcuyu3m_t = (float)$V1qcutcuyu3m_style->length_in_pt($V1qcutcuyu3m_style->margin_top, $Vavdpq045wub["h"]);

            $Vbz3vmbr1h2v = $Vcki4t4qmybshis->_get_collapsed_margin_length($Vbz3vmbr1h2v, $V1qcutcuyu3m_t);
            $Vdidzwb0w3vc->margin_bottom = $Vbz3vmbr1h2v . "pt";
            $V1qcutcuyu3m_style->margin_top = "0pt";
        }

        
        if ($Vdidzwb0w3vc->get_border_top_width() == 0 && $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->padding_top) == 0) {
            $V4ljftfdeqpl = $Vcki4t4qmybshis->_frame->get_first_child();
            if ( $V4ljftfdeqpl && !$V4ljftfdeqpl->is_block() && !$V4ljftfdeqpl->is_table() ) {
                while ( $V4ljftfdeqpl = $V4ljftfdeqpl->get_next_sibling() ) {
                    if ( $V4ljftfdeqpl->is_block() || $V4ljftfdeqpl->is_table() ) {
                        break;
                    }

                    if ( !$V4ljftfdeqpl->get_first_child() ) {
                        $V4ljftfdeqpl = null;
                        break;
                    }
                }
            }

            
            if ($V4ljftfdeqpl) {
                $V4ljftfdeqpl_style = $V4ljftfdeqpl->get_style();
                $V4ljftfdeqpl_t = (float)$V4ljftfdeqpl_style->length_in_pt($V4ljftfdeqpl_style->margin_top, $Vavdpq045wub["h"]);

                $Vcki4t4qmybs = $Vcki4t4qmybshis->_get_collapsed_margin_length($Vcki4t4qmybs, $V4ljftfdeqpl_t);
                $Vdidzwb0w3vc->margin_top = $Vcki4t4qmybs."pt";
                $V4ljftfdeqpl_style->margin_top = "0pt";
            }
        }

        
        if ($Vdidzwb0w3vc->get_border_bottom_width() == 0 && $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->padding_bottom) == 0) {
            $V3nb02w01gr5 = $Vcki4t4qmybshis->_frame->get_last_child();
            if ( $V3nb02w01gr5 && !$V3nb02w01gr5->is_block() && !$V3nb02w01gr5->is_table() ) {
                while ( $V3nb02w01gr5 = $V3nb02w01gr5->get_prev_sibling() ) {
                    if ( $V3nb02w01gr5->is_block() || $V3nb02w01gr5->is_table() ) {
                        break;
                    }

                    if ( !$V3nb02w01gr5->get_last_child() ) {
                        $V3nb02w01gr5 = null;
                        break;
                    }
                }
            }

            
            if ($V3nb02w01gr5) {
                $V3nb02w01gr5_style = $V3nb02w01gr5->get_style();
                $V3nb02w01gr5_b = (float)$V3nb02w01gr5_style->length_in_pt($V3nb02w01gr5_style->margin_bottom, $Vavdpq045wub["h"]);

                $Vbz3vmbr1h2v = $Vcki4t4qmybshis->_get_collapsed_margin_length($Vbz3vmbr1h2v, $V3nb02w01gr5_b);
                $Vdidzwb0w3vc->margin_bottom = $Vbz3vmbr1h2v."pt";
                $V3nb02w01gr5_style->margin_bottom = "0pt";
            }
        }
    }

    
    private function _get_collapsed_margin_length($V3nb02w01gr5ength1, $V3nb02w01gr5ength2)
    {
        if ($V3nb02w01gr5ength1 < 0 && $V3nb02w01gr5ength2 < 0) {
            return min($V3nb02w01gr5ength1, $V3nb02w01gr5ength2); 
        }

        if ($V3nb02w01gr5ength1 < 0 || $V3nb02w01gr5ength2 < 0) {
            return $V3nb02w01gr5ength1 + $V3nb02w01gr5ength2; 
        }

        return max($V3nb02w01gr5ength1, $V3nb02w01gr5ength2);
    }

    
    abstract function reflow(Block $Vbz3vmbr1h2vlock = null);

    
    function get_min_max_width()
    {
        if (!is_null($Vcki4t4qmybshis->_min_max_cache)) {
            return $Vcki4t4qmybshis->_min_max_cache;
        }

        $Vdidzwb0w3vc = $Vcki4t4qmybshis->_frame->get_style();

        
        $Vo1o33y03ae2 = array($Vdidzwb0w3vc->padding_left,
            $Vdidzwb0w3vc->padding_right,
            $Vdidzwb0w3vc->border_left_width,
            $Vdidzwb0w3vc->border_right_width,
            $Vdidzwb0w3vc->margin_left,
            $Vdidzwb0w3vc->margin_right);

        $Vavdpq045wub_w = $Vcki4t4qmybshis->_frame->get_containing_block("w");
        $Vdim3b3fegnk = (float)$Vdidzwb0w3vc->length_in_pt($Vo1o33y03ae2, $Vavdpq045wub_w);

        
        if (!$Vcki4t4qmybshis->_frame->get_first_child()) {
            return $Vcki4t4qmybshis->_min_max_cache = array(
                $Vdim3b3fegnk, $Vdim3b3fegnk,
                "min" => $Vdim3b3fegnk,
                "max" => $Vdim3b3fegnk,
            );
        }

        $V3nb02w01gr5ow = array();
        $Vlzzam5wukfo = array();

        for ($Vqz1antku1y3 = $Vcki4t4qmybshis->_frame->get_children()->getIterator(); $Vqz1antku1y3->valid(); $Vqz1antku1y3->next()) {
            $Veovd4ewwjmq = 0;
            $V3soycu2yr2r = 0;

            
            while ($Vqz1antku1y3->valid() && in_array($Vqz1antku1y3->current()->get_style()->display, Style::$V3irmujeshqx)) {
                $Vtcc233inn5m = $Vqz1antku1y3->current();

                $Vfsfrnel5hhj = $Vtcc233inn5m->get_min_max_width();

                if (in_array($Vqz1antku1y3->current()->get_style()->white_space, array("pre", "nowrap"))) {
                    $Veovd4ewwjmq += $Vfsfrnel5hhj["min"];
                } else {
                    $V3nb02w01gr5ow[] = $Vfsfrnel5hhj["min"];
                }

                $V3soycu2yr2r += $Vfsfrnel5hhj["max"];
                $Vqz1antku1y3->next();
            }

            if ($V3soycu2yr2r > 0) {
                $Vlzzam5wukfo[] = $V3soycu2yr2r;
            }
            if ($Veovd4ewwjmq > 0) {
                $V3nb02w01gr5ow[] = $Veovd4ewwjmq;
            }

            if ($Vqz1antku1y3->valid()) {
                list($V3nb02w01gr5ow[], $Vlzzam5wukfo[]) = $Vqz1antku1y3->current()->get_min_max_width();
                continue;
            }
        }
        $V2nh50bvjhl4 = count($V3nb02w01gr5ow) ? max($V3nb02w01gr5ow) : 0;
        $Vc1ytxzqpa5h = count($Vlzzam5wukfo) ? max($Vlzzam5wukfo) : 0;

        
        
        $Vztt3qdrrikx = $Vdidzwb0w3vc->width;
        if ($Vztt3qdrrikx !== "auto" && !Helpers::is_percent($Vztt3qdrrikx)) {
            $Vztt3qdrrikx = (float)$Vdidzwb0w3vc->length_in_pt($Vztt3qdrrikx, $Vavdpq045wub_w);
            if ($V2nh50bvjhl4 < $Vztt3qdrrikx) {
                $V2nh50bvjhl4 = $Vztt3qdrrikx;
            }
            if ($Vc1ytxzqpa5h < $Vztt3qdrrikx) {
                $Vc1ytxzqpa5h = $Vztt3qdrrikx;
            }
        }

        $V2nh50bvjhl4 += $Vdim3b3fegnk;
        $Vc1ytxzqpa5h += $Vdim3b3fegnk;
        return $Vcki4t4qmybshis->_min_max_cache = array($V2nh50bvjhl4, $Vc1ytxzqpa5h, "min" => $V2nh50bvjhl4, "max" => $Vc1ytxzqpa5h);
    }

    
    protected function _parse_string($V5jic1hsgori, $Vmsieq4gunur = false)
    {
        if ($Vmsieq4gunur) {
            $V5jic1hsgori = preg_replace('/^[\"\']/', "", $V5jic1hsgori);
            $V5jic1hsgori = preg_replace('/[\"\']$/', "", $V5jic1hsgori);
        } else {
            $V5jic1hsgori = trim($V5jic1hsgori, "'\"");
        }

        $V5jic1hsgori = str_replace(array("\\\n", '\\"', "\\'"),
            array("", '"', "'"), $V5jic1hsgori);

        
        $V5jic1hsgori = preg_replace_callback("/\\\\([0-9a-fA-F]{0,6})/",
            function ($Vxve4maip4vq) { return \Dompdf\Helpers::unichr(hexdec($Vxve4maip4vq[1])); },
            $V5jic1hsgori);
        return $V5jic1hsgori;
    }

    
    protected function _parse_quotes()
    {
        
        $Vvht4h04zxje = '/(\'[^\']*\')|(\"[^\"]*\")/';

        $Vznnzjndq4fv = $Vcki4t4qmybshis->_frame->get_style()->quotes;

        
        if (!preg_match_all($Vvht4h04zxje, "$Vznnzjndq4fv", $Vxve4maip4vq, PREG_SET_ORDER)) {
            return null;
        }

        $Vznnzjndq4fv_array = array();
        foreach ($Vxve4maip4vq as $Vpbxedwn2t35) {
            $Vznnzjndq4fv_array[] = $Vcki4t4qmybshis->_parse_string($Vpbxedwn2t35[0], true);
        }

        if (empty($Vznnzjndq4fv_array)) {
            $Vznnzjndq4fv_array = array('"', '"');
        }

        return array_chunk($Vznnzjndq4fv_array, 2);
    }

    
    protected function _parse_content()
    {
        
        $Vvht4h04zxje = "/\n" .
            "\s(counters?\\([^)]*\\))|\n" .
            "\A(counters?\\([^)]*\\))|\n" .
            "\s([\"']) ( (?:[^\"']|\\\\[\"'])+ )(?<!\\\\)\\3|\n" .
            "\A([\"']) ( (?:[^\"']|\\\\[\"'])+ )(?<!\\\\)\\5|\n" .
            "\s([^\s\"']+)|\n" .
            "\A([^\s\"']+)\n" .
            "/xi";

        $Voqcz2syuhkg = $Vcki4t4qmybshis->_frame->get_style()->content;

        $Vznnzjndq4fv = $Vcki4t4qmybshis->_parse_quotes();

        
        if (!preg_match_all($Vvht4h04zxje, $Voqcz2syuhkg, $Vxve4maip4vq, PREG_SET_ORDER)) {
            return null;
        }

        $Vcki4t4qmybsext = "";

        foreach ($Vxve4maip4vq as $Vyupu15qqw5c) {
            if (isset($Vyupu15qqw5c[2]) && $Vyupu15qqw5c[2] !== "") {
                $Vyupu15qqw5c[1] = $Vyupu15qqw5c[2];
            }

            if (isset($Vyupu15qqw5c[6]) && $Vyupu15qqw5c[6] !== "") {
                $Vyupu15qqw5c[4] = $Vyupu15qqw5c[6];
            }

            if (isset($Vyupu15qqw5c[8]) && $Vyupu15qqw5c[8] !== "") {
                $Vyupu15qqw5c[7] = $Vyupu15qqw5c[8];
            }

            if (isset($Vyupu15qqw5c[1]) && $Vyupu15qqw5c[1] !== "") {
                
                $Vyupu15qqw5c[1] = mb_strtolower(trim($Vyupu15qqw5c[1]));

                
                

                $V3xsptcgzss2 = mb_strpos($Vyupu15qqw5c[1], ")");
                if ($V3xsptcgzss2 === false) {
                    continue;
                }

                preg_match('/(counters?)(^\()*?\(\s*([^\s,]+)\s*(,\s*["\']?([^"\'\)]+)["\']?\s*(,\s*([^\s)]+)\s*)?)?\)/i', $Vyupu15qqw5c[1], $Vnwpk5tnngxb);
                $Vjhr3wfva5ux = $Vnwpk5tnngxb[3];
                if (strtolower($Vnwpk5tnngxb[1]) == 'counter') {
                    
                    if (isset($Vnwpk5tnngxb[5])) {
                        $Vcki4t4qmybsype = trim($Vnwpk5tnngxb[5]);
                    } else {
                        $Vcki4t4qmybsype = null;
                    }
                    $Vksopkgqixky = $Vcki4t4qmybshis->_frame->lookup_counter_frame($Vjhr3wfva5ux);

                    $Vcki4t4qmybsext .= $Vksopkgqixky->counter_value($Vjhr3wfva5ux, $Vcki4t4qmybsype);

                } else if (strtolower($Vnwpk5tnngxb[1]) == 'counters') {
                    
                    if (isset($Vnwpk5tnngxb[5])) {
                        $V5jic1hsgori = $Vcki4t4qmybshis->_parse_string($Vnwpk5tnngxb[5]);
                    } else {
                        $V5jic1hsgori = "";
                    }

                    if (isset($Vnwpk5tnngxb[7])) {
                        $Vcki4t4qmybsype = trim($Vnwpk5tnngxb[7]);
                    } else {
                        $Vcki4t4qmybsype = null;
                    }

                    $Vksopkgqixky = $Vcki4t4qmybshis->_frame->lookup_counter_frame($Vjhr3wfva5ux);
                    $Vcki4t4qmybsmp = array();
                    while ($Vksopkgqixky) {
                        
                        if (array_key_exists($Vjhr3wfva5ux, $Vksopkgqixky->_counters)) {
                            array_unshift($Vcki4t4qmybsmp, $Vksopkgqixky->counter_value($Vjhr3wfva5ux, $Vcki4t4qmybsype));
                        }
                        $Vksopkgqixky = $Vksopkgqixky->lookup_counter_frame($Vjhr3wfva5ux);
                    }
                    $Vcki4t4qmybsext .= implode($V5jic1hsgori, $Vcki4t4qmybsmp);
                } else {
                    
                    continue;
                }

            } else if (isset($Vyupu15qqw5c[4]) && $Vyupu15qqw5c[4] !== "") {
                
                $Vcki4t4qmybsext .= $Vcki4t4qmybshis->_parse_string($Vyupu15qqw5c[4]);
            } else if (isset($Vyupu15qqw5c[7]) && $Vyupu15qqw5c[7] !== "") {
                

                if ($Vyupu15qqw5c[7] === "open-quote") {
                    
                    $Vcki4t4qmybsext .= $Vznnzjndq4fv[0][0];
                } else if ($Vyupu15qqw5c[7] === "close-quote") {
                    
                    $Vcki4t4qmybsext .= $Vznnzjndq4fv[0][1];
                } else if ($Vyupu15qqw5c[7] === "no-open-quote") {
                    
                } else if ($Vyupu15qqw5c[7] === "no-close-quote") {
                    
                } else if (mb_strpos($Vyupu15qqw5c[7], "attr(") === 0) {
                    $V3xsptcgzss2 = mb_strpos($Vyupu15qqw5c[7], ")");
                    if ($V3xsptcgzss2 === false) {
                        continue;
                    }

                    $Vfhakhidzne2 = mb_substr($Vyupu15qqw5c[7], 5, $V3xsptcgzss2 - 5);
                    if ($Vfhakhidzne2 == "") {
                        continue;
                    }

                    $Vcki4t4qmybsext .= $Vcki4t4qmybshis->_frame->get_parent()->get_node()->getAttribute($Vfhakhidzne2);
                } else {
                    continue;
                }
            }
        }

        return $Vcki4t4qmybsext;
    }

    
    protected function _set_content()
    {
        $Vnk2ly5jcvjf = $Vcki4t4qmybshis->_frame;
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();

        
        if ($Vdidzwb0w3vc->counter_reset && ($Vvht4h04zxjeset = $Vdidzwb0w3vc->counter_reset) !== "none") {
            $Vjtba0lz024s = preg_split('/\s+/', trim($Vvht4h04zxjeset), 2);
            $Vnk2ly5jcvjf->reset_counter($Vjtba0lz024s[0], (isset($Vnk2ly5jcvjf->_counters['__' . $Vjtba0lz024s[0]]) ? $Vnk2ly5jcvjf->_counters['__' . $Vjtba0lz024s[0]] : (isset($Vjtba0lz024s[1]) ? $Vjtba0lz024s[1] : 0)));
        }

        if ($Vdidzwb0w3vc->counter_increment && ($V3xsptcgzss2ncrement = $Vdidzwb0w3vc->counter_increment) !== "none") {
            $Vnk2ly5jcvjf->increment_counters($V3xsptcgzss2ncrement);
        }

        if ($Vdidzwb0w3vc->content && $Vnk2ly5jcvjf->get_node()->nodeName === "dompdf_generated") {
            $Voqcz2syuhkg = $Vcki4t4qmybshis->_parse_content();
            
            
            
            if ($Vnk2ly5jcvjf->get_dompdf()->getOptions()->getIsFontSubsettingEnabled() && $Vnk2ly5jcvjf->get_dompdf()->get_canvas() instanceof CPDF) {
                $Vnk2ly5jcvjf->get_dompdf()->get_canvas()->register_string_subset($Vdidzwb0w3vc->font_family, $Voqcz2syuhkg);
            }

            $V1qcutcuyu3mode = $Vnk2ly5jcvjf->get_node()->ownerDocument->createTextNode($Voqcz2syuhkg);

            $V1qcutcuyu3mew_style = $Vdidzwb0w3vc->get_stylesheet()->create_style();
            $V1qcutcuyu3mew_style->inherit($Vdidzwb0w3vc);

            $V1qcutcuyu3mew_frame = new Frame($V1qcutcuyu3mode);
            $V1qcutcuyu3mew_frame->set_style($V1qcutcuyu3mew_style);

            Factory::decorate_frame($V1qcutcuyu3mew_frame, $Vnk2ly5jcvjf->get_dompdf(), $Vnk2ly5jcvjf->get_root());
            $Vnk2ly5jcvjf->append_child($V1qcutcuyu3mew_frame);
        }
    }

    
    public function calculate_auto_width()
    {
        return $Vcki4t4qmybshis->_frame->get_margin_width();
    }
}
