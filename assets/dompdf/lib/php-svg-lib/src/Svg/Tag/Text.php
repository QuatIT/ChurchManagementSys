<?php


namespace Svg\Tag;

class Text extends Shape
{
    protected $Vs4gloy23a1d = 0;
    protected $Vopgub02o3q2 = 0;
    protected $Vnlbbd31sxbf = "";

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

        $V0trxkwhezv5->getSurface()->transform(1, 0, 0, -1, 0, $Vku40chc0ddp);
    }

    public function end()
    {
        $Vyjtkau4njyv = $this->document->getSurface();
        $Vs4gloy23a1d = $this->x;
        $Vopgub02o3q2 = $this->y;
        $Vdidzwb0w3vc = $Vyjtkau4njyv->getStyle();
        $Vyjtkau4njyv->setFont($Vdidzwb0w3vc->fontFamily, $Vdidzwb0w3vc->fontStyle, $Vdidzwb0w3vc->fontWeight);

        switch ($Vdidzwb0w3vc->textAnchor) {
            case "middle":
                $Vztt3qdrrikx = $Vyjtkau4njyv->measureText($this->text);
                $Vs4gloy23a1d -= $Vztt3qdrrikx / 2;
                break;

            case "end":
                $Vztt3qdrrikx = $Vyjtkau4njyv->measureText($this->text);
                $Vs4gloy23a1d -= $Vztt3qdrrikx;
                break;
        }

        $Vyjtkau4njyv->fillText($this->getText(), $Vs4gloy23a1d, $Vopgub02o3q2);
    }

    protected function after()
    {
        $this->document->getSurface()->restore();
    }

    public function appendText($Vnlbbd31sxbf)
    {
        $this->text .= $Vnlbbd31sxbf;
    }

    public function getText()
    {
        return trim($this->text);
    }
}
