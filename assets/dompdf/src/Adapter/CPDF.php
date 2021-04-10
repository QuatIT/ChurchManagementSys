<?php



namespace Dompdf\Adapter;

use Dompdf\Canvas;
use Dompdf\Dompdf;
use Dompdf\Helpers;
use Dompdf\Exception;
use Dompdf\Image\Cache;
use Dompdf\PhpEvaluator;


class CPDF implements Canvas
{

    
    static $Vjvvabr4mx10 = array(
        "4a0" => array(0, 0, 4767.87, 6740.79),
        "2a0" => array(0, 0, 3370.39, 4767.87),
        "a0" => array(0, 0, 2383.94, 3370.39),
        "a1" => array(0, 0, 1683.78, 2383.94),
        "a2" => array(0, 0, 1190.55, 1683.78),
        "a3" => array(0, 0, 841.89, 1190.55),
        "a4" => array(0, 0, 595.28, 841.89),
        "a5" => array(0, 0, 419.53, 595.28),
        "a6" => array(0, 0, 297.64, 419.53),
        "a7" => array(0, 0, 209.76, 297.64),
        "a8" => array(0, 0, 147.40, 209.76),
        "a9" => array(0, 0, 104.88, 147.40),
        "a10" => array(0, 0, 73.70, 104.88),
        "b0" => array(0, 0, 2834.65, 4008.19),
        "b1" => array(0, 0, 2004.09, 2834.65),
        "b2" => array(0, 0, 1417.32, 2004.09),
        "b3" => array(0, 0, 1000.63, 1417.32),
        "b4" => array(0, 0, 708.66, 1000.63),
        "b5" => array(0, 0, 498.90, 708.66),
        "b6" => array(0, 0, 354.33, 498.90),
        "b7" => array(0, 0, 249.45, 354.33),
        "b8" => array(0, 0, 175.75, 249.45),
        "b9" => array(0, 0, 124.72, 175.75),
        "b10" => array(0, 0, 87.87, 124.72),
        "c0" => array(0, 0, 2599.37, 3676.54),
        "c1" => array(0, 0, 1836.85, 2599.37),
        "c2" => array(0, 0, 1298.27, 1836.85),
        "c3" => array(0, 0, 918.43, 1298.27),
        "c4" => array(0, 0, 649.13, 918.43),
        "c5" => array(0, 0, 459.21, 649.13),
        "c6" => array(0, 0, 323.15, 459.21),
        "c7" => array(0, 0, 229.61, 323.15),
        "c8" => array(0, 0, 161.57, 229.61),
        "c9" => array(0, 0, 113.39, 161.57),
        "c10" => array(0, 0, 79.37, 113.39),
        "ra0" => array(0, 0, 2437.80, 3458.27),
        "ra1" => array(0, 0, 1729.13, 2437.80),
        "ra2" => array(0, 0, 1218.90, 1729.13),
        "ra3" => array(0, 0, 864.57, 1218.90),
        "ra4" => array(0, 0, 609.45, 864.57),
        "sra0" => array(0, 0, 2551.18, 3628.35),
        "sra1" => array(0, 0, 1814.17, 2551.18),
        "sra2" => array(0, 0, 1275.59, 1814.17),
        "sra3" => array(0, 0, 907.09, 1275.59),
        "sra4" => array(0, 0, 637.80, 907.09),
        "letter" => array(0, 0, 612.00, 792.00),
        "half-letter" => array(0, 0, 396.00, 612.00),
        "legal" => array(0, 0, 612.00, 1008.00),
        "ledger" => array(0, 0, 1224.00, 792.00),
        "tabloid" => array(0, 0, 792.00, 1224.00),
        "executive" => array(0, 0, 521.86, 756.00),
        "folio" => array(0, 0, 612.00, 936.00),
        "commercial #10 envelope" => array(0, 0, 684, 297),
        "catalog #10 1/2 envelope" => array(0, 0, 648, 864),
        "8.5x11" => array(0, 0, 612.00, 792.00),
        "8.5x14" => array(0, 0, 612.00, 1008.0),
        "11x17" => array(0, 0, 792.00, 1224.00),
    );

    
    private $V3mbiykvshg0;

    
    private $Vn35bvpfo0mv;

    
    private $Vn1ew5szmvh5;

    
    private $V0mpk4c0jqb4;

    
    private $Vcwhthsojqkt;

    
    private $V0gs0rui431h;

    
    private $V2flazjvlb52;

    
    private $V5u1zcevbgki;

    
    private $Vni42wo4xsry;

    
    private $Vbojzi1sitqp = 1;

    
    public function __construct($Vgyavbwa2gyd = "letter", $Vurj2rpl3rvw = "portrait", Dompdf $Vhvghaoacagz)
    {
        if (is_array($Vgyavbwa2gyd)) {
            $Vlak25col1u3 = $Vgyavbwa2gyd;
        } else if (isset(self::$Vjvvabr4mx10[mb_strtolower($Vgyavbwa2gyd)])) {
            $Vlak25col1u3 = self::$Vjvvabr4mx10[mb_strtolower($Vgyavbwa2gyd)];
        } else {
            $Vlak25col1u3 = self::$Vjvvabr4mx10["letter"];
        }

        if (mb_strtolower($Vurj2rpl3rvw) === "landscape") {
            list($Vlak25col1u3[2], $Vlak25col1u3[3]) = array($Vlak25col1u3[3], $Vlak25col1u3[2]);
        }

        $this->_dompdf = $Vhvghaoacagz;

        $this->_pdf = new \Cpdf(
            $Vlak25col1u3,
            true,
            $Vhvghaoacagz->getOptions()->getFontCache(),
            $Vhvghaoacagz->getOptions()->getTempDir()
        );

        $this->_pdf->addInfo("Producer", sprintf("%s + CPDF", $Vhvghaoacagz->version));
        $Vrsbf4q2bpny = substr_replace(date('YmdHisO'), '\'', -2, 0) . '\'';
        $this->_pdf->addInfo("CreationDate", "D:$Vrsbf4q2bpny");
        $this->_pdf->addInfo("ModDate", "D:$Vrsbf4q2bpny");

        $this->_width = $Vlak25col1u3[2] - $Vlak25col1u3[0];
        $this->_height = $Vlak25col1u3[3] - $Vlak25col1u3[1];

        $this->_page_number = $this->_page_count = 1;
        $this->_page_text = array();

        $this->_pages = array($this->_pdf->getFirstPageId());

        $this->_image_cache = array();
    }

    
    public function get_dompdf()
    {
        return $this->_dompdf;
    }

    
    public function __destruct()
    {
        foreach ($this->_image_cache as $V1bb0p4see5o) {
            
            
            
            
            if (!file_exists($V1bb0p4see5o)) {
                continue;
            }

            if ($this->_dompdf->getOptions()->getDebugPng()) {
                print '[__destruct unlink ' . $V1bb0p4see5o . ']';
            }
            if (!$this->_dompdf->getOptions()->getDebugKeepTemp()) {
                unlink($V1bb0p4see5o);
            }
        }
    }

    
    public function get_cpdf()
    {
        return $this->_pdf;
    }

    
    public function add_info($V4qeqspuux02, $Vqfra35f14fv)
    {
        $this->_pdf->addInfo($V4qeqspuux02, $Vqfra35f14fv);
    }

    
    public function open_object()
    {
        $Vc00k54nbbvf = $this->_pdf->openObject();
        $this->_pdf->saveState();
        return $Vc00k54nbbvf;
    }

    
    public function reopen_object($V55objzzzsbj)
    {
        $this->_pdf->reopenObject($V55objzzzsbj);
        $this->_pdf->saveState();
    }

    
    public function close_object()
    {
        $this->_pdf->restoreState();
        $this->_pdf->closeObject();
    }

    
    public function add_object($V55objzzzsbj, $V4jncaa1nol5 = 'all')
    {
        $this->_pdf->addObject($V55objzzzsbj, $V4jncaa1nol5);
    }

    
    public function stop_object($V55objzzzsbj)
    {
        $this->_pdf->stopObject($V55objzzzsbj);
    }

    
    public function serialize_object($Vkriocz2qep2)
    {
        
        return $this->_pdf->serializeObject($Vkriocz2qep2);
    }

    
    public function reopen_serialized_object($Vx4b2juat5ap)
    {
        return $this->_pdf->restoreSerializedObject($Vx4b2juat5ap);
    }

    

    
    public function get_width()
    {
        return $this->_width;
    }

    
    public function get_height()
    {
        return $this->_height;
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

    
    protected function _set_stroke_color($Vexxkxtdr01j)
    {
        $this->_pdf->setStrokeColor($Vexxkxtdr01j);
        $V5352axhr3wt = isset($Vexxkxtdr01j["alpha"]) ? $Vexxkxtdr01j["alpha"] : 1;
        if ($this->_current_opacity != 1) {
            $V5352axhr3wt *= $this->_current_opacity;
        }
        $this->_set_line_transparency("Normal", $V5352axhr3wt);
    }

    
    protected function _set_fill_color($Vexxkxtdr01j)
    {
        $this->_pdf->setColor($Vexxkxtdr01j);
        $V5352axhr3wt = isset($Vexxkxtdr01j["alpha"]) ? $Vexxkxtdr01j["alpha"] : 1;
        if ($this->_current_opacity) {
            $V5352axhr3wt *= $this->_current_opacity;
        }
        $this->_set_fill_transparency("Normal", $V5352axhr3wt);
    }

    
    protected function _set_line_transparency($Vgauloeyyiwd, $Vdrvff4n2sqc)
    {
        $this->_pdf->setLineTransparency($Vgauloeyyiwd, $Vdrvff4n2sqc);
    }

    
    protected function _set_fill_transparency($Vgauloeyyiwd, $Vdrvff4n2sqc)
    {
        $this->_pdf->setFillTransparency($Vgauloeyyiwd, $Vdrvff4n2sqc);
    }

    
    protected function _set_line_style($Vztt3qdrrikx, $Vh3ypkcknmhs, $Vazpuxkzegec, $Vw1lezjmto4p)
    {
        $this->_pdf->setLineStyle($Vztt3qdrrikx, $Vh3ypkcknmhs, $Vazpuxkzegec, $Vw1lezjmto4p);
    }

    
    public function set_opacity($Vdrvff4n2sqc, $Vgauloeyyiwd = "Normal")
    {
        $this->_set_line_transparency($Vgauloeyyiwd, $Vdrvff4n2sqc);
        $this->_set_fill_transparency($Vgauloeyyiwd, $Vdrvff4n2sqc);
        $this->_current_opacity = $Vdrvff4n2sqc;
    }

    public function set_default_view($Vl1wquemb3h4, $Vi43cktvy0zi = array())
    {
        array_unshift($Vi43cktvy0zi, $Vl1wquemb3h4);
        call_user_func_array(array($this->_pdf, "openHere"), $Vi43cktvy0zi);
    }

    
    protected function y($Vopgub02o3q2)
    {
        return $this->_height - $Vopgub02o3q2;
    }

    
    public function line($Vjxqwkabkvag, $Vopgub02o3q21, $Vn5yf4urazdd, $Vopgub02o3q22, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vdidzwb0w3vc = array())
    {
        $this->_set_stroke_color($Vexxkxtdr01j);
        $this->_set_line_style($Vztt3qdrrikx, "butt", "", $Vdidzwb0w3vc);

        $this->_pdf->line($Vjxqwkabkvag, $this->y($Vopgub02o3q21),
            $Vn5yf4urazdd, $this->y($Vopgub02o3q22));
        $this->_set_line_transparency("Normal", $this->_current_opacity);
    }

    
    public function arc($Vs4gloy23a1d, $Vopgub02o3q2, $Vflxal01hfm5, $Vmsjiwqai3ku, $V0kev1i0iwnh, $Vc0idajbamqg, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vdidzwb0w3vc = array())
    {
        $this->_set_stroke_color($Vexxkxtdr01j);
        $this->_set_line_style($Vztt3qdrrikx, "butt", "", $Vdidzwb0w3vc);

        $this->_pdf->ellipse($Vs4gloy23a1d, $this->y($Vopgub02o3q2), $Vflxal01hfm5, $Vmsjiwqai3ku, 0, 8, $V0kev1i0iwnh, $Vc0idajbamqg, false, false, true, false);
        $this->_set_line_transparency("Normal", $this->_current_opacity);
    }

    
    protected function _convert_gif_bmp_to_png($Vteh53zjtn0n, $Vxeifmjzikkj)
    {
        $Vhyq3fx312sp = "imagecreatefrom$Vxeifmjzikkj";

        if (!function_exists($Vhyq3fx312sp)) {
            if (!method_exists("Dompdf\Helpers", $Vhyq3fx312sp)) {
                throw new Exception("Function $Vhyq3fx312sp() not found.  Cannot convert $Vxeifmjzikkj image: $Vteh53zjtn0n.  Please install the image PHP extension.");
            }
            $Vhyq3fx312sp = "\\Dompdf\\Helpers::" . $Vhyq3fx312sp;
        }

        set_error_handler(array("\\Dompdf\\Helpers", "record_warnings"));
        $V3fpkdko4crz = call_user_func($Vhyq3fx312sp, $Vteh53zjtn0n);

        if ($V3fpkdko4crz) {
            imageinterlace($V3fpkdko4crz, false);

            $Vwly5twschnk = $this->_dompdf->getOptions()->getTempDir();
            $Vniukaz5mf5i = tempnam($Vwly5twschnk, "{$Vxeifmjzikkj}dompdf_img_");
            @unlink($Vniukaz5mf5i);
            $Vaqmmjdxljsi = "$Vniukaz5mf5i.png";
            $this->_image_cache[] = $Vaqmmjdxljsi;

            imagepng($V3fpkdko4crz, $Vaqmmjdxljsi);
            imagedestroy($V3fpkdko4crz);
        } else {
            $Vaqmmjdxljsi = Cache::$Vp4dew3xrbtu;
        }

        restore_error_handler();

        return $Vaqmmjdxljsi;
    }

    
    public function rectangle($Vjxqwkabkvag, $Vopgub02o3q21, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vdidzwb0w3vc = array())
    {
        $this->_set_stroke_color($Vexxkxtdr01j);
        $this->_set_line_style($Vztt3qdrrikx, "butt", "", $Vdidzwb0w3vc);
        $this->_pdf->rectangle($Vjxqwkabkvag, $this->y($Vopgub02o3q21) - $Vjlmjalejjxa, $Vhoifq2kocyt, $Vjlmjalejjxa);
        $this->_set_line_transparency("Normal", $this->_current_opacity);
    }

    
    public function filled_rectangle($Vjxqwkabkvag, $Vopgub02o3q21, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vexxkxtdr01j)
    {
        $this->_set_fill_color($Vexxkxtdr01j);
        $this->_pdf->filledRectangle($Vjxqwkabkvag, $this->y($Vopgub02o3q21) - $Vjlmjalejjxa, $Vhoifq2kocyt, $Vjlmjalejjxa);
        $this->_set_fill_transparency("Normal", $this->_current_opacity);
    }

    
    public function clipping_rectangle($Vjxqwkabkvag, $Vopgub02o3q21, $Vhoifq2kocyt, $Vjlmjalejjxa)
    {
        $this->_pdf->clippingRectangle($Vjxqwkabkvag, $this->y($Vopgub02o3q21) - $Vjlmjalejjxa, $Vhoifq2kocyt, $Vjlmjalejjxa);
    }

    
    public function clipping_roundrectangle($Vjxqwkabkvag, $Vopgub02o3q21, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vhsnbs0gwraw, $Voxjadvbzbkb, $Vpzh1agu5pge, $Vlbh2hh1w1uq)
    {
        $this->_pdf->clippingRectangleRounded($Vjxqwkabkvag, $this->y($Vopgub02o3q21) - $Vjlmjalejjxa, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vhsnbs0gwraw, $Voxjadvbzbkb, $Vpzh1agu5pge, $Vlbh2hh1w1uq);
    }

    
    public function clipping_end()
    {
        $this->_pdf->clippingEnd();
    }

    
    public function save()
    {
        $this->_pdf->saveState();
    }

    
    public function restore()
    {
        $this->_pdf->restoreState();
    }

    
    public function rotate($Vtmcaiuo2hqy, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        $this->_pdf->rotate($Vtmcaiuo2hqy, $Vs4gloy23a1d, $Vopgub02o3q2);
    }

    
    public function skew($Vtmcaiuo2hqy_x, $Vtmcaiuo2hqy_y, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        $this->_pdf->skew($Vtmcaiuo2hqy_x, $Vtmcaiuo2hqy_y, $Vs4gloy23a1d, $Vopgub02o3q2);
    }

    
    public function scale($Vvyyy23v5fb4, $V2fb2ve5h53x, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        $this->_pdf->scale($Vvyyy23v5fb4, $V2fb2ve5h53x, $Vs4gloy23a1d, $Vopgub02o3q2);
    }

    
    public function translate($Vidim0y0ouos, $Vycw3amdlttj)
    {
        $this->_pdf->translate($Vidim0y0ouos, $Vycw3amdlttj);
    }

    
    public function transform($Vrr3orqjztc2, $Vbz3vmbr1h2v, $Vv03lfntnmcz, $Vcyg5xmwfpxo, $V2bwrjburyuf, $V4ljftfdeqpl)
    {
        $this->_pdf->transform(array($Vrr3orqjztc2, $Vbz3vmbr1h2v, $Vv03lfntnmcz, $Vcyg5xmwfpxo, $V2bwrjburyuf, $V4ljftfdeqpl));
    }

    
    public function polygon($V4jz4nyvrd2d, $Vexxkxtdr01j, $Vztt3qdrrikx = null, $Vdidzwb0w3vc = array(), $V4ljftfdeqplill = false)
    {
        $this->_set_fill_color($Vexxkxtdr01j);
        $this->_set_stroke_color($Vexxkxtdr01j);

        
        for ($V3xsptcgzss2 = 1; $V3xsptcgzss2 < count($V4jz4nyvrd2d); $V3xsptcgzss2 += 2) {
            $V4jz4nyvrd2d[$V3xsptcgzss2] = $this->y($V4jz4nyvrd2d[$V3xsptcgzss2]);
        }

        $this->_pdf->polygon($V4jz4nyvrd2d, count($V4jz4nyvrd2d) / 2, $V4ljftfdeqplill);

        $this->_set_fill_transparency("Normal", $this->_current_opacity);
        $this->_set_line_transparency("Normal", $this->_current_opacity);
    }

    
    public function circle($Vs4gloy23a1d, $Vopgub02o3q2, $Vflxal01hfm5, $Vexxkxtdr01j, $Vztt3qdrrikx = null, $Vdidzwb0w3vc = null, $V4ljftfdeqplill = false)
    {
        $this->_set_fill_color($Vexxkxtdr01j);
        $this->_set_stroke_color($Vexxkxtdr01j);

        if (!$V4ljftfdeqplill && isset($Vztt3qdrrikx)) {
            $this->_set_line_style($Vztt3qdrrikx, "round", "round", $Vdidzwb0w3vc);
        }

        $this->_pdf->ellipse($Vs4gloy23a1d, $this->y($Vopgub02o3q2), $Vflxal01hfm5, 0, 0, 8, 0, 360, 1, $V4ljftfdeqplill);

        $this->_set_fill_transparency("Normal", $this->_current_opacity);
        $this->_set_line_transparency("Normal", $this->_current_opacity);
    }

    
    public function image($V1bb0p4see5o, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vcp3240dq5y1 = "normal")
    {
        list($Vztt3qdrrikx, $Vjlmjalejjxaeight, $Vxeifmjzikkj) = Helpers::dompdf_getimagesize($V1bb0p4see5o, $this->get_dompdf()->getHttpContext());

        $Vcyg5xmwfpxoebug_png = $this->_dompdf->getOptions()->getDebugPng();

        if ($Vcyg5xmwfpxoebug_png) {
            print "[image:$V1bb0p4see5o|$Vztt3qdrrikx|$Vjlmjalejjxaeight|$Vxeifmjzikkj]";
        }

        switch ($Vxeifmjzikkj) {
            case "jpeg":
                if ($Vcyg5xmwfpxoebug_png) {
                    print '!!!jpg!!!';
                }
                $this->_pdf->addJpegFromFile($V1bb0p4see5o, $Vs4gloy23a1d, $this->y($Vopgub02o3q2) - $Vjlmjalejjxa, $Vhoifq2kocyt, $Vjlmjalejjxa);
                break;

            case "gif":
            
            case "bmp":
                if ($Vcyg5xmwfpxoebug_png) print '!!!bmp or gif!!!';
                
                $V1bb0p4see5o = $this->_convert_gif_bmp_to_png($V1bb0p4see5o, $Vxeifmjzikkj);

            case "png":
                if ($Vcyg5xmwfpxoebug_png) print '!!!png!!!';

                $this->_pdf->addPngFromFile($V1bb0p4see5o, $Vs4gloy23a1d, $this->y($Vopgub02o3q2) - $Vjlmjalejjxa, $Vhoifq2kocyt, $Vjlmjalejjxa);
                break;

            case "svg":
                if ($Vcyg5xmwfpxoebug_png) print '!!!SVG!!!';

                $this->_pdf->addSvgFromFile($V1bb0p4see5o, $Vs4gloy23a1d, $this->y($Vopgub02o3q2) - $Vjlmjalejjxa, $Vhoifq2kocyt, $Vjlmjalejjxa);
                break;

            default:
                if ($Vcyg5xmwfpxoebug_png) print '!!!unknown!!!';
        }
    }

    
    public function text($Vs4gloy23a1d, $Vopgub02o3q2, $Vnlbbd31sxbf, $V4ljftfdeqplont, $Vlak25col1u3, $Vexxkxtdr01j = array(0, 0, 0), $Vhoifq2kocytord_space = 0.0, $Vv03lfntnmczhar_space = 0.0, $Vtmcaiuo2hqy = 0.0)
    {
        $Vsvnz5bsmrgs = $this->_pdf;

        $this->_set_fill_color($Vexxkxtdr01j);

        $V4ljftfdeqplont .= ".afm";
        $Vsvnz5bsmrgs->selectFont($V4ljftfdeqplont);

        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        $Vsvnz5bsmrgs->addText($Vs4gloy23a1d, $this->y($Vopgub02o3q2) - $Vsvnz5bsmrgs->getFontHeight($Vlak25col1u3), $Vlak25col1u3, $Vnlbbd31sxbf, $Vtmcaiuo2hqy, $Vhoifq2kocytord_space, $Vv03lfntnmczhar_space);

        $this->_set_fill_transparency("Normal", $this->_current_opacity);
    }

    
    public function javascript($Vv03lfntnmczode)
    {
        $this->_pdf->addJavascript($Vv03lfntnmczode);
    }

    

    
    public function add_named_dest($Vrr3orqjztc2nchorname)
    {
        $this->_pdf->addDestination($Vrr3orqjztc2nchorname, "Fit");
    }

    
    public function add_link($Vsp0omgzz2yw, $Vs4gloy23a1d, $Vopgub02o3q2, $Vztt3qdrrikx, $Vjlmjalejjxaeight)
    {
        $Vopgub02o3q2 = $this->y($Vopgub02o3q2) - $Vjlmjalejjxaeight;

        if (strpos($Vsp0omgzz2yw, '#') === 0) {
            
            $Vpgf1maodsla = substr($Vsp0omgzz2yw, 1);
            if ($Vpgf1maodsla) {
                $this->_pdf->addInternalLink($Vpgf1maodsla, $Vs4gloy23a1d, $Vopgub02o3q2, $Vs4gloy23a1d + $Vztt3qdrrikx, $Vopgub02o3q2 + $Vjlmjalejjxaeight);
            }
        } else {
            $this->_pdf->addLink(rawurldecode($Vsp0omgzz2yw), $Vs4gloy23a1d, $Vopgub02o3q2, $Vs4gloy23a1d + $Vztt3qdrrikx, $Vopgub02o3q2 + $Vjlmjalejjxaeight);
        }
    }

    
    public function get_text_width($Vnlbbd31sxbf, $V4ljftfdeqplont, $Vlak25col1u3, $Vhoifq2kocytord_spacing = 0, $Vv03lfntnmczhar_spacing = 0)
    {
        $this->_pdf->selectFont($V4ljftfdeqplont);
        return $this->_pdf->getTextWidth($Vlak25col1u3, $Vnlbbd31sxbf, $Vhoifq2kocytord_spacing, $Vv03lfntnmczhar_spacing);
    }

    
    public function register_string_subset($V4ljftfdeqplont, $V5jic1hsgori)
    {
        $this->_pdf->registerText($V4ljftfdeqplont, $V5jic1hsgori);
    }

    
    public function get_font_height($V4ljftfdeqplont, $Vlak25col1u3)
    {
        $this->_pdf->selectFont($V4ljftfdeqplont);

        $V40vhmzfc0aj = $this->_dompdf->getOptions()->getFontHeightRatio();
        return $this->_pdf->getFontHeight($Vlak25col1u3) * $V40vhmzfc0aj;
    }

    

    
    public function get_font_baseline($V4ljftfdeqplont, $Vlak25col1u3)
    {
        $V40vhmzfc0aj = $this->_dompdf->getOptions()->getFontHeightRatio();
        return $this->get_font_height($V4ljftfdeqplont, $Vlak25col1u3) / $V40vhmzfc0aj;
    }

    
    public function page_text($Vs4gloy23a1d, $Vopgub02o3q2, $Vnlbbd31sxbf, $V4ljftfdeqplont, $Vlak25col1u3, $Vexxkxtdr01j = array(0, 0, 0), $Vhoifq2kocytord_space = 0.0, $Vv03lfntnmczhar_space = 0.0, $Vtmcaiuo2hqy = 0.0)
    {
        $Vihwqxu0u5pt = "text";
        $this->_page_text[] = compact("_t", "x", "y", "text", "font", "size", "color", "word_space", "char_space", "angle");
    }

    
    public function page_script($Vv03lfntnmczode, $Vxeifmjzikkj = "text/php")
    {
        $Vihwqxu0u5pt = "script";
        $this->_page_text[] = compact("_t", "code", "type");
    }

    
    public function new_page()
    {
        $this->_page_number++;
        $this->_page_count++;

        $Vc00k54nbbvf = $this->_pdf->newPage();
        $this->_pages[] = $Vc00k54nbbvf;
        return $Vc00k54nbbvf;
    }

    
    protected function _add_page_text()
    {
        if (!count($this->_page_text)) {
            return;
        }

        $Vmxezqy2cq23 = 1;
        $V2bwrjburyufval = null;

        foreach ($this->_pages as $Vxghhuek0lhz) {
            $this->reopen_object($Vxghhuek0lhz);

            foreach ($this->_page_text as $Vxhmkf5fcjgo) {
                extract($Vxhmkf5fcjgo);

                switch ($Vihwqxu0u5pt) {
                    case "text":
                        $Vnlbbd31sxbf = str_replace(array("{PAGE_NUM}", "{PAGE_COUNT}"),
                            array($Vmxezqy2cq23, $this->_page_count), $Vnlbbd31sxbf);
                        $this->text($Vs4gloy23a1d, $Vopgub02o3q2, $Vnlbbd31sxbf, $V4ljftfdeqplont, $Vlak25col1u3, $Vexxkxtdr01j, $Vhoifq2kocytord_space, $Vv03lfntnmczhar_space, $Vtmcaiuo2hqy);
                        break;

                    case "script":
                        if (!$V2bwrjburyufval) {
                            $V2bwrjburyufval = new PhpEvaluator($this);
                        }
                        $V2bwrjburyufval->evaluate($Vv03lfntnmczode, array('PAGE_NUM' => $Vmxezqy2cq23, 'PAGE_COUNT' => $this->_page_count));
                        break;
                }
            }

            $this->close_object();
            $Vmxezqy2cq23++;
        }
    }

    
    public function stream($Vaqmmjdxljsi = "document.pdf", $Vi43cktvy0zi = array())
    {
        if (headers_sent()) {
            die("Unable to stream pdf: headers already sent");
        }

        if (!isset($Vi43cktvy0zi["compress"])) $Vi43cktvy0zi["compress"] = true;
        if (!isset($Vi43cktvy0zi["Attachment"])) $Vi43cktvy0zi["Attachment"] = true;

        $this->_add_page_text();

        $Vcyg5xmwfpxoebug = !$Vi43cktvy0zi['compress'];
        $Vynpm04a4fx0 = ltrim($this->_pdf->output($Vcyg5xmwfpxoebug));

        header("Cache-Control: private");
        header("Content-Type: application/pdf");
        header("Content-Length: " . mb_strlen($Vynpm04a4fx0, "8bit"));

        $Vaqmmjdxljsi = str_replace(array("\n", "'"), "", basename($Vaqmmjdxljsi, ".pdf")) . ".pdf";
        $Vrr3orqjztc2ttachment = $Vi43cktvy0zi["Attachment"] ? "attachment" : "inline";
        header(Helpers::buildContentDispositionHeader($Vrr3orqjztc2ttachment, $Vaqmmjdxljsi));

        echo $Vynpm04a4fx0;
        flush();
    }

    
    public function output($Vi43cktvy0zi = array())
    {
        if (!isset($Vi43cktvy0zi["compress"])) $Vi43cktvy0zi["compress"] = true;

        $this->_add_page_text();

        $Vcyg5xmwfpxoebug = !$Vi43cktvy0zi['compress'];

        return $this->_pdf->output($Vcyg5xmwfpxoebug);
    }

    
    public function get_messages()
    {
        return $this->_pdf->messages;
    }
}
