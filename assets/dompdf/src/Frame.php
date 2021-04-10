<?php

namespace Dompdf;

use Dompdf\Css\Style;
use Dompdf\Frame\FrameList;




class Frame
{
    const WS_TEXT = 1;
    const WS_SPACE = 2;

    
    protected $V1tzl0e3uan0;

    
    protected $Vxtrkxegt1di;

    
    public static $Vftvicyb3d1y = 0; 

    
    protected $Vkdb2efne1fd;

    
    protected $Vwu5hfmeg34k;

    
    protected $Veb0klnlntfo;

    
    protected $Vtcosdkaxdaj;

    
    protected $Ve52n0jmfn0m;

    
    protected $Viotffxaombf;

    
    protected $Vro2x0cvav5c;

    
    protected $Vgswn21ka4nz;

    
    protected $Vw1w3ginp2m5;

    
    protected $Vmu12pic5gh2;

    
    protected $V4umdqhtwaco;

    
    protected $Vwmqi1wwrxs0;

    
    protected $Vv1jaamii3vr;

    
    protected $Vajt5lxlq5b3 = array();

    
    public $Vfvicuyo4gmq = false;

    
    public $Vvrg5tvfuyvv = false;

    
    public $Vftibstg2e3q;

    
    public static $Vqjaka5s2vxc = self::WS_SPACE;

    
    public function __construct(\DOMNode $Vbr2bywdrplx)
    {
        $this->_node = $Vbr2bywdrplx;

        $this->_parent = null;
        $this->_first_child = null;
        $this->_last_child = null;
        $this->_prev_sibling = $this->_next_sibling = null;

        $this->_style = null;
        $this->_original_style = null;

        $this->_containing_block = array(
            "x" => null,
            "y" => null,
            "w" => null,
            "h" => null,
        );

        $this->_containing_block[0] =& $this->_containing_block["x"];
        $this->_containing_block[1] =& $this->_containing_block["y"];
        $this->_containing_block[2] =& $this->_containing_block["w"];
        $this->_containing_block[3] =& $this->_containing_block["h"];

        $this->_position = array(
            "x" => null,
            "y" => null,
        );

        $this->_position[0] =& $this->_position["x"];
        $this->_position[1] =& $this->_position["y"];

        $this->_opacity = 1.0;
        $this->_decorator = null;

        $this->set_id(self::$Vftvicyb3d1y++);
    }

    
    protected function ws_trim()
    {
        if ($this->ws_keep()) {
            return;
        }

        if (self::$Vqjaka5s2vxc === self::WS_SPACE) {
            $Vbr2bywdrplx = $this->_node;

            if ($Vbr2bywdrplx->nodeName === "#text" && !empty($Vbr2bywdrplx->nodeValue)) {
                $Vbr2bywdrplx->nodeValue = preg_replace("/[ \t\r\n\f]+/u", " ", trim($Vbr2bywdrplx->nodeValue));
                self::$Vqjaka5s2vxc = self::WS_TEXT;
            }
        }
    }

    
    protected function ws_keep()
    {
        $Vbppsapzrzgh = $this->get_style()->white_space;

        return in_array($Vbppsapzrzgh, array("pre", "pre-wrap", "pre-line"));
    }

    
    protected function ws_is_text()
    {
        $Vbr2bywdrplx = $this->get_node();

        if ($Vbr2bywdrplx->nodeName === "img") {
            return true;
        }

        if (!$this->is_in_flow()) {
            return false;
        }

        if ($this->is_text_node()) {
            return trim($Vbr2bywdrplx->nodeValue) !== "";
        }

        return true;
    }

    
    public function dispose($V2snefhk4mtq = false)
    {
        if ($V2snefhk4mtq) {
            while ($Vtcc233inn5m = $this->_first_child) {
                $Vtcc233inn5m->dispose(true);
            }
        }

        
        if ($this->_prev_sibling) {
            $this->_prev_sibling->_next_sibling = $this->_next_sibling;
        }

        if ($this->_next_sibling) {
            $this->_next_sibling->_prev_sibling = $this->_prev_sibling;
        }

        if ($this->_parent && $this->_parent->_first_child === $this) {
            $this->_parent->_first_child = $this->_next_sibling;
        }

        if ($this->_parent && $this->_parent->_last_child === $this) {
            $this->_parent->_last_child = $this->_prev_sibling;
        }

        if ($this->_parent) {
            $this->_parent->get_node()->removeChild($this->_node);
        }

        $this->_style->dispose();
        $this->_style = null;
        unset($this->_style);

        $this->_original_style->dispose();
        $this->_original_style = null;
        unset($this->_original_style);

    }

    
    public function reset()
    {
        $this->_position["x"] = null;
        $this->_position["y"] = null;

        $this->_containing_block["x"] = null;
        $this->_containing_block["y"] = null;
        $this->_containing_block["w"] = null;
        $this->_containing_block["h"] = null;

        $this->_style = null;
        unset($this->_style);
        $this->_style = clone $this->_original_style;

        
        
        if ($this->_node->nodeName === "dompdf_generated" && $this->_style->content != "normal") {
            foreach ($this->get_children() as $Vtcc233inn5m) {
                $this->remove_child($Vtcc233inn5m);
            }
        }
    }

    
    public function get_node()
    {
        return $this->_node;
    }

    
    public function get_id()
    {
        return $this->_id;
    }

    
    public function get_style()
    {
        return $this->_style;
    }

    
    public function get_original_style()
    {
        return $this->_original_style;
    }

    
    public function get_parent()
    {
        return $this->_parent;
    }

    
    public function get_decorator()
    {
        return $this->_decorator;
    }

    
    public function get_first_child()
    {
        return $this->_first_child;
    }

    
    public function get_last_child()
    {
        return $this->_last_child;
    }

    
    public function get_prev_sibling()
    {
        return $this->_prev_sibling;
    }

    
    public function get_next_sibling()
    {
        return $this->_next_sibling;
    }

    
    public function get_children()
    {
        if (isset($this->_frame_list)) {
            return $this->_frame_list;
        }

        $this->_frame_list = new FrameList($this);

        return $this->_frame_list;
    }

    

    
    public function get_containing_block($V3xsptcgzss2 = null)
    {
        if (isset($V3xsptcgzss2)) {
            return $this->_containing_block[$V3xsptcgzss2];
        }

        return $this->_containing_block;
    }

    
    public function get_position($V3xsptcgzss2 = null)
    {
        if (isset($V3xsptcgzss2)) {
            return $this->_position[$V3xsptcgzss2];
        }

        return $this->_position;
    }

    

    
    public function get_margin_height()
    {
        $Vdidzwb0w3vc = $this->_style;

        return (float)$Vdidzwb0w3vc->length_in_pt(array(
            $Vdidzwb0w3vc->height,
            $Vdidzwb0w3vc->margin_top,
            $Vdidzwb0w3vc->margin_bottom,
            $Vdidzwb0w3vc->border_top_width,
            $Vdidzwb0w3vc->border_bottom_width,
            $Vdidzwb0w3vc->padding_top,
            $Vdidzwb0w3vc->padding_bottom
        ), $this->_containing_block["h"]);
    }

    
    public function get_margin_width()
    {
        $Vdidzwb0w3vc = $this->_style;

        return (float)$Vdidzwb0w3vc->length_in_pt(array(
            $Vdidzwb0w3vc->width,
            $Vdidzwb0w3vc->margin_left,
            $Vdidzwb0w3vc->margin_right,
            $Vdidzwb0w3vc->border_left_width,
            $Vdidzwb0w3vc->border_right_width,
            $Vdidzwb0w3vc->padding_left,
            $Vdidzwb0w3vc->padding_right
        ), $this->_containing_block["w"]);
    }

    
    public function get_break_margins()
    {
        $Vdidzwb0w3vc = $this->_style;

        return (float)$Vdidzwb0w3vc->length_in_pt(array(
            
            $Vdidzwb0w3vc->margin_top,
            $Vdidzwb0w3vc->margin_bottom,
            $Vdidzwb0w3vc->border_top_width,
            $Vdidzwb0w3vc->border_bottom_width,
            $Vdidzwb0w3vc->padding_top,
            $Vdidzwb0w3vc->padding_bottom
        ), $this->_containing_block["h"]);
    }

    
    public function get_content_box()
    {
        $Vdidzwb0w3vc = $this->_style;
        $Vavdpq045wub = $this->_containing_block;

        $Vs4gloy23a1d = $this->_position["x"] +
            (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->margin_left,
                    $Vdidzwb0w3vc->border_left_width,
                    $Vdidzwb0w3vc->padding_left),
                $Vavdpq045wub["w"]);

