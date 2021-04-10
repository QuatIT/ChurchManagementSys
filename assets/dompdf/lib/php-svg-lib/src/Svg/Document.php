<?php


namespace Svg;

use Svg\Surface\SurfaceInterface;
use Svg\Tag\AbstractTag;
use Svg\Tag\Anchor;
use Svg\Tag\Circle;
use Svg\Tag\Ellipse;
use Svg\Tag\Group;
use Svg\Tag\ClipPath;
use Svg\Tag\Image;
use Svg\Tag\Line;
use Svg\Tag\LinearGradient;
use Svg\Tag\Path;
use Svg\Tag\Polygon;
use Svg\Tag\Polyline;
use Svg\Tag\Rect;
use Svg\Tag\Stop;
use Svg\Tag\Text;
use Svg\Tag\StyleTag;
use Svg\Tag\UseTag;

class Document extends AbstractTag
{
    protected $Vaqmmjdxljsi;
    public $Von4hk0zm0ev = false;

    protected $Vs4gloy23a1d;
    protected $Vopgub02o3q2;
    protected $Vztt3qdrrikx;
    protected $Vku40chc0ddp;

    protected $Vlxbozwcscml;
    protected $Vpke2pv3kbi2;
    protected $Vjv5rcl02vhz;

    
    protected $V2az11vbyxue;

    
    protected $Vyjtkau4njyv;

    
    protected $Vwvjp3dx4uxt = array();

    
    protected $Vrfuzeblc3l1 = array();

    
    protected $V3nx5hv5injq = array();

    public function loadFile($Vaqmmjdxljsi)
    {
        $this->filename = $Vaqmmjdxljsi;
    }

    protected function initParser() {
        $V2az11vbyxue = xml_parser_create("utf-8");
        xml_parser_set_option($V2az11vbyxue, XML_OPTION_CASE_FOLDING, false);
        xml_set_element_handler(
            $V2az11vbyxue,
            array($this, "_tagStart"),
            array($this, "_tagEnd")
        );
        xml_set_character_data_handler(
            $V2az11vbyxue,
            array($this, "_charData")
        );

        return $this->parser = $V2az11vbyxue;
    }

    public function __construct() {

    }

    
    public function getSurface()
    {
        return $this->surface;
    }

