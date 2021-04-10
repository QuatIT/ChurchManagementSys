<?php

namespace Dompdf;

use Dompdf\FrameDecorator\Table as TableFrameDecorator;
use Dompdf\FrameDecorator\TableCell as TableCellFrameDecorator;


class Cellmap
{
    
    protected static $Vql1vwhdbcsd = array(
        "inset"  => 1,
        "groove" => 2,
        "outset" => 3,
        "ridge"  => 4,
        "dotted" => 5,
        "dashed" => 6,
        "solid"  => 7,
        "double" => 8,
        "hidden" => 9,
        "none"   => 0,
    );

    
    protected $Vwrnvghrrtwh;

    
    protected $Vetfz3plczdi;

    
    protected $V1yonf2ufslh;

    
    protected $Vo3jheqx5ui0;

    
    protected $Vfhwrot52buh;

    
    protected $Vkcuynxtasiq;

    
    protected $Vqp55q0su4ew;

    
    protected $Vassba4tcdne;

    
    private $Vwpylnqznjbf;

    
    private $Vn2ruyosnq5b;

    
    private $Vfhwrot52buh_locked = false;

    
    private $Vj3qyjrwa4ck = false;

    
    public function __construct(TableFrameDecorator $Vahqmfi4rdgw)
    {
        $this->_table = $Vahqmfi4rdgw;
        $this->reset();
    }

    
    public function reset()
    {
        $this->_num_rows = 0;
        $this->_num_cols = 0;

        $this->_cells = array();
        $this->_frames = array();

        if (!$this->_columns_locked) {
            $this->_columns = array();
        }

        $this->_rows = array();

        $this->_borders = array();

        $this->__col = $this->__row = 0;
    }

    
    public function lock_columns()
    {
        $this->_columns_locked = true;
    }

    
    public function is_columns_locked()
    {
        return $this->_columns_locked;
    }

    
    public function set_layout_fixed($Vn2vno5qlvmg)
    {
        $this->_fixed_layout = $Vn2vno5qlvmg;
    }

    
    public function is_layout_fixed()
    {
        return $this->_fixed_layout;
    }

    
    public function get_num_rows()
    {
        return $this->_num_rows;
    }

    
    public function get_num_cols()
    {
        return $this->_num_cols;
    }

    
    public function &get_columns()
    {
        return $this->_columns;
    }

    
    public function set_columns($Vxw4j5wpetex)
    {
        $this->_columns = $Vxw4j5wpetex;
    }

    
    public function &get_column($V3xsptcgzss2)
    {
        if (!isset($this->_columns[$V3xsptcgzss2])) {
            $this->_columns[$V3xsptcgzss2] = array(
                "x"          => 0,
                "min-width"  => 0,
                "max-width"  => 0,
                "used-width" => null,
                "absolute"   => 0,
                "percent"    => 0,
                "auto"       => true,
            );
        }

        return $this->_columns[$V3xsptcgzss2];
    }

    
    public function &get_rows()
    {
        return $this->_rows;
    }

    
    public function &get_row($V0hg12l10vfx)
    {
        if (!isset($this->_rows[$V0hg12l10vfx])) {
            $this->_rows[$V0hg12l10vfx] = array(
                "y"            => 0,
                "first-column" => 0,
                "height"       => null,
            );
        }

        return $this->_rows[$V0hg12l10vfx];
    }

    
    public function get_border($V3xsptcgzss2, $V0hg12l10vfx, $Vzvbv01wop1w, $V3ztho1nxwdy = null)
    {
        if (!isset($this->_borders[$V3xsptcgzss2][$V0hg12l10vfx][$Vzvbv01wop1w])) {
            $this->_borders[$V3xsptcgzss2][$V0hg12l10vfx][$Vzvbv01wop1w] = array(
                "width" => 0,
                "style" => "solid",
                "color" => "black",
            );
        }

        if (isset($V3ztho1nxwdy)) {
            return $this->_borders[$V3xsptcgzss2][$V0hg12l10vfx][$Vzvbv01wop1w][$V3ztho1nxwdy];
        }

        return $this->_borders[$V3xsptcgzss2][$V0hg12l10vfx][$Vzvbv01wop1w];
    }

    
    public function get_border_properties($V3xsptcgzss2, $V0hg12l10vfx)
    {
        return array(
            "top"    => $this->get_border($V3xsptcgzss2, $V0hg12l10vfx, "horizontal"),
            "right"  => $this->get_border($V3xsptcgzss2, $V0hg12l10vfx + 1, "vertical"),
            "bottom" => $this->get_border($V3xsptcgzss2 + 1, $V0hg12l10vfx, "horizontal"),
            "left"   => $this->get_border($V3xsptcgzss2, $V0hg12l10vfx, "vertical"),
        );
    }

    
    public function get_spanned_cells(Frame $Vnk2ly5jcvjf)
    {
        $Vqwhzgethmgj = $Vnk2ly5jcvjf->get_id();

        if (isset($this->_frames[$Vqwhzgethmgj])) {
            return $this->_frames[$Vqwhzgethmgj];
        }

        return null;
    }

    
    public function frame_exists_in_cellmap(Frame $Vnk2ly5jcvjf)
    {
        $Vqwhzgethmgj = $Vnk2ly5jcvjf->get_id();

        return isset($this->_frames[$Vqwhzgethmgj]);
    }

    
    public function get_frame_position(Frame $Vnk2ly5jcvjf)
    {
        global $Vzm5jqiedkr4;

        $Vqwhzgethmgj = $Vnk2ly5jcvjf->get_id();

        if (!isset($this->_frames[$Vqwhzgethmgj])) {
            throw new Exception("Frame not found in cellmap");
        }

        $Vhxdswanopzr = $this->_frames[$Vqwhzgethmgj]["columns"][0];
        $Vnwijnctkkq3 = $this->_frames[$Vqwhzgethmgj]["rows"][0];

        if (!isset($this->_columns[$Vhxdswanopzr])) {
            $Vzm5jqiedkr4[] = "Frame not found in columns array.  Check your table layout for missing or extra TDs.";
            $Vs4gloy23a1d = 0;
        } else {
            $Vs4gloy23a1d = $this->_columns[$Vhxdswanopzr]["x"];
        }

        if (!isset($this->_rows[$Vnwijnctkkq3])) {
            $Vzm5jqiedkr4[] = "Frame not found in row array.  Check your table layout for missing or extra TDs.";
            $Vopgub02o3q2 = 0;
        } else {
            $Vopgub02o3q2 = $this->_rows[$Vnwijnctkkq3]["y"];
        }

        return array($Vs4gloy23a1d, $Vopgub02o3q2, "x" => $Vs4gloy23a1d, "y" => $Vopgub02o3q2);
    }

    
    public function get_frame_width(Frame $Vnk2ly5jcvjf)
    {
        $Vqwhzgethmgj = $Vnk2ly5jcvjf->get_id();

        if (!isset($this->_frames[$Vqwhzgethmgj])) {
            throw new Exception("Frame not found in cellmap");
        }

        $Vhxdswanopzrs = $this->_frames[$Vqwhzgethmgj]["columns"];
        $Vhoifq2kocyt = 0;
        foreach ($Vhxdswanopzrs as $V3xsptcgzss2) {
            $Vhoifq2kocyt += $this->_columns[$V3xsptcgzss2]["used-width"];
        }

        return $Vhoifq2kocyt;
    }

    
    public function get_frame_height(Frame $Vnk2ly5jcvjf)
    {
        $Vqwhzgethmgj = $Vnk2ly5jcvjf->get_id();

        if (!isset($this->_frames[$Vqwhzgethmgj])) {
            throw new Exception("Frame not found in cellmap");
        }

        $Vnwijnctkkq3s = $this->_frames[$Vqwhzgethmgj]["rows"];
        $Vjlmjalejjxa = 0;
        foreach ($Vnwijnctkkq3s as $V3xsptcgzss2) {
            if (!isset($this->_rows[$V3xsptcgzss2])) {
                throw new Exception("The row #$V3xsptcgzss2 could not be found, please file an issue in the tracker with the HTML code");
            }

            $Vjlmjalejjxa += $this->_rows[$V3xsptcgzss2]["height"];
        }

        return $Vjlmjalejjxa;
    }

    
    public function set_column_width($V0hg12l10vfx, $Vhoifq2kocytidth)
    {
        if ($this->_columns_locked) {
            return;
        }

        $Vhxdswanopzr =& $this->get_column($V0hg12l10vfx);
        $Vhxdswanopzr["used-width"] = $Vhoifq2kocytidth;
        $Vmfw31gob2bf =& $this->get_column($V0hg12l10vfx + 1);
        $Vmfw31gob2bf["x"] = $Vmfw31gob2bf["x"] + $Vhoifq2kocytidth;
    }

    
    public function set_row_height($V3xsptcgzss2, $Vjlmjalejjxaeight)
    {
        $Vnwijnctkkq3 =& $this->get_row($V3xsptcgzss2);

        if ($Vnwijnctkkq3["height"] !== null && $Vjlmjalejjxaeight <= $Vnwijnctkkq3["height"]) {
            return;
        }

        $Vnwijnctkkq3["height"] = $Vjlmjalejjxaeight;
        $Vuskvdkpxecc =& $this->get_row($V3xsptcgzss2 + 1);
        $Vuskvdkpxecc["y"] = $Vnwijnctkkq3["y"] + $Vjlmjalejjxaeight;

    }

    
    protected function _resolve_border($V3xsptcgzss2, $V0hg12l10vfx, $Vzvbv01wop1w, $Vokwve3d1nkg)
    {
        $V3ni3atidkrj = $Vokwve3d1nkg["width"];
        $V5rsbhfyc4zl = $Vokwve3d1nkg["style"];

        if (!isset($this->_borders[$V3xsptcgzss2][$V0hg12l10vfx][$Vzvbv01wop1w])) {
            $this->_borders[$V3xsptcgzss2][$V0hg12l10vfx][$Vzvbv01wop1w] = $Vokwve3d1nkg;

            return $this->_borders[$V3xsptcgzss2][$V0hg12l10vfx][$Vzvbv01wop1w]["width"];
        }

        $Vbwksq2eviuk = & $this->_borders[$V3xsptcgzss2][$V0hg12l10vfx][$Vzvbv01wop1w];

        $Va2dftiqrcgz = $Vbwksq2eviuk["width"];
        $Vpm3jz4k3y2i = $Vbwksq2eviuk["style"];

        if (($V5rsbhfyc4zl === "hidden" ||
                $V3ni3atidkrj > $Va2dftiqrcgz ||
                $Vpm3jz4k3y2i === "none")

            or

            ($Va2dftiqrcgz == $V3ni3atidkrj &&
                in_array($V5rsbhfyc4zl, self::$Vql1vwhdbcsd) &&
                self::$Vql1vwhdbcsd[$V5rsbhfyc4zl] > self::$Vql1vwhdbcsd[$Vpm3jz4k3y2i])
        ) {
            $Vbwksq2eviuk = $Vokwve3d1nkg;
        }

        return $Vbwksq2eviuk["width"];
    }

    
    public function add_frame(Frame $Vnk2ly5jcvjf)
    {
        $Vdidzwb0w3vc = $Vnk2ly5jcvjf->get_style();
        $Vsagginauquc = $Vdidzwb0w3vc->display;

        $Vhxdswanopzrlapse = $this->_table->get_style()->border_collapse == "collapse";

        
        if ($Vsagginauquc === "table-row" ||
            $Vsagginauquc === "table" ||
            $Vsagginauquc === "inline-table" ||
            in_array($Vsagginauquc, TableFrameDecorator::$Vl0lmlwo3v4l)
        ) {
            $V4eae04j0k2w = $this->__row;
            foreach ($Vnk2ly5jcvjf->get_children() as $Vtcc233inn5m) {
                
                if (!($Vtcc233inn5m instanceof FrameDecorator\Text) && $Vtcc233inn5m->get_node()->nodeName !== 'dompdf_generated') {
                    $this->add_frame($Vtcc233inn5m);
                }
            }

            if ($Vsagginauquc === "table-row") {
                $this->add_row();
            }

            $V0eivvdconcj = $this->__row - $V4eae04j0k2w - 1;
            $Vqwhzgethmgj = $Vnk2ly5jcvjf->get_id();

            
            $this->_frames[$Vqwhzgethmgj]["columns"] = range(0, max(0, $this->_num_cols - 1));
            $this->_frames[$Vqwhzgethmgj]["rows"] = range($V4eae04j0k2w, max(0, $this->__row - 1));
            $this->_frames[$Vqwhzgethmgj]["frame"] = $Vnk2ly5jcvjf;

            if ($Vsagginauquc !== "table-row" && $Vhxdswanopzrlapse) {
                $Vhkhr2kulnam = $Vdidzwb0w3vc->get_border_properties();

                
                for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $V0eivvdconcj + 1; $V3xsptcgzss2++) {
                    $this->_resolve_border($V4eae04j0k2w + $V3xsptcgzss2, 0, "vertical", $Vhkhr2kulnam["left"]);
                    $this->_resolve_border($V4eae04j0k2w + $V3xsptcgzss2, $this->_num_cols, "vertical", $Vhkhr2kulnam["right"]);
                }

                for ($V0hg12l10vfx = 0; $V0hg12l10vfx < $this->_num_cols; $V0hg12l10vfx++) {
                    $this->_resolve_border($V4eae04j0k2w, $V0hg12l10vfx, "horizontal", $Vhkhr2kulnam["top"]);
                    $this->_resolve_border($this->__row, $V0hg12l10vfx, "horizontal", $Vhkhr2kulnam["bottom"]);
                }
            }
            return;
        }