        $Vopgub02o3q2 = $this->_position["y"] +
            (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->margin_top,
                    $Vdidzwb0w3vc->border_top_width,
                    $Vdidzwb0w3vc->padding_top),
                $Vavdpq045wub["h"]);

        $Vhoifq2kocyt = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->width, $Vavdpq045wub["w"]);

        $Vjlmjalejjxa = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->height, $Vavdpq045wub["h"]);

        return array(0 => $Vs4gloy23a1d, "x" => $Vs4gloy23a1d,
            1 => $Vopgub02o3q2, "y" => $Vopgub02o3q2,
            2 => $Vhoifq2kocyt, "w" => $Vhoifq2kocyt,
            3 => $Vjlmjalejjxa, "h" => $Vjlmjalejjxa);
    }

    
    public function get_padding_box()
    {
        $Vdidzwb0w3vc = $this->_style;
        $Vavdpq045wub = $this->_containing_block;

        $Vs4gloy23a1d = $this->_position["x"] +
            (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->margin_left,
                    $Vdidzwb0w3vc->border_left_width),
                $Vavdpq045wub["w"]);

        $Vopgub02o3q2 = $this->_position["y"] +
            (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->margin_top,
                    $Vdidzwb0w3vc->border_top_width),
                $Vavdpq045wub["h"]);

        $Vhoifq2kocyt = $Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->padding_left,
                $Vdidzwb0w3vc->width,
                $Vdidzwb0w3vc->padding_right),
            $Vavdpq045wub["w"]);

        $Vjlmjalejjxa = $Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->padding_top,
                $Vdidzwb0w3vc->height,
                $Vdidzwb0w3vc->padding_bottom),
            $Vavdpq045wub["h"]);

        return array(0 => $Vs4gloy23a1d, "x" => $Vs4gloy23a1d,
            1 => $Vopgub02o3q2, "y" => $Vopgub02o3q2,
            2 => $Vhoifq2kocyt, "w" => $Vhoifq2kocyt,
            3 => $Vjlmjalejjxa, "h" => $Vjlmjalejjxa);
    }

    
    public function get_border_box()
    {
        $Vdidzwb0w3vc = $this->_style;
        $Vavdpq045wub = $this->_containing_block;

        $Vs4gloy23a1d = $this->_position["x"] + (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_left, $Vavdpq045wub["w"]);

        $Vopgub02o3q2 = $this->_position["y"] + (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_top, $Vavdpq045wub["h"]);

        $Vhoifq2kocyt = $Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->border_left_width,
                $Vdidzwb0w3vc->padding_left,
                $Vdidzwb0w3vc->width,
                $Vdidzwb0w3vc->padding_right,
                $Vdidzwb0w3vc->border_right_width),
            $Vavdpq045wub["w"]);

        $Vjlmjalejjxa = $Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->border_top_width,
                $Vdidzwb0w3vc->padding_top,
                $Vdidzwb0w3vc->height,
                $Vdidzwb0w3vc->padding_bottom,
                $Vdidzwb0w3vc->border_bottom_width),
            $Vavdpq045wub["h"]);

        return array(0 => $Vs4gloy23a1d, "x" => $Vs4gloy23a1d,
            1 => $Vopgub02o3q2, "y" => $Vopgub02o3q2,
            2 => $Vhoifq2kocyt, "w" => $Vhoifq2kocyt,
            3 => $Vjlmjalejjxa, "h" => $Vjlmjalejjxa);
    }

    
    public function get_opacity($Vdrvff4n2sqc = null)
    {
        if ($Vdrvff4n2sqc !== null) {
            $this->set_opacity($Vdrvff4n2sqc);
        }

        return $this->_opacity;
    }

    
    public function &get_containing_line()
    {
        return $this->_containing_line;
    }

    

    
    
    public function set_id($V3xsptcgzss2d)
    {
        $this->_id = $V3xsptcgzss2d;

        
        
        
        if ($this->_node->nodeType == XML_ELEMENT_NODE) {
            $this->_node->setAttribute("frame_id", $V3xsptcgzss2d);
        }
    }

    
    public function set_style(Style $Vdidzwb0w3vc)
    {
        if (is_null($this->_style)) {
            $this->_original_style = clone $Vdidzwb0w3vc;
        }

        
        $this->_style = $Vdidzwb0w3vc;
    }

    
    public function set_decorator(FrameDecorator\AbstractFrameDecorator $Vpn0erlmbnzu)
    {
        $this->_decorator = $Vpn0erlmbnzu;
    }

    
    public function set_containing_block($Vs4gloy23a1d = null, $Vopgub02o3q2 = null, $Vhoifq2kocyt = null, $Vjlmjalejjxa = null)
    {
        if (is_array($Vs4gloy23a1d)) {
            foreach ($Vs4gloy23a1d as $Vqwhzgethmgj => $Vzyqcsfbm3q4) {
                $$Vqwhzgethmgj = $Vzyqcsfbm3q4;
            }
        }

        if (is_numeric($Vs4gloy23a1d)) {
            $this->_containing_block["x"] = $Vs4gloy23a1d;
        }

        if (is_numeric($Vopgub02o3q2)) {
            $this->_containing_block["y"] = $Vopgub02o3q2;
        }

        if (is_numeric($Vhoifq2kocyt)) {
            $this->_containing_block["w"] = $Vhoifq2kocyt;
        }

        if (is_numeric($Vjlmjalejjxa)) {
            $this->_containing_block["h"] = $Vjlmjalejjxa;
        }
    }

    
    public function set_position($Vs4gloy23a1d = null, $Vopgub02o3q2 = null)
    {
        if (is_array($Vs4gloy23a1d)) {
            list($Vs4gloy23a1d, $Vopgub02o3q2) = array($Vs4gloy23a1d["x"], $Vs4gloy23a1d["y"]);
        }

        if (is_numeric($Vs4gloy23a1d)) {
            $this->_position["x"] = $Vs4gloy23a1d;
        }

        if (is_numeric($Vopgub02o3q2)) {
            $this->_position["y"] = $Vopgub02o3q2;
        }
    }

    
    public function set_opacity($Vdrvff4n2sqc)
    {
        $Vycghhqowrim = $this->get_parent();
        $Vjc53lvz3cqu = (($Vycghhqowrim && $Vycghhqowrim->_opacity !== null) ? $Vycghhqowrim->_opacity : 1.0);
        $this->_opacity = $Vjc53lvz3cqu * $Vdrvff4n2sqc;
    }

    
    public function set_containing_line(LineBox $V4m4rbmlpgn2)
    {
        $this->_containing_line = $V4m4rbmlpgn2;
    }

    
    public function is_auto_height()
    {
        $Vdidzwb0w3vc = $this->_style;

        return in_array(
            "auto",
            array(
                $Vdidzwb0w3vc->height,
                $Vdidzwb0w3vc->margin_top,
                $Vdidzwb0w3vc->margin_bottom,
                $Vdidzwb0w3vc->border_top_width,
                $Vdidzwb0w3vc->border_bottom_width,
                $Vdidzwb0w3vc->padding_top,
                $Vdidzwb0w3vc->padding_bottom,
                $this->_containing_block["h"]
            ),
            true
        );
    }

    
    public function is_auto_width()
    {
        $Vdidzwb0w3vc = $this->_style;

        return in_array(
            "auto",
            array(
                $Vdidzwb0w3vc->width,
                $Vdidzwb0w3vc->margin_left,
                $Vdidzwb0w3vc->margin_right,
                $Vdidzwb0w3vc->border_left_width,
                $Vdidzwb0w3vc->border_right_width,
                $Vdidzwb0w3vc->padding_left,
                $Vdidzwb0w3vc->padding_right,
                $this->_containing_block["w"]
            ),
            true
        );
    }

    
    public function is_text_node()
    {
        if (isset($this->_is_cache["text_node"])) {
            return $this->_is_cache["text_node"];
        }

        return $this->_is_cache["text_node"] = ($this->get_node()->nodeName === "#text");
    }

    
    public function is_positionned()
    {
        if (isset($this->_is_cache["positionned"])) {
            return $this->_is_cache["positionned"];
        }

        $Vmriudfrwzj3 = $this->get_style()->position;

        return $this->_is_cache["positionned"] = in_array($Vmriudfrwzj3, Style::$Vad23z5m2olf);
    }

    
    public function is_absolute()
    {
        if (isset($this->_is_cache["absolute"])) {
            return $this->_is_cache["absolute"];
        }

        $Vmriudfrwzj3 = $this->get_style()->position;

        return $this->_is_cache["absolute"] = ($Vmriudfrwzj3 === "absolute" || $Vmriudfrwzj3 === "fixed");
    }

    
    public function is_block()
    {
        if (isset($this->_is_cache["block"])) {
            return $this->_is_cache["block"];
        }

        return $this->_is_cache["block"] = in_array($this->get_style()->display, Style::$Vb34q1c1cezy);
    }

    
    public function is_inline_block()
    {
        if (isset($this->_is_cache["inline_block"])) {
            return $this->_is_cache["inline_block"];
        }

        return $this->_is_cache["inline_block"] = ($this->get_style()->display === 'inline-block');
    }

    
    public function is_in_flow()
    {
        if (isset($this->_is_cache["in_flow"])) {
            return $this->_is_cache["in_flow"];
        }
        return $this->_is_cache["in_flow"] = !($this->get_style()->float !== "none" || $this->is_absolute());
    }

    
    public function is_pre()
    {
        if (isset($this->_is_cache["pre"])) {
            return $this->_is_cache["pre"];
        }

        $Vhoifq2kocythite_space = $this->get_style()->white_space;

        return $this->_is_cache["pre"] = in_array($Vhoifq2kocythite_space, array("pre", "pre-wrap"));
    }

    
    public function is_table()
    {
        if (isset($this->_is_cache["table"])) {
            return $this->_is_cache["table"];
        }

        $Vsagginauquc = $this->get_style()->display;

        return $this->_is_cache["table"] = in_array($Vsagginauquc, Style::$Vwc5svvuqws2);
    }


    
    public function prepend_child(Frame $Vtcc233inn5m, $Vs0pda3r3hsl = true)
    {
        if ($Vs0pda3r3hsl) {
            $this->_node->insertBefore($Vtcc233inn5m->_node, $this->_first_child ? $this->_first_child->_node : null);
        }

        
        if ($Vtcc233inn5m->_parent) {
            $Vtcc233inn5m->_parent->remove_child($Vtcc233inn5m, false);
        }

        $Vtcc233inn5m->_parent = $this;
        $Vtcc233inn5m->_prev_sibling = null;

        
        if (!$this->_first_child) {
            $this->_first_child = $Vtcc233inn5m;
            $this->_last_child = $Vtcc233inn5m;
            $Vtcc233inn5m->_next_sibling = null;
        } else {
            $this->_first_child->_prev_sibling = $Vtcc233inn5m;
            $Vtcc233inn5m->_next_sibling = $this->_first_child;
            $this->_first_child = $Vtcc233inn5m;
        }
    }

    
    public function append_child(Frame $Vtcc233inn5m, $Vs0pda3r3hsl = true)
    {
        if ($Vs0pda3r3hsl) {
            $this->_node->appendChild($Vtcc233inn5m->_node);
        }

        
        if ($Vtcc233inn5m->_parent) {
            $Vtcc233inn5m->_parent->remove_child($Vtcc233inn5m, false);
        }

        $Vtcc233inn5m->_parent = $this;
        $Vpn0erlmbnzu = $Vtcc233inn5m->get_decorator();
        
        if ($Vpn0erlmbnzu !== null) {
            $Vpn0erlmbnzu->get_parent(false);
        }
        $Vtcc233inn5m->_next_sibling = null;

        
        if (!$this->_last_child) {
            $this->_first_child = $Vtcc233inn5m;
            $this->_last_child = $Vtcc233inn5m;
            $Vtcc233inn5m->_prev_sibling = null;
        } else {
            $this->_last_child->_next_sibling = $Vtcc233inn5m;
            $Vtcc233inn5m->_prev_sibling = $this->_last_child;
            $this->_last_child = $Vtcc233inn5m;
        }
    }

    
    public function insert_child_before(Frame $Vtoj55lv2rsr, Frame $Vvaic4pvtywk, $Vs0pda3r3hsl = true)
    {
        if ($Vvaic4pvtywk === $this->_first_child) {
            $this->prepend_child($Vtoj55lv2rsr, $Vs0pda3r3hsl);

            return;
        }

        if (is_null($Vvaic4pvtywk)) {
            $this->append_child($Vtoj55lv2rsr, $Vs0pda3r3hsl);

            return;
        }

        if ($Vvaic4pvtywk->_parent !== $this) {
            throw new Exception("Reference child is not a child of this node.");
        }

        
        if ($Vs0pda3r3hsl) {
            $this->_node->insertBefore($Vtoj55lv2rsr->_node, $Vvaic4pvtywk->_node);
        }

        
        if ($Vtoj55lv2rsr->_parent) {
            $Vtoj55lv2rsr->_parent->remove_child($Vtoj55lv2rsr, false);
        }

        $Vtoj55lv2rsr->_parent = $this;
        $Vtoj55lv2rsr->_next_sibling = $Vvaic4pvtywk;
        $Vtoj55lv2rsr->_prev_sibling = $Vvaic4pvtywk->_prev_sibling;

        if ($Vvaic4pvtywk->_prev_sibling) {
            $Vvaic4pvtywk->_prev_sibling->_next_sibling = $Vtoj55lv2rsr;
        }

        $Vvaic4pvtywk->_prev_sibling = $Vtoj55lv2rsr;
    }

    
    public function insert_child_after(Frame $Vtoj55lv2rsr, Frame $Vvaic4pvtywk, $Vs0pda3r3hsl = true)
    {
        if ($Vvaic4pvtywk === $this->_last_child) {
            $this->append_child($Vtoj55lv2rsr, $Vs0pda3r3hsl);

            return;
        }

        if (is_null($Vvaic4pvtywk)) {
            $this->prepend_child($Vtoj55lv2rsr, $Vs0pda3r3hsl);

            return;
        }

        if ($Vvaic4pvtywk->_parent !== $this) {
            throw new Exception("Reference child is not a child of this node.");
        }

        
        if ($Vs0pda3r3hsl) {
            if ($Vvaic4pvtywk->_next_sibling) {
                $Vi53w2gfdruu = $Vvaic4pvtywk->_next_sibling->_node;
                $this->_node->insertBefore($Vtoj55lv2rsr->_node, $Vi53w2gfdruu);
            } else {
                $Vtoj55lv2rsr->_node = $this->_node->appendChild($Vtoj55lv2rsr->_node);
            }
        }

        
        if ($Vtoj55lv2rsr->_parent) {
            $Vtoj55lv2rsr->_parent->remove_child($Vtoj55lv2rsr, false);
        }

        $Vtoj55lv2rsr->_parent = $this;
        $Vtoj55lv2rsr->_prev_sibling = $Vvaic4pvtywk;
        $Vtoj55lv2rsr->_next_sibling = $Vvaic4pvtywk->_next_sibling;

        if ($Vvaic4pvtywk->_next_sibling) {
            $Vvaic4pvtywk->_next_sibling->_prev_sibling = $Vtoj55lv2rsr;
        }

        $Vvaic4pvtywk->_next_sibling = $Vtoj55lv2rsr;
    }

    
    public function remove_child(Frame $Vtcc233inn5m, $Vs0pda3r3hsl = true)
    {
        if ($Vtcc233inn5m->_parent !== $this) {
            throw new Exception("Child not found in this frame");
        }

        if ($Vs0pda3r3hsl) {
            $this->_node->removeChild($Vtcc233inn5m->_node);
        }

        if ($Vtcc233inn5m === $this->_first_child) {
            $this->_first_child = $Vtcc233inn5m->_next_sibling;
        }

        if ($Vtcc233inn5m === $this->_last_child) {
            $this->_last_child = $Vtcc233inn5m->_prev_sibling;
        }

        if ($Vtcc233inn5m->_prev_sibling) {
            $Vtcc233inn5m->_prev_sibling->_next_sibling = $Vtcc233inn5m->_next_sibling;
        }

        if ($Vtcc233inn5m->_next_sibling) {
            $Vtcc233inn5m->_next_sibling->_prev_sibling = $Vtcc233inn5m->_prev_sibling;
        }

        $Vtcc233inn5m->_next_sibling = null;
        $Vtcc233inn5m->_prev_sibling = null;
        $Vtcc233inn5m->_parent = null;

        return $Vtcc233inn5m;
    }

    

    
    
    public function __toString()
    {
        





        $Vadkcwffkfxw = "<b>" . $this->_node->nodeName . ":</b><br/>";
        
        $Vadkcwffkfxw .= "Id: " . $this->get_id() . "<br/>";
        $Vadkcwffkfxw .= "Class: " . get_class($this) . "<br/>";

        if ($this->is_text_node()) {
            $Vynpm04a4fx0 = htmlspecialchars($this->_node->nodeValue);
            $Vadkcwffkfxw .= "<pre>'" . mb_substr($Vynpm04a4fx0, 0, 70) .
                (mb_strlen($Vynpm04a4fx0) > 70 ? "..." : "") . "'</pre>";
        } elseif ($Vkz554bi5s3v = $this->_node->getAttribute("class")) {
            $Vadkcwffkfxw .= "CSS class: '$Vkz554bi5s3v'<br/>";
        }

        if ($this->_parent) {
            $Vadkcwffkfxw .= "\nParent:" . $this->_parent->_node->nodeName .
                " (" . spl_object_hash($this->_parent->_node) . ") " .
                "<br/>";
        }

        if ($this->_prev_sibling) {
            $Vadkcwffkfxw .= "Prev: " . $this->_prev_sibling->_node->nodeName .
                " (" . spl_object_hash($this->_prev_sibling->_node) . ") " .
                "<br/>";
        }

        if ($this->_next_sibling) {
            $Vadkcwffkfxw .= "Next: " . $this->_next_sibling->_node->nodeName .
                " (" . spl_object_hash($this->_next_sibling->_node) . ") " .
                "<br/>";
        }

        $Vcyg5xmwfpxo = $this->get_decorator();
        while ($Vcyg5xmwfpxo && $Vcyg5xmwfpxo != $Vcyg5xmwfpxo->get_decorator()) {
            $Vadkcwffkfxw .= "Decorator: " . get_class($Vcyg5xmwfpxo) . "<br/>";
            $Vcyg5xmwfpxo = $Vcyg5xmwfpxo->get_decorator();
        }

        $Vadkcwffkfxw .= "Position: " . Helpers::pre_r($this->_position, true);
        $Vadkcwffkfxw .= "\nContaining block: " . Helpers::pre_r($this->_containing_block, true);
        $Vadkcwffkfxw .= "\nMargin width: " . Helpers::pre_r($this->get_margin_width(), true);
        $Vadkcwffkfxw .= "\nMargin height: " . Helpers::pre_r($this->get_margin_height(), true);

        $Vadkcwffkfxw .= "\nStyle: <pre>" . $this->_style->__toString() . "</pre>";

        if ($this->_decorator instanceof FrameDecorator\Block) {
            $Vadkcwffkfxw .= "Lines:<pre>";
            foreach ($this->_decorator->get_line_boxes() as $V4m4rbmlpgn2) {
                foreach ($V4m4rbmlpgn2->get_frames() as $Vnk2ly5jcvjf) {
                    if ($Vnk2ly5jcvjf instanceof FrameDecorator\Text) {
                        $Vadkcwffkfxw .= "\ntext: ";
                        $Vadkcwffkfxw .= "'" . htmlspecialchars($Vnk2ly5jcvjf->get_text()) . "'";
                    } else {
                        $Vadkcwffkfxw .= "\nBlock: " . $Vnk2ly5jcvjf->get_node()->nodeName . " (" . spl_object_hash($Vnk2ly5jcvjf->get_node()) . ")";
                    }
                }

                $Vadkcwffkfxw .=
                    "\ny => " . $V4m4rbmlpgn2->y . "\n" .
                    "w => " . $V4m4rbmlpgn2->w . "\n" .
                    "h => " . $V4m4rbmlpgn2->h . "\n" .
                    "left => " . $V4m4rbmlpgn2->left . "\n" .
                    "right => " . $V4m4rbmlpgn2->right . "\n";
            }
            $Vadkcwffkfxw .= "</pre>";
        }

        $Vadkcwffkfxw .= "\n";
        if (php_sapi_name() === "cli") {
            $Vadkcwffkfxw = strip_tags(str_replace(array("<br/>", "<b>", "</b>"),
                array("\n", "", ""),
                $Vadkcwffkfxw));
        }

        return $Vadkcwffkfxw;
    }
}
