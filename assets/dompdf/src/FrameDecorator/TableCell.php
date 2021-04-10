<?php

namespace Dompdf\FrameDecorator;

use Dompdf\Dompdf;
use Dompdf\Frame;
use Dompdf\FrameDecorator\Block as BlockFrameDecorator;


class TableCell extends BlockFrameDecorator
{

    protected $Vqyqvlx3gj2w;
    protected $Vf44qdkubxmi;

    

    
    function __construct(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz)
    {
        parent::__construct($Vnk2ly5jcvjf, $Vhvghaoacagz);
        $this->_resolved_borders = array();
        $this->_content_height = 0;
    }

    

    function reset()
    {
        parent::reset();
        $this->_resolved_borders = array();
        $this->_content_height = 0;
        $this->_frame->reset();
    }

    
    function get_content_height()
    {
        return $this->_content_height;
    }

    
    function set_content_height($Vku40chc0ddp)
    {
        $this->_content_height = $Vku40chc0ddp;
    }

    
    function set_cell_height($Vku40chc0ddp)
    {
        $Vdidzwb0w3vc = $this->get_style();
        $Voh5i33caly5 = (float)$Vdidzwb0w3vc->length_in_pt(
            array(
                $Vdidzwb0w3vc->margin_top,
                $Vdidzwb0w3vc->padding_top,
                $Vdidzwb0w3vc->border_top_width,
                $Vdidzwb0w3vc->border_bottom_width,
                $Vdidzwb0w3vc->padding_bottom,
                $Vdidzwb0w3vc->margin_bottom
            ),
            (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->height)
        );

        $V0rbmnonn1iu = $Vku40chc0ddp - $Voh5i33caly5;
        $Vdidzwb0w3vc->height = $V0rbmnonn1iu;

        if ($V0rbmnonn1iu > $this->_content_height) {
            $Vfkov23vd2ia = 0;

            
            switch ($Vdidzwb0w3vc->vertical_align) {
                default:
                case "baseline":
                    

                case "top":
                    
                    return;

                case "middle":
                    $Vfkov23vd2ia = ($V0rbmnonn1iu - $this->_content_height) / 2;
                    break;

                case "bottom":
                    $Vfkov23vd2ia = $V0rbmnonn1iu - $this->_content_height;
                    break;
            }

            if ($Vfkov23vd2ia) {
                
                foreach ($this->get_line_boxes() as $V4m4rbmlpgn2) {
                    foreach ($V4m4rbmlpgn2->get_frames() as $Vnk2ly5jcvjf) {
                        $Vnk2ly5jcvjf->move(0, $Vfkov23vd2ia);
                    }
                }
            }
        }
    }

    
    function set_resolved_border($Voj5js1i2adw, $Vokwve3d1nkg)
    {
        $this->_resolved_borders[$Voj5js1i2adw] = $Vokwve3d1nkg;
    }

    
    function get_resolved_border($Voj5js1i2adw)
    {
        return $this->_resolved_borders[$Voj5js1i2adw];
    }

    
    function get_resolved_borders()
    {
        return $this->_resolved_borders;
    }
}
