<?php


namespace Svg\Surface;

use Svg\Document;
use Svg\Style;

class SurfaceCpdf implements SurfaceInterface
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
            $Vvzurwoc24em = new \CPdf\CPdf(array(0, 0, $Vhoifq2kocyt, $Vjlmjalejjxa));
            $Vhf4pkycqk10 = new \ReflectionClass($Vvzurwoc24em);
            $Vvzurwoc24em->fontcache = realpath(dirname($Vhf4pkycqk10->getFileName()) . "/../../fonts/")."/";
        }

        
        
        $Vvzurwoc24em->transform(array(
            1,  0,
            0, -1,
            0, $Vjlmjalejjxa
        ));

        $this->width  = $Vhoifq2kocyt;
        $this->height = $Vjlmjalejjxa;

        $this->canvas = $Vvzurwoc24em;
    }

    function out()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        return $this->canvas->output();
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

        $this->transform($Vs4gloy23a1d, 0, 0, $Vopgub02o3q2, 0, 0);
    }

    public function rotate($Vtmcaiuo2hqy)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";

        $Vrr3orqjztc2 = deg2rad($Vtmcaiuo2hqy);
        $Vuighf4vnrhj = cos($Vrr3orqjztc2);
        $Vgdmmikhhqfi = sin($Vrr3orqjztc2);

        $this->transform(
            $Vuighf4vnrhj,                         $Vgdmmikhhqfi,
            -$Vgdmmikhhqfi,                         $Vuighf4vnrhj,
            0, 0
        );
    }

    public function translate($Vs4gloy23a1d, $Vopgub02o3q2)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";

        $this->transform(
            1,  0,
            0,  1,
            $Vs4gloy23a1d, $Vopgub02o3q2
        );
    }

    public function transform($Vrr3orqjztc2, $Vbz3vmbr1h2v, $Vv03lfntnmcz, $Vcyg5xmwfpxo, $V2bwrjburyuf, $V4ljftfdeqpl)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";

        $this->canvas->transform(array($Vrr3orqjztc2, $Vbz3vmbr1h2v, $Vv03lfntnmcz, $Vcyg5xmwfpxo, $V2bwrjburyuf, $V4ljftfdeqpl));
    }

    public function beginPath()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        
    }

    public function closePath()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->closePath();
    }

    public function fillStroke()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->fillStroke();
    }

    public function clip()
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->clip();
    }

    public function fillText($Vnlbbd31sxbf, $Vs4gloy23a1d, $Vopgub02o3q2, $Vv44wp1i5zfs = null)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->addText($Vs4gloy23a1d, $Vopgub02o3q2, $this->style->fontSize, $Vnlbbd31sxbf);
    }

    public function strokeText($Vnlbbd31sxbf, $Vs4gloy23a1d, $Vopgub02o3q2, $Vv44wp1i5zfs = null)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->addText($Vs4gloy23a1d, $Vopgub02o3q2, $this->style->fontSize, $Vnlbbd31sxbf);
    }

    public function drawImage($Vnxkvrc5q2ng, $Vjz2piyfb2ut, $Vskekw1ijrky, $Vwuismxitwwp = null, $Vdsvjjxxrru4 = null, $Vcyg5xmwfpxox = null, $Vcyg5xmwfpxoy = null, $Vcyg5xmwfpxow = null, $Vcyg5xmwfpxoh = null)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";

        if (strpos($Vnxkvrc5q2ng, "data:") === 0) {
            $V2crka1tlwcy = explode(',', $Vnxkvrc5q2ng, 2);

            $Vcyg5xmwfpxoata = $V2crka1tlwcy[1];
            $Vbz3vmbr1h2vase64 = false;

            $Vtjy01iaorqx = strtok($V2crka1tlwcy[0], ';');
            while ($Vtjy01iaorqx !== false) {
                if ($Vtjy01iaorqx == 'base64') {
                    $Vbz3vmbr1h2vase64 = true;
                }

                $Vtjy01iaorqx = strtok(';');
            }

            if ($Vbz3vmbr1h2vase64) {
                $Vcyg5xmwfpxoata = base64_decode($Vcyg5xmwfpxoata);
            }
        }
        else {
            $Vcyg5xmwfpxoata = file_get_contents($Vnxkvrc5q2ng);
        }

        $Vnxkvrc5q2ng = tempnam("", "svg");
        file_put_contents($Vnxkvrc5q2ng, $Vcyg5xmwfpxoata);

        $V1bb0p4see5o = $this->image($Vnxkvrc5q2ng, $Vjz2piyfb2ut, $Vskekw1ijrky, $Vwuismxitwwp, $Vdsvjjxxrru4, "normal");


        unlink($Vnxkvrc5q2ng);
    }

    public static function getimagesize($V4ljftfdeqplilename)
    {
        static $Vv03lfntnmczache = array();

        if (isset($Vv03lfntnmczache[$V4ljftfdeqplilename])) {
            return $Vv03lfntnmczache[$V4ljftfdeqplilename];
        }

        list($Vztt3qdrrikx, $Vku40chc0ddp, $Vxeifmjzikkj) = getimagesize($V4ljftfdeqplilename);

        if ($Vztt3qdrrikx == null || $Vku40chc0ddp == null) {
            $Vcyg5xmwfpxoata = file_get_contents($V4ljftfdeqplilename, null, null, 0, 26);

            if (substr($Vcyg5xmwfpxoata, 0, 2) === "BM") {
                $V1phfyh5exyy = unpack('vtype/Vfilesize/Vreserved/Voffset/Vheadersize/Vwidth/Vheight', $Vcyg5xmwfpxoata);
                $Vztt3qdrrikx = (int)$V1phfyh5exyy['width'];
                $Vku40chc0ddp = (int)$V1phfyh5exyy['height'];
                $Vxeifmjzikkj = IMAGETYPE_BMP;
            }
        }

        return $Vv03lfntnmczache[$V4ljftfdeqplilename] = array($Vztt3qdrrikx, $Vku40chc0ddp, $Vxeifmjzikkj);
    }

    function image($V1bb0p4see5o, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vcp3240dq5y1 = "normal")
    {
        list($Vztt3qdrrikx, $Vku40chc0ddp, $Vxeifmjzikkj) = $this->getimagesize($V1bb0p4see5o);

        switch ($Vxeifmjzikkj) {
            case IMAGETYPE_JPEG:
                $this->canvas->addJpegFromFile($V1bb0p4see5o, $Vs4gloy23a1d, $Vopgub02o3q2 - $Vjlmjalejjxa, $Vhoifq2kocyt, $Vjlmjalejjxa);
                break;

            case IMAGETYPE_GIF:
            case IMAGETYPE_BMP:
                
                $V1bb0p4see5o = $this->_convert_gif_bmp_to_png($V1bb0p4see5o, $Vxeifmjzikkj);

            case IMAGETYPE_PNG:
                $this->canvas->addPngFromFile($V1bb0p4see5o, $Vs4gloy23a1d, $Vopgub02o3q2 - $Vjlmjalejjxa, $Vhoifq2kocyt, $Vjlmjalejjxa);
                break;

            default:
        }
    }

    public function lineTo($Vs4gloy23a1d, $Vopgub02o3q2)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->lineTo($Vs4gloy23a1d, $Vopgub02o3q2);
    }

    public function moveTo($Vs4gloy23a1d, $Vopgub02o3q2)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->moveTo($Vs4gloy23a1d, $Vopgub02o3q2);
    }

    public function quadraticCurveTo($Vv03lfntnmczpx, $Vv03lfntnmczpy, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";

        
        $this->canvas->quadTo($Vv03lfntnmczpx, $Vv03lfntnmczpy, $Vs4gloy23a1d, $Vopgub02o3q2);
    }

    public function bezierCurveTo($Vv03lfntnmczp1x, $Vv03lfntnmczp1y, $Vv03lfntnmczp2x, $Vv03lfntnmczp2y, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->curveTo($Vv03lfntnmczp1x, $Vv03lfntnmczp1y, $Vv03lfntnmczp2x, $Vv03lfntnmczp2y, $Vs4gloy23a1d, $Vopgub02o3q2);
    }

    public function arcTo($Vs4gloy23a1d1, $Vopgub02o3q21, $Vs4gloy23a1d2, $Vopgub02o3q22, $V4tsg1pc0dnr)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
    }

    public function arc($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnr, $Vk21laijil03, $V2bwrjburyufndAngle, $Vrr3orqjztc2nticlockwise = false)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->ellipse($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnr, $V4tsg1pc0dnr, 0, 8, $Vk21laijil03, $V2bwrjburyufndAngle, false, false, false, true);
    }

    public function circle($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnr)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->ellipse($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnr, $V4tsg1pc0dnr, 0, 8, 0, 360, true, false, false, false);
    }

    public function ellipse($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnrX, $V4tsg1pc0dnrY, $Vodyfhojz44d, $Vk21laijil03, $V2bwrjburyufndAngle, $Vrr3orqjztc2nticlockwise)
    {
        if (self::DEBUG) echo __FUNCTION__ . "\n";
        $this->canvas->ellipse($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnrX, $V4tsg1pc0dnrY, 0, 8, 0, 360, false, false, false, false);
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

        $Vvyapc0zfcyf = min($Vvyapc0zfcyf, $Vhoifq2kocyt / 2);
        $Vvyapc0zfcyf = min($Vvyapc0zfcyf, $Vjlmjalejjxa / 2);

        
        $this->moveTo($Vs4gloy23a1d + $Vvyapc0zfcyf, $Vopgub02o3q2);

        
        $this->lineTo($Vs4gloy23a1d + $Vhoifq2kocyt - $Vvyapc0zfcyf, $Vopgub02o3q2);

        
        $this->arc($Vs4gloy23a1d + $Vhoifq2kocyt - $Vvyapc0zfcyf, $Vopgub02o3q2 + $Vvyapc0zfcyf, $Vvyapc0zfcyf, 270, 360);

        
        $this->lineTo($Vs4gloy23a1d + $Vhoifq2kocyt, $Vopgub02o3q2 + $Vjlmjalejjxa - $Vvyapc0zfcyf );

        
        $this->arc($Vs4gloy23a1d + $Vhoifq2kocyt - $Vvyapc0zfcyf, $Vopgub02o3q2 + $Vjlmjalejjxa - $Vvyapc0zfcyf, $Vvyapc0zfcyf, 0, 90);

        
        $this->lineTo($Vs4gloy23a1d + $Vvyapc0zfcyf, $Vopgub02o3q2 + $Vjlmjalejjxa);

        
        $this->arc($Vs4gloy23a1d + $Vvyapc0zfcyf, $Vopgub02o3q2 + $Vjlmjalejjxa - $Vvyapc0zfcyf, $Vvyapc0zfcyf, 90, 180);

        
        $this->lineTo($Vs4gloy23a1d , $Vopgub02o3q2 + $Vvyapc0zfcyf);

        
        $this->arc($Vs4gloy23a1d + $Vvyapc0zfcyf, $Vopgub02o3q2 + $Vvyapc0zfcyf, $Vvyapc0zfcyf, 180, 270);
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
        $this->setFont($Vdidzwb0w3vc->fontFamily, $Vdidzwb0w3vc->fontStyle, $Vdidzwb0w3vc->fontWeight);

        return $this->canvas->getTextWidth($this->getStyle()->fontSize, $Vnlbbd31sxbf);
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

        if (is_array($Vdidzwb0w3vc->stroke) && $Vihuafvzvxcv = $Vdidzwb0w3vc->stroke) {
            $Vvzurwoc24em->setStrokeColor(array((float)$Vihuafvzvxcv[0]/255, (float)$Vihuafvzvxcv[1]/255, (float)$Vihuafvzvxcv[2]/255), true);
        }

        if (is_array($Vdidzwb0w3vc->fill) && $V4ljftfdeqplill = $Vdidzwb0w3vc->fill) {
            $Vvzurwoc24em->setColor(array((float)$V4ljftfdeqplill[0]/255, (float)$V4ljftfdeqplill[1]/255, (float)$V4ljftfdeqplill[2]/255), true);
        }

        if ($V4ljftfdeqplillRule = strtolower($Vdidzwb0w3vc->fillRule)) {
            $Vvzurwoc24em->setFillRule($V4ljftfdeqplillRule);
        }

        $Vdrvff4n2sqc = $Vdidzwb0w3vc->opacity;
        if ($Vdrvff4n2sqc !== null && $Vdrvff4n2sqc < 1.0) {
            $Vvzurwoc24em->setLineTransparency("Normal", $Vdrvff4n2sqc);
            $Vvzurwoc24em->currentLineTransparency = null;

            $Vvzurwoc24em->setFillTransparency("Normal", $Vdrvff4n2sqc);
            $Vvzurwoc24em->currentFillTransparency = null;
        }
        else {
            $V4ljftfdeqplillOpacity = $Vdidzwb0w3vc->fillOpacity;
            if ($V4ljftfdeqplillOpacity !== null && $V4ljftfdeqplillOpacity < 1.0) {
                $Vvzurwoc24em->setFillTransparency("Normal", $V4ljftfdeqplillOpacity);
                $Vvzurwoc24em->currentFillTransparency = null;
            }

            $VihuafvzvxcvOpacity = $Vdidzwb0w3vc->strokeOpacity;
            if ($VihuafvzvxcvOpacity !== null && $VihuafvzvxcvOpacity < 1.0) {
                $Vvzurwoc24em->setLineTransparency("Normal", $VihuafvzvxcvOpacity);
                $Vvzurwoc24em->currentLineTransparency = null;
            }
        }

        $Vcyg5xmwfpxoashArray = null;
        if ($Vdidzwb0w3vc->strokeDasharray) {
            $Vcyg5xmwfpxoashArray = preg_split('/\s*,\s*/', $Vdidzwb0w3vc->strokeDasharray);
        }

        $Vvzurwoc24em->setLineStyle(
            $Vdidzwb0w3vc->strokeWidth,
            $Vdidzwb0w3vc->strokeLinecap,
            $Vdidzwb0w3vc->strokeLinejoin,
            $Vcyg5xmwfpxoashArray
        );

        $this->setFont($Vdidzwb0w3vc->fontFamily, $Vdidzwb0w3vc->fontStyle, $Vdidzwb0w3vc->fontWeight);
    }

    public function setFont($V4ljftfdeqplamily, $Vdidzwb0w3vc, $Vhoifq2kocyteight)
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

        $Vdidzwb0w3vcMap = array(
            'Helvetica' => array(
                'b'  => 'Helvetica-Bold',
                'i'  => 'Helvetica-Oblique',
                'bi' => 'Helvetica-BoldOblique',
            ),
            'Courier' => array(
                'b'  => 'Courier-Bold',
                'i'  => 'Courier-Oblique',
                'bi' => 'Courier-BoldOblique',
            ),
            'Times' => array(
                ''   => 'Times-Roman',
                'b'  => 'Times-Bold',
                'i'  => 'Times-Italic',
                'bi' => 'Times-BoldItalic',
            ),
        );

        $V4ljftfdeqplamily = strtolower($V4ljftfdeqplamily);
        $Vdidzwb0w3vc  = strtolower($Vdidzwb0w3vc);
        $Vhoifq2kocyteight = strtolower($Vhoifq2kocyteight);

        if (isset($V02cy3ehfkm0[$V4ljftfdeqplamily])) {
            $V4ljftfdeqplamily = $V02cy3ehfkm0[$V4ljftfdeqplamily];
        }

        if (isset($Vdidzwb0w3vcMap[$V4ljftfdeqplamily])) {
            $Vqwhzgethmgj = "";

            if ($Vhoifq2kocyteight === "bold" || $Vhoifq2kocyteight === "bolder" || (is_numeric($Vhoifq2kocyteight) && $Vhoifq2kocyteight >= 600)) {
                $Vqwhzgethmgj .= "b";
            }

            if ($Vdidzwb0w3vc === "italic" || $Vdidzwb0w3vc === "oblique") {
                $Vqwhzgethmgj .= "i";
            }

            if (isset($Vdidzwb0w3vcMap[$V4ljftfdeqplamily][$Vqwhzgethmgj])) {
                $V4ljftfdeqplamily = $Vdidzwb0w3vcMap[$V4ljftfdeqplamily][$Vqwhzgethmgj];
            }
        }

        $this->canvas->selectFont("$V4ljftfdeqplamily.afm");
    }
}
