<?php

namespace Dompdf\FrameDecorator;

use Dompdf\Cellmap;
use DOMNode;
use Dompdf\Dompdf;
use Dompdf\Frame;
use Dompdf\Frame\Factory;


class Table extends AbstractFrameDecorator
{
    public static $Vrqtm3j4sbc4 = array(
        "table-row-group",
        "table-row",
        "table-header-group",
        "table-footer-group",
        "table-column",
        "table-column-group",
        "table-caption",
        "table-cell"
    );

    public static $Vl0lmlwo3v4l = array(
        'table-row-group',
        'table-header-group',
        'table-footer-group'
    );

    
    protected $Vvy4o2p0tqsm;

    
    protected $Vn2stbqyadwq;

    
    protected $Vskgi2yusb1r;

    
    protected $Vahvws3vh2bx;

    
    protected $Vhyl4qqb1q2l;

    
    public function __construct(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz)
    {
        parent::__construct($Vnk2ly5jcvjf, $Vhvghaoacagz);
        $this->_cellmap = new Cellmap($this);

        if ($Vnk2ly5jcvjf->get_style()->table_layout === "fixed") {
            $this->_cellmap->set_layout_fixed(true);
        }

        $this->_min_width = null;
        $this->_max_width = null;
        $this->_headers = array();
        $this->_footers = array();
    }

