<?php

namespace Dompdf\Frame;

use DOMDocument;
use DOMNode;
use DOMElement;
use DOMXPath;

use Dompdf\Exception;
use Dompdf\Frame;




class FrameTree
{
    
    protected static $Va11o3b1dt3e = array(
        "area",
        "base",
        "basefont",
        "head",
        "style",
        "meta",
        "title",
        "colgroup",
        "noembed",
        "param",
        "#comment"
    );

    
    protected $V20nypjv3a3w;

    
    protected $Vnjwlrkwnjsn;

    
    protected $Ve1gesqflrm2;

    
    protected $Vjfzlpuggdoz;

    
    public function __construct(DomDocument $Vzag2nuss5ir)
    {
        $this->_dom = $Vzag2nuss5ir;
        $this->_root = null;
        $this->_registry = array();
    }

    
    public function get_dom()
    {
        return $this->_dom;
    }

    
    public function get_root()
    {
        return $this->_root;
    }

    
    public function get_frame($Vkriocz2qep2)
    {
        return isset($this->_registry[$Vkriocz2qep2]) ? $this->_registry[$Vkriocz2qep2] : null;
    }

    
    public function get_frames()
    {
        return new FrameTreeList($this->_root);
    }

    
    public function build_tree()
    {
        $Vqopg2nwweax = $this->_dom->getElementsByTagName("html")->item(0);
        if (is_null($Vqopg2nwweax)) {
            $Vqopg2nwweax = $this->_dom->firstChild;
        }

        if (is_null($Vqopg2nwweax)) {
            throw new Exception("Requested HTML document contains no data.");
        }

        $this->fix_tables();

        $this->_root = $this->_build_tree_r($Vqopg2nwweax);
    }

    
    protected function fix_tables()
    {
        $Vzez0xu0p4f3 = new DOMXPath($this->_dom);

        
        
        $Vxkqponkxrdg = $Vzez0xu0p4f3->query('//table/caption');
        foreach ($Vxkqponkxrdg as $Vh0yybddztvk) {
            $Vahqmfi4rdgw = $Vh0yybddztvk->parentNode;
            $Vahqmfi4rdgw->parentNode->insertBefore($Vh0yybddztvk, $Vahqmfi4rdgw);
        }

        $Vfe2yxq4g5uh = $Vzez0xu0p4f3->query('//table/tr[1]');
        
        foreach ($Vfe2yxq4g5uh as $Vahqmfi4rdgwChild) {
            $Vim4wws51jia = $this->_dom->createElement('tbody');
            $Vahqmfi4rdgwNode = $Vahqmfi4rdgwChild->parentNode;
            do {
                if ($Vahqmfi4rdgwChild->nodeName === 'tr') {
                    $Vezl2m1eoulq = $Vahqmfi4rdgwChild;
                    $Vahqmfi4rdgwChild = $Vahqmfi4rdgwChild->nextSibling;
                    $Vahqmfi4rdgwNode->removeChild($Vezl2m1eoulq);
                    $Vim4wws51jia->appendChild($Vezl2m1eoulq);
                } else {
                    if ($Vim4wws51jia->hasChildNodes() === true) {
                        $Vahqmfi4rdgwNode->insertBefore($Vim4wws51jia, $Vahqmfi4rdgwChild);
                        $Vim4wws51jia = $this->_dom->createElement('tbody');
                    }
                    $Vahqmfi4rdgwChild = $Vahqmfi4rdgwChild->nextSibling;
                }
            } while ($Vahqmfi4rdgwChild);
            if ($Vim4wws51jia->hasChildNodes() === true) {
                $Vahqmfi4rdgwNode->appendChild($Vim4wws51jia);
            }
        }
    }

    
    
