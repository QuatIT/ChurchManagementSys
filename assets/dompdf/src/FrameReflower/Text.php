<?php

namespace Dompdf\FrameReflower;

use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
use Dompdf\FrameDecorator\Text as TextFrameDecorator;
use Dompdf\FontMetrics;
use Dompdf\Helpers;


class Text extends AbstractFrameReflower
{

    
    protected $V5zqjd5hivpj; 

    
    protected $Vtabfexfghu0;

    public static $Vc5byizwvv4z = "/[ \t\r\n\f]+/u";

    
    private $Vj1pbeciqvz4;

    
    public function __construct(TextFrameDecorator $Vnk2ly5jcvjf, FontMetrics $Vj1pbeciqvz4)
    {
        parent::__construct($Vnk2ly5jcvjf);
        $Vcki4t4qmybshis->setFontMetrics($Vj1pbeciqvz4);
    }

    
    protected function _collapse_white_space($Vnlbbd31sxbf)
    {
        


        return preg_replace(self::$Vc5byizwvv4z, " ", $Vnlbbd31sxbf);
    }

    
    protected function _line_break($Vnlbbd31sxbf)
    {
        $Vdidzwb0w3vc = $Vcki4t4qmybshis->_frame->get_style();
        $Vlak25col1u3 = $Vdidzwb0w3vc->font_size;
        $V3h4z3hxorxj = $Vdidzwb0w3vc->font_family;
        $Vd5tclceha1r = $Vcki4t4qmybshis->_block_parent->get_current_line_box();

        
        $Vfdyb0uk2yzq = $Vcki4t4qmybshis->_frame->get_containing_block("w");
        $Vd5tclceha1r_width = $Vd5tclceha1r->left + $Vd5tclceha1r->w + $Vd5tclceha1r->right;

        $Vxvtu2lytc1a = $Vfdyb0uk2yzq - $Vd5tclceha1r_width;

        
        $Vay4fk3jgmc4 = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->word_spacing);
        $Vaohjovek4hi = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->letter_spacing);

        
        $Vnlbbd31sxbf_width = $Vcki4t4qmybshis->getFontMetrics()->getTextWidth($Vnlbbd31sxbf, $V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4, $Vaohjovek4hi);
        $Vdyivefrcegn =
            (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->margin_left,
                $Vdidzwb0w3vc->border_left_width,
                $Vdidzwb0w3vc->padding_left,
                $Vdidzwb0w3vc->padding_right,
                $Vdidzwb0w3vc->border_right_width,
                $Vdidzwb0w3vc->margin_right), $Vfdyb0uk2yzq);

        $Vnk2ly5jcvjf_width = $Vnlbbd31sxbf_width + $Vdyivefrcegn;












        if ($Vnk2ly5jcvjf_width <= $Vxvtu2lytc1a) {
            return false;
        }

        
        $Vy51tmxn20mg = preg_split('/([\s-]+)/u', $Vnlbbd31sxbf, -1, PREG_SPLIT_DELIM_CAPTURE);
        $Vrjt3xcykhaj = count($Vy51tmxn20mg);

        
        $Vztt3qdrrikx = 0;
        $Vadkcwffkfxw = "";
        reset($Vy51tmxn20mg);

        
        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vrjt3xcykhaj; $V3xsptcgzss2 += 2) {
            $V2bjyo0c3vm5 = $Vy51tmxn20mg[$V3xsptcgzss2] . (isset($Vy51tmxn20mg[$V3xsptcgzss2 + 1]) ? $Vy51tmxn20mg[$V3xsptcgzss2 + 1] : "");
            $V2bjyo0c3vm5_width = $Vcki4t4qmybshis->getFontMetrics()->getTextWidth($V2bjyo0c3vm5, $V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4, $Vaohjovek4hi);
            if ($Vztt3qdrrikx + $V2bjyo0c3vm5_width + $Vdyivefrcegn > $Vxvtu2lytc1a) {
                break;
            }

            $Vztt3qdrrikx += $V2bjyo0c3vm5_width;
            $Vadkcwffkfxw .= $V2bjyo0c3vm5;
        }

        $Voxg43greno1 = ($Vdidzwb0w3vc->word_wrap === "break-word");

        
        if ($Vd5tclceha1r_width == 0 && $Vztt3qdrrikx == 0) {
            $Vujweq34gtl3 = "";
            $Vvzfi00ik34t = 0;

            if ($Voxg43greno1) {
                for ($V0hg12l10vfx = 0; $V0hg12l10vfx < strlen($V2bjyo0c3vm5); $V0hg12l10vfx++) {
                    $Vujweq34gtl3 .= $V2bjyo0c3vm5[$V0hg12l10vfx];
                    $Vn1ew5szmvh5 = $Vcki4t4qmybshis->getFontMetrics()->getTextWidth($Vujweq34gtl3, $V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4, $Vaohjovek4hi);
                    if ($Vn1ew5szmvh5 > $Vxvtu2lytc1a) {
                        break;
                    }

                    $Vvzfi00ik34t = $Vn1ew5szmvh5;
                }
            }

            if ($Voxg43greno1 && $Vvzfi00ik34t > 0) {
                
                $Vadkcwffkfxw .= substr($Vujweq34gtl3, 0, -1);
            } else {
                
                $Vadkcwffkfxw .= $V2bjyo0c3vm5;
            }
        }

        $Vq154qppcleo = mb_strlen($Vadkcwffkfxw);

        
        
        
        

        return $Vq154qppcleo;
    }

    

    
    protected function _newline_break($Vnlbbd31sxbf)
    {
        if (($V3xsptcgzss2 = mb_strpos($Vnlbbd31sxbf, "\n")) === false) {
            return false;
        }

        return $V3xsptcgzss2 + 1;
    }

    
    protected function _layout_line()
    {
        $Vnk2ly5jcvjf = $Vcki4t4qmybshis->_frame;
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        $Vnlbbd31sxbf = $Vnk2ly5jcvjf->get_text();
        $Vlak25col1u3 = $Vdidzwb0w3vc->font_size;
        $V3h4z3hxorxj = $Vdidzwb0w3vc->font_family;

        
        $Vdidzwb0w3vc->height = $Vcki4t4qmybshis->getFontMetrics()->getFontHeight($V3h4z3hxorxj, $Vlak25col1u3);

        $Vujweq34gtl3plit = false;
        $Vnwsmmx1bd1z = false;

        
        
        switch (strtolower($Vdidzwb0w3vc->text_transform)) {
            default:
                break;
            case "capitalize":
                $Vnlbbd31sxbf = Helpers::mb_ucwords($Vnlbbd31sxbf);
                break;
            case "uppercase":
                $Vnlbbd31sxbf = mb_convert_case($Vnlbbd31sxbf, MB_CASE_UPPER);
                break;
            case "lowercase":
                $Vnlbbd31sxbf = mb_convert_case($Vnlbbd31sxbf, MB_CASE_LOWER);
                break;
        }

        
        
        switch ($Vdidzwb0w3vc->white_space) {
            default:
            case "normal":
                $Vnk2ly5jcvjf->set_text($Vnlbbd31sxbf = $Vcki4t4qmybshis->_collapse_white_space($Vnlbbd31sxbf));
                if ($Vnlbbd31sxbf == "") {
                    break;
                }

                $Vujweq34gtl3plit = $Vcki4t4qmybshis->_line_break($Vnlbbd31sxbf);
                break;

            case "pre":
                $Vujweq34gtl3plit = $Vcki4t4qmybshis->_newline_break($Vnlbbd31sxbf);
                $Vnwsmmx1bd1z = $Vujweq34gtl3plit !== false;
                break;

            case "nowrap":
                $Vnk2ly5jcvjf->set_text($Vnlbbd31sxbf = $Vcki4t4qmybshis->_collapse_white_space($Vnlbbd31sxbf));
                break;

            case "pre-wrap":
                $Vujweq34gtl3plit = $Vcki4t4qmybshis->_newline_break($Vnlbbd31sxbf);

                if (($Vynpm04a4fx0 = $Vcki4t4qmybshis->_line_break($Vnlbbd31sxbf)) !== false) {
                    $Vnwsmmx1bd1z = $Vujweq34gtl3plit < $Vynpm04a4fx0;
                    $Vujweq34gtl3plit = min($Vynpm04a4fx0, $Vujweq34gtl3plit);
                } else
                    $Vnwsmmx1bd1z = true;

                break;

            case "pre-line":
                
                $Vnk2ly5jcvjf->set_text($Vnlbbd31sxbf = preg_replace("/[ \t]+/u", " ", $Vnlbbd31sxbf));

                if ($Vnlbbd31sxbf == "") {
                    break;
                }

                $Vujweq34gtl3plit = $Vcki4t4qmybshis->_newline_break($Vnlbbd31sxbf);

                if (($Vynpm04a4fx0 = $Vcki4t4qmybshis->_line_break($Vnlbbd31sxbf)) !== false) {
                    $Vnwsmmx1bd1z = $Vujweq34gtl3plit < $Vynpm04a4fx0;
                    $Vujweq34gtl3plit = min($Vynpm04a4fx0, $Vujweq34gtl3plit);
                } else {
                    $Vnwsmmx1bd1z = true;
                }

                break;

        }

        
        if ($Vnlbbd31sxbf === "") {
            return;
        }

        if ($Vujweq34gtl3plit !== false) {
            
            if ($Vujweq34gtl3plit == 0 && $Vnlbbd31sxbf === " ") {
                $Vnk2ly5jcvjf->set_text("");
                return;
            }

            if ($Vujweq34gtl3plit == 0) {
                
                

                $Vcki4t4qmybshis->_block_parent->maximize_line_height($Vdidzwb0w3vc->height, $Vnk2ly5jcvjf);
                $Vcki4t4qmybshis->_block_parent->add_line();
                $Vnk2ly5jcvjf->position();

                
                $Vcki4t4qmybshis->_layout_line();
            } else if ($Vujweq34gtl3plit < mb_strlen($Vnk2ly5jcvjf->get_text())) {
                
                $Vnk2ly5jcvjf->split_text($Vujweq34gtl3plit);

                $Vcki4t4qmybs = $Vnk2ly5jcvjf->get_text();

                
                if ($Vujweq34gtl3plit > 1 && $Vcki4t4qmybs[$Vujweq34gtl3plit - 1] === "\n" && !$Vnk2ly5jcvjf->is_pre()) {
                    $Vnk2ly5jcvjf->set_text(mb_substr($Vcki4t4qmybs, 0, -1));
                }

                
                
                
                
                
            }

            if ($Vnwsmmx1bd1z) {
                $Vcki4t4qmybshis->_block_parent->add_line();
                $Vnk2ly5jcvjf->position();
            }
        } else {
            
            
            
            $Vcki4t4qmybs = $Vnk2ly5jcvjf->get_text();
            $Vycghhqowrim = $Vnk2ly5jcvjf->get_parent();
            $V3xsptcgzss2s_inline_frame = ($Vycghhqowrim instanceof \Dompdf\FrameDecorator\Inline);

            if ((!$V3xsptcgzss2s_inline_frame && !$Vnk2ly5jcvjf->get_next_sibling()) 
            ) { 
                $Vcki4t4qmybs = rtrim($Vcki4t4qmybs);
            }

            if ((!$V3xsptcgzss2s_inline_frame && !$Vnk2ly5jcvjf->get_prev_sibling()) 
            ) { 
                $Vcki4t4qmybs = ltrim($Vcki4t4qmybs);
            }

            $Vnk2ly5jcvjf->set_text($Vcki4t4qmybs);
        }

        
        $Vztt3qdrrikx = $Vnk2ly5jcvjf->recalculate_width();
    }

    
    function reflow(BlockFrameDecorator $Vwoflziz3q5d = null)
    {
        $Vnk2ly5jcvjf = $Vcki4t4qmybshis->_frame;
        $Vc0dirmmlvo4 = $Vnk2ly5jcvjf->get_root();
        $Vc0dirmmlvo4->check_forced_page_break($Vcki4t4qmybshis->_frame);

        if ($Vc0dirmmlvo4->is_full()) {
            return;
        }

        $Vcki4t4qmybshis->_block_parent = 
        $Vnk2ly5jcvjf->find_block_parent();

        
        






        $Vnk2ly5jcvjf->position();

        $Vcki4t4qmybshis->_layout_line();

        if ($Vwoflziz3q5d) {
            $Vwoflziz3q5d->add_frame_to_line($Vnk2ly5jcvjf);
        }
    }

    

    
    
    function get_min_max_width()
    {
        
        $Vnk2ly5jcvjf = $Vcki4t4qmybshis->_frame;
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        $Vcki4t4qmybshis->_block_parent = $Vnk2ly5jcvjf->find_block_parent();
        $Vfdyb0uk2yzq = $Vnk2ly5jcvjf->get_containing_block("w");

        $Vadkcwffkfxw = $Vnlbbd31sxbf = $Vnk2ly5jcvjf->get_text();
        $Vlak25col1u3 = $Vdidzwb0w3vc->font_size;
        $V3h4z3hxorxj = $Vdidzwb0w3vc->font_family;

        $Vay4fk3jgmc4 = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->word_spacing);
        $Vaohjovek4hi = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->letter_spacing);

        switch ($Vdidzwb0w3vc->white_space) {
            default:
            case "normal":
                $Vadkcwffkfxw = preg_replace(self::$Vc5byizwvv4z, " ", $Vadkcwffkfxw);
            case "pre-wrap":
            case "pre-line":

                

                
                
                
                $Vy51tmxn20mg = array_flip(preg_split("/[\s-]+/u", $Vadkcwffkfxw, -1, PREG_SPLIT_DELIM_CAPTURE));
                $Vzlqynjxsspd = $Vcki4t4qmybshis;
                array_walk($Vy51tmxn20mg, function(&$Vzyqcsfbm3q4, $Vadkcwffkfxw) use ($V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4, $Vaohjovek4hi, $Vzlqynjxsspd) {
                    $Vzyqcsfbm3q4 = $Vzlqynjxsspd->getFontMetrics()->getTextWidth($Vadkcwffkfxw, $V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4, $Vaohjovek4hi);
                });

                arsort($Vy51tmxn20mg);
                $V2nh50bvjhl4 = reset($Vy51tmxn20mg);
                break;

            case "pre":
                $Vnaca15glhj5 = array_flip(preg_split("/\n/u", $Vadkcwffkfxw));
                $Vzlqynjxsspd = $Vcki4t4qmybshis;
                array_walk($Vnaca15glhj5, function(&$Vzyqcsfbm3q4, $Vadkcwffkfxw) use ($V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4, $Vaohjovek4hi, $Vzlqynjxsspd) {
                    $Vzyqcsfbm3q4 = $Vzlqynjxsspd->getFontMetrics()->getTextWidth($Vadkcwffkfxw, $V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4, $Vaohjovek4hi);
                });

                arsort($Vnaca15glhj5);
                $V2nh50bvjhl4 = reset($Vnaca15glhj5);
                break;

            case "nowrap":
                $V2nh50bvjhl4 = $Vcki4t4qmybshis->getFontMetrics()->getTextWidth($Vcki4t4qmybshis->_collapse_white_space($Vadkcwffkfxw), $V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4, $Vaohjovek4hi);
                break;
        }

        switch ($Vdidzwb0w3vc->white_space) {
            default:
            case "normal":
            case "nowrap":
                $Vadkcwffkfxw = preg_replace(self::$Vc5byizwvv4z, " ", $Vnlbbd31sxbf);
                break;

            case "pre-line":
                
                $Vadkcwffkfxw = preg_replace("/[ \t]+/u", " ", $Vnlbbd31sxbf);

            case "pre-wrap":
                
                $Vnaca15glhj5 = array_flip(preg_split("/\n/", $Vnlbbd31sxbf));
                $Vzlqynjxsspd = $Vcki4t4qmybshis;
                array_walk($Vnaca15glhj5, function(&$Vzyqcsfbm3q4, $Vadkcwffkfxw) use ($V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4, $Vaohjovek4hi, $Vzlqynjxsspd) {
                    $Vzyqcsfbm3q4 = $Vzlqynjxsspd->getFontMetrics()->getTextWidth($Vadkcwffkfxw, $V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4, $Vaohjovek4hi);
                });
                arsort($Vnaca15glhj5);
                reset($Vnaca15glhj5);
                $Vadkcwffkfxw = key($Vnaca15glhj5);
                break;
        }

        $Vc1ytxzqpa5h = $Vcki4t4qmybshis->getFontMetrics()->getTextWidth($Vadkcwffkfxw, $V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4, $Vaohjovek4hi);

        $Vdim3b3fegnk = (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->margin_left,
            $Vdidzwb0w3vc->border_left_width,
            $Vdidzwb0w3vc->padding_left,
            $Vdidzwb0w3vc->padding_right,
            $Vdidzwb0w3vc->border_right_width,
            $Vdidzwb0w3vc->margin_right), $Vfdyb0uk2yzq);
        $V2nh50bvjhl4 += $Vdim3b3fegnk;
        $Vc1ytxzqpa5h += $Vdim3b3fegnk;

        return $Vcki4t4qmybshis->_min_max_cache = array($V2nh50bvjhl4, $Vc1ytxzqpa5h, "min" => $V2nh50bvjhl4, "max" => $Vc1ytxzqpa5h);
    }

    
    public function setFontMetrics(FontMetrics $Vj1pbeciqvz4)
    {
        $Vcki4t4qmybshis->fontMetrics = $Vj1pbeciqvz4;
        return $Vcki4t4qmybshis;
    }

    
    public function getFontMetrics()
    {
        return $Vcki4t4qmybshis->fontMetrics;
    }

    
    public function calculate_auto_width()
    {
        return $Vcki4t4qmybshis->_frame->recalculate_width();
    }
}
