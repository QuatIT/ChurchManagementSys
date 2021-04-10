<?php

namespace Dompdf;

use DOMDocument;
use DOMNode;
use Dompdf\Adapter\CPDF;
use DOMXPath;
use Dompdf\Frame\Factory;
use Dompdf\Frame\FrameTree;
use HTML5_Tokenizer;
use HTML5_TreeBuilder;
use Dompdf\Image\Cache;
use Dompdf\Renderer\ListBullet;
use Dompdf\Css\Stylesheet;


class Dompdf
{
    
    private $Vw1yjchm5her = 'dompdf';

    
    private $Vzag2nuss5ir;

    
    private $Vk50pfxtkvxy;

    
    private $Vwbqaqisytil;

    
    private $Vvzurwoc24em;

    
    private $Vhx520bwwscb;

    
    private $Vcabhwkfic4s = "portrait";

    
    private $Voyqg0byaa44 = array();

    
    private $Vqebiy40npd4;

    
    private $V53jx5fz0420 = "";

    
    private $V1epxxbvywif = "";

    
    private $V3i5fom43o3t;

    
    private $Vxktiqysvpsh;

    
    private $Vixzh3xerkhl = null;

    
    private $Vkzy4elw2nqj = null;

    
    private $Vb2szc1zpfvi = false;

    
    private $V4ljvwpcj2vd = "Fit";

    
    private $V4ljvwpcj2vdOptions = array();

    
    private $Vnq4lhg5m3tj = false;

    
    private $Vgr4wid45rz2 = array(null, "", "file://", "http://", "https://");

    
    private $Vfyazejtuxkl = array("htm", "html");

    
    private $Vvnzeorb5je1 = array();

    
    private $Vi43cktvy0zi;

    
    private $Vj1pbeciqvz4;

    
    public static $Vjs1fcufodei = array(
        "courier", "courier-bold", "courier-oblique", "courier-boldoblique",
        "helvetica", "helvetica-bold", "helvetica-oblique", "helvetica-boldoblique",
        "times-roman", "times-bold", "times-italic", "times-bolditalic",
        "symbol", "zapfdinbats"
    );

    
    public static $Vnhrp1uthhyy = array(
        "courier", "courier-bold", "courier-oblique", "courier-boldoblique",
        "helvetica", "helvetica-bold", "helvetica-oblique", "helvetica-boldoblique",
        "times-roman", "times-bold", "times-italic", "times-bolditalic",
        "symbol", "zapfdinbats"
    );

    
    public function __construct($Vi43cktvy0zi = null)
    {
        mb_internal_encoding('UTF-8');

        if (isset($Vi43cktvy0zi) && $Vi43cktvy0zi instanceof Options) {
            $this->setOptions($Vi43cktvy0zi);
        } elseif (is_array($Vi43cktvy0zi)) {
            $this->setOptions(new Options($Vi43cktvy0zi));
        } else {
            $this->setOptions(new Options());
        }

        $Vw1yjchm5herFile = realpath(__DIR__ . '/../VERSION');
        if (file_exists($Vw1yjchm5herFile) && ($Vw1yjchm5her = file_get_contents($Vw1yjchm5herFile)) !== false && $Vw1yjchm5her !== '$Vwjfs1kr0xus:<%h>$') {
          $this->version = sprintf('dompdf %s', $Vw1yjchm5her);
        }

        $this->localeStandard = sprintf('%.1f', 1.0) == '1.0';
        $this->saveLocale();
        $this->paperSize = $this->options->getDefaultPaperSize();
        $this->paperOrientation = $this->options->getDefaultPaperOrientation();

        $this->setCanvas(CanvasFactory::get_instance($this, $this->paperSize, $this->paperOrientation));
        $this->setFontMetrics(new FontMetrics($this->getCanvas(), $this->getOptions()));
        $this->css = new Stylesheet($this);

        $this->restoreLocale();
    }

    
    private function saveLocale()
    {
        if ($this->localeStandard) {
            return;
        }

        $this->systemLocale = setlocale(LC_NUMERIC, "0");
        setlocale(LC_NUMERIC, "C");
    }

    
    private function restoreLocale()
    {
        if ($this->localeStandard) {
            return;
        }

        setlocale(LC_NUMERIC, $this->systemLocale);
    }

    
    public function load_html_file($Vtkhurg4sowd)
    {
        $this->loadHtmlFile($Vtkhurg4sowd);
    }

    
    public function loadHtmlFile($Vtkhurg4sowd)
    {
        $this->saveLocale();

        if (!$this->protocol && !$this->baseHost && !$this->basePath) {
            list($this->protocol, $this->baseHost, $this->basePath) = Helpers::explode_url($Vtkhurg4sowd);
        }
        $V3i5fom43o3t = strtolower($this->protocol);

        if ( !in_array($V3i5fom43o3t, $this->allowedProtocols) ) {
            throw new Exception("Permission denied on $Vtkhurg4sowd. The communication protocol is not supported.");
        }

        if (!$this->options->isRemoteEnabled() && ($V3i5fom43o3t != "" && $V3i5fom43o3t !== "file://")) {
            throw new Exception("Remote file requested, but remote file download is disabled.");
        }

        if ($V3i5fom43o3t == "" || $V3i5fom43o3t === "file://") {
            $Vav3plmnw5hm = realpath($Vtkhurg4sowd);

            $Vn2a2n5vx0fi = realpath($this->options->getChroot());
            if ($Vn2a2n5vx0fi && strpos($Vav3plmnw5hm, $Vn2a2n5vx0fi) !== 0) {
                throw new Exception("Permission denied on $Vtkhurg4sowd. The file could not be found under the directory specified by Options::chroot.");
            }

            $Vrv0pwu03qua = strtolower(pathinfo($Vav3plmnw5hm, PATHINFO_EXTENSION));
            if (!in_array($Vrv0pwu03qua, $this->allowedLocalFileExtensions)) {
                throw new Exception("Permission denied on $Vtkhurg4sowd.");
            }

            if (!$Vav3plmnw5hm) {
                throw new Exception("File '$Vtkhurg4sowd' not found.");
            }

            $Vtkhurg4sowd = $Vav3plmnw5hm;
        }

        list($Vgq55vw3nhgn, $http_response_header) = Helpers::getFileContent($Vtkhurg4sowd, $this->httpContext);
        $Vgpqcvfkvgzo = 'UTF-8';

        
        if (isset($http_response_header)) {
            foreach ($http_response_header as $Vpetw534kjol) {
                if (preg_match("@Content-Type:\s*[\w/]+;\s*?charset=([^\s]+)@i", $Vpetw534kjol, $Vxve4maip4vq)) {
                    $Vgpqcvfkvgzo = strtoupper($Vxve4maip4vq[1]);
                    break;
                }
            }
        }

        $this->restoreLocale();

        $this->loadHtml($Vgq55vw3nhgn, $Vgpqcvfkvgzo);
    }

    
    public function load_html($Vadkcwffkfxw, $Vgpqcvfkvgzo = 'UTF-8')
    {
        $this->loadHtml($Vadkcwffkfxw, $Vgpqcvfkvgzo);
    }

    
    public function loadHtml($Vadkcwffkfxw, $Vgpqcvfkvgzo = 'UTF-8')
    {
        $this->saveLocale();

        
        $Vw1x5y4fzm40 = mb_list_encodings();
        mb_detect_order('auto');
        if (($Vtkhurg4sowd_encoding = mb_detect_encoding($Vadkcwffkfxw, null, true)) === false) {
            $Vtkhurg4sowd_encoding = "auto";
        }
        if (in_array(strtoupper($Vtkhurg4sowd_encoding), array('UTF-8','UTF8')) === false) {
            $Vadkcwffkfxw = mb_convert_encoding($Vadkcwffkfxw, 'UTF-8', $Vtkhurg4sowd_encoding);
        }

        $V3fnfslb5eh4 = array(
            '@<meta\s+http-equiv="Content-Type"\s+content="(?:[\w/]+)(?:;\s*?charset=([^\s"]+))?@i',
            '@<meta\s+content="(?:[\w/]+)(?:;\s*?charset=([^\s"]+))"?\s+http-equiv="Content-Type"@i',
            '@<meta [^>]*charset\s*=\s*["\']?\s*([^"\' ]+)@i',
        );
        foreach ($V3fnfslb5eh4 as $V4qimfiiisf1) {
            if (preg_match($V4qimfiiisf1, $Vadkcwffkfxw, $Vxve4maip4vq)) {
                if (isset($Vxve4maip4vq[1]) && in_array($Vxve4maip4vq[1], $Vw1x5y4fzm40)) {
                    $Vnabd4fe0gkz = $Vxve4maip4vq[1];
                    break;
                }
            }
        }
        if (isset($Vnabd4fe0gkz) && in_array(strtoupper($Vnabd4fe0gkz), array('UTF-8','UTF8')) === false) {
            $Vadkcwffkfxw = preg_replace('/charset=([^\s"]+)/i', 'charset=UTF-8', $Vadkcwffkfxw);
        } elseif (isset($Vnabd4fe0gkz) === false && strpos($Vadkcwffkfxw, '<head>') !== false) {
            $Vadkcwffkfxw = str_replace('<head>', '<head><meta http-equiv="Content-Type" content="text/html;charset=UTF-8">', $Vadkcwffkfxw);
        } elseif (isset($Vnabd4fe0gkz) === false) {
            $Vadkcwffkfxw = '<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">' . $Vadkcwffkfxw;
        }
        
        $Vgpqcvfkvgzo = 'UTF-8';

        
        
        if (substr($Vadkcwffkfxw, 0, 3) == chr(0xEF) . chr(0xBB) . chr(0xBF)) {
            $Vadkcwffkfxw = substr($Vadkcwffkfxw, 3);
        }

        
        set_error_handler(array("\\Dompdf\\Helpers", "record_warnings"));

        
        
        
        $Vnq4lhg5m3tj = false;

        if ($this->options->isHtml5ParserEnabled() && class_exists("HTML5_Tokenizer")) {
            $Vohalsm24lmd = new HTML5_Tokenizer($Vadkcwffkfxw);
            $Vohalsm24lmd->parse();
            $V4qtyvi2vak4 = $Vohalsm24lmd->save();

            
            $Vscyy4wq54th = array("html", "table", "tbody", "thead", "tfoot", "tr");
            foreach ($Vscyy4wq54th as $V1h5itppxcyn) {
                $V35gih2bskvz = $V4qtyvi2vak4->getElementsByTagName($V1h5itppxcyn);

                foreach ($V35gih2bskvz as $Vbr2bywdrplx) {
                    self::removeTextNodes($Vbr2bywdrplx);
                }
            }

            $Vnq4lhg5m3tj = ($Vohalsm24lmd->getTree()->getQuirksMode() > HTML5_TreeBuilder::NO_QUIRKS);
        } else {
            
            
            
            $V4qtyvi2vak4 = new DOMDocument("1.0", $Vgpqcvfkvgzo);
            $V4qtyvi2vak4->preserveWhiteSpace = true;
            $V4qtyvi2vak4->loadHTML($Vadkcwffkfxw);
            $V4qtyvi2vak4->encoding = $Vgpqcvfkvgzo;

            
            $Vscyy4wq54th = array("html", "table", "tbody", "thead", "tfoot", "tr");
            foreach ($Vscyy4wq54th as $V1h5itppxcyn) {
                $V35gih2bskvz = $V4qtyvi2vak4->getElementsByTagName($V1h5itppxcyn);

                foreach ($V35gih2bskvz as $Vbr2bywdrplx) {
                    self::removeTextNodes($Vbr2bywdrplx);
                }
            }

            
            if (preg_match("/^(.+)<!doctype/i", ltrim($Vadkcwffkfxw), $Vxve4maip4vq)) {
                $Vnq4lhg5m3tj = true;
            } 
            elseif (!preg_match("/^<!doctype/i", ltrim($Vadkcwffkfxw), $Vxve4maip4vq)) {
                $Vnq4lhg5m3tj = true;
            } else {
                
                if (!$V4qtyvi2vak4->doctype->publicId && !$V4qtyvi2vak4->doctype->systemId) {
                    $Vnq4lhg5m3tj = false;
                }

                
                if (!preg_match("/xhtml/i", $V4qtyvi2vak4->doctype->publicId)) {
                    $Vnq4lhg5m3tj = true;
                }
            }
        }

        $this->dom = $V4qtyvi2vak4;
        $this->quirksmode = $Vnq4lhg5m3tj;

        $this->tree = new FrameTree($this->dom);

        restore_error_handler();

        $this->restoreLocale();
    }

    
    public static function remove_text_nodes(DOMNode $Vbr2bywdrplx)
    {
        self::removeTextNodes($Vbr2bywdrplx);
    }

    
    public static function removeTextNodes(DOMNode $Vbr2bywdrplx)
    {
        $Vrzhplmxukeb = array();
        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vbr2bywdrplx->childNodes->length; $V3xsptcgzss2++) {
            $Vtcc233inn5m = $Vbr2bywdrplx->childNodes->item($V3xsptcgzss2);
            if ($Vtcc233inn5m->nodeName === "#text") {
                $Vrzhplmxukeb[] = $Vtcc233inn5m;
            }
        }

