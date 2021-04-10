<?php


namespace Dompdf\Adapter;

use Dompdf\Canvas;
use Dompdf\Dompdf;
use Dompdf\Helpers;
use Dompdf\Exception;
use Dompdf\Image\Cache;
use Dompdf\PhpEvaluator;


class PDFLib implements Canvas
{

    
    static public $Vjvvabr4mx10 = array(); 

    
    static $V3bljttru41d = true;

    
    private $V3mbiykvshg0;

    
    private $Vn35bvpfo0mv;

    
    private $V1ogsbk2hnd0;

    
    private $Vn1ew5szmvh5;

    
    private $V0mpk4c0jqb4;

    
    private $Vxoppw5hygh3;

    
    private $Vszaqt1bqlba;

    
    private $Vbojzi1sitqp;

    
    private $Vinu02k3jkev;

    
    private $Vv1zuzix23n4;

    
    private $Vhfgcy0c3i4c;

    
    private $V3cmqjzyaugq = array();

    
    private $Vcwhthsojqkt;

    
    private $V0gs0rui431h;

    
    private $V2flazjvlb52;

    
    private $V5u1zcevbgki;

    
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

        $this->_width = $Vlak25col1u3[2] - $Vlak25col1u3[0];
        $this->_height = $Vlak25col1u3[3] - $Vlak25col1u3[1];

        $this->_dompdf = $Vhvghaoacagz;

        $this->_pdf = new \PDFLib();

        $Vn0zs51rjxdm = $Vhvghaoacagz->getOptions()->getPdflibLicense();
        if (strlen($Vn0zs51rjxdm) > 0) {
            $this->_pdf->set_parameter("license", $Vn0zs51rjxdm);
        }

        $this->_pdf->set_parameter("textformat", "utf8");
        $this->_pdf->set_parameter("fontwarning", "false");

        
        $this->_pdf->set_info("Producer Addendum", sprintf("%s + PDFLib", $Vhvghaoacagz->version));

        
        $Vg4ipww3juke = @date_default_timezone_get();
        date_default_timezone_set("UTC");
        $this->_pdf->set_info("Date", date("Y-m-d"));
        date_default_timezone_set($Vg4ipww3juke);

        if (self::$V3bljttru41d) {
            $this->_pdf->begin_document("", "");
        } else {
            $Vwly5twschnk = $this->_dompdf->getOptions()->getTempDir();
            $Vniukaz5mf5i = tempnam($Vwly5twschnk, "libdompdf_pdf_");
            @unlink($Vniukaz5mf5i);
            $this->_file = "$Vniukaz5mf5i.pdf";
            $this->_pdf->begin_document($this->_file, "");
        }

        $this->_pdf->begin_page_ext($this->_width, $this->_height, "");

        $this->_page_number = $this->_page_count = 1;
        $this->_page_text = array();

