<?php


namespace Svg\Tag;

class Polygon extends Shape
{
    public function start($Voywws15cvz5)
    {
        $Vynpm04a4fx0 = array();
        preg_match_all('/([\-]*[0-9\.]+)/', $Voywws15cvz5['points'], $Vynpm04a4fx0);

        $V4jz4nyvrd2d = $Vynpm04a4fx0[0];
        $Vj4h4hyymhja = count($V4jz4nyvrd2d);

        $Vyjtkau4njyv = $this->document->getSurface();
        list($Vs4gloy23a1d, $Vopgub02o3q2) = $V4jz4nyvrd2d;
        $Vyjtkau4njyv->moveTo($Vs4gloy23a1d, $Vopgub02o3q2);

        for ($V3xsptcgzss2 = 2; $V3xsptcgzss2 < $Vj4h4hyymhja; $V3xsptcgzss2 += 2) {
            $Vs4gloy23a1d = $V4jz4nyvrd2d[$V3xsptcgzss2];
            $Vopgub02o3q2 = $V4jz4nyvrd2d[$V3xsptcgzss2 + 1];
            $Vyjtkau4njyv->lineTo($Vs4gloy23a1d, $Vopgub02o3q2);
        }

        $Vyjtkau4njyv->closePath();
    }
}
