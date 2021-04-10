<?php


namespace Dompdf\Positioner;

use Dompdf\FrameDecorator\AbstractFrameDecorator;


abstract class AbstractPositioner
{

    
    abstract function position(AbstractFrameDecorator $Vnk2ly5jcvjf);

    
    function move(AbstractFrameDecorator $Vnk2ly5jcvjf, $Valgvhs5my1x, $Vezx3f4fziht, $Vpr4krd2i0yv = false)
    {
        list($Vs4gloy23a1d, $Vopgub02o3q2) = $Vnk2ly5jcvjf->get_position();

        if (!$Vpr4krd2i0yv) {
            $Vnk2ly5jcvjf->set_position($Vs4gloy23a1d + $Valgvhs5my1x, $Vopgub02o3q2 + $Vezx3f4fziht);
        }

        foreach ($Vnk2ly5jcvjf->get_children() as $Vtcc233inn5m) {
            $Vtcc233inn5m->move($Valgvhs5my1x, $Vezx3f4fziht);
        }
    }
}
