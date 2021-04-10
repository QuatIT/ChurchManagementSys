<?php

namespace Dompdf\FrameDecorator;

use DOMElement;
use DOMNode;
use DOMText;
use Dompdf\Helpers;
use Dompdf\Dompdf;
use Dompdf\Frame;
use Dompdf\Frame\FrameTreeList;
use Dompdf\Frame\Factory;
use Dompdf\FrameReflower\AbstractFrameReflower;
use Dompdf\Css\Style;
use Dompdf\Positioner\AbstractPositioner;
use Dompdf\Exception;




abstract class AbstractFrameDecorator extends Frame
{
    const DEFAULT_COUNTER = "-dompdf-default-counter";

    public $V4mnmoxszifc = array(); 

    
    protected $Vnjwlrkwnjsn;

    
    protected $Vtabfexfghu0;

    
    protected $Vi23oywkj4ma;

    
    protected $V0pzclzyr2hm;

    
    protected $V3mbiykvshg0;

    
    private $V5zqjd5hivpj;

    
    private $Vro4gbdxprck;

    
    private $Vayvai2mepbp;

    
    function __construct(Frame $Vnk2ly5jcvjf, Dompdf $Vhvghaoacagz)
    {
        $this->_frame = $Vnk2ly5jcvjf;
        $this->_root = null;
        $this->_dompdf = $Vhvghaoacagz;
        $Vnk2ly5jcvjf->set_decorator($this);
    }

    
    function dispose($V2snefhk4mtq = false)
    {
        if ($V2snefhk4mtq) {
            while ($Vtcc233inn5m = $this->get_first_child()) {
                $Vtcc233inn5m->dispose(true);
            }
        }

        $this->_root = null;
        unset($this->_root);

        $this->_frame->dispose(true);
        $this->_frame = null;
        unset($this->_frame);

        $this->_positioner = null;
        unset($this->_positioner);

        $this->_reflower = null;
        unset($this->_reflower);
    }

    
    function copy(DOMNode $Vbr2bywdrplx)
    {
        $Vnk2ly5jcvjf = new Frame($Vbr2bywdrplx);
        $Vnk2ly5jcvjf->set_style(clone $this->_frame->get_original_style());

        return Factory::decorate_frame($Vnk2ly5jcvjf, $this->_dompdf, $this->_root);
    }

    
    function deep_copy()
    {
        $Vbr2bywdrplx = $this->_frame->get_node();

        if ($Vbr2bywdrplx instanceof DOMElement && $Vbr2bywdrplx->hasAttribute("id")) {
            $Vbr2bywdrplx->setAttribute("data-dompdf-original-id", $Vbr2bywdrplx->getAttribute("id"));
            $Vbr2bywdrplx->removeAttribute("id");
        }

        $Vnk2ly5jcvjf = new Frame($Vbr2bywdrplx->cloneNode());
        $Vnk2ly5jcvjf->set_style(clone $this->_frame->get_original_style());

        $V134ns25tz1t = Factory::decorate_frame($Vnk2ly5jcvjf, $this->_dompdf, $this->_root);

        foreach ($this->get_children() as $Vtcc233inn5m) {
            $V134ns25tz1t->append_child($Vtcc233inn5m->deep_copy());
        }

        return $V134ns25tz1t;
    }

    
    function reset()
    {
        $this->_frame->reset();

        $this->_counters = array();

        $this->_cached_parent = null; 

        
        foreach ($this->get_children() as $Vtcc233inn5m) {
            $Vtcc233inn5m->reset();
        }
    }

    

    
    function get_id()
    {
        return $this->_frame->get_id();
    }

    
    function get_frame()
    {
        return $this->_frame;
    }

    
    function get_node()
    {
        return $this->_frame->get_node();
    }

    
    function get_style()
    {
        return $this->_frame->get_style();
    }

    
    function get_original_style()
    {
        return $this->_frame->get_original_style();
    }

    
    function get_containing_block($V3xsptcgzss2 = null)
    {
        return $this->_frame->get_containing_block($V3xsptcgzss2);
    }

    
    function get_position($V3xsptcgzss2 = null)
    {
        return $this->_frame->get_position($V3xsptcgzss2);
    }

    
    function get_dompdf()
    {
        return $this->_dompdf;
    }

    
    function get_margin_height()
    {
        return $this->_frame->get_margin_height();
    }

    
    function get_margin_width()
    {
        return $this->_frame->get_margin_width();
    }

    
    function get_content_box()
    {
        return $this->_frame->get_content_box();
    }

    
    function get_padding_box()
    {
        return $this->_frame->get_padding_box();
    }

    
    function get_border_box()
    {
        return $this->_frame->get_border_box();
    }

    
    function set_id($V3xsptcgzss2d)
    {
        $this->_frame->set_id($V3xsptcgzss2d);
    }

    
    function set_style(Style $Vdidzwb0w3vc)
    {
        $this->_frame->set_style($Vdidzwb0w3vc);
    }

    
    function set_containing_block($Vs4gloy23a1d = null, $Vopgub02o3q2 = null, $Vhoifq2kocyt = null, $Vjlmjalejjxa = null)
    {
        $this->_frame->set_containing_block($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa);
    }

    
    function set_position($Vs4gloy23a1d = null, $Vopgub02o3q2 = null)
    {
        $this->_frame->set_position($Vs4gloy23a1d, $Vopgub02o3q2);
    }

    
    function is_auto_height()
    {
        return $this->_frame->is_auto_height();
    }

    
    function is_auto_width()
    {
        return $this->_frame->is_auto_width();
    }

    
    function __toString()
    {
        return $this->_frame->__toString();
    }

    
    function prepend_child(Frame $Vtcc233inn5m, $Vs0pda3r3hsl = true)
    {
        while ($Vtcc233inn5m instanceof AbstractFrameDecorator) {
            $Vtcc233inn5m = $Vtcc233inn5m->_frame;
        }

        $this->_frame->prepend_child($Vtcc233inn5m, $Vs0pda3r3hsl);
    }

    
    function append_child(Frame $Vtcc233inn5m, $Vs0pda3r3hsl = true)
    {
        while ($Vtcc233inn5m instanceof AbstractFrameDecorator) {
            $Vtcc233inn5m = $Vtcc233inn5m->_frame;
        }

        $this->_frame->append_child($Vtcc233inn5m, $Vs0pda3r3hsl);
    }

    
    function insert_child_before(Frame $Vtoj55lv2rsr, Frame $Vvaic4pvtywk, $Vs0pda3r3hsl = true)
    {
        while ($Vtoj55lv2rsr instanceof AbstractFrameDecorator) {
            $Vtoj55lv2rsr = $Vtoj55lv2rsr->_frame;
        }

        if ($Vvaic4pvtywk instanceof AbstractFrameDecorator) {
            $Vvaic4pvtywk = $Vvaic4pvtywk->_frame;
        }

        $this->_frame->insert_child_before($Vtoj55lv2rsr, $Vvaic4pvtywk, $Vs0pda3r3hsl);
    }

    
    function insert_child_after(Frame $Vtoj55lv2rsr, Frame $Vvaic4pvtywk, $Vs0pda3r3hsl = true)
    {
        $V3xsptcgzss2nsert_frame = $Vtoj55lv2rsr;
        while ($V3xsptcgzss2nsert_frame instanceof AbstractFrameDecorator) {
            $V3xsptcgzss2nsert_frame = $V3xsptcgzss2nsert_frame->_frame;
        }

        $Vvaic4pvtywkerence_frame = $Vvaic4pvtywk;
        while ($Vvaic4pvtywkerence_frame instanceof AbstractFrameDecorator) {
            $Vvaic4pvtywkerence_frame = $Vvaic4pvtywkerence_frame->_frame;
        }

        $this->_frame->insert_child_after($V3xsptcgzss2nsert_frame, $Vvaic4pvtywkerence_frame, $Vs0pda3r3hsl);
    }

    
    function remove_child(Frame $Vtcc233inn5m, $Vs0pda3r3hsl = true)
    {
        while ($Vtcc233inn5m instanceof AbstractFrameDecorator) {
            $Vtcc233inn5m = $Vtcc233inn5m->_frame;
        }

        return $this->_frame->remove_child($Vtcc233inn5m, $Vs0pda3r3hsl);
    }

    
    function get_parent($Vs41xhcqpk3a = true)
    {
        if ($Vs41xhcqpk3a && $this->_cached_parent) {
            return $this->_cached_parent;
        }
        $Vksopkgqixky = $this->_frame->get_parent();
        if ($Vksopkgqixky && $V134ns25tz1t = $Vksopkgqixky->get_decorator()) {
            while ($Vynpm04a4fx0 = $V134ns25tz1t->get_decorator()) {
                $V134ns25tz1t = $Vynpm04a4fx0;
            }

            return $this->_cached_parent = $V134ns25tz1t;
        } else {
            return $this->_cached_parent = $Vksopkgqixky;
        }
    }

    
    function get_first_child()
    {
        $Vv03lfntnmcz = $this->_frame->get_first_child();
        if ($Vv03lfntnmcz && $V134ns25tz1t = $Vv03lfntnmcz->get_decorator()) {
            while ($Vynpm04a4fx0 = $V134ns25tz1t->get_decorator()) {
                $V134ns25tz1t = $Vynpm04a4fx0;
            }

            return $V134ns25tz1t;
        } else {
            if ($Vv03lfntnmcz) {
                return $Vv03lfntnmcz;
            }
        }

        return null;
    }

    
    function get_last_child()
    {
        $Vv03lfntnmcz = $this->_frame->get_last_child();
        if ($Vv03lfntnmcz && $V134ns25tz1t = $Vv03lfntnmcz->get_decorator()) {
            while ($Vynpm04a4fx0 = $V134ns25tz1t->get_decorator()) {
                $V134ns25tz1t = $Vynpm04a4fx0;
            }

            return $V134ns25tz1t;
        } else {
            if ($Vv03lfntnmcz) {
                return $Vv03lfntnmcz;
            }
        }

        return null;
    }

    
    function get_prev_sibling()
    {
        $Vujweq34gtl3 = $this->_frame->get_prev_sibling();
        if ($Vujweq34gtl3 && $V134ns25tz1t = $Vujweq34gtl3->get_decorator()) {
            while ($Vynpm04a4fx0 = $V134ns25tz1t->get_decorator()) {
                $V134ns25tz1t = $Vynpm04a4fx0;
            }

            return $V134ns25tz1t;
        } else {
            if ($Vujweq34gtl3) {
                return $Vujweq34gtl3;
            }
        }

        return null;
    }

    
    function get_next_sibling()
    {
        $Vujweq34gtl3 = $this->_frame->get_next_sibling();
        if ($Vujweq34gtl3 && $V134ns25tz1t = $Vujweq34gtl3->get_decorator()) {
            while ($Vynpm04a4fx0 = $V134ns25tz1t->get_decorator()) {
                $V134ns25tz1t = $Vynpm04a4fx0;
            }

            return $V134ns25tz1t;
        } else {
            if ($Vujweq34gtl3) {
                return $Vujweq34gtl3;
            }
        }

        return null;
    }

    
    function get_subtree()
    {
        return new FrameTreeList($this);
    }

