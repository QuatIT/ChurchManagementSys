<?php


namespace Svg\Tag;

use Sabberworm\CSS;

class StyleTag extends AbstractTag
{
    protected $Vnlbbd31sxbf = "";

    public function end()
    {
        $V2az11vbyxue = new CSS\Parser($this->text);
        $this->document->appendStyleSheet($V2az11vbyxue->parse());
    }

    public function appendText($Vnlbbd31sxbf)
    {
        $this->text .= $Vnlbbd31sxbf;
    }
}
