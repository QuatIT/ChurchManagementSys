<?php


namespace Svg\Tag;

use Svg\Style;

class Shape extends AbstractTag
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
        $Vyjtkau4njyv = $this->document->getSurface();

        if ($this->hasShape) {
            $Vdidzwb0w3vc = $Vyjtkau4njyv->getStyle();

            $Vm4rhtdms15t   = $Vdidzwb0w3vc->fill   && is_array($Vdidzwb0w3vc->fill);
            $Vihuafvzvxcv = $Vdidzwb0w3vc->stroke && is_array($Vdidzwb0w3vc->stroke);

            if ($Vm4rhtdms15t) {
                if ($Vihuafvzvxcv) {
                    $Vyjtkau4njyv->fillStroke();
                } else {







                    $Vyjtkau4njyv->fill();
                }
            }
            elseif ($Vihuafvzvxcv) {
                $Vyjtkau4njyv->stroke();
            }
            else {
                $Vyjtkau4njyv->endPath();
            }
        }

        $Vyjtkau4njyv->restore();
    }
}
