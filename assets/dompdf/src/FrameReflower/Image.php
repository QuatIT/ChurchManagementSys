<?php

namespace Dompdf\FrameReflower;

use Dompdf\Helpers;
use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
use Dompdf\FrameDecorator\Image as ImageFrameDecorator;


class Image extends AbstractFrameReflower
{

    
    function __construct(ImageFrameDecorator $Vnk2ly5jcvjf)
    {
        parent::__construct($Vnk2ly5jcvjf);
    }

    
    function reflow(BlockFrameDecorator $Vwoflziz3q5d = null)
    {
        $Vcki4t4qmybshis->_frame->position();

        
        
        

        
        
        

        
        $Vcki4t4qmybshis->get_min_max_width();

        if ($Vwoflziz3q5d) {
            $Vwoflziz3q5d->add_frame_to_line($Vcki4t4qmybshis->_frame);
        }
    }

    
    function get_min_max_width()
    {
        if ($Vcki4t4qmybshis->get_dompdf()->getOptions()->getDebugPng()) {
            
            list($Vblo10mj3i2c, $Vbsposogpwk2) = Helpers::dompdf_getimagesize($Vcki4t4qmybshis->_frame->get_image_url(), $Vcki4t4qmybshis->get_dompdf()->getHttpContext());
            print "get_min_max_width() " .
                $Vcki4t4qmybshis->_frame->get_style()->width . ' ' .
                $Vcki4t4qmybshis->_frame->get_style()->height . ';' .
                $Vcki4t4qmybshis->_frame->get_parent()->get_style()->width . " " .
                $Vcki4t4qmybshis->_frame->get_parent()->get_style()->height . ";" .
                $Vcki4t4qmybshis->_frame->get_parent()->get_parent()->get_style()->width . ' ' .
                $Vcki4t4qmybshis->_frame->get_parent()->get_parent()->get_style()->height . ';' .
                $Vblo10mj3i2c . ' ' .
                $Vbsposogpwk2 . '|';
        }

        $Vdidzwb0w3vc = $Vcki4t4qmybshis->_frame->get_style();

        $Vs3cp1naqgjw = true;
        $Vomzhcom15s3 = true;

        
        
        
        
        

        $Vztt3qdrrikx = ($Vdidzwb0w3vc->width > 0 ? $Vdidzwb0w3vc->width : 0);
        if (Helpers::is_percent($Vztt3qdrrikx)) {
            $Vcki4t4qmybs = 0.0;
            for ($V4ljftfdeqpl = $Vcki4t4qmybshis->_frame->get_parent(); $V4ljftfdeqpl; $V4ljftfdeqpl = $V4ljftfdeqpl->get_parent()) {
                $V4ljftfdeqpl_style = $V4ljftfdeqpl->get_style();
                $Vcki4t4qmybs = $V4ljftfdeqpl_style->length_in_pt($V4ljftfdeqpl_style->width);
                if ($Vcki4t4qmybs != 0) {
                    break;
                }
            }
            $Vztt3qdrrikx = ((float)rtrim($Vztt3qdrrikx, "%") * $Vcki4t4qmybs) / 100; 
        } else {
            
            
            
            
            $Vztt3qdrrikx = $Vdidzwb0w3vc->length_in_pt($Vztt3qdrrikx);
        }

        $Vku40chc0ddp = ($Vdidzwb0w3vc->height > 0 ? $Vdidzwb0w3vc->height : 0);
        if (Helpers::is_percent($Vku40chc0ddp)) {
            $Vcki4t4qmybs = 0.0;
            for ($V4ljftfdeqpl = $Vcki4t4qmybshis->_frame->get_parent(); $V4ljftfdeqpl; $V4ljftfdeqpl = $V4ljftfdeqpl->get_parent()) {
                $V4ljftfdeqpl_style = $V4ljftfdeqpl->get_style();
                $Vcki4t4qmybs = (float)$V4ljftfdeqpl_style->length_in_pt($V4ljftfdeqpl_style->height);
                if ($Vcki4t4qmybs != 0) {
                    break;
                }
            }
            $Vku40chc0ddp = ((float)rtrim($Vku40chc0ddp, "%") * $Vcki4t4qmybs) / 100; 
        } else {
            
            
            
            
            $Vku40chc0ddp = $Vdidzwb0w3vc->length_in_pt($Vku40chc0ddp);
        }

        if ($Vztt3qdrrikx == 0 || $Vku40chc0ddp == 0) {
            
            list($Vblo10mj3i2c, $Vbsposogpwk2) = Helpers::dompdf_getimagesize($Vcki4t4qmybshis->_frame->get_image_url(), $Vcki4t4qmybshis->get_dompdf()->getHttpContext());

            
            
            
            if ($Vztt3qdrrikx == 0 && $Vku40chc0ddp == 0) {
                $Vs5sugw0qedn = $Vcki4t4qmybshis->_frame->get_dompdf()->getOptions()->getDpi();
                $Vztt3qdrrikx = (float)($Vblo10mj3i2c * 72) / $Vs5sugw0qedn;
                $Vku40chc0ddp = (float)($Vbsposogpwk2 * 72) / $Vs5sugw0qedn;
                $Vs3cp1naqgjw = false;
                $Vomzhcom15s3 = false;
            } elseif ($Vku40chc0ddp == 0 && $Vztt3qdrrikx != 0) {
                $Vomzhcom15s3 = false;
                $Vku40chc0ddp = ($Vztt3qdrrikx / $Vblo10mj3i2c) * $Vbsposogpwk2; 
            } elseif ($Vztt3qdrrikx == 0 && $Vku40chc0ddp != 0) {
                $Vs3cp1naqgjw = false;
                $Vztt3qdrrikx = ($Vku40chc0ddp / $Vbsposogpwk2) * $Vblo10mj3i2c; 
            }
        }

        
        if ($Vdidzwb0w3vc->min_width !== "none" ||
            $Vdidzwb0w3vc->max_width !== "none" ||
            $Vdidzwb0w3vc->min_height !== "none" ||
            $Vdidzwb0w3vc->max_height !== "none"
        ) {

            list( , , $Vhoifq2kocyt, $Vjlmjalejjxa) = $Vcki4t4qmybshis->_frame->get_containing_block();

            $Vlfmfjqpuuf2 = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->min_width, $Vhoifq2kocyt);
            $V0w3slmcpwy4 = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->max_width, $Vhoifq2kocyt);
            $V1fbvsstmyzr = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->min_height, $Vjlmjalejjxa);
            $Vvilppdj3er1 = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->max_height, $Vjlmjalejjxa);

            if ($V0w3slmcpwy4 !== "none" && $Vztt3qdrrikx > $V0w3slmcpwy4) {
                if (!$Vomzhcom15s3) {
                    $Vku40chc0ddp *= $V0w3slmcpwy4 / $Vztt3qdrrikx;
                }

                $Vztt3qdrrikx = $V0w3slmcpwy4;
            }

            if ($Vlfmfjqpuuf2 !== "none" && $Vztt3qdrrikx < $Vlfmfjqpuuf2) {
                if (!$Vomzhcom15s3) {
                    $Vku40chc0ddp *= $Vlfmfjqpuuf2 / $Vztt3qdrrikx;
                }

                $Vztt3qdrrikx = $Vlfmfjqpuuf2;
            }

            if ($Vvilppdj3er1 !== "none" && $Vku40chc0ddp > $Vvilppdj3er1) {
                if (!$Vs3cp1naqgjw) {
                    $Vztt3qdrrikx *= $Vvilppdj3er1 / $Vku40chc0ddp;
                }

                $Vku40chc0ddp = $Vvilppdj3er1;
            }

            if ($V1fbvsstmyzr !== "none" && $Vku40chc0ddp < $V1fbvsstmyzr) {
                if (!$Vs3cp1naqgjw) {
                    $Vztt3qdrrikx *= $V1fbvsstmyzr / $Vku40chc0ddp;
                }

                $Vku40chc0ddp = $V1fbvsstmyzr;
            }
        }

        if ($Vcki4t4qmybshis->get_dompdf()->getOptions()->getDebugPng()) {
            print $Vztt3qdrrikx . ' ' . $Vku40chc0ddp . ';';
        }

        $Vdidzwb0w3vc->width = $Vztt3qdrrikx . "pt";
        $Vdidzwb0w3vc->height = $Vku40chc0ddp . "pt";

        $Vdidzwb0w3vc->min_width = "none";
        $Vdidzwb0w3vc->max_width = "none";
        $Vdidzwb0w3vc->min_height = "none";
        $Vdidzwb0w3vc->max_height = "none";

        return array($Vztt3qdrrikx, $Vztt3qdrrikx, "min" => $Vztt3qdrrikx, "max" => $Vztt3qdrrikx);
    }
}
