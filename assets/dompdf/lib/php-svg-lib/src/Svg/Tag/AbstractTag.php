<?php


namespace Svg\Tag;

use Svg\Document;
use Svg\Style;

abstract class AbstractTag
{
    
    protected $V0trxkwhezv5;

    public $Vayc0zv2qn4b;

    
    protected $Vdidzwb0w3vc;

    protected $Voywws15cvz5;

    protected $Vdimy1aghirt = true;

    
    protected $Vrzhplmxukeb = array();

    public function __construct(Document $V0trxkwhezv5, $Vayc0zv2qn4b)
    {
        $Vcki4t4qmybshis->document = $V0trxkwhezv5;
        $Vcki4t4qmybshis->tagName = $Vayc0zv2qn4b;
    }

    public function getDocument(){
        return $Vcki4t4qmybshis->document;
    }

    
    public function getParentGroup() {
        $Vwvjp3dx4uxt = $Vcki4t4qmybshis->getDocument()->getStack();
        for ($V3xsptcgzss2 = count($Vwvjp3dx4uxt)-2; $V3xsptcgzss2 >= 0; $V3xsptcgzss2--) {
            $Vudn5fb5ck4i = $Vwvjp3dx4uxt[$V3xsptcgzss2];

            if ($Vudn5fb5ck4i instanceof Group || $Vudn5fb5ck4i instanceof Document) {
                return $Vudn5fb5ck4i;
            }
        }

        return null;
    }

    public function handle($Voywws15cvz5)
    {
        $Vcki4t4qmybshis->attributes = $Voywws15cvz5;

        if (!$Vcki4t4qmybshis->getDocument()->inDefs) {
            $Vcki4t4qmybshis->before($Voywws15cvz5);
            $Vcki4t4qmybshis->start($Voywws15cvz5);
        }
    }

    public function handleEnd()
    {
        if (!$Vcki4t4qmybshis->getDocument()->inDefs) {
            $Vcki4t4qmybshis->end();
            $Vcki4t4qmybshis->after();
        }
    }

    protected function before($Voywws15cvz5)
    {
    }

    protected function start($Voywws15cvz5)
    {
    }

    protected function end()
    {
    }

    protected function after()
    {
    }

    public function getAttributes()
    {
        return $Vcki4t4qmybshis->attributes;
    }

    protected function setStyle(Style $Vdidzwb0w3vc)
    {
        $Vcki4t4qmybshis->style = $Vdidzwb0w3vc;

        if ($Vdidzwb0w3vc->display === "none") {
            $Vcki4t4qmybshis->hasShape = false;
        }
    }

    
    public function getStyle()
    {
        return $Vcki4t4qmybshis->style;
    }

    
    protected function makeStyle($Voywws15cvz5) {
        $Vdidzwb0w3vc = new Style();
        $Vdidzwb0w3vc->inherit($Vcki4t4qmybshis);
        $Vdidzwb0w3vc->fromStyleSheets($Vcki4t4qmybshis, $Voywws15cvz5);
        $Vdidzwb0w3vc->fromAttributes($Voywws15cvz5);

        return $Vdidzwb0w3vc;
    }

    protected function applyTransform($Voywws15cvz5)
    {

        if (isset($Voywws15cvz5["transform"])) {
            $Vyjtkau4njyv = $Vcki4t4qmybshis->document->getSurface();

            $Ve4n4fbmoxik = $Voywws15cvz5["transform"];

            $Vyupu15qqw5c = array();
            preg_match_all(
                '/(matrix|translate|scale|rotate|skewX|skewY)\((.*?)\)/is',
                $Ve4n4fbmoxik,
                $Vyupu15qqw5c,
                PREG_SET_ORDER
            );

            $Ve4n4fbmoxikations = array();
            if (count($Vyupu15qqw5c[0])) {
                foreach ($Vyupu15qqw5c as $Vgiscjbf2cap) {
                    $Vtuyql0vigxq = preg_split('/[ ,]+/', $Vgiscjbf2cap[2]);
                    array_unshift($Vtuyql0vigxq, $Vgiscjbf2cap[1]);
                    $Ve4n4fbmoxikations[] = $Vtuyql0vigxq;
                }
            }

            foreach ($Ve4n4fbmoxikations as $Vcki4t4qmybs) {
                switch ($Vcki4t4qmybs[0]) {
                    case "matrix":
                        $Vyjtkau4njyv->transform($Vcki4t4qmybs[1], $Vcki4t4qmybs[2], $Vcki4t4qmybs[3], $Vcki4t4qmybs[4], $Vcki4t4qmybs[5], $Vcki4t4qmybs[6]);
                        break;

                    case "translate":
                        $Vyjtkau4njyv->translate($Vcki4t4qmybs[1], isset($Vcki4t4qmybs[2]) ? $Vcki4t4qmybs[2] : 0);
                        break;

                    case "scale":
                        $Vyjtkau4njyv->scale($Vcki4t4qmybs[1], isset($Vcki4t4qmybs[2]) ? $Vcki4t4qmybs[2] : $Vcki4t4qmybs[1]);
                        break;

                    case "rotate":
                        $Vyjtkau4njyv->rotate($Vcki4t4qmybs[1]);
                        break;

                    case "skewX":
                        $Vyjtkau4njyv->skewX($Vcki4t4qmybs[1]);
                        break;

                    case "skewY":
                        $Vyjtkau4njyv->skewY($Vcki4t4qmybs[1]);
                        break;
                }
            }
        }
    }
}
