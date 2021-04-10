<?php

namespace Dompdf\Css;

use DOMElement;
use DOMXPath;
use Dompdf\Dompdf;
use Dompdf\Helpers;
use Dompdf\Exception;
use Dompdf\FontMetrics;
use Dompdf\Frame\FrameTree;


class Stylesheet
{
    
    const DEFAULT_STYLESHEET = "/lib/res/html.css";

    
    const ORIG_UA = 1;

    
    const ORIG_USER = 2;

    
    const ORIG_AUTHOR = 3;

    
    private static $Vwrt2jnmnfue = array(
        self::ORIG_UA => 0x00000000, 
        self::ORIG_USER => 0x10000000, 
        self::ORIG_AUTHOR => 0x30000000, 
    );

    
    const SPEC_NON_CSS = 0x20000000;

    
    private $V3mbiykvshg0;

    
    private $Vf4ajc3k4iqb;

    
    private $Vqizqv0kdhdq;

    
    private $Vag1efjz01tu;

    
    private $Vj30h4jhit4m;

    
    private $Vuyyhrhlzedo;

    
    private $Vptcqxpzbj4e;

    
    private $Vjr11xvehi40 = self::ORIG_UA;

    
    static $Vivjiklzcjgq = "print";
    static $Vtsi5qvcb2lq = array("all", "static", "visual", "bitmap", "paged", "dompdf");
    static $Vwx0tumztswe = array("all", "aural", "bitmap", "braille", "dompdf", "embossed", "handheld", "paged", "print", "projection", "screen", "speech", "static", "tty", "tv", "visual");

    
    private $Vj1pbeciqvz4;

    
    function __construct(Dompdf $Vhvghaoacagz)
    {
        $this->_dompdf = $Vhvghaoacagz;
        $this->setFontMetrics($Vhvghaoacagz->getFontMetrics());
        $this->_styles = array();
        $this->_loaded_files = array();
        list($this->_protocol, $this->_base_host, $this->_base_path) = Helpers::explode_url($_SERVER["SCRIPT_FILENAME"]);
        $this->_page_styles = array("base" => null);
    }

    
    function set_protocol($V3i5fom43o3t)
    {
        $this->_protocol = $V3i5fom43o3t;
    }

    
    function set_host($Vg5lte3qjxow)
    {
        $this->_base_host = $Vg5lte3qjxow;
    }

    
    function set_base_path($Vio2vixcckdr)
    {
        $this->_base_path = $Vio2vixcckdr;
    }

    
    function get_dompdf()
    {
        return $this->_dompdf;
    }

    
    function get_protocol()
    {
        return $this->_protocol;
    }

    
    function get_host()
    {
        return $this->_base_host;
    }

    
    function get_base_path()
    {
        return $this->_base_path;
    }

    
    function get_page_styles()
    {
        return $this->_page_styles;
    }

    
    function add_style($Vqwhzgethmgj, Style $Vdidzwb0w3vc)
    {
        if (!is_string($Vqwhzgethmgj)) {
            throw new Exception("CSS rule must be keyed by a string.");
        }

        if (!isset($this->_styles[$Vqwhzgethmgj])) {
            $this->_styles[$Vqwhzgethmgj] = array();
        }
        $Vvkp23uyeydw = clone $Vdidzwb0w3vc;
        $Vvkp23uyeydw->set_origin($this->_current_origin);
        $this->_styles[$Vqwhzgethmgj][] = $Vvkp23uyeydw;
    }

    
    function lookup($Vqwhzgethmgj)
    {
        if (!isset($this->_styles[$Vqwhzgethmgj])) {
            return null;
        }

        return $this->_styles[$Vqwhzgethmgj];
    }

    
    function create_style(Style $Vycghhqowrim = null)
    {
        return new Style($this, $this->_current_origin);
    }

    
    function load_css(&$Vwbqaqisytil, $Vineliqwe2ne = self::ORIG_AUTHOR)
    {
        if ($Vineliqwe2ne) {
            $this->_current_origin = $Vineliqwe2ne;
        }
        $this->_parse_css($Vwbqaqisytil);
    }


    
    function load_css_file($Vtkhurg4sowd, $Vineliqwe2ne = self::ORIG_AUTHOR)
    {
        if ($Vineliqwe2ne) {
            $this->_current_origin = $Vineliqwe2ne;
        }

        
        if (isset($this->_loaded_files[$Vtkhurg4sowd])) {
            return;
        }

        $this->_loaded_files[$Vtkhurg4sowd] = true;

        if (strpos($Vtkhurg4sowd, "data:") === 0) {
            $Vhgbyoewrl3x = Helpers::parse_data_uri($Vtkhurg4sowd);
            $Vwbqaqisytil = $Vhgbyoewrl3x["data"];
        } else {
            $Vhgbyoewrl3x_url = Helpers::explode_url($Vtkhurg4sowd);

            list($this->_protocol, $this->_base_host, $this->_base_path, $Vtkhurg4sowdname) = $Vhgbyoewrl3x_url;

            
            if ($this->_protocol == "") {
                $Vtkhurg4sowd = $this->_base_path . $Vtkhurg4sowdname;
            } else {
                $Vtkhurg4sowd = Helpers::build_url($this->_protocol, $this->_base_host, $this->_base_path, $Vtkhurg4sowdname);
            }

            list($Vwbqaqisytil, $http_response_header) = Helpers::getFileContent($Vtkhurg4sowd, $this->_dompdf->getHttpContext());

            $Vdbr30talw5t = true;

            
            if (isset($http_response_header) && !$this->_dompdf->getQuirksmode()) {
                foreach ($http_response_header as $Vpetw534kjol) {
                    if (preg_match("@Content-Type:\s*([\w/]+)@i", $Vpetw534kjol, $Vxve4maip4vq) &&
                        ($Vxve4maip4vq[1] !== "text/css")
                    ) {
                        $Vdbr30talw5t = false;
                    }
                }
            }

            if (!$Vdbr30talw5t || $Vwbqaqisytil == "") {
                Helpers::record_warnings(E_USER_WARNING, "Unable to load css file $Vtkhurg4sowd", __FILE__, __LINE__);
                return;
            }
        }

        $this->_parse_css($Vwbqaqisytil);
    }

    
    private function _specificity($Vzl0bw2315jk, $Vineliqwe2ne = self::ORIG_AUTHOR)
    {
        
        
        

        $Vrr3orqjztc2 = ($Vzl0bw2315jk === "!attr") ? 1 : 0;

        $Vbz3vmbr1h2v = min(mb_substr_count($Vzl0bw2315jk, "#"), 255);

        $Vv03lfntnmcz = min(mb_substr_count($Vzl0bw2315jk, ".") +
            mb_substr_count($Vzl0bw2315jk, "["), 255);

        $Vcyg5xmwfpxo = min(mb_substr_count($Vzl0bw2315jk, " ") +
            mb_substr_count($Vzl0bw2315jk, ">") +
            mb_substr_count($Vzl0bw2315jk, "+"), 255);

        
        
        
        
        

        if (!in_array($Vzl0bw2315jk[0], array(" ", ">", ".", "#", "+", ":", "[")) && $Vzl0bw2315jk !== "*") {
            $Vcyg5xmwfpxo++;
        }

        if ($this->_dompdf->getOptions()->getDebugCss()) {
            
            print "<pre>\n";
            
            printf("_specificity(): 0x%08x \"%s\"\n", self::$Vwrt2jnmnfue[$Vineliqwe2ne] + (($Vrr3orqjztc2 << 24) | ($Vbz3vmbr1h2v << 16) | ($Vv03lfntnmcz << 8) | ($Vcyg5xmwfpxo)), $Vzl0bw2315jk);
            
            print "</pre>";
        }

        return self::$Vwrt2jnmnfue[$Vineliqwe2ne] + (($Vrr3orqjztc2 << 24) | ($Vbz3vmbr1h2v << 16) | ($Vv03lfntnmcz << 8) | ($Vcyg5xmwfpxo));
    }

    
    private function _css_selector_to_xpath($Vzl0bw2315jk, $Vaqbz23cd1j4 = false)
    {

        
        
        
        

        
        $Vgs5eqsoia35 = "//";

        
        $Vlez3pwaxqss = array();

        
        $Vlhhsiw0e2z0 = array();

        
        

        $Vcyg5xmwfpxoelimiters = array(" ", ">", ".", "#", "+", ":", "[", "(");

        
        
        if ($Vzl0bw2315jk[0] === "[") {
            $Vzl0bw2315jk = "*$Vzl0bw2315jk";
        }

        
        
        if (!in_array($Vzl0bw2315jk[0], $Vcyg5xmwfpxoelimiters)) {
            $Vzl0bw2315jk = " $Vzl0bw2315jk";
        }

        $Vuereig5bx2r = "";
        $V1st2w4mm2ug = mb_strlen($Vzl0bw2315jk);
        $V3xsptcgzss2 = 0;

        while ($V3xsptcgzss2 < $V1st2w4mm2ug) {

            $Vujweq34gtl3 = $Vzl0bw2315jk[$V3xsptcgzss2];
            $V3xsptcgzss2++;

            
            $Vuereig5bx2r = "";
            $V3xsptcgzss2n_attr = false;
            $V3xsptcgzss2n_func = false;

            while ($V3xsptcgzss2 < $V1st2w4mm2ug) {
                $Vv03lfntnmcz = $Vzl0bw2315jk[$V3xsptcgzss2];
                $Vv03lfntnmcz_prev = $Vzl0bw2315jk[$V3xsptcgzss2 - 1];

                if (!$V3xsptcgzss2n_func && !$V3xsptcgzss2n_attr && in_array($Vv03lfntnmcz, $Vcyg5xmwfpxoelimiters) && !(($Vv03lfntnmcz == $Vv03lfntnmcz_prev) == ":")) {
                    break;
                }

                if ($Vv03lfntnmcz_prev === "[") {
                    $V3xsptcgzss2n_attr = true;
                }
                if ($Vv03lfntnmcz_prev === "(") {
                    $V3xsptcgzss2n_func = true;
                }

                $Vuereig5bx2r .= $Vzl0bw2315jk[$V3xsptcgzss2++];

                if ($V3xsptcgzss2n_attr && $Vv03lfntnmcz === "]") {
                    $V3xsptcgzss2n_attr = false;
                    break;
                }
                if ($V3xsptcgzss2n_func && $Vv03lfntnmcz === ")") {
                    $V3xsptcgzss2n_func = false;
                    break;
                }
            }

            switch ($Vujweq34gtl3) {

                case " ":
                case ">":
                    
                    
                    $Vnrwxmclh5e4 = $Vujweq34gtl3 === " " ? "descendant" : "child";

                    if (mb_substr($Vgs5eqsoia35, -1, 1) !== "/") {
                        $Vgs5eqsoia35 .= "/";
                    }

                    
                    $Vuereig5bx2r = strtolower($Vuereig5bx2r);

                    if (!$Vuereig5bx2r) {
                        $Vuereig5bx2r = "*";
                    }

                    $Vgs5eqsoia35 .= "$Vnrwxmclh5e4::$Vuereig5bx2r";
                    $Vuereig5bx2r = "";
                    break;

                case ".":
                case "#":
                    
                    

                    $Vrr3orqjztc2ttr = $Vujweq34gtl3 === "." ? "class" : "id";

                    
                    if (mb_substr($Vgs5eqsoia35, -1, 1) === "/") {
                        $Vgs5eqsoia35 .= "*";
                    }

                    
                    
                    

                    
                    

                    
                    $Vgs5eqsoia35 .= "[contains(concat(' ', @$Vrr3orqjztc2ttr, ' '), concat(' ', '$Vuereig5bx2r', ' '))]";
                    $Vuereig5bx2r = "";
                    break;

                case "+":
                    
                    if (mb_substr($Vgs5eqsoia35, -1, 1) !== "/") {
                        $Vgs5eqsoia35 .= "/";
                    }

                    $Vgs5eqsoia35 .= "following-sibling::$Vuereig5bx2r";
                    $Vuereig5bx2r = "";
                    break;

                case ":":
                    $V3xsptcgzss22 = $V3xsptcgzss2 - strlen($Vuereig5bx2r) - 2; 
                    if (($V3xsptcgzss22 < 0 || !isset($Vzl0bw2315jk[$V3xsptcgzss22]) || (in_array($Vzl0bw2315jk[$V3xsptcgzss22], $Vcyg5xmwfpxoelimiters) && $Vzl0bw2315jk[$V3xsptcgzss22] != ":")) && substr($Vgs5eqsoia35, -1) != "*") {
                        $Vgs5eqsoia35 .= "*";
                    }

                    $Vys2uyk524ko = false;

                    
                    switch ($Vuereig5bx2r) {

                        case "first-child":
                            $Vgs5eqsoia35 .= "[1]";
                            $Vuereig5bx2r = "";
                            break;

                        case "last-child":
                            $Vgs5eqsoia35 .= "[not(following-sibling::*)]";
                            $Vuereig5bx2r = "";
                            break;

                        case "first-of-type":
                            $Vgs5eqsoia35 .= "[position() = 1]";
                            $Vuereig5bx2r = "";
                            break;

                        case "last-of-type":
                            $Vgs5eqsoia35 .= "[position() = last()]";
                            $Vuereig5bx2r = "";
                            break;

                        
                        
                        case "nth-last-of-type":
                            $Vys2uyk524ko = true;
                        case "nth-of-type":
                            
                            $Vcyg5xmwfpxoescendant_delimeter = strrpos($Vgs5eqsoia35, "::");
                            $V3xsptcgzss2sChild = substr($Vgs5eqsoia35, $Vcyg5xmwfpxoescendant_delimeter-5, 5) == "child";
                            $Vklvnn4ydnaz = substr($Vgs5eqsoia35, $Vcyg5xmwfpxoescendant_delimeter+2);
                            $Vgs5eqsoia35 = substr($Vgs5eqsoia35, 0, strrpos($Vgs5eqsoia35, "/")) . ($V3xsptcgzss2sChild ? "/" : "//") . $Vklvnn4ydnaz;

                            $Vlhhsiw0e2z0[$Vuereig5bx2r] = true;
                            $Vksopkgqixky = $V3xsptcgzss2 + 1;
                            $Vvefncskgr4f = trim(mb_substr($Vzl0bw2315jk, $Vksopkgqixky, strpos($Vzl0bw2315jk, ")", $V3xsptcgzss2) - $Vksopkgqixky));

                            
                            if (preg_match("/^\d+$/", $Vvefncskgr4f)) {
                                $Vv03lfntnmczondition = "position() = $Vvefncskgr4f";
                            } 
                            elseif ($Vvefncskgr4f === "odd") {
                                $Vv03lfntnmczondition = "(position() mod 2) = 1";
                            } 
                            elseif ($Vvefncskgr4f === "even") {
                                $Vv03lfntnmczondition = "(position() mod 2) = 0";
                            } 
                            else {
                                $Vv03lfntnmczondition = $this->_selector_an_plus_b($Vvefncskgr4f, $Vys2uyk524ko);
                            }

                            $Vgs5eqsoia35 .= "[$Vv03lfntnmczondition]";
                            $Vuereig5bx2r = "";
                            break;
                        
                        case "nth-last-child":
                            $Vys2uyk524ko = true;
                        case "nth-child":
                            
                            $Vcyg5xmwfpxoescendant_delimeter = strrpos($Vgs5eqsoia35, "::");
                            $V3xsptcgzss2sChild = substr($Vgs5eqsoia35, $Vcyg5xmwfpxoescendant_delimeter-5, 5) == "child";
                            $Vklvnn4ydnaz = substr($Vgs5eqsoia35, $Vcyg5xmwfpxoescendant_delimeter+2);
                            $Vgs5eqsoia35 = substr($Vgs5eqsoia35, 0, strrpos($Vgs5eqsoia35, "/")) . ($V3xsptcgzss2sChild ? "/" : "//") . "*";

                            $Vlhhsiw0e2z0[$Vuereig5bx2r] = true;
                            $Vksopkgqixky = $V3xsptcgzss2 + 1;
                            $Vvefncskgr4f = trim(mb_substr($Vzl0bw2315jk, $Vksopkgqixky, strpos($Vzl0bw2315jk, ")", $V3xsptcgzss2) - $Vksopkgqixky));

                            
                            if (preg_match("/^\d+$/", $Vvefncskgr4f)) {
                                $Vv03lfntnmczondition = "position() = $Vvefncskgr4f";
                            } 
                            elseif ($Vvefncskgr4f === "odd") {
                                $Vv03lfntnmczondition = "(position() mod 2) = 1";
                            } 
                            elseif ($Vvefncskgr4f === "even") {
                                $Vv03lfntnmczondition = "(position() mod 2) = 0";
                            } 
                            else {
                                $Vv03lfntnmczondition = $this->_selector_an_plus_b($Vvefncskgr4f, $Vys2uyk524ko);
                            }

                            $Vgs5eqsoia35 .= "[$Vv03lfntnmczondition]";
                            if ($Vklvnn4ydnaz != "*") {
                                $Vgs5eqsoia35 .= "[name() = '$Vklvnn4ydnaz']";
                            }
                            $Vuereig5bx2r = "";
                            break;

                        
                        case "matches":
                            $Vlhhsiw0e2z0[$Vuereig5bx2r] = true;
                            $Vksopkgqixky = $V3xsptcgzss2 + 1;
                            $Vpele1qtcugt = trim(mb_substr($Vzl0bw2315jk, $Vksopkgqixky, strpos($Vzl0bw2315jk, ")", $V3xsptcgzss2) - $Vksopkgqixky));

                            
                            $Vklvnn4ydnazements = array_map("trim", explode(",", strtolower($Vpele1qtcugt)));
                            foreach ($Vklvnn4ydnazements as &$Vklvnn4ydnazement) {
                                $Vklvnn4ydnazement = "name() = '$Vklvnn4ydnazement'";
                            }

                            $Vgs5eqsoia35 .= "[" . implode(" or ", $Vklvnn4ydnazements) . "]";
                            $Vuereig5bx2r = "";
                            break;

                        case "link":
                            $Vgs5eqsoia35 .= "[@href]";
                            $Vuereig5bx2r = "";
                            break;

                        case "first-line":
                        case ":first-line":
                        case "first-letter":
                        case ":first-letter":
                            
                            $Vklvnn4ydnaz = trim($Vuereig5bx2r, ":");
                            $Vlez3pwaxqss[$Vklvnn4ydnaz] = true;
                            break;

                            
                        case "focus":
                        case "active":
                        case "hover":
                        case "visited":
                            $Vgs5eqsoia35 .= "[false()]";
                            $Vuereig5bx2r = "";
                            break;

                        
                        case "before":
                        case ":before":
                        case "after":
                        case ":after":
                            $Vksopkgqixkyos = trim($Vuereig5bx2r, ":");
                            $Vlez3pwaxqss[$Vksopkgqixkyos] = true;
                            if (!$Vaqbz23cd1j4) {
                                $Vgs5eqsoia35 .= "/*[@$Vksopkgqixkyos]";
                            }

                            $Vuereig5bx2r = "";
                            break;

                        case "empty":
                            $Vgs5eqsoia35 .= "[not(*) and not(normalize-space())]";
                            $Vuereig5bx2r = "";
                            break;

                        case "disabled":
                        case "checked":
                            $Vgs5eqsoia35 .= "[@$Vuereig5bx2r]";
                            $Vuereig5bx2r = "";
                            break;

                        case "enabled":
                            $Vgs5eqsoia35 .= "[not(@disabled)]";
                            $Vuereig5bx2r = "";
                            break;

                        
                        default:
                            $Vgs5eqsoia35 = "/../.."; 
                            $Vuereig5bx2r = "";
                            break;
                    }

                    break;

                case "[":
                    
                    $Vrr3orqjztc2ttr_delimiters = array("=", "]", "~", "|", "$", "^", "*");
                    $Vuereig5bx2r_len = mb_strlen($Vuereig5bx2r);
                    $V0hg12l10vfx = 0;

                    $Vrr3orqjztc2ttr = "";
                    $V4t5vpmksiny = "";
                    $Vqfra35f14fv = "";

                    while ($V0hg12l10vfx < $Vuereig5bx2r_len) {
                        if (in_array($Vuereig5bx2r[$V0hg12l10vfx], $Vrr3orqjztc2ttr_delimiters)) {
                            break;
                        }
                        $Vrr3orqjztc2ttr .= $Vuereig5bx2r[$V0hg12l10vfx++];
                    }

                    switch ($Vuereig5bx2r[$V0hg12l10vfx]) {

                        case "~":
                        case "|":
                        case "$":
                        case "^":
                        case "*":
                            $V4t5vpmksiny .= $Vuereig5bx2r[$V0hg12l10vfx++];

                            if ($Vuereig5bx2r[$V0hg12l10vfx] !== "=") {
                                throw new Exception("Invalid CSS selector syntax: invalid attribute selector: $Vzl0bw2315jk");
                            }

                            $V4t5vpmksiny .= $Vuereig5bx2r[$V0hg12l10vfx];
                            break;

                        case "=":
                            $V4t5vpmksiny = "=";
                            break;

                    }

                    
                    if ($V4t5vpmksiny != "") {
                        $V0hg12l10vfx++;
                        while ($V0hg12l10vfx < $Vuereig5bx2r_len) {
                            if ($Vuereig5bx2r[$V0hg12l10vfx] === "]") {
                                break;
                            }
                            $Vqfra35f14fv .= $Vuereig5bx2r[$V0hg12l10vfx++];
                        }
                    }

                    if ($Vrr3orqjztc2ttr == "") {
                        throw new Exception("Invalid CSS selector syntax: missing attribute name");
                    }

                    $Vqfra35f14fv = trim($Vqfra35f14fv, "\"'");

                    switch ($V4t5vpmksiny) {

                        case "":
                            $Vgs5eqsoia35 .= "[@$Vrr3orqjztc2ttr]";
                            break;

                        case "=":
                            $Vgs5eqsoia35 .= "[@$Vrr3orqjztc2ttr=\"$Vqfra35f14fv\"]";
                            break;

                        case "~=":
                            
                            
                            $Vqfra35f14fvs = explode(" ", $Vqfra35f14fv);
                            $Vgs5eqsoia35 .= "[";

                            foreach ($Vqfra35f14fvs as $Vzyqcsfbm3q4) {
                                $Vgs5eqsoia35 .= "@$Vrr3orqjztc2ttr=\"$Vzyqcsfbm3q4\" or ";
                            }

                            $Vgs5eqsoia35 = rtrim($Vgs5eqsoia35, " or ") . "]";
                            break;

                        case "|=":
                            $Vqfra35f14fvs = explode("-", $Vqfra35f14fv);
                            $Vgs5eqsoia35 .= "[";

                            foreach ($Vqfra35f14fvs as $Vzyqcsfbm3q4) {
                                $Vgs5eqsoia35 .= "starts-with(@$Vrr3orqjztc2ttr, \"$Vzyqcsfbm3q4\") or ";
                            }

                            $Vgs5eqsoia35 = rtrim($Vgs5eqsoia35, " or ") . "]";
                            break;

                        case "$=":
                            $Vgs5eqsoia35 .= "[substring(@$Vrr3orqjztc2ttr, string-length(@$Vrr3orqjztc2ttr)-" . (strlen($Vqfra35f14fv) - 1) . ")=\"$Vqfra35f14fv\"]";
                            break;

                        case "^=":
                            $Vgs5eqsoia35 .= "[starts-with(@$Vrr3orqjztc2ttr,\"$Vqfra35f14fv\")]";
                            break;

                        case "*=":
                            $Vgs5eqsoia35 .= "[contains(@$Vrr3orqjztc2ttr,\"$Vqfra35f14fv\")]";
                            break;
                    }

                    break;
            }
        }
        $V3xsptcgzss2++;






















        
        if (mb_strlen($Vgs5eqsoia35) > 2) {
            $Vgs5eqsoia35 = rtrim($Vgs5eqsoia35, "/");
        }

        return array("query" => $Vgs5eqsoia35, "pseudo_elements" => $Vlez3pwaxqss);
    }

    
    protected function _selector_an_plus_b($Vnrwxmclh5e4, $Vys2uyk524ko = false)
    {
        $Vnrwxmclh5e4 = preg_replace("/\s/", "", $Vnrwxmclh5e4);
        if (!preg_match("/^(?P<a>-?[0-9]*)?n(?P<b>[-+]?[0-9]+)?$/", $Vnrwxmclh5e4, $Vxve4maip4vq)) {
            return "false()";
        }

        $Vrr3orqjztc2 = ((isset($Vxve4maip4vq["a"]) && $Vxve4maip4vq["a"] !== "") ? intval($Vxve4maip4vq["a"]) : 1);
        $Vbz3vmbr1h2v = ((isset($Vxve4maip4vq["b"]) && $Vxve4maip4vq["b"] !== "") ? intval($Vxve4maip4vq["b"]) : 0);

        $Vksopkgqixkyosition = ($Vys2uyk524ko ? "(last()-position()+1)" : "position()");

        if ($Vbz3vmbr1h2v == 0) {
            return "($Vksopkgqixkyosition mod $Vrr3orqjztc2) = 0";
        } else {
            $Vv03lfntnmczompare = (($Vrr3orqjztc2 < 0) ? "<=" : ">=");
            $Vbz3vmbr1h2v2 = -$Vbz3vmbr1h2v;
            if ($Vbz3vmbr1h2v2 >= 0) {
                $Vbz3vmbr1h2v2 = "+$Vbz3vmbr1h2v2";
            }
            return "($Vksopkgqixkyosition $Vv03lfntnmczompare $Vbz3vmbr1h2v) and ((($Vksopkgqixkyosition $Vbz3vmbr1h2v2) mod " . abs($Vrr3orqjztc2) . ") = 0)";
        }
    }

    
    function apply_styles(FrameTree $Vk50pfxtkvxy)
    {
        
        
        
        
        

        
        
        

        

        $Vdidzwb0w3vcs = array();
        $Vzez0xu0p4f3 = new DOMXPath($Vk50pfxtkvxy->get_dom());
        $Vi3tzeasy1pp = $this->_dompdf->getOptions()->getDebugCss();

        
        foreach ($this->_styles as $Vzl0bw2315jk => $Vzl0bw2315jk_styles) {
            
            foreach ($Vzl0bw2315jk_styles as $Vdidzwb0w3vc) {
                if (strpos($Vzl0bw2315jk, ":before") === false && strpos($Vzl0bw2315jk, ":after") === false) {
                    continue;
                }

                $Vgs5eqsoia35 = $this->_css_selector_to_xpath($Vzl0bw2315jk, true);

                
                
                $V35gih2bskvz = @$Vzez0xu0p4f3->query('.' . $Vgs5eqsoia35["query"]);
                if ($V35gih2bskvz == null) {
                    Helpers::record_warnings(E_USER_WARNING, "The CSS selector '$Vzl0bw2315jk' is not valid", __FILE__, __LINE__);
                    continue;
                }

                
                foreach ($V35gih2bskvz as $Vbr2bywdrplx) {
                    
                    if ($Vbr2bywdrplx->nodeType != XML_ELEMENT_NODE) {
                        continue;
                    }

                    foreach (array_keys($Vgs5eqsoia35["pseudo_elements"], true, true) as $Vksopkgqixkyos) {
                        
                        if ($Vbr2bywdrplx->hasAttribute("dompdf_{$Vksopkgqixkyos}_frame_id")) {
                            continue;
                        }

                        if (($Vujweq34gtl3rc = $this->_image($Vdidzwb0w3vc->get_prop('content'))) !== "none") {
                            $V5hcgki43s1g = $Vbr2bywdrplx->ownerDocument->createElement("img_generated");
                            $V5hcgki43s1g->setAttribute("src", $Vujweq34gtl3rc);
                        } else {
                            $V5hcgki43s1g = $Vbr2bywdrplx->ownerDocument->createElement("dompdf_generated");
                        }

                        $V5hcgki43s1g->setAttribute($Vksopkgqixkyos, $Vksopkgqixkyos);
                        $Vskyapfetisy = $Vk50pfxtkvxy->insert_node($Vbr2bywdrplx, $V5hcgki43s1g, $Vksopkgqixkyos);
                        $Vbr2bywdrplx->setAttribute("dompdf_{$Vksopkgqixkyos}_frame_id", $Vskyapfetisy);
                    }
                }
            }
        }

        
        foreach ($this->_styles as $Vzl0bw2315jk => $Vzl0bw2315jk_styles) {
            
            foreach ($Vzl0bw2315jk_styles as $Vdidzwb0w3vc) {
                $Vgs5eqsoia35 = $this->_css_selector_to_xpath($Vzl0bw2315jk);

                
                $V35gih2bskvz = @$Vzez0xu0p4f3->query($Vgs5eqsoia35["query"]);
                if ($V35gih2bskvz == null) {
                    Helpers::record_warnings(E_USER_WARNING, "The CSS selector '$Vzl0bw2315jk' is not valid", __FILE__, __LINE__);
                    continue;
                }

                $Vujweq34gtl3pec = $this->_specificity($Vzl0bw2315jk, $Vdidzwb0w3vc->get_origin());

                foreach ($V35gih2bskvz as $Vbr2bywdrplx) {
                    
                    
                    if ($Vbr2bywdrplx->nodeType != XML_ELEMENT_NODE) {
                        continue;
                    }

                    $V3xsptcgzss2d = $Vbr2bywdrplx->getAttribute("frame_id");

                    
                    $Vdidzwb0w3vcs[$V3xsptcgzss2d][$Vujweq34gtl3pec][] = $Vdidzwb0w3vc;
                }
            }
        }

        
        $Vv03lfntnmczanvas = $this->_dompdf->getCanvas();
        $Vksopkgqixkyaper_width = $Vv03lfntnmczanvas->get_width();
        $Vksopkgqixkyaper_height = $Vv03lfntnmczanvas->get_height();
        $Vksopkgqixkyaper_orientation = ($Vksopkgqixkyaper_width > $Vksopkgqixkyaper_height ? "landscape" : "portrait");

        if ($this->_page_styles["base"] && is_array($this->_page_styles["base"]->size)) {
            $Vksopkgqixkyaper_width = $this->_page_styles['base']->size[0];
            $Vksopkgqixkyaper_height = $this->_page_styles['base']->size[1];
            $Vksopkgqixkyaper_orientation = ($Vksopkgqixkyaper_width > $Vksopkgqixkyaper_height ? "landscape" : "portrait");
        }

        
        
        $V222t2tacpsy = false;
        foreach ($Vk50pfxtkvxy->get_frames() as $Vnk2ly5jcvjf) {
            
            if (!$V222t2tacpsy && $this->_page_styles["base"]) {
                $Vdidzwb0w3vc = $this->_page_styles["base"];
            } else {
                $Vdidzwb0w3vc = $this->create_style();
            }

            
            $Vksopkgqixky = $Vnk2ly5jcvjf;
            while ($Vksopkgqixky = $Vksopkgqixky->get_parent()) {
                if ($Vksopkgqixky->get_node()->nodeType == XML_ELEMENT_NODE) {
                    break;
                }
            }

            
            
            if ($Vnk2ly5jcvjf->get_node()->nodeType != XML_ELEMENT_NODE) {
                if ($Vksopkgqixky) {
                    $Vdidzwb0w3vc->inherit($Vksopkgqixky->get_style());
                }

                $Vnk2ly5jcvjf->set_style($Vdidzwb0w3vc);
                continue;
            }

            $V3xsptcgzss2d = $Vnk2ly5jcvjf->get_id();

            
            AttributeTranslator::translate_attributes($Vnk2ly5jcvjf);
            if (($Vujweq34gtl3tr = $Vnk2ly5jcvjf->get_node()->getAttribute(AttributeTranslator::$Vw5xf5zlbnxa)) !== "") {
                $Vdidzwb0w3vcs[$V3xsptcgzss2d][self::SPEC_NON_CSS][] = $this->_parse_properties($Vujweq34gtl3tr);
            }

            
            if (($Vujweq34gtl3tr = $Vnk2ly5jcvjf->get_node()->getAttribute("style")) !== "") {
                
                $Vujweq34gtl3tr = preg_replace("'/\*.*?\*/'si", "", $Vujweq34gtl3tr);

                $Vujweq34gtl3pec = $this->_specificity("!attr", self::ORIG_AUTHOR);
                $Vdidzwb0w3vcs[$V3xsptcgzss2d][$Vujweq34gtl3pec][] = $this->_parse_properties($Vujweq34gtl3tr);
            }

            
            if (isset($Vdidzwb0w3vcs[$V3xsptcgzss2d])) {

                
                $Vrr3orqjztc2pplied_styles = $Vdidzwb0w3vcs[$Vnk2ly5jcvjf->get_id()];

                
                ksort($Vrr3orqjztc2pplied_styles);

                if ($Vi3tzeasy1pp) {
                    $Vcyg5xmwfpxoebug_nodename = $Vnk2ly5jcvjf->get_node()->nodeName;
                    print "<pre>\n[$Vcyg5xmwfpxoebug_nodename\n";
                    foreach ($Vrr3orqjztc2pplied_styles as $Vujweq34gtl3pec => $Vrr3orqjztc2rr) {
                        printf("specificity: 0x%08x\n", $Vujweq34gtl3pec);
                        
                        foreach ($Vrr3orqjztc2rr as $Vujweq34gtl3) {
                            print "[\n";
                            $Vujweq34gtl3->debug_print();
                            print "]\n";
                        }
                    }
                }

                
                $Vrr3orqjztc2cceptedmedia = self::$Vtsi5qvcb2lq;
                $Vrr3orqjztc2cceptedmedia[] = $this->_dompdf->getOptions()->getDefaultMediaType();
                foreach ($Vrr3orqjztc2pplied_styles as $Vrr3orqjztc2rr) {
                    
                    foreach ($Vrr3orqjztc2rr as $Vujweq34gtl3) {
                        $V0vifsuncaba = $Vujweq34gtl3->get_media_queries();
                        foreach ($V0vifsuncaba as $Viygc2djcy2p) {
                            list($Viygc2djcy2p_feature, $Viygc2djcy2p_value) = $Viygc2djcy2p;
                            
                            
                            if (in_array($Viygc2djcy2p_feature, self::$Vwx0tumztswe)) {
                                if ((strlen($Viygc2djcy2p_feature) === 0 && !in_array($Viygc2djcy2p, $Vrr3orqjztc2cceptedmedia)) || (in_array($Viygc2djcy2p, $Vrr3orqjztc2cceptedmedia) && $Viygc2djcy2p_value == "not")) {
                                    continue (3);
                                }
                            } else {
                                switch ($Viygc2djcy2p_feature) {
                                    case "height":
                                        if ($Vksopkgqixkyaper_height !== (float)$Vdidzwb0w3vc->length_in_pt($Viygc2djcy2p_value)) {
                                            continue (3);
                                        }
                                        break;
                                    case "min-height":
                                        if ($Vksopkgqixkyaper_height < (float)$Vdidzwb0w3vc->length_in_pt($Viygc2djcy2p_value)) {
                                            continue (3);
                                        }
                                        break;
                                    case "max-height":
                                        if ($Vksopkgqixkyaper_height > (float)$Vdidzwb0w3vc->length_in_pt($Viygc2djcy2p_value)) {
                                            continue (3);
                                        }
                                        break;
                                    case "width":
                                        if ($Vksopkgqixkyaper_width !== (float)$Vdidzwb0w3vc->length_in_pt($Viygc2djcy2p_value)) {
                                            continue (3);
                                        }
                                        break;
                                    case "min-width":
                                        
                                        if ($Vksopkgqixkyaper_width < (float)$Vdidzwb0w3vc->length_in_pt($Viygc2djcy2p_value)) {
                                            continue (3);
                                        }
                                        break;
                                    case "max-width":
                                        
                                        if ($Vksopkgqixkyaper_width > (float)$Vdidzwb0w3vc->length_in_pt($Viygc2djcy2p_value)) {
                                            continue (3);
                                        }
                                        break;
                                    case "orientation":
                                        if ($Vksopkgqixkyaper_orientation !== $Viygc2djcy2p_value) {
                                            continue (3);
                                        }
                                        break;
                                    default:
                                        Helpers::record_warnings(E_USER_WARNING, "Unknown media query: $Viygc2djcy2p_feature", __FILE__, __LINE__);
                                        break;
                                }
                            }
                        }

                        $Vdidzwb0w3vc->merge($Vujweq34gtl3);
                    }
                }
            }

            
            if ($Vksopkgqixky) {

                if ($Vi3tzeasy1pp) {
                    print "inherit:\n";
                    print "[\n";
                    $Vksopkgqixky->get_style()->debug_print();
                    print "]\n";
                }

                $Vdidzwb0w3vc->inherit($Vksopkgqixky->get_style());
            }

            if ($Vi3tzeasy1pp) {
                print "DomElementStyle:\n";
                print "[\n";
                $Vdidzwb0w3vc->debug_print();
                print "]\n";
                print "/$Vcyg5xmwfpxoebug_nodename]\n</pre>";
            }

            
            $Vnk2ly5jcvjf->set_style($Vdidzwb0w3vc);

            if (!$V222t2tacpsy && $this->_page_styles["base"]) {
                $V222t2tacpsy = true;

                
                if ($Vdidzwb0w3vc->size !== "auto") {
                    list($Vksopkgqixkyaper_width, $Vksopkgqixkyaper_height) = $Vdidzwb0w3vc->size;
                }
                $Vksopkgqixkyaper_width = $Vksopkgqixkyaper_width - (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_left) - (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_right);
                $Vksopkgqixkyaper_height = $Vksopkgqixkyaper_height - (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_top) - (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_bottom);
                $Vksopkgqixkyaper_orientation = ($Vksopkgqixkyaper_width > $Vksopkgqixkyaper_height ? "landscape" : "portrait");
            }
        }

        
        
        foreach (array_keys($this->_styles) as $Vqwhzgethmgj) {
            $this->_styles[$Vqwhzgethmgj] = null;
            unset($this->_styles[$Vqwhzgethmgj]);
        }

    }

    
    private function _parse_css($Vujweq34gtl3tr)
    {

        $Vujweq34gtl3tr = trim($Vujweq34gtl3tr);

        
        $Vwbqaqisytil = preg_replace(array(
            "'/\*.*?\*/'si",
            "/^<!--/",
            "/-->$/"
        ), "", $Vujweq34gtl3tr);

        

        
        $Vvht4h04zxje =
            "/\s*                                   # Skip leading whitespace                             \n" .
            "( @([^\s{]+)\s*([^{;]*) (?:;|({)) )?   # Match @rules followed by ';' or '{'                 \n" .
            "(?(1)                                  # Only parse sub-sections if we're in an @rule...     \n" .
            "  (?(4)                                # ...and if there was a leading '{'                   \n" .
            "    \s*( (?:(?>[^{}]+) ({)?            # Parse rulesets and individual @page rules           \n" .
            "            (?(6) (?>[^}]*) }) \s*)+?                                                        \n" .
            "       )                                                                                     \n" .
            "   })                                  # Balancing '}'                                       \n" .
            "|                                      # Branch to match regular rules (not preceded by '@') \n" .
            "([^{]*{[^}]*}))                        # Parse normal rulesets                               \n" .
            "/xs";

        if (preg_match_all($Vvht4h04zxje, $Vwbqaqisytil, $Vxve4maip4vq, PREG_SET_ORDER) === false) {
            
            throw new Exception("Error parsing css file: preg_match_all() failed.");
        }

        
        
        
        
        
        
        
        
        
        
        

        $Viygc2djcy2p_regex = "/(?:((only|not)?\s*(" . implode("|", self::$Vwx0tumztswe) . "))|(\s*\(\s*((?:(min|max)-)?([\w\-]+))\s*(?:\:\s*(.*?)\s*)?\)))/isx";

        
        foreach ($Vxve4maip4vq as $Vyupu15qqw5c) {
            $Vyupu15qqw5c[2] = trim($Vyupu15qqw5c[2]);

            if ($Vyupu15qqw5c[2] !== "") {
                
                switch ($Vyupu15qqw5c[2]) {

                    case "import":
                        $this->_parse_import($Vyupu15qqw5c[3]);
                        break;

                    case "media":
                        $Vrr3orqjztc2cceptedmedia = self::$Vtsi5qvcb2lq;
                        $Vrr3orqjztc2cceptedmedia[] = $this->_dompdf->getOptions()->getDefaultMediaType();

                        $V0vifsuncaba = preg_split("/\s*,\s*/", mb_strtolower(trim($Vyupu15qqw5c[3])));
                        foreach ($V0vifsuncaba as $Viygc2djcy2p) {
                            if (in_array($Viygc2djcy2p, $Vrr3orqjztc2cceptedmedia)) {
                                
                                $this->_parse_sections($Vyupu15qqw5c[5]);
                                break;
                            } elseif (!in_array($Viygc2djcy2p, self::$Vwx0tumztswe)) {
                                
                                if (preg_match_all($Viygc2djcy2p_regex, $Viygc2djcy2p, $Viygc2djcy2p_matches, PREG_SET_ORDER) !== false) {
                                    $Vqralsuzgne5 = array();
                                    foreach ($Viygc2djcy2p_matches as $Viygc2djcy2p_match) {
                                        if (empty($Viygc2djcy2p_match[1]) === false) {
                                            $Viygc2djcy2p_feature = strtolower($Viygc2djcy2p_match[3]);
                                            $Viygc2djcy2p_value = strtolower($Viygc2djcy2p_match[2]);
                                            $Vqralsuzgne5[] = array($Viygc2djcy2p_feature, $Viygc2djcy2p_value);
                                        } else if (empty($Viygc2djcy2p_match[4]) === false) {
                                            $Viygc2djcy2p_feature = strtolower($Viygc2djcy2p_match[5]);
                                            $Viygc2djcy2p_value = (array_key_exists(8, $Viygc2djcy2p_match) ? strtolower($Viygc2djcy2p_match[8]) : null);
                                            $Vqralsuzgne5[] = array($Viygc2djcy2p_feature, $Viygc2djcy2p_value);
                                        }
                                    }
                                    $this->_parse_sections($Vyupu15qqw5c[5], $Vqralsuzgne5);
                                    break;
                                }
                            }
                        }
                        break;

                    case "page":
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        

                        
                        $Vksopkgqixkyage_selector = trim($Vyupu15qqw5c[3]);

                        $Vqwhzgethmgj = null;
                        switch ($Vksopkgqixkyage_selector) {
                            case "":
                                $Vqwhzgethmgj = "base";
                                break;

                            case ":left":
                            case ":right":
                            case ":odd":
                            case ":even":
                            
                            case ":first":
                                $Vqwhzgethmgj = $Vksopkgqixkyage_selector;

                            default:
                                continue;
                        }

                        
                        if (empty($this->_page_styles[$Vqwhzgethmgj])) {
                            $this->_page_styles[$Vqwhzgethmgj] = $this->_parse_properties($Vyupu15qqw5c[5]);
                        } else {
                            $this->_page_styles[$Vqwhzgethmgj]->merge($this->_parse_properties($Vyupu15qqw5c[5]));
                        }
                        break;

                    case "font-face":
                        $this->_parse_font_face($Vyupu15qqw5c[5]);
                        break;

                    default:
                        
                        break;
                }

                continue;
            }

            if ($Vyupu15qqw5c[7] !== "") {
                $this->_parse_sections($Vyupu15qqw5c[7]);
            }

        }
    }

    
    protected function _image($Vzyqcsfbm3q4)
    {
        $Vi3tzeasy1pp = $this->_dompdf->getOptions()->getDebugCss();
        $Vhgbyoewrl3x_url = "none";

        if (mb_strpos($Vzyqcsfbm3q4, "url") === false) {
            $Vio2vixcckdr = "none"; 
        } else {
            $Vzyqcsfbm3q4 = preg_replace("/url\(\s*['\"]?([^'\")]+)['\"]?\s*\)/", "\\1", trim($Vzyqcsfbm3q4));

            
            $Vhgbyoewrl3x_url = Helpers::explode_url($Vzyqcsfbm3q4);
            if ($Vhgbyoewrl3x_url["protocol"] == "" && $this->get_protocol() == "") {
                if ($Vhgbyoewrl3x_url["path"][0] === '/' || $Vhgbyoewrl3x_url["path"][0] === '\\') {
                    $Vio2vixcckdr = $_SERVER["DOCUMENT_ROOT"] . '/';
                } else {
                    $Vio2vixcckdr = $this->get_base_path();
                }

                $Vio2vixcckdr .= $Vhgbyoewrl3x_url["path"] . $Vhgbyoewrl3x_url["file"];
                $Vio2vixcckdr = realpath($Vio2vixcckdr);
                
                
                if (!$Vio2vixcckdr) {
                    $Vio2vixcckdr = 'none';
                }
            } else {
                $Vio2vixcckdr = Helpers::build_url($this->get_protocol(),
                    $this->get_host(),
                    $this->get_base_path(),
                    $Vzyqcsfbm3q4);
            }
        }

        if ($Vi3tzeasy1pp) {
            print "<pre>[_image\n";
            print_r($Vhgbyoewrl3x_url);
            print $this->get_protocol() . "\n" . $this->get_base_path() . "\n" . $Vio2vixcckdr . "\n";
            print "_image]</pre>";;
        }

        return $Vio2vixcckdr;
    }

    
    private function _parse_import($Vsp0omgzz2yw)
    {
        $Vrr3orqjztc2rr = preg_split("/[\s\n,]/", $Vsp0omgzz2yw, -1, PREG_SPLIT_NO_EMPTY);
        $Vsp0omgzz2yw = array_shift($Vrr3orqjztc2rr);
        $Vrr3orqjztc2ccept = false;

        if (count($Vrr3orqjztc2rr) > 0) {
            $Vrr3orqjztc2cceptedmedia = self::$Vtsi5qvcb2lq;
            $Vrr3orqjztc2cceptedmedia[] = $this->_dompdf->getOptions()->getDefaultMediaType();

            
            foreach ($Vrr3orqjztc2rr as $Vxeifmjzikkj) {
                if (in_array(mb_strtolower(trim($Vxeifmjzikkj)), $Vrr3orqjztc2cceptedmedia)) {
                    $Vrr3orqjztc2ccept = true;
                    break;
                }
            }

        } else {
            
            $Vrr3orqjztc2ccept = true;
        }

        if ($Vrr3orqjztc2ccept) {
            
            $V3i5fom43o3t = $this->_protocol;
            $Vg5lte3qjxow = $this->_base_host;
            $Vio2vixcckdr = $this->_base_path;

            
            
            
            
            

            $Vsp0omgzz2yw = $this->_image($Vsp0omgzz2yw);

            $this->load_css_file($Vsp0omgzz2yw);

            
            $this->_protocol = $V3i5fom43o3t;
            $this->_base_host = $Vg5lte3qjxow;
            $this->_base_path = $Vio2vixcckdr;
        }

    }

    
    private function _parse_font_face($Vujweq34gtl3tr)
    {
        $Vcyg5xmwfpxoescriptors = $this->_parse_properties($Vujweq34gtl3tr);

        preg_match_all("/(url|local)\s*\([\"\']?([^\"\'\)]+)[\"\']?\)\s*(format\s*\([\"\']?([^\"\'\)]+)[\"\']?\))?/i", $Vcyg5xmwfpxoescriptors->src, $Vujweq34gtl3rc);

        $Vujweq34gtl3ources = array();
        $Vzyqcsfbm3q4id_sources = array();

        foreach ($Vujweq34gtl3rc[0] as $V3xsptcgzss2 => $Vqfra35f14fv) {
            $Vujweq34gtl3ource = array(
                "local" => strtolower($Vujweq34gtl3rc[1][$V3xsptcgzss2]) === "local",
                "uri" => $Vujweq34gtl3rc[2][$V3xsptcgzss2],
                "format" => strtolower($Vujweq34gtl3rc[4][$V3xsptcgzss2]),
                "path" => Helpers::build_url($this->_protocol, $this->_base_host, $this->_base_path, $Vujweq34gtl3rc[2][$V3xsptcgzss2]),
            );

            if (!$Vujweq34gtl3ource["local"] && in_array($Vujweq34gtl3ource["format"], array("", "truetype"))) {
                $Vzyqcsfbm3q4id_sources[] = $Vujweq34gtl3ource;
            }

            $Vujweq34gtl3ources[] = $Vujweq34gtl3ource;
        }

        
        if (empty($Vzyqcsfbm3q4id_sources)) {
            return;
        }

        $Vdidzwb0w3vc = array(
            "family" => $Vcyg5xmwfpxoescriptors->get_font_family_raw(),
            "weight" => $Vcyg5xmwfpxoescriptors->font_weight,
            "style" => $Vcyg5xmwfpxoescriptors->font_style,
        );

        $this->getFontMetrics()->registerFont($Vdidzwb0w3vc, $Vzyqcsfbm3q4id_sources[0]["path"], $this->_dompdf->getHttpContext());
    }

    
    private function _parse_properties($Vujweq34gtl3tr)
    {
        $Vksopkgqixkyroperties = preg_split("/;(?=(?:[^\(]*\([^\)]*\))*(?![^\)]*\)))/", $Vujweq34gtl3tr);
        $Vi3tzeasy1pp = $this->_dompdf->getOptions()->getDebugCss();

        if ($Vi3tzeasy1pp) {
            print '[_parse_properties';
        }

        
        $Vdidzwb0w3vc = new Style($this, Stylesheet::ORIG_AUTHOR);

        foreach ($Vksopkgqixkyroperties as $Vksopkgqixkyrop) {
            
            
            
            
            
            
            
            
            
            
            

            
            if ($Vi3tzeasy1pp) print '(';

            $V3xsptcgzss2mportant = false;
            $Vksopkgqixkyrop = trim($Vksopkgqixkyrop);

            if (substr($Vksopkgqixkyrop, -9) === 'important') {
                $Vksopkgqixkyrop_tmp = rtrim(substr($Vksopkgqixkyrop, 0, -9));

                if (substr($Vksopkgqixkyrop_tmp, -1) === '!') {
                    $Vksopkgqixkyrop = rtrim(substr($Vksopkgqixkyrop_tmp, 0, -1));
                    $V3xsptcgzss2mportant = true;
                }
            }

            if ($Vksopkgqixkyrop === "") {
                if ($Vi3tzeasy1pp) print 'empty)';
                continue;
            }

            $V3xsptcgzss2 = mb_strpos($Vksopkgqixkyrop, ":");
            if ($V3xsptcgzss2 === false) {
                if ($Vi3tzeasy1pp) print 'novalue' . $Vksopkgqixkyrop . ')';
                continue;
            }

            $Vksopkgqixkyrop_name = rtrim(mb_strtolower(mb_substr($Vksopkgqixkyrop, 0, $V3xsptcgzss2)));
            $Vqfra35f14fv = ltrim(mb_substr($Vksopkgqixkyrop, $V3xsptcgzss2 + 1));
            if ($Vi3tzeasy1pp) print $Vksopkgqixkyrop_name . ':=' . $Vqfra35f14fv . ($V3xsptcgzss2mportant ? '!IMPORTANT' : '') . ')';
            
            
            
            
            
            
            if ($V3xsptcgzss2mportant) {
                $Vdidzwb0w3vc->important_set($Vksopkgqixkyrop_name);
            }
            
            $Vdidzwb0w3vc->$Vksopkgqixkyrop_name = $Vqfra35f14fv;
            
        }
        if ($Vi3tzeasy1pp) print '_parse_properties]';

        return $Vdidzwb0w3vc;
    }

    
    private function _parse_sections($Vujweq34gtl3tr, $V0vifsuncaba = array())
    {
        
        

        $Vksopkgqixkyatterns = array("/[\\s\n]+/", "/\\s+([>.:+#])\\s+/");
        $Vvht4h04zxjeplacements = array(" ", "\\1");
        $Vujweq34gtl3tr = preg_replace($Vksopkgqixkyatterns, $Vvht4h04zxjeplacements, $Vujweq34gtl3tr);
        $Vi3tzeasy1pp = $this->_dompdf->getOptions()->getDebugCss();

        $Vujweq34gtl3ections = explode("}", $Vujweq34gtl3tr);
        if ($Vi3tzeasy1pp) print '[_parse_sections';
        foreach ($Vujweq34gtl3ections as $Vujweq34gtl3ect) {
            $V3xsptcgzss2 = mb_strpos($Vujweq34gtl3ect, "{");
            if ($V3xsptcgzss2 === false) { continue; }

            
            $Vzl0bw2315jks = preg_split("/,(?![^\(]*\))/", mb_substr($Vujweq34gtl3ect, 0, $V3xsptcgzss2),0, PREG_SPLIT_NO_EMPTY);
            if ($Vi3tzeasy1pp) print '[section';

            $Vdidzwb0w3vc = $this->_parse_properties(trim(mb_substr($Vujweq34gtl3ect, $V3xsptcgzss2 + 1)));

            
            foreach ($Vzl0bw2315jks as $Vzl0bw2315jk) {
                $Vzl0bw2315jk = trim($Vzl0bw2315jk);

                if ($Vzl0bw2315jk == "") {
                    if ($Vi3tzeasy1pp) print '#empty#';
                    continue;
                }
                if ($Vi3tzeasy1pp) print '#' . $Vzl0bw2315jk . '#';
                

                
                if (count($V0vifsuncaba) > 0) {
                    $Vdidzwb0w3vc->set_media_queries($V0vifsuncaba);
                }
                $this->add_style($Vzl0bw2315jk, $Vdidzwb0w3vc);
            }

            if ($Vi3tzeasy1pp) {
                print 'section]';
            }
        }

        if ($Vi3tzeasy1pp) {
            print '_parse_sections]';
        }
    }

    
    public static function getDefaultStylesheet()
    {
        $Vcyg5xmwfpxoir = realpath(__DIR__ . "/../..");
        return $Vcyg5xmwfpxoir . self::DEFAULT_STYLESHEET;
    }

    
    public function setFontMetrics(FontMetrics $Vj1pbeciqvz4)
    {
        $this->fontMetrics = $Vj1pbeciqvz4;
        return $this;
    }

    
    public function getFontMetrics()
    {
        return $this->fontMetrics;
    }

    
    function __toString()
    {
        $Vujweq34gtl3tr = "";
        foreach ($this->_styles as $Vzl0bw2315jk => $Vzl0bw2315jk_styles) {
            
            foreach ($Vzl0bw2315jk_styles as $Vdidzwb0w3vc) {
                $Vujweq34gtl3tr .= "$Vzl0bw2315jk => " . $Vdidzwb0w3vc->__toString() . "\n";
            }
        }

        return $Vujweq34gtl3tr;
    }
}
