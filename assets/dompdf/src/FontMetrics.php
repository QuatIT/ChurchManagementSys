<?php


namespace Dompdf;

use FontLib\Font;


class FontMetrics
{
    
    const CACHE_FILE = "dompdf_font_family_cache.php";

    
    protected $Vsvnz5bsmrgs;

    
    protected $Vvzurwoc24em;

    
    protected $Vf04yd5vmrjx = array();

    
    private $Vi43cktvy0zi;

    
    public function __construct(Canvas $Vvzurwoc24em, Options $Vi43cktvy0zi)
    {
        $this->setCanvas($Vvzurwoc24em);
        $this->setOptions($Vi43cktvy0zi);
        $this->loadFontFamilies();
    }

    
    public function save_font_families()
    {
        $this->saveFontFamilies();
    }

    
    public function saveFontFamilies()
    {
        
        $Vyoxqlnpccdm = sprintf("<?php return array (%s", PHP_EOL);
        foreach ($this->fontLookup as $Vu3vfak1w4uv => $Vnza520455xg) {
            $Vyoxqlnpccdm .= sprintf("  '%s' => array(%s", addslashes($Vu3vfak1w4uv), PHP_EOL);
            foreach ($Vnza520455xg as $Vxicgdp33yi2 => $Vio2vixcckdr) {
                $Vio2vixcckdr = sprintf("'%s'", $Vio2vixcckdr);
                $Vio2vixcckdr = str_replace('\'' . $this->getOptions()->getFontDir() , '$Vuztfk54rrx1 . \'' , $Vio2vixcckdr);
                $Vio2vixcckdr = str_replace('\'' . $this->getOptions()->getRootDir() , '$Vk2wykqydwqb . \'' , $Vio2vixcckdr);
                $Vyoxqlnpccdm .= sprintf("    '%s' => %s,%s", $Vxicgdp33yi2, $Vio2vixcckdr, PHP_EOL);
            }
            $Vyoxqlnpccdm .= sprintf("  ),%s", PHP_EOL);
        }
        $Vyoxqlnpccdm .= ") ?>";
        file_put_contents($this->getCacheFile(), $Vyoxqlnpccdm);
    }

    
    public function load_font_families()
    {
        $this->loadFontFamilies();
    }

    
    public function loadFontFamilies()
    {
        $Vuztfk54rrx1 = $this->getOptions()->getFontDir();
        $Vk2wykqydwqb = $this->getOptions()->getRootDir();

        
        if (!defined("DOMPDF_DIR")) { define("DOMPDF_DIR", $Vk2wykqydwqb); }
        if (!defined("DOMPDF_FONT_DIR")) { define("DOMPDF_FONT_DIR", $Vuztfk54rrx1); }

        $Vtkhurg4sowd = $Vk2wykqydwqb . "/lib/fonts/dompdf_font_family_cache.dist.php";
        $V2iorgggdlao = require $Vtkhurg4sowd;

        if (!is_readable($this->getCacheFile())) {
            $this->fontLookup = $V2iorgggdlao;
            return;
        }

        $Vyoxqlnpccdm = require $this->getCacheFile();

        $this->fontLookup = array();
        if (is_array($this->fontLookup)) {
            foreach ($Vyoxqlnpccdm as $Vqwhzgethmgj => $Vqfra35f14fv) {
                $this->fontLookup[stripslashes($Vqwhzgethmgj)] = $Vqfra35f14fv;
            }
        }

        
        $this->fontLookup += $V2iorgggdlao;
    }

    
    public function register_font($Vdidzwb0w3vc, $V4w3yzeqzfek, $V0skazf5h5xa = null)
    {
        return $this->registerFont($Vdidzwb0w3vc, $V4w3yzeqzfek);
    }

    
    public function registerFont($Vdidzwb0w3vc, $Vjkjrbzdetxb, $V0skazf5h5xa = null)
    {
        $Vjkcyqqklsga = mb_strtolower($Vdidzwb0w3vc["family"]);
        $Vk31cmghwxrd = $this->getFontFamilies();

        $Voeexclyb0j3 = array();
        if (isset($Vk31cmghwxrd[$Vjkcyqqklsga])) {
            $Voeexclyb0j3 = $Vk31cmghwxrd[$Vjkcyqqklsga];
        }

        $Vdidzwb0w3vcString = $this->getType("{$Vdidzwb0w3vc['weight']} {$Vdidzwb0w3vc['style']}");
        if (isset($Voeexclyb0j3[$Vdidzwb0w3vcString])) {
            return true;
        }

        $Vuztfk54rrx1 = $this->getOptions()->getFontDir();
        $Vvhba1i51n3u = md5($Vjkjrbzdetxb);
        $Vsqrqpu2z31o = $Vuztfk54rrx1 . DIRECTORY_SEPARATOR . $Vvhba1i51n3u;
        $Viccrtkea33k = tempnam($this->options->get("tempDir"), "dompdf-font-");

        $Vigltn0kyqrd = $Vsqrqpu2z31o;
        $Vsqrqpu2z31o .= ".".strtolower(pathinfo(parse_url($Vjkjrbzdetxb, PHP_URL_PATH),PATHINFO_EXTENSION));

        $Voeexclyb0j3[$Vdidzwb0w3vcString] = $Vigltn0kyqrd;

        
        list($VjkjrbzdetxbContent, $http_response_header) = @Helpers::getFileContent($Vjkjrbzdetxb, $V0skazf5h5xa);
        if (false === $VjkjrbzdetxbContent) {
            return false;
        }
        file_put_contents($Viccrtkea33k, $VjkjrbzdetxbContent);

        $V3h4z3hxorxj = Font::load($Viccrtkea33k);

        if (!$V3h4z3hxorxj) {
            unlink($Viccrtkea33k);
            return false;
        }

        $V3h4z3hxorxj->parse();
        $V3h4z3hxorxj->saveAdobeFontMetrics("$Vigltn0kyqrd.ufm");
        $V3h4z3hxorxj->close();

        unlink($Viccrtkea33k);

        if ( !file_exists("$Vigltn0kyqrd.ufm") ) {
            return false;
        }

        
        file_put_contents($Vsqrqpu2z31o, $VjkjrbzdetxbContent);

        if ( !file_exists($Vsqrqpu2z31o) ) {
            unlink("$Vigltn0kyqrd.ufm");
            return false;
        }

        $this->setFontFamily($Vjkcyqqklsga, $Voeexclyb0j3);
        $this->saveFontFamilies();

        return true;
    }

    
    public function get_text_width($Vnlbbd31sxbf, $V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4 = 0.0, $Vaohjovek4hi = 0.0)
    {
        
        return $this->getTextWidth($Vnlbbd31sxbf, $V3h4z3hxorxj, $Vlak25col1u3, $Vay4fk3jgmc4, $Vaohjovek4hi);
    }

    
    public function getTextWidth($Vnlbbd31sxbf, $V3h4z3hxorxj, $Vlak25col1u3, $V2qzmw3lruf4 = 0.0, $Vhotl3kvzzhx = 0.0)
    {
        
        static $V1ph4ewhj5yc = array();

        if ($Vnlbbd31sxbf === "") {
            return 0;
        }

        
        $Vleudvfq1zow = !isset($Vnlbbd31sxbf[50]); 

        $Vqwhzgethmgj = "$V3h4z3hxorxj/$Vlak25col1u3/$V2qzmw3lruf4/$Vhotl3kvzzhx";

        if ($Vleudvfq1zow && isset($V1ph4ewhj5yc[$Vqwhzgethmgj][$Vnlbbd31sxbf])) {
            return $V1ph4ewhj5yc[$Vqwhzgethmgj]["$Vnlbbd31sxbf"];
        }

        $Vztt3qdrrikx = $this->getCanvas()->get_text_width($Vnlbbd31sxbf, $V3h4z3hxorxj, $Vlak25col1u3, $V2qzmw3lruf4, $Vhotl3kvzzhx);

        if ($Vleudvfq1zow) {
            $V1ph4ewhj5yc[$Vqwhzgethmgj][$Vnlbbd31sxbf] = $Vztt3qdrrikx;
        }

        return $Vztt3qdrrikx;
    }

    
    public function get_font_height($V3h4z3hxorxj, $Vlak25col1u3)
    {
        return $this->getFontHeight($V3h4z3hxorxj, $Vlak25col1u3);
    }

    
    public function getFontHeight($V3h4z3hxorxj, $Vlak25col1u3)
    {
        return $this->getCanvas()->get_font_height($V3h4z3hxorxj, $Vlak25col1u3);
    }

    
    public function get_font($Vu3vfak1w4uv_raw, $Vetwegihca4v = "normal")
    {
        return $this->getFont($Vu3vfak1w4uv_raw, $Vetwegihca4v);
    }

    
    public function getFont($Vu3vfak1w4uvRaw, $Vc5xef1hsasl = "normal")
    {
        static $V1ph4ewhj5yc = array();

        if (isset($V1ph4ewhj5yc[$Vu3vfak1w4uvRaw][$Vc5xef1hsasl])) {
            return $V1ph4ewhj5yc[$Vu3vfak1w4uvRaw][$Vc5xef1hsasl];
        }

        

        $Vt33g5i2zccw = strtolower($Vc5xef1hsasl);

        if ($Vu3vfak1w4uvRaw) {
            $Vu3vfak1w4uv = str_replace(array("'", '"'), "", strtolower($Vu3vfak1w4uvRaw));

            if (isset($this->fontLookup[$Vu3vfak1w4uv][$Vt33g5i2zccw])) {
                return $V1ph4ewhj5yc[$Vu3vfak1w4uvRaw][$Vc5xef1hsasl] = $this->fontLookup[$Vu3vfak1w4uv][$Vt33g5i2zccw];
            }

            return null;
        }

        $Vu3vfak1w4uv = "serif";

        if (isset($this->fontLookup[$Vu3vfak1w4uv][$Vt33g5i2zccw])) {
            return $V1ph4ewhj5yc[$Vu3vfak1w4uvRaw][$Vc5xef1hsasl] = $this->fontLookup[$Vu3vfak1w4uv][$Vt33g5i2zccw];
        }

        if (!isset($this->fontLookup[$Vu3vfak1w4uv])) {
            return null;
        }

        $Vu3vfak1w4uv = $this->fontLookup[$Vu3vfak1w4uv];

        foreach ($Vu3vfak1w4uv as $Vnkb4ukmwd0n => $V3h4z3hxorxj) {
            if (strpos($Vt33g5i2zccw, $Vnkb4ukmwd0n) !== false) {
                return $V1ph4ewhj5yc[$Vu3vfak1w4uvRaw][$Vc5xef1hsasl] = $V3h4z3hxorxj;
            }
        }

        if ($Vt33g5i2zccw !== "normal") {
            foreach ($Vu3vfak1w4uv as $Vnkb4ukmwd0n => $V3h4z3hxorxj) {
                if ($Vnkb4ukmwd0n !== "normal") {
                    return $V1ph4ewhj5yc[$Vu3vfak1w4uvRaw][$Vc5xef1hsasl] = $V3h4z3hxorxj;
                }
            }
        }

        $Vt33g5i2zccw = "normal";

        if (isset($Vu3vfak1w4uv[$Vt33g5i2zccw])) {
            return $V1ph4ewhj5yc[$Vu3vfak1w4uvRaw][$Vc5xef1hsasl] = $Vu3vfak1w4uv[$Vt33g5i2zccw];
        }

        return null;
    }

    
    public function get_family($Vu3vfak1w4uv)
    {
        return $this->getFamily($Vu3vfak1w4uv);
    }

    
    public function getFamily($Vu3vfak1w4uv)
    {
        $Vu3vfak1w4uv = str_replace(array("'", '"'), "", mb_strtolower($Vu3vfak1w4uv));

        if (isset($this->fontLookup[$Vu3vfak1w4uv])) {
            return $this->fontLookup[$Vu3vfak1w4uv];
        }

        return null;
    }

    
    public function get_type($Vxeifmjzikkj)
    {
        return $this->getType($Vxeifmjzikkj);
    }

    
    public function getType($Vxeifmjzikkj)
    {
        if (preg_match("/bold/i", $Vxeifmjzikkj)) {
            if (preg_match("/italic|oblique/i", $Vxeifmjzikkj)) {
                $Vxeifmjzikkj = "bold_italic";
            } else {
                $Vxeifmjzikkj = "bold";
            }
        } elseif (preg_match("/italic|oblique/i", $Vxeifmjzikkj)) {
            $Vxeifmjzikkj = "italic";
        } else {
            $Vxeifmjzikkj = "normal";
        }

        return $Vxeifmjzikkj;
    }

    
    public function get_font_families()
    {
        return $this->getFontFamilies();
    }

    
    public function getFontFamilies()
    {
        return $this->fontLookup;
    }

    
    public function set_font_family($Vjkcyqqklsga, $Voeexclyb0j3)
    {
        $this->setFontFamily($Vjkcyqqklsga, $Voeexclyb0j3);
    }

    
    public function setFontFamily($Vjkcyqqklsga, $Voeexclyb0j3)
    {
        $this->fontLookup[mb_strtolower($Vjkcyqqklsga)] = $Voeexclyb0j3;
    }

    
    public function getCacheFile()
    {
        return $this->getOptions()->getFontDir() . DIRECTORY_SEPARATOR . self::CACHE_FILE;
    }

    
    public function setOptions(Options $Vi43cktvy0zi)
    {
        $this->options = $Vi43cktvy0zi;
        return $this;
    }

    
    public function getOptions()
    {
        return $this->options;
    }

    
    public function setCanvas(Canvas $Vvzurwoc24em)
    {
        $this->canvas = $Vvzurwoc24em;
        
        $this->pdf = $Vvzurwoc24em;
        return $this;
    }

    
    public function getCanvas()
    {
        return $this->canvas;
    }
}
