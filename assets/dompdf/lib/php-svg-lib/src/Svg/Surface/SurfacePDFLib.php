<?php


namespace Svg\Surface;

use Svg\Style;
use Svg\Document;

class SurfacePDFLib implements SurfaceInterface
{
    const DEBUG = false;

    private $Vvzurwoc24em;

    private $Vztt3qdrrikx;
    private $Vku40chc0ddp;

    
    private $Vdidzwb0w3vc;

    public function __construct(Document $V4qtyvi2vak4, $Vvzurwoc24em = null)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";

        $Vzfvldvlrsd3 = $V4qtyvi2vak4->getDimensions();
        $Vhoifq2kocyt = $Vzfvldvlrsd3["width"];
        $Vjlmjalejjxa = $Vzfvldvlrsd3["height"];

        if (!$Vvzurwoc24em) {
            $Vvzurwoc24em = new \PDFlib();

            
            $Vvzurwoc24em->set_option("stringformat=utf8");
            $Vvzurwoc24em->set_option("errorpolicy=return");

            
            if ($Vvzurwoc24em->begin_document("", "") == 0) {
                die("Error: " . $Vvzurwoc24em->get_errmsg());
            }
            $Vvzurwoc24em->set_info("Creator", "PDFlib starter sample");
            $Vvzurwoc24em->set_info("Title", "starter_graphics");

            $Vvzurwoc24em->begin_page_ext($Vhoifq2kocyt, $Vjlmjalejjxa, "");
        }

        
        
        $Vvzurwoc24em->setmatrix(
            1, 0,
            0, -1,
            0, $Vjlmjalejjxa
        );

        $this->width  = $Vhoifq2kocyt;
        $this->height = $Vjlmjalejjxa;