        foreach ($Vrzhplmxukeb as $Vtcc233inn5m) {
            $Vbr2bywdrplx->removeChild($Vtcc233inn5m);
        }
    }

    
    private function processHtml()
    {
        $this->tree->build_tree();

        $this->css->load_css_file(Stylesheet::getDefaultStylesheet(), Stylesheet::ORIG_UA);

        $V0p12frtk4td = Stylesheet::$Vtsi5qvcb2lq;
        $V0p12frtk4td[] = $this->options->getDefaultMediaType();

        
        $Va4piu2wwuyp = $this->dom->getElementsByTagName("base");
        if ($Va4piu2wwuyp->length && ($Vn2cvawhsrvg = $Va4piu2wwuyp->item(0)->getAttribute("href"))) {
            list($this->protocol, $this->baseHost, $this->basePath) = Helpers::explode_url($Vn2cvawhsrvg);
        }

        
        $this->css->set_protocol($this->protocol);
        $this->css->set_host($this->baseHost);
        $this->css->set_base_path($this->basePath);

        
        $Vxp0j315zxdb = new DOMXPath($this->dom);
        $Vsa0ypalh1k4 = $Vxp0j315zxdb->query("//*[name() = 'link' or name() = 'style']");

        
        foreach ($Vsa0ypalh1k4 as $Vudn5fb5ck4i) {
            switch (strtolower($Vudn5fb5ck4i->nodeName)) {
                
                case "link":
                    if (mb_strtolower(stripos($Vudn5fb5ck4i->getAttribute("rel"), "stylesheet") !== false) || 
                        mb_strtolower($Vudn5fb5ck4i->getAttribute("type")) === "text/css"
                    ) {
                        
                        
                        $Vqsu03tywfg1 = preg_split("/[\s\n,]/", $Vudn5fb5ck4i->getAttribute("media"), -1, PREG_SPLIT_NO_EMPTY);
                        if (count($Vqsu03tywfg1) > 0) {
                            $Vldkkyyqatp4 = false;
                            foreach ($Vqsu03tywfg1 as $Vxeifmjzikkj) {
                                if (in_array(mb_strtolower(trim($Vxeifmjzikkj)), $V0p12frtk4td)) {
                                    $Vldkkyyqatp4 = true;
                                    break;
                                }
                            }

                            if (!$Vldkkyyqatp4) {
                                
                                
                                continue;
                            }
                        }

                        $Vsp0omgzz2yw = $Vudn5fb5ck4i->getAttribute("href");
                        $Vsp0omgzz2yw = Helpers::build_url($this->protocol, $this->baseHost, $this->basePath, $Vsp0omgzz2yw);

                        $this->css->load_css_file($Vsp0omgzz2yw, Stylesheet::ORIG_AUTHOR);
                    }
                    break;

                
                case "style":
                    
                    
                    
                    
                    if ($Vudn5fb5ck4i->hasAttributes() &&
                        ($Vu5kmukuppmo = $Vudn5fb5ck4i->getAttribute("media")) &&
                        !in_array($Vu5kmukuppmo, $V0p12frtk4td)
                    ) {
                        continue;
                    }

                    $Vwbqaqisytil = "";
                    if ($Vudn5fb5ck4i->hasChildNodes()) {
                        $Vtcc233inn5m = $Vudn5fb5ck4i->firstChild;
                        while ($Vtcc233inn5m) {
                            $Vwbqaqisytil .= $Vtcc233inn5m->nodeValue; 
                            $Vtcc233inn5m = $Vtcc233inn5m->nextSibling;
                        }
                    } else {
                        $Vwbqaqisytil = $Vudn5fb5ck4i->nodeValue;
                    }

                    $this->css->load_css($Vwbqaqisytil, Stylesheet::ORIG_AUTHOR);
                    break;
            }
        }
    }

    
    public function enable_caching($Vqebiy40npd4)
    {
        $this->enableCaching($Vqebiy40npd4);
    }

    
    public function enableCaching($Vqebiy40npd4)
    {
        $this->cacheId = $Vqebiy40npd4;
    }

    
    public function parse_default_view($Vqfra35f14fv)
    {
        return $this->parseDefaultView($Vqfra35f14fv);
    }

    
    public function parseDefaultView($Vqfra35f14fv)
    {
        $Vw2fkzqymmgd = array("XYZ", "Fit", "FitH", "FitV", "FitR", "FitB", "FitBH", "FitBV");

        $Vi43cktvy0zi = preg_split("/\s*,\s*/", trim($Vqfra35f14fv));
        $V4ljvwpcj2vd = array_shift($Vi43cktvy0zi);

        if (!in_array($V4ljvwpcj2vd, $Vw2fkzqymmgd)) {
            return false;
        }

        $this->setDefaultView($V4ljvwpcj2vd, $Vi43cktvy0zi);
        return true;
    }

    
    public function render()
    {
        $this->saveLocale();
        $Vi43cktvy0zi = $this->options;

        $Vebh5d4zwcnt = $Vi43cktvy0zi->getLogOutputFile();
        if ($Vebh5d4zwcnt) {
            if (!file_exists($Vebh5d4zwcnt) && is_writable(dirname($Vebh5d4zwcnt))) {
                touch($Vebh5d4zwcnt);
            }

            $this->startTime = microtime(true);
            if (is_writable($Vebh5d4zwcnt)) {
                ob_start();
            }
        }

        $this->processHtml();

        $this->css->apply_styles($this->tree);

        
        $Viysy04qk5mw = $this->css->get_page_styles();
        $Vwhcrvdlm5jo = $Viysy04qk5mw["base"];
        unset($Viysy04qk5mw["base"]);

        foreach ($Viysy04qk5mw as $Vegw1j4ow2oh) {
            $Vegw1j4ow2oh->inherit($Vwhcrvdlm5jo);
        }

        $Vbjicdimbes1 = $this->getPaperSize($Vi43cktvy0zi->getDefaultPaperSize());
        
        
        if (is_array($Vwhcrvdlm5jo->size)) {
            $Vwhcrvdlm5joSize = $Vwhcrvdlm5jo->size;
            $this->setPaper(array(0, 0, $Vwhcrvdlm5joSize[0], $Vwhcrvdlm5joSize[1]));
        }

        $Vhx520bwwscb = $this->getPaperSize();
        if (
            $Vbjicdimbes1[2] !== $Vhx520bwwscb[2] ||
            $Vbjicdimbes1[3] !== $Vhx520bwwscb[3] ||
            $Vi43cktvy0zi->getDefaultPaperOrientation() !== $this->paperOrientation
        ) {
            $this->setCanvas(CanvasFactory::get_instance($this, $this->paperSize, $this->paperOrientation));
            $this->fontMetrics->setCanvas($this->getCanvas());
        }

        $Vvzurwoc24em = $this->getCanvas();

        if ($Vi43cktvy0zi->isFontSubsettingEnabled() && $Vvzurwoc24em instanceof CPDF) {
            foreach ($this->tree->get_frames() as $Vnk2ly5jcvjf) {
                $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
                $Vbr2bywdrplx = $Vnk2ly5jcvjf->get_node();

                
                if ($Vbr2bywdrplx->nodeName === "#text") {
                    $Vecvfxnr4t2k = mb_strtoupper($Vbr2bywdrplx->nodeValue) . mb_strtolower($Vbr2bywdrplx->nodeValue);
                    $Vvzurwoc24em->register_string_subset($Vdidzwb0w3vc->font_family, $Vecvfxnr4t2k);
                    continue;
                }

                
                if ($Vdidzwb0w3vc->display === "list-item") {
                    $Vecvfxnr4t2k = ListBullet::get_counter_chars($Vdidzwb0w3vc->list_style_type);
                    $Vvzurwoc24em->register_string_subset($Vdidzwb0w3vc->font_family, $Vecvfxnr4t2k);
                    $Vvzurwoc24em->register_string_subset($Vdidzwb0w3vc->font_family, '.');
                    continue;
                }

                
                
                
                
                if ($Vnk2ly5jcvjf->get_node()->nodeName == "dompdf_generated") {
                    
                    $Vecvfxnr4t2k = ListBullet::get_counter_chars('decimal');
                    $Vvzurwoc24em->register_string_subset($Vdidzwb0w3vc->font_family, $Vecvfxnr4t2k);
                    $Vecvfxnr4t2k = ListBullet::get_counter_chars('upper-alpha');
                    $Vvzurwoc24em->register_string_subset($Vdidzwb0w3vc->font_family, $Vecvfxnr4t2k);
                    $Vecvfxnr4t2k = ListBullet::get_counter_chars('lower-alpha');
                    $Vvzurwoc24em->register_string_subset($Vdidzwb0w3vc->font_family, $Vecvfxnr4t2k);
                    $Vecvfxnr4t2k = ListBullet::get_counter_chars('lower-greek');
                    $Vvzurwoc24em->register_string_subset($Vdidzwb0w3vc->font_family, $Vecvfxnr4t2k);

                    
                    $Vm2d3kyke1xa = preg_replace_callback("/\\\\([0-9a-fA-F]{0,6})/",
                        function ($Vxve4maip4vq) { return \Dompdf\Helpers::unichr(hexdec($Vxve4maip4vq[1])); },
                        $Vdidzwb0w3vc->content);
                    $Vecvfxnr4t2k = mb_strtoupper($Vdidzwb0w3vc->content) . mb_strtolower($Vdidzwb0w3vc->content) . mb_strtoupper($Vm2d3kyke1xa) . mb_strtolower($Vm2d3kyke1xa);
                    $Vvzurwoc24em->register_string_subset($Vdidzwb0w3vc->font_family, $Vecvfxnr4t2k);
                    continue;
                }
            }
        }

        $Vzlqynjxsspd = null;

        foreach ($this->tree->get_frames() as $Vnk2ly5jcvjf) {
            
            if (is_null($Vzlqynjxsspd)) {
                $Vzlqynjxsspd = Factory::decorate_root($this->tree->get_root(), $this);
                continue;
            }

            
            Factory::decorate_frame($Vnk2ly5jcvjf, $this, $Vzlqynjxsspd);
        }

        
        $Vgn5zkprvskd = $this->dom->getElementsByTagName("title");
        if ($Vgn5zkprvskd->length) {
            $Vvzurwoc24em->add_info("Title", trim($Vgn5zkprvskd->item(0)->nodeValue));
        }

        $Vx5t2qphibki = $this->dom->getElementsByTagName("meta");
        $Vuyz33si2wbg = array(
            "author" => "Author",
            "keywords" => "Keywords",
            "description" => "Subject",
        );
        
        foreach ($Vx5t2qphibki as $V1phfyh5exyy) {
            $Vpgf1maodsla = mb_strtolower($V1phfyh5exyy->getAttribute("name"));
            $Vqfra35f14fv = trim($V1phfyh5exyy->getAttribute("content"));

            if (isset($Vuyz33si2wbg[$Vpgf1maodsla])) {
                $Vvzurwoc24em->add_info($Vuyz33si2wbg[$Vpgf1maodsla], $Vqfra35f14fv);
                continue;
            }

            if ($Vpgf1maodsla === "dompdf.view" && $this->parseDefaultView($Vqfra35f14fv)) {
                $Vvzurwoc24em->set_default_view($this->defaultView, $this->defaultViewOptions);
            }
        }

        $Vzlqynjxsspd->set_containing_block(0, 0,$Vvzurwoc24em->get_width(), $Vvzurwoc24em->get_height());
        $Vzlqynjxsspd->set_renderer(new Renderer($this));

        
        $Vzlqynjxsspd->reflow();

        
        Cache::clear();

        global $Vzm5jqiedkr4, $Vect0zfyvf0c;
        if ($Vect0zfyvf0c && isset($Vzm5jqiedkr4)) {
            echo '<b>Dompdf Warnings</b><br><pre>';
            foreach ($Vzm5jqiedkr4 as $Vmgxrjtj0g2j) {
                echo $Vmgxrjtj0g2j . "\n";
            }

            if ($Vvzurwoc24em instanceof CPDF) {
                echo $Vvzurwoc24em->get_cpdf()->messages;
            }
            echo '</pre>';
            flush();
        }

        if ($Vebh5d4zwcnt && is_writable($Vebh5d4zwcnt)) {
            $this->write_log();
            ob_end_clean();
        }

        $this->restoreLocale();
    }

    
    public function add_info($V4qeqspuux02, $Vqfra35f14fv)
    {
        $Vvzurwoc24em = $this->getCanvas();
        if (!is_null($Vvzurwoc24em)) {
            $Vvzurwoc24em->add_info($V4qeqspuux02, $Vqfra35f14fv);
        }
    }

    
    private function write_log()
    {
        $Vc2qdjq3sjr0 = $this->getOptions()->getLogOutputFile();
        if (!$Vc2qdjq3sjr0 || !is_writable($Vc2qdjq3sjr0)) {
            return;
        }

        $Vnk2ly5jcvjfs = Frame::$Vftvicyb3d1y;
        $Vuxm3of2skwx = memory_get_peak_usage(true) / 1024;
        $Vrsbf4q2bpny = (microtime(true) - $this->startTime) * 1000;

        $Vpu0eaxrabtr = sprintf(
            "<span style='color: #000' title='Frames'>%6d</span>" .
            "<span style='color: #009' title='Memory'>%10.2f KB</span>" .
            "<span style='color: #900' title='Time'>%10.2f ms</span>" .
            "<span  title='Quirksmode'>  " .
            ($this->quirksmode ? "<span style='color: #d00'> ON</span>" : "<span style='color: #0d0'>OFF</span>") .
            "</span><br />", $Vnk2ly5jcvjfs, $Vuxm3of2skwx, $Vrsbf4q2bpny);

        $Vpu0eaxrabtr .= ob_get_contents();
        ob_clean();

        file_put_contents($Vc2qdjq3sjr0, $Vpu0eaxrabtr);
    }

    
    public function stream($Vtkhurg4sowdname = "document.pdf", $Vi43cktvy0zi = array())
    {
        $this->saveLocale();

        $Vvzurwoc24em = $this->getCanvas();
        if (!is_null($Vvzurwoc24em)) {
            $Vvzurwoc24em->stream($Vtkhurg4sowdname, $Vi43cktvy0zi);
        }

        $this->restoreLocale();
    }

    
    public function output($Vi43cktvy0zi = array())
    {
        $this->saveLocale();

        $Vvzurwoc24em = $this->getCanvas();
        if (is_null($Vvzurwoc24em)) {
            return null;
        }

        $Vpu0eaxrabtrput = $Vvzurwoc24em->output($Vi43cktvy0zi);

        $this->restoreLocale();

        return $Vpu0eaxrabtrput;
    }

    
    public function output_html()
    {
        return $this->outputHtml();
    }

    
    public function outputHtml()
    {
        return $this->dom->saveHTML();
    }

    
    public function get_option($Vqwhzgethmgj)
    {
        return $this->options->get($Vqwhzgethmgj);
    }

    
    public function set_option($Vqwhzgethmgj, $Vqfra35f14fv)
    {
        $this->options->set($Vqwhzgethmgj, $Vqfra35f14fv);
        return $this;
    }

    
    public function set_options(array $Vi43cktvy0zi)
    {
        $this->options->set($Vi43cktvy0zi);
        return $this;
    }

    
    public function set_paper($Vlak25col1u3, $Vurj2rpl3rvw = "portrait")
    {
        $this->setPaper($Vlak25col1u3, $Vurj2rpl3rvw);
    }

    
    public function setPaper($Vlak25col1u3, $Vurj2rpl3rvw = "portrait")
    {
        $this->paperSize = $Vlak25col1u3;
        $this->paperOrientation = $Vurj2rpl3rvw;
        return $this;
    }

    
    public function getPaperSize($Vhx520bwwscb = null)
    {
        $Vlak25col1u3 = $Vhx520bwwscb !== null ? $Vhx520bwwscb : $this->paperSize;
        if (is_array($Vlak25col1u3)) {
            return $Vlak25col1u3;
        } else if (isset(Adapter\CPDF::$Vjvvabr4mx10[mb_strtolower($Vlak25col1u3)])) {
            return Adapter\CPDF::$Vjvvabr4mx10[mb_strtolower($Vlak25col1u3)];
        } else {
            return Adapter\CPDF::$Vjvvabr4mx10["letter"];
        }
    }

    
    public function getPaperOrientation()
    {
        return $this->paperOrientation;
    }

    
    public function setTree(FrameTree $Vk50pfxtkvxy)
    {
        $this->tree = $Vk50pfxtkvxy;
        return $this;
    }

    
    public function get_tree()
    {
        return $this->getTree();
    }

    
    public function getTree()
    {
        return $this->tree;
    }

    
    public function set_protocol($V3i5fom43o3t)
    {
        return $this->setProtocol($V3i5fom43o3t);
    }

    
    public function setProtocol($V3i5fom43o3t)
    {
        $this->protocol = $V3i5fom43o3t;
        return $this;
    }

    
    public function get_protocol()
    {
        return $this->getProtocol();
    }

    
    public function getProtocol()
    {
        return $this->protocol;
    }

    
    public function set_host($Vg5lte3qjxow)
    {
        $this->setBaseHost($Vg5lte3qjxow);
    }

    
    public function setBaseHost($V53jx5fz0420)
    {
        $this->baseHost = $V53jx5fz0420;
        return $this;
    }

    
    public function get_host()
    {
        return $this->getBaseHost();
    }

    
    public function getBaseHost()
    {
        return $this->baseHost;
    }

    
    public function set_base_path($Vio2vixcckdr)
    {
        $this->setBasePath($Vio2vixcckdr);
    }

    
    public function setBasePath($V1epxxbvywif)
    {
        $this->basePath = $V1epxxbvywif;
        return $this;
    }

    
    public function get_base_path()
    {
        return $this->getBasePath();
    }

    
    public function getBasePath()
    {
        return $this->basePath;
    }

    
    public function set_default_view($Vry1mfykcs5g, $Vi43cktvy0zi)
    {
        return $this->setDefaultView($Vry1mfykcs5g, $Vi43cktvy0zi);
    }

    
    public function setDefaultView($V4ljvwpcj2vd, $Vi43cktvy0zi)
    {
        $this->defaultView = $V4ljvwpcj2vd;
        $this->defaultViewOptions = $Vi43cktvy0zi;
        return $this;
    }

    
    public function set_http_context($Vrqqdndhp51s)
    {
        return $this->setHttpContext($Vrqqdndhp51s);
    }

    
    public function setHttpContext($Vxktiqysvpsh)
    {
        $this->httpContext = $Vxktiqysvpsh;
        return $this;
    }

    
    public function get_http_context()
    {
        return $this->getHttpContext();
    }

    
    public function getHttpContext()
    {
        return $this->httpContext;
    }

    
    public function setCanvas(Canvas $Vvzurwoc24em)
    {
        $this->canvas = $Vvzurwoc24em;
        return $this;
    }

    
    public function get_canvas()
    {
        return $this->getCanvas();
    }

    
    public function getCanvas()
    {
        return $this->canvas;
    }

    
    public function setCss(Stylesheet $Vwbqaqisytil)
    {
        $this->css = $Vwbqaqisytil;
        return $this;
    }

    
    public function get_css()
    {
        return $this->getCss();
    }

    
    public function getCss()
    {
        return $this->css;
    }

    
    public function setDom(DOMDocument $Vzag2nuss5ir)
    {
        $this->dom = $Vzag2nuss5ir;
        return $this;
    }

    
    public function get_dom()
    {
        return $this->getDom();
    }

    
    public function getDom()
    {
        return $this->dom;
    }

    
    public function setOptions(Options $Vi43cktvy0zi)
    {
        $this->options = $Vi43cktvy0zi;
        $Vj1pbeciqvz4 = $this->getFontMetrics();
        if (isset($Vj1pbeciqvz4)) {
            $Vj1pbeciqvz4->setOptions($Vi43cktvy0zi);
        }
        return $this;
    }

    
    public function getOptions()
    {
        return $this->options;
    }

    
    public function get_callbacks()
    {
        return $this->getCallbacks();
    }

    
    public function getCallbacks()
    {
        return $this->callbacks;
    }

    
    public function set_callbacks($Voyqg0byaa44)
    {
        $this->setCallbacks($Voyqg0byaa44);
    }

    
    public function setCallbacks($Voyqg0byaa44)
    {
        if (is_array($Voyqg0byaa44)) {
            $this->callbacks = array();
            foreach ($Voyqg0byaa44 as $Vv03lfntnmcz) {
                if (is_array($Vv03lfntnmcz) && isset($Vv03lfntnmcz['event']) && isset($Vv03lfntnmcz['f'])) {
                    $Vflqyoc1obms = $Vv03lfntnmcz['event'];
                    $V4ljftfdeqpl = $Vv03lfntnmcz['f'];
                    if (is_callable($V4ljftfdeqpl) && is_string($Vflqyoc1obms)) {
                        $this->callbacks[$Vflqyoc1obms][] = $V4ljftfdeqpl;
                    }
                }
            }
        }
    }

    
    public function get_quirksmode()
    {
        return $this->getQuirksmode();
    }

    
    public function getQuirksmode()
    {
        return $this->quirksmode;
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

    
    function __get($V3ztho1nxwdy)
    {
        switch ($V3ztho1nxwdy)
        {
            case 'version' :
                return $this->version;
            default:
                throw new Exception( 'Invalid property: ' . $V3ztho1nxwdy );
        }
    }
}
