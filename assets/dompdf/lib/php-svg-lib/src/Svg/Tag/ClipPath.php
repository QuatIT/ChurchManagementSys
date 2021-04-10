<?php


namespace Svg\Tag;

use Svg\Style;

class ClipPath extends AbstractTag
{
    protected function before($Voywws15cvz5)
    {
        $Vyjtkau4njyv = $this->document->getSurface();

        $Vyjtkau4njyv->save();

        $Vdidzwb0w3vc = $this->makeStyle($Voywws15cvz5);

        $this->setStyle($Vdidzwb0w3vc);
        $Vyjtkau4njyv->setStyle($Vdidzwb0w3vc);

        $this->applyTransform($Voywws15cvz5);
    }

    protected function after()
    {
        $this->document->getSurface()->restore();
    }
}
