<?php

namespace Dompdf\FrameDecorator;

use Dompdf\Css\Style;
use Dompdf\Dompdf;
use Dompdf\Helpers;
use Dompdf\Frame;
use Dompdf\Renderer;


class Page extends AbstractFrameDecorator
{

    
    protected $Vfxk1bjcr1ag;

    
    protected $Vggahm521wtz;

    
    protected $V13cqv2xwwyd;

    
    protected $V1u52rporjfc;

    
    protected $Vhvptifa3ybx = array();

    

    
    function __construct(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz)
    {
        parent::__construct($Vnk2ly5jcvjf, $Vhvghaoacagz);
        $this->_page_full = false;
        $this->_in_table = 0;
        $this->_bottom_page_margin = null;
    }

    
    function set_renderer($Vn2mrtbf4ecy)
    {
        $this->_renderer = $Vn2mrtbf4ecy;
    }

    
    function get_renderer()
    {
        return $this->_renderer;
    }

    
    function set_containing_block($Vs4gloy23a1d = null, $Vopgub02o3q2 = null, $Vhoifq2kocyt = null, $Vjlmjalejjxa = null)
    {
        parent::set_containing_block($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa);
        
        if (isset($Vjlmjalejjxa)) {
            $this->_bottom_page_margin = $Vjlmjalejjxa;
        } 
    }

    
    function is_full()
    {
        return $this->_page_full;
    }

    
    function next_page()
    {
        $this->_floating_frames = array();
        $this->_renderer->new_page();
        $this->_page_full = false;
    }

    
    function table_reflow_start()
    {
        $this->_in_table++;
    }

    
    function table_reflow_end()
    {
        $this->_in_table--;
    }

    
    function in_nested_table()
    {
        return $this->_in_table > 1;
    }

    
    function check_forced_page_break(Frame $Vnk2ly5jcvjf)
    {

        
        if ($this->_page_full) {
            return null;
        }

        $V2ytmfynfnxj = array("block", "list-item", "table", "inline");
        $Va3lowltrssp = array("always", "left", "right");

        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();

        if (!in_array($Vdidzwb0w3vc->display, $V2ytmfynfnxj)) {
            return false;
        }

        
        $V3ymialkbj3v = $Vnk2ly5jcvjf->get_prev_sibling();

        while ($V3ymialkbj3v && !in_array($V3ymialkbj3v->get_style()->display, $V2ytmfynfnxj)) {
            $V3ymialkbj3v = $V3ymialkbj3v->get_prev_sibling();
        }

        if (in_array($Vdidzwb0w3vc->page_break_before, $Va3lowltrssp)) {
            
            $Vnk2ly5jcvjf->split(null, true);
            
            
            $Vnk2ly5jcvjf->get_style()->page_break_before = "auto";
            $this->_page_full = true;

            return true;
        }

        if ($V3ymialkbj3v && in_array($V3ymialkbj3v->get_style()->page_break_after, $Va3lowltrssp)) {
            
            $Vnk2ly5jcvjf->split(null, true);
            $V3ymialkbj3v->get_style()->page_break_after = "auto";
            $this->_page_full = true;

            return true;
        }

        if ($V3ymialkbj3v && $V3ymialkbj3v->get_last_child() && $Vnk2ly5jcvjf->get_node()->nodeName != "body") {
            $V3ymialkbj3v_last_child = $V3ymialkbj3v->get_last_child();
            if (in_array($V3ymialkbj3v_last_child->get_style()->page_break_after, $Va3lowltrssp)) {
                $Vnk2ly5jcvjf->split(null, true);
                $V3ymialkbj3v_last_child->get_style()->page_break_after = "auto";
                $this->_page_full = true;

                return true;
            }
        }

        return false;
    }

    
    protected function _page_break_allowed(Frame $Vnk2ly5jcvjf)
    {
        $V2ytmfynfnxj = array("block", "list-item", "table", "-dompdf-image");
        Helpers::dompdf_debug("page-break", "_page_break_allowed(" . $Vnk2ly5jcvjf->get_node()->nodeName . ")");
        $Vsagginauquc = $Vnk2ly5jcvjf->get_style()->display;

        
        if (in_array($Vsagginauquc, $V2ytmfynfnxj)) {

            
            if ($this->_in_table) {
                Helpers::dompdf_debug("page-break", "In table: " . $this->_in_table);

                return false;
            }

            

            if ($Vnk2ly5jcvjf->get_style()->page_break_before === "avoid") {
                Helpers::dompdf_debug("page-break", "before: avoid");

                return false;
            }

            
            $V3ymialkbj3v = $Vnk2ly5jcvjf->get_prev_sibling();
            while ($V3ymialkbj3v && !in_array($V3ymialkbj3v->get_style()->display, $V2ytmfynfnxj)) {
                $V3ymialkbj3v = $V3ymialkbj3v->get_prev_sibling();
            }

            
            if ($V3ymialkbj3v && $V3ymialkbj3v->get_style()->page_break_after === "avoid") {
                Helpers::dompdf_debug("page-break", "after: avoid");

                return false;
            }

            
            
            $Vycghhqowrim = $Vnk2ly5jcvjf->get_parent();
            if ($V3ymialkbj3v && $Vycghhqowrim && $Vycghhqowrim->get_style()->page_break_inside === "avoid") {
                Helpers::dompdf_debug("page-break", "parent inside: avoid");

                return false;
            }

            
            
            
            if ($Vycghhqowrim->get_node()->nodeName === "body" && !$V3ymialkbj3v) {
                
                Helpers::dompdf_debug("page-break", "Body's first child.");

                return false;
            }

            
            
            if (!$V3ymialkbj3v && $Vycghhqowrim) {
                return $this->_page_break_allowed($Vycghhqowrim);
            }

            Helpers::dompdf_debug("page-break", "block: break allowed");

            return true;

        } 
        else {
            if (in_array($Vsagginauquc, Style::$V3irmujeshqx)) {

                
                if ($this->_in_table) {
                    Helpers::dompdf_debug("page-break", "In table: " . $this->_in_table);

                    return false;
                }

                
                $Vs1ayz3rw5zi = $Vnk2ly5jcvjf->find_block_parent();
                if (count($Vs1ayz3rw5zi->get_line_boxes()) < $Vnk2ly5jcvjf->get_style()->orphans) {
                    Helpers::dompdf_debug("page-break", "orphans");

                    return false;
                }

                
                

                
                $Vksopkgqixky = $Vs1ayz3rw5zi;
                while ($Vksopkgqixky) {
                    if ($Vksopkgqixky->get_style()->page_break_inside === "avoid") {
                        Helpers::dompdf_debug("page-break", "parent->inside: avoid");

                        return false;
                    }
                    $Vksopkgqixky = $Vksopkgqixky->find_block_parent();
                }

                
                
                
                $V3ymialkbj3v = $Vnk2ly5jcvjf->get_prev_sibling();
                while ($V3ymialkbj3v && ($V3ymialkbj3v->is_text_node() && trim($V3ymialkbj3v->get_node()->nodeValue) == "")) {
                    $V3ymialkbj3v = $V3ymialkbj3v->get_prev_sibling();
                }

                if ($Vs1ayz3rw5zi->get_node()->nodeName === "body" && !$V3ymialkbj3v) {
                    
                    Helpers::dompdf_debug("page-break", "Body's first child.");

                    return false;
                }

                
                if ($Vnk2ly5jcvjf->is_text_node() && $Vnk2ly5jcvjf->get_node()->nodeValue == "") {
                    return false;
                }

                Helpers::dompdf_debug("page-break", "inline: break allowed");

                return true;

            
            } else {
                if ($Vsagginauquc === "table-row") {
                    
                    
                    $Vahqmfi4rdgw = Table::find_parent_table($Vnk2ly5jcvjf);

                    $Vksopkgqixky = $Vahqmfi4rdgw;
                    while ($Vksopkgqixky) {
                        if ($Vksopkgqixky->get_style()->page_break_inside === "avoid") {
                            Helpers::dompdf_debug("page-break", "parent->inside: avoid");

                            return false;
                        }
                        $Vksopkgqixky = $Vksopkgqixky->find_block_parent();
                    }

                    
                    if ($Vahqmfi4rdgw && $Vahqmfi4rdgw->get_first_child() === $Vnk2ly5jcvjf || $Vahqmfi4rdgw->get_first_child()->get_first_child() === $Vnk2ly5jcvjf) {
                        Helpers::dompdf_debug("page-break", "table: first-row");

                        return false;
                    }

                    
                    if ($this->_in_table > 1) {
                        Helpers::dompdf_debug("page-break", "table: nested table");

                        return false;
                    }

                    Helpers::dompdf_debug("page-break", "table-row/row-groups: break allowed");

                    return true;
                } else {
                    if (in_array($Vsagginauquc, Table::$Vl0lmlwo3v4l)) {

                        
                        return false;

                    } else {
                        Helpers::dompdf_debug("page-break", "? " . $Vnk2ly5jcvjf->get_style()->display . "");

                        return false;
                    }
                }
            }
        }

    }

    
    function check_page_break(Frame $Vnk2ly5jcvjf)
    {
        
        $Vksopkgqixky = $Vnk2ly5jcvjf;
        $Vwxs1mp0bsdo = false;
        while ($Vksopkgqixky) {
            if ($Vksopkgqixky->is_table()) { $Vwxs1mp0bsdo = true; break; }
            $Vksopkgqixky = $Vksopkgqixky->get_parent();
        }
        
        
        if ($Vwxs1mp0bsdo) {
            if ($this->_page_full && $Vnk2ly5jcvjf->_already_pushed) {
                return false;
            }
        } elseif ($this->_page_full || $Vnk2ly5jcvjf->_already_pushed) {
            return false;
        }

        
        if ($Vwxs1mp0bsdo && $Vnk2ly5jcvjf->_already_pushed) {
            return false;
        }
        $Vksopkgqixky = $Vnk2ly5jcvjf;
        do {
            $Vsagginauquc = $Vksopkgqixky->get_style()->display;
            if ($Vsagginauquc == "table-row") {
                if ($Vksopkgqixky->_already_pushed) { return false; }
            }
        } while ($Vksopkgqixky = $Vksopkgqixky->get_parent());

        
        $Vksopkgqixky = $Vnk2ly5jcvjf;
        do {
            if ($Vksopkgqixky->is_absolute()) {
                return false;
            }

            
            
            $Vsagginauquc = $Vksopkgqixky->get_style()->display;
            if ($Vsagginauquc === "table-row"
                && !$Vksopkgqixky->get_prev_sibling()
                && $Vksopkgqixky->get_margin_height() > $this->get_margin_height()
            ) {
                return false;
            }
        } while ($Vksopkgqixky = $Vksopkgqixky->get_parent());

        $Vvbmhkets3pd = $Vnk2ly5jcvjf->get_margin_height();

        
        $Vlfsdo1xoorw = (float)$Vnk2ly5jcvjf->get_position("y") + $Vvbmhkets3pd;

        
        
        $Vksopkgqixky = $Vnk2ly5jcvjf->get_parent();
        while ($Vksopkgqixky) {
            $Vlfsdo1xoorw += $Vksopkgqixky->get_style()->computed_bottom_spacing();
            $Vksopkgqixky = $Vksopkgqixky->get_parent();
        }


        
        if ($Vlfsdo1xoorw <= $this->_bottom_page_margin) {
            
            return false;
        }

        Helpers::dompdf_debug("page-break", "check_page_break");
        Helpers::dompdf_debug("page-break", "in_table: " . $this->_in_table);

        
        $Vqz1antku1y3 = $Vnk2ly5jcvjf;
        $Vebhhfd5c4h0 = false;

        $Vwxs1mp0bsdo = $this->_in_table;

        Helpers::dompdf_debug("page-break", "Starting search");
        while ($Vqz1antku1y3) {
            
            if ($Vqz1antku1y3 === $this) {
                Helpers::dompdf_debug("page-break", "reached root.");
                
                break;
            }

            if ($this->_page_break_allowed($Vqz1antku1y3)) {
                Helpers::dompdf_debug("page-break", "break allowed, splitting.");
                $Vqz1antku1y3->split(null, true);
                $this->_page_full = true;
                $this->_in_table = $Vwxs1mp0bsdo;
                $Vnk2ly5jcvjf->_already_pushed = true;

                return true;
            }

            if (!$Vebhhfd5c4h0 && $V3v4ujy1pb5h = $Vqz1antku1y3->get_last_child()) {
                Helpers::dompdf_debug("page-break", "following last child.");

                if ($V3v4ujy1pb5h->is_table()) {
                    $this->_in_table++;
                }

                $Vqz1antku1y3 = $V3v4ujy1pb5h;
                continue;
            }

            if ($V3v4ujy1pb5h = $Vqz1antku1y3->get_prev_sibling()) {
                Helpers::dompdf_debug("page-break", "following prev sibling.");

                if ($V3v4ujy1pb5h->is_table() && !$Vqz1antku1y3->is_table()) {
                    $this->_in_table++;
                } else if (!$V3v4ujy1pb5h->is_table() && $Vqz1antku1y3->is_table()) {
                    $this->_in_table--;
                }

                $Vqz1antku1y3 = $V3v4ujy1pb5h;
                $Vebhhfd5c4h0 = false;
                continue;
            }

            if ($V3v4ujy1pb5h = $Vqz1antku1y3->get_parent()) {
                Helpers::dompdf_debug("page-break", "following parent.");

                if ($Vqz1antku1y3->is_table()) {
                    $this->_in_table--;
                }

                $Vqz1antku1y3 = $V3v4ujy1pb5h;
                $Vebhhfd5c4h0 = true;
                continue;
            }

            break;
        }

        $this->_in_table = $Vwxs1mp0bsdo;

        
        Helpers::dompdf_debug("page-break", "no valid break found, just splitting.");

        
        if ($this->_in_table) {
            $Vqz1antku1y3 = $Vnk2ly5jcvjf;
            while ($Vqz1antku1y3 && $Vqz1antku1y3->get_style()->display !== "table-row" && $Vqz1antku1y3->get_style()->display !== 'table-row-group' && $Vqz1antku1y3->_already_pushed === false) {
                $Vqz1antku1y3 = $Vqz1antku1y3->get_parent();
            }

            if ($Vqz1antku1y3) {
                $Vqz1antku1y3->split(null, true);
            } else {
                return false;
            }
        } else {
            $Vnk2ly5jcvjf->split(null, true);
        }

        $this->_page_full = true;
        $Vnk2ly5jcvjf->_already_pushed = true;

        return true;
    }

    

    
    function split(Frame $Vnk2ly5jcvjf = null, $Vxx1fnm322ds = false)
    {
        
    }

    
    function add_floating_frame(Frame $Vnk2ly5jcvjf)
    {
        array_unshift($this->_floating_frames, $Vnk2ly5jcvjf);
    }

    
    function get_floating_frames()
    {
        return $this->_floating_frames;
    }

    
    public function remove_floating_frame($Vqwhzgethmgj)
    {
        unset($this->_floating_frames[$Vqwhzgethmgj]);
    }

    
    public function get_lowest_float_offset(Frame $Vtcc233inn5m)
    {
        $Vdidzwb0w3vc = $Vtcc233inn5m->get_style();
        $Voj5js1i2adw = $Vdidzwb0w3vc->clear;
        $Vzte0430tk0z = $Vdidzwb0w3vc->float;

        $Vopgub02o3q2 = 0;

        if ($Vzte0430tk0z === "none") {
            foreach ($this->_floating_frames as $Vqwhzgethmgj => $Vnk2ly5jcvjf) {
                if ($Voj5js1i2adw === "both" || $Vnk2ly5jcvjf->get_style()->float === $Voj5js1i2adw) {
                    $Vopgub02o3q2 = max($Vopgub02o3q2, $Vnk2ly5jcvjf->get_position("y") + $Vnk2ly5jcvjf->get_margin_height());
                }
                $this->remove_floating_frame($Vqwhzgethmgj);
            }
        }

        if ($Vopgub02o3q2 > 0) {
            $Vopgub02o3q2++; 
        }

        return $Vopgub02o3q2;
    }
}
