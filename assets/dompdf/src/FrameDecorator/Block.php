<?php

namespace Dompdf\FrameDecorator;

use Dompdf\Dompdf;
use Dompdf\Frame;
use Dompdf\LineBox;


class Block extends AbstractFrameDecorator
{
    
    protected $Vfeozqd1lahy;

    
    protected $Vhvccnpqvvzh;

    
    function __construct(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz)
    {
        parent::__construct($Vnk2ly5jcvjf, $Vhvghaoacagz);

        $this->_line_boxes = array(new LineBox($this));
        $this->_cl = 0;
    }

    
    function reset()
    {
        parent::reset();

        $this->_line_boxes = array(new LineBox($this));
        $this->_cl = 0;
    }

    
    function get_current_line_box()
    {
        return $this->_line_boxes[$this->_cl];
    }

    
    function get_current_line_number()
    {
        return $this->_cl;
    }

    
    function get_line_boxes()
    {
        return $this->_line_boxes;
    }

    
    function set_current_line_number($Vogortln3uk0)
    {
        $Vmvnfz3uycpp = count($this->_line_boxes);
        $V2mosqtwzmaj = max(min($Vogortln3uk0, $Vmvnfz3uycpp), 0);
        return ($this->_cl = $V2mosqtwzmaj);
    }

    
    function clear_line($V3xsptcgzss2)
    {
        if (isset($this->_line_boxes[$V3xsptcgzss2])) {
            unset($this->_line_boxes[$V3xsptcgzss2]);
        }
    }

    
    function add_frame_to_line(Frame $Vnk2ly5jcvjf)
    {
        if (!$Vnk2ly5jcvjf->is_in_flow()) {
            return;
        }

        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();

        $Vnk2ly5jcvjf->set_containing_line($this->_line_boxes[$this->_cl]);

        

        
        if ($Vnk2ly5jcvjf instanceof Inline) {
            
            if ($Vnk2ly5jcvjf->get_node()->nodeName === "br") {
                $this->maximize_line_height($Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->line_height), $Vnk2ly5jcvjf);
                $this->add_line(true);
            }

            return;
        }

        
        
        if ($this->get_current_line_box()->w == 0 &&
            $Vnk2ly5jcvjf->is_text_node() &&
            !$Vnk2ly5jcvjf->is_pre()
        ) {
            $Vnk2ly5jcvjf->set_text(ltrim($Vnk2ly5jcvjf->get_text()));
            $Vnk2ly5jcvjf->recalculate_width();
        }

        $Vhoifq2kocyt = $Vnk2ly5jcvjf->get_margin_width();

        
        
        if ($Vhoifq2kocyt == 0 && $Vnk2ly5jcvjf->get_node()->nodeName !== "hr") {
            return;
        }

        
        
        

        $V4m4rbmlpgn2 = $this->_line_boxes[$this->_cl];
        if ($V4m4rbmlpgn2->left + $V4m4rbmlpgn2->w + $V4m4rbmlpgn2->right + $Vhoifq2kocyt > $this->get_containing_block("w")) {
            $this->add_line();
        }

        $Vnk2ly5jcvjf->position();

        $Vd5tclceha1r = $this->_line_boxes[$this->_cl];
        $Vd5tclceha1r->add_frame($Vnk2ly5jcvjf);

        if ($Vnk2ly5jcvjf->is_text_node()) {
            $Vd5tclceha1r->wc += count(preg_split("/\s+/", trim($Vnk2ly5jcvjf->get_text())));
        }

        $this->increase_line_width($Vhoifq2kocyt);

        $this->maximize_line_height($Vnk2ly5jcvjf->get_margin_height(), $Vnk2ly5jcvjf);
    }

    
    function remove_frames_from_line(Frame $Vnk2ly5jcvjf)
    {
        
        $V3xsptcgzss2 = $this->_cl;
        $V0hg12l10vfx = null;

        while ($V3xsptcgzss2 >= 0) {
            if (($V0hg12l10vfx = in_array($Vnk2ly5jcvjf, $this->_line_boxes[$V3xsptcgzss2]->get_frames(), true)) !== false) {
                break;
            }

            $V3xsptcgzss2--;
        }

        if ($V0hg12l10vfx === false) {
            return;
        }

        
        while ($V0hg12l10vfx < count($this->_line_boxes[$V3xsptcgzss2]->get_frames())) {
            $Vnk2ly5jcvjfs = $this->_line_boxes[$V3xsptcgzss2]->get_frames();
            $V4ljftfdeqpl = $Vnk2ly5jcvjfs[$V0hg12l10vfx];
            $Vnk2ly5jcvjfs[$V0hg12l10vfx] = null;
            unset($Vnk2ly5jcvjfs[$V0hg12l10vfx]);
            $V0hg12l10vfx++;
            $this->_line_boxes[$V3xsptcgzss2]->w -= $V4ljftfdeqpl->get_margin_width();
        }

        
        $Vjlmjalejjxa = 0;
        foreach ($this->_line_boxes[$V3xsptcgzss2]->get_frames() as $V4ljftfdeqpl) {
            $Vjlmjalejjxa = max($Vjlmjalejjxa, $V4ljftfdeqpl->get_margin_height());
        }

        $this->_line_boxes[$V3xsptcgzss2]->h = $Vjlmjalejjxa;

        
        while ($this->_cl > $V3xsptcgzss2) {
            $this->_line_boxes[$this->_cl] = null;
            unset($this->_line_boxes[$this->_cl]);
            $this->_cl--;
        }
    }

    
    function increase_line_width($Vhoifq2kocyt)
    {
        $this->_line_boxes[$this->_cl]->w += $Vhoifq2kocyt;
    }

    
    function maximize_line_height($Vzyqcsfbm3q4, Frame $Vnk2ly5jcvjf)
    {
        if ($Vzyqcsfbm3q4 > $this->_line_boxes[$this->_cl]->h) {
            $this->_line_boxes[$this->_cl]->tallest_frame = $Vnk2ly5jcvjf;
            $this->_line_boxes[$this->_cl]->h = $Vzyqcsfbm3q4;
        }
    }

    
    function add_line($Vxo14t4heoku = false)
    {




        $this->_line_boxes[$this->_cl]->br = $Vxo14t4heoku;
        $Vopgub02o3q2 = $this->_line_boxes[$this->_cl]->y + $this->_line_boxes[$this->_cl]->h;

        $Vajxmnkxbyjz = new LineBox($this, $Vopgub02o3q2);

        $this->_line_boxes[++$this->_cl] = $Vajxmnkxbyjz;
    }

    
}
