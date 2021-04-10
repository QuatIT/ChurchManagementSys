<?php


namespace Dompdf\Positioner;

use Dompdf\FrameDecorator\AbstractFrameDecorator;


class ListBullet extends AbstractPositioner
{

    
    function position(AbstractFrameDecorator $Vnk2ly5jcvjf)
    {

        
        
        $Vavdpq045wub = $Vnk2ly5jcvjf->get_containing_block();

        
        
        $Vs4gloy23a1d = $Vavdpq045wub["x"] - $Vnk2ly5jcvjf->get_width();

        $Vksopkgqixky = $Vnk2ly5jcvjf->find_block_parent();

        $Vopgub02o3q2 = $Vksopkgqixky->get_current_line_box()->y;

        
        $V1qcutcuyu3m = $Vnk2ly5jcvjf->get_next_sibling();
        if ($V1qcutcuyu3m) {
            $Vdidzwb0w3vc = $V1qcutcuyu3m->get_style();
            $Vuorjhdyrq1v = $Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->line_height, $Vdidzwb0w3vc->get_font_size());
            $Vq154qppcleo = (float)$Vdidzwb0w3vc->length_in_pt($Vuorjhdyrq1v, $V1qcutcuyu3m->get_containing_block("h")) - $Vnk2ly5jcvjf->get_height();
            $Vopgub02o3q2 += $Vq154qppcleo / 2;
        }

        
        
        
        

        
        
        

        
        
        
        
        
        

        
        

        

        
        $Vnk2ly5jcvjf->set_position($Vs4gloy23a1d, $Vopgub02o3q2);
    }
}
