<?php

namespace Dompdf\FrameReflower;

use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
use Dompdf\FrameDecorator\Table as TableFrameDecorator;


class Table extends AbstractFrameReflower
{
    
    protected $Vtabfexfghu0;

    
    protected $Vpmzcufbor1g;

    
    function __construct(TableFrameDecorator $Vnk2ly5jcvjf)
    {
        $this->_state = null;
        parent::__construct($Vnk2ly5jcvjf);
    }

    
    function reset()
    {
        $this->_state = null;
        $this->_min_max_cache = null;
    }

    protected function _assign_widths()
    {
        $Vdidzwb0w3vc = $this->_frame->get_style();

        
        
        $Vlfmfjqpuuf2 = $this->_state["min_width"];
        $V0w3slmcpwy4 = $this->_state["max_width"];
        $Vkwzi55mnku4 = $this->_state["percent_used"];
        $Vlagox0ggtdp = $this->_state["absolute_used"];
        $Vcttcpztizrd = $this->_state["auto_min"];

        $Vgi0zrckrgbl =& $this->_state["absolute"];
        $Vkqkxt2mptjx =& $this->_state["percent"];
        $V1hilopgdvnr =& $this->_state["auto"];

        
        $Vavdpq045wub = $this->_frame->get_containing_block();
        $Vxw4j5wpetex =& $this->_frame->get_cellmap()->get_columns();

        $Vztt3qdrrikx = $Vdidzwb0w3vc->width;

        
        $V0opnfka0og1 = $Vdidzwb0w3vc->margin_left;
        $Vqemi0kebtld = $Vdidzwb0w3vc->margin_right;

        $Vwzcg2hzcqpl = ($V0opnfka0og1 === "auto" && $Vqemi0kebtld === "auto");

        $V0opnfka0og1 = (float)($V0opnfka0og1 === "auto" ? 0 : $Vdidzwb0w3vc->length_in_pt($V0opnfka0og1, $Vavdpq045wub["w"]));
        $Vqemi0kebtld = (float)($Vqemi0kebtld === "auto" ? 0 : $Vdidzwb0w3vc->length_in_pt($Vqemi0kebtld, $Vavdpq045wub["w"]));

        $Vdim3b3fegnk = $V0opnfka0og1 + $Vqemi0kebtld;

        if (!$Vwzcg2hzcqpl) {
            $Vdim3b3fegnk += (float)$Vdidzwb0w3vc->length_in_pt(array(
                    $Vdidzwb0w3vc->padding_left,
                    $Vdidzwb0w3vc->border_left_width,
                    $Vdidzwb0w3vc->border_right_width,
                    $Vdidzwb0w3vc->padding_right),
                $Vavdpq045wub["w"]);
        }

        $Vegoyocfuqkk = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->min_width, $Vavdpq045wub["w"] - $Vdim3b3fegnk);

        
        $Vlfmfjqpuuf2 -= $Vdim3b3fegnk;
        $V0w3slmcpwy4 -= $Vdim3b3fegnk;

        if ($Vztt3qdrrikx !== "auto") {
            $Vjpbiaj33zf3 = (float)$Vdidzwb0w3vc->length_in_pt($Vztt3qdrrikx, $Vavdpq045wub["w"]) - $Vdim3b3fegnk;

            if ($Vjpbiaj33zf3 < $Vegoyocfuqkk) {
                $Vjpbiaj33zf3 = $Vegoyocfuqkk;
            }

            if ($Vjpbiaj33zf3 > $Vlfmfjqpuuf2) {
                $Vztt3qdrrikx = $Vjpbiaj33zf3;
            } else {
                $Vztt3qdrrikx = $Vlfmfjqpuuf2;
            }

        } else {
            if ($V0w3slmcpwy4 + $Vdim3b3fegnk < $Vavdpq045wub["w"]) {
                $Vztt3qdrrikx = $V0w3slmcpwy4;
            } else if ($Vavdpq045wub["w"] - $Vdim3b3fegnk > $Vlfmfjqpuuf2) {
                $Vztt3qdrrikx = $Vavdpq045wub["w"] - $Vdim3b3fegnk;
            } else {
                $Vztt3qdrrikx = $Vlfmfjqpuuf2;
            }

            if ($Vztt3qdrrikx < $Vegoyocfuqkk) {
                $Vztt3qdrrikx = $Vegoyocfuqkk;
            }

        }

        
        $Vdidzwb0w3vc->width = $Vztt3qdrrikx;

