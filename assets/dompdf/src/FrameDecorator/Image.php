<?php

namespace Dompdf\FrameDecorator;

use Dompdf\Dompdf;
use Dompdf\Frame;
use Dompdf\Image\Cache;


class Image extends AbstractFrameDecorator
{

    
    protected $V05b3qcm4ldm;

    
    protected $Vr003dsrxuj1;

    
    function __construct(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz)
    {
        parent::__construct($Vnk2ly5jcvjf, $Vhvghaoacagz);
        $Vsp0omgzz2yw = $Vnk2ly5jcvjf->get_node()->getAttribute("src");

        $Vbkoi33l1okc = $Vhvghaoacagz->getOptions()->getDebugPng();
        if ($Vbkoi33l1okc) {
            print '[__construct ' . $Vsp0omgzz2yw . ']';
        }

        list($this->_image_url, , $this->_image_msg) = Cache::resolve_url(
            $Vsp0omgzz2yw,
            $Vhvghaoacagz->getProtocol(),
            $Vhvghaoacagz->getBaseHost(),
            $Vhvghaoacagz->getBasePath(),
            $Vhvghaoacagz
        );

        if (Cache::is_broken($this->_image_url) &&
            $Vyynnxlbqs2n = $Vnk2ly5jcvjf->get_node()->getAttribute("alt")
        ) {
            $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
            $Vdidzwb0w3vc->width = (4 / 3) * $Vhvghaoacagz->getFontMetrics()->getTextWidth($Vyynnxlbqs2n, $Vdidzwb0w3vc->font_family, $Vdidzwb0w3vc->font_size, $Vdidzwb0w3vc->word_spacing);
            $Vdidzwb0w3vc->height = $Vhvghaoacagz->getFontMetrics()->getFontHeight($Vdidzwb0w3vc->font_family, $Vdidzwb0w3vc->font_size);
        }
    }

    
    function get_image_url()
    {
        return $this->_image_url;
    }

    
    function get_image_msg()
    {
        return $this->_image_msg;
    }

}