    protected function _remove_node(DOMNode $Vbr2bywdrplx, array &$Vrzhplmxukeb, $V04titjghjb2)
    {
        $Vtcc233inn5m = $Vrzhplmxukeb[$V04titjghjb2];
        $Vx3a1ntb33kt = $Vtcc233inn5m->previousSibling;
        $Vgirylhw0fuv = $Vtcc233inn5m->nextSibling;
        $Vbr2bywdrplx->removeChild($Vtcc233inn5m);
        if (isset($Vx3a1ntb33kt, $Vgirylhw0fuv)) {
            if ($Vx3a1ntb33kt->nodeName === "#text" && $Vgirylhw0fuv->nodeName === "#text") {
                $Vx3a1ntb33kt->nodeValue .= $Vgirylhw0fuv->nodeValue;
                $this->_remove_node($Vbr2bywdrplx, $Vrzhplmxukeb, $V04titjghjb2+1);
            }
        }
        array_splice($Vrzhplmxukeb, $V04titjghjb2, 1);
    }

    
    protected function _build_tree_r(DOMNode $Vbr2bywdrplx)
    {
        $Vnk2ly5jcvjf = new Frame($Vbr2bywdrplx);
        $Vkriocz2qep2 = $Vnk2ly5jcvjf->get_id();
        $this->_registry[$Vkriocz2qep2] = $Vnk2ly5jcvjf;

        if (!$Vbr2bywdrplx->hasChildNodes()) {
            return $Vnk2ly5jcvjf;
        }

        
        $Vrzhplmxukeb = array();
        $Vjxpogd0afis = $Vbr2bywdrplx->childNodes->length;
        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vjxpogd0afis; $V3xsptcgzss2++) {
            $Vrzhplmxukeb[] = $Vbr2bywdrplx->childNodes->item($V3xsptcgzss2);
        }
        $V04titjghjb2 = 0;
        
        while ($V04titjghjb2 < count($Vrzhplmxukeb)) {
            $Vtcc233inn5m = $Vrzhplmxukeb[$V04titjghjb2];
            $Vbr2bywdrplxName = strtolower($Vtcc233inn5m->nodeName);

            
            if (in_array($Vbr2bywdrplxName, self::$Va11o3b1dt3e)) {
                if ($Vbr2bywdrplxName !== "head" && $Vbr2bywdrplxName !== "style") {
                    $this->_remove_node($Vbr2bywdrplx, $Vrzhplmxukeb, $V04titjghjb2);
                } else {
                    $V04titjghjb2++;
                }
                continue;
            }
            
            if ($Vbr2bywdrplxName === "#text" && $Vtcc233inn5m->nodeValue === "") {
                $this->_remove_node($Vbr2bywdrplx, $Vrzhplmxukeb, $V04titjghjb2);
                continue;
            }
            
            if ($Vbr2bywdrplxName === "img" && $Vtcc233inn5m->getAttribute("src") === "") {
                $this->_remove_node($Vbr2bywdrplx, $Vrzhplmxukeb, $V04titjghjb2);
                continue;
            }

            if (is_object($Vtcc233inn5m)) {
                $Vnk2ly5jcvjf->append_child($this->_build_tree_r($Vtcc233inn5m), false);
            }
            $V04titjghjb2++;
        }

        return $Vnk2ly5jcvjf;
    }

    
    public function insert_node(DOMElement $Vbr2bywdrplx, DOMElement $V5hcgki43s1g, $Vepim3znzh4w)
    {
        if ($Vepim3znzh4w === "after" || !$Vbr2bywdrplx->firstChild) {
            $Vbr2bywdrplx->appendChild($V5hcgki43s1g);
        } else {
            $Vbr2bywdrplx->insertBefore($V5hcgki43s1g, $Vbr2bywdrplx->firstChild);
        }

        $this->_build_tree_r($V5hcgki43s1g);

        $Vnk2ly5jcvjf_id = $V5hcgki43s1g->getAttribute("frame_id");
        $Vnk2ly5jcvjf = $this->get_frame($Vnk2ly5jcvjf_id);

        $Vmzrhnnzd1rd = $Vbr2bywdrplx->getAttribute("frame_id");
        $Vycghhqowrim = $this->get_frame($Vmzrhnnzd1rd);

        if ($Vycghhqowrim) {
            if ($Vepim3znzh4w === "before") {
                $Vycghhqowrim->prepend_child($Vnk2ly5jcvjf, false);
            } else {
                $Vycghhqowrim->append_child($Vnk2ly5jcvjf, false);
            }
        }

        return $Vnk2ly5jcvjf_id;
    }
}
