<?php

namespace Dompdf\Adapter;

use Dompdf\Canvas;
use Dompdf\Dompdf;
use Dompdf\Image\Cache;
use Dompdf\Helpers;


class GD implements Canvas
{
    
    private $V3mbiykvshg0;

    
    private $Vf4abxhgyf2g;

    
    private $Vf4abxhgyf2gs;

    
    private $Vn1ew5szmvh5;

    
    private $V0mpk4c0jqb4;

    
    private $Vdd3tpbgg2vg;

    
    private $Vccjolfgmp1p;

    
    private $Vcwhthsojqkt;

    
    private $V0gs0rui431h;

    
    private $Vksyujut1z3f;

    
    private $Vghd1l0cefy3;

    
    private $Vzqeo4tahn54;

    
    private $Vzqeo4tahn54_array;

    
    private $Vs5sugw0qedn;

    
    const FONT_SCALE = 0.75;

    
    public function __construct($Vlak25col1u3 = 'letter', $Vurj2rpl3rvw = "portrait", Dompdf $Vhvghaoacagz, $Vw5clfrbvdu2 = 1.0, $V3ty1ibg54n1 = array(1, 1, 1, 0))
    {

        if (!is_array($Vlak25col1u3)) {
            $Vlak25col1u3 = strtolower($Vlak25col1u3);

            if (isset(CPDF::$Vjvvabr4mx10[$Vlak25col1u3])) {
                $Vlak25col1u3 = CPDF::$Vjvvabr4mx10[$Vlak25col1u3];
            } else {
                $Vlak25col1u3 = CPDF::$Vjvvabr4mx10["letter"];
            }
        }

        if (strtolower($Vurj2rpl3rvw) === "landscape") {
            list($Vlak25col1u3[2], $Vlak25col1u3[3]) = array($Vlak25col1u3[3], $Vlak25col1u3[2]);
        }

        $this->_dompdf = $Vhvghaoacagz;

        $this->dpi = $this->get_dompdf()->getOptions()->getDpi();

        if ($Vw5clfrbvdu2 < 1) {
            $Vw5clfrbvdu2 = 1;
        }

        $this->_aa_factor = $Vw5clfrbvdu2;

        $Vlak25col1u3[2] *= $Vw5clfrbvdu2;
        $Vlak25col1u3[3] *= $Vw5clfrbvdu2;

        $this->_width = $Vlak25col1u3[2] - $Vlak25col1u3[0];
        $this->_height = $Vlak25col1u3[3] - $Vlak25col1u3[1];

        $this->_actual_width = $this->_upscale($this->_width);
        $this->_actual_height = $this->_upscale($this->_height);

        if (is_null($V3ty1ibg54n1) || !is_array($V3ty1ibg54n1)) {
            
            $V3ty1ibg54n1 = array(1, 1, 1, 0);
        }

        $this->_bg_color_array = $V3ty1ibg54n1;

        $this->new_page();
    }

    
    public function get_dompdf()
    {
        return $this->_dompdf;
    }

    
    public function get_image()
    {
        return $this->_img;
    }

    
    public function get_width()
    {
        return $this->_width / $this->_aa_factor;
    }

    
    public function get_height()
    {
        return $this->_height / $this->_aa_factor;
    }

    
    public function get_page_number()
    {
        return $this->_page_number;
    }

    
    public function get_page_count()
    {
        return $this->_page_count;
    }

    
    public function set_page_number($Vxnixw2qni35)
    {
        $this->_page_number = $Vxnixw2qni35;
    }

    
    public function set_page_count($Vj4h4hyymhja)
    {
        $this->_page_count = $Vj4h4hyymhja;
    }

    
    public function set_opacity($Vdrvff4n2sqc, $Vgauloeyyiwd = "Normal")
    {
        
    }

    
    private function _allocate_color($Vexxkxtdr01j)
    {
        $Vrr3orqjztc2 = isset($Vexxkxtdr01j["alpha"]) ? $Vexxkxtdr01j["alpha"] : 1;

        if (isset($Vexxkxtdr01j["c"])) {
            $Vexxkxtdr01j = Helpers::cmyk_to_rgb($Vexxkxtdr01j);
        }

        list($Vkabkv5ip0kg, $Vg5wspvkpf2e, $Vbz3vmbr1h2v) = $Vexxkxtdr01j;

        $Vkabkv5ip0kg *= 255;
        $Vg5wspvkpf2e *= 255;
        $Vbz3vmbr1h2v *= 255;
        $Vrr3orqjztc2 = 127 - ($Vrr3orqjztc2 * 127);

        
        $Vkabkv5ip0kg = $Vkabkv5ip0kg > 255 ? 255 : $Vkabkv5ip0kg;
        $Vg5wspvkpf2e = $Vg5wspvkpf2e > 255 ? 255 : $Vg5wspvkpf2e;
        $Vbz3vmbr1h2v = $Vbz3vmbr1h2v > 255 ? 255 : $Vbz3vmbr1h2v;
        $Vrr3orqjztc2 = $Vrr3orqjztc2 > 127 ? 127 : $Vrr3orqjztc2;

        $Vkabkv5ip0kg = $Vkabkv5ip0kg < 0 ? 0 : $Vkabkv5ip0kg;
        $Vg5wspvkpf2e = $Vg5wspvkpf2e < 0 ? 0 : $Vg5wspvkpf2e;
        $Vbz3vmbr1h2v = $Vbz3vmbr1h2v < 0 ? 0 : $Vbz3vmbr1h2v;
        $Vrr3orqjztc2 = $Vrr3orqjztc2 < 0 ? 0 : $Vrr3orqjztc2;

        $Vqwhzgethmgj = sprintf("#%02X%02X%02X%02X", $Vkabkv5ip0kg, $Vg5wspvkpf2e, $Vbz3vmbr1h2v, $Vrr3orqjztc2);

        if (isset($this->_colors[$Vqwhzgethmgj])) {
            return $this->_colors[$Vqwhzgethmgj];
        }

        if ($Vrr3orqjztc2 != 0) {
            $this->_colors[$Vqwhzgethmgj] = imagecolorallocatealpha($this->get_image(), $Vkabkv5ip0kg, $Vg5wspvkpf2e, $Vbz3vmbr1h2v, $Vrr3orqjztc2);
        } else {
            $this->_colors[$Vqwhzgethmgj] = imagecolorallocate($this->get_image(), $Vkabkv5ip0kg, $Vg5wspvkpf2e, $Vbz3vmbr1h2v);
        }

        return $this->_colors[$Vqwhzgethmgj];
    }

    
    private function _upscale($Vjxpogd0afis)
    {
        return ($Vjxpogd0afis * $this->dpi) / 72 * $this->_aa_factor;
    }

    
    private function _downscale($Vjxpogd0afis)
    {
        return ($Vjxpogd0afis / $this->dpi * 72) / $this->_aa_factor;
    }

    
    public function line($Vjxqwkabkvag, $Vzdywlaebz1l, $Vn5yf4urazdd, $Vfph4d2wdjam, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vdidzwb0w3vc = null)
    {

        
        $Vjxqwkabkvag = $this->_upscale($Vjxqwkabkvag);
        $Vzdywlaebz1l = $this->_upscale($Vzdywlaebz1l);
        $Vn5yf4urazdd = $this->_upscale($Vn5yf4urazdd);
        $Vfph4d2wdjam = $this->_upscale($Vfph4d2wdjam);
        $Vztt3qdrrikx = $this->_upscale($Vztt3qdrrikx);

        $Vv03lfntnmcz = $this->_allocate_color($Vexxkxtdr01j);

        
        if (is_array($Vdidzwb0w3vc) && count($Vdidzwb0w3vc) > 0) {
            $Vg5wspvkpf2ed_style = array();

            if (count($Vdidzwb0w3vc) == 1) {
                for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vdidzwb0w3vc[0] * $this->_aa_factor; $V3xsptcgzss2++) {
                    $Vg5wspvkpf2ed_style[] = $Vv03lfntnmcz;
                }

                for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vdidzwb0w3vc[0] * $this->_aa_factor; $V3xsptcgzss2++) {
                    $Vg5wspvkpf2ed_style[] = $this->_bg_color;
                }
            } else {
                $V3xsptcgzss2 = 0;
                foreach ($Vdidzwb0w3vc as $Vjxpogd0afis) {
                    if ($V3xsptcgzss2 % 2 == 0) {
                        
                        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vdidzwb0w3vc[0] * $this->_aa_factor; $V3xsptcgzss2++) {
                            $Vg5wspvkpf2ed_style[] = $Vv03lfntnmcz;
                        }

                    } else {
                        
                        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vdidzwb0w3vc[0] * $this->_aa_factor; $V3xsptcgzss2++) {
                            $Vg5wspvkpf2ed_style[] = $this->_bg_color;
                        }
                    }
                    $V3xsptcgzss2++;
                }
            }

            if (!empty($Vg5wspvkpf2ed_style)) {
                imagesetstyle($this->get_image(), $Vg5wspvkpf2ed_style);
                $Vv03lfntnmcz = IMG_COLOR_STYLED;
            }
        }

        imagesetthickness($this->get_image(), $Vztt3qdrrikx);

        imageline($this->get_image(), $Vjxqwkabkvag, $Vzdywlaebz1l, $Vn5yf4urazdd, $Vfph4d2wdjam, $Vv03lfntnmcz);
    }

    
    public function arc($Vjxqwkabkvag, $Vzdywlaebz1l, $Vkabkv5ip0kg1, $Vkabkv5ip0kg2, $Vrr3orqjztc2start, $Vrr3orqjztc2end, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vdidzwb0w3vc = array())
    {
        
    }

    
    public function rectangle($Vjxqwkabkvag, $Vzdywlaebz1l, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vdidzwb0w3vc = null)
    {

        
        $Vjxqwkabkvag = $this->_upscale($Vjxqwkabkvag);
        $Vzdywlaebz1l = $this->_upscale($Vzdywlaebz1l);
        $Vhoifq2kocyt = $this->_upscale($Vhoifq2kocyt);
        $Vjlmjalejjxa = $this->_upscale($Vjlmjalejjxa);
        $Vztt3qdrrikx = $this->_upscale($Vztt3qdrrikx);

        $Vv03lfntnmcz = $this->_allocate_color($Vexxkxtdr01j);

        
        if (is_array($Vdidzwb0w3vc) && count($Vdidzwb0w3vc) > 0) {
            $Vg5wspvkpf2ed_style = array();

            foreach ($Vdidzwb0w3vc as $Vjxpogd0afis) {
                for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vjxpogd0afis; $V3xsptcgzss2++) {
                    $Vg5wspvkpf2ed_style[] = $Vv03lfntnmcz;
                }
            }

            if (!empty($Vg5wspvkpf2ed_style)) {
                imagesetstyle($this->get_image(), $Vg5wspvkpf2ed_style);
                $Vv03lfntnmcz = IMG_COLOR_STYLED;
            }
        }

        imagesetthickness($this->get_image(), $Vztt3qdrrikx);

        imagerectangle($this->get_image(), $Vjxqwkabkvag, $Vzdywlaebz1l, $Vjxqwkabkvag + $Vhoifq2kocyt, $Vzdywlaebz1l + $Vjlmjalejjxa, $Vv03lfntnmcz);
    }

    
    public function filled_rectangle($Vjxqwkabkvag, $Vzdywlaebz1l, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vexxkxtdr01j)
    {
        
        $Vjxqwkabkvag = $this->_upscale($Vjxqwkabkvag);
        $Vzdywlaebz1l = $this->_upscale($Vzdywlaebz1l);
        $Vhoifq2kocyt = $this->_upscale($Vhoifq2kocyt);
        $Vjlmjalejjxa = $this->_upscale($Vjlmjalejjxa);

        $Vv03lfntnmcz = $this->_allocate_color($Vexxkxtdr01j);

        imagefilledrectangle($this->get_image(), $Vjxqwkabkvag, $Vzdywlaebz1l, $Vjxqwkabkvag + $Vhoifq2kocyt, $Vzdywlaebz1l + $Vjlmjalejjxa, $Vv03lfntnmcz);
    }

    
    public function clipping_rectangle($Vjxqwkabkvag, $Vzdywlaebz1l, $Vhoifq2kocyt, $Vjlmjalejjxa)
    {
        
    }

    public function clipping_roundrectangle($Vjxqwkabkvag, $Vzdywlaebz1l, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vkabkv5ip0kgTL, $Vkabkv5ip0kgTR, $Vkabkv5ip0kgBR, $Vkabkv5ip0kgBL)
    {
        
    }

    
    public function clipping_end()
    {
        
    }

    
    public function save()
    {
        $this->get_dompdf()->getOptions()->setDpi(72);
    }

    
    public function restore()
    {
        $this->get_dompdf()->getOptions()->setDpi($this->dpi);
    }

    
    public function rotate($Vrr3orqjztc2ngle, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        
    }

    
    public function skew($Vrr3orqjztc2ngle_x, $Vrr3orqjztc2ngle_y, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        
    }

    
    public function scale($Vvyyy23v5fb4, $V2fb2ve5h53x, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        
    }

    
    public function translate($Vidim0y0ouos, $Vycw3amdlttj)
    {
        
    }

    
    public function transform($Vrr3orqjztc2, $Vbz3vmbr1h2v, $Vv03lfntnmcz, $Vcyg5xmwfpxo, $V2bwrjburyuf, $V4ljftfdeqpl)
    {
        
    }

    
    public function polygon($V4jz4nyvrd2d, $Vexxkxtdr01j, $Vztt3qdrrikx = null, $Vdidzwb0w3vc = null, $V4ljftfdeqplill = false)
    {

        
        foreach (array_keys($V4jz4nyvrd2d) as $V3xsptcgzss2) {
            $V4jz4nyvrd2d[$V3xsptcgzss2] = $this->_upscale($V4jz4nyvrd2d[$V3xsptcgzss2]);
        }

        $Vv03lfntnmcz = $this->_allocate_color($Vexxkxtdr01j);

        
        if (is_array($Vdidzwb0w3vc) && count($Vdidzwb0w3vc) > 0 && !$V4ljftfdeqplill) {
            $Vg5wspvkpf2ed_style = array();

            foreach ($Vdidzwb0w3vc as $Vjxpogd0afis) {
                for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vjxpogd0afis; $V3xsptcgzss2++) {
                    $Vg5wspvkpf2ed_style[] = $Vv03lfntnmcz;
                }
            }

            if (!empty($Vg5wspvkpf2ed_style)) {
                imagesetstyle($this->get_image(), $Vg5wspvkpf2ed_style);
                $Vv03lfntnmcz = IMG_COLOR_STYLED;
            }
        }

        imagesetthickness($this->get_image(), $Vztt3qdrrikx);

        if ($V4ljftfdeqplill) {
            imagefilledpolygon($this->get_image(), $V4jz4nyvrd2d, count($V4jz4nyvrd2d) / 2, $Vv03lfntnmcz);
        } else {
            imagepolygon($this->get_image(), $V4jz4nyvrd2d, count($V4jz4nyvrd2d) / 2, $Vv03lfntnmcz);
        }
    }

    
    public function circle($Vs4gloy23a1d, $Vopgub02o3q2, $Vkabkv5ip0kg, $Vexxkxtdr01j, $Vztt3qdrrikx = null, $Vdidzwb0w3vc = null, $V4ljftfdeqplill = false)
    {
        
        $Vs4gloy23a1d = $this->_upscale($Vs4gloy23a1d);
        $Vopgub02o3q2 = $this->_upscale($Vopgub02o3q2);
        $Vkabkv5ip0kg = $this->_upscale($Vkabkv5ip0kg);

        $Vv03lfntnmcz = $this->_allocate_color($Vexxkxtdr01j);

        
        if (is_array($Vdidzwb0w3vc) && count($Vdidzwb0w3vc) > 0 && !$V4ljftfdeqplill) {
            $Vg5wspvkpf2ed_style = array();

            foreach ($Vdidzwb0w3vc as $Vjxpogd0afis) {
                for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vjxpogd0afis; $V3xsptcgzss2++) {
                    $Vg5wspvkpf2ed_style[] = $Vv03lfntnmcz;
                }
            }

            if (!empty($Vg5wspvkpf2ed_style)) {
                imagesetstyle($this->get_image(), $Vg5wspvkpf2ed_style);
                $Vv03lfntnmcz = IMG_COLOR_STYLED;
            }
        }

        imagesetthickness($this->get_image(), $Vztt3qdrrikx);

        if ($V4ljftfdeqplill) {
            imagefilledellipse($this->get_image(), $Vs4gloy23a1d, $Vopgub02o3q2, $Vkabkv5ip0kg, $Vkabkv5ip0kg, $Vv03lfntnmcz);
        } else {
            imageellipse($this->get_image(), $Vs4gloy23a1d, $Vopgub02o3q2, $Vkabkv5ip0kg, $Vkabkv5ip0kg, $Vv03lfntnmcz);
        }
    }

    
    public function image($V3xsptcgzss2mg_url, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vkabkv5ip0kgesolution = "normal")
    {
        $V3xsptcgzss2mg_type = Cache::detect_type($V3xsptcgzss2mg_url, $this->get_dompdf()->getHttpContext());

        if (!$V3xsptcgzss2mg_type) {
            return;
        }

        $V4ljftfdeqplunc_name = "imagecreatefrom$V3xsptcgzss2mg_type";
        if (!function_exists($V4ljftfdeqplunc_name)) {
            if (!method_exists("Dompdf\Helpers", $V4ljftfdeqplunc_name)) {
                throw new \Exception("Function $V4ljftfdeqplunc_name() not found.  Cannot convert $Vxeifmjzikkj image: $V3xsptcgzss2mg_url.  Please install the image PHP extension.");
            }
            $V4ljftfdeqplunc_name = "\\Dompdf\\Helpers::" . $V4ljftfdeqplunc_name;
        }
        $Veo0deounvgk = @call_user_func($V4ljftfdeqplunc_name, $V3xsptcgzss2mg_url);

        if (!$Veo0deounvgk) {
            return; 
        }

        
        $Vs4gloy23a1d = $this->_upscale($Vs4gloy23a1d);
        $Vopgub02o3q2 = $this->_upscale($Vopgub02o3q2);

        $Vhoifq2kocyt = $this->_upscale($Vhoifq2kocyt);
        $Vjlmjalejjxa = $this->_upscale($Vjlmjalejjxa);

        $V3xsptcgzss2mg_w = imagesx($Veo0deounvgk);
        $V3xsptcgzss2mg_h = imagesy($Veo0deounvgk);

        imagecopyresampled($this->get_image(), $Veo0deounvgk, $Vs4gloy23a1d, $Vopgub02o3q2, 0, 0, $Vhoifq2kocyt, $Vjlmjalejjxa, $V3xsptcgzss2mg_w, $V3xsptcgzss2mg_h);
    }

    
    public function text($Vs4gloy23a1d, $Vopgub02o3q2, $Vnlbbd31sxbf, $V4ljftfdeqplont, $Vlak25col1u3, $Vexxkxtdr01j = array(0, 0, 0), $Vhoifq2kocytord_spacing = 0.0, $Vv03lfntnmczhar_spacing = 0.0, $Vrr3orqjztc2ngle = 0.0)
    {
        
        $Vs4gloy23a1d = $this->_upscale($Vs4gloy23a1d);
        $Vopgub02o3q2 = $this->_upscale($Vopgub02o3q2);
        $Vlak25col1u3 = $this->_upscale($Vlak25col1u3) * self::FONT_SCALE;

        $Vjlmjalejjxa = $this->get_font_height_actual($V4ljftfdeqplont, $Vlak25col1u3);
        $Vv03lfntnmcz = $this->_allocate_color($Vexxkxtdr01j);

        
        
        
        
        $Vnlbbd31sxbf = preg_replace('/&(#(?:x[a-fA-F0-9]+|[0-9]+);)/', '&#38;\1', $Vnlbbd31sxbf);

        $Vnlbbd31sxbf = mb_encode_numericentity($Vnlbbd31sxbf, array(0x0080, 0xff, 0, 0xff), 'UTF-8');

        $V4ljftfdeqplont = $this->get_ttf_file($V4ljftfdeqplont);

        
        imagettftext($this->get_image(), $Vlak25col1u3, $Vrr3orqjztc2ngle, $Vs4gloy23a1d, $Vopgub02o3q2 + $Vjlmjalejjxa, $Vv03lfntnmcz, $V4ljftfdeqplont, $Vnlbbd31sxbf);
    }

    public function javascript($Vv03lfntnmczode)
    {
        
    }

    
    public function add_named_dest($Vrr3orqjztc2nchorname)
    {
        
    }

    
    public function add_link($Vsp0omgzz2yw, $Vs4gloy23a1d, $Vopgub02o3q2, $Vztt3qdrrikx, $Vjlmjalejjxaeight)
    {
        
    }

    
    public function add_info($V4qeqspuux02, $Vqfra35f14fv)
    {
        
    }

    
    public function set_default_view($Vl1wquemb3h4, $Vi43cktvy0zi = array())
    {
        
    }

    
    public function get_text_width($Vnlbbd31sxbf, $V4ljftfdeqplont, $Vlak25col1u3, $Vhoifq2kocytord_spacing = 0.0, $Vv03lfntnmczhar_spacing = 0.0)
    {
        $V4ljftfdeqplont = $this->get_ttf_file($V4ljftfdeqplont);
        $Vlak25col1u3 = $this->_upscale($Vlak25col1u3) * self::FONT_SCALE;

        
        
        
        
        $Vnlbbd31sxbf = preg_replace('/&(#(?:x[a-fA-F0-9]+|[0-9]+);)/', '&#38;\1', $Vnlbbd31sxbf);

        $Vnlbbd31sxbf = mb_encode_numericentity($Vnlbbd31sxbf, array(0x0080, 0xffff, 0, 0xffff), 'UTF-8');

        
        list($Vjxqwkabkvag, , $Vn5yf4urazdd) = imagettfbbox($Vlak25col1u3, 0, $V4ljftfdeqplont, $Vnlbbd31sxbf);

        
        return $this->_downscale($Vn5yf4urazdd - $Vjxqwkabkvag) + 1;
    }

    
    public function get_ttf_file($V4ljftfdeqplont)
    {
        if ( stripos($V4ljftfdeqplont, ".ttf") === false ) {
            $V4ljftfdeqplont .= ".ttf";
        }

        if (!file_exists($V4ljftfdeqplont)) {
            $V4ljftfdeqplont_metrics = $this->_dompdf->getFontMetrics();
            $V4ljftfdeqplont = $V4ljftfdeqplont_metrics->getFont($this->_dompdf->getOptions()->getDefaultFont()) . ".ttf";
            if (!file_exists($V4ljftfdeqplont)) {
                if (strpos($V4ljftfdeqplont, "mono")) {
                    $V4ljftfdeqplont = $V4ljftfdeqplont_metrics->getFont("DejaVu Mono") . ".ttf";
                } elseif (strpos($V4ljftfdeqplont, "sans") !== false) {
                    $V4ljftfdeqplont = $V4ljftfdeqplont_metrics->getFont("DejaVu Sans") . ".ttf";
                } elseif (strpos($V4ljftfdeqplont, "serif")) {
                    $V4ljftfdeqplont = $V4ljftfdeqplont_metrics->getFont("DejaVu Serif") . ".ttf";
                } else {
                    $V4ljftfdeqplont = $V4ljftfdeqplont_metrics->getFont("DejaVu Sans") . ".ttf";
                }
            }
        }

        return $V4ljftfdeqplont;
    }

    
    public function get_font_height($V4ljftfdeqplont, $Vlak25col1u3)
    {
        $Vlak25col1u3 = $this->_upscale($Vlak25col1u3) * self::FONT_SCALE;

        $Vjlmjalejjxaeight = $this->get_font_height_actual($V4ljftfdeqplont, $Vlak25col1u3);

        return $this->_downscale($Vjlmjalejjxaeight);
    }

    private function get_font_height_actual($V4ljftfdeqplont, $Vlak25col1u3)
    {
        $V4ljftfdeqplont = $this->get_ttf_file($V4ljftfdeqplont);
        $Vkabkv5ip0kgatio = $this->_dompdf->getOptions()->getFontHeightRatio();

        
        list(, $Vfph4d2wdjam, , , , $Vzdywlaebz1l) = imagettfbbox($Vlak25col1u3, 0, $V4ljftfdeqplont, "MXjpqytfhl"); 
        return ($Vfph4d2wdjam - $Vzdywlaebz1l) * $Vkabkv5ip0kgatio;
    }

    
    public function get_font_baseline($V4ljftfdeqplont, $Vlak25col1u3)
    {
        $Vkabkv5ip0kgatio = $this->_dompdf->getOptions()->getFontHeightRatio();
        return $this->get_font_height($V4ljftfdeqplont, $Vlak25col1u3) / $Vkabkv5ip0kgatio;
    }

    
    public function new_page()
    {
        $this->_page_number++;
        $this->_page_count++;

        $this->_img = imagecreatetruecolor($this->_actual_width, $this->_actual_height);

        $this->_bg_color = $this->_allocate_color($this->_bg_color_array);
        imagealphablending($this->_img, true);
        imagesavealpha($this->_img, true);
        imagefill($this->_img, 0, 0, $this->_bg_color);

        $this->_imgs[] = $this->_img;
    }

    public function open_object()
    {
        
    }

    public function close_object()
    {
        
    }

    public function add_object()
    {
        
    }

    public function page_text()
    {
        
    }

    
    public function stream($V4ljftfdeqplilename, $Vi43cktvy0zi = array())
    {
        if (headers_sent()) {
            die("Unable to stream image: headers already sent");
        }

        if (!isset($Vi43cktvy0zi["type"])) $Vi43cktvy0zi["type"] = "png";
        if (!isset($Vi43cktvy0zi["Attachment"])) $Vi43cktvy0zi["Attachment"] = true;
        $Vxeifmjzikkj = strtolower($Vi43cktvy0zi["type"]);

        switch ($Vxeifmjzikkj) {
            case "jpg":
            case "jpeg":
                $Vv03lfntnmczontentType = "image/jpeg";
                $V2bwrjburyufxtension = ".jpg";
                break;
            case "png":
            default:
                $Vv03lfntnmczontentType = "image/png";
                $V2bwrjburyufxtension = ".png";
                break;
        }

        header("Cache-Control: private");
        header("Content-Type: $Vv03lfntnmczontentType");

        $V4ljftfdeqplilename = str_replace(array("\n", "'"), "", basename($V4ljftfdeqplilename, ".$Vxeifmjzikkj")) . $V2bwrjburyufxtension;
        $Vrr3orqjztc2ttachment = $Vi43cktvy0zi["Attachment"] ? "attachment" : "inline";
        header(Helpers::buildContentDispositionHeader($Vrr3orqjztc2ttachment, $V4ljftfdeqplilename));

        $this->_output($Vi43cktvy0zi);
        flush();
    }

    
    public function output($Vi43cktvy0zi = array())
    {
        ob_start();

        $this->_output($Vi43cktvy0zi);

        return ob_get_clean();
    }

    
    private function _output($Vi43cktvy0zi = array())
    {
        if (!isset($Vi43cktvy0zi["type"])) $Vi43cktvy0zi["type"] = "png";
        if (!isset($Vi43cktvy0zi["page"])) $Vi43cktvy0zi["page"] = 1;
        $Vxeifmjzikkj = strtolower($Vi43cktvy0zi["type"]);

        if (isset($this->_imgs[$Vi43cktvy0zi["page"] - 1])) {
            $V3xsptcgzss2mg = $this->_imgs[$Vi43cktvy0zi["page"] - 1];
        } else {
            $V3xsptcgzss2mg = $this->_imgs[0];
        }

        
        if ($this->_aa_factor != 1) {
            $Vcyg5xmwfpxost_w = $this->_actual_width / $this->_aa_factor;
            $Vcyg5xmwfpxost_h = $this->_actual_height / $this->_aa_factor;
            $Vcyg5xmwfpxost = imagecreatetruecolor($Vcyg5xmwfpxost_w, $Vcyg5xmwfpxost_h);
            imagecopyresampled($Vcyg5xmwfpxost, $V3xsptcgzss2mg, 0, 0, 0, 0,
                $Vcyg5xmwfpxost_w, $Vcyg5xmwfpxost_h,
                $this->_actual_width, $this->_actual_height);
        } else {
            $Vcyg5xmwfpxost = $V3xsptcgzss2mg;
        }

        switch ($Vxeifmjzikkj) {
            case "jpg":
            case "jpeg":
                if (!isset($Vi43cktvy0zi["quality"])) {
                    $Vi43cktvy0zi["quality"] = 75;
                }

                imagejpeg($Vcyg5xmwfpxost, null, $Vi43cktvy0zi["quality"]);
                break;
            case "png":
            default:
                imagepng($Vcyg5xmwfpxost);
                break;
        }

        if ($this->_aa_factor != 1) {
            imagedestroy($Vcyg5xmwfpxost);
        }
    }
}
