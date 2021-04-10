<?php

namespace Dompdf\FrameReflower;

use Dompdf\Frame;
use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
use Dompdf\FrameDecorator\TableCell as TableCellFrameDecorator;
use Dompdf\FrameDecorator\Text as TextFrameDecorator;
use Dompdf\Exception;
use Dompdf\Css\Style;


class Block extends AbstractFrameReflower
{
    
    const MIN_JUSTIFY_WIDTH = 0.80;

    
    protected $Vtabfexfghu0;

    function __construct(BlockFrameDecorator $Vnk2ly5jcvjf)
    {
        parent::__construct($Vnk2ly5jcvjf);
    }

    
    protected function _calculate_width($Vztt3qdrrikx)
    {
        $Vnk2ly5jcvjf = $this->_frame;
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        $Vhoifq2kocyt = $Vnk2ly5jcvjf->get_containing_block("w");

        if ($Vdidzwb0w3vc->position === "fixed") {
            $Vhoifq2kocyt = $Vnk2ly5jcvjf->get_parent()->get_containing_block("w");
        }

        $Vuorspfzhdz0 = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_right, $Vhoifq2kocyt);
        $V43vumv0zpd3 = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_left, $Vhoifq2kocyt);

        $V0opnfka0og1 = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->left, $Vhoifq2kocyt);
        $Vqemi0kebtld = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->right, $Vhoifq2kocyt);

        
        $Vo1o33y03ae2 = array($Vdidzwb0w3vc->border_left_width,
            $Vdidzwb0w3vc->border_right_width,
            $Vdidzwb0w3vc->padding_left,
            $Vdidzwb0w3vc->padding_right,
            $Vztt3qdrrikx !== "auto" ? $Vztt3qdrrikx : 0,
            $Vuorspfzhdz0 !== "auto" ? $Vuorspfzhdz0 : 0,
            $V43vumv0zpd3 !== "auto" ? $V43vumv0zpd3 : 0);

        
        if ($Vnk2ly5jcvjf->is_absolute()) {
            $Vgi0zrckrgbl = true;
            $Vo1o33y03ae2[] = $V0opnfka0og1 !== "auto" ? $V0opnfka0og1 : 0;
            $Vo1o33y03ae2[] = $Vqemi0kebtld !== "auto" ? $Vqemi0kebtld : 0;
        } else {
            $Vgi0zrckrgbl = false;
        }

        $Vovlv0tclhce = (float)$Vdidzwb0w3vc->length_in_pt($Vo1o33y03ae2, $Vhoifq2kocyt);

        
        $V1cylm503ett = $Vhoifq2kocyt - $Vovlv0tclhce;

        if ($V1cylm503ett > 0) {
            if ($Vgi0zrckrgbl) {
                
                

                if ($Vztt3qdrrikx === "auto" && $V0opnfka0og1 === "auto" && $Vqemi0kebtld === "auto") {
                    if ($V43vumv0zpd3 === "auto") {
                        $V43vumv0zpd3 = 0;
                    }
                    if ($Vuorspfzhdz0 === "auto") {
                        $Vuorspfzhdz0 = 0;
                    }

                    
                    
                    
                    $V0opnfka0og1 = 0;
                    $Vqemi0kebtld = 0;
                    $Vztt3qdrrikx = $V1cylm503ett;
                } else if ($Vztt3qdrrikx === "auto") {
                    if ($V43vumv0zpd3 === "auto") {
                        $V43vumv0zpd3 = 0;
                    }
                    if ($Vuorspfzhdz0 === "auto") {
                        $Vuorspfzhdz0 = 0;
                    }
                    if ($V0opnfka0og1 === "auto") {
                        $V0opnfka0og1 = 0;
                    }
                    if ($Vqemi0kebtld === "auto") {
                        $Vqemi0kebtld = 0;
                    }

                    $Vztt3qdrrikx = $V1cylm503ett;
                } else if ($V0opnfka0og1 === "auto") {
                    if ($V43vumv0zpd3 === "auto") {
                        $V43vumv0zpd3 = 0;
                    }
                    if ($Vuorspfzhdz0 === "auto") {
                        $Vuorspfzhdz0 = 0;
                    }
                    if ($Vqemi0kebtld === "auto") {
                        $Vqemi0kebtld = 0;
                    }

                    $V0opnfka0og1 = $V1cylm503ett;
                } else if ($Vqemi0kebtld === "auto") {
                    if ($V43vumv0zpd3 === "auto") {
                        $V43vumv0zpd3 = 0;
                    }
                    if ($Vuorspfzhdz0 === "auto") {
                        $Vuorspfzhdz0 = 0;
                    }

                    $Vqemi0kebtld = $V1cylm503ett;
                }

            } else {
                
                if ($Vztt3qdrrikx === "auto") {
                    $Vztt3qdrrikx = $V1cylm503ett;
                } else if ($V43vumv0zpd3 === "auto" && $Vuorspfzhdz0 === "auto") {
                    $V43vumv0zpd3 = $Vuorspfzhdz0 = round($V1cylm503ett / 2);
                } else if ($V43vumv0zpd3 === "auto") {
                    $V43vumv0zpd3 = $V1cylm503ett;
                } else if ($Vuorspfzhdz0 === "auto") {
                    $Vuorspfzhdz0 = $V1cylm503ett;
                }
            }
        } else if ($V1cylm503ett < 0) {
            
            $Vuorspfzhdz0 = $V1cylm503ett;
        }

        return array(
            "width" => $Vztt3qdrrikx,
            "margin_left" => $V43vumv0zpd3,
            "margin_right" => $Vuorspfzhdz0,
            "left" => $V0opnfka0og1,
            "right" => $Vqemi0kebtld,
        );
    }

    
    protected function _calculate_restricted_width()
    {
        $Vnk2ly5jcvjf = $this->_frame;
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        $Vavdpq045wub = $Vnk2ly5jcvjf->get_containing_block();

        if ($Vdidzwb0w3vc->position === "fixed") {
            $Vavdpq045wub = $Vnk2ly5jcvjf->get_root()->get_containing_block();
        }

        
        

        if (!isset($Vavdpq045wub["w"])) {
            throw new Exception("Box property calculation requires containing block width");
        }

        
        if ($Vdidzwb0w3vc->width === "100%") {
            $Vztt3qdrrikx = "auto";
        } else {
            $Vztt3qdrrikx = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->width, $Vavdpq045wub["w"]);
        }

        $Vbotkckkzzya = $this->_calculate_width($Vztt3qdrrikx);
        $Vwz0hmf5ziti = $Vbotkckkzzya['margin_left'];
        $Vskh3m1tp4gb = $Vbotkckkzzya['margin_right'];
        $Vztt3qdrrikx =  $Vbotkckkzzya['width'];
        $V0opnfka0og1 =  $Vbotkckkzzya['left'];
        $Vqemi0kebtld =  $Vbotkckkzzya['right'];

        
        $Vlfmfjqpuuf2 = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->min_width, $Vavdpq045wub["w"]);
        $V0w3slmcpwy4 = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->max_width, $Vavdpq045wub["w"]);

        if ($V0w3slmcpwy4 !== "none" && $Vlfmfjqpuuf2 > $V0w3slmcpwy4) {
            list($V0w3slmcpwy4, $Vlfmfjqpuuf2) = array($Vlfmfjqpuuf2, $V0w3slmcpwy4);
        }

        if ($V0w3slmcpwy4 !== "none" && $Vztt3qdrrikx > $V0w3slmcpwy4) {
            extract($this->_calculate_width($V0w3slmcpwy4));
        }

        if ($Vztt3qdrrikx < $Vlfmfjqpuuf2) {
            $Vbotkckkzzya = $this->_calculate_width($Vlfmfjqpuuf2);
            $Vwz0hmf5ziti = $Vbotkckkzzya['margin_left'];
            $Vskh3m1tp4gb = $Vbotkckkzzya['margin_right'];
            $Vztt3qdrrikx =  $Vbotkckkzzya['width'];
            $V0opnfka0og1 =  $Vbotkckkzzya['left'];
            $Vqemi0kebtld =  $Vbotkckkzzya['right'];
        }

        return array($Vztt3qdrrikx, $Vwz0hmf5ziti, $Vskh3m1tp4gb, $V0opnfka0og1, $Vqemi0kebtld);
    }

    
    protected function _calculate_content_height()
    {
        $Vku40chc0ddp = 0;
        $Vnaca15glhj5 = $this->_frame->get_line_boxes();
        if (count($Vnaca15glhj5) > 0) {
            $Vw5fpakylwty = end($Vnaca15glhj5);
            $Vmuozp43vceo = $this->_frame->get_content_box();
            $Vku40chc0ddp = $Vw5fpakylwty->y + $Vw5fpakylwty->h - $Vmuozp43vceo["y"];
        }
        return $Vku40chc0ddp;
    }

    
    protected function _calculate_restricted_height()
    {
        $Vnk2ly5jcvjf = $this->_frame;
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        $Vr4rva54sovd = $this->_calculate_content_height();
        $Vavdpq045wub = $Vnk2ly5jcvjf->get_containing_block();

        $Vku40chc0ddp = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->height, $Vavdpq045wub["h"]);

        $Vnre3z2vvgov = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->top, $Vavdpq045wub["h"]);
        $Vs4qcjm3btdq = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->bottom, $Vavdpq045wub["h"]);

        $Vb45p50ln1ha = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_top, $Vavdpq045wub["h"]);
        $Vvl5hqffa30x = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_bottom, $Vavdpq045wub["h"]);

        if ($Vnk2ly5jcvjf->is_absolute()) {

            

            $Vo1o33y03ae2 = array($Vnre3z2vvgov !== "auto" ? $Vnre3z2vvgov : 0,
                $Vdidzwb0w3vc->margin_top !== "auto" ? $Vdidzwb0w3vc->margin_top : 0,
                $Vdidzwb0w3vc->padding_top,
                $Vdidzwb0w3vc->border_top_width,
                $Vku40chc0ddp !== "auto" ? $Vku40chc0ddp : 0,
                $Vdidzwb0w3vc->border_bottom_width,
                $Vdidzwb0w3vc->padding_bottom,
                $Vdidzwb0w3vc->margin_bottom !== "auto" ? $Vdidzwb0w3vc->margin_bottom : 0,
                $Vs4qcjm3btdq !== "auto" ? $Vs4qcjm3btdq : 0);

            $Vovlv0tclhce = (float)$Vdidzwb0w3vc->length_in_pt($Vo1o33y03ae2, $Vavdpq045wub["h"]);

            $V1cylm503ett = $Vavdpq045wub["h"] - $Vovlv0tclhce;

            if ($V1cylm503ett > 0) {
                if ($Vku40chc0ddp === "auto" && $Vnre3z2vvgov === "auto" && $Vs4qcjm3btdq === "auto") {
                    if ($Vb45p50ln1ha === "auto") {
                        $Vb45p50ln1ha = 0;
                    }
                    if ($Vvl5hqffa30x === "auto") {
                        $Vvl5hqffa30x = 0;
                    }

                    $Vku40chc0ddp = $V1cylm503ett;
                } else if ($Vku40chc0ddp === "auto" && $Vnre3z2vvgov === "auto") {
                    if ($Vb45p50ln1ha === "auto") {
                        $Vb45p50ln1ha = 0;
                    }
                    if ($Vvl5hqffa30x === "auto") {
                        $Vvl5hqffa30x = 0;
                    }

                    $Vku40chc0ddp = $Vr4rva54sovd;
                    $Vnre3z2vvgov = $V1cylm503ett - $Vr4rva54sovd;
                } else if ($Vku40chc0ddp === "auto" && $Vs4qcjm3btdq === "auto") {
                    if ($Vb45p50ln1ha === "auto") {
                        $Vb45p50ln1ha = 0;
                    }
                    if ($Vvl5hqffa30x === "auto") {
                        $Vvl5hqffa30x = 0;
                    }

                    $Vku40chc0ddp = $Vr4rva54sovd;
                    $Vs4qcjm3btdq = $V1cylm503ett - $Vr4rva54sovd;
                } else if ($Vnre3z2vvgov === "auto" && $Vs4qcjm3btdq === "auto") {
                    if ($Vb45p50ln1ha === "auto") {
                        $Vb45p50ln1ha = 0;
                    }
                    if ($Vvl5hqffa30x === "auto") {
                        $Vvl5hqffa30x = 0;
                    }

                    $Vs4qcjm3btdq = $V1cylm503ett;
                } else if ($Vnre3z2vvgov === "auto") {
                    if ($Vb45p50ln1ha === "auto") {
                        $Vb45p50ln1ha = 0;
                    }
                    if ($Vvl5hqffa30x === "auto") {
                        $Vvl5hqffa30x = 0;
                    }

                    $Vnre3z2vvgov = $V1cylm503ett;
                } else if ($Vku40chc0ddp === "auto") {
                    if ($Vb45p50ln1ha === "auto") {
                        $Vb45p50ln1ha = 0;
                    }
                    if ($Vvl5hqffa30x === "auto") {
                        $Vvl5hqffa30x = 0;
                    }

                    $Vku40chc0ddp = $V1cylm503ett;
                } else if ($Vs4qcjm3btdq === "auto") {
                    if ($Vb45p50ln1ha === "auto") {
                        $Vb45p50ln1ha = 0;
                    }
                    if ($Vvl5hqffa30x === "auto") {
                        $Vvl5hqffa30x = 0;
                    }

                    $Vs4qcjm3btdq = $V1cylm503ett;
                } else {
                    if ($Vdidzwb0w3vc->overflow === "visible") {
                        
                        if ($Vb45p50ln1ha === "auto") {
                            $Vb45p50ln1ha = 0;
                        }
                        if ($Vvl5hqffa30x === "auto") {
                            $Vvl5hqffa30x = 0;
                        }
                        if ($Vnre3z2vvgov === "auto") {
                            $Vnre3z2vvgov = 0;
                        }
                        if ($Vs4qcjm3btdq === "auto") {
                            $Vs4qcjm3btdq = 0;
                        }
                        if ($Vku40chc0ddp === "auto") {
                            $Vku40chc0ddp = $Vr4rva54sovd;
                        }
                    }

                    
                }
            }

        } else {
            
            if ($Vku40chc0ddp === "auto" && $Vr4rva54sovd > $Vku40chc0ddp ) {
                $Vku40chc0ddp = $Vr4rva54sovd;
            }

            
            

            
            if (!($Vdidzwb0w3vc->overflow === "visible" || ($Vdidzwb0w3vc->overflow === "hidden" && $Vku40chc0ddp === "auto"))) {
                $V1fbvsstmyzr = $Vdidzwb0w3vc->min_height;
                $Vvilppdj3er1 = $Vdidzwb0w3vc->max_height;

                if (isset($Vavdpq045wub["h"])) {
                    $V1fbvsstmyzr = $Vdidzwb0w3vc->length_in_pt($V1fbvsstmyzr, $Vavdpq045wub["h"]);
                    $Vvilppdj3er1 = $Vdidzwb0w3vc->length_in_pt($Vvilppdj3er1, $Vavdpq045wub["h"]);
                } else if (isset($Vavdpq045wub["w"])) {
                    if (mb_strpos($V1fbvsstmyzr, "%") !== false) {
                        $V1fbvsstmyzr = 0;
                    } else {
                        $V1fbvsstmyzr = $Vdidzwb0w3vc->length_in_pt($V1fbvsstmyzr, $Vavdpq045wub["w"]);
                    }

                    if (mb_strpos($Vvilppdj3er1, "%") !== false) {
                        $Vvilppdj3er1 = "none";
                    } else {
                        $Vvilppdj3er1 = $Vdidzwb0w3vc->length_in_pt($Vvilppdj3er1, $Vavdpq045wub["w"]);
                    }
                }

                if ($Vvilppdj3er1 !== "none" && $V1fbvsstmyzr > $Vvilppdj3er1) {
                    
                    list($Vvilppdj3er1, $V1fbvsstmyzr) = array($V1fbvsstmyzr, $Vvilppdj3er1);
                }

                if ($Vvilppdj3er1 !== "none" && $Vku40chc0ddp > $Vvilppdj3er1) {
                    $Vku40chc0ddp = $Vvilppdj3er1;
                }

                if ($Vku40chc0ddp < $V1fbvsstmyzr) {
                    $Vku40chc0ddp = $V1fbvsstmyzr;
                }
            }
        }

        return array($Vku40chc0ddp, $Vb45p50ln1ha, $Vvl5hqffa30x, $Vnre3z2vvgov, $Vs4qcjm3btdq);
    }

    
    protected function _text_align()
    {
        $Vdidzwb0w3vc = $this->_frame->get_style();
        $Vhoifq2kocyt = $this->_frame->get_containing_block("w");
        $Vztt3qdrrikx = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->width, $Vhoifq2kocyt);

        switch ($Vdidzwb0w3vc->text_align) {
            default:
            case "left":
                foreach ($this->_frame->get_line_boxes() as $V4m4rbmlpgn2) {
                    if (!$V4m4rbmlpgn2->left) {
                        continue;
                    }

                    foreach ($V4m4rbmlpgn2->get_frames() as $Vnk2ly5jcvjf) {
                        if ($Vnk2ly5jcvjf instanceof BlockFrameDecorator) {
                            continue;
                        }
                        $Vnk2ly5jcvjf->set_position($Vnk2ly5jcvjf->get_position("x") + $V4m4rbmlpgn2->left);
                    }
                }
                return;

            case "right":
                foreach ($this->_frame->get_line_boxes() as $V4m4rbmlpgn2) {
                    
                    $Vcprkgnutplg = $Vztt3qdrrikx - $V4m4rbmlpgn2->w - $V4m4rbmlpgn2->right;

                    foreach ($V4m4rbmlpgn2->get_frames() as $Vnk2ly5jcvjf) {
                        
                        if ($Vnk2ly5jcvjf instanceof BlockFrameDecorator) {
                            continue;
                        }

                        $Vnk2ly5jcvjf->set_position($Vnk2ly5jcvjf->get_position("x") + $Vcprkgnutplg);
                    }
                }
                break;

            case "justify":
                
                $Vnaca15glhj5 = $this->_frame->get_line_boxes(); 
                $Vw5fpakylwty = array_pop($Vnaca15glhj5);

                foreach ($Vnaca15glhj5 as $V3xsptcgzss2 => $V4m4rbmlpgn2) {
                    if ($V4m4rbmlpgn2->br) {
                        unset($Vnaca15glhj5[$V3xsptcgzss2]);
                    }
                }

                
                $Vbfdfyeubtzn = $this->get_dompdf()->getFontMetrics()->getTextWidth(" ", $Vdidzwb0w3vc->font_family, $Vdidzwb0w3vc->font_size);

                foreach ($Vnaca15glhj5 as $V4m4rbmlpgn2) {
                    if ($V4m4rbmlpgn2->left) {
                        foreach ($V4m4rbmlpgn2->get_frames() as $Vnk2ly5jcvjf) {
                            if (!$Vnk2ly5jcvjf instanceof TextFrameDecorator) {
                                continue;
                            }

                            $Vnk2ly5jcvjf->set_position($Vnk2ly5jcvjf->get_position("x") + $V4m4rbmlpgn2->left);
                        }
                    }

                    
                    if ($V4m4rbmlpgn2->wc > 1) {
                        $Vuwwdaccmizk = ($Vztt3qdrrikx - ($V4m4rbmlpgn2->left + $V4m4rbmlpgn2->w + $V4m4rbmlpgn2->right) + $Vbfdfyeubtzn) / ($V4m4rbmlpgn2->wc - 1);
                    } else {
                        $Vuwwdaccmizk = 0;
                    }

                    $Vcprkgnutplg = 0;
                    foreach ($V4m4rbmlpgn2->get_frames() as $Vnk2ly5jcvjf) {
                        if (!$Vnk2ly5jcvjf instanceof TextFrameDecorator) {
                            continue;
                        }

                        $Vnlbbd31sxbf = $Vnk2ly5jcvjf->get_text();
                        $V4hs1zg3x1cl = mb_substr_count($Vnlbbd31sxbf, " ");

                        $Vaohjovek4hi = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->letter_spacing);
                        $Vcu1bujgobcf = $Vuwwdaccmizk + $Vaohjovek4hi;

                        $Vnk2ly5jcvjf->set_position($Vnk2ly5jcvjf->get_position("x") + $Vcprkgnutplg);
                        $Vnk2ly5jcvjf->set_text_spacing($Vcu1bujgobcf);

                        $Vcprkgnutplg += $V4hs1zg3x1cl * $Vcu1bujgobcf;
                    }

                    
                    $V4m4rbmlpgn2->w = $Vztt3qdrrikx;
                }

                
                if ($Vw5fpakylwty->left) {
                    foreach ($Vw5fpakylwty->get_frames() as $Vnk2ly5jcvjf) {
                        if ($Vnk2ly5jcvjf instanceof BlockFrameDecorator) {
                            continue;
                        }
                        $Vnk2ly5jcvjf->set_position($Vnk2ly5jcvjf->get_position("x") + $Vw5fpakylwty->left);
                    }
                }
                break;

            case "center":
            case "centre":
                foreach ($this->_frame->get_line_boxes() as $V4m4rbmlpgn2) {
                    
                    $Vcprkgnutplg = ($Vztt3qdrrikx + $V4m4rbmlpgn2->left - $V4m4rbmlpgn2->w - $V4m4rbmlpgn2->right) / 2;

                    foreach ($V4m4rbmlpgn2->get_frames() as $Vnk2ly5jcvjf) {
                        
                        if ($Vnk2ly5jcvjf instanceof BlockFrameDecorator) {
                            continue;
                        }

                        $Vnk2ly5jcvjf->set_position($Vnk2ly5jcvjf->get_position("x") + $Vcprkgnutplg);
                    }
                }
                break;
        }
    }

    
    function vertical_align()
    {
        $Vvzurwoc24em = null;

        foreach ($this->_frame->get_line_boxes() as $V4m4rbmlpgn2) {

            $Vku40chc0ddp = $V4m4rbmlpgn2->h;

            foreach ($V4m4rbmlpgn2->get_frames() as $Vnk2ly5jcvjf) {
                $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
                $V3xsptcgzss2sInlineBlock = (
                    '-dompdf-image' === $Vdidzwb0w3vc->display
                    || 'inline-block' === $Vdidzwb0w3vc->display
                    || 'inline-table' === $Vdidzwb0w3vc->display
                );
                if (!$V3xsptcgzss2sInlineBlock && $Vdidzwb0w3vc->display !== "inline") {
                    continue;
                }

                if (!isset($Vvzurwoc24em)) {
                    $Vvzurwoc24em = $Vnk2ly5jcvjf->get_root()->get_dompdf()->get_canvas();
                }

                $Vjitdbblfflh = $Vvzurwoc24em->get_font_baseline($Vdidzwb0w3vc->font_family, $Vdidzwb0w3vc->font_size);
                $Vfkov23vd2ia = 0;

                
                if($V3xsptcgzss2sInlineBlock) {
                    $V4m4rbmlpgn2Frames = $V4m4rbmlpgn2->get_frames();
                    if (count($V4m4rbmlpgn2Frames) == 1) {
                        continue;
                    }
                    $Vnk2ly5jcvjfBox = $Vnk2ly5jcvjf->get_frame()->get_border_box();
                    $V3xsptcgzss2mageHeightDiff = $Vku40chc0ddp * 0.8 - (float)$Vnk2ly5jcvjfBox['h'];

                    $Vtzrehmtbgu2 = $Vnk2ly5jcvjf->get_style()->vertical_align;
                    if (in_array($Vtzrehmtbgu2, Style::$Vgkblykdxhiz) === true) {
                        switch ($Vtzrehmtbgu2) {
                            case "middle":
                                $Vfkov23vd2ia = $V3xsptcgzss2mageHeightDiff / 2;
                                break;

                            case "sub":
                                $Vfkov23vd2ia = 0.3 * $Vku40chc0ddp + $V3xsptcgzss2mageHeightDiff;
                                break;

                            case "super":
                                $Vfkov23vd2ia = -0.2 * $Vku40chc0ddp + $V3xsptcgzss2mageHeightDiff;
                                break;

                            case "text-top": 
                                $Vfkov23vd2ia = $Vku40chc0ddp - (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->get_line_height(), $Vdidzwb0w3vc->font_size);
                                break;

                            case "top":
                                break;

                            case "text-bottom": 
                            case "bottom":
                                $Vfkov23vd2ia = 0.3 * $Vku40chc0ddp + $V3xsptcgzss2mageHeightDiff;
                                break;

                            case "baseline":
                            default:
                                $Vfkov23vd2ia = $V3xsptcgzss2mageHeightDiff;
                                break;
                        }
                    } else {
                        $Vfkov23vd2ia = $Vjitdbblfflh - (float)$Vdidzwb0w3vc->length_in_pt($Vtzrehmtbgu2, $Vdidzwb0w3vc->font_size) - (float)$Vnk2ly5jcvjfBox['h'];
                    }
                } else {
                    $Vycghhqowrim = $Vnk2ly5jcvjf->get_parent();
                    if ($Vycghhqowrim instanceof TableCellFrameDecorator) {
                        $Vtzrehmtbgu2 = "baseline";
                    } else {
                        $Vtzrehmtbgu2 = $Vycghhqowrim->get_style()->vertical_align;
                    }
                    if (in_array($Vtzrehmtbgu2, Style::$Vgkblykdxhiz) === true) {
                        switch ($Vtzrehmtbgu2) {
                            case "middle":
                                $Vfkov23vd2ia = ($Vku40chc0ddp * 0.8 - $Vjitdbblfflh) / 2;
                                break;

                            case "sub":
                                $Vfkov23vd2ia = $Vku40chc0ddp * 0.8 - $Vjitdbblfflh * 0.5;
                                break;

                            case "super":
                                $Vfkov23vd2ia = $Vku40chc0ddp * 0.8 - $Vjitdbblfflh * 1.4;
                                break;

                            case "text-top":
                            case "top": 
                                break;

                            case "text-bottom":
                            case "bottom":
                                $Vfkov23vd2ia = $Vku40chc0ddp * 0.8 - $Vjitdbblfflh;
                                break;

                            case "baseline":
                            default:
                                $Vfkov23vd2ia = $Vku40chc0ddp * 0.8 - $Vjitdbblfflh;
                                break;
                        }
                    } else {
                        $Vfkov23vd2ia = $Vku40chc0ddp * 0.8 - $Vjitdbblfflh - (float)$Vdidzwb0w3vc->length_in_pt($Vtzrehmtbgu2, $Vdidzwb0w3vc->font_size);
                    }
                }

                if ($Vfkov23vd2ia !== 0) {
                    $Vnk2ly5jcvjf->move(0, $Vfkov23vd2ia);
                }
            }
        }
    }

    
    function process_clear(Frame $Vtcc233inn5m)
    {
        $Vtcc233inn5m_style = $Vtcc233inn5m->get_style();
        $Vzlqynjxsspd = $this->_frame->get_root();

        
        if ($Vtcc233inn5m_style->clear !== "none") {
            
            if ($Vtcc233inn5m->get_prev_sibling() !== null) {
                $this->_frame->add_line();
            }
            if ($Vtcc233inn5m_style->float !== "none" && $Vtcc233inn5m->get_next_sibling()) {
                $this->_frame->set_current_line_number($this->_frame->get_current_line_number() - 1);
            }

            $Vqt1ny5yu5fe = $Vzlqynjxsspd->get_lowest_float_offset($Vtcc233inn5m);

            
            if ($Vqt1ny5yu5fe) {
                if ($Vtcc233inn5m->is_in_flow()) {
                    $V4m4rbmlpgn2_box = $this->_frame->get_current_line_box();
                    $V4m4rbmlpgn2_box->y = $Vqt1ny5yu5fe + $Vtcc233inn5m->get_margin_height();
                    $V4m4rbmlpgn2_box->left = 0;
                    $V4m4rbmlpgn2_box->right = 0;
                }

                $Vtcc233inn5m->move(0, $Vqt1ny5yu5fe - $Vtcc233inn5m->get_position("y"));
            }
        }
    }

    
    function process_float(Frame $Vtcc233inn5m, $Vavdpq045wub_x, $Vavdpq045wub_w)
    {
        $Vtcc233inn5m_style = $Vtcc233inn5m->get_style();
        $Vzlqynjxsspd = $this->_frame->get_root();

        
        if ($Vtcc233inn5m_style->float !== "none") {
            $Vzlqynjxsspd->add_floating_frame($Vtcc233inn5m);

            
            $V3v4ujy1pb5h = $Vtcc233inn5m->get_next_sibling();
            if ($V3v4ujy1pb5h && $V3v4ujy1pb5h instanceof TextFrameDecorator) {
                $V3v4ujy1pb5h->set_text(ltrim($V3v4ujy1pb5h->get_text()));
            }

            $V4m4rbmlpgn2_box = $this->_frame->get_current_line_box();
            list($Vp1hvpko25yn, $Vhx4cvgd22jh) = $Vtcc233inn5m->get_position();

            $Vg05lakdhba2 = $Vavdpq045wub_x;
            $V34vpbbnbhes = $Vhx4cvgd22jh;
            $Vw20c4dsugmb = $Vtcc233inn5m->get_margin_width();

            if ($Vtcc233inn5m_style->clear === "none") {
                switch ($Vtcc233inn5m_style->float) {
                    case "left":
                        $Vg05lakdhba2 += $V4m4rbmlpgn2_box->left;
                        break;
                    case "right":
                        $Vg05lakdhba2 += ($Vavdpq045wub_w - $V4m4rbmlpgn2_box->right - $Vw20c4dsugmb);
                        break;
                }
            } else {
                if ($Vtcc233inn5m_style->float === "right") {
                    $Vg05lakdhba2 += ($Vavdpq045wub_w - $Vw20c4dsugmb);
                }
            }

            if ($Vavdpq045wub_w < $Vg05lakdhba2 + $Vw20c4dsugmb - $Vp1hvpko25yn) {
                
            }

            $V4m4rbmlpgn2_box->get_float_offsets();

            if ($Vtcc233inn5m->_float_next_line) {
                $V34vpbbnbhes += $V4m4rbmlpgn2_box->h;
            }

            $Vtcc233inn5m->set_position($Vg05lakdhba2, $V34vpbbnbhes);
            $Vtcc233inn5m->move($Vg05lakdhba2 - $Vp1hvpko25yn, $V34vpbbnbhes - $Vhx4cvgd22jh, true);
        }
    }

    
    function reflow(BlockFrameDecorator $Vwoflziz3q5d = null)
    {

        
        $Vc0dirmmlvo4 = $this->_frame->get_root();
        $Vc0dirmmlvo4->check_forced_page_break($this->_frame);

        
        if ($Vc0dirmmlvo4->is_full()) {
            return;
        }

        
        $this->_set_content();

        
        $this->_collapse_margins();

        $Vdidzwb0w3vc = $this->_frame->get_style();
        $Vavdpq045wub = $this->_frame->get_containing_block();

        if ($Vdidzwb0w3vc->position === "fixed") {
            $Vavdpq045wub = $this->_frame->get_root()->get_containing_block();
        }

        
        
        list($Vhoifq2kocyt, $V0opnfka0og1_margin, $Vqemi0kebtld_margin, $V0opnfka0og1, $Vqemi0kebtld) = $this->_calculate_restricted_width();

        
        $Vdidzwb0w3vc->width = $Vhoifq2kocyt;
        $Vdidzwb0w3vc->margin_left = $V0opnfka0og1_margin;
        $Vdidzwb0w3vc->margin_right = $Vqemi0kebtld_margin;
        $Vdidzwb0w3vc->left = $V0opnfka0og1;
        $Vdidzwb0w3vc->right = $Vqemi0kebtld;

        
        $this->_frame->position();
        list($Vs4gloy23a1d, $Vopgub02o3q2) = $this->_frame->get_position();

        
        $V3xsptcgzss2ndent = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->text_indent, $Vavdpq045wub["w"]);
        $this->_frame->increase_line_width($V3xsptcgzss2ndent);

        
        $Vnre3z2vvgov = (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->margin_top,
            $Vdidzwb0w3vc->padding_top,
            $Vdidzwb0w3vc->border_top_width), $Vavdpq045wub["h"]);

        $Vs4qcjm3btdq = (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->border_bottom_width,
            $Vdidzwb0w3vc->margin_bottom,
            $Vdidzwb0w3vc->padding_bottom), $Vavdpq045wub["h"]);

        $Vavdpq045wub_x = $Vs4gloy23a1d + (float)$V0opnfka0og1_margin + (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->border_left_width,
                $Vdidzwb0w3vc->padding_left), $Vavdpq045wub["w"]);

        $Vavdpq045wub_y = $Vopgub02o3q2 + $Vnre3z2vvgov;

        $Vavdpq045wub_h = ($Vavdpq045wub["h"] + $Vavdpq045wub["y"]) - $Vs4qcjm3btdq - $Vavdpq045wub_y;

        
        $V4m4rbmlpgn2_box = $this->_frame->get_current_line_box();
        $V4m4rbmlpgn2_box->y = $Vavdpq045wub_y;
        $V4m4rbmlpgn2_box->get_float_offsets();

        
        foreach ($this->_frame->get_children() as $Vtcc233inn5m) {

            
            if ($Vc0dirmmlvo4->is_full()) {
                break;
            }

            $Vtcc233inn5m->set_containing_block($Vavdpq045wub_x, $Vavdpq045wub_y, $Vhoifq2kocyt, $Vavdpq045wub_h);

            $this->process_clear($Vtcc233inn5m);

            $Vtcc233inn5m->reflow($this->_frame);

            
            if ($Vc0dirmmlvo4->check_page_break($Vtcc233inn5m)) {
                break;
            }

            $this->process_float($Vtcc233inn5m, $Vavdpq045wub_x, $Vhoifq2kocyt);
        }

        
        list($Vku40chc0ddp, $Vb45p50ln1ha, $Vvl5hqffa30x, $Vnre3z2vvgov, $Vs4qcjm3btdq) = $this->_calculate_restricted_height();
        $Vdidzwb0w3vc->height = $Vku40chc0ddp;
        $Vdidzwb0w3vc->margin_top = $Vb45p50ln1ha;
        $Vdidzwb0w3vc->margin_bottom = $Vvl5hqffa30x;
        $Vdidzwb0w3vc->top = $Vnre3z2vvgov;
        $Vdidzwb0w3vc->bottom = $Vs4qcjm3btdq;

        $Vfdmsptgjprm = $this->_frame->get_original_style();

        $Vn4guw2jum44 = ($Vdidzwb0w3vc->position === "absolute" && ($Vdidzwb0w3vc->right !== "auto" || $Vdidzwb0w3vc->bottom !== "auto"));

        
        if ($Vn4guw2jum44) {
            if ($Vfdmsptgjprm->width === "auto" && ($Vfdmsptgjprm->left === "auto" || $Vfdmsptgjprm->right === "auto")) {
                $Vztt3qdrrikx = 0;
                foreach ($this->_frame->get_line_boxes() as $V4m4rbmlpgn2) {
                    $Vztt3qdrrikx = max($V4m4rbmlpgn2->w, $Vztt3qdrrikx);
                }
                $Vdidzwb0w3vc->width = $Vztt3qdrrikx;
            }

            $Vdidzwb0w3vc->left = $Vfdmsptgjprm->left;
            $Vdidzwb0w3vc->right = $Vfdmsptgjprm->right;
        }

        
        if (($Vdidzwb0w3vc->display === "inline-block" || $Vdidzwb0w3vc->float !== 'none') && $Vfdmsptgjprm->width === 'auto') {
            $Vztt3qdrrikx = 0;

            foreach ($this->_frame->get_line_boxes() as $V4m4rbmlpgn2) {
                $V4m4rbmlpgn2->recalculate_width();

                $Vztt3qdrrikx = max($V4m4rbmlpgn2->w, $Vztt3qdrrikx);
            }

            if ($Vztt3qdrrikx === 0) {
                foreach ($this->_frame->get_children() as $Vtcc233inn5m) {
                    $Vztt3qdrrikx += $Vtcc233inn5m->calculate_auto_width();
                }
            }

            $Vdidzwb0w3vc->width = $Vztt3qdrrikx;
        }

        $this->_text_align();
        $this->vertical_align();

        
        if ($Vn4guw2jum44) {
            list($Vs4gloy23a1d, $Vopgub02o3q2) = $this->_frame->get_position();
            $this->_frame->position();
            list($Vnzsw0llzsnu, $Vnd1ee1yzdrw) = $this->_frame->get_position();
            $this->_frame->move($Vnzsw0llzsnu - $Vs4gloy23a1d, $Vnd1ee1yzdrw - $Vopgub02o3q2, true);
        }

        if ($Vwoflziz3q5d && $this->_frame->is_in_flow()) {
            $Vwoflziz3q5d->add_frame_to_line($this->_frame);

            
            if ($Vdidzwb0w3vc->display === "block") {
                $Vwoflziz3q5d->add_line();
            }
        }
    }

    
    public function calculate_auto_width()
    {
        $Vztt3qdrrikx = 0;

        foreach ($this->_frame->get_line_boxes() as $V4m4rbmlpgn2) {
            $V4m4rbmlpgn2_width = 0;

            foreach ($V4m4rbmlpgn2->get_frames() as $Vnk2ly5jcvjf) {
                if ($Vnk2ly5jcvjf->get_original_style()->width == 'auto') {
                    $V4m4rbmlpgn2_width += $Vnk2ly5jcvjf->calculate_auto_width();
                } else {
                    $V4m4rbmlpgn2_width += $Vnk2ly5jcvjf->get_margin_width();
                }
            }

            $Vztt3qdrrikx = max($V4m4rbmlpgn2_width, $Vztt3qdrrikx);
        }

        $this->_frame->get_style()->width = $Vztt3qdrrikx;

        return $this->_frame->get_margin_width();
    }
}
