<?php

namespace Dompdf\Frame;

use Dompdf\Css\Style;
use Dompdf\Dompdf;
use Dompdf\Exception;
use Dompdf\Frame;
use Dompdf\FrameDecorator\AbstractFrameDecorator;
use DOMXPath;
use Dompdf\FrameDecorator\Page as PageFrameDecorator;
use Dompdf\FrameReflower\Page as PageFrameReflower;
use Dompdf\Positioner\AbstractPositioner;


class Factory
{

     
    protected static $Vpx1wxkkjvso;

    
    static function decorate_root(Frame $Vzlqynjxsspd, Dompdf $Vhvghaoacagz)
    {
        $Vnk2ly5jcvjf = new PageFrameDecorator($Vzlqynjxsspd, $Vhvghaoacagz);
        $Vnk2ly5jcvjf->set_reflower(new PageFrameReflower($Vnk2ly5jcvjf));
        $Vzlqynjxsspd->set_decorator($Vnk2ly5jcvjf);

        return $Vnk2ly5jcvjf;
    }

    
    static function decorate_frame(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz, Frame $Vzlqynjxsspd = null)
    {
        if (is_null($Vhvghaoacagz)) {
            throw new Exception("The DOMPDF argument is required");
        }

        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();

        
        
        if (!$Vnk2ly5jcvjf->is_in_flow() && in_array($Vdidzwb0w3vc->display, Style::$V3irmujeshqx)) {
            $Vdidzwb0w3vc->display = "block";
        }

        $Vsagginauquc = $Vdidzwb0w3vc->display;

        switch ($Vsagginauquc) {

            case "flex": 
            case "table-caption": 
            case "block":
                $Vtm5xdjtuwaz = "Block";
                $Vpn0erlmbnzu = "Block";
                $Vfznctyvx2oe = "Block";
                break;

            case "inline-flex": 
            case "inline-block":
                $Vtm5xdjtuwaz = "Inline";
                $Vpn0erlmbnzu = "Block";
                $Vfznctyvx2oe = "Block";
                break;

            case "inline":
                $Vtm5xdjtuwaz = "Inline";
                if ($Vnk2ly5jcvjf->is_text_node()) {
                    $Vpn0erlmbnzu = "Text";
                    $Vfznctyvx2oe = "Text";
                } else {
                    if ($Vdidzwb0w3vc->float !== "none") {
                        $Vpn0erlmbnzu = "Block";
                        $Vfznctyvx2oe = "Block";
                    } else {
                        $Vpn0erlmbnzu = "Inline";
                        $Vfznctyvx2oe = "Inline";
                    }
                }
                break;

            case "table":
                $Vtm5xdjtuwaz = "Block";
                $Vpn0erlmbnzu = "Table";
                $Vfznctyvx2oe = "Table";
                break;

            case "inline-table":
                $Vtm5xdjtuwaz = "Inline";
                $Vpn0erlmbnzu = "Table";
                $Vfznctyvx2oe = "Table";
                break;

            case "table-row-group":
            case "table-header-group":
            case "table-footer-group":
                $Vtm5xdjtuwaz = "NullPositioner";
                $Vpn0erlmbnzu = "TableRowGroup";
                $Vfznctyvx2oe = "TableRowGroup";
                break;

            case "table-row":
                $Vtm5xdjtuwaz = "NullPositioner";
                $Vpn0erlmbnzu = "TableRow";
                $Vfznctyvx2oe = "TableRow";
                break;

            case "table-cell":
                $Vtm5xdjtuwaz = "TableCell";
                $Vpn0erlmbnzu = "TableCell";
                $Vfznctyvx2oe = "TableCell";
                break;

            case "list-item":
                $Vtm5xdjtuwaz = "Block";
                $Vpn0erlmbnzu = "Block";
                $Vfznctyvx2oe = "Block";
                break;

            case "-dompdf-list-bullet":
                if ($Vdidzwb0w3vc->list_style_position === "inside") {
                    $Vtm5xdjtuwaz = "Inline";
                } else {
                    $Vtm5xdjtuwaz = "ListBullet";
                }

                if ($Vdidzwb0w3vc->list_style_image !== "none") {
                    $Vpn0erlmbnzu = "ListBulletImage";
                } else {
                    $Vpn0erlmbnzu = "ListBullet";
                }

                $Vfznctyvx2oe = "ListBullet";
                break;

            case "-dompdf-image":
                $Vtm5xdjtuwaz = "Inline";
                $Vpn0erlmbnzu = "Image";
                $Vfznctyvx2oe = "Image";
                break;

            case "-dompdf-br":
                $Vtm5xdjtuwaz = "Inline";
                $Vpn0erlmbnzu = "Inline";
                $Vfznctyvx2oe = "Inline";
                break;

            default:
                
            case "none":
                if ($Vdidzwb0w3vc->_dompdf_keep !== "yes") {
                    
                    $Vnk2ly5jcvjf->get_parent()->remove_child($Vnk2ly5jcvjf);
                    return;
                }

                $Vtm5xdjtuwaz = "NullPositioner";
                $Vpn0erlmbnzu = "NullFrameDecorator";
                $Vfznctyvx2oe = "NullFrameReflower";
                break;
        }

        
        $Vmriudfrwzj3 = $Vdidzwb0w3vc->position;

        if ($Vmriudfrwzj3 === "absolute") {
            $Vtm5xdjtuwaz = "Absolute";
        } else {
            if ($Vmriudfrwzj3 === "fixed") {
                $Vtm5xdjtuwaz = "Fixed";
            }
        }

        $Vbr2bywdrplx = $Vnk2ly5jcvjf->get_node();

        
        if ($Vbr2bywdrplx->nodeName === "img") {
            $Vdidzwb0w3vc->display = "-dompdf-image";
            $Vpn0erlmbnzu = "Image";
            $Vfznctyvx2oe = "Image";
        }

        $Vpn0erlmbnzu  = "Dompdf\\FrameDecorator\\$Vpn0erlmbnzu";
        $Vfznctyvx2oe   = "Dompdf\\FrameReflower\\$Vfznctyvx2oe";

        
        $V134ns25tz1t = new $Vpn0erlmbnzu($Vnk2ly5jcvjf, $Vhvghaoacagz);

        $V134ns25tz1t->set_positioner(self::getPositionerInstance($Vtm5xdjtuwaz));
        $V134ns25tz1t->set_reflower(new $Vfznctyvx2oe($V134ns25tz1t, $Vhvghaoacagz->getFontMetrics()));

        if ($Vzlqynjxsspd) {
            $V134ns25tz1t->set_root($Vzlqynjxsspd);
        }

        if ($Vsagginauquc === "list-item") {
            
            $Vtyufe1hjdes = $Vhvghaoacagz->getDom();
            $Vpczbofhtygl = $Vtyufe1hjdes->createElement("bullet"); 
            $Vm22t1vu1bzt = new Frame($Vpczbofhtygl);

            $Vbr2bywdrplx = $Vnk2ly5jcvjf->get_node();
            $Vpfyvlsigite = $Vbr2bywdrplx->parentNode;

            if ($Vpfyvlsigite) {
                if (!$Vpfyvlsigite->hasAttribute("dompdf-children-count")) {
                    $Vxp0j315zxdb = new DOMXPath($Vtyufe1hjdes);
                    $Vj4h4hyymhja = $Vxp0j315zxdb->query("li", $Vpfyvlsigite)->length;
                    $Vpfyvlsigite->setAttribute("dompdf-children-count", $Vj4h4hyymhja);
                }

                if (is_numeric($Vbr2bywdrplx->getAttribute("value"))) {
                    $V04titjghjb2 = intval($Vbr2bywdrplx->getAttribute("value"));
                } else {
                    if (!$Vpfyvlsigite->hasAttribute("dompdf-counter")) {
                        $V04titjghjb2 = ($Vpfyvlsigite->hasAttribute("start") ? $Vpfyvlsigite->getAttribute("start") : 1);
                    } else {
                        $V04titjghjb2 = (int)$Vpfyvlsigite->getAttribute("dompdf-counter") + 1;
                    }
                }

                $Vpfyvlsigite->setAttribute("dompdf-counter", $V04titjghjb2);
                $Vpczbofhtygl->setAttribute("dompdf-counter", $V04titjghjb2);
            }

            $Vvkp23uyeydw = $Vhvghaoacagz->getCss()->create_style();
            $Vvkp23uyeydw->display = "-dompdf-list-bullet";
            $Vvkp23uyeydw->inherit($Vdidzwb0w3vc);
            $Vm22t1vu1bzt->set_style($Vvkp23uyeydw);

            $V134ns25tz1t->prepend_child(Factory::decorate_frame($Vm22t1vu1bzt, $Vhvghaoacagz, $Vzlqynjxsspd));
        }

        return $V134ns25tz1t;
    }

    
    protected static function getPositionerInstance($Vxeifmjzikkj)
    {
        if (!isset(self::$Vpx1wxkkjvso[$Vxeifmjzikkj])) {
            $V4ulrrtmqxqc = '\\Dompdf\\Positioner\\'.$Vxeifmjzikkj;
            self::$Vpx1wxkkjvso[$Vxeifmjzikkj] = new $V4ulrrtmqxqc();
        }
        return self::$Vpx1wxkkjvso[$Vxeifmjzikkj];
    }
}
