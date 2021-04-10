<?php

namespace Dompdf\FrameDecorator;

use Dompdf\Dompdf;
use Dompdf\Frame;


class ListBullet extends AbstractFrameDecorator
{

    const BULLET_PADDING = 1; 
    
    const BULLET_THICKNESS = 0.04; 
    const BULLET_DESCENT = 0.3; 
    const BULLET_SIZE = 0.35; 

    static $Vwiamfc0w2q5 = array("disc", "circle", "square");

    
    function __construct(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz)
    {
        parent::__construct($Vnk2ly5jcvjf, $Vhvghaoacagz);
    }

    
    function get_margin_width()
    {
        $Vdidzwb0w3vc = $this->_frame->get_style();

        if ($Vdidzwb0w3vc->list_style_type === "none") {
            return 0;
        }

        return $Vdidzwb0w3vc->get_font_size() * self::BULLET_SIZE + 2 * self::BULLET_PADDING;
    }

    
    function get_margin_height()
    {
        $Vdidzwb0w3vc = $this->_frame->get_style();

        if ($Vdidzwb0w3vc->list_style_type === "none") {
            return 0;
        }

        return $Vdidzwb0w3vc->get_font_size() * self::BULLET_SIZE + 2 * self::BULLET_PADDING;
    }

    
    function get_width()
    {
        return $this->get_margin_width();
    }

    
    function get_height()
    {
        return $this->get_margin_height();
    }

    
}
