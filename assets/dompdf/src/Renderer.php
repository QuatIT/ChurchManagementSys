<?php

namespace Dompdf;

use Dompdf\Renderer\AbstractRenderer;
use Dompdf\Renderer\Block;
use Dompdf\Renderer\Image;
use Dompdf\Renderer\ListBullet;
use Dompdf\Renderer\TableCell;
use Dompdf\Renderer\TableRowGroup;
use Dompdf\Renderer\Text;


class Renderer extends AbstractRenderer
{

    
    protected $Vitudlw1ghao;

    
    private $Vtjsmsxds4fi;

    
    function new_page()
    {
        $this->_canvas->new_page();
    }

    
    public function render(Frame $Vnk2ly5jcvjf)
    {
        global $Vmbd53y4vbxc;

        $this->_check_callbacks("begin_frame", $Vnk2ly5jcvjf);

        if ($Vmbd53y4vbxc) {
            echo $Vnk2ly5jcvjf;
            flush();
        }

        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();

        if (in_array($Vdidzwb0w3vc->visibility, array("hidden", "collapse"))) {
            return;
        }

        $Vsagginauquc = $Vdidzwb0w3vc->display;

        
        if ($Vdidzwb0w3vc->transform && is_array($Vdidzwb0w3vc->transform)) {
            $this->_canvas->save();
            list($Vs4gloy23a1d, $Vopgub02o3q2) = $Vnk2ly5jcvjf->get_padding_box();
            $Vineliqwe2ne = $Vdidzwb0w3vc->transform_origin;

            foreach ($Vdidzwb0w3vc->transform as $Ve4n4fbmoxik) {
                list($Vxlz2dgotaco, $V1vmg10tttdn) = $Ve4n4fbmoxik;
                if ($Vxlz2dgotaco === "matrix") {
                    $Vxlz2dgotaco = "transform";
                }

                $V1vmg10tttdn = array_map("floatval", $V1vmg10tttdn);
                $V1vmg10tttdn[] = $Vs4gloy23a1d + (float)$Vdidzwb0w3vc->length_in_pt($Vineliqwe2ne[0], (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->width));
                $V1vmg10tttdn[] = $Vopgub02o3q2 + (float)$Vdidzwb0w3vc->length_in_pt($Vineliqwe2ne[1], (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->height));

                call_user_func_array(array($this->_canvas, $Vxlz2dgotaco), $V1vmg10tttdn);
            }
        }

        switch ($Vsagginauquc) {

            case "block":
            case "list-item":
            case "inline-block":
            case "table":
            case "inline-table":
                $this->_render_frame("block", $Vnk2ly5jcvjf);
                break;

            case "inline":
                if ($Vnk2ly5jcvjf->is_text_node()) {
                    $this->_render_frame("text", $Vnk2ly5jcvjf);
                } else {
                    $this->_render_frame("inline", $Vnk2ly5jcvjf);
                }
                break;

            case "table-cell":
                $this->_render_frame("table-cell", $Vnk2ly5jcvjf);
                break;

            case "table-row-group":
            case "table-header-group":
            case "table-footer-group":
                $this->_render_frame("table-row-group", $Vnk2ly5jcvjf);
                break;

            case "-dompdf-list-bullet":
                $this->_render_frame("list-bullet", $Vnk2ly5jcvjf);
                break;

            case "-dompdf-image":
                $this->_render_frame("image", $Vnk2ly5jcvjf);
                break;

            case "none":
                $Vbr2bywdrplx = $Vnk2ly5jcvjf->get_node();

                if ($Vbr2bywdrplx->nodeName === "script") {
                    if ($Vbr2bywdrplx->getAttribute("type") === "text/php" ||
                        $Vbr2bywdrplx->getAttribute("language") === "php"
                    ) {
                        
                        $this->_render_frame("php", $Vnk2ly5jcvjf);
                    } elseif ($Vbr2bywdrplx->getAttribute("type") === "text/javascript" ||
                        $Vbr2bywdrplx->getAttribute("language") === "javascript"
                    ) {
                        
                        $this->_render_frame("javascript", $Vnk2ly5jcvjf);
                    }
                }

                
                return;

            default:
                break;

        }

        
        if ($Vdidzwb0w3vc->overflow === "hidden") {
            list($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa) = $Vnk2ly5jcvjf->get_padding_box();

            
            $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
            list($Vz2hkt0r22ia, $Vzmfvefqwysh, $Vxo14t4heoku, $V5e5dzlyursk) = $Vdidzwb0w3vc->get_computed_border_radius($Vhoifq2kocyt, $Vjlmjalejjxa);

            if ($Vz2hkt0r22ia + $Vzmfvefqwysh + $Vxo14t4heoku + $V5e5dzlyursk > 0) {
                $this->_canvas->clipping_roundrectangle($Vs4gloy23a1d, $Vopgub02o3q2, (float)$Vhoifq2kocyt, (float)$Vjlmjalejjxa, $Vz2hkt0r22ia, $Vzmfvefqwysh, $Vxo14t4heoku, $V5e5dzlyursk);
            } else {
                $this->_canvas->clipping_rectangle($Vs4gloy23a1d, $Vopgub02o3q2, (float)$Vhoifq2kocyt, (float)$Vjlmjalejjxa);
            }
        }

        $Vwvjp3dx4uxt = array();

        foreach ($Vnk2ly5jcvjf->get_children() as $Vtcc233inn5m) {
            
            
            
            
            $Vtcc233inn5m_style = $Vtcc233inn5m->get_style();
            $Vtcc233inn5m_z_index = $Vtcc233inn5m_style->z_index;
            $V4qtn12xnk54 = 0;

            if ($Vtcc233inn5m_z_index !== "auto") {
                $V4qtn12xnk54 = intval($Vtcc233inn5m_z_index) + 1;
            } elseif ($Vtcc233inn5m_style->float !== "none" || $Vtcc233inn5m->is_positionned()) {
                $V4qtn12xnk54 = 1;
            }

            $Vwvjp3dx4uxt[$V4qtn12xnk54][] = $Vtcc233inn5m;
        }

        ksort($Vwvjp3dx4uxt);

        foreach ($Vwvjp3dx4uxt as $Vhpcomvkfl4p) {
            foreach ($Vhpcomvkfl4p as $Vtcc233inn5m) {
                $this->render($Vtcc233inn5m);
            }
        }

        
        if ($Vdidzwb0w3vc->overflow === "hidden") {
            $this->_canvas->clipping_end();
        }

        if ($Vdidzwb0w3vc->transform && is_array($Vdidzwb0w3vc->transform)) {
            $this->_canvas->restore();
        }

        
        $this->_check_callbacks("end_frame", $Vnk2ly5jcvjf);
    }

    
    protected function _check_callbacks($Vflqyoc1obms, $Vnk2ly5jcvjf)
    {
        if (!isset($this->_callbacks)) {
            $this->_callbacks = $this->_dompdf->getCallbacks();
        }

        if (is_array($this->_callbacks) && isset($this->_callbacks[$Vflqyoc1obms])) {
            $Vp03vxkbvgmn = array(0 => $this->_canvas, "canvas" => $this->_canvas,
                1 => $Vnk2ly5jcvjf, "frame" => $Vnk2ly5jcvjf);
            $Vj2dp31yq2k0 = $this->_callbacks[$Vflqyoc1obms];
            foreach ($Vj2dp31yq2k0 as $V4ljftfdeqpl) {
                if (is_callable($V4ljftfdeqpl)) {
                    if (is_array($V4ljftfdeqpl)) {
                        $V4ljftfdeqpl[0]->{$V4ljftfdeqpl[1]}($Vp03vxkbvgmn);
                    } else {
                        $V4ljftfdeqpl($Vp03vxkbvgmn);
                    }
                }
            }
        }
    }

    
    protected function _render_frame($Vxeifmjzikkj, $Vnk2ly5jcvjf)
    {

        if (!isset($this->_renderers[$Vxeifmjzikkj])) {

            switch ($Vxeifmjzikkj) {
                case "block":
                    $this->_renderers[$Vxeifmjzikkj] = new Block($this->_dompdf);
                    break;

                case "inline":
                    $this->_renderers[$Vxeifmjzikkj] = new Renderer\Inline($this->_dompdf);
                    break;

                case "text":
                    $this->_renderers[$Vxeifmjzikkj] = new Text($this->_dompdf);
                    break;

                case "image":
                    $this->_renderers[$Vxeifmjzikkj] = new Image($this->_dompdf);
                    break;

                case "table-cell":
                    $this->_renderers[$Vxeifmjzikkj] = new TableCell($this->_dompdf);
                    break;

                case "table-row-group":
                    $this->_renderers[$Vxeifmjzikkj] = new TableRowGroup($this->_dompdf);
                    break;

                case "list-bullet":
                    $this->_renderers[$Vxeifmjzikkj] = new ListBullet($this->_dompdf);
                    break;

                case "php":
                    $this->_renderers[$Vxeifmjzikkj] = new PhpEvaluator($this->_canvas);
                    break;

                case "javascript":
                    $this->_renderers[$Vxeifmjzikkj] = new JavascriptEmbedder($this->_dompdf);
                    break;

            }
        }

        $this->_renderers[$Vxeifmjzikkj]->render($Vnk2ly5jcvjf);
    }
}