    function set_positioner(AbstractPositioner $Vksopkgqixkyosn)
    {
        $this->_positioner = $Vksopkgqixkyosn;
        if ($this->_frame instanceof AbstractFrameDecorator) {
            $this->_frame->set_positioner($Vksopkgqixkyosn);
        }
    }

    function set_reflower(AbstractFrameReflower $Vvaic4pvtywklower)
    {
        $this->_reflower = $Vvaic4pvtywklower;
        if ($this->_frame instanceof AbstractFrameDecorator) {
            $this->_frame->set_reflower($Vvaic4pvtywklower);
        }
    }

    
    function get_reflower()
    {
        return $this->_reflower;
    }

    
    function set_root(Frame $Vzlqynjxsspd)
    {
        $this->_root = $Vzlqynjxsspd;

        if ($this->_frame instanceof AbstractFrameDecorator) {
            $this->_frame->set_root($Vzlqynjxsspd);
        }
    }

    
    function get_root()
    {
        return $this->_root;
    }

    
    function find_block_parent()
    {
        
        $Vksopkgqixky = $this->get_parent();

        while ($Vksopkgqixky) {
            if ($Vksopkgqixky->is_block()) {
                break;
            }

            $Vksopkgqixky = $Vksopkgqixky->get_parent();
        }

        return $this->_block_parent = $Vksopkgqixky;
    }

    
    function find_positionned_parent()
    {
        
        $Vksopkgqixky = $this->get_parent();
        while ($Vksopkgqixky) {
            if ($Vksopkgqixky->is_positionned()) {
                break;
            }

            $Vksopkgqixky = $Vksopkgqixky->get_parent();
        }

        if (!$Vksopkgqixky) {
            $Vksopkgqixky = $this->_root->get_first_child(); 
        }

        return $this->_positionned_parent = $Vksopkgqixky;
    }

    
    function split(Frame $Vtcc233inn5m = null, $Vxx1fnm322ds = false)
    {
        
        $Vdidzwb0w3vc = $this->_frame->get_style();
        if (
            $this->_frame->get_node()->nodeName !== "body" &&
            $Vdidzwb0w3vc->counter_increment &&
            ($Vrg4i3nocvk4 = $Vdidzwb0w3vc->counter_increment) !== "none"
        ) {
            $this->decrement_counters($Vrg4i3nocvk4);
        }

        if (is_null($Vtcc233inn5m)) {
            
            
            
            if (!$this->is_text_node() && $this->get_node()->hasAttribute("dompdf_before_frame_id")) {
                foreach ($this->_frame->get_children() as $Vtcc233inn5m) {
                    if (
                        $this->get_node()->getAttribute("dompdf_before_frame_id") == $Vtcc233inn5m->get_id() &&
                        $Vtcc233inn5m->get_position('x') !== null
                    ) {
                        $Vdidzwb0w3vc = $Vtcc233inn5m->get_style();
                        if ($Vdidzwb0w3vc->counter_increment && ($Vrg4i3nocvk4 = $Vdidzwb0w3vc->counter_increment) !== "none") {
                            $this->decrement_counters($Vrg4i3nocvk4);
                        }
                    }
                }
            }
            $this->get_parent()->split($this, $Vxx1fnm322ds);

            return;
        }

        if ($Vtcc233inn5m->get_parent() !== $this) {
            throw new Exception("Unable to split: frame is not a child of this one.");
        }

        $Vbr2bywdrplx = $this->_frame->get_node();

        if ($Vbr2bywdrplx instanceof DOMElement && $Vbr2bywdrplx->hasAttribute("id")) {
            $Vbr2bywdrplx->setAttribute("data-dompdf-original-id", $Vbr2bywdrplx->getAttribute("id"));
            $Vbr2bywdrplx->removeAttribute("id");
        }

        $Vujweq34gtl3plit = $this->copy($Vbr2bywdrplx->cloneNode());
        $Vujweq34gtl3plit->reset();
        $Vujweq34gtl3plit->get_original_style()->text_indent = 0;
        $Vujweq34gtl3plit->_splitted = true;
        $Vujweq34gtl3plit->_already_pushed = true;

        
        if ($Vbr2bywdrplx->nodeName !== "body") {
            
            $Vdidzwb0w3vc = $this->_frame->get_style();
            $Vdidzwb0w3vc->margin_bottom = 0;
            $Vdidzwb0w3vc->padding_bottom = 0;
            $Vdidzwb0w3vc->border_bottom = 0;

            
            $Vfdmsptgjprm = $Vujweq34gtl3plit->get_original_style();
            $Vfdmsptgjprm->text_indent = 0;
            $Vfdmsptgjprm->margin_top = 0;
            $Vfdmsptgjprm->padding_top = 0;
            $Vfdmsptgjprm->border_top = 0;
            $Vfdmsptgjprm->page_break_before = "auto";
        }

        
        $this->get_parent()->insert_child_after($Vujweq34gtl3plit, $this);
        if ($this instanceof Block) {
            foreach ($this->get_line_boxes() as $V3xsptcgzss2ndex => $Vdp4botbvmgp) {
                $Vdp4botbvmgp->get_float_offsets();
            }
        }

        
        $V3xsptcgzss2ter = $Vtcc233inn5m;
        while ($V3xsptcgzss2ter) {
            $Vnk2ly5jcvjf = $V3xsptcgzss2ter;
            $V3xsptcgzss2ter = $V3xsptcgzss2ter->get_next_sibling();
            $Vnk2ly5jcvjf->reset();
            $Vnk2ly5jcvjf->_parent = $Vujweq34gtl3plit;
            $Vujweq34gtl3plit->append_child($Vnk2ly5jcvjf);

            
            if ($Vnk2ly5jcvjf instanceof Block) {
                foreach ($Vnk2ly5jcvjf->get_line_boxes() as $V3xsptcgzss2ndex => $Vdp4botbvmgp) {
                    $Vdp4botbvmgp->get_float_offsets();
                }
            }
        }

        $this->get_parent()->split($Vujweq34gtl3plit, $Vxx1fnm322ds);

        
        if ($Vdidzwb0w3vc->counter_reset && ($Vw4ekldf5fca = $Vdidzwb0w3vc->counter_reset) !== "none") {
            $Vjtba0lz024s = preg_split('/\s+/', trim($Vw4ekldf5fca), 2);
            $Vujweq34gtl3plit->_counters['__' . $Vjtba0lz024s[0]] = $this->lookup_counter_frame($Vjtba0lz024s[0])->_counters[$Vjtba0lz024s[0]];
        }
    }

    
    function reset_counter($V3xsptcgzss2d = self::DEFAULT_COUNTER, $Vqfra35f14fv = 0)
    {
        $this->get_parent()->_counters[$V3xsptcgzss2d] = intval($Vqfra35f14fv);
    }

    
    function decrement_counters($Vv03lfntnmczounters)
    {
        foreach ($Vv03lfntnmczounters as $V3xsptcgzss2d => $V3xsptcgzss2ncrement) {
            $this->increment_counter($V3xsptcgzss2d, intval($V3xsptcgzss2ncrement) * -1);
        }
    }

    
    function increment_counters($Vv03lfntnmczounters)
    {
        foreach ($Vv03lfntnmczounters as $V3xsptcgzss2d => $V3xsptcgzss2ncrement) {
            $this->increment_counter($V3xsptcgzss2d, intval($V3xsptcgzss2ncrement));
        }
    }

    
    function increment_counter($V3xsptcgzss2d = self::DEFAULT_COUNTER, $V3xsptcgzss2ncrement = 1)
    {
        $Vv03lfntnmczounter_frame = $this->lookup_counter_frame($V3xsptcgzss2d);

        if ($Vv03lfntnmczounter_frame) {
            if (!isset($Vv03lfntnmczounter_frame->_counters[$V3xsptcgzss2d])) {
                $Vv03lfntnmczounter_frame->_counters[$V3xsptcgzss2d] = 0;
            }

            $Vv03lfntnmczounter_frame->_counters[$V3xsptcgzss2d] += $V3xsptcgzss2ncrement;
        }
    }

    
    function lookup_counter_frame($V3xsptcgzss2d = self::DEFAULT_COUNTER)
    {
        $V4ljftfdeqpl = $this->get_parent();

        while ($V4ljftfdeqpl) {
            if (isset($V4ljftfdeqpl->_counters[$V3xsptcgzss2d])) {
                return $V4ljftfdeqpl;
            }
            $V4ljftfdeqplp = $V4ljftfdeqpl->get_parent();

            if (!$V4ljftfdeqplp) {
                return $V4ljftfdeqpl;
            }

            $V4ljftfdeqpl = $V4ljftfdeqplp;
        }

        return null;
    }

    
    function counter_value($V3xsptcgzss2d = self::DEFAULT_COUNTER, $Vxeifmjzikkj = "decimal")
    {
        $Vxeifmjzikkj = mb_strtolower($Vxeifmjzikkj);

        if (!isset($this->_counters[$V3xsptcgzss2d])) {
            $this->_counters[$V3xsptcgzss2d] = 0;
        }

        $Vqfra35f14fv = $this->_counters[$V3xsptcgzss2d];

        switch ($Vxeifmjzikkj) {
            default:
            case "decimal":
                return $Vqfra35f14fv;

            case "decimal-leading-zero":
                return str_pad($Vqfra35f14fv, 2, "0", STR_PAD_LEFT);

            case "lower-roman":
                return Helpers::dec2roman($Vqfra35f14fv);

            case "upper-roman":
                return mb_strtoupper(Helpers::dec2roman($Vqfra35f14fv));

            case "lower-latin":
            case "lower-alpha":
                return chr(($Vqfra35f14fv % 26) + ord('a') - 1);

            case "upper-latin":
            case "upper-alpha":
                return chr(($Vqfra35f14fv % 26) + ord('A') - 1);

            case "lower-greek":
                return Helpers::unichr($Vqfra35f14fv + 944);

            case "upper-greek":
                return Helpers::unichr($Vqfra35f14fv + 912);
        }
    }

    
    final function position()
    {
        $this->_positioner->position($this);
    }

    
    final function move($Valgvhs5my1x, $Vezx3f4fziht, $V3xsptcgzss2gnore_self = false)
    {
        $this->_positioner->move($this, $Valgvhs5my1x, $Vezx3f4fziht, $V3xsptcgzss2gnore_self);
    }

    
    final function reflow(Block $Vwoflziz3q5d = null)
    {
        
        
        
        $this->_reflower->reflow($Vwoflziz3q5d);
    }

    
    final function get_min_max_width()
    {
        return $this->_reflower->get_min_max_width();
    }

    
    final function calculate_auto_width()
    {
        return $this->_reflower->calculate_auto_width();
    }
}