        $this->canvas = $Vvzurwoc24em;
    }

    function out()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";

        $this->canvas->end_page_ext("");
        $this->canvas->end_document("");

        return $this->canvas->get_buffer();
    }

    public function save()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->save();
    }

    public function restore()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->restore();
    }

    public function scale($Vs4gloy23a1d, $Vopgub02o3q2)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->scale($Vs4gloy23a1d, $Vopgub02o3q2);
    }

    public function rotate($Vtmcaiuo2hqy)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->rotate($Vtmcaiuo2hqy);
    }

    public function translate($Vs4gloy23a1d, $Vopgub02o3q2)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->translate($Vs4gloy23a1d, $Vopgub02o3q2);
    }

    public function transform($Vrr3orqjztc2, $Vbz3vmbr1h2v, $Vv03lfntnmcz, $Vcyg5xmwfpxo, $V2bwrjburyuf, $V4ljftfdeqpl)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->concat($Vrr3orqjztc2, $Vbz3vmbr1h2v, $Vv03lfntnmcz, $Vcyg5xmwfpxo, $V2bwrjburyuf, $V4ljftfdeqpl);
    }

    public function beginPath()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        
    }

    public function closePath()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->closepath();
    }

    public function fillStroke()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->fill_stroke();
    }

    public function clip()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->clip();
    }

    public function fillText($Vnlbbd31sxbf, $Vs4gloy23a1d, $Vopgub02o3q2, $Vv44wp1i5zfs = null)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->set_text_pos($Vs4gloy23a1d, $Vopgub02o3q2);
        $this->canvas->show($Vnlbbd31sxbf);
    }

    public function strokeText($Vnlbbd31sxbf, $Vs4gloy23a1d, $Vopgub02o3q2, $Vv44wp1i5zfs = null)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        
    }

    public function drawImage($Vnxkvrc5q2ng, $Vjz2piyfb2ut, $Vskekw1ijrky, $Vwuismxitwwp = null, $Vdsvjjxxrru4 = null, $Vcyg5xmwfpxox = null, $Vcyg5xmwfpxoy = null, $Vcyg5xmwfpxow = null, $Vcyg5xmwfpxoh = null)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";

        if (strpos($Vnxkvrc5q2ng, "data:") === 0) {
            $Vcyg5xmwfpxoata = substr($Vnxkvrc5q2ng, strpos($Vnxkvrc5q2ng, ";") + 1);
            if (strpos($Vcyg5xmwfpxoata, "base64") === 0) {
                $Vcyg5xmwfpxoata = base64_decode(substr($Vcyg5xmwfpxoata, 7));
            }
        }
        else {
            $Vcyg5xmwfpxoata = file_get_contents($Vnxkvrc5q2ng);
        }

        $Vnxkvrc5q2ng = tempnam("", "svg");
        file_put_contents($Vnxkvrc5q2ng, $Vcyg5xmwfpxoata);

        $V1bb0p4see5o = $this->canvas->load_image("auto", $Vnxkvrc5q2ng, "");

        $Vskekw1ijrky = $Vskekw1ijrky - $Vdsvjjxxrru4;
        $this->canvas->fit_image($V1bb0p4see5o, $Vjz2piyfb2ut, $Vskekw1ijrky, 'boxsize={' . "$Vwuismxitwwp $Vdsvjjxxrru4" . '} fitmethod=entire');

        unlink($Vnxkvrc5q2ng);
    }

    public function lineTo($Vs4gloy23a1d, $Vopgub02o3q2)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->lineto($Vs4gloy23a1d, $Vopgub02o3q2);
    }

    public function moveTo($Vs4gloy23a1d, $Vopgub02o3q2)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->moveto($Vs4gloy23a1d, $Vopgub02o3q2);
    }

    public function quadraticCurveTo($Vv03lfntnmczpx, $Vv03lfntnmczpy, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";

        
        $this->canvas->curveTo($Vv03lfntnmczpx, $Vv03lfntnmczpy, $Vv03lfntnmczpx, $Vv03lfntnmczpy, $Vs4gloy23a1d, $Vopgub02o3q2);
    }

    public function bezierCurveTo($Vv03lfntnmczp1x, $Vv03lfntnmczp1y, $Vv03lfntnmczp2x, $Vv03lfntnmczp2y, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->curveto($Vv03lfntnmczp1x, $Vv03lfntnmczp1y, $Vv03lfntnmczp2x, $Vv03lfntnmczp2y, $Vs4gloy23a1d, $Vopgub02o3q2);
    }

    public function arcTo($Vs4gloy23a1d1, $Vopgub02o3q21, $Vs4gloy23a1d2, $Vopgub02o3q22, $V4tsg1pc0dnr)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
    }

    public function arc($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnr, $Vk21laijil03, $V2bwrjburyufndAngle, $Vrr3orqjztc2nticlockwise = false)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->arc($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnr, $Vk21laijil03, $V2bwrjburyufndAngle);
    }

    public function circle($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnr)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->circle($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnr);
    }

    public function ellipse($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnrX, $V4tsg1pc0dnrY, $Vodyfhojz44d, $Vk21laijil03, $V2bwrjburyufndAngle, $Vrr3orqjztc2nticlockwise)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->ellipse($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnrX, $V4tsg1pc0dnrY);
    }

    public function fillRect($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->rect($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa);
        $this->fill();
    }

    public function rect($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vvyapc0zfcyf = 0, $Vzvzlsqbnl5g = 0)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";

        $Vvzurwoc24em = $this->canvas;

        if ($Vvyapc0zfcyf <= 0.000001) {
            $Vvzurwoc24em->rect($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa);

            return;
        }

        
        $Vvzurwoc24em->moveto($Vs4gloy23a1d + $Vvyapc0zfcyf, $Vopgub02o3q2);

        
        $Vvzurwoc24em->lineto($Vs4gloy23a1d + $Vhoifq2kocyt - $Vvyapc0zfcyf, $Vopgub02o3q2);

        
        $Vvzurwoc24em->arc($Vs4gloy23a1d + $Vhoifq2kocyt - $Vvyapc0zfcyf, $Vopgub02o3q2 + $Vvyapc0zfcyf, $Vvyapc0zfcyf, 270, 360);

        
        $Vvzurwoc24em->lineto($Vs4gloy23a1d + $Vhoifq2kocyt, $Vopgub02o3q2 + $Vjlmjalejjxa - $Vvyapc0zfcyf );

        
        $Vvzurwoc24em->arc($Vs4gloy23a1d + $Vhoifq2kocyt - $Vvyapc0zfcyf, $Vopgub02o3q2 + $Vjlmjalejjxa - $Vvyapc0zfcyf, $Vvyapc0zfcyf, 0, 90);

        
        $Vvzurwoc24em->lineto($Vs4gloy23a1d + $Vvyapc0zfcyf, $Vopgub02o3q2 + $Vjlmjalejjxa);

        
        $Vvzurwoc24em->arc($Vs4gloy23a1d + $Vvyapc0zfcyf, $Vopgub02o3q2 + $Vjlmjalejjxa - $Vvyapc0zfcyf, $Vvyapc0zfcyf, 90, 180);

        
        $Vvzurwoc24em->lineto($Vs4gloy23a1d , $Vopgub02o3q2 + $Vvyapc0zfcyf);

        
        $Vvzurwoc24em->arc($Vs4gloy23a1d + $Vvyapc0zfcyf, $Vopgub02o3q2 + $Vvyapc0zfcyf, $Vvyapc0zfcyf, 180, 270);
    }

    public function fill()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->fill();
    }

    public function strokeRect($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->rect($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa);
        $this->stroke();
    }

    public function stroke()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->stroke();
    }

    public function endPath()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->endPath();
    }

    public function measureText($Vnlbbd31sxbf)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $Vdidzwb0w3vc = $this->getStyle();
        $V4ljftfdeqplont = $this->getFont($Vdidzwb0w3vc->fontFamily, $Vdidzwb0w3vc->fontStyle);

        return $this->canvas->stringwidth($Vnlbbd31sxbf, $V4ljftfdeqplont, $this->getStyle()->fontSize);
    }

    public function getStyle()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        return $this->style;
    }

    public function setStyle(Style $Vdidzwb0w3vc)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";

        $this->style = $Vdidzwb0w3vc;
        $Vvzurwoc24em = $this->canvas;

        if ($Vihuafvzvxcv = $Vdidzwb0w3vc->stroke && is_array($Vdidzwb0w3vc->stroke)) {
            $Vvzurwoc24em->setcolor(
                "stroke",
                "rgb",
                $Vihuafvzvxcv[0] / 255,
                $Vihuafvzvxcv[1] / 255,
                $Vihuafvzvxcv[2] / 255,
                null
            );
        }

        if ($V4ljftfdeqplill = $Vdidzwb0w3vc->fill && is_array($Vdidzwb0w3vc->fill)) {
            $Vvzurwoc24em->setcolor(
                "fill",
                "rgb",
                $V4ljftfdeqplill[0] / 255,
                $V4ljftfdeqplill[1] / 255,
                $V4ljftfdeqplill[2] / 255,
                null
            );
        }

        if ($V4ljftfdeqplillRule = strtolower($Vdidzwb0w3vc->fillRule)) {
            $V02cy3ehfkm0 = array(
                "nonzero" => "winding",
                "evenodd" => "evenodd",
            );

            if (isset($V02cy3ehfkm0[$V4ljftfdeqplillRule])) {
                $V4ljftfdeqplillRule = $V02cy3ehfkm0[$V4ljftfdeqplillRule];

                $Vvzurwoc24em->set_parameter("fillrule", $V4ljftfdeqplillRule);
            }
        }

        $Vkt1wc3b1trn = array();
        if ($Vdidzwb0w3vc->strokeWidth > 0.000001) {
            $Vkt1wc3b1trn[] = "linewidth=$Vdidzwb0w3vc->strokeWidth";
        }

        if (in_array($Vdidzwb0w3vc->strokeLinecap, array("butt", "round", "projecting"))) {
            $Vkt1wc3b1trn[] = "linecap=$Vdidzwb0w3vc->strokeLinecap";
        }

        if (in_array($Vdidzwb0w3vc->strokeLinejoin, array("miter", "round", "bevel"))) {
            $Vkt1wc3b1trn[] = "linejoin=$Vdidzwb0w3vc->strokeLinejoin";
        }

        $Vvzurwoc24em->set_graphics_option(implode(" ", $Vkt1wc3b1trn));

        $Vkt1wc3b1trn = array();
        $Vdrvff4n2sqc = $Vdidzwb0w3vc->opacity;
        if ($Vdrvff4n2sqc !== null && $Vdrvff4n2sqc < 1.0) {
            $Vkt1wc3b1trn[] = "opacityfill=$Vdrvff4n2sqc";
            $Vkt1wc3b1trn[] = "opacitystroke=$Vdrvff4n2sqc";
        }
        else {
            $V4ljftfdeqplillOpacity = $Vdidzwb0w3vc->fillOpacity;
            if ($V4ljftfdeqplillOpacity !== null && $V4ljftfdeqplillOpacity < 1.0) {
                $Vkt1wc3b1trn[] = "opacityfill=$V4ljftfdeqplillOpacity";
            }

            $VihuafvzvxcvOpacity = $Vdidzwb0w3vc->strokeOpacity;
            if ($VihuafvzvxcvOpacity !== null && $VihuafvzvxcvOpacity < 1.0) {
                $Vkt1wc3b1trn[] = "opacitystroke=$VihuafvzvxcvOpacity";
            }
        }

        if (count($Vkt1wc3b1trn)) {
            $Vwen52rn5t1t = $Vvzurwoc24em->create_gstate(implode(" ", $Vkt1wc3b1trn));
            $Vvzurwoc24em->set_gstate($Vwen52rn5t1t);
        }

        $V4ljftfdeqplont = $this->getFont($Vdidzwb0w3vc->fontFamily, $Vdidzwb0w3vc->fontStyle);
        if ($V4ljftfdeqplont) {
            $Vvzurwoc24em->setfont($V4ljftfdeqplont, $Vdidzwb0w3vc->fontSize);
        }
    }

    private function getFont($V4ljftfdeqplamily, $Vdidzwb0w3vc)
    {
        $V02cy3ehfkm0 = array(
            "serif"      => "Times",
            "sans-serif" => "Helvetica",
            "fantasy"    => "Symbol",
            "cursive"    => "Times",
            "monospace"  => "Courier",

            "arial"      => "Helvetica",
            "verdana"    => "Helvetica",
        );

        $V4ljftfdeqplamily = strtolower($V4ljftfdeqplamily);
        if (isset($V02cy3ehfkm0[$V4ljftfdeqplamily])) {
            $V4ljftfdeqplamily = $V02cy3ehfkm0[$V4ljftfdeqplamily];
        }

        return $this->canvas->load_font($V4ljftfdeqplamily, "unicode", "fontstyle=$Vdidzwb0w3vc");
    }

    public function setFont($V4ljftfdeqplamily, $Vdidzwb0w3vc, $Vhoifq2kocyteight)
    {
        
    }
}
