<?php
namespace Dompdf;

class Options
{
    
    private $Vk2wykqydwqb;

    
    private $V03sbdcxs32f;

    
    private $Vuztfk54rrx1;

    
    private $V2wl0npgxb4a;

    
    private $Vn2a2n5vx0fi;

    
    private $Vebh5d4zwcnt;

    
    private $Vj0dz4eqji25 = "screen";

    
    private $Vubtaful3j1c = "letter";

    
    private $Vpatmpv5e0px = "portrait";

    
    private $Vmjq53cepgau = "serif";

    
    private $Vs5sugw0qedn = 96;

    
    private $Vapigj4sxx3i = 1.1;

    
    private $Vtnyhp0dp3wf = false;

    
    private $V5xgmzfprwgu = false;

    
    private $Vjj3djofnyde = true;

    
    private $Vz3estm52ux5 = false;

    
    private $Vn3sishy2rsm = false;

    
    private $Vejmnpdqd2w1 = false;

    
    private $Vvgkr2dk4tn4 = false;

    
    private $Vaz3hyvfpq11 = false;

    
    private $Vai5bx3gus5c = false;

    
    private $Vai5bx3gus5cLines = true;

    
    private $Vai5bx3gus5cBlocks = true;

    
    private $Vai5bx3gus5cInline = true;

    
    private $Vai5bx3gus5cPaddingBox = true;

    
    private $Vsubjsvg2zg5 = "CPDF";

    
    private $V3y0kq2hd2tl = "";

    
    private $Vocuslkahnr4 = "user";

    
    private $Vqexdnnrdv43 = "password";

    
    public function __construct(array $Voywws15cvz5 = null)
    {
        $this->setChroot(realpath(__DIR__ . "/../"));
        $this->setRootDir($this->getChroot());
        $this->setTempDir(sys_get_temp_dir());
        $this->setFontDir($this->chroot . DIRECTORY_SEPARATOR . "lib" . DIRECTORY_SEPARATOR . "fonts");
        $this->setFontCache($this->getFontDir());
        $this->setLogOutputFile($this->getTempDir() . DIRECTORY_SEPARATOR . "log.htm");

        if (null !== $Voywws15cvz5) {
            $this->set($Voywws15cvz5);
        }
    }

    
    public function set($Voywws15cvz5, $Vqfra35f14fv = null)
    {
        if (!is_array($Voywws15cvz5)) {
            $Voywws15cvz5 = array($Voywws15cvz5 => $Vqfra35f14fv);
        }
        foreach ($Voywws15cvz5 as $Vqwhzgethmgj => $Vqfra35f14fv) {
            if ($Vqwhzgethmgj === 'tempDir' || $Vqwhzgethmgj === 'temp_dir') {
                $this->setTempDir($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'fontDir' || $Vqwhzgethmgj === 'font_dir') {
                $this->setFontDir($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'fontCache' || $Vqwhzgethmgj === 'font_cache') {
                $this->setFontCache($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'chroot') {
                $this->setChroot($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'logOutputFile' || $Vqwhzgethmgj === 'log_output_file') {
                $this->setLogOutputFile($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'defaultMediaType' || $Vqwhzgethmgj === 'default_media_type') {
                $this->setDefaultMediaType($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'defaultPaperSize' || $Vqwhzgethmgj === 'default_paper_size') {
                $this->setDefaultPaperSize($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'defaultPaperOrientation' || $Vqwhzgethmgj === 'default_paper_orientation') {
                $this->setDefaultPaperOrientation($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'defaultFont' || $Vqwhzgethmgj === 'default_font') {
                $this->setDefaultFont($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'dpi') {
                $this->setDpi($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'fontHeightRatio' || $Vqwhzgethmgj === 'font_height_ratio') {
                $this->setFontHeightRatio($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'isPhpEnabled' || $Vqwhzgethmgj === 'is_php_enabled' || $Vqwhzgethmgj === 'enable_php') {
                $this->setIsPhpEnabled($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'isRemoteEnabled' || $Vqwhzgethmgj === 'is_remote_enabled' || $Vqwhzgethmgj === 'enable_remote') {
                $this->setIsRemoteEnabled($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'isJavascriptEnabled' || $Vqwhzgethmgj === 'is_javascript_enabled' || $Vqwhzgethmgj === 'enable_javascript') {
                $this->setIsJavascriptEnabled($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'isHtml5ParserEnabled' || $Vqwhzgethmgj === 'is_html5_parser_enabled' || $Vqwhzgethmgj === 'enable_html5_parser') {
                $this->setIsHtml5ParserEnabled($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'isFontSubsettingEnabled' || $Vqwhzgethmgj === 'is_font_subsetting_enabled' || $Vqwhzgethmgj === 'enable_font_subsetting') {
                $this->setIsFontSubsettingEnabled($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'debugPng' || $Vqwhzgethmgj === 'debug_png') {
                $this->setDebugPng($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'debugKeepTemp' || $Vqwhzgethmgj === 'debug_keep_temp') {
                $this->setDebugKeepTemp($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'debugCss' || $Vqwhzgethmgj === 'debug_css') {
                $this->setDebugCss($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'debugLayout' || $Vqwhzgethmgj === 'debug_layout') {
                $this->setDebugLayout($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'debugLayoutLines' || $Vqwhzgethmgj === 'debug_layout_lines') {
                $this->setDebugLayoutLines($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'debugLayoutBlocks' || $Vqwhzgethmgj === 'debug_layout_blocks') {
                $this->setDebugLayoutBlocks($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'debugLayoutInline' || $Vqwhzgethmgj === 'debug_layout_inline') {
                $this->setDebugLayoutInline($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'debugLayoutPaddingBox' || $Vqwhzgethmgj === 'debug_layout_padding_box') {
                $this->setDebugLayoutPaddingBox($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'pdfBackend' || $Vqwhzgethmgj === 'pdf_backend') {
                $this->setPdfBackend($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'pdflibLicense' || $Vqwhzgethmgj === 'pdflib_license') {
                $this->setPdflibLicense($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'adminUsername' || $Vqwhzgethmgj === 'admin_username') {
                $this->setAdminUsername($Vqfra35f14fv);
            } elseif ($Vqwhzgethmgj === 'adminPassword' || $Vqwhzgethmgj === 'admin_password') {
                $this->setAdminPassword($Vqfra35f14fv);
            }
        }
        return $this;
    }

    
    public function get($Vqwhzgethmgj)
    {
        if ($Vqwhzgethmgj === 'tempDir' || $Vqwhzgethmgj === 'temp_dir') {
            return $this->getTempDir();
        } elseif ($Vqwhzgethmgj === 'fontDir' || $Vqwhzgethmgj === 'font_dir') {
            return $this->getFontDir();
        } elseif ($Vqwhzgethmgj === 'fontCache' || $Vqwhzgethmgj === 'font_cache') {
            return $this->getFontCache();
        } elseif ($Vqwhzgethmgj === 'chroot') {
            return $this->getChroot();
        } elseif ($Vqwhzgethmgj === 'logOutputFile' || $Vqwhzgethmgj === 'log_output_file') {
            return $this->getLogOutputFile();
        } elseif ($Vqwhzgethmgj === 'defaultMediaType' || $Vqwhzgethmgj === 'default_media_type') {
            return $this->getDefaultMediaType();
        } elseif ($Vqwhzgethmgj === 'defaultPaperSize' || $Vqwhzgethmgj === 'default_paper_size') {
            return $this->getDefaultPaperSize();
        } elseif ($Vqwhzgethmgj === 'defaultPaperOrientation' || $Vqwhzgethmgj === 'default_paper_orientation') {
            return $this->getDefaultPaperOrientation();
        } elseif ($Vqwhzgethmgj === 'defaultFont' || $Vqwhzgethmgj === 'default_font') {
            return $this->getDefaultFont();
        } elseif ($Vqwhzgethmgj === 'dpi') {
            return $this->getDpi();
        } elseif ($Vqwhzgethmgj === 'fontHeightRatio' || $Vqwhzgethmgj === 'font_height_ratio') {
            return $this->getFontHeightRatio();
        } elseif ($Vqwhzgethmgj === 'isPhpEnabled' || $Vqwhzgethmgj === 'is_php_enabled' || $Vqwhzgethmgj === 'enable_php') {
            return $this->getIsPhpEnabled();
        } elseif ($Vqwhzgethmgj === 'isRemoteEnabled' || $Vqwhzgethmgj === 'is_remote_enabled' || $Vqwhzgethmgj === 'enable_remote') {
            return $this->getIsRemoteEnabled();
        } elseif ($Vqwhzgethmgj === 'isJavascriptEnabled' || $Vqwhzgethmgj === 'is_javascript_enabled' || $Vqwhzgethmgj === 'enable_javascript') {
            return $this->getIsJavascriptEnabled();
        } elseif ($Vqwhzgethmgj === 'isHtml5ParserEnabled' || $Vqwhzgethmgj === 'is_html5_parser_enabled' || $Vqwhzgethmgj === 'enable_html5_parser') {
            return $this->getIsHtml5ParserEnabled();
        } elseif ($Vqwhzgethmgj === 'isFontSubsettingEnabled' || $Vqwhzgethmgj === 'is_font_subsetting_enabled' || $Vqwhzgethmgj === 'enable_font_subsetting') {
            return $this->getIsFontSubsettingEnabled();
        } elseif ($Vqwhzgethmgj === 'debugPng' || $Vqwhzgethmgj === 'debug_png') {
            return $this->getDebugPng();
        } elseif ($Vqwhzgethmgj === 'debugKeepTemp' || $Vqwhzgethmgj === 'debug_keep_temp') {
            return $this->getDebugKeepTemp();
        } elseif ($Vqwhzgethmgj === 'debugCss' || $Vqwhzgethmgj === 'debug_css') {
            return $this->getDebugCss();
        } elseif ($Vqwhzgethmgj === 'debugLayout' || $Vqwhzgethmgj === 'debug_layout') {
            return $this->getDebugLayout();
        } elseif ($Vqwhzgethmgj === 'debugLayoutLines' || $Vqwhzgethmgj === 'debug_layout_lines') {
            return $this->getDebugLayoutLines();
        } elseif ($Vqwhzgethmgj === 'debugLayoutBlocks' || $Vqwhzgethmgj === 'debug_layout_blocks') {
            return $this->getDebugLayoutBlocks();
        } elseif ($Vqwhzgethmgj === 'debugLayoutInline' || $Vqwhzgethmgj === 'debug_layout_inline') {
            return $this->getDebugLayoutInline();
        } elseif ($Vqwhzgethmgj === 'debugLayoutPaddingBox' || $Vqwhzgethmgj === 'debug_layout_padding_box') {
            return $this->getDebugLayoutPaddingBox();
        } elseif ($Vqwhzgethmgj === 'pdfBackend' || $Vqwhzgethmgj === 'pdf_backend') {
            return $this->getPdfBackend();
        } elseif ($Vqwhzgethmgj === 'pdflibLicense' || $Vqwhzgethmgj === 'pdflib_license') {
            return $this->getPdflibLicense();
        } elseif ($Vqwhzgethmgj === 'adminUsername' || $Vqwhzgethmgj === 'admin_username') {
            return $this->getAdminUsername();
        } elseif ($Vqwhzgethmgj === 'adminPassword' || $Vqwhzgethmgj === 'admin_password') {
            return $this->getAdminPassword();
        }
        return null;
    }

    
    public function setAdminPassword($Vqexdnnrdv43)
    {
        $this->adminPassword = $Vqexdnnrdv43;
        return $this;
    }

    
    public function getAdminPassword()
    {
        return $this->adminPassword;
    }

    
    public function setAdminUsername($Vocuslkahnr4)
    {
        $this->adminUsername = $Vocuslkahnr4;
        return $this;
    }

    
    public function getAdminUsername()
    {
        return $this->adminUsername;
    }

    
    public function setPdfBackend($Vsubjsvg2zg5)
    {
        $this->pdfBackend = $Vsubjsvg2zg5;
        return $this;
    }

    
    public function getPdfBackend()
    {
        return $this->pdfBackend;
    }

    
    public function setPdflibLicense($V3y0kq2hd2tl)
    {
        $this->pdflibLicense = $V3y0kq2hd2tl;
        return $this;
    }

    
    public function getPdflibLicense()
    {
        return $this->pdflibLicense;
    }

    
    public function setChroot($Vn2a2n5vx0fi)
    {
        $this->chroot = $Vn2a2n5vx0fi;
        return $this;
    }

    
    public function getChroot()
    {
        return $this->chroot;
    }

    
    public function setDebugCss($Vaz3hyvfpq11)
    {
        $this->debugCss = $Vaz3hyvfpq11;
        return $this;
    }

    
    public function getDebugCss()
    {
        return $this->debugCss;
    }

    
    public function setDebugKeepTemp($Vvgkr2dk4tn4)
    {
        $this->debugKeepTemp = $Vvgkr2dk4tn4;
        return $this;
    }

    
    public function getDebugKeepTemp()
    {
        return $this->debugKeepTemp;
    }

    
    public function setDebugLayout($Vai5bx3gus5c)
    {
        $this->debugLayout = $Vai5bx3gus5c;
        return $this;
    }

    
    public function getDebugLayout()
    {
        return $this->debugLayout;
    }

    
    public function setDebugLayoutBlocks($Vai5bx3gus5cBlocks)
    {
        $this->debugLayoutBlocks = $Vai5bx3gus5cBlocks;
        return $this;
    }

    
    public function getDebugLayoutBlocks()
    {
        return $this->debugLayoutBlocks;
    }

    
    public function setDebugLayoutInline($Vai5bx3gus5cInline)
    {
        $this->debugLayoutInline = $Vai5bx3gus5cInline;
        return $this;
    }

    
    public function getDebugLayoutInline()
    {
        return $this->debugLayoutInline;
    }

    
    public function setDebugLayoutLines($Vai5bx3gus5cLines)
    {
        $this->debugLayoutLines = $Vai5bx3gus5cLines;
        return $this;
    }

    
    public function getDebugLayoutLines()
    {
        return $this->debugLayoutLines;
    }

    
    public function setDebugLayoutPaddingBox($Vai5bx3gus5cPaddingBox)
    {
        $this->debugLayoutPaddingBox = $Vai5bx3gus5cPaddingBox;
        return $this;
    }

    
    public function getDebugLayoutPaddingBox()
    {
        return $this->debugLayoutPaddingBox;
    }

    
    public function setDebugPng($Vejmnpdqd2w1)
    {
        $this->debugPng = $Vejmnpdqd2w1;
        return $this;
    }

    
    public function getDebugPng()
    {
        return $this->debugPng;
    }

    
    public function setDefaultFont($Vmjq53cepgau)
    {
        $this->defaultFont = $Vmjq53cepgau;
        return $this;
    }

    
    public function getDefaultFont()
    {
        return $this->defaultFont;
    }

    
    public function setDefaultMediaType($Vj0dz4eqji25)
    {
        $this->defaultMediaType = $Vj0dz4eqji25;
        return $this;
    }

    
    public function getDefaultMediaType()
    {
        return $this->defaultMediaType;
    }

    
    public function setDefaultPaperSize($Vubtaful3j1c)
    {
        $this->defaultPaperSize = $Vubtaful3j1c;
        return $this;
    }

    
    public function setDefaultPaperOrientation($Vpatmpv5e0px)
    {
        $this->defaultPaperOrientation = $Vpatmpv5e0px;
        return $this;
    }

    
    public function getDefaultPaperSize()
    {
        return $this->defaultPaperSize;
    }

    
    public function getDefaultPaperOrientation()
    {
        return $this->defaultPaperOrientation;
    }

    
    public function setDpi($Vs5sugw0qedn)
    {
        $this->dpi = $Vs5sugw0qedn;
        return $this;
    }

    
    public function getDpi()
    {
        return $this->dpi;
    }

    
    public function setFontCache($V2wl0npgxb4a)
    {
        $this->fontCache = $V2wl0npgxb4a;
        return $this;
    }

    
    public function getFontCache()
    {
        return $this->fontCache;
    }

    
    public function setFontDir($Vuztfk54rrx1)
    {
        $this->fontDir = $Vuztfk54rrx1;
        return $this;
    }

    
    public function getFontDir()
    {
        return $this->fontDir;
    }

    
    public function setFontHeightRatio($Vapigj4sxx3i)
    {
        $this->fontHeightRatio = $Vapigj4sxx3i;
        return $this;
    }

    
    public function getFontHeightRatio()
    {
        return $this->fontHeightRatio;
    }

    
    public function setIsFontSubsettingEnabled($Vn3sishy2rsm)
    {
        $this->isFontSubsettingEnabled = $Vn3sishy2rsm;
        return $this;
    }

    
    public function getIsFontSubsettingEnabled()
    {
        return $this->isFontSubsettingEnabled;
    }

    
    public function isFontSubsettingEnabled()
    {
        return $this->getIsFontSubsettingEnabled();
    }

    
    public function setIsHtml5ParserEnabled($Vz3estm52ux5)
    {
        $this->isHtml5ParserEnabled = $Vz3estm52ux5;
        return $this;
    }

    
    public function getIsHtml5ParserEnabled()
    {
        return $this->isHtml5ParserEnabled;
    }

    
    public function isHtml5ParserEnabled()
    {
        return $this->getIsHtml5ParserEnabled();
    }

    
    public function setIsJavascriptEnabled($Vjj3djofnyde)
    {
        $this->isJavascriptEnabled = $Vjj3djofnyde;
        return $this;
    }

    
    public function getIsJavascriptEnabled()
    {
        return $this->isJavascriptEnabled;
    }

    
    public function isJavascriptEnabled()
    {
        return $this->getIsJavascriptEnabled();
    }

    
    public function setIsPhpEnabled($Vtnyhp0dp3wf)
    {
        $this->isPhpEnabled = $Vtnyhp0dp3wf;
        return $this;
    }

    
    public function getIsPhpEnabled()
    {
        return $this->isPhpEnabled;
    }

    
    public function isPhpEnabled()
    {
        return $this->getIsPhpEnabled();
    }

    
    public function setIsRemoteEnabled($V5xgmzfprwgu)
    {
        $this->isRemoteEnabled = $V5xgmzfprwgu;
        return $this;
    }

    
    public function getIsRemoteEnabled()
    {
        return $this->isRemoteEnabled;
    }

    
    public function isRemoteEnabled()
    {
        return $this->getIsRemoteEnabled();
    }

    
    public function setLogOutputFile($Vebh5d4zwcnt)
    {
        $this->logOutputFile = $Vebh5d4zwcnt;
        return $this;
    }

    
    public function getLogOutputFile()
    {
        return $this->logOutputFile;
    }

    
    public function setTempDir($V03sbdcxs32f)
    {
        $this->tempDir = $V03sbdcxs32f;
        return $this;
    }

    
    public function getTempDir()
    {
        return $this->tempDir;
    }

    
    public function setRootDir($Vk2wykqydwqb)
    {
        $this->rootDir = $Vk2wykqydwqb;
        return $this;
    }

    
    public function getRootDir()
    {
        return $this->rootDir;
    }
}
