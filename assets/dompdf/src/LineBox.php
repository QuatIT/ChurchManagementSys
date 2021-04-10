<?php

namespace Dompdf;

use Dompdf\FrameDecorator\Block;
use Dompdf\FrameDecorator\Page;


class LineBox
{

    
    protected $Vo1a3wki1dhj;

    
    protected $Vassba4tcdne = array();

    
    public $Vrjt3xcykhaj = 0;

    
    public $Vopgub02o3q2 = null;

    
    public $Vhoifq2kocyt = 0.0;

    
    public $Vjlmjalejjxa = 0.0;

    
    public $V0opnfka0og1 = 0.0;

    
    public $Vqemi0kebtld = 0.0;

    
    public $Vhpgk42vcvfd = null;

    
    public $Ve40nqgog2bw = array();

    
    public $Vxo14t4heoku = false;

    
    public function __construct(Block $Vnk2ly5jcvjf, $Vopgub02o3q2 = 0)
    {
        $this->_block_frame = $Vnk2ly5jcvjf;
        $this->_frames = array();
        $this->y = $Vopgub02o3q2;

        $this->get_float_offsets();
    }

    
    public function get_floats_inside(Page $Vzlqynjxsspd)
    {
        $Vlvq1dkrblm4 = $Vzlqynjxsspd->get_floating_frames();

        if (count($Vlvq1dkrblm4) == 0) {
            return $Vlvq1dkrblm4;
        }

        
        $Vksopkgqixky = $this->_block_frame;
        while ($Vksopkgqixky->get_style()->float === "none") {
            $Vksopkgqixkyarent = $Vksopkgqixky->get_parent();

            if (!$Vksopkgqixkyarent) {
                break;
            }

            $Vksopkgqixky = $Vksopkgqixkyarent;
        }

        if ($Vksopkgqixky == $Vzlqynjxsspd) {
            return $Vlvq1dkrblm4;
        }

        $Vksopkgqixkyarent = $Vksopkgqixky;

        $Vnmt34au1qxo = array();

        foreach ($Vlvq1dkrblm4 as $Vesyhcylmqaj) {
            $Vksopkgqixky = $Vesyhcylmqaj->get_parent();

            while (($Vksopkgqixky = $Vksopkgqixky->get_parent()) && $Vksopkgqixky !== $Vksopkgqixkyarent);

            if ($Vksopkgqixky) {
                $Vnmt34au1qxo[] = $Vksopkgqixky;
            }
        }

        return $Vnmt34au1qxo;
    }

    
    public function get_float_offsets()
    {
        static $Vckblrkkkhhs = 10000; 

        $Vfznctyvx2oe = $this->_block_frame->get_reflower();

        if (!$Vfznctyvx2oe) {
            return;
        }

        $Vke0k1m0vmwu = null;

        $Vwoflziz3q5d = $this->_block_frame;
        $Vzlqynjxsspd = $Vwoflziz3q5d->get_root();

        if (!$Vzlqynjxsspd) {
            return;
        }

        $Vdidzwb0w3vc = $this->_block_frame->get_style();
        $Vlvq1dkrblm4 = $this->get_floats_inside($Vzlqynjxsspd);
        $Vgjsrilwyjie = 0;
        $Vgjl55wf0xdw = 0;
        $Vy5bbpbfhxut = 0;
        $Vo3jt4zx1gcd = 0;

        foreach ($Vlvq1dkrblm4 as $V42wnqg4n4th => $Vbaxrngpl52m) {
            $Vbaxrngpl52m_parent = $Vbaxrngpl52m->get_parent();
            $Vkriocz2qep2 = $Vbaxrngpl52m->get_id();

            if (isset($this->floating_blocks[$Vkriocz2qep2])) {
                continue;
            }

            $Vzte0430tk0z = $Vbaxrngpl52m->get_style()->float;
            $Vzte0430tk0zing_width = $Vbaxrngpl52m->get_margin_width();

            if (!$Vke0k1m0vmwu) {
                $Vke0k1m0vmwu = $Vbaxrngpl52m->get_containing_block("w");
            }

            $Vaf1jxuakj4a = $this->get_width();

            if (!$Vbaxrngpl52m->_float_next_line && ($Vke0k1m0vmwu <= $Vaf1jxuakj4a + $Vzte0430tk0zing_width) && ($Vke0k1m0vmwu > $Vaf1jxuakj4a)) {
                $Vbaxrngpl52m->_float_next_line = true;
                continue;
            }

            
            if ($Vckblrkkkhhs-- > 0 &&
                $Vbaxrngpl52m->get_position("y") + $Vbaxrngpl52m->get_margin_height() >= $this->y &&
                $Vwoflziz3q5d->get_position("x") + $Vwoflziz3q5d->get_margin_width() >= $Vbaxrngpl52m->get_position("x")
            ) {
                if ($Vzte0430tk0z === "left") {
                    if ($Vbaxrngpl52m_parent === $this->_block_frame) {
                        $Vgjsrilwyjie += $Vzte0430tk0zing_width;
                    } else {
                        $Vy5bbpbfhxut += $Vzte0430tk0zing_width;
                    }
                } elseif ($Vzte0430tk0z === "right") {
                    if ($Vbaxrngpl52m_parent === $this->_block_frame) {
                        $Vgjl55wf0xdw += $Vzte0430tk0zing_width;
                    } else {
                        $Vo3jt4zx1gcd += $Vzte0430tk0zing_width;
                    }
                }

                $this->floating_blocks[$Vkriocz2qep2] = true;
            } 
            else {
                $Vzlqynjxsspd->remove_floating_frame($V42wnqg4n4th);
            }
        }

        $this->left += $Vgjsrilwyjie;
        if ($Vy5bbpbfhxut > 0 && $Vy5bbpbfhxut > ((float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_left) + (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->padding_left))) {
            $this->left += $Vy5bbpbfhxut - (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_left) - (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->padding_left);
        }
        $this->right += $Vgjl55wf0xdw;
        if ($Vo3jt4zx1gcd > 0 && $Vo3jt4zx1gcd > ((float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_left) + (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->padding_right))) {
            $this->right += $Vo3jt4zx1gcd - (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->margin_right) - (float)$Vdidzwb0w3vc->length_in_pt($Vdidzwb0w3vc->padding_right);
        }
    }

    
    public function get_width()
    {
        return $this->left + $this->w + $this->right;
    }

    
    public function get_block_frame()
    {
        return $this->_block_frame;
    }

    
    function &get_frames()
    {
        return $this->_frames;
    }

    
    public function add_frame(Frame $Vnk2ly5jcvjf)
    {
        $this->_frames[] = $Vnk2ly5jcvjf;
    }

    
    public function recalculate_width()
    {
        $Vhoifq2kocytidth = 0;

        foreach ($this->get_frames() as $Vnk2ly5jcvjf) {
            $Vhoifq2kocytidth += $Vnk2ly5jcvjf->calculate_auto_width();
        }

        return $this->w = $Vhoifq2kocytidth;
    }

    
    public function __toString()
    {
        $Vksopkgqixkyrops = array("wc", "y", "w", "h", "left", "right", "br");
        $Vujweq34gtl3 = "";
        foreach ($Vksopkgqixkyrops as $Vksopkgqixkyrop) {
            $Vujweq34gtl3 .= "$Vksopkgqixkyrop: " . $this->$Vksopkgqixkyrop . "\n";
        }
        $Vujweq34gtl3 .= count($this->_frames) . " frames\n";

        return $Vujweq34gtl3;
    }
    
}


