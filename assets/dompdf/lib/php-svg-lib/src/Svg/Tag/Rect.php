<?php


namespace Svg\Tag;

class Rect extends Shape
{
    protected $Vs4gloy23a1d = 0;
    protected $Vopgub02o3q2 = 0;
    protected $Vztt3qdrrikx = 0;
    protected $Vku40chc0ddp = 0;
    protected $Vvyapc0zfcyf = 0;
    protected $Vzvzlsqbnl5g = 0;

    public function start($Voywws15cvz5)
    {
        if (isset($Voywws15cvz5['x'])) {
            $this->x = $Voywws15cvz5['x'];
        }
        if (isset($Voywws15cvz5['y'])) {
            $this->y = $Voywws15cvz5['y'];
        }

        if (isset($Voywws15cvz5['width'])) {
            $this->width = $Voywws15cvz5['width'];
        }
        if (isset($Voywws15cvz5['height'])) {
            $this->height = $Voywws15cvz5['height'];
        }

        if (isset($Voywws15cvz5['rx'])) {
            $this->rx = $Voywws15cvz5['rx'];
        }
        if (isset($Voywws15cvz5['ry'])) {
            $this->ry = $Voywws15cvz5['ry'];
        }

        $this->document->getSurface()->rect($this->x, $this->y, $this->width, $this->height, $this->rx, $this->ry);
    }
}
