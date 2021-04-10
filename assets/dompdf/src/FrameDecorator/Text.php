<?php

namespace Dompdf\FrameDecorator;

use Dompdf\Dompdf;
use Dompdf\Frame;
use Dompdf\Exception;


class Text extends AbstractFrameDecorator
{

    
    protected $Vzhgvfakv1yx;

    
    function __construct(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz)
    {
        if (!$Vnk2ly5jcvjf->is_text_node()) {
            throw new Exception("Text_Decorator can only be applied to #text nodes.");
        }

        parent::__construct($Vnk2ly5jcvjf, $Vhvghaoacagz);
        $this->_text_spacing = null;
    }

    function reset()
    {
        parent::reset();
        $this->_text_spacing = null;
    }

    

    
    function get_text_spacing()
    {
        return $this->_text_spacing;
    }

    
    function get_text()
    {
        













        return $this->_frame->get_node()->data;
    }

    

    
    function get_margin_height()
    {
        
        
        
        $Vdidzwb0w3vc = $this->get_parent()->get_style();
        $V3h4z3hxorxj = $Vdidzwb0w3vc->font_family;
        $Vlak25col1u3 = $Vdidzwb0w3vc->font_size;

        

        return ($Vdidzwb0w3vc->line_height / ($Vlak25col1u3 > 0 ? $Vlak25col1u3 : 1)) * $this->_dompdf->getFontMetrics()->getFontHeight($V3h4z3hxorxj, $Vlak25col1u3);
    }

    
    function get_padding_box()
    {
        $V2jy5mppeymq = $this->_frame->get_padding_box();
        $V2jy5mppeymq[3] = $V2jy5mppeymq["h"] = $this->_frame->get_style()->height;

        return $V2jy5mppeymq;
    }

    
    function set_text_spacing($Vuwwdaccmizk)
    {
        $Vdidzwb0w3vc = $this->_frame->get_style();

        $this->_text_spacing = $Vuwwdaccmizk;
        $Vaohjovek4hi = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->letter_spacing);

        
        $Vdidzwb0w3vc->width = $this->_dompdf->getFontMetrics()->getTextWidth($this->get_text(), $Vdidzwb0w3vc->font_family, $Vdidzwb0w3vc->font_size, $Vuwwdaccmizk, $Vaohjovek4hi);
    }

    
    function recalculate_width()
    {
        $Vdidzwb0w3vc = $this->get_style();
        $Vnlbbd31sxbf = $this->get_text();
        $Vlak25col1u3 = $Vdidzwb0w3vc->font_size;
        $V3h4z3hxorxj = $Vdidzwb0w3vc->font_family;
        $Vay4fk3jgmc4 = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->word_spacing);
        $Vaohjovek4hi = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->letter_spacing);

        return $Vdidzwb0w3vc->width = $this->_dompdf->getFontMetrics()->getTextWidth($Vnlbbd31sxbf, $V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4, $Vaohjovek4hi);
    }

    

    
    function split_text($Vq154qppcleo)
    {
        if ($Vq154qppcleo == 0) {
            return null;
        }

        $Vnfpmsb2trrw = $this->_frame->get_node()->splitText($Vq154qppcleo);

        $V134ns25tz1t = $this->copy($Vnfpmsb2trrw);

        $Vksopkgqixky = $this->get_parent();
        $Vksopkgqixky->insert_child_after($V134ns25tz1t, $this, false);

        if ($Vksopkgqixky instanceof Inline) {
            $Vksopkgqixky->split($V134ns25tz1t);
        }

        return $V134ns25tz1t;
    }

    
    function delete_text($Vq154qppcleo, $Vj4h4hyymhja)
    {
        $this->_frame->get_node()->deleteData($Vq154qppcleo, $Vj4h4hyymhja);
    }

    
    function set_text($Vnlbbd31sxbf)
    {
        $this->_frame->get_node()->data = $Vnlbbd31sxbf;
    }
}
