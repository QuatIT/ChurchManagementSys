<?php

namespace Dompdf\Renderer;

use Dompdf\Adapter\CPDF;
use Dompdf\Css\Color;
use Dompdf\Css\Style;
use Dompdf\Dompdf;
use Dompdf\Helpers;
use Dompdf\Frame;
use Dompdf\Image\Cache;


abstract class AbstractRenderer
{

    
    protected $Vuxbwvazzzwh;

    
    protected $V3mbiykvshg0;

    
    function __construct(Dompdf $Vhvghaoacagz)
    {
        $this->_dompdf = $Vhvghaoacagz;
        $this->_canvas = $Vhvghaoacagz->getCanvas();
    }

    
    abstract function render(Frame $Vnk2ly5jcvjf);

    
    protected function _background_image($Vsp0omgzz2yw, $Vs4gloy23a1d, $Vopgub02o3q2, $Vztt3qdrrikx, $Vku40chc0ddp, $Vdidzwb0w3vc)
    {
        if (!function_exists("imagecreatetruecolor")) {
            throw new \Exception("The PHP GD extension is required, but is not installed.");
        }

        $V5rvqb5foaud = $Vdidzwb0w3vc->get_stylesheet();

        
        if ($Vztt3qdrrikx == 0 || $Vku40chc0ddp == 0) {
            return;
        }

        $Vgfh2500y4ay = $Vztt3qdrrikx;
        $V5tkchgwmh4k = $Vku40chc0ddp;

        
        if ($this->_dompdf->getOptions()->getDebugPng()) {
            print '[_background_image ' . $Vsp0omgzz2yw . ']';
        }

        list($V1bb0p4see5o, $Vxeifmjzikkj, ) = Cache::resolve_url(
            $Vsp0omgzz2yw,
            $V5rvqb5foaud->get_protocol(),
            $V5rvqb5foaud->get_host(),
            $V5rvqb5foaud->get_base_path(),
            $this->_dompdf
        );

        
        if (Cache::is_broken($V1bb0p4see5o)) {
            return;
        }

        
        
        
        
        

        list($V1bb0p4see5o_w, $V1bb0p4see5o_h) = Helpers::dompdf_getimagesize($V1bb0p4see5o, $this->_dompdf->getHttpContext());
        if (!isset($V1bb0p4see5o_w) || $V1bb0p4see5o_w == 0 || !isset($V1bb0p4see5o_h) || $V1bb0p4see5o_h == 0) {
            return;
        }

        $Vuyi4mof3pfc = $Vdidzwb0w3vc->background_repeat;
        $Vs5sugw0qedn = $this->_dompdf->getOptions()->getDpi();

        
        
        $Vny33zajfvhf = round((float)($Vztt3qdrrikx * $Vs5sugw0qedn) / 72);
        $Vnf1r32lrbng = round((float)($Vku40chc0ddp * $Vs5sugw0qedn) / 72);

        

        list($V0dgneno1gwi, $Vkzvivex30gh) = $Vdidzwb0w3vc->background_position;

        if (Helpers::is_percent($V0dgneno1gwi)) {
            
            
            $Vksopkgqixky = ((float)$V0dgneno1gwi) / 100.0;
            $Vs4gloy23a1d1 = $Vksopkgqixky * $V1bb0p4see5o_w;
            $Vs4gloy23a1d2 = $Vksopkgqixky * $Vny33zajfvhf;

            $V0dgneno1gwi = $Vs4gloy23a1d2 - $Vs4gloy23a1d1;
        } else {
            $V0dgneno1gwi = (float)($Vdidzwb0w3vc->length_in_pt($V0dgneno1gwi) * $Vs5sugw0qedn) / 72;
        }

        $V0dgneno1gwi = round($V0dgneno1gwi + (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->border_left_width) * $Vs5sugw0qedn / 72);

        if (Helpers::is_percent($Vkzvivex30gh)) {
            
            
            $Vksopkgqixky = ((float)$Vkzvivex30gh) / 100.0;
            $Vopgub02o3q21 = $Vksopkgqixky * $V1bb0p4see5o_h;
            $Vopgub02o3q22 = $Vksopkgqixky * $Vnf1r32lrbng;

            $Vkzvivex30gh = $Vopgub02o3q22 - $Vopgub02o3q21;
        } else {
            $Vkzvivex30gh = (float)($Vdidzwb0w3vc->length_in_pt($Vkzvivex30gh) * $Vs5sugw0qedn) / 72;
        }

        $Vkzvivex30gh = round($Vkzvivex30gh + (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->border_top_width) * $Vs5sugw0qedn / 72);

        
        
        
        

        if ($Vuyi4mof3pfc !== "repeat" && $Vuyi4mof3pfc !== "repeat-x") {
            
            if ($V0dgneno1gwi < 0) {
                $Vny33zajfvhf = $V1bb0p4see5o_w + $V0dgneno1gwi;
            } else {
                $Vs4gloy23a1d += ($V0dgneno1gwi * 72) / $Vs5sugw0qedn;
                $Vny33zajfvhf = $Vny33zajfvhf - $V0dgneno1gwi;
                if ($Vny33zajfvhf > $V1bb0p4see5o_w) {
                    $Vny33zajfvhf = $V1bb0p4see5o_w;
                }
                $V0dgneno1gwi = 0;
            }

            if ($Vny33zajfvhf <= 0) {
                return;
            }

            $Vztt3qdrrikx = (float)($Vny33zajfvhf * 72) / $Vs5sugw0qedn;
        } else {
            
            if ($V0dgneno1gwi < 0) {
                $V0dgneno1gwi = -((-$V0dgneno1gwi) % $V1bb0p4see5o_w);
            } else {
                $V0dgneno1gwi = $V0dgneno1gwi % $V1bb0p4see5o_w;
                if ($V0dgneno1gwi > 0) {
                    $V0dgneno1gwi -= $V1bb0p4see5o_w;
                }
            }
        }

        if ($Vuyi4mof3pfc !== "repeat" && $Vuyi4mof3pfc !== "repeat-y") {
            
            if ($Vkzvivex30gh < 0) {
                $Vnf1r32lrbng = $V1bb0p4see5o_h + $Vkzvivex30gh;
            } else {
                $Vopgub02o3q2 += ($Vkzvivex30gh * 72) / $Vs5sugw0qedn;
                $Vnf1r32lrbng = $Vnf1r32lrbng - $Vkzvivex30gh;
                if ($Vnf1r32lrbng > $V1bb0p4see5o_h) {
                    $Vnf1r32lrbng = $V1bb0p4see5o_h;
                }
                $Vkzvivex30gh = 0;
            }
            if ($Vnf1r32lrbng <= 0) {
                return;
            }
            $Vku40chc0ddp = (float)($Vnf1r32lrbng * 72) / $Vs5sugw0qedn;
        } else {
            
            if ($Vkzvivex30gh < 0) {
                $Vkzvivex30gh = -((-$Vkzvivex30gh) % $V1bb0p4see5o_h);
            } else {
                $Vkzvivex30gh = $Vkzvivex30gh % $V1bb0p4see5o_h;
                if ($Vkzvivex30gh > 0) {
                    $Vkzvivex30gh -= $V1bb0p4see5o_h;
                }
            }
        }

        
        if ($Vuyi4mof3pfc === "repeat" && $Vkzvivex30gh <= 0 && $V1bb0p4see5o_h + $Vkzvivex30gh >= $Vnf1r32lrbng) {
            $Vuyi4mof3pfc = "repeat-x";
        }

        if ($Vuyi4mof3pfc === "repeat" && $V0dgneno1gwi <= 0 && $V1bb0p4see5o_w + $V0dgneno1gwi >= $Vny33zajfvhf) {
            $Vuyi4mof3pfc = "repeat-y";
        }

        if (($Vuyi4mof3pfc === "repeat-x" && $V0dgneno1gwi <= 0 && $V1bb0p4see5o_w + $V0dgneno1gwi >= $Vny33zajfvhf) ||
            ($Vuyi4mof3pfc === "repeat-y" && $Vkzvivex30gh <= 0 && $V1bb0p4see5o_h + $Vkzvivex30gh >= $Vnf1r32lrbng)
        ) {
            $Vuyi4mof3pfc = "no-repeat";
        }

        
        
        
        

        $Vajlys5bbwec = $V1bb0p4see5o;

        $Vuv20un501o0 = false;
        $Vajlys5bbwec .= '_' . $Vny33zajfvhf . '_' . $Vnf1r32lrbng . '_' . $V0dgneno1gwi . '_' . $Vkzvivex30gh . '_' . $Vuyi4mof3pfc;

        
        
        
        if ($this->_canvas instanceof CPDF && $this->_canvas->get_cpdf()->image_iscached($Vajlys5bbwec)) {
            $Vbk1alfdu2xe = null;
        } else {
            
            $Vbk1alfdu2xe = imagecreatetruecolor($Vny33zajfvhf, $Vnf1r32lrbng);

            switch (strtolower($Vxeifmjzikkj)) {
                case "png":
                    $Vuv20un501o0 = true;
                    imagesavealpha($Vbk1alfdu2xe, true);
                    imagealphablending($Vbk1alfdu2xe, false);
                    $Veo0deounvgk = imagecreatefrompng($V1bb0p4see5o);
                    break;

                case "jpeg":
                    $Veo0deounvgk = imagecreatefromjpeg($V1bb0p4see5o);
                    break;

                case "gif":
                    $Veo0deounvgk = imagecreatefromgif($V1bb0p4see5o);
                    break;

                case "bmp":
                    $Veo0deounvgk = Helpers::imagecreatefrombmp($V1bb0p4see5o);
                    break;

                default:
                    return; 
            }

            if ($Veo0deounvgk == null) {
                return;
            }

            
            
            
            
            
            $Vi2uoeezxfiw = imagecolortransparent($Veo0deounvgk);

            if ($Vi2uoeezxfiw >= 0) {
                $Vytkk4mknear = imagecolorsforindex($Veo0deounvgk, $Vi2uoeezxfiw);
                $Vi2uoeezxfiw = imagecolorallocate($Vbk1alfdu2xe, $Vytkk4mknear['red'], $Vytkk4mknear['green'], $Vytkk4mknear['blue']);
                imagefill($Vbk1alfdu2xe, 0, 0, $Vi2uoeezxfiw);
                imagecolortransparent($Vbk1alfdu2xe, $Vi2uoeezxfiw);
            }

            
            
            if ($V0dgneno1gwi < 0) {
                $Vpmfozsc43kb = 0;
                $Veo0deounvgk_x = -$V0dgneno1gwi;
            } else {
                $Veo0deounvgk_x = 0;
                $Vpmfozsc43kb = $V0dgneno1gwi;
            }

            if ($Vkzvivex30gh < 0) {
                $Vvnyeykt5yq4 = 0;
                $Veo0deounvgk_y = -$Vkzvivex30gh;
            } else {
                $Veo0deounvgk_y = 0;
                $Vvnyeykt5yq4 = $Vkzvivex30gh;
            }

            
            
            $V0rkprd5ylkp = $V0dgneno1gwi;
            $Vj2j1qupyzsw = $Vkzvivex30gh;

            
            if ($Vuyi4mof3pfc === "no-repeat") {
                
                imagecopy($Vbk1alfdu2xe, $Veo0deounvgk, $Vpmfozsc43kb, $Vvnyeykt5yq4, $Veo0deounvgk_x, $Veo0deounvgk_y, $V1bb0p4see5o_w, $V1bb0p4see5o_h);

            } else if ($Vuyi4mof3pfc === "repeat-x") {
                for ($V0dgneno1gwi = $V0rkprd5ylkp; $V0dgneno1gwi < $Vny33zajfvhf; $V0dgneno1gwi += $V1bb0p4see5o_w) {
                    if ($V0dgneno1gwi < 0) {
                        $Vpmfozsc43kb = 0;
                        $Veo0deounvgk_x = -$V0dgneno1gwi;
                        $Vhoifq2kocyt = $V1bb0p4see5o_w + $V0dgneno1gwi;
                    } else {
                        $Vpmfozsc43kb = $V0dgneno1gwi;
                        $Veo0deounvgk_x = 0;
                        $Vhoifq2kocyt = $V1bb0p4see5o_w;
                    }
                    imagecopy($Vbk1alfdu2xe, $Veo0deounvgk, $Vpmfozsc43kb, $Vvnyeykt5yq4, $Veo0deounvgk_x, $Veo0deounvgk_y, $Vhoifq2kocyt, $V1bb0p4see5o_h);
                }
            } else if ($Vuyi4mof3pfc === "repeat-y") {

                for ($Vkzvivex30gh = $Vj2j1qupyzsw; $Vkzvivex30gh < $Vnf1r32lrbng; $Vkzvivex30gh += $V1bb0p4see5o_h) {
                    if ($Vkzvivex30gh < 0) {
                        $Vvnyeykt5yq4 = 0;
                        $Veo0deounvgk_y = -$Vkzvivex30gh;
                        $Vjlmjalejjxa = $V1bb0p4see5o_h + $Vkzvivex30gh;
                    } else {
                        $Vvnyeykt5yq4 = $Vkzvivex30gh;
                        $Veo0deounvgk_y = 0;
                        $Vjlmjalejjxa = $V1bb0p4see5o_h;
                    }
                    imagecopy($Vbk1alfdu2xe, $Veo0deounvgk, $Vpmfozsc43kb, $Vvnyeykt5yq4, $Veo0deounvgk_x, $Veo0deounvgk_y, $V1bb0p4see5o_w, $Vjlmjalejjxa);
                }
            } else if ($Vuyi4mof3pfc === "repeat") {
                for ($Vkzvivex30gh = $Vj2j1qupyzsw; $Vkzvivex30gh < $Vnf1r32lrbng; $Vkzvivex30gh += $V1bb0p4see5o_h) {
                    for ($V0dgneno1gwi = $V0rkprd5ylkp; $V0dgneno1gwi < $Vny33zajfvhf; $V0dgneno1gwi += $V1bb0p4see5o_w) {
                        if ($V0dgneno1gwi < 0) {
                            $Vpmfozsc43kb = 0;
                            $Veo0deounvgk_x = -$V0dgneno1gwi;
                            $Vhoifq2kocyt = $V1bb0p4see5o_w + $V0dgneno1gwi;
                        } else {
                            $Vpmfozsc43kb = $V0dgneno1gwi;
                            $Veo0deounvgk_x = 0;
                            $Vhoifq2kocyt = $V1bb0p4see5o_w;
                        }

                        if ($Vkzvivex30gh < 0) {
                            $Vvnyeykt5yq4 = 0;
                            $Veo0deounvgk_y = -$Vkzvivex30gh;
                            $Vjlmjalejjxa = $V1bb0p4see5o_h + $Vkzvivex30gh;
                        } else {
                            $Vvnyeykt5yq4 = $Vkzvivex30gh;
                            $Veo0deounvgk_y = 0;
                            $Vjlmjalejjxa = $V1bb0p4see5o_h;
                        }
                        imagecopy($Vbk1alfdu2xe, $Veo0deounvgk, $Vpmfozsc43kb, $Vvnyeykt5yq4, $Veo0deounvgk_x, $Veo0deounvgk_y, $Vhoifq2kocyt, $Vjlmjalejjxa);
                    }
                }
            } else {
                print 'Unknown repeat!';
            }

            imagedestroy($Veo0deounvgk);

        } 

        $this->_canvas->clipping_rectangle($Vs4gloy23a1d, $Vopgub02o3q2, $Vgfh2500y4ay, $V5tkchgwmh4k);

        
        
        
        
        
        
        
        
        
        
        
        if (!$Vuv20un501o0 && $this->_canvas instanceof CPDF) {
            
            $this->_canvas->get_cpdf()->addImagePng($Vajlys5bbwec, $Vs4gloy23a1d, $this->_canvas->get_height() - $Vopgub02o3q2 - $Vku40chc0ddp, $Vztt3qdrrikx, $Vku40chc0ddp, $Vbk1alfdu2xe);
        } else {
            $Vwly5twschnk = $this->_dompdf->getOptions()->getTempDir();
            $Vniukaz5mf5i = tempnam($Vwly5twschnk, "bg_dompdf_img_");
            @unlink($Vniukaz5mf5i);
            $Vid2ndcvqcn1 = "$Vniukaz5mf5i.png";

            
            if ($this->_dompdf->getOptions()->getDebugPng()) {
                print '[_background_image ' . $Vid2ndcvqcn1 . ']';
            }

            imagepng($Vbk1alfdu2xe, $Vid2ndcvqcn1);
            $this->_canvas->image($Vid2ndcvqcn1, $Vs4gloy23a1d, $Vopgub02o3q2, $Vztt3qdrrikx, $Vku40chc0ddp);
            imagedestroy($Vbk1alfdu2xe);

            
            if ($this->_dompdf->getOptions()->getDebugPng()) {
                print '[_background_image unlink ' . $Vid2ndcvqcn1 . ']';
            }

            if (!$this->_dompdf->getOptions()->getDebugKeepTemp()) {
                unlink($Vid2ndcvqcn1);
            }
        }

        $this->_canvas->clipping_end();
    }

    
    protected function _get_dash_pattern($Vdidzwb0w3vc, $Vztt3qdrrikx)
    {
        $Vksopkgqixkyattern = array();

        switch ($Vdidzwb0w3vc) {
            default:
                
            case "none":
                break;

            case "dotted":
                if ($Vztt3qdrrikx <= 1) {
                    $Vksopkgqixkyattern = array($Vztt3qdrrikx, $Vztt3qdrrikx * 2);
                } else {
                    $Vksopkgqixkyattern = array($Vztt3qdrrikx);
                }
                break;

            case "dashed":
                $Vksopkgqixkyattern = array(3 * $Vztt3qdrrikx);
                break;
        }

        return $Vksopkgqixkyattern;
    }

    
    protected function _border_none($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko = "bevel", $Vflxal01hfm5 = 0, $Vmsjiwqai3ku = 0)
    {
        return;
    }

    
    protected function _border_hidden($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko = "bevel", $Vflxal01hfm5 = 0, $Vmsjiwqai3ku = 0)
    {
        return;
    }

    

    
    protected function _border_dotted($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko = "bevel", $Vflxal01hfm5 = 0, $Vmsjiwqai3ku = 0)
    {
        $this->_border_line($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko, "dotted", $Vflxal01hfm5, $Vmsjiwqai3ku);
    }


    
    protected function _border_dashed($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko = "bevel", $Vflxal01hfm5 = 0, $Vmsjiwqai3ku = 0)
    {
        $this->_border_line($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko, "dashed", $Vflxal01hfm5, $Vmsjiwqai3ku);
    }


    
    protected function _border_solid($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko = "bevel", $Vflxal01hfm5 = 0, $Vmsjiwqai3ku = 0)
    {
        
        if ($Vck4jlniu1ko !== "bevel" || $Vflxal01hfm5 > 0 || $Vmsjiwqai3ku > 0) {
            
            $this->_border_line($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko, "solid", $Vflxal01hfm5, $Vmsjiwqai3ku);
            return;
        }

        list($Vnre3z2vvgov, $Vqemi0kebtld, $Vs4qcjm3btdq, $V0opnfka0og1) = $Vztt3qdrrikxs;

        
        switch ($Voj5js1i2adw) {
            case "top":
                $Vksopkgqixkyoints = array($Vs4gloy23a1d, $Vopgub02o3q2,
                    $Vs4gloy23a1d + $Vjxpogd0afis, $Vopgub02o3q2,
                    $Vs4gloy23a1d + $Vjxpogd0afis - $Vqemi0kebtld, $Vopgub02o3q2 + $Vnre3z2vvgov,
                    $Vs4gloy23a1d + $V0opnfka0og1, $Vopgub02o3q2 + $Vnre3z2vvgov);
                $this->_canvas->polygon($Vksopkgqixkyoints, $Vexxkxtdr01j, null, null, true);
                break;

            case "bottom":
                $Vksopkgqixkyoints = array($Vs4gloy23a1d, $Vopgub02o3q2,
                    $Vs4gloy23a1d + $Vjxpogd0afis, $Vopgub02o3q2,
                    $Vs4gloy23a1d + $Vjxpogd0afis - $Vqemi0kebtld, $Vopgub02o3q2 - $Vs4qcjm3btdq,
                    $Vs4gloy23a1d + $V0opnfka0og1, $Vopgub02o3q2 - $Vs4qcjm3btdq);
                $this->_canvas->polygon($Vksopkgqixkyoints, $Vexxkxtdr01j, null, null, true);
                break;

            case "left":
                $Vksopkgqixkyoints = array($Vs4gloy23a1d, $Vopgub02o3q2,
                    $Vs4gloy23a1d, $Vopgub02o3q2 + $Vjxpogd0afis,
                    $Vs4gloy23a1d + $V0opnfka0og1, $Vopgub02o3q2 + $Vjxpogd0afis - $Vs4qcjm3btdq,
                    $Vs4gloy23a1d + $V0opnfka0og1, $Vopgub02o3q2 + $Vnre3z2vvgov);
                $this->_canvas->polygon($Vksopkgqixkyoints, $Vexxkxtdr01j, null, null, true);
                break;

            case "right":
                $Vksopkgqixkyoints = array($Vs4gloy23a1d, $Vopgub02o3q2,
                    $Vs4gloy23a1d, $Vopgub02o3q2 + $Vjxpogd0afis,
                    $Vs4gloy23a1d - $Vqemi0kebtld, $Vopgub02o3q2 + $Vjxpogd0afis - $Vs4qcjm3btdq,
                    $Vs4gloy23a1d - $Vqemi0kebtld, $Vopgub02o3q2 + $Vnre3z2vvgov);
                $this->_canvas->polygon($Vksopkgqixkyoints, $Vexxkxtdr01j, null, null, true);
                break;

            default:
                return;
        }
    }

    
    protected function _apply_ratio($Voj5js1i2adw, $V40vhmzfc0aj, $Vnre3z2vvgov, $Vqemi0kebtld, $Vs4qcjm3btdq, $V0opnfka0og1, &$Vs4gloy23a1d, &$Vopgub02o3q2, &$Vjxpogd0afis, &$Vflxal01hfm5, &$Vmsjiwqai3ku)
    {
        switch ($Voj5js1i2adw) {
            case "top":
                $Vflxal01hfm5 -= $V0opnfka0og1 * $V40vhmzfc0aj;
                $Vmsjiwqai3ku -= $Vqemi0kebtld * $V40vhmzfc0aj;
                $Vs4gloy23a1d += $V0opnfka0og1 * $V40vhmzfc0aj;
                $Vopgub02o3q2 += $Vnre3z2vvgov * $V40vhmzfc0aj;
                $Vjxpogd0afis -= $V0opnfka0og1 * $V40vhmzfc0aj + $Vqemi0kebtld * $V40vhmzfc0aj;
                break;

            case "bottom":
                $Vflxal01hfm5 -= $Vqemi0kebtld * $V40vhmzfc0aj;
                $Vmsjiwqai3ku -= $V0opnfka0og1 * $V40vhmzfc0aj;
                $Vs4gloy23a1d += $V0opnfka0og1 * $V40vhmzfc0aj;
                $Vopgub02o3q2 -= $Vs4qcjm3btdq * $V40vhmzfc0aj;
                $Vjxpogd0afis -= $V0opnfka0og1 * $V40vhmzfc0aj + $Vqemi0kebtld * $V40vhmzfc0aj;
                break;

            case "left":
                $Vflxal01hfm5 -= $Vnre3z2vvgov * $V40vhmzfc0aj;
                $Vmsjiwqai3ku -= $Vs4qcjm3btdq * $V40vhmzfc0aj;
                $Vs4gloy23a1d += $V0opnfka0og1 * $V40vhmzfc0aj;
                $Vopgub02o3q2 += $Vnre3z2vvgov * $V40vhmzfc0aj;
                $Vjxpogd0afis -= $Vnre3z2vvgov * $V40vhmzfc0aj + $Vs4qcjm3btdq * $V40vhmzfc0aj;
                break;

            case "right":
                $Vflxal01hfm5 -= $Vs4qcjm3btdq * $V40vhmzfc0aj;
                $Vmsjiwqai3ku -= $Vnre3z2vvgov * $V40vhmzfc0aj;
                $Vs4gloy23a1d -= $Vqemi0kebtld * $V40vhmzfc0aj;
                $Vopgub02o3q2 += $Vnre3z2vvgov * $V40vhmzfc0aj;
                $Vjxpogd0afis -= $Vnre3z2vvgov * $V40vhmzfc0aj + $Vs4qcjm3btdq * $V40vhmzfc0aj;
                break;

            default:
                return;
        }
    }

    
    protected function _border_double($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko = "bevel", $Vflxal01hfm5 = 0, $Vmsjiwqai3ku = 0)
    {
        list($Vnre3z2vvgov, $Vqemi0kebtld, $Vs4qcjm3btdq, $V0opnfka0og1) = $Vztt3qdrrikxs;

        $Vihabv442e5l = array($Vnre3z2vvgov / 3, $Vqemi0kebtld / 3, $Vs4qcjm3btdq / 3, $V0opnfka0og1 / 3);

        
        $this->_border_solid($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vihabv442e5l, $Voj5js1i2adw, $Vck4jlniu1ko, $Vflxal01hfm5, $Vmsjiwqai3ku);

        $this->_apply_ratio($Voj5js1i2adw, 2 / 3, $Vnre3z2vvgov, $Vqemi0kebtld, $Vs4qcjm3btdq, $V0opnfka0og1, $Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vflxal01hfm5, $Vmsjiwqai3ku);

        $this->_border_solid($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vihabv442e5l, $Voj5js1i2adw, $Vck4jlniu1ko, $Vflxal01hfm5, $Vmsjiwqai3ku);
    }

    
    protected function _border_groove($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko = "bevel", $Vflxal01hfm5 = 0, $Vmsjiwqai3ku = 0)
    {
        list($Vnre3z2vvgov, $Vqemi0kebtld, $Vs4qcjm3btdq, $V0opnfka0og1) = $Vztt3qdrrikxs;

        $Vjlmjalejjxaalf_widths = array($Vnre3z2vvgov / 2, $Vqemi0kebtld / 2, $Vs4qcjm3btdq / 2, $V0opnfka0og1 / 2);

        $this->_border_inset($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vjlmjalejjxaalf_widths, $Voj5js1i2adw, $Vck4jlniu1ko, $Vflxal01hfm5, $Vmsjiwqai3ku);

        $this->_apply_ratio($Voj5js1i2adw, 0.5, $Vnre3z2vvgov, $Vqemi0kebtld, $Vs4qcjm3btdq, $V0opnfka0og1, $Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vflxal01hfm5, $Vmsjiwqai3ku);

        $this->_border_outset($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vjlmjalejjxaalf_widths, $Voj5js1i2adw, $Vck4jlniu1ko, $Vflxal01hfm5, $Vmsjiwqai3ku);

    }

    
    protected function _border_ridge($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko = "bevel", $Vflxal01hfm5 = 0, $Vmsjiwqai3ku = 0)
    {
        list($Vnre3z2vvgov, $Vqemi0kebtld, $Vs4qcjm3btdq, $V0opnfka0og1) = $Vztt3qdrrikxs;

        $Vjlmjalejjxaalf_widths = array($Vnre3z2vvgov / 2, $Vqemi0kebtld / 2, $Vs4qcjm3btdq / 2, $V0opnfka0og1 / 2);

        $this->_border_outset($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vjlmjalejjxaalf_widths, $Voj5js1i2adw, $Vck4jlniu1ko, $Vflxal01hfm5, $Vmsjiwqai3ku);

        $this->_apply_ratio($Voj5js1i2adw, 0.5, $Vnre3z2vvgov, $Vqemi0kebtld, $Vs4qcjm3btdq, $V0opnfka0og1, $Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vflxal01hfm5, $Vmsjiwqai3ku);

        $this->_border_inset($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vjlmjalejjxaalf_widths, $Voj5js1i2adw, $Vck4jlniu1ko, $Vflxal01hfm5, $Vmsjiwqai3ku);

    }

    
    protected function _tint($Vv03lfntnmcz)
    {
        if (!is_numeric($Vv03lfntnmcz)) {
            return $Vv03lfntnmcz;
        }

        return min(1, $Vv03lfntnmcz + 0.16);
    }

    
    protected function _shade($Vv03lfntnmcz)
    {
        if (!is_numeric($Vv03lfntnmcz)) {
            return $Vv03lfntnmcz;
        }

        return max(0, $Vv03lfntnmcz - 0.33);
    }

    
    protected function _border_inset($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko = "bevel", $Vflxal01hfm5 = 0, $Vmsjiwqai3ku = 0)
    {
        switch ($Voj5js1i2adw) {
            case "top":
            case "left":
                $Vt51kh5wdv1x = array_map(array($this, "_shade"), $Vexxkxtdr01j);
                $this->_border_solid($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vt51kh5wdv1x, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko, $Vflxal01hfm5, $Vmsjiwqai3ku);
                break;

            case "bottom":
            case "right":
                $Vi2uoeezxfiwnt = array_map(array($this, "_tint"), $Vexxkxtdr01j);
                $this->_border_solid($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vi2uoeezxfiwnt, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko, $Vflxal01hfm5, $Vmsjiwqai3ku);
                break;

            default:
                return;
        }
    }

    
    protected function _border_outset($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko = "bevel", $Vflxal01hfm5 = 0, $Vmsjiwqai3ku = 0)
    {
        switch ($Voj5js1i2adw) {
            case "top":
            case "left":
                $Vi2uoeezxfiwnt = array_map(array($this, "_tint"), $Vexxkxtdr01j);
                $this->_border_solid($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vi2uoeezxfiwnt, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko, $Vflxal01hfm5, $Vmsjiwqai3ku);
                break;

            case "bottom":
            case "right":
                $Vt51kh5wdv1x = array_map(array($this, "_shade"), $Vexxkxtdr01j);
                $this->_border_solid($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vt51kh5wdv1x, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko, $Vflxal01hfm5, $Vmsjiwqai3ku);
                break;

            default:
                return;
        }
    }

    
    protected function _border_line($Vs4gloy23a1d, $Vopgub02o3q2, $Vjxpogd0afis, $Vexxkxtdr01j, $Vztt3qdrrikxs, $Voj5js1i2adw, $Vck4jlniu1ko = "bevel", $Vksopkgqixkyattern_name, $Vflxal01hfm5 = 0, $Vmsjiwqai3ku = 0)
    {
        
        list($Vnre3z2vvgov, $Vqemi0kebtld, $Vs4qcjm3btdq, $V0opnfka0og1) = $Vztt3qdrrikxs;
        $Vztt3qdrrikx = $$Voj5js1i2adw;

        $Vksopkgqixkyattern = $this->_get_dash_pattern($Vksopkgqixkyattern_name, $Vztt3qdrrikx);

        $Vjlmjalejjxaalf_width = $Vztt3qdrrikx / 2;
        $Vflxal01hfm5 -= $Vjlmjalejjxaalf_width;
        $Vmsjiwqai3ku -= $Vjlmjalejjxaalf_width;
        $Vbkezjd5xx0d = $Vflxal01hfm5 / 80;
        $Vjxpogd0afis -= $Vztt3qdrrikx;

        switch ($Voj5js1i2adw) {
            case "top":
                $Vs4gloy23a1d += $Vjlmjalejjxaalf_width;
                $Vopgub02o3q2 += $Vjlmjalejjxaalf_width;

                if ($Vflxal01hfm5 > 0) {
                    $this->_canvas->arc($Vs4gloy23a1d + $Vflxal01hfm5, $Vopgub02o3q2 + $Vflxal01hfm5, $Vflxal01hfm5, $Vflxal01hfm5, 90 - $Vbkezjd5xx0d, 135 + $Vbkezjd5xx0d, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vksopkgqixkyattern);
                }

                $this->_canvas->line($Vs4gloy23a1d + $Vflxal01hfm5, $Vopgub02o3q2, $Vs4gloy23a1d + $Vjxpogd0afis - $Vmsjiwqai3ku, $Vopgub02o3q2, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vksopkgqixkyattern);

                if ($Vmsjiwqai3ku > 0) {
                    $this->_canvas->arc($Vs4gloy23a1d + $Vjxpogd0afis - $Vmsjiwqai3ku, $Vopgub02o3q2 + $Vmsjiwqai3ku, $Vmsjiwqai3ku, $Vmsjiwqai3ku, 45 - $Vbkezjd5xx0d, 90 + $Vbkezjd5xx0d, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vksopkgqixkyattern);
                }
                break;

            case "bottom":
                $Vs4gloy23a1d += $Vjlmjalejjxaalf_width;
                $Vopgub02o3q2 -= $Vjlmjalejjxaalf_width;

                if ($Vflxal01hfm5 > 0) {
                    $this->_canvas->arc($Vs4gloy23a1d + $Vflxal01hfm5, $Vopgub02o3q2 - $Vflxal01hfm5, $Vflxal01hfm5, $Vflxal01hfm5, 225 - $Vbkezjd5xx0d, 270 + $Vbkezjd5xx0d, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vksopkgqixkyattern);
                }

                $this->_canvas->line($Vs4gloy23a1d + $Vflxal01hfm5, $Vopgub02o3q2, $Vs4gloy23a1d + $Vjxpogd0afis - $Vmsjiwqai3ku, $Vopgub02o3q2, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vksopkgqixkyattern);

                if ($Vmsjiwqai3ku > 0) {
                    $this->_canvas->arc($Vs4gloy23a1d + $Vjxpogd0afis - $Vmsjiwqai3ku, $Vopgub02o3q2 - $Vmsjiwqai3ku, $Vmsjiwqai3ku, $Vmsjiwqai3ku, 270 - $Vbkezjd5xx0d, 315 + $Vbkezjd5xx0d, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vksopkgqixkyattern);
                }
                break;

            case "left":
                $Vopgub02o3q2 += $Vjlmjalejjxaalf_width;
                $Vs4gloy23a1d += $Vjlmjalejjxaalf_width;

                if ($Vflxal01hfm5 > 0) {
                    $this->_canvas->arc($Vs4gloy23a1d + $Vflxal01hfm5, $Vopgub02o3q2 + $Vflxal01hfm5, $Vflxal01hfm5, $Vflxal01hfm5, 135 - $Vbkezjd5xx0d, 180 + $Vbkezjd5xx0d, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vksopkgqixkyattern);
                }

                $this->_canvas->line($Vs4gloy23a1d, $Vopgub02o3q2 + $Vflxal01hfm5, $Vs4gloy23a1d, $Vopgub02o3q2 + $Vjxpogd0afis - $Vmsjiwqai3ku, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vksopkgqixkyattern);

                if ($Vmsjiwqai3ku > 0) {
                    $this->_canvas->arc($Vs4gloy23a1d + $Vmsjiwqai3ku, $Vopgub02o3q2 + $Vjxpogd0afis - $Vmsjiwqai3ku, $Vmsjiwqai3ku, $Vmsjiwqai3ku, 180 - $Vbkezjd5xx0d, 225 + $Vbkezjd5xx0d, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vksopkgqixkyattern);
                }
                break;

            case "right":
                $Vopgub02o3q2 += $Vjlmjalejjxaalf_width;
                $Vs4gloy23a1d -= $Vjlmjalejjxaalf_width;

                if ($Vflxal01hfm5 > 0) {
                    $this->_canvas->arc($Vs4gloy23a1d - $Vflxal01hfm5, $Vopgub02o3q2 + $Vflxal01hfm5, $Vflxal01hfm5, $Vflxal01hfm5, 0 - $Vbkezjd5xx0d, 45 + $Vbkezjd5xx0d, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vksopkgqixkyattern);
                }

                $this->_canvas->line($Vs4gloy23a1d, $Vopgub02o3q2 + $Vflxal01hfm5, $Vs4gloy23a1d, $Vopgub02o3q2 + $Vjxpogd0afis - $Vmsjiwqai3ku, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vksopkgqixkyattern);

                if ($Vmsjiwqai3ku > 0) {
                    $this->_canvas->arc($Vs4gloy23a1d - $Vmsjiwqai3ku, $Vopgub02o3q2 + $Vjxpogd0afis - $Vmsjiwqai3ku, $Vmsjiwqai3ku, $Vmsjiwqai3ku, 315 - $Vbkezjd5xx0d, 360 + $Vbkezjd5xx0d, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vksopkgqixkyattern);
                }
                break;
        }
    }

    
    protected function _set_opacity($Vdrvff4n2sqc)
    {
        if (is_numeric($Vdrvff4n2sqc) && $Vdrvff4n2sqc <= 1.0 && $Vdrvff4n2sqc >= 0.0) {
            $this->_canvas->set_opacity($Vdrvff4n2sqc);
        }
    }

    
    protected function _debug_layout($Vwv4dbcjyx3f, $Vexxkxtdr01j = "red", $Vdidzwb0w3vc = array())
    {
        $this->_canvas->rectangle($Vwv4dbcjyx3f[0], $Vwv4dbcjyx3f[1], $Vwv4dbcjyx3f[2], $Vwv4dbcjyx3f[3], Color::parse($Vexxkxtdr01j), 0.1, $Vdidzwb0w3vc);
    }
}