    public function getStack()
    {
        return $this->stack;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getDimensions() {
        $Vtcj1qbd0avo = null;

        $V2az11vbyxue = xml_parser_create("utf-8");
        xml_parser_set_option($V2az11vbyxue, XML_OPTION_CASE_FOLDING, false);
        xml_set_element_handler(
            $V2az11vbyxue,
            function ($V2az11vbyxue, $Vpgf1maodsla, $Voywws15cvz5) use (&$Vtcj1qbd0avo) {
                if ($Vpgf1maodsla === "svg" && $Vtcj1qbd0avo === null) {
                    $Voywws15cvz5 = array_change_key_case($Voywws15cvz5, CASE_LOWER);

                    $Vtcj1qbd0avo = $Voywws15cvz5;
                }
            },
            function ($V2az11vbyxue, $Vpgf1maodsla) {}
        );

        $Vvnb4cfxphpy = fopen($this->filename, "r");
        while ($V4m4rbmlpgn2 = fread($Vvnb4cfxphpy, 8192)) {
            xml_parse($V2az11vbyxue, $V4m4rbmlpgn2, false);

            if ($Vtcj1qbd0avo !== null) {
                break;
            }
        }

        xml_parser_free($V2az11vbyxue);

        return $this->handleSizeAttributes($Vtcj1qbd0avo);
    }

    public function handleSizeAttributes($Voywws15cvz5){
        if ($this->width === null) {
            if (isset($Voywws15cvz5["width"])) {
                $Vztt3qdrrikx = Style::convertSize($Voywws15cvz5["width"], 400);
                $this->width  = $Vztt3qdrrikx;
            }

            if (isset($Voywws15cvz5["height"])) {
                $Vku40chc0ddp = Style::convertSize($Voywws15cvz5["height"], 300);
                $this->height = $Vku40chc0ddp;
            }

            if (isset($Voywws15cvz5['viewbox'])) {
                $Vjv5rcl02vhz = preg_split('/[\s,]+/is', trim($Voywws15cvz5['viewbox']));
                if (count($Vjv5rcl02vhz) == 4) {
                    $this->x = $Vjv5rcl02vhz[0];
                    $this->y = $Vjv5rcl02vhz[1];

                    if (!$this->width) {
                        $this->width = $Vjv5rcl02vhz[2];
                    }
                    if (!$this->height) {
                        $this->height = $Vjv5rcl02vhz[3];
                    }
                }
            }
        }

        return array(
            0        => $this->width,
            1        => $this->height,

            "width"  => $this->width,
            "height" => $this->height,
        );
    }

    public function getDocument(){
        return $this;
    }

    
    public function appendStyleSheet($V5fvtlalkarx) {
        $this->styleSheets[] = $V5fvtlalkarx;
    }

    
    public function getStyleSheets() {
        return $this->styleSheets;
    }

    protected function before($Voywws15cvz5)
    {
        $Vyjtkau4njyv = $this->getSurface();

        $Vdidzwb0w3vc = new DefaultStyle();
        $Vdidzwb0w3vc->inherit($this);
        $Vdidzwb0w3vc->fromAttributes($Voywws15cvz5);

        $this->setStyle($Vdidzwb0w3vc);

        $Vyjtkau4njyv->setStyle($Vdidzwb0w3vc);
    }

    public function render(SurfaceInterface $Vyjtkau4njyv)
    {
        $this->inDefs = false;
        $this->surface = $Vyjtkau4njyv;

        $V2az11vbyxue = $this->initParser();

        if ($this->x || $this->y) {
            $Vyjtkau4njyv->translate(-$this->x, -$this->y);
        }

        $Vvnb4cfxphpy = fopen($this->filename, "r");
        while ($V4m4rbmlpgn2 = fread($Vvnb4cfxphpy, 8192)) {
            xml_parse($V2az11vbyxue, $V4m4rbmlpgn2, false);
        }

        xml_parse($V2az11vbyxue, "", true);

        xml_parser_free($V2az11vbyxue);
    }

    protected function svgOffset($Voywws15cvz5)
    {
        $this->attributes = $Voywws15cvz5;

        $this->handleSizeAttributes($Voywws15cvz5);
    }

    public function getDef($Vkriocz2qep2) {
        $Vkriocz2qep2 = ltrim($Vkriocz2qep2, "#");

        return isset($this->defs[$Vkriocz2qep2]) ? $this->defs[$Vkriocz2qep2] : null;
    }

    private function _tagStart($V2az11vbyxue, $Vpgf1maodsla, $Voywws15cvz5)
    {
        $this->x = 0;
        $this->y = 0;

        $Vudn5fb5ck4i = null;

        $Voywws15cvz5 = array_change_key_case($Voywws15cvz5, CASE_LOWER);

        switch (strtolower($Vpgf1maodsla)) {
            case 'defs':
                $this->inDefs = true;
                return;

            case 'svg':
                if (count($this->attributes)) {
                    $Vudn5fb5ck4i = new Group($this, $Vpgf1maodsla);
                }
                else {
                    $Vudn5fb5ck4i = $this;
                    $this->svgOffset($Voywws15cvz5);
                }
                break;

            case 'path':
                $Vudn5fb5ck4i = new Path($this, $Vpgf1maodsla);
                break;

            case 'rect':
                $Vudn5fb5ck4i = new Rect($this, $Vpgf1maodsla);
                break;

            case 'circle':
                $Vudn5fb5ck4i = new Circle($this, $Vpgf1maodsla);
                break;

            case 'ellipse':
                $Vudn5fb5ck4i = new Ellipse($this, $Vpgf1maodsla);
                break;

            case 'image':
                $Vudn5fb5ck4i = new Image($this, $Vpgf1maodsla);
                break;

            case 'line':
                $Vudn5fb5ck4i = new Line($this, $Vpgf1maodsla);
                break;

            case 'polyline':
                $Vudn5fb5ck4i = new Polyline($this, $Vpgf1maodsla);
                break;

            case 'polygon':
                $Vudn5fb5ck4i = new Polygon($this, $Vpgf1maodsla);
                break;

            case 'lineargradient':
                $Vudn5fb5ck4i = new LinearGradient($this, $Vpgf1maodsla);
                break;

            case 'radialgradient':
                $Vudn5fb5ck4i = new LinearGradient($this, $Vpgf1maodsla);
                break;

            case 'stop':
                $Vudn5fb5ck4i = new Stop($this, $Vpgf1maodsla);
                break;

            case 'style':
                $Vudn5fb5ck4i = new StyleTag($this, $Vpgf1maodsla);
                break;

            case 'a':
                $Vudn5fb5ck4i = new Anchor($this, $Vpgf1maodsla);
                break;

            case 'g':
            case 'symbol':
                $Vudn5fb5ck4i = new Group($this, $Vpgf1maodsla);
                break;

            case 'clippath':
                $Vudn5fb5ck4i = new ClipPath($this, $Vpgf1maodsla);
                break;

            case 'use':
                $Vudn5fb5ck4i = new UseTag($this, $Vpgf1maodsla);
                break;

            case 'text':
                $Vudn5fb5ck4i = new Text($this, $Vpgf1maodsla);
                break;
        }

        if ($Vudn5fb5ck4i) {
            if (isset($Voywws15cvz5["id"])) {
                $this->defs[$Voywws15cvz5["id"]] = $Vudn5fb5ck4i;
            }
            else {
                
                $Vnre3z2vvgov = end($this->stack);
                if ($Vnre3z2vvgov && $Vnre3z2vvgov != $Vudn5fb5ck4i) {
                    $Vnre3z2vvgov->children[] = $Vudn5fb5ck4i;
                }
            }

            $this->stack[] = $Vudn5fb5ck4i;

            $Vudn5fb5ck4i->handle($Voywws15cvz5);
        } else {
            echo "Unknown: '$Vpgf1maodsla'\n";
        }
    }

    function _charData($V2az11vbyxue, $Vb3z3shnu1vn)
    {
        $Vwvjp3dx4uxt_top = end($this->stack);

        if ($Vwvjp3dx4uxt_top instanceof Text || $Vwvjp3dx4uxt_top instanceof StyleTag) {
            $Vwvjp3dx4uxt_top->appendText($Vb3z3shnu1vn);
        }
    }

    function _tagEnd($V2az11vbyxue, $Vpgf1maodsla)
    {
        
        $Vudn5fb5ck4i = null;
        switch (strtolower($Vpgf1maodsla)) {
            case 'defs':
                $this->inDefs = false;
                return;

            case 'svg':
            case 'path':
            case 'rect':
            case 'circle':
            case 'ellipse':
            case 'image':
            case 'line':
            case 'polyline':
            case 'polygon':
            case 'radialgradient':
            case 'lineargradient':
            case 'stop':
            case 'style':
            case 'text':
            case 'g':
            case 'symbol':
            case 'clippath':
            case 'use':
            case 'a':
                $Vudn5fb5ck4i = array_pop($this->stack);
                break;
        }

        if (!$this->inDefs && $Vudn5fb5ck4i) {
            $Vudn5fb5ck4i->handleEnd();
        }
    }
}