        $this->_imgs = array();
        $this->_fonts = array();
        $this->_objs = array();
    }

    
    function get_dompdf()
    {
        return $this->_dompdf;
    }

    
    protected function _close()
    {
        $this->_place_objects();

        
        $this->_pdf->suspend_page("");
        for ($Vksopkgqixky = 1; $Vksopkgqixky <= $this->_page_count; $Vksopkgqixky++) {
            $this->_pdf->resume_page("pagenumber=$Vksopkgqixky");
            $this->_pdf->end_page_ext("");
        }

        $this->_pdf->end_document("");
    }


    
    public function get_pdflib()
    {
        return $this->_pdf;
    }

    
    public function add_info($V4qeqspuux02, $Vqfra35f14fv)
    {
        $this->_pdf->set_info($V4qeqspuux02, $Vqfra35f14fv);
    }

    
    public function open_object()
    {
        $this->_pdf->suspend_page("");
        $Vc00k54nbbvf = $this->_pdf->begin_template($this->_width, $this->_height);
        $this->_pdf->save();
        $this->_objs[$Vc00k54nbbvf] = array("start_page" => $this->_page_number);
        return $Vc00k54nbbvf;
    }

    
    public function reopen_object($V55objzzzsbj)
    {
        throw new Exception("PDFLib does not support reopening objects.");
    }

    
    public function close_object()
    {
        $this->_pdf->restore();
        $this->_pdf->end_template();
        $this->_pdf->resume_page("pagenumber=" . $this->_page_number);
    }

    
    public function add_object($V55objzzzsbj, $V4jncaa1nol5 = 'all')
    {

        if (mb_strpos($V4jncaa1nol5, "next") !== false) {
            $this->_objs[$V55objzzzsbj]["start_page"]++;
            $V4jncaa1nol5 = str_replace("next", "", $V4jncaa1nol5);
            if ($V4jncaa1nol5 == "") {
                $V4jncaa1nol5 = "add";
            }
        }

        $this->_objs[$V55objzzzsbj]["where"] = $V4jncaa1nol5;
    }

    
    public function stop_object($V55objzzzsbj)
    {

        if (!isset($this->_objs[$V55objzzzsbj])) {
            return;
        }

        $Vn0xvbhzyr1e = $this->_objs[$V55objzzzsbj]["start_page"];
        $V4jncaa1nol5 = $this->_objs[$V55objzzzsbj]["where"];

        
        if ($this->_page_number >= $Vn0xvbhzyr1e &&
            (($this->_page_number % 2 == 0 && $V4jncaa1nol5 === "even") ||
                ($this->_page_number % 2 == 1 && $V4jncaa1nol5 === "odd") ||
                ($V4jncaa1nol5 === "all"))
        ) {
            $this->_pdf->fit_image($V55objzzzsbj, 0, 0, "");
        }

        $this->_objs[$V55objzzzsbj] = null;
        unset($this->_objs[$V55objzzzsbj]);
    }

    
    protected function _place_objects()
    {

        foreach ($this->_objs as $Vx4b2juat5ap => $Vksopkgqixkyrops) {
            $Vn0xvbhzyr1e = $Vksopkgqixkyrops["start_page"];
            $V4jncaa1nol5 = $Vksopkgqixkyrops["where"];

            
            if ($this->_page_number >= $Vn0xvbhzyr1e &&
                (($this->_page_number % 2 == 0 && $V4jncaa1nol5 === "even") ||
                    ($this->_page_number % 2 == 1 && $V4jncaa1nol5 === "odd") ||
                    ($V4jncaa1nol5 === "all"))
            ) {
                $this->_pdf->fit_image($Vx4b2juat5ap, 0, 0, "");
            }
        }

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
        $this->_page_number = (int)$Vxnixw2qni35;
    }

    
    public function set_page_count($Vj4h4hyymhja)
    {
        $this->_page_count = (int)$Vj4h4hyymhja;
    }

    
    protected function _set_line_style($Vztt3qdrrikx, $Vh3ypkcknmhs, $Vazpuxkzegec, $Vw1lezjmto4p)
    {
        if (count($Vw1lezjmto4p) == 1) {
            $Vw1lezjmto4p[] = $Vw1lezjmto4p[0];
        }

        if (count($Vw1lezjmto4p) > 1) {
            $this->_pdf->setdashpattern("dasharray={" . implode(" ", $Vw1lezjmto4p) . "}");
        } else {
            $this->_pdf->setdash(0, 0);
        }

        switch ($Vazpuxkzegec) {
            case "miter":
                $this->_pdf->setlinejoin(0);
                break;

            case "round":
                $this->_pdf->setlinejoin(1);
                break;

            case "bevel":
                $this->_pdf->setlinejoin(2);
                break;

            default:
                break;
        }

        switch ($Vh3ypkcknmhs) {
            case "butt":
                $this->_pdf->setlinecap(0);
                break;

            case "round":
                $this->_pdf->setlinecap(1);
                break;

            case "square":
                $this->_pdf->setlinecap(2);
                break;

            default:
                break;
        }

        $this->_pdf->setlinewidth($Vztt3qdrrikx);
    }

    
    protected function _set_stroke_color($Vexxkxtdr01j)
    {
        if ($this->_last_stroke_color == $Vexxkxtdr01j) {
            
        }

        $V5352axhr3wt = isset($Vexxkxtdr01j["alpha"]) ? $Vexxkxtdr01j["alpha"] : 1;
        if (isset($this->_current_opacity)) {
            $V5352axhr3wt *= $this->_current_opacity;
        }

        $this->_last_stroke_color = $Vexxkxtdr01j;

        if (isset($Vexxkxtdr01j[3])) {
            $Vxeifmjzikkj = "cmyk";
            list($V4wnkzxrs1fi, $Vkgb4454xhlq, $Vqmyww4cckhz, $Vi4fhmpzq1ca) = array($Vexxkxtdr01j[0], $Vexxkxtdr01j[1], $Vexxkxtdr01j[2], $Vexxkxtdr01j[3]);
        } elseif (isset($Vexxkxtdr01j[2])) {
            $Vxeifmjzikkj = "rgb";
            list($V4wnkzxrs1fi, $Vkgb4454xhlq, $Vqmyww4cckhz, $Vi4fhmpzq1ca) = array($Vexxkxtdr01j[0], $Vexxkxtdr01j[1], $Vexxkxtdr01j[2], null);
        } else {
            $Vxeifmjzikkj = "gray";
            list($V4wnkzxrs1fi, $Vkgb4454xhlq, $Vqmyww4cckhz, $Vi4fhmpzq1ca) = array($Vexxkxtdr01j[0], $Vexxkxtdr01j[1], null, null);
        }

        $this->_set_stroke_opacity($V5352axhr3wt);
        $this->_pdf->setcolor("stroke", $Vxeifmjzikkj, $V4wnkzxrs1fi, $Vkgb4454xhlq, $Vqmyww4cckhz, $Vi4fhmpzq1ca);
    }

    
    protected function _set_fill_color($Vexxkxtdr01j)
    {
        if ($this->_last_fill_color == $Vexxkxtdr01j) {
            return;
        }

        $V5352axhr3wt = isset($Vexxkxtdr01j["alpha"]) ? $Vexxkxtdr01j["alpha"] : 1;
        if (isset($this->_current_opacity)) {
            $V5352axhr3wt *= $this->_current_opacity;
        }

        $this->_last_fill_color = $Vexxkxtdr01j;

        if (isset($Vexxkxtdr01j[3])) {
            $Vxeifmjzikkj = "cmyk";
            list($V4wnkzxrs1fi, $Vkgb4454xhlq, $Vqmyww4cckhz, $Vi4fhmpzq1ca) = array($Vexxkxtdr01j[0], $Vexxkxtdr01j[1], $Vexxkxtdr01j[2], $Vexxkxtdr01j[3]);
        } elseif (isset($Vexxkxtdr01j[2])) {
            $Vxeifmjzikkj = "rgb";
            list($V4wnkzxrs1fi, $Vkgb4454xhlq, $Vqmyww4cckhz, $Vi4fhmpzq1ca) = array($Vexxkxtdr01j[0], $Vexxkxtdr01j[1], $Vexxkxtdr01j[2], null);
        } else {
            $Vxeifmjzikkj = "gray";
            list($V4wnkzxrs1fi, $Vkgb4454xhlq, $Vqmyww4cckhz, $Vi4fhmpzq1ca) = array($Vexxkxtdr01j[0], $Vexxkxtdr01j[1], null, null);
        }

        $this->_set_fill_opacity($V5352axhr3wt);
        $this->_pdf->setcolor("fill", $Vxeifmjzikkj, $V4wnkzxrs1fi, $Vkgb4454xhlq, $Vqmyww4cckhz, $Vi4fhmpzq1ca);
    }

    
    public function _set_fill_opacity($Vdrvff4n2sqc, $Vgauloeyyiwd = "Normal")
    {
        if ($Vgauloeyyiwd === "Normal") {
            $this->_set_gstate("opacityfill=$Vdrvff4n2sqc");
        }
    }

    
    public function _set_stroke_opacity($Vdrvff4n2sqc, $Vgauloeyyiwd = "Normal")
    {
        if ($Vgauloeyyiwd === "Normal") {
            $this->_set_gstate("opacitystroke=$Vdrvff4n2sqc");
        }
    }

    
    public function set_opacity($Vdrvff4n2sqc, $Vgauloeyyiwd = "Normal")
    {
        if ($Vgauloeyyiwd === "Normal") {
            $this->_set_gstate("opacityfill=$Vdrvff4n2sqc opacitystroke=$Vdrvff4n2sqc");
            $this->_current_opacity = $Vdrvff4n2sqc;
        }
    }

    
    public function _set_gstate($Vdn3yzjdgh4b)
    {
        if (($V2pdux31fysm = array_search($Vdn3yzjdgh4b, $this->_gstates)) === false) {
            $V2pdux31fysm = $this->_pdf->create_gstate($Vdn3yzjdgh4b);
            $this->_gstates[$V2pdux31fysm] = $Vdn3yzjdgh4b;
        }
        return $this->_pdf->set_gstate($V2pdux31fysm);
    }

    public function set_default_view($Vl1wquemb3h4, $Vi43cktvy0zi = array())
    {
        
        
        
        
    }

    
    protected function _load_font($V3h4z3hxorxj, $Vgpqcvfkvgzo = null, $Vi43cktvy0zi = "")
    {
        
        if ($this->_pdf->get_parameter("FontOutline", 1) === "") {
            $Vk31cmghwxrd = $this->_dompdf->getFontMetrics()->getFontFamilies();
            foreach ($Vk31cmghwxrd as $Vqfkrq5aty3j) {
                foreach ($Vqfkrq5aty3j as $Vtkhurg4sowd) {
                    $Vk33aizbsumy = basename($Vtkhurg4sowd);
                    $V1xwbch0npf2 = null;

                    
                    if (file_exists("$Vtkhurg4sowd.ttf")) {
                        $Vw0kenlj12gm = "$Vtkhurg4sowd.ttf";

                    } else if (file_exists("$Vtkhurg4sowd.TTF")) {
                        $Vw0kenlj12gm = "$Vtkhurg4sowd.TTF";

                    } else if (file_exists("$Vtkhurg4sowd.pfb")) {
                        $Vw0kenlj12gm = "$Vtkhurg4sowd.pfb";
                        if (file_exists("$Vtkhurg4sowd.afm")) {
                            $V1xwbch0npf2 = "$Vtkhurg4sowd.afm";
                        }

                    } else if (file_exists("$Vtkhurg4sowd.PFB")) {
                        $Vw0kenlj12gm = "$Vtkhurg4sowd.PFB";
                        if (file_exists("$Vtkhurg4sowd.AFM")) {
                            $V1xwbch0npf2 = "$Vtkhurg4sowd.AFM";
                        }
                    } else {
                        continue;
                    }

                    $this->_pdf->set_parameter("FontOutline", "\{$Vk33aizbsumy\}=\{$Vw0kenlj12gm\}");

                    if (!is_null($V1xwbch0npf2)) {
                        $this->_pdf->set_parameter("FontAFM", "\{$Vk33aizbsumy\}=\{$V1xwbch0npf2\}");
                    }
                }
            }
        }

        
        
        $Vfctzupuqpz0 = strtolower(basename($V3h4z3hxorxj));
        if (in_array($Vfctzupuqpz0, DOMPDF::$Vnhrp1uthhyy)) {
            $V3h4z3hxorxj = basename($V3h4z3hxorxj);
        } else {
            
            $Vi43cktvy0zi .= " embedding=true";
        }

        if (is_null($Vgpqcvfkvgzo)) {
            
            
            if (strlen($this->_dompdf->getOptions()->getPdflibLicense()) > 0) {
                $Vgpqcvfkvgzo = "unicode";
            } else {
                $Vgpqcvfkvgzo = "auto";
            }
        }

        $Vqwhzgethmgj = "$V3h4z3hxorxj:$Vgpqcvfkvgzo:$Vi43cktvy0zi";

        if (isset($this->_fonts[$Vqwhzgethmgj])) {
            return $this->_fonts[$Vqwhzgethmgj];
        } else {
            $this->_fonts[$Vqwhzgethmgj] = $this->_pdf->load_font($V3h4z3hxorxj, $Vgpqcvfkvgzo, $Vi43cktvy0zi);
            return $this->_fonts[$Vqwhzgethmgj];
        }
    }

    
    protected function y($Vopgub02o3q2)
    {
        return $this->_height - $Vopgub02o3q2;
    }

    
    public function line($Vjxqwkabkvag, $Vopgub02o3q21, $Vn5yf4urazdd, $Vopgub02o3q22, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vdidzwb0w3vc = null)
    {
        $this->_set_line_style($Vztt3qdrrikx, "butt", "", $Vdidzwb0w3vc);
        $this->_set_stroke_color($Vexxkxtdr01j);

        $Vopgub02o3q21 = $this->y($Vopgub02o3q21);
        $Vopgub02o3q22 = $this->y($Vopgub02o3q22);

        $this->_pdf->moveto($Vjxqwkabkvag, $Vopgub02o3q21);
        $this->_pdf->lineto($Vn5yf4urazdd, $Vopgub02o3q22);
        $this->_pdf->stroke();

        $this->_set_line_transparency("Normal", $this->_current_opacity);
    }

    
    public function arc($Vjxqwkabkvag, $Vopgub02o3q21, $Vflxal01hfm5, $Vmsjiwqai3ku, $V0kev1i0iwnh, $Vc0idajbamqg, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vdidzwb0w3vc = array())
    {
        $this->_set_line_style($Vztt3qdrrikx, "butt", "", $Vdidzwb0w3vc);
        $this->_set_stroke_color($Vexxkxtdr01j);

        $Vopgub02o3q21 = $this->y($Vopgub02o3q21);

        $this->_pdf->arc($Vjxqwkabkvag, $Vopgub02o3q21, $Vflxal01hfm5, $V0kev1i0iwnh, $Vc0idajbamqg);
        $this->_pdf->stroke();

        $this->_set_line_transparency("Normal", $this->_current_opacity);
    }

    
    public function rectangle($Vjxqwkabkvag, $Vopgub02o3q21, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vdidzwb0w3vc = null)
    {
        $this->_set_stroke_color($Vexxkxtdr01j);
        $this->_set_line_style($Vztt3qdrrikx, "butt", "", $Vdidzwb0w3vc);

        $Vopgub02o3q21 = $this->y($Vopgub02o3q21) - $Vjlmjalejjxa;

        $this->_pdf->rect($Vjxqwkabkvag, $Vopgub02o3q21, $Vhoifq2kocyt, $Vjlmjalejjxa);
        $this->_pdf->stroke();

        $this->_set_line_transparency("Normal", $this->_current_opacity);
    }

    
    public function filled_rectangle($Vjxqwkabkvag, $Vopgub02o3q21, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vexxkxtdr01j)
    {
        $this->_set_fill_color($Vexxkxtdr01j);

        $Vopgub02o3q21 = $this->y($Vopgub02o3q21) - $Vjlmjalejjxa;

        $this->_pdf->rect(floatval($Vjxqwkabkvag), floatval($Vopgub02o3q21), floatval($Vhoifq2kocyt), floatval($Vjlmjalejjxa));
        $this->_pdf->fill();

        $this->_set_fill_transparency("Normal", $this->_current_opacity);
    }

    
    public function clipping_rectangle($Vjxqwkabkvag, $Vopgub02o3q21, $Vhoifq2kocyt, $Vjlmjalejjxa)
    {
        $this->_pdf->save();

        $Vopgub02o3q21 = $this->y($Vopgub02o3q21) - $Vjlmjalejjxa;

        $this->_pdf->rect(floatval($Vjxqwkabkvag), floatval($Vopgub02o3q21), floatval($Vhoifq2kocyt), floatval($Vjlmjalejjxa));
        $this->_pdf->clip();
    }

    
    public function clipping_roundrectangle($Vjxqwkabkvag, $Vopgub02o3q21, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vhsnbs0gwraw, $Voxjadvbzbkb, $Vpzh1agu5pge, $Vlbh2hh1w1uq)
    {
        
        $this->clipping_rectangle($Vjxqwkabkvag, $Vopgub02o3q21, $Vhoifq2kocyt, $Vjlmjalejjxa);
    }

    
    public function clipping_end()
    {
        $this->_pdf->restore();
    }

    
    public function save()
    {
        $this->_pdf->save();
    }

    function restore()
    {
        $this->_pdf->restore();
    }

    
    public function rotate($Vtmcaiuo2hqy, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        $Vksopkgqixkydf = $this->_pdf;
        $Vksopkgqixkydf->translate($Vs4gloy23a1d, $this->_height - $Vopgub02o3q2);
        $Vksopkgqixkydf->rotate(-$Vtmcaiuo2hqy);
        $Vksopkgqixkydf->translate(-$Vs4gloy23a1d, -$this->_height + $Vopgub02o3q2);
    }

    
    public function skew($Vtmcaiuo2hqy_x, $Vtmcaiuo2hqy_y, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        $Vksopkgqixkydf = $this->_pdf;
        $Vksopkgqixkydf->translate($Vs4gloy23a1d, $this->_height - $Vopgub02o3q2);
        $Vksopkgqixkydf->skew($Vtmcaiuo2hqy_y, $Vtmcaiuo2hqy_x); 
        $Vksopkgqixkydf->translate(-$Vs4gloy23a1d, -$this->_height + $Vopgub02o3q2);
    }

    
    public function scale($Vvyyy23v5fb4, $V2fb2ve5h53x, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        $Vksopkgqixkydf = $this->_pdf;
        $Vksopkgqixkydf->translate($Vs4gloy23a1d, $this->_height - $Vopgub02o3q2);
        $Vksopkgqixkydf->scale($Vvyyy23v5fb4, $V2fb2ve5h53x);
        $Vksopkgqixkydf->translate(-$Vs4gloy23a1d, -$this->_height + $Vopgub02o3q2);
    }

    
    public function translate($Vidim0y0ouos, $Vycw3amdlttj)
    {
        $this->_pdf->translate($Vidim0y0ouos, -$Vycw3amdlttj);
    }

    
    public function transform($Vrr3orqjztc2, $Vbz3vmbr1h2v, $Vv03lfntnmcz, $Vcyg5xmwfpxo, $V2bwrjburyuf, $V4ljftfdeqpl)
    {
        $this->_pdf->concat($Vrr3orqjztc2, $Vbz3vmbr1h2v, $Vv03lfntnmcz, $Vcyg5xmwfpxo, $V2bwrjburyuf, $V4ljftfdeqpl);
    }

    
    public function polygon($Vksopkgqixkyoints, $Vexxkxtdr01j, $Vztt3qdrrikx = null, $Vdidzwb0w3vc = null, $V4ljftfdeqplill = false)
    {
        $this->_set_fill_color($Vexxkxtdr01j);
        $this->_set_stroke_color($Vexxkxtdr01j);

        if (!$V4ljftfdeqplill && isset($Vztt3qdrrikx)) {
            $this->_set_line_style($Vztt3qdrrikx, "square", "miter", $Vdidzwb0w3vc);
        }

        $Vopgub02o3q2 = $this->y(array_pop($Vksopkgqixkyoints));
        $Vs4gloy23a1d = array_pop($Vksopkgqixkyoints);
        $this->_pdf->moveto($Vs4gloy23a1d, $Vopgub02o3q2);

        while (count($Vksopkgqixkyoints) > 1) {
            $Vopgub02o3q2 = $this->y(array_pop($Vksopkgqixkyoints));
            $Vs4gloy23a1d = array_pop($Vksopkgqixkyoints);
            $this->_pdf->lineto($Vs4gloy23a1d, $Vopgub02o3q2);
        }

        if ($V4ljftfdeqplill) {
            $this->_pdf->fill();
        } else {
            $this->_pdf->closepath_stroke();
        }

        $this->_set_fill_transparency("Normal", $this->_current_opacity);
        $this->_set_line_transparency("Normal", $this->_current_opacity);
    }

    
    public function circle($Vs4gloy23a1d, $Vopgub02o3q2, $Vkabkv5ip0kg, $Vexxkxtdr01j, $Vztt3qdrrikx = null, $Vdidzwb0w3vc = null, $V4ljftfdeqplill = false)
    {
        $this->_set_fill_color($Vexxkxtdr01j);
        $this->_set_stroke_color($Vexxkxtdr01j);

        if (!$V4ljftfdeqplill && isset($Vztt3qdrrikx)) {
            $this->_set_line_style($Vztt3qdrrikx, "round", "round", $Vdidzwb0w3vc);
        }

        $Vopgub02o3q2 = $this->y($Vopgub02o3q2);

        $this->_pdf->circle($Vs4gloy23a1d, $Vopgub02o3q2, $Vkabkv5ip0kg);

        if ($V4ljftfdeqplill) {
            $this->_pdf->fill();
        } else {
            $this->_pdf->stroke();
        }

        $this->_set_fill_transparency("Normal", $this->_current_opacity);
        $this->_set_line_transparency("Normal", $this->_current_opacity);
    }

    
    public function image($Vy4aoqvldpc0, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vkabkv5ip0kgesolution = "normal")
    {
        $Vhoifq2kocyt = (int)$Vhoifq2kocyt;
        $Vjlmjalejjxa = (int)$Vjlmjalejjxa;

        $Vuvnpxhyrroo = Cache::detect_type($Vy4aoqvldpc0, $this->get_dompdf()->getHttpContext());

        if (!isset($this->_imgs[$Vy4aoqvldpc0])) {
            $this->_imgs[$Vy4aoqvldpc0] = $this->_pdf->load_image($Vuvnpxhyrroo, $Vy4aoqvldpc0, "");
        }

        $V1bb0p4see5o = $this->_imgs[$Vy4aoqvldpc0];

        $Vopgub02o3q2 = $this->y($Vopgub02o3q2) - $Vjlmjalejjxa;
        $this->_pdf->fit_image($V1bb0p4see5o, $Vs4gloy23a1d, $Vopgub02o3q2, 'boxsize={' . "$Vhoifq2kocyt $Vjlmjalejjxa" . '} fitmethod=entire');
    }

    
    public function text($Vs4gloy23a1d, $Vopgub02o3q2, $Vnlbbd31sxbf, $V3h4z3hxorxj, $Vlak25col1u3, $Vexxkxtdr01j = array(0, 0, 0), $Vhoifq2kocytord_spacing = 0, $Vv03lfntnmczhar_spacing = 0, $Vtmcaiuo2hqy = 0)
    {
        $V4ljftfdeqplh = $this->_load_font($V3h4z3hxorxj);

        $this->_pdf->setfont($V4ljftfdeqplh, $Vlak25col1u3);
        $this->_set_fill_color($Vexxkxtdr01j);

        $Vopgub02o3q2 = $this->y($Vopgub02o3q2) - $this->get_font_height($V3h4z3hxorxj, $Vlak25col1u3);

        $Vhoifq2kocytord_spacing = (float)$Vhoifq2kocytord_spacing;
        $Vv03lfntnmczhar_spacing = (float)$Vv03lfntnmczhar_spacing;
        $Vtmcaiuo2hqy = -(float)$Vtmcaiuo2hqy;

        $this->_pdf->fit_textline($Vnlbbd31sxbf, $Vs4gloy23a1d, $Vopgub02o3q2, "rotate=$Vtmcaiuo2hqy wordspacing=$Vhoifq2kocytord_spacing charspacing=$Vv03lfntnmczhar_spacing ");

        $this->_set_fill_transparency("Normal", $this->_current_opacity);
    }

    
    public function javascript($Vv03lfntnmczode)
    {
        if (strlen($this->_dompdf->getOptions()->getPdflibLicense()) > 0) {
            $this->_pdf->create_action("JavaScript", $Vv03lfntnmczode);
        }
    }

    
    public function add_named_dest($Vrr3orqjztc2nchorname)
    {
        $this->_pdf->add_nameddest($Vrr3orqjztc2nchorname, "");
    }

    
    public function add_link($Vsp0omgzz2yw, $Vs4gloy23a1d, $Vopgub02o3q2, $Vztt3qdrrikx, $Vjlmjalejjxaeight)
    {
        $Vopgub02o3q2 = $this->y($Vopgub02o3q2) - $Vjlmjalejjxaeight;
        if (strpos($Vsp0omgzz2yw, '#') === 0) {
            
            $Vpgf1maodsla = substr($Vsp0omgzz2yw, 1);
            if ($Vpgf1maodsla) {
                $this->_pdf->create_annotation($Vs4gloy23a1d, $Vopgub02o3q2, $Vs4gloy23a1d + $Vztt3qdrrikx, $Vopgub02o3q2 + $Vjlmjalejjxaeight, 'Link',
                    "contents={$Vsp0omgzz2yw} destname=" . substr($Vsp0omgzz2yw, 1) . " linewidth=0");
            }
        } else {
            list($Vksopkgqixkyroto, $Vjlmjalejjxaost, $Vksopkgqixkyath, $Vtkhurg4sowd) = Helpers::explode_url($Vsp0omgzz2yw);

            if ($Vksopkgqixkyroto == "" || $Vksopkgqixkyroto === "file://") {
                return; 
            }
            $Vsp0omgzz2yw = Helpers::build_url($Vksopkgqixkyroto, $Vjlmjalejjxaost, $Vksopkgqixkyath, $Vtkhurg4sowd);
            $Vsp0omgzz2yw = '{' . rawurldecode($Vsp0omgzz2yw) . '}';

            $Vrr3orqjztc2ction = $this->_pdf->create_action("URI", "url=" . $Vsp0omgzz2yw);
            $this->_pdf->create_annotation($Vs4gloy23a1d, $Vopgub02o3q2, $Vs4gloy23a1d + $Vztt3qdrrikx, $Vopgub02o3q2 + $Vjlmjalejjxaeight, 'Link', "contents={$Vsp0omgzz2yw} action={activate=$Vrr3orqjztc2ction} linewidth=0");
        }
    }

    
    public function get_text_width($Vnlbbd31sxbf, $V3h4z3hxorxj, $Vlak25col1u3, $Vhoifq2kocytord_spacing = 0, $V2qtxz0v0fsf = 0)
    {
        $V4ljftfdeqplh = $this->_load_font($V3h4z3hxorxj);

        
        $Vxnixw2qni35_spaces = mb_substr_count($Vnlbbd31sxbf, " ");
        $Vcyg5xmwfpxoelta = $Vhoifq2kocytord_spacing * $Vxnixw2qni35_spaces;

        if ($V2qtxz0v0fsf) {
            $Vxnixw2qni35_chars = mb_strlen($Vnlbbd31sxbf);
            $Vcyg5xmwfpxoelta += ($Vxnixw2qni35_chars - $Vxnixw2qni35_spaces) * $V2qtxz0v0fsf;
        }

        return $this->_pdf->stringwidth($Vnlbbd31sxbf, $V4ljftfdeqplh, $Vlak25col1u3) + $Vcyg5xmwfpxoelta;
    }

    
    public function get_font_height($V3h4z3hxorxj, $Vlak25col1u3)
    {
        $V4ljftfdeqplh = $this->_load_font($V3h4z3hxorxj);

        $this->_pdf->setfont($V4ljftfdeqplh, $Vlak25col1u3);

        $Vrr3orqjztc2sc = $this->_pdf->get_value("ascender", $V4ljftfdeqplh);
        $Vcyg5xmwfpxoesc = $this->_pdf->get_value("descender", $V4ljftfdeqplh);

        
        $Vkabkv5ip0kgatio = $this->_dompdf->getOptions()->getFontHeightRatio();
        return $Vlak25col1u3 * ($Vrr3orqjztc2sc - $Vcyg5xmwfpxoesc) * $Vkabkv5ip0kgatio;
    }

    
    public function get_font_baseline($V3h4z3hxorxj, $Vlak25col1u3)
    {
        $Vkabkv5ip0kgatio = $this->_dompdf->getOptions()->getFontHeightRatio();
        return $this->get_font_height($V3h4z3hxorxj, $Vlak25col1u3) / $Vkabkv5ip0kgatio * 1.1;
    }

    
    public function page_text($Vs4gloy23a1d, $Vopgub02o3q2, $Vnlbbd31sxbf, $V3h4z3hxorxj, $Vlak25col1u3, $Vexxkxtdr01j = array(0, 0, 0), $Vhoifq2kocytord_space = 0.0, $Vv03lfntnmczhar_space = 0.0, $Vtmcaiuo2hqy = 0.0)
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
        
        $this->_place_objects();

        $this->_pdf->suspend_page("");
        $this->_pdf->begin_page_ext($this->_width, $this->_height, "");
        $this->_page_number = ++$this->_page_count;
    }

    
    protected function _add_page_text()
    {
        if (!count($this->_page_text)) {
            return;
        }

        $V2bwrjburyufval = null;
        $this->_pdf->suspend_page("");

        for ($Vksopkgqixky = 1; $Vksopkgqixky <= $this->_page_count; $Vksopkgqixky++) {
            $this->_pdf->resume_page("pagenumber=$Vksopkgqixky");

            foreach ($this->_page_text as $Vksopkgqixkyt) {
                extract($Vksopkgqixkyt);

                switch ($Vihwqxu0u5pt) {
                    case "text":
                        $Vnlbbd31sxbf = str_replace(array("{PAGE_NUM}", "{PAGE_COUNT}"),
                            array($Vksopkgqixky, $this->_page_count), $Vnlbbd31sxbf);
                        $this->text($Vs4gloy23a1d, $Vopgub02o3q2, $Vnlbbd31sxbf, $V3h4z3hxorxj, $Vlak25col1u3, $Vexxkxtdr01j, $Vhoifq2kocytord_space, $Vv03lfntnmczhar_space, $Vtmcaiuo2hqy);
                        break;

                    case "script":
                        if (!$V2bwrjburyufval) {
                            $V2bwrjburyufval = new PHPEvaluator($this);
                        }
                        $V2bwrjburyufval->evaluate($Vv03lfntnmczode, array('PAGE_NUM' => $Vksopkgqixky, 'PAGE_COUNT' => $this->_page_count));
                        break;
                }
            }

            $this->_pdf->suspend_page("");
        }

        $this->_pdf->resume_page("pagenumber=" . $this->_page_number);
    }

    
    public function stream($Vtkhurg4sowdname = "document.pdf", $Vi43cktvy0zi = array())
    {
        if (headers_sent()) {
            die("Unable to stream pdf: headers already sent");
        }

        if (!isset($Vi43cktvy0zi["compress"])) $Vi43cktvy0zi["compress"] = true;
        if (!isset($Vi43cktvy0zi["Attachment"])) $Vi43cktvy0zi["Attachment"] = true;

        $this->_add_page_text();

        if ($Vi43cktvy0zi["compress"]) {
            $this->_pdf->set_value("compress", 6);
        } else {
            $this->_pdf->set_value("compress", 0);
        }

        $this->_close();

        $Vcyg5xmwfpxoata = "";

        if (self::$V3bljttru41d) {
            $Vcyg5xmwfpxoata = $this->_pdf->get_buffer();
            $Vlak25col1u3 = mb_strlen($Vcyg5xmwfpxoata, "8bit");
        } else {
            $Vlak25col1u3 = filesize($this->_file);
        }

        header("Cache-Control: private");
        header("Content-Type: application/pdf");
        header("Content-Length: " . $Vlak25col1u3);

        $Vtkhurg4sowdname = str_replace(array("\n", "'"), "", basename($Vtkhurg4sowdname, ".pdf")) . ".pdf";
        $Vrr3orqjztc2ttachment = $Vi43cktvy0zi["Attachment"] ? "attachment" : "inline";
        header(Helpers::buildContentDispositionHeader($Vrr3orqjztc2ttachment, $Vtkhurg4sowdname));

        if (self::$V3bljttru41d) {
            echo $Vcyg5xmwfpxoata;
        } else {
            
            $Vv03lfntnmczhunk = (1 << 21); 
            $V4ljftfdeqplh = fopen($this->_file, "rb");
            if (!$V4ljftfdeqplh) {
                throw new Exception("Unable to load temporary PDF file: " . $this->_file);
            }

            while (!feof($V4ljftfdeqplh)) {
                echo fread($V4ljftfdeqplh, $Vv03lfntnmczhunk);
            }
            fclose($V4ljftfdeqplh);

            
            if ($this->_dompdf->getOptions()->getDebugPng()) {
                print '[pdflib stream unlink ' . $this->_file . ']';
            }
            if (!$this->_dompdf->getOptions()->getDebugKeepTemp()) {
                unlink($this->_file);
            }
            $this->_file = null;
            unset($this->_file);
        }

        flush();
    }

    
    public function output($Vi43cktvy0zi = array())
    {
        if (!isset($Vi43cktvy0zi["compress"])) $Vi43cktvy0zi["compress"] = true;

        $this->_add_page_text();

        if ($Vi43cktvy0zi["compress"]) {
            $this->_pdf->set_value("compress", 6);
        } else {
            $this->_pdf->set_value("compress", 0);
        }

        $this->_close();

        if (self::$V3bljttru41d) {
            $Vcyg5xmwfpxoata = $this->_pdf->get_buffer();
        } else {
            $Vcyg5xmwfpxoata = file_get_contents($this->_file);

            
            if ($this->_dompdf->getOptions()->getDebugPng()) {
                print '[pdflib output unlink ' . $this->_file . ']';
            }
            if (!$this->_dompdf->getOptions()->getDebugKeepTemp()) {
                unlink($this->_file);
            }
            $this->_file = null;
            unset($this->_file);
        }

        return $Vcyg5xmwfpxoata;
    }
}


PDFLib::$Vjvvabr4mx10 = CPDF::$Vjvvabr4mx10;