        $Vbr2bywdrplx = $Vnk2ly5jcvjf->get_node();

        
        $Vhxdswanopzrspan = $Vbr2bywdrplx->getAttribute("colspan");
        $Vnwijnctkkq3span = $Vbr2bywdrplx->getAttribute("rowspan");

        if (!$Vhxdswanopzrspan) {
            $Vhxdswanopzrspan = 1;
            $Vbr2bywdrplx->setAttribute("colspan", 1);
        }

        if (!$Vnwijnctkkq3span) {
            $Vnwijnctkkq3span = 1;
            $Vbr2bywdrplx->setAttribute("rowspan", 1);
        }
        $Vqwhzgethmgj = $Vnk2ly5jcvjf->get_id();

        $Vhkhr2kulnam = $Vdidzwb0w3vc->get_border_properties();


        
        $Vqhbvftcjufm = $V4pmq3fcnue0 = 0;

        
        $Vyc1j32tfqfh = $this->__col;
        while (isset($this->_cells[$this->__row][$Vyc1j32tfqfh])) {
            $Vyc1j32tfqfh++;
        }

        $this->__col = $Vyc1j32tfqfh;

        
        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vnwijnctkkq3span; $V3xsptcgzss2++) {
            $Vnwijnctkkq3 = $this->__row + $V3xsptcgzss2;

            $this->_frames[$Vqwhzgethmgj]["rows"][] = $Vnwijnctkkq3;

            for ($V0hg12l10vfx = 0; $V0hg12l10vfx < $Vhxdswanopzrspan; $V0hg12l10vfx++) {
                $this->_cells[$Vnwijnctkkq3][$this->__col + $V0hg12l10vfx] = $Vnk2ly5jcvjf;
            }

            if ($Vhxdswanopzrlapse) {
                
                $Vqhbvftcjufm = max($Vqhbvftcjufm, $this->_resolve_border($Vnwijnctkkq3, $this->__col, "vertical", $Vhkhr2kulnam["left"]));
                $V4pmq3fcnue0 = max($V4pmq3fcnue0, $this->_resolve_border($Vnwijnctkkq3, $this->__col + $Vhxdswanopzrspan, "vertical", $Vhkhr2kulnam["right"]));
            }
        }

        $Vknsfvvfeb3p = $Vbvnn53owgqm = 0;

        
        for ($V0hg12l10vfx = 0; $V0hg12l10vfx < $Vhxdswanopzrspan; $V0hg12l10vfx++) {
            $Vhxdswanopzr = $this->__col + $V0hg12l10vfx;
            $this->_frames[$Vqwhzgethmgj]["columns"][] = $Vhxdswanopzr;

            if ($Vhxdswanopzrlapse) {
                
                $Vknsfvvfeb3p = max($Vknsfvvfeb3p, $this->_resolve_border($this->__row, $Vhxdswanopzr, "horizontal", $Vhkhr2kulnam["top"]));
                $Vbvnn53owgqm = max($Vbvnn53owgqm, $this->_resolve_border($this->__row + $Vnwijnctkkq3span, $Vhxdswanopzr, "horizontal", $Vhkhr2kulnam["bottom"]));
            }
        }

        $this->_frames[$Vqwhzgethmgj]["frame"] = $Vnk2ly5jcvjf;

        
        if (!$Vhxdswanopzrlapse) {
            list($Vjlmjalejjxa, $Vpszt12nvbau) = $this->_table->get_style()->border_spacing;

            
            $Vpszt12nvbau = $Vdidzwb0w3vc->length_in_pt($Vpszt12nvbau);
            if (is_numeric($Vpszt12nvbau)) {
                $Vpszt12nvbau = $Vpszt12nvbau / 2;
            }
            $Vjlmjalejjxa = $Vdidzwb0w3vc->length_in_pt($Vjlmjalejjxa);
            if (is_numeric($Vjlmjalejjxa)) {
                $Vjlmjalejjxa = $Vjlmjalejjxa / 2;
            }
            $Vdidzwb0w3vc->margin = "$Vpszt12nvbau $Vjlmjalejjxa";

            
        } else {
            
            $Vdidzwb0w3vc->border_left_width = $Vqhbvftcjufm / 2;
            $Vdidzwb0w3vc->border_right_width = $V4pmq3fcnue0 / 2;
            $Vdidzwb0w3vc->border_top_width = $Vknsfvvfeb3p / 2;
            $Vdidzwb0w3vc->border_bottom_width = $Vbvnn53owgqm / 2;
            $Vdidzwb0w3vc->margin = "none";
        }

        if (!$this->_columns_locked) {
            
            if ($this->_fixed_layout) {
                list($Vnk2ly5jcvjf_min, $Vnk2ly5jcvjf_max) = array(0, 10e-10);
            } else {
                list($Vnk2ly5jcvjf_min, $Vnk2ly5jcvjf_max) = $Vnk2ly5jcvjf->get_min_max_width();
            }

            $Vhoifq2kocytidth = $Vdidzwb0w3vc->width;

            $Vpszt12nvbaual = null;
            if (Helpers::is_percent($Vhoifq2kocytidth)) {
                $Vpszt12nvbauar = "percent";
                $Vpszt12nvbaual = (float)rtrim($Vhoifq2kocytidth, "% ") / $Vhxdswanopzrspan;
            } else if ($Vhoifq2kocytidth !== "auto") {
                $Vpszt12nvbauar = "absolute";
                $Vpszt12nvbaual = $Vdidzwb0w3vc->length_in_pt($Vnk2ly5jcvjf_min) / $Vhxdswanopzrspan;
            }

            $V2nh50bvjhl4 = 0;
            $Vc1ytxzqpa5h = 0;
            for ($Vivvnqss0oro = 0; $Vivvnqss0oro < $Vhxdswanopzrspan; $Vivvnqss0oro++) {

                
                $Vhxdswanopzr =& $this->get_column($this->__col + $Vivvnqss0oro);

                
                
                
                if (isset($Vpszt12nvbauar) && $Vpszt12nvbaual > $Vhxdswanopzr[$Vpszt12nvbauar]) {
                    $Vhxdswanopzr[$Vpszt12nvbauar] = $Vpszt12nvbaual;
                    $Vhxdswanopzr["auto"] = false;
                }

                $V2nh50bvjhl4 += $Vhxdswanopzr["min-width"];
                $Vc1ytxzqpa5h += $Vhxdswanopzr["max-width"];
            }

            if ($Vnk2ly5jcvjf_min > $V2nh50bvjhl4) {
                
                
                $V3xsptcgzss2nc = ($this->is_layout_fixed() ? 10e-10 : ($Vnk2ly5jcvjf_min - $V2nh50bvjhl4) / $Vhxdswanopzrspan);
                for ($Vv03lfntnmcz = 0; $Vv03lfntnmcz < $Vhxdswanopzrspan; $Vv03lfntnmcz++) {
                    $Vhxdswanopzr =& $this->get_column($this->__col + $Vv03lfntnmcz);
                    $Vhxdswanopzr["min-width"] += $V3xsptcgzss2nc;
                }
            }

            if ($Vnk2ly5jcvjf_max > $Vc1ytxzqpa5h) {
                
                $V3xsptcgzss2nc = ($this->is_layout_fixed() ? 10e-10 : ($Vnk2ly5jcvjf_max - $Vc1ytxzqpa5h) / $Vhxdswanopzrspan);
                for ($Vv03lfntnmcz = 0; $Vv03lfntnmcz < $Vhxdswanopzrspan; $Vv03lfntnmcz++) {
                    $Vhxdswanopzr =& $this->get_column($this->__col + $Vv03lfntnmcz);
                    $Vhxdswanopzr["max-width"] += $V3xsptcgzss2nc;
                }
            }
        }

        $this->__col += $Vhxdswanopzrspan;
        if ($this->__col > $this->_num_cols) {
            $this->_num_cols = $this->__col;
        }
    }

    
    public function add_row()
    {
        $this->__row++;
        $this->_num_rows++;

        
        $V3xsptcgzss2 = 0;
        while (isset($this->_cells[$this->__row][$V3xsptcgzss2])) {
            $V3xsptcgzss2++;
        }

        $this->__col = $V3xsptcgzss2;
    }

    
    public function remove_row(Frame $Vnwijnctkkq3)
    {
        $Vqwhzgethmgj = $Vnwijnctkkq3->get_id();
        if (!isset($this->_frames[$Vqwhzgethmgj])) {
            return; 
        }

        $this->__row = $this->_num_rows--;

        $Vnwijnctkkq3s = $this->_frames[$Vqwhzgethmgj]["rows"];
        $Vxw4j5wpetex = $this->_frames[$Vqwhzgethmgj]["columns"];

        
        foreach ($Vnwijnctkkq3s as $Vkabkv5ip0kg) {
            foreach ($Vxw4j5wpetex as $Vv03lfntnmcz) {
                if (isset($this->_cells[$Vkabkv5ip0kg][$Vv03lfntnmcz])) {
                    $V3xsptcgzss2d = $this->_cells[$Vkabkv5ip0kg][$Vv03lfntnmcz]->get_id();

                    $this->_cells[$Vkabkv5ip0kg][$Vv03lfntnmcz] = null;
                    unset($this->_cells[$Vkabkv5ip0kg][$Vv03lfntnmcz]);

                    
                    if (isset($this->_frames[$V3xsptcgzss2d]) && count($this->_frames[$V3xsptcgzss2d]["rows"]) > 1) {
                        
                        if (($Vnwijnctkkq3_key = array_search($Vkabkv5ip0kg, $this->_frames[$V3xsptcgzss2d]["rows"])) !== false) {
                            unset($this->_frames[$V3xsptcgzss2d]["rows"][$Vnwijnctkkq3_key]);
                        }
                        continue;
                    }

                    $this->_frames[$V3xsptcgzss2d] = null;
                    unset($this->_frames[$V3xsptcgzss2d]);
                }
            }

            $this->_rows[$Vkabkv5ip0kg] = null;
            unset($this->_rows[$Vkabkv5ip0kg]);
        }

        $this->_frames[$Vqwhzgethmgj] = null;
        unset($this->_frames[$Vqwhzgethmgj]);
    }

    
    public function remove_row_group(Frame $V0o4wg1ye23g)
    {
        $Vqwhzgethmgj = $V0o4wg1ye23g->get_id();
        if (!isset($this->_frames[$Vqwhzgethmgj])) {
            return; 
        }

        $V3xsptcgzss2ter = $V0o4wg1ye23g->get_first_child();
        while ($V3xsptcgzss2ter) {
            $this->remove_row($V3xsptcgzss2ter);
            $V3xsptcgzss2ter = $V3xsptcgzss2ter->get_next_sibling();
        }

        $this->_frames[$Vqwhzgethmgj] = null;
        unset($this->_frames[$Vqwhzgethmgj]);
    }

    
    public function update_row_group(Frame $V0o4wg1ye23g, Frame $Vwof0wlsq2w0)
    {
        $Vu13zjxsh0ye = $V0o4wg1ye23g->get_id();
        $Vkabkv5ip0kg_key = $Vwof0wlsq2w0->get_id();

        $Vkabkv5ip0kg_rows = $this->_frames[$Vu13zjxsh0ye]["rows"];
        $this->_frames[$Vu13zjxsh0ye]["rows"] = range($this->_frames[$Vu13zjxsh0ye]["rows"][0], end($Vkabkv5ip0kg_rows));
    }

    
    public function assign_x_positions()
    {
        
        

        if ($this->_columns_locked) {
            return;
        }

        $Vs4gloy23a1d = $this->_columns[0]["x"];
        foreach (array_keys($this->_columns) as $V0hg12l10vfx) {
            $this->_columns[$V0hg12l10vfx]["x"] = $Vs4gloy23a1d;
            $Vs4gloy23a1d += $this->_columns[$V0hg12l10vfx]["used-width"];
        }
    }

    
    public function assign_frame_heights()
    {
        
        
        foreach ($this->_frames as $Vnr1h2vcbxvj) {
            $Vnk2ly5jcvjf = $Vnr1h2vcbxvj["frame"];

            $Vjlmjalejjxa = 0;
            foreach ($Vnr1h2vcbxvj["rows"] as $Vnwijnctkkq3) {
                if (!isset($this->_rows[$Vnwijnctkkq3])) {
                    
                    continue;
                }

                $Vjlmjalejjxa += $this->_rows[$Vnwijnctkkq3]["height"];
            }

            if ($Vnk2ly5jcvjf instanceof TableCellFrameDecorator) {
                $Vnk2ly5jcvjf->set_cell_height($Vjlmjalejjxa);
            } else {
                $Vnk2ly5jcvjf->get_style()->height = $Vjlmjalejjxa;
            }
        }
    }

    
    public function set_frame_heights($Vahqmfi4rdgw_height, $Vv03lfntnmczontent_height)
    {
        
        foreach ($this->_frames as $Vnr1h2vcbxvj) {
            $Vnk2ly5jcvjf = $Vnr1h2vcbxvj["frame"];

            $Vjlmjalejjxa = 0;
            foreach ($Vnr1h2vcbxvj["rows"] as $Vnwijnctkkq3) {
                if (!isset($this->_rows[$Vnwijnctkkq3])) {
                    continue;
                }

                $Vjlmjalejjxa += $this->_rows[$Vnwijnctkkq3]["height"];
            }

            if ($Vv03lfntnmczontent_height > 0) {
                $V0rbmnonn1iu = ($Vjlmjalejjxa / $Vv03lfntnmczontent_height) * $Vahqmfi4rdgw_height;
            } else {
                $V0rbmnonn1iu = 0;
            }

            if ($Vnk2ly5jcvjf instanceof TableCellFrameDecorator) {
                $Vnk2ly5jcvjf->set_cell_height($V0rbmnonn1iu);
            } else {
                $Vnk2ly5jcvjf->get_style()->height = $V0rbmnonn1iu;
            }
        }
    }

    
    public function __toString()
    {
        $Vadkcwffkfxw = "";
        $Vadkcwffkfxw .= "Columns:<br/>";
        $Vadkcwffkfxw .= Helpers::pre_r($this->_columns, true);
        $Vadkcwffkfxw .= "Rows:<br/>";
        $Vadkcwffkfxw .= Helpers::pre_r($this->_rows, true);

        $Vadkcwffkfxw .= "Frames:<br/>";
        $Vnr1h2vcbxvj = array();
        foreach ($this->_frames as $Vqwhzgethmgj => $Vpszt12nvbaual) {
            $Vnr1h2vcbxvj[$Vqwhzgethmgj] = array("columns" => $Vpszt12nvbaual["columns"], "rows" => $Vpszt12nvbaual["rows"]);
        }

        $Vadkcwffkfxw .= Helpers::pre_r($Vnr1h2vcbxvj, true);

        if (php_sapi_name() == "cli") {
            $Vadkcwffkfxw = strip_tags(str_replace(array("<br/>", "<b>", "</b>"),
                array("\n", chr(27) . "[01;33m", chr(27) . "[0m"),
                $Vadkcwffkfxw));
        }

        return $Vadkcwffkfxw;
    }
}