    public function reset()
    {
        parent::reset();
        $this->_cellmap->reset();
        $this->_min_width = null;
        $this->_max_width = null;
        $this->_headers = array();
        $this->_footers = array();
        $this->_reflower->reset();
    }

    

    
    public function split(Frame $Vtcc233inn5m = null, $Vxx1fnm322ds = false)
    {
        if (is_null($Vtcc233inn5m)) {
            parent::split();

            return;
        }

        
        
        if (count($this->_headers) && !in_array($Vtcc233inn5m, $this->_headers, true) &&
            !in_array($Vtcc233inn5m->get_prev_sibling(), $this->_headers, true)
        ) {
            $V0ur2t5u0cga = null;

            
            foreach ($this->_headers as $Vbcafeycvjtp) {

                $Viuvai50mmrz = $Vbcafeycvjtp->deep_copy();

                if (is_null($V0ur2t5u0cga)) {
                    $V0ur2t5u0cga = $Viuvai50mmrz;
                }

                $this->insert_child_before($Viuvai50mmrz, $Vtcc233inn5m);
            }

            parent::split($V0ur2t5u0cga);

        } elseif (in_array($Vtcc233inn5m->get_style()->display, self::$Vl0lmlwo3v4l)) {

            
            parent::split($Vtcc233inn5m);

        } else {

            $Vqz1antku1y3 = $Vtcc233inn5m;

            while ($Vqz1antku1y3) {
                $this->_cellmap->remove_row($Vqz1antku1y3);
                $Vqz1antku1y3 = $Vqz1antku1y3->get_next_sibling();
            }

            parent::split($Vtcc233inn5m);
        }
    }

    
    public function copy(DOMNode $Vbr2bywdrplx)
    {
        $V134ns25tz1t = parent::copy($Vbr2bywdrplx);

        
        $V134ns25tz1t->_cellmap->set_columns($this->_cellmap->get_columns());
        $V134ns25tz1t->_cellmap->lock_columns();

        return $V134ns25tz1t;
    }

    
    public static function find_parent_table(Frame $Vnk2ly5jcvjf)
    {
        while ($Vnk2ly5jcvjf = $Vnk2ly5jcvjf->get_parent()) {
            if ($Vnk2ly5jcvjf->is_table()) {
                break;
            }
        }

        return $Vnk2ly5jcvjf;
    }

    
    public function get_cellmap()
    {
        return $this->_cellmap;
    }

    
    public function get_min_width()
    {
        return $this->_min_width;
    }

    
    public function get_max_width()
    {
        return $this->_max_width;
    }

    
    public function set_min_width($Vztt3qdrrikx)
    {
        $this->_min_width = $Vztt3qdrrikx;
    }

    
    public function set_max_width($Vztt3qdrrikx)
    {
        $this->_max_width = $Vztt3qdrrikx;
    }

    
    public function normalise()
    {
        
        $Vwpzyzjex4bg = array();
        $Vuynehe3xiws = false;
        $Vqz1antku1y3 = $this->get_first_child();
        while ($Vqz1antku1y3) {
            $Vtcc233inn5m = $Vqz1antku1y3;
            $Vqz1antku1y3 = $Vqz1antku1y3->get_next_sibling();

            $Vsagginauquc = $Vtcc233inn5m->get_style()->display;

            if ($Vuynehe3xiws) {

                if ($Vsagginauquc === "table-row") {
                    
                    $this->insert_child_before($Vce3ewwqypvf, $Vtcc233inn5m);

                    $Vce3ewwqypvf->normalise();
                    $Vtcc233inn5m->normalise();
                    $this->_cellmap->add_row();
                    $Vuynehe3xiws = false;
                    continue;
                }

                
                $Vce3ewwqypvf->append_child($Vtcc233inn5m);
                continue;

            } else {

                if ($Vsagginauquc === "table-row") {
                    $Vtcc233inn5m->normalise();
                    continue;
                }

                if ($Vsagginauquc === "table-cell") {
                    $Vwbqaqisytil = $this->get_style()->get_stylesheet();

                    
                    $Vim4wws51jia = $this->get_node()->ownerDocument->createElement("tbody");

                    $Vnk2ly5jcvjf = new Frame($Vim4wws51jia);

                    $Vdidzwb0w3vc = $Vwbqaqisytil->create_style();
                    $Vdidzwb0w3vc->inherit($this->get_style());

                    
                    
                    
                    if ($Vim4wws51jia_style = $Vwbqaqisytil->lookup("tbody")) {
                        $Vdidzwb0w3vc->merge($Vim4wws51jia_style);
                    }
                    $Vdidzwb0w3vc->display = 'table-row-group';

                    
                    
                    $Vnk2ly5jcvjf->set_style($Vdidzwb0w3vc);
                    $Vce3ewwqypvf_group = Factory::decorate_frame($Vnk2ly5jcvjf, $this->_dompdf, $this->_root);

                    
                    $Vzmfvefqwysh = $this->get_node()->ownerDocument->createElement("tr");

                    $Vnk2ly5jcvjf = new Frame($Vzmfvefqwysh);

                    $Vdidzwb0w3vc = $Vwbqaqisytil->create_style();
                    $Vdidzwb0w3vc->inherit($this->get_style());

                    
                    
                    
                    if ($Vzmfvefqwysh_style = $Vwbqaqisytil->lookup("tr")) {
                        $Vdidzwb0w3vc->merge($Vzmfvefqwysh_style);
                    }
                    $Vdidzwb0w3vc->display = 'table-row';

                    
                    
                    $Vnk2ly5jcvjf->set_style(clone $Vdidzwb0w3vc);
                    $Vce3ewwqypvf = Factory::decorate_frame($Vnk2ly5jcvjf, $this->_dompdf, $this->_root);

                    
                    $Vce3ewwqypvf->append_child($Vtcc233inn5m, true);

                    
                    $Vce3ewwqypvf_group->append_child($Vce3ewwqypvf, true);

                    $Vuynehe3xiws = true;
                    continue;
                }

                if (!in_array($Vsagginauquc, self::$Vrqtm3j4sbc4)) {
                    $Vwpzyzjex4bg[] = $Vtcc233inn5m;
                    continue;
                }

                
                foreach ($Vtcc233inn5m->get_children() as $Vtts2zp3hvqq) {
                    if ($Vtts2zp3hvqq->get_style()->display === "table-row") {
                        $Vtts2zp3hvqq->normalise();
                    }
                }

                
                if ($Vsagginauquc === "table-header-group") {
                    $this->_headers[] = $Vtcc233inn5m;
                } elseif ($Vsagginauquc === "table-footer-group") {
                    $this->_footers[] = $Vtcc233inn5m;
                }
            }
        }

        if ($Vuynehe3xiws && $Vce3ewwqypvf_group instanceof AbstractFrameDecorator) {
            
            $this->_frame->append_child($Vce3ewwqypvf_group->_frame);
            $Vce3ewwqypvf->normalise();
        }

        foreach ($Vwpzyzjex4bg as $Vnk2ly5jcvjf) {
            $this->move_after($Vnk2ly5jcvjf);
        }
    }

    

    
    public function move_after(Frame $Vnk2ly5jcvjf)
    {
        $this->get_parent()->insert_child_after($Vnk2ly5jcvjf, $this);
    }
}
