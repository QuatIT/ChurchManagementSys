<?php

namespace Dompdf\FrameReflower;

use Dompdf\FrameDecorator\Block as BlockFrameDecorator;
use Dompdf\FrameDecorator\Table as TableFrameDecorator;


class TableCell extends Block
{
    
    function __construct(BlockFrameDecorator $Vnk2ly5jcvjf)
    {
        parent::__construct($Vnk2ly5jcvjf);
    }

    
    function reflow(BlockFrameDecorator $Vwoflziz3q5d = null)
    {
        $Vdidzwb0w3vc = $this->_frame->get_style();

        $Vahqmfi4rdgw = TableFrameDecorator::find_parent_table($this->_frame);
        $Vdgy2mwoncbb = $Vahqmfi4rdgw->get_cellmap();

        list($Vs4gloy23a1d, $Vopgub02o3q2) = $Vdgy2mwoncbb->get_frame_position($this->_frame);
        $this->_frame->set_position($Vs4gloy23a1d, $Vopgub02o3q2);

        $Vneuyusyb51k = $Vdgy2mwoncbb->get_spanned_cells($this->_frame);

        $Vhoifq2kocyt = 0;
        foreach ($Vneuyusyb51k["columns"] as $V3xsptcgzss2) {
            $Vhxdswanopzr = $Vdgy2mwoncbb->get_column($V3xsptcgzss2);
            $Vhoifq2kocyt += $Vhxdswanopzr["used-width"];
        }

        
        $Vjlmjalejjxa = $this->_frame->get_containing_block("h");

        $Vxkloglrp2ec = (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->margin_left,
                $Vdidzwb0w3vc->padding_left,
                $Vdidzwb0w3vc->border_left_width),
            $Vhoifq2kocyt);

        $Vbambtqfrqf2 = (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->padding_right,
                $Vdidzwb0w3vc->margin_right,
                $Vdidzwb0w3vc->border_right_width),
            $Vhoifq2kocyt);

        $Vsxv11nykvs0 = (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->margin_top,
                $Vdidzwb0w3vc->padding_top,
                $Vdidzwb0w3vc->border_top_width),
            $Vjlmjalejjxa);
        $Vho2z0yidkhp = (float)$Vdidzwb0w3vc->length_in_pt(array($Vdidzwb0w3vc->margin_bottom,
                $Vdidzwb0w3vc->padding_bottom,
                $Vdidzwb0w3vc->border_bottom_width),
            $Vjlmjalejjxa);

        $Vdidzwb0w3vc->width = $Vke0k1m0vmwu = $Vhoifq2kocyt - $Vxkloglrp2ec - $Vbambtqfrqf2;

        $Vzkuudgqzult = $Vs4gloy23a1d + $Vxkloglrp2ec;
        $Vle51ktvnbt4 = $Vrgmfgc31uah = $Vopgub02o3q2 + $Vsxv11nykvs0;

        
        $V3xsptcgzss2ndent = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->text_indent, $Vhoifq2kocyt);
        $this->_frame->increase_line_width($V3xsptcgzss2ndent);

        $Vc0dirmmlvo4 = $this->_frame->get_root();

        
        $Vdp4botbvmgp = $this->_frame->get_current_line_box();
        $Vdp4botbvmgp->y = $Vrgmfgc31uah;

        
        foreach ($this->_frame->get_children() as $Vtcc233inn5m) {
            if ($Vc0dirmmlvo4->is_full()) {
                break;
            }

            $Vtcc233inn5m->set_containing_block($Vzkuudgqzult, $Vle51ktvnbt4, $Vke0k1m0vmwu, $Vjlmjalejjxa);
            $this->process_clear($Vtcc233inn5m);
            $Vtcc233inn5m->reflow($this->_frame);
            $this->process_float($Vtcc233inn5m, $Vs4gloy23a1d + $Vxkloglrp2ec, $Vhoifq2kocyt - $Vbambtqfrqf2 - $Vxkloglrp2ec);
        }

        
        $Vdidzwb0w3vc_height = (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->height, $Vjlmjalejjxa);

        $this->_frame->set_content_height($this->_calculate_content_height());

        $Vjlmjalejjxaeight = max($Vdidzwb0w3vc_height, (float)$this->_frame->get_content_height());

        
        $Viucthlalllh = $Vjlmjalejjxaeight / count($Vneuyusyb51k["rows"]);

        if ($Vdidzwb0w3vc_height <= $Vjlmjalejjxaeight) {
            $Viucthlalllh += $Vsxv11nykvs0 + $Vho2z0yidkhp;
        }

        foreach ($Vneuyusyb51k["rows"] as $V3xsptcgzss2) {
            $Vdgy2mwoncbb->set_row_height($V3xsptcgzss2, $Viucthlalllh);
        }

        $Vdidzwb0w3vc->height = $Vjlmjalejjxaeight;
        $this->_text_align();
        $this->vertical_align();
    }
}
