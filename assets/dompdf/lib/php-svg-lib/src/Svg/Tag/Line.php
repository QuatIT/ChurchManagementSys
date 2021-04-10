<?php


namespace Svg\Tag;

class Line extends Shape
{
    protected $Vjxqwkabkvag = 0;
    protected $Vzdywlaebz1l = 0;

    protected $Vn5yf4urazdd = 0;
    protected $Vfph4d2wdjam = 0;

    public function start($Voywws15cvz5)
    {
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

        $Vyjtkau4njyv = $this->document->getSurface();
        $Vyjtkau4njyv->moveTo($this->x1, $this->y1);
        $Vyjtkau4njyv->lineTo($this->x2, $this->y2);
    }
}
