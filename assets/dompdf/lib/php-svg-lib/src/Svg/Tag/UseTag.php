<?php


namespace Svg\Tag;

class UseTag extends AbstractTag
{
    protected $Vs4gloy23a1d = 0;
    protected $Vopgub02o3q2 = 0;
    protected $Vztt3qdrrikx;
    protected $Vku40chc0ddp;

    
    protected $Vgtcxmos3psx;

    protected function before($Voywws15cvz5)
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

        parent::before($Voywws15cvz5);

        $V0trxkwhezv5 = $this->getDocument();

        $V5tusozbzalh = $Voywws15cvz5["xlink:href"];
        $this->reference = $V0trxkwhezv5->getDef($V5tusozbzalh);

        if ($this->reference) {
            $this->reference->before($Voywws15cvz5);
        }

        $Vyjtkau4njyv = $V0trxkwhezv5->getSurface();
        $Vyjtkau4njyv->save();

        $Vyjtkau4njyv->translate($this->x, $this->y);
    }

    protected function after() {
        parent::after();

        if ($this->reference) {
            $this->reference->after();
        }

        $this->getDocument()->getSurface()->restore();
    }

    public function handle($Voywws15cvz5)
    {
        parent::handle($Voywws15cvz5);

        if (!$this->reference) {
            return;
        }

        $Voywws15cvz5 = array_merge($this->reference->attributes, $Voywws15cvz5);

        $this->reference->handle($Voywws15cvz5);

        foreach ($this->reference->children as $Vpx3pxfpo5bc) {
            $Vgthdxncmzni = array_merge($Vpx3pxfpo5bc->attributes, $Voywws15cvz5);
            $Vpx3pxfpo5bc->handle($Vgthdxncmzni);
        }
    }

    public function handleEnd()
    {
        parent::handleEnd();

        if (!$this->reference) {
            return;
        }

        $this->reference->handleEnd();

        foreach ($this->reference->children as $Vpx3pxfpo5bc) {
            $Vpx3pxfpo5bc->handleEnd();
        }
    }
}
