<?php


namespace Svg\Tag;


use Svg\Gradient\Stop;
use Svg\Style;

class LinearGradient extends AbstractTag
{
    protected $Vjxqwkabkvag;
    protected $Vzdywlaebz1l;
    protected $Vn5yf4urazdd;
    protected $Vfph4d2wdjam;

    
    protected $Vidx1nxfniob = array();

    public function start($Voywws15cvz5)
    {
        parent::start($Voywws15cvz5);

        if (isset($Voywws15cvz5['x1'])) {
            $this->x1 = $Voywws15cvz5['x1'];
        }
        if (isset($Voywws15cvz5['y1'])) {
            $this->y1 = $Voywws15cvz5['y1'];
        }
        if (isset($Voywws15cvz5['x2'])) {
            $this->x2 = $Voywws15cvz5['x2'];
        }
        if (isset($Voywws15cvz5['y2'])) {
            $this->y2 = $Voywws15cvz5['y2'];
        }
    }

    public function getStops() {
        if (empty($this->stops)) {
            foreach ($this->children as $Vpx3pxfpo5bc) {
                if ($Vpx3pxfpo5bc->tagName != "stop") {
                    continue;
                }

                $Vh3rkl00m5k3 = new Stop();
                $Vgthdxncmzni = $Vpx3pxfpo5bc->attributes;

                
                if (isset($Vgthdxncmzni["style"])) {
                    $Vkdb2efne1fd = Style::parseCssStyle($Vgthdxncmzni["style"]);

                    if (isset($Vkdb2efne1fd["stop-color"])) {
                        $Vh3rkl00m5k3->color = Style::parseColor($Vkdb2efne1fd["stop-color"]);
                    }

                    if (isset($Vkdb2efne1fd["stop-opacity"])) {
                        $Vh3rkl00m5k3->opacity = max(0, min(1.0, $Vkdb2efne1fd["stop-opacity"]));
                    }
                }

                
                if (isset($Vgthdxncmzni["offset"])) {
                    $Vh3rkl00m5k3->offset = $Vgthdxncmzni["offset"];
                }
                if (isset($Vgthdxncmzni["stop-color"])) {
                    $Vh3rkl00m5k3->color = Style::parseColor($Vgthdxncmzni["stop-color"]);
                }
                if (isset($Vgthdxncmzni["stop-opacity"])) {
                    $Vh3rkl00m5k3->opacity = max(0, min(1.0, $Vgthdxncmzni["stop-opacity"]));
                }

                $this->stops[] = $Vh3rkl00m5k3;
            }
        }

        return $this->stops;
    }
}