        $Vdgy2mwoncbb = $this->_frame->get_cellmap();

        if ($Vdgy2mwoncbb->is_columns_locked()) {
            return;
        }

        
        if ($Vztt3qdrrikx == $V0w3slmcpwy4) {
            foreach (array_keys($Vxw4j5wpetex) as $V3xsptcgzss2) {
                $Vdgy2mwoncbb->set_column_width($V3xsptcgzss2, $Vxw4j5wpetex[$V3xsptcgzss2]["max-width"]);
            }

            return;
        }

        
        if ($Vztt3qdrrikx > $Vlfmfjqpuuf2) {
            
            
            
            
            
            
            
            
            
            
            
            
            
            
            

            $V3xsptcgzss2ncrement = 0;

            
            if ($Vlagox0ggtdp == 0 && $Vkwzi55mnku4 == 0) {
                $V3xsptcgzss2ncrement = $Vztt3qdrrikx - $Vlfmfjqpuuf2;

                foreach (array_keys($Vxw4j5wpetex) as $V3xsptcgzss2) {
                    $Vdgy2mwoncbb->set_column_width($V3xsptcgzss2, $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"] + $V3xsptcgzss2ncrement * ($Vxw4j5wpetex[$V3xsptcgzss2]["max-width"] / $V0w3slmcpwy4));
                }
                return;
            }

            
            if ($Vlagox0ggtdp > 0 && $Vkwzi55mnku4 == 0) {
                if (count($V1hilopgdvnr) > 0) {
                    $V3xsptcgzss2ncrement = ($Vztt3qdrrikx - $Vcttcpztizrd - $Vlagox0ggtdp) / count($V1hilopgdvnr);
                }

                
                foreach (array_keys($Vxw4j5wpetex) as $V3xsptcgzss2) {
                    if ($Vxw4j5wpetex[$V3xsptcgzss2]["absolute"] > 0 && count($V1hilopgdvnr)) {
                        $Vdgy2mwoncbb->set_column_width($V3xsptcgzss2, $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"]);
                    } else if (count($V1hilopgdvnr)) {
                        $Vdgy2mwoncbb->set_column_width($V3xsptcgzss2, $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"] + $V3xsptcgzss2ncrement);
                    } else {
                        
                        $V3xsptcgzss2ncrement = ($Vztt3qdrrikx - $Vlagox0ggtdp) * $Vxw4j5wpetex[$V3xsptcgzss2]["absolute"] / $Vlagox0ggtdp;

                        $Vdgy2mwoncbb->set_column_width($V3xsptcgzss2, $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"] + $V3xsptcgzss2ncrement);
                    }

                }
                return;
            }

            
            if ($Vlagox0ggtdp == 0 && $Vkwzi55mnku4 > 0) {
                $Vrjwl1g2wao4 = null;
                $V3n5xcpo40bt = null;

                
                
                if ($Vkwzi55mnku4 > 100 || count($V1hilopgdvnr) == 0) {
                    $Vrjwl1g2wao4 = 100 / $Vkwzi55mnku4;
                } else {
                    $Vrjwl1g2wao4 = 1;
                }

                
                $V4mkv4r1vtkn = $Vcttcpztizrd;

                foreach ($Vkqkxt2mptjx as $V3xsptcgzss2) {
                    $Vxw4j5wpetex[$V3xsptcgzss2]["percent"] *= $Vrjwl1g2wao4;

                    $Vur50wt3n1nz = $Vztt3qdrrikx - $V4mkv4r1vtkn;

                    $Vhoifq2kocyt = min($Vxw4j5wpetex[$V3xsptcgzss2]["percent"] * $Vztt3qdrrikx / 100, $Vur50wt3n1nz);

                    if ($Vhoifq2kocyt < $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"]) {
                        $Vhoifq2kocyt = $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"];
                    }

                    $Vdgy2mwoncbb->set_column_width($V3xsptcgzss2, $Vhoifq2kocyt);
                    $V4mkv4r1vtkn += $Vhoifq2kocyt;

                }

                
                
                if (count($V1hilopgdvnr) > 0) {
                    $V3xsptcgzss2ncrement = ($Vztt3qdrrikx - $V4mkv4r1vtkn) / count($V1hilopgdvnr);

                    foreach ($V1hilopgdvnr as $V3xsptcgzss2) {
                        $Vdgy2mwoncbb->set_column_width($V3xsptcgzss2, $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"] + $V3xsptcgzss2ncrement);
                    }

                }
                return;
            }

            

            
            if ($Vlagox0ggtdp > 0 && $Vkwzi55mnku4 > 0) {
                $V4mkv4r1vtkn = $Vcttcpztizrd;

                foreach ($Vgi0zrckrgbl as $V3xsptcgzss2) {
                    $Vdgy2mwoncbb->set_column_width($V3xsptcgzss2, $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"]);
                    $V4mkv4r1vtkn += $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"];
                }

                
                
                if ($Vkwzi55mnku4 > 100 || count($V1hilopgdvnr) == 0) {
                    $Vrjwl1g2wao4 = 100 / $Vkwzi55mnku4;
                } else {
                    $Vrjwl1g2wao4 = 1;
                }

                $V3n5xcpo40bt_width = $Vztt3qdrrikx - $V4mkv4r1vtkn;

                foreach ($Vkqkxt2mptjx as $V3xsptcgzss2) {
                    $Vur50wt3n1nz = $V3n5xcpo40bt_width - $V4mkv4r1vtkn;

                    $Vxw4j5wpetex[$V3xsptcgzss2]["percent"] *= $Vrjwl1g2wao4;
                    $Vhoifq2kocyt = min($Vxw4j5wpetex[$V3xsptcgzss2]["percent"] * $V3n5xcpo40bt_width / 100, $Vur50wt3n1nz);

                    if ($Vhoifq2kocyt < $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"]) {
                        $Vhoifq2kocyt = $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"];
                    }

                    $Vxw4j5wpetex[$V3xsptcgzss2]["used-width"] = $Vhoifq2kocyt;
                    $V4mkv4r1vtkn += $Vhoifq2kocyt;
                }

                if (count($V1hilopgdvnr) > 0) {
                    $V3xsptcgzss2ncrement = ($Vztt3qdrrikx - $V4mkv4r1vtkn) / count($V1hilopgdvnr);

                    foreach ($V1hilopgdvnr as $V3xsptcgzss2) {
                        $Vdgy2mwoncbb->set_column_width($V3xsptcgzss2, $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"] + $V3xsptcgzss2ncrement);
                    }
                }

                return;
            }
        } else { 
            
            foreach (array_keys($Vxw4j5wpetex) as $V3xsptcgzss2) {
                $Vdgy2mwoncbb->set_column_width($V3xsptcgzss2, $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"]);
            }
        }
    }

    
    protected function _calculate_height()
    {
        $Vdidzwb0w3vc = $this->_frame->get_style();
        $Vku40chc0ddp = $Vdidzwb0w3vc->height;

        $Vdgy2mwoncbb = $this->_frame->get_cellmap();
        $Vdgy2mwoncbb->assign_frame_heights();
        $Vk0nagnzvmns = $Vdgy2mwoncbb->get_rows();

        
        $Vr4rva54sovd = 0;
        foreach ($Vk0nagnzvmns as $Vkabkv5ip0kg) {
            $Vr4rva54sovd += $Vkabkv5ip0kg["height"];
        }

        $Vavdpq045wub = $this->_frame->get_containing_block();

        if (!($Vdidzwb0w3vc->overflow === "visible" ||
            ($Vdidzwb0w3vc->overflow === "hidden" && $Vku40chc0ddp === "auto"))
        ) {
            

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
        } else {
            
            if ($Vku40chc0ddp !== "auto") {
                $Vku40chc0ddp = $Vdidzwb0w3vc->length_in_pt($Vku40chc0ddp, $Vavdpq045wub["h"]);

                if ($Vku40chc0ddp <= $Vr4rva54sovd) {
                    $Vku40chc0ddp = $Vr4rva54sovd;
                } else {
                    $Vdgy2mwoncbb->set_frame_heights($Vku40chc0ddp, $Vr4rva54sovd);
                }
            } else {
                $Vku40chc0ddp = $Vr4rva54sovd;
            }
        }

        return $Vku40chc0ddp;
    }

    
    function reflow(BlockFrameDecorator $Vwoflziz3q5d = null)
    {
        
        $Vnk2ly5jcvjf = $this->_frame;

        
        $Vc0dirmmlvo4 = $Vnk2ly5jcvjf->get_root();
        $Vc0dirmmlvo4->check_forced_page_break($Vnk2ly5jcvjf);

        
        if ($Vc0dirmmlvo4->is_full()) {
            return;
        }

        
        
        
        
        $Vc0dirmmlvo4->table_reflow_start();

        
        $this->_collapse_margins();

        $Vnk2ly5jcvjf->position();

        
        

        if (is_null($this->_state)) {
            $this->get_min_max_width();
        }

        $Vavdpq045wub = $Vnk2ly5jcvjf->get_containing_block();
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();

        
        
        
        if ($Vdidzwb0w3vc->border_collapse === "separate") {
            list($Vjlmjalejjxa, $Vpszt12nvbau) = $Vdidzwb0w3vc->border_spacing;

            $Vpszt12nvbau = (float)$Vdidzwb0w3vc->length_in_pt($Vpszt12nvbau) / 2;
            $Vjlmjalejjxa = (float)$Vdidzwb0w3vc->length_in_pt($Vjlmjalejjxa) / 2;

            $Vdidzwb0w3vc->padding_left = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->padding_left, $Vavdpq045wub["w"]) + $Vjlmjalejjxa;
            $Vdidzwb0w3vc->padding_right = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->padding_right, $Vavdpq045wub["w"]) + $Vjlmjalejjxa;
            $Vdidzwb0w3vc->padding_top = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->padding_top, $Vavdpq045wub["h"]) + $Vpszt12nvbau;
            $Vdidzwb0w3vc->padding_bottom = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->padding_bottom, $Vavdpq045wub["h"]) + $Vpszt12nvbau;
        }

        $this->_assign_widths();

        
        $Vztt3qdrrikx = $Vdidzwb0w3vc->width;
        $V0opnfka0og1 = $Vdidzwb0w3vc->margin_left;
        $Vqemi0kebtld = $Vdidzwb0w3vc->margin_right;

        $V1cylm503ett = $Vavdpq045wub["w"] - $Vztt3qdrrikx;

        if ($V0opnfka0og1 === "auto" && $Vqemi0kebtld === "auto") {
            if ($V1cylm503ett < 0) {
                $V0opnfka0og1 = 0;
                $Vqemi0kebtld = $V1cylm503ett;
            } else {
                $V0opnfka0og1 = $Vqemi0kebtld = $V1cylm503ett / 2;
            }

            $Vdidzwb0w3vc->margin_left = sprintf("%Fpt", $V0opnfka0og1);
            $Vdidzwb0w3vc->margin_right = sprintf("%Fpt", $Vqemi0kebtld);;
        } else {
            if ($V0opnfka0og1 === "auto") {
                $V0opnfka0og1 = (float)$Vdidzwb0w3vc->length_in_pt($Vavdpq045wub["w"] - $Vqemi0kebtld - $Vztt3qdrrikx, $Vavdpq045wub["w"]);
            }
            if ($Vqemi0kebtld === "auto") {
                $V0opnfka0og1 = (float)$Vdidzwb0w3vc->length_in_pt($V0opnfka0og1, $Vavdpq045wub["w"]);
            }
        }

        list($Vs4gloy23a1d, $Vopgub02o3q2) = $Vnk2ly5jcvjf->get_position();

        
        $Vzkuudgqzult = $Vs4gloy23a1d + (float)$V0opnfka0og1 + (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->padding_left,
                $Vdidzwb0w3vc->border_left_width), $Vavdpq045wub["w"]);
        $Vle51ktvnbt4 = $Vopgub02o3q2 + (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->margin_top,
                $Vdidzwb0w3vc->border_top_width,
                $Vdidzwb0w3vc->padding_top), $Vavdpq045wub["h"]);

        if (isset($Vavdpq045wub["h"])) {
            $Vjlmjalejjxa = $Vavdpq045wub["h"];
        } else {
            $Vjlmjalejjxa = null;
        }

        $Vdgy2mwoncbb = $Vnk2ly5jcvjf->get_cellmap();
        $Vhxdswanopzr =& $Vdgy2mwoncbb->get_column(0);
        $Vhxdswanopzr["x"] = $Vzkuudgqzult;

        $Vkabkv5ip0kgow =& $Vdgy2mwoncbb->get_row(0);
        $Vkabkv5ip0kgow["y"] = $Vle51ktvnbt4;

        $Vdgy2mwoncbb->assign_x_positions();

        
        foreach ($Vnk2ly5jcvjf->get_children() as $Vtcc233inn5m) {
            
            if (!$Vc0dirmmlvo4->in_nested_table() && $Vc0dirmmlvo4->is_full()) {
                break;
            }

            $Vtcc233inn5m->set_containing_block($Vzkuudgqzult, $Vle51ktvnbt4, $Vztt3qdrrikx, $Vjlmjalejjxa);
            $Vtcc233inn5m->reflow();

            if (!$Vc0dirmmlvo4->in_nested_table()) {
                
                $Vc0dirmmlvo4->check_page_break($Vtcc233inn5m);
            }

        }

        
        $Vdidzwb0w3vc->height = $this->_calculate_height();

        if ($Vdidzwb0w3vc->border_collapse === "collapse") {
            
            $Vdidzwb0w3vc->border_style = "none";
        }

        $Vc0dirmmlvo4->table_reflow_end();

        
        

        if ($Vwoflziz3q5d && $Vdidzwb0w3vc->float === "none" && $Vnk2ly5jcvjf->is_in_flow()) {
            $Vwoflziz3q5d->add_frame_to_line($Vnk2ly5jcvjf);
            $Vwoflziz3q5d->add_line();
        }
    }

    
    function get_min_max_width()
    {
        if (!is_null($this->_min_max_cache)) {
            return $this->_min_max_cache;
        }

        $Vdidzwb0w3vc = $this->_frame->get_style();

        $this->_frame->normalise();

        
        
        $this->_frame->get_cellmap()->add_frame($this->_frame);

        
        
        $this->_state = array();
        $this->_state["min_width"] = 0;
        $this->_state["max_width"] = 0;

        $this->_state["percent_used"] = 0;
        $this->_state["absolute_used"] = 0;
        $this->_state["auto_min"] = 0;

        $this->_state["absolute"] = array();
        $this->_state["percent"] = array();
        $this->_state["auto"] = array();

        $Vxw4j5wpetex =& $this->_frame->get_cellmap()->get_columns();
        foreach (array_keys($Vxw4j5wpetex) as $V3xsptcgzss2) {
            $this->_state["min_width"] += $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"];
            $this->_state["max_width"] += $Vxw4j5wpetex[$V3xsptcgzss2]["max-width"];

            if ($Vxw4j5wpetex[$V3xsptcgzss2]["absolute"] > 0) {
                $this->_state["absolute"][] = $V3xsptcgzss2;
                $this->_state["absolute_used"] += $Vxw4j5wpetex[$V3xsptcgzss2]["absolute"];
            } else if ($Vxw4j5wpetex[$V3xsptcgzss2]["percent"] > 0) {
                $this->_state["percent"][] = $V3xsptcgzss2;
                $this->_state["percent_used"] += $Vxw4j5wpetex[$V3xsptcgzss2]["percent"];
            } else {
                $this->_state["auto"][] = $V3xsptcgzss2;
                $this->_state["auto_min"] += $Vxw4j5wpetex[$V3xsptcgzss2]["min-width"];
            }
        }

        
        $Vo1o33y03ae2 = array($Vdidzwb0w3vc->border_left_width,
            $Vdidzwb0w3vc->border_right_width,
            $Vdidzwb0w3vc->padding_left,
            $Vdidzwb0w3vc->padding_right,
            $Vdidzwb0w3vc->margin_left,
            $Vdidzwb0w3vc->margin_right);

        if ($Vdidzwb0w3vc->border_collapse !== "collapse") {
            list($Vo1o33y03ae2[]) = $Vdidzwb0w3vc->border_spacing;
        }

        $Vdim3b3fegnk = (float)$Vdidzwb0w3vc->length_in_pt($Vo1o33y03ae2, $this->_frame->get_containing_block("w"));

        $this->_state["min_width"] += $Vdim3b3fegnk;
        $this->_state["max_width"] += $Vdim3b3fegnk;

        return $this->_min_max_cache = array(
            $this->_state["min_width"],
            $this->_state["max_width"],
            "min" => $this->_state["min_width"],
            "max" => $this->_state["max_width"],
        );
    }
}
