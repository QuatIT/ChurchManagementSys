<?php


namespace Svg\Tag;

class Circle extends Shape
{
    protected $Vbzfqpwulojv = 0;
    protected $Vmjodvckrtr1 = 0;
    protected $Vkabkv5ip0kg;

    public function start($Voywws15cvz5)
    {
        if (isset($Voywws15cvz5['cx'])) {
            $this->cx = $Voywws15cvz5['cx'];
        }
        if (isset($Voywws15cvz5['cy'])) {
            $this->cy = $Voywws15cvz5['cy'];
        }
        if (isset($Voywws15cvz5['r'])) {
            $this->r = $Voywws15cvz5['r'];
        }

        $this->document->getSurface()->circle($this->cx, $this->cy, $this->r);
    }
}
