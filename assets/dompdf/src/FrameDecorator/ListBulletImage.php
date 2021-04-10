<?php

namespace Dompdf\FrameDecorator;

use Dompdf\Dompdf;
use Dompdf\Frame;
use Dompdf\Helpers;


class ListBulletImage extends AbstractFrameDecorator
{

    
    protected $Vf4abxhgyf2g;

    
    protected $Vn1ew5szmvh5;

    
    protected $V0mpk4c0jqb4;

    
    function __construct(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz)
    {
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        $Vsp0omgzz2yw = $Vdidzwb0w3vc->list_style_image;
        $Vnk2ly5jcvjf->get_node()->setAttribute("src", $Vsp0omgzz2yw);
        $this->_img = new Image($Vnk2ly5jcvjf, $Vhvghaoacagz);
        parent::__construct($this->_img, $Vhvghaoacagz);
        list($Vztt3qdrrikx, $Vku40chc0ddp) = Helpers::dompdf_getimagesize($this->_img->get_image_url(), $Vhvghaoacagz->getHttpContext());

        
        
        
        $Vs5sugw0qedn = $this->_dompdf->getOptions()->getDpi();
        $this->_width = ((float)rtrim($Vztt3qdrrikx, "px") * 72) / $Vs5sugw0qedn;
        $this->_height = ((float)rtrim($Vku40chc0ddp, "px") * 72) / $Vs5sugw0qedn;

        
        
        
        
        
        
        
        
        
        
        
    }

    
    function get_width()
    {
        
        
        
        
        return $this->_frame->get_style()->get_font_size() * ListBullet::BULLET_SIZE +
        2 * ListBullet::BULLET_PADDING;
    }

    
    function get_height()
    {
        
        return $this->_height;
    }

    
    function get_margin_width()
    {
        
        
        
        
        
        

        
        
        if ($this->_frame->get_style()->list_style_position === "outside" || $this->_width == 0) {
            return 0;
        }
        
        
        
        
        
        return $this->_width + 2 * ListBullet::BULLET_PADDING;
    }

    
    function get_margin_height()
    {
        
        
        return $this->_height + 2 * ListBullet::BULLET_PADDING;
    }

    
    function get_image_url()
    {
        return $this->_img->get_image_url();
    }

}
