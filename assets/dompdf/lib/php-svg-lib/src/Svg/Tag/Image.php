<?php


namespace Svg\Tag;

class Image extends AbstractTag
{
    protected $Vs4gloy23a1d = 0;
    protected $Vopgub02o3q2 = 0;
    protected $Vztt3qdrrikx = 0;
    protected $Vku40chc0ddp = 0;
    protected $Vn2cvawhsrvg = null;

    protected function before($Voywws15cvz5)
    {
        parent::before($Voywws15cvz5);

        $Vyjtkau4njyv = $this->document->getSurface();
        $Vyjtkau4njyv->save();

        $this->applyTransform($Voywws15cvz5);
    }

    public function start($Voywws15cvz5)
    {
        $V0trxkwhezv5 = $this->document;
        $Vku40chc0ddp = $this->document->getHeight();
        $this->y = $Vku40chc0ddp;

        if (isset($Voywws15cvz5['x'])) {
            $this->x = $Voywws15cvz5['x'];
        }
        if (isset($Voywws15cvz5['y'])) {
            $this->y = $Vku40chc0ddp - $Voywws15cvz5['y'];
        }

        if (isset($Voywws15cvz5['width'])) {
            $this->width = $Voywws15cvz5['width'];
        }
        if (isset($Voywws15cvz5['height'])) {
            $this->height = $Voywws15cvz5['height'];
        }

        if (isset($Voywws15cvz5['xlink:href'])) {
            $this->href = $Voywws15cvz5['xlink:href'];
        }

        $V0trxkwhezv5->getSurface()->transform(1, 0, 0, -1, 0, $Vku40chc0ddp);

        $V0trxkwhezv5->getSurface()->drawImage($this->href, $this->x, $this->y, $this->width, $this->height);
    }

    protected function after()
    {
        $this->document->getSurface()->restore();
    }
}
