<?php

namespace Dompdf\FrameReflower;

use Dompdf\Frame;
use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
use Dompdf\FrameDecorator\Page as PageFrameDecorator;


class Page extends AbstractFrameReflower
{

    
    private $Vtjsmsxds4fi;

    
    private $Vuxbwvazzzwh;

    
    function __construct(PageFrameDecorator $Vnk2ly5jcvjf)
    {
        parent::__construct($Vnk2ly5jcvjf);
    }

    
    function apply_page_style(Frame $Vnk2ly5jcvjf, $Vmxezqy2cq23)
    {
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        $Ve42hbklokcw = $Vdidzwb0w3vc->get_stylesheet()->get_page_styles();

        
        if (count($Ve42hbklokcw) > 1) {
            $Vcifdx35cf5o = $Vmxezqy2cq23 % 2 == 1;
            $Vwgat4jvv533 = $Vmxezqy2cq23 == 1;

            $Vdidzwb0w3vc = clone $Ve42hbklokcw["base"];

            
            if ($Vcifdx35cf5o && isset($Ve42hbklokcw[":right"])) {
                $Vdidzwb0w3vc->merge($Ve42hbklokcw[":right"]);
            }

            if ($Vcifdx35cf5o && isset($Ve42hbklokcw[":odd"])) {
                $Vdidzwb0w3vc->merge($Ve42hbklokcw[":odd"]);
            }

            
            if (!$Vcifdx35cf5o && isset($Ve42hbklokcw[":left"])) {
                $Vdidzwb0w3vc->merge($Ve42hbklokcw[":left"]);
            }

            if (!$Vcifdx35cf5o && isset($Ve42hbklokcw[":even"])) {
                $Vdidzwb0w3vc->merge($Ve42hbklokcw[":even"]);
            }

            if ($Vwgat4jvv533 && isset($Ve42hbklokcw[":first"])) {
                $Vdidzwb0w3vc->merge($Ve42hbklokcw[":first"]);
            }

            $Vnk2ly5jcvjf->set_style($Vdidzwb0w3vc);
        }
    }

    
    function reflow(BlockFrameDecorator $Vwoflziz3q5d = null)
    {
        $Vps0dgljwy1s = array();
        $Vfie5hp0fkw2 = null;
        $Vtcc233inn5m = $this->_frame->get_first_child();
        $Vsfkwy254xv2 = 0;

        while ($Vtcc233inn5m) {
            $this->apply_page_style($this->_frame, $Vsfkwy254xv2 + 1);

            $Vdidzwb0w3vc = $this->_frame->get_style();

            
            $Vavdpq045wub = $this->_frame->get_containing_block();
            $V0opnfka0og1 = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_left, $Vavdpq045wub["w"]);
            $Vqemi0kebtld = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_right, $Vavdpq045wub["w"]);
            $Vnre3z2vvgov = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_top, $Vavdpq045wub["h"]);
            $Vs4qcjm3btdq = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_bottom, $Vavdpq045wub["h"]);

            $Vzkuudgqzult = $Vavdpq045wub["x"] + $V0opnfka0og1;
            $Vle51ktvnbt4 = $Vavdpq045wub["y"] + $Vnre3z2vvgov;
            $Vipne4nlxpst = $Vavdpq045wub["w"] - $V0opnfka0og1 - $Vqemi0kebtld;
            $Vr4rva54sovd = $Vavdpq045wub["h"] - $Vnre3z2vvgov - $Vs4qcjm3btdq;

            
            if ($Vsfkwy254xv2 == 0) {
                $Vtcc233inn5mren = $Vtcc233inn5m->get_children();
                foreach ($Vtcc233inn5mren as $Vvutd1idcn0y) {
                    if ($Vvutd1idcn0y->get_style()->position === "fixed") {
                        $Vps0dgljwy1s[] = $Vvutd1idcn0y->deep_copy();
                    }
                }
                $Vps0dgljwy1s = array_reverse($Vps0dgljwy1s);
            }

            $Vtcc233inn5m->set_containing_block($Vzkuudgqzult, $Vle51ktvnbt4, $Vipne4nlxpst, $Vr4rva54sovd);

            
            $this->_check_callbacks("begin_page_reflow", $Vtcc233inn5m);

            
            if ($Vsfkwy254xv2 >= 1) {
                foreach ($Vps0dgljwy1s as $Vbfwcqmrrglf) {
                    $Vtcc233inn5m->insert_child_before($Vbfwcqmrrglf->deep_copy(), $Vtcc233inn5m->get_first_child());
                }
            }

            $Vtcc233inn5m->reflow();
            $Vkwwqzuhgyrn = $Vtcc233inn5m->get_next_sibling();

            
            $this->_check_callbacks("begin_page_render", $Vtcc233inn5m);

            
            $this->_frame->get_renderer()->render($Vtcc233inn5m);

            
            $this->_check_callbacks("end_page_render", $Vtcc233inn5m);

            if ($Vkwwqzuhgyrn) {
                $this->_frame->next_page();
            }

            
            
            if ($Vfie5hp0fkw2) {
                $Vfie5hp0fkw2->dispose(true);
            }
            $Vfie5hp0fkw2 = $Vtcc233inn5m;
            $Vtcc233inn5m = $Vkwwqzuhgyrn;
            $Vsfkwy254xv2++;
        }

        
        if ($Vfie5hp0fkw2) {
            $Vfie5hp0fkw2->dispose(true);
        }
    }

    
    protected function _check_callbacks($Vflqyoc1obms, $Vnk2ly5jcvjf)
    {
        if (!isset($this->_callbacks)) {
            $Vhvghaoacagz = $this->_frame->get_dompdf();
            $this->_callbacks = $Vhvghaoacagz->get_callbacks();
            $this->_canvas = $Vhvghaoacagz->get_canvas();
        }

        if (is_array($this->_callbacks) && isset($this->_callbacks[$Vflqyoc1obms])) {
            $Vp03vxkbvgmn = array(
                0 => $this->_canvas, "canvas" => $this->_canvas,
                1 => $Vnk2ly5jcvjf,         "frame"  => $Vnk2ly5jcvjf,
            );
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
}
