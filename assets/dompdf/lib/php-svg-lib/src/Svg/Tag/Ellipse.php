<?php


namespace Svg\Tag;

class Ellipse extends Shape
{
    protected $Vbzfqpwulojv = 0;
    protected $Vmjodvckrtr1 = 0;
    protected $Vvyapc0zfcyf = 0;
    protected $Vzvzlsqbnl5g = 0;

    public function start($Voywws15cvz5)
    {
        parent::start($Voywws15cvz5);

        if (isset($Voywws15cvz5['cx'])) {
            $this->cx = $Voywws15cvz5['cx'];
        }
        if (isset($Voywws15cvz5['cy'])) {
            $this->cy = $Voywws15cvz5['cy'];
        }
        if (isset($Voywws15cvz5['rx'])) {
            $this->rx = $Voywws15cvz5['rx'];
        }
        if (isset($Voywws15cvz5['ry'])) {
            $this->ry = $Voywws15cvz5['ry'];
        }

        $this->document->getSurface()->ellipse($this->cx, $this->cy, $this->rx, $this->ry, 0, 0, 360, false);
    }
}
