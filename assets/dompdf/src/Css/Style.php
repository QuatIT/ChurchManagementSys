<?php

namespace Dompdf\Css;

use Dompdf\Adapter\CPDF;
use Dompdf\Exception;
use Dompdf\Helpers;
use Dompdf\FontMetrics;
use Dompdf\Frame;


class Style
{

    const CSS_IDENTIFIER = "-?[_a-zA-Z]+[_a-zA-Z0-9-]*";
    const CSS_INTEGER = "-?\d+";

    
    static $V0pkeukzj3tv = 12;

    
    static $Vqpbory0b2vd = 1.2;

    
    static $Vjpaaekslmk0 = array(
        "xx-small" => 0.6, 
        "x-small" => 0.75, 
        "small" => 0.889, 
        "medium" => 1, 
        "large" => 1.2, 
        "x-large" => 1.5, 
        "xx-large" => 2.0, 
    );

    
    static $Vgkblykdxhiz = array("baseline", "bottom", "middle", "sub",
        "super", "text-bottom", "text-top", "top");

    
    static $V3irmujeshqx = array("inline");

    
    static $Vb34q1c1cezy = array("block", "inline-block", "table-cell", "list-item");

    
    static $Vad23z5m2olf = array("relative", "absolute", "fixed");

    
    static $Vwc5svvuqws2 = array("table", "inline-table");

    
    static $Vn2tnb4bpsay = array("none", "hidden", "dotted", "dashed", "solid",
        "double", "groove", "ridge", "inset", "outset");

    
    static protected $Vg2bme5jlm5x = null;

    
    static protected $V01d001lnt0o = null;

    
    static protected $Vr0sfrk1yr4a = array();

    
    protected $Vmknuyjgom32; 

    
    protected $V0x0vdkyux5q;

    
    protected $Vdp43fjbxgwr;

    
    protected $Vro4bg4buwad;

    
    protected $V03k2ery1xln;

    
    protected $V5zeqtnsnsef; 

    protected $Vabssqa1smhs;

    
    protected $Vtabfexfghu0;

    
    protected $Vjkyspaz2bs1 = Stylesheet::ORIG_AUTHOR;

    
    
    private $Vfqugfjo1mar; 

    
    private $V3wchz4tus0e = null;

    
    private $Vewsykrkyy14 = null;

    
    public $V3yhtwqbuhrq = false;

    
    private $Vj1pbeciqvz4;

    
    public function __construct(Stylesheet $V5fvtlalkarx, $Vineliqwe2ne = Stylesheet::ORIG_AUTHOR)
    {
        $Vcki4t4qmybshis->setFontMetrics($V5fvtlalkarx->getFontMetrics());

        $Vcki4t4qmybshis->_props = array();
        $Vcki4t4qmybshis->_important_props = array();
        $Vcki4t4qmybshis->_stylesheet = $V5fvtlalkarx;
        $Vcki4t4qmybshis->_media_queries = array();
        $Vcki4t4qmybshis->_origin = $Vineliqwe2ne;
        $Vcki4t4qmybshis->_parent_font_size = null;
        $Vcki4t4qmybshis->__font_size_calculated = false;

        if (!isset(self::$Vg2bme5jlm5x)) {

            
            $Vcyg5xmwfpxo =& self::$Vg2bme5jlm5x;

            
            $Vcyg5xmwfpxo["azimuth"] = "center";
            $Vcyg5xmwfpxo["background_attachment"] = "scroll";
            $Vcyg5xmwfpxo["background_color"] = "transparent";
            $Vcyg5xmwfpxo["background_image"] = "none";
            $Vcyg5xmwfpxo["background_image_resolution"] = "normal";
            $Vcyg5xmwfpxo["_dompdf_background_image_resolution"] = $Vcyg5xmwfpxo["background_image_resolution"];
            $Vcyg5xmwfpxo["background_position"] = "0% 0%";
            $Vcyg5xmwfpxo["background_repeat"] = "repeat";
            $Vcyg5xmwfpxo["background"] = "";
            $Vcyg5xmwfpxo["border_collapse"] = "separate";
            $Vcyg5xmwfpxo["border_color"] = "";
            $Vcyg5xmwfpxo["border_spacing"] = "0";
            $Vcyg5xmwfpxo["border_style"] = "";
            $Vcyg5xmwfpxo["border_top"] = "";
            $Vcyg5xmwfpxo["border_right"] = "";
            $Vcyg5xmwfpxo["border_bottom"] = "";
            $Vcyg5xmwfpxo["border_left"] = "";
            $Vcyg5xmwfpxo["border_top_color"] = "";
            $Vcyg5xmwfpxo["border_right_color"] = "";
            $Vcyg5xmwfpxo["border_bottom_color"] = "";
            $Vcyg5xmwfpxo["border_left_color"] = "";
            $Vcyg5xmwfpxo["border_top_style"] = "none";
            $Vcyg5xmwfpxo["border_right_style"] = "none";
            $Vcyg5xmwfpxo["border_bottom_style"] = "none";
            $Vcyg5xmwfpxo["border_left_style"] = "none";
            $Vcyg5xmwfpxo["border_top_width"] = "medium";
            $Vcyg5xmwfpxo["border_right_width"] = "medium";
            $Vcyg5xmwfpxo["border_bottom_width"] = "medium";
            $Vcyg5xmwfpxo["border_left_width"] = "medium";
            $Vcyg5xmwfpxo["border_width"] = "medium";
            $Vcyg5xmwfpxo["border_bottom_left_radius"] = "";
            $Vcyg5xmwfpxo["border_bottom_right_radius"] = "";
            $Vcyg5xmwfpxo["border_top_left_radius"] = "";
            $Vcyg5xmwfpxo["border_top_right_radius"] = "";
            $Vcyg5xmwfpxo["border_radius"] = "";
            $Vcyg5xmwfpxo["border"] = "";
            $Vcyg5xmwfpxo["bottom"] = "auto";
            $Vcyg5xmwfpxo["caption_side"] = "top";
            $Vcyg5xmwfpxo["clear"] = "none";
            $Vcyg5xmwfpxo["clip"] = "auto";
            $Vcyg5xmwfpxo["color"] = "#000000";
            $Vcyg5xmwfpxo["content"] = "normal";
            $Vcyg5xmwfpxo["counter_increment"] = "none";
            $Vcyg5xmwfpxo["counter_reset"] = "none";
            $Vcyg5xmwfpxo["cue_after"] = "none";
            $Vcyg5xmwfpxo["cue_before"] = "none";
            $Vcyg5xmwfpxo["cue"] = "";
            $Vcyg5xmwfpxo["cursor"] = "auto";
            $Vcyg5xmwfpxo["direction"] = "ltr";
            $Vcyg5xmwfpxo["display"] = "inline";
            $Vcyg5xmwfpxo["elevation"] = "level";
            $Vcyg5xmwfpxo["empty_cells"] = "show";
            $Vcyg5xmwfpxo["float"] = "none";
            $Vcyg5xmwfpxo["font_family"] = $V5fvtlalkarx->get_dompdf()->getOptions()->getDefaultFont();
            $Vcyg5xmwfpxo["font_size"] = "medium";
            $Vcyg5xmwfpxo["font_style"] = "normal";
            $Vcyg5xmwfpxo["font_variant"] = "normal";
            $Vcyg5xmwfpxo["font_weight"] = "normal";
            $Vcyg5xmwfpxo["font"] = "";
            $Vcyg5xmwfpxo["height"] = "auto";
            $Vcyg5xmwfpxo["image_resolution"] = "normal";
            $Vcyg5xmwfpxo["_dompdf_image_resolution"] = $Vcyg5xmwfpxo["image_resolution"];
            $Vcyg5xmwfpxo["_dompdf_keep"] = "";
            $Vcyg5xmwfpxo["left"] = "auto";
            $Vcyg5xmwfpxo["letter_spacing"] = "normal";
            $Vcyg5xmwfpxo["line_height"] = "normal";
            $Vcyg5xmwfpxo["list_style_image"] = "none";
            $Vcyg5xmwfpxo["list_style_position"] = "outside";
            $Vcyg5xmwfpxo["list_style_type"] = "disc";
            $Vcyg5xmwfpxo["list_style"] = "";
            $Vcyg5xmwfpxo["margin_right"] = "0";
            $Vcyg5xmwfpxo["margin_left"] = "0";
            $Vcyg5xmwfpxo["margin_top"] = "0";
            $Vcyg5xmwfpxo["margin_bottom"] = "0";
            $Vcyg5xmwfpxo["margin"] = "";
            $Vcyg5xmwfpxo["max_height"] = "none";
            $Vcyg5xmwfpxo["max_width"] = "none";
            $Vcyg5xmwfpxo["min_height"] = "0";
            $Vcyg5xmwfpxo["min_width"] = "0";
            $Vcyg5xmwfpxo["opacity"] = "1.0"; 
            $Vcyg5xmwfpxo["orphans"] = "2";
            $Vcyg5xmwfpxo["outline_color"] = ""; 
            $Vcyg5xmwfpxo["outline_style"] = "none";
            $Vcyg5xmwfpxo["outline_width"] = "medium";
            $Vcyg5xmwfpxo["outline"] = "";
            $Vcyg5xmwfpxo["overflow"] = "visible";
            $Vcyg5xmwfpxo["padding_top"] = "0";
            $Vcyg5xmwfpxo["padding_right"] = "0";
            $Vcyg5xmwfpxo["padding_bottom"] = "0";
            $Vcyg5xmwfpxo["padding_left"] = "0";
            $Vcyg5xmwfpxo["padding"] = "";
            $Vcyg5xmwfpxo["page_break_after"] = "auto";
            $Vcyg5xmwfpxo["page_break_before"] = "auto";
            $Vcyg5xmwfpxo["page_break_inside"] = "auto";
            $Vcyg5xmwfpxo["pause_after"] = "0";
            $Vcyg5xmwfpxo["pause_before"] = "0";
            $Vcyg5xmwfpxo["pause"] = "";
            $Vcyg5xmwfpxo["pitch_range"] = "50";
            $Vcyg5xmwfpxo["pitch"] = "medium";
            $Vcyg5xmwfpxo["play_during"] = "auto";
            $Vcyg5xmwfpxo["position"] = "static";
            $Vcyg5xmwfpxo["quotes"] = "";
            $Vcyg5xmwfpxo["richness"] = "50";
            $Vcyg5xmwfpxo["right"] = "auto";
            $Vcyg5xmwfpxo["size"] = "auto"; 
            $Vcyg5xmwfpxo["speak_header"] = "once";
            $Vcyg5xmwfpxo["speak_numeral"] = "continuous";
            $Vcyg5xmwfpxo["speak_punctuation"] = "none";
            $Vcyg5xmwfpxo["speak"] = "normal";
            $Vcyg5xmwfpxo["speech_rate"] = "medium";
            $Vcyg5xmwfpxo["stress"] = "50";
            $Vcyg5xmwfpxo["table_layout"] = "auto";
            $Vcyg5xmwfpxo["text_align"] = "left";
            $Vcyg5xmwfpxo["text_decoration"] = "none";
            $Vcyg5xmwfpxo["text_indent"] = "0";
            $Vcyg5xmwfpxo["text_transform"] = "none";
            $Vcyg5xmwfpxo["top"] = "auto";
            $Vcyg5xmwfpxo["transform"] = "none"; 
            $Vcyg5xmwfpxo["transform_origin"] = "50% 50%"; 
            $Vcyg5xmwfpxo["_webkit_transform"] = $Vcyg5xmwfpxo["transform"]; 
            $Vcyg5xmwfpxo["_webkit_transform_origin"] = $Vcyg5xmwfpxo["transform_origin"]; 
            $Vcyg5xmwfpxo["unicode_bidi"] = "normal";
            $Vcyg5xmwfpxo["vertical_align"] = "baseline";
            $Vcyg5xmwfpxo["visibility"] = "visible";
            $Vcyg5xmwfpxo["voice_family"] = "";
            $Vcyg5xmwfpxo["volume"] = "medium";
            $Vcyg5xmwfpxo["white_space"] = "normal";
            $Vcyg5xmwfpxo["word_wrap"] = "normal";
            $Vcyg5xmwfpxo["widows"] = "2";
            $Vcyg5xmwfpxo["width"] = "auto";
            $Vcyg5xmwfpxo["word_spacing"] = "normal";
            $Vcyg5xmwfpxo["z_index"] = "auto";

            
            $Vcyg5xmwfpxo["src"] = "";
            $Vcyg5xmwfpxo["unicode_range"] = "";

            
            self::$V01d001lnt0o = array(
                "azimuth",
                "background_image_resolution",
                "border_collapse",
                "border_spacing",
                "caption_side",
                "color",
                "cursor",
                "direction",
                "elevation",
                "empty_cells",
                "font_family",
                "font_size",
                "font_style",
                "font_variant",
                "font_weight",
                "font",
                "image_resolution",
                "letter_spacing",
                "line_height",
                "list_style_image",
                "list_style_position",
                "list_style_type",
                "list_style",
                "orphans",
                "page_break_inside",
                "pitch_range",
                "pitch",
                "quotes",
                "richness",
                "speak_header",
                "speak_numeral",
                "speak_punctuation",
                "speak",
                "speech_rate",
                "stress",
                "text_align",
                "text_indent",
                "text_transform",
                "visibility",
                "voice_family",
                "volume",
                "white_space",
                "word_wrap",
                "widows",
                "word_spacing",
            );
        }
    }

    
    function dispose()
    {
    }

    
    function set_media_queries($V0vifsuncaba)
    {
        $Vcki4t4qmybshis->_media_queries = $V0vifsuncaba;
    }

    
    function get_media_queries()
    {
        return $Vcki4t4qmybshis->_media_queries;
    }

    
    function set_frame(Frame $Vnk2ly5jcvjf)
    {
        $Vcki4t4qmybshis->_frame = $Vnk2ly5jcvjf;
    }

    
    function get_frame()
    {
        return $Vcki4t4qmybshis->_frame;
    }

    
    function set_origin($Vineliqwe2ne)
    {
        $Vcki4t4qmybshis->_origin = $Vineliqwe2ne;
    }

    
    function get_origin()
    {
        return $Vcki4t4qmybshis->_origin;
    }

    
    function get_stylesheet()
    {
        return $Vcki4t4qmybshis->_stylesheet;
    }

    
    function length_in_pt($Vjxpogd0afis, $Vxbpazqv01ao = null)
    {
        static $V1ph4ewhj5yc = array();

        if (!isset($Vxbpazqv01ao)) {
            $Vxbpazqv01ao = self::$V0pkeukzj3tv;
        }

        if (!is_array($Vjxpogd0afis)) {
            $Vqwhzgethmgj = $Vjxpogd0afis . "/$Vxbpazqv01ao";
            
            if (isset($V1ph4ewhj5yc[$Vqwhzgethmgj])) {
                return $V1ph4ewhj5yc[$Vqwhzgethmgj];
            }
            $Vjxpogd0afis = array($Vjxpogd0afis);
        } else {
            $Vqwhzgethmgj = implode("@", $Vjxpogd0afis) . "/$Vxbpazqv01ao";
            if (isset($V1ph4ewhj5yc[$Vqwhzgethmgj])) {
                return $V1ph4ewhj5yc[$Vqwhzgethmgj];
            }
        }

        $Vc00k54nbbvf = 0;
        foreach ($Vjxpogd0afis as $V3nb02w01gr5) {

            if ($V3nb02w01gr5 === "auto") {
                return "auto";
            }

            if ($V3nb02w01gr5 === "none") {
                return "none";
            }

            
            if (is_numeric($V3nb02w01gr5)) {
                $Vc00k54nbbvf += $V3nb02w01gr5;
                continue;
            }

            if ($V3nb02w01gr5 === "normal") {
                $Vc00k54nbbvf += (float)$Vxbpazqv01ao;
                continue;
            }

            
            if ($V3nb02w01gr5 === "thin") {
                $Vc00k54nbbvf += 0.5;
                continue;
            }

            if ($V3nb02w01gr5 === "medium") {
                $Vc00k54nbbvf += 1.5;
                continue;
            }

            if ($V3nb02w01gr5 === "thick") {
                $Vc00k54nbbvf += 2.5;
                continue;
            }

            if (($V3xsptcgzss2 = mb_strpos($V3nb02w01gr5, "px")) !== false) {
                $Vcyg5xmwfpxopi = $Vcki4t4qmybshis->_stylesheet->get_dompdf()->getOptions()->getDpi();
                $Vc00k54nbbvf += ((float)mb_substr($V3nb02w01gr5, 0, $V3xsptcgzss2) * 72) / $Vcyg5xmwfpxopi;
                continue;
            }

            if (($V3xsptcgzss2 = mb_strpos($V3nb02w01gr5, "pt")) !== false) {
                $Vc00k54nbbvf += (float)mb_substr($V3nb02w01gr5, 0, $V3xsptcgzss2);
                continue;
            }

            if (($V3xsptcgzss2 = mb_strpos($V3nb02w01gr5, "%")) !== false) {
                $Vc00k54nbbvf += (float)mb_substr($V3nb02w01gr5, 0, $V3xsptcgzss2) / 100 * (float)$Vxbpazqv01ao;
                continue;
            }

            if (($V3xsptcgzss2 = mb_strpos($V3nb02w01gr5, "rem")) !== false) {
                if ($Vcki4t4qmybshis->_stylesheet->get_dompdf()->getTree()->get_root()->get_style() === null) {
                    
                    $Vc00k54nbbvf += (float)mb_substr($V3nb02w01gr5, 0, $V3xsptcgzss2) * $Vcki4t4qmybshis->__get("font_size");
                } else {
                    $Vc00k54nbbvf += (float)mb_substr($V3nb02w01gr5, 0, $V3xsptcgzss2) * $Vcki4t4qmybshis->_stylesheet->get_dompdf()->getTree()->get_root()->get_style()->font_size;
                }
                continue;
            }

            if (($V3xsptcgzss2 = mb_strpos($V3nb02w01gr5, "em")) !== false) {
                $Vc00k54nbbvf += (float)mb_substr($V3nb02w01gr5, 0, $V3xsptcgzss2) * $Vcki4t4qmybshis->__get("font_size");
                continue;
            }

            if (($V3xsptcgzss2 = mb_strpos($V3nb02w01gr5, "cm")) !== false) {
                $Vc00k54nbbvf += (float)mb_substr($V3nb02w01gr5, 0, $V3xsptcgzss2) * 72 / 2.54;
                continue;
            }

            if (($V3xsptcgzss2 = mb_strpos($V3nb02w01gr5, "mm")) !== false) {
                $Vc00k54nbbvf += (float)mb_substr($V3nb02w01gr5, 0, $V3xsptcgzss2) * 72 / 25.4;
                continue;
            }

            
            if (($V3xsptcgzss2 = mb_strpos($V3nb02w01gr5, "ex")) !== false) {
                $Vc00k54nbbvf += (float)mb_substr($V3nb02w01gr5, 0, $V3xsptcgzss2) * $Vcki4t4qmybshis->__get("font_size") / 2;
                continue;
            }

            if (($V3xsptcgzss2 = mb_strpos($V3nb02w01gr5, "in")) !== false) {
                $Vc00k54nbbvf += (float)mb_substr($V3nb02w01gr5, 0, $V3xsptcgzss2) * 72;
                continue;
            }

            if (($V3xsptcgzss2 = mb_strpos($V3nb02w01gr5, "pc")) !== false) {
                $Vc00k54nbbvf += (float)mb_substr($V3nb02w01gr5, 0, $V3xsptcgzss2) * 12;
                continue;
            }

            
            $Vc00k54nbbvf += (float)$Vxbpazqv01ao;
        }

        return $V1ph4ewhj5yc[$Vqwhzgethmgj] = $Vc00k54nbbvf;
    }


    
    function inherit(Style $Vycghhqowrim)
    {

        
        $Vcki4t4qmybshis->_parent_font_size = $Vycghhqowrim->get_font_size();

        foreach (self::$V01d001lnt0o as $V3ztho1nxwdy) {
            
            
            if (isset($Vycghhqowrim->_props[$V3ztho1nxwdy]) &&
                (!isset($Vcki4t4qmybshis->_props[$V3ztho1nxwdy]) ||
                    (isset($Vycghhqowrim->_important_props[$V3ztho1nxwdy]) && !isset($Vcki4t4qmybshis->_important_props[$V3ztho1nxwdy]))
                )
            ) {
                if (isset($Vycghhqowrim->_important_props[$V3ztho1nxwdy])) {
                    $Vcki4t4qmybshis->_important_props[$V3ztho1nxwdy] = true;
                }
                
                $Vcki4t4qmybshis->_prop_cache[$V3ztho1nxwdy] = null;
                $Vcki4t4qmybshis->_props[$V3ztho1nxwdy] = $Vycghhqowrim->_props[$V3ztho1nxwdy];
            }
        }

        foreach ($Vcki4t4qmybshis->_props as $V3ztho1nxwdy => $Vqfra35f14fv) {
            if ($Vqfra35f14fv === "inherit") {
                if (isset($Vycghhqowrim->_important_props[$V3ztho1nxwdy])) {
                    $Vcki4t4qmybshis->_important_props[$V3ztho1nxwdy] = true;
                }
                
                
                
                
                
                
                
                
                
                
                
                $Vcki4t4qmybshis->__set($V3ztho1nxwdy, $Vycghhqowrim->__get($V3ztho1nxwdy));
            }
        }

        return $Vcki4t4qmybshis;
    }

    
    function merge(Style $Vdidzwb0w3vc)
    {
        $Vzwlmrelseuh = array("background", "border", "border_bottom", "border_color", "border_left", "border_radius", "border_right", "border_style", "border_top", "border_width", "flex", "font", "list_style", "margin", "padding", "transform");
        
        
        
        foreach ($Vdidzwb0w3vc->_props as $V3ztho1nxwdy => $Vzyqcsfbm3q4) {
            $V4egyxwz0cll = false;
            if (isset($Vdidzwb0w3vc->_important_props[$V3ztho1nxwdy])) {
                $Vcki4t4qmybshis->_important_props[$V3ztho1nxwdy] = true;
                $V4egyxwz0cll = true;
            } else if (!isset($Vcki4t4qmybshis->_important_props[$V3ztho1nxwdy])) {
                $V4egyxwz0cll = true;
            }

            if ($V4egyxwz0cll) {
                
                $Vcki4t4qmybshis->_prop_cache[$V3ztho1nxwdy] = null;
                $Vcki4t4qmybshis->_props[$V3ztho1nxwdy] = $Vzyqcsfbm3q4;

                
                $Vzbzwpwarypn = array_filter($Vzwlmrelseuh, function($Vklvnn4ydnaz) use ($V3ztho1nxwdy) {
                    return ( strpos($V3ztho1nxwdy, $Vklvnn4ydnaz."_") !== false );
                });
                foreach ($Vzbzwpwarypn as $Vdjg1mi2xgi2) {
                    if (array_key_exists($Vdjg1mi2xgi2, $Vcki4t4qmybshis->_props) && $Vcki4t4qmybshis->_props[$Vdjg1mi2xgi2] === "inherit") {
                        unset($Vcki4t4qmybshis->_props[$Vdjg1mi2xgi2]);
                    }
                }
            }
        }

        if (isset($Vdidzwb0w3vc->_props["font_size"])) {
            $Vcki4t4qmybshis->__font_size_calculated = false;
        }
    }

    
    function munge_color($Vexxkxtdr01j)
    {
        return Color::parse($Vexxkxtdr01j);
    }

    
    function important_set($V3ztho1nxwdy)
    {
        $V3ztho1nxwdy = str_replace("-", "_", $V3ztho1nxwdy);
        $Vcki4t4qmybshis->_important_props[$V3ztho1nxwdy] = true;
    }

    
    function important_get($V3ztho1nxwdy)
    {
        return isset($Vcki4t4qmybshis->_important_props[$V3ztho1nxwdy]);
    }

    
    function __set($V3ztho1nxwdy, $Vzyqcsfbm3q4)
    {
        $V3ztho1nxwdy = str_replace("-", "_", $V3ztho1nxwdy);
        $Vcki4t4qmybshis->_prop_cache[$V3ztho1nxwdy] = null;

        if (!isset(self::$Vg2bme5jlm5x[$V3ztho1nxwdy])) {
            global $Vzm5jqiedkr4;
            $Vzm5jqiedkr4[] = "'$V3ztho1nxwdy' is not a valid CSS2 property.";
            return;
        }

        if ($V3ztho1nxwdy !== "content" && is_string($Vzyqcsfbm3q4) && strlen($Vzyqcsfbm3q4) > 5 && mb_strpos($Vzyqcsfbm3q4, "url") === false) {
            $Vzyqcsfbm3q4 = mb_strtolower(trim(str_replace(array("\n", "\t"), array(" "), $Vzyqcsfbm3q4)));
            $Vzyqcsfbm3q4 = preg_replace("/([0-9]+) (pt|px|pc|em|ex|in|cm|mm|%)/S", "\\1\\2", $Vzyqcsfbm3q4);
        }

        $V1svcpcbr4nm = "set_$V3ztho1nxwdy";

        if (!isset(self::$Vr0sfrk1yr4a[$V1svcpcbr4nm])) {
            self::$Vr0sfrk1yr4a[$V1svcpcbr4nm] = method_exists($Vcki4t4qmybshis, $V1svcpcbr4nm);
        }

        if (self::$Vr0sfrk1yr4a[$V1svcpcbr4nm]) {
            $Vcki4t4qmybshis->$V1svcpcbr4nm($Vzyqcsfbm3q4);
        } else {
            $Vcki4t4qmybshis->_props[$V3ztho1nxwdy] = $Vzyqcsfbm3q4;
        }
    }

    
    function __get($V3ztho1nxwdy)
    {
        if (!isset(self::$Vg2bme5jlm5x[$V3ztho1nxwdy])) {
            throw new Exception("'$V3ztho1nxwdy' is not a valid CSS2 property.");
        }

        if (isset($Vcki4t4qmybshis->_prop_cache[$V3ztho1nxwdy]) && $Vcki4t4qmybshis->_prop_cache[$V3ztho1nxwdy] != null) {
            return $Vcki4t4qmybshis->_prop_cache[$V3ztho1nxwdy];
        }

        $V1svcpcbr4nm = "get_$V3ztho1nxwdy";

        
        if (!isset($Vcki4t4qmybshis->_props[$V3ztho1nxwdy])) {
            $Vcki4t4qmybshis->_props[$V3ztho1nxwdy] = self::$Vg2bme5jlm5x[$V3ztho1nxwdy];
        }

        if (!isset(self::$Vr0sfrk1yr4a[$V1svcpcbr4nm])) {
            self::$Vr0sfrk1yr4a[$V1svcpcbr4nm] = method_exists($Vcki4t4qmybshis, $V1svcpcbr4nm);
        }

        if (self::$Vr0sfrk1yr4a[$V1svcpcbr4nm]) {
            return $Vcki4t4qmybshis->_prop_cache[$V3ztho1nxwdy] = $Vcki4t4qmybshis->$V1svcpcbr4nm();
        }

        return $Vcki4t4qmybshis->_prop_cache[$V3ztho1nxwdy] = $Vcki4t4qmybshis->_props[$V3ztho1nxwdy];
    }

    
    function get_prop($V3ztho1nxwdy)
    {
        if (!isset(self::$Vg2bme5jlm5x[$V3ztho1nxwdy])) {
            throw new Exception("'$V3ztho1nxwdy' is not a valid CSS2 property.");
        }

        $V1svcpcbr4nm = "get_$V3ztho1nxwdy";

        
        if (!isset($Vcki4t4qmybshis->_props[$V3ztho1nxwdy])) {
            return self::$Vg2bme5jlm5x[$V3ztho1nxwdy];
        }

        if (method_exists($Vcki4t4qmybshis, $V1svcpcbr4nm)) {
            return $Vcki4t4qmybshis->$V1svcpcbr4nm();
        }

        return $Vcki4t4qmybshis->_props[$V3ztho1nxwdy];
    }

    
    function computed_bottom_spacing() {
        if ($Vcki4t4qmybshis->_computed_bottom_spacing !== null) {
            return $Vcki4t4qmybshis->_computed_bottom_spacing;
        }
        return $Vcki4t4qmybshis->_computed_bottom_spacing = $Vcki4t4qmybshis->length_in_pt(
            array(
                $Vcki4t4qmybshis->margin_bottom,
                $Vcki4t4qmybshis->padding_bottom,
                $Vcki4t4qmybshis->border_bottom_width
            )
        );
    }

    
    function get_font_family_raw()
    {
        return trim($Vcki4t4qmybshis->_props["font_family"], " \t\n\r\x0B\"'");
    }

    
    function get_font_family()
    {
        if (isset($Vcki4t4qmybshis->_font_family)) {
            return $Vcki4t4qmybshis->_font_family;
        }

        $Vi3tzeasy1pp = $Vcki4t4qmybshis->_stylesheet->get_dompdf()->getOptions()->getDebugCss();

        
        

        
        $Vpapt1ooifql = $Vcki4t4qmybshis->__get("font_weight");

        if (is_numeric($Vpapt1ooifql)) {
            if ($Vpapt1ooifql < 600) {
                $Vpapt1ooifql = "normal";
            } else {
                $Vpapt1ooifql = "bold";
            }
        } else if ($Vpapt1ooifql === "bold" || $Vpapt1ooifql === "bolder") {
            $Vpapt1ooifql = "bold";
        } else {
            $Vpapt1ooifql = "normal";
        }

        
        $Vm0tqflv4ydt = $Vcki4t4qmybshis->__get("font_style");

        if ($Vpapt1ooifql === "bold" && ($Vm0tqflv4ydt === "italic" || $Vm0tqflv4ydt === "oblique")) {
            $Vt33g5i2zccw = "bold_italic";
        } else if ($Vpapt1ooifql === "bold" && $Vm0tqflv4ydt !== "italic" && $Vm0tqflv4ydt !== "oblique") {
            $Vt33g5i2zccw = "bold";
        } else if ($Vpapt1ooifql !== "bold" && ($Vm0tqflv4ydt === "italic" || $Vm0tqflv4ydt === "oblique")) {
            $Vt33g5i2zccw = "italic";
        } else {
            $Vt33g5i2zccw = "normal";
        }

        
        if ($Vi3tzeasy1pp) {
            print "<pre>[get_font_family:";
            print '(' . $Vcki4t4qmybshis->_props["font_family"] . '.' . $Vm0tqflv4ydt . '.' . $Vcki4t4qmybshis->__get("font_weight") . '.' . $Vpapt1ooifql . '.' . $Vt33g5i2zccw . ')';
        }

        $Vk31cmghwxrd = preg_split("/\s*,\s*/", $Vcki4t4qmybshis->_props["font_family"]);

        $V3h4z3hxorxj = null;
        foreach ($Vk31cmghwxrd as $Vu3vfak1w4uv) {
            
            
            $Vu3vfak1w4uv = trim($Vu3vfak1w4uv, " \t\n\r\x0B\"'");
            if ($Vi3tzeasy1pp) {
                print '(' . $Vu3vfak1w4uv . ')';
            }
            $V3h4z3hxorxj = $Vcki4t4qmybshis->getFontMetrics()->getFont($Vu3vfak1w4uv, $Vt33g5i2zccw);

            if ($V3h4z3hxorxj) {
                if ($Vi3tzeasy1pp) {
                    print '(' . $V3h4z3hxorxj . ")get_font_family]\n</pre>";
                }
                return $Vcki4t4qmybshis->_font_family = $V3h4z3hxorxj;
            }
        }

        $Vu3vfak1w4uv = null;
        if ($Vi3tzeasy1pp) {
            print '(default)';
        }
        $V3h4z3hxorxj = $Vcki4t4qmybshis->getFontMetrics()->getFont($Vu3vfak1w4uv, $Vt33g5i2zccw);

        if ($V3h4z3hxorxj) {
            if ($Vi3tzeasy1pp) {
                print '(' . $V3h4z3hxorxj . ")get_font_family]\n</pre>";
            }
            return $Vcki4t4qmybshis->_font_family = $V3h4z3hxorxj;
        }

        throw new Exception("Unable to find a suitable font replacement for: '" . $Vcki4t4qmybshis->_props["font_family"] . "'");

    }

    
    function get_font_size()
    {

        if ($Vcki4t4qmybshis->__font_size_calculated) {
            return $Vcki4t4qmybshis->_props["font_size"];
        }

        if (!isset($Vcki4t4qmybshis->_props["font_size"])) {
            $Vj2dp31yq2k0 = self::$Vg2bme5jlm5x["font_size"];
        } else {
            $Vj2dp31yq2k0 = $Vcki4t4qmybshis->_props["font_size"];
        }

        if (!isset($Vcki4t4qmybshis->_parent_font_size)) {
            $Vcki4t4qmybshis->_parent_font_size = self::$V0pkeukzj3tv;
        }

        switch ((string)$Vj2dp31yq2k0) {
            case "xx-small":
            case "x-small":
            case "small":
            case "medium":
            case "large":
            case "x-large":
            case "xx-large":
                $Vj2dp31yq2k0 = self::$V0pkeukzj3tv * self::$Vjpaaekslmk0[$Vj2dp31yq2k0];
                break;

            case "smaller":
                $Vj2dp31yq2k0 = 8 / 9 * $Vcki4t4qmybshis->_parent_font_size;
                break;

            case "larger":
                $Vj2dp31yq2k0 = 6 / 5 * $Vcki4t4qmybshis->_parent_font_size;
                break;

            default:
                break;
        }

        
        if (($V3xsptcgzss2 = mb_strpos($Vj2dp31yq2k0, "em")) !== false) {
            $Vj2dp31yq2k0 = (float)mb_substr($Vj2dp31yq2k0, 0, $V3xsptcgzss2) * $Vcki4t4qmybshis->_parent_font_size;
        } else if (($V3xsptcgzss2 = mb_strpos($Vj2dp31yq2k0, "ex")) !== false) {
            $Vj2dp31yq2k0 = (float)mb_substr($Vj2dp31yq2k0, 0, $V3xsptcgzss2) * $Vcki4t4qmybshis->_parent_font_size;
        } else {
            $Vj2dp31yq2k0 = (float)$Vcki4t4qmybshis->length_in_pt($Vj2dp31yq2k0);
        }

        
        $Vcki4t4qmybshis->_prop_cache["font_size"] = null;
        $Vcki4t4qmybshis->_props["font_size"] = $Vj2dp31yq2k0;
        $Vcki4t4qmybshis->__font_size_calculated = true;
        return $Vcki4t4qmybshis->_props["font_size"];

    }

    
    function get_word_spacing()
    {
        if ($Vcki4t4qmybshis->_props["word_spacing"] === "normal") {
            return 0;
        }

        return $Vcki4t4qmybshis->_props["word_spacing"];
    }

    
    function get_letter_spacing()
    {
        if ($Vcki4t4qmybshis->_props["letter_spacing"] === "normal") {
            return 0;
        }

        return $Vcki4t4qmybshis->_props["letter_spacing"];
    }

    
    function get_line_height()
    {
        if (array_key_exists("line_height", $Vcki4t4qmybshis->_props) === false) {
            $Vcki4t4qmybshis->_props["line_height"] = self::$Vg2bme5jlm5x["line_height"];
        }
        $V3nb02w01gr5ine_height = $Vcki4t4qmybshis->_props["line_height"];

        if ($V3nb02w01gr5ine_height === "normal") {
            return self::$Vqpbory0b2vd * $Vcki4t4qmybshis->get_font_size();
        }

        if (is_numeric($V3nb02w01gr5ine_height)) {
            return $Vcki4t4qmybshis->length_in_pt($V3nb02w01gr5ine_height . "em", $Vcki4t4qmybshis->get_font_size());
        }

        return $Vcki4t4qmybshis->length_in_pt($V3nb02w01gr5ine_height, $Vcki4t4qmybshis->_parent_font_size);
    }

    
    function get_color()
    {
        return $Vcki4t4qmybshis->munge_color($Vcki4t4qmybshis->_props["color"]);
    }

    
    function get_background_color()
    {
        return $Vcki4t4qmybshis->munge_color($Vcki4t4qmybshis->_props["background_color"]);
    }

    
    function get_background_position()
    {
        $Vynpm04a4fx0 = explode(" ", $Vcki4t4qmybshis->_props["background_position"]);

        switch ($Vynpm04a4fx0[0]) {
            case "left":
                $Vs4gloy23a1d = "0%";
                break;

            case "right":
                $Vs4gloy23a1d = "100%";
                break;

            case "top":
                $Vopgub02o3q2 = "0%";
                break;

            case "bottom":
                $Vopgub02o3q2 = "100%";
                break;

            case "center":
                $Vs4gloy23a1d = "50%";
                $Vopgub02o3q2 = "50%";
                break;

            default:
                $Vs4gloy23a1d = $Vynpm04a4fx0[0];
                break;
        }

        if (isset($Vynpm04a4fx0[1])) {
            switch ($Vynpm04a4fx0[1]) {
                case "left":
                    $Vs4gloy23a1d = "0%";
                    break;

                case "right":
                    $Vs4gloy23a1d = "100%";
                    break;

                case "top":
                    $Vopgub02o3q2 = "0%";
                    break;

                case "bottom":
                    $Vopgub02o3q2 = "100%";
                    break;

                case "center":
                    if ($Vynpm04a4fx0[0] === "left" || $Vynpm04a4fx0[0] === "right" || $Vynpm04a4fx0[0] === "center") {
                        $Vopgub02o3q2 = "50%";
                    } else {
                        $Vs4gloy23a1d = "50%";
                    }
                    break;

                default:
                    $Vopgub02o3q2 = $Vynpm04a4fx0[1];
                    break;
            }
        } else {
            $Vopgub02o3q2 = "50%";
        }

        if (!isset($Vs4gloy23a1d)) {
            $Vs4gloy23a1d = "0%";
        }

        if (!isset($Vopgub02o3q2)) {
            $Vopgub02o3q2 = "0%";
        }

        return array(
            0 => $Vs4gloy23a1d, "x" => $Vs4gloy23a1d,
            1 => $Vopgub02o3q2, "y" => $Vopgub02o3q2,
        );
    }


    
    function get_background_attachment()
    {
        return $Vcki4t4qmybshis->_props["background_attachment"];
    }


    
    function get_background_repeat()
    {
        return $Vcki4t4qmybshis->_props["background_repeat"];
    }


    
    function get_background()
    {
        return $Vcki4t4qmybshis->_props["background"];
    }


    
    function get_border_top_color()
    {
        if ($Vcki4t4qmybshis->_props["border_top_color"] === "") {
            
            $Vcki4t4qmybshis->_prop_cache["border_top_color"] = null;
            $Vcki4t4qmybshis->_props["border_top_color"] = $Vcki4t4qmybshis->__get("color");
        }

        return $Vcki4t4qmybshis->munge_color($Vcki4t4qmybshis->_props["border_top_color"]);
    }

    
    function get_border_right_color()
    {
        if ($Vcki4t4qmybshis->_props["border_right_color"] === "") {
            
            $Vcki4t4qmybshis->_prop_cache["border_right_color"] = null;
            $Vcki4t4qmybshis->_props["border_right_color"] = $Vcki4t4qmybshis->__get("color");
        }

        return $Vcki4t4qmybshis->munge_color($Vcki4t4qmybshis->_props["border_right_color"]);
    }

    
    function get_border_bottom_color()
    {
        if ($Vcki4t4qmybshis->_props["border_bottom_color"] === "") {
            
            $Vcki4t4qmybshis->_prop_cache["border_bottom_color"] = null;
            $Vcki4t4qmybshis->_props["border_bottom_color"] = $Vcki4t4qmybshis->__get("color");
        }

        return $Vcki4t4qmybshis->munge_color($Vcki4t4qmybshis->_props["border_bottom_color"]);
    }

    
    function get_border_left_color()
    {
        if ($Vcki4t4qmybshis->_props["border_left_color"] === "") {
            
            $Vcki4t4qmybshis->_prop_cache["border_left_color"] = null;
            $Vcki4t4qmybshis->_props["border_left_color"] = $Vcki4t4qmybshis->__get("color");
        }

        return $Vcki4t4qmybshis->munge_color($Vcki4t4qmybshis->_props["border_left_color"]);
    }

    

    
    function get_border_top_width()
    {
        $Vdidzwb0w3vc = $Vcki4t4qmybshis->__get("border_top_style");
        return $Vdidzwb0w3vc !== "none" && $Vdidzwb0w3vc !== "hidden" ? $Vcki4t4qmybshis->length_in_pt($Vcki4t4qmybshis->_props["border_top_width"]) : 0;
    }

    
    function get_border_right_width()
    {
        $Vdidzwb0w3vc = $Vcki4t4qmybshis->__get("border_right_style");
        return $Vdidzwb0w3vc !== "none" && $Vdidzwb0w3vc !== "hidden" ? $Vcki4t4qmybshis->length_in_pt($Vcki4t4qmybshis->_props["border_right_width"]) : 0;
    }

    
    function get_border_bottom_width()
    {
        $Vdidzwb0w3vc = $Vcki4t4qmybshis->__get("border_bottom_style");
        return $Vdidzwb0w3vc !== "none" && $Vdidzwb0w3vc !== "hidden" ? $Vcki4t4qmybshis->length_in_pt($Vcki4t4qmybshis->_props["border_bottom_width"]) : 0;
    }

    
    function get_border_left_width()
    {
        $Vdidzwb0w3vc = $Vcki4t4qmybshis->__get("border_left_style");
        return $Vdidzwb0w3vc !== "none" && $Vdidzwb0w3vc !== "hidden" ? $Vcki4t4qmybshis->length_in_pt($Vcki4t4qmybshis->_props["border_left_width"]) : 0;
    }
    

    
    function get_border_properties()
    {
        return array(
            "top" => array(
                "width" => $Vcki4t4qmybshis->__get("border_top_width"),
                "style" => $Vcki4t4qmybshis->__get("border_top_style"),
                "color" => $Vcki4t4qmybshis->__get("border_top_color"),
            ),
            "bottom" => array(
                "width" => $Vcki4t4qmybshis->__get("border_bottom_width"),
                "style" => $Vcki4t4qmybshis->__get("border_bottom_style"),
                "color" => $Vcki4t4qmybshis->__get("border_bottom_color"),
            ),
            "right" => array(
                "width" => $Vcki4t4qmybshis->__get("border_right_width"),
                "style" => $Vcki4t4qmybshis->__get("border_right_style"),
                "color" => $Vcki4t4qmybshis->__get("border_right_color"),
            ),
            "left" => array(
                "width" => $Vcki4t4qmybshis->__get("border_left_width"),
                "style" => $Vcki4t4qmybshis->__get("border_left_style"),
                "color" => $Vcki4t4qmybshis->__get("border_left_color"),
            ),
        );
    }

    
    protected function _get_border($Voj5js1i2adw)
    {
        $Vexxkxtdr01j = $Vcki4t4qmybshis->__get("border_" . $Voj5js1i2adw . "_color");

        return $Vcki4t4qmybshis->__get("border_" . $Voj5js1i2adw . "_width") . " " .
        $Vcki4t4qmybshis->__get("border_" . $Voj5js1i2adw . "_style") . " " . $Vexxkxtdr01j["hex"];
    }

    
    function get_border_top()
    {
        return $Vcki4t4qmybshis->_get_border("top");
    }

    
    function get_border_right()
    {
        return $Vcki4t4qmybshis->_get_border("right");
    }

    
    function get_border_bottom()
    {
        return $Vcki4t4qmybshis->_get_border("bottom");
    }

    
    function get_border_left()
    {
        return $Vcki4t4qmybshis->_get_border("left");
    }

    
    function get_computed_border_radius($Vhoifq2kocyt, $Vjlmjalejjxa)
    {
        if (!empty($Vcki4t4qmybshis->_computed_border_radius)) {
            return $Vcki4t4qmybshis->_computed_border_radius;
        }

        $Vhoifq2kocyt = (float)$Vhoifq2kocyt;
        $Vjlmjalejjxa = (float)$Vjlmjalejjxa;
        $Vhsnbs0gwraw = (float)$Vcki4t4qmybshis->__get("border_top_left_radius");
        $Voxjadvbzbkb = (float)$Vcki4t4qmybshis->__get("border_top_right_radius");
        $Vlbh2hh1w1uq = (float)$Vcki4t4qmybshis->__get("border_bottom_left_radius");
        $Vpzh1agu5pge = (float)$Vcki4t4qmybshis->__get("border_bottom_right_radius");

        if ($Vhsnbs0gwraw + $Voxjadvbzbkb + $Vlbh2hh1w1uq + $Vpzh1agu5pge == 0) {
            return $Vcki4t4qmybshis->_computed_border_radius = array(
                0, 0, 0, 0,
                "top-left" => 0,
                "top-right" => 0,
                "bottom-right" => 0,
                "bottom-left" => 0,
            );
        }

        $Vcki4t4qmybs = (float)$Vcki4t4qmybshis->__get("border_top_width");
        $Vkabkv5ip0kg = (float)$Vcki4t4qmybshis->__get("border_right_width");
        $Vbz3vmbr1h2v = (float)$Vcki4t4qmybshis->__get("border_bottom_width");
        $V3nb02w01gr5 = (float)$Vcki4t4qmybshis->__get("border_left_width");

        $Vhsnbs0gwraw = min($Vhsnbs0gwraw, $Vjlmjalejjxa - $Vlbh2hh1w1uq - $Vcki4t4qmybs / 2 - $Vbz3vmbr1h2v / 2, $Vhoifq2kocyt - $Voxjadvbzbkb - $V3nb02w01gr5 / 2 - $Vkabkv5ip0kg / 2);
        $Voxjadvbzbkb = min($Voxjadvbzbkb, $Vjlmjalejjxa - $Vpzh1agu5pge - $Vcki4t4qmybs / 2 - $Vbz3vmbr1h2v / 2, $Vhoifq2kocyt - $Vhsnbs0gwraw - $V3nb02w01gr5 / 2 - $Vkabkv5ip0kg / 2);
        $Vlbh2hh1w1uq = min($Vlbh2hh1w1uq, $Vjlmjalejjxa - $Vhsnbs0gwraw - $Vcki4t4qmybs / 2 - $Vbz3vmbr1h2v / 2, $Vhoifq2kocyt - $Vpzh1agu5pge - $V3nb02w01gr5 / 2 - $Vkabkv5ip0kg / 2);
        $Vpzh1agu5pge = min($Vpzh1agu5pge, $Vjlmjalejjxa - $Voxjadvbzbkb - $Vcki4t4qmybs / 2 - $Vbz3vmbr1h2v / 2, $Vhoifq2kocyt - $Vlbh2hh1w1uq - $V3nb02w01gr5 / 2 - $Vkabkv5ip0kg / 2);

        return $Vcki4t4qmybshis->_computed_border_radius = array(
            $Vhsnbs0gwraw, $Voxjadvbzbkb, $Vpzh1agu5pge, $Vlbh2hh1w1uq,
            "top-left" => $Vhsnbs0gwraw,
            "top-right" => $Voxjadvbzbkb,
            "bottom-right" => $Vpzh1agu5pge,
            "bottom-left" => $Vlbh2hh1w1uq,
        );
    }

    
    function get_outline_color()
    {
        if ($Vcki4t4qmybshis->_props["outline_color"] === "") {
            
            $Vcki4t4qmybshis->_prop_cache["outline_color"] = null;
            $Vcki4t4qmybshis->_props["outline_color"] = $Vcki4t4qmybshis->__get("color");
        }

        return $Vcki4t4qmybshis->munge_color($Vcki4t4qmybshis->_props["outline_color"]);
    }

    
    function get_outline_width()
    {
        $Vdidzwb0w3vc = $Vcki4t4qmybshis->__get("outline_style");
        return $Vdidzwb0w3vc !== "none" && $Vdidzwb0w3vc !== "hidden" ? $Vcki4t4qmybshis->length_in_pt($Vcki4t4qmybshis->_props["outline_width"]) : 0;
    }

    
    function get_outline()
    {
        $Vexxkxtdr01j = $Vcki4t4qmybshis->__get("outline_color");
        return
            $Vcki4t4qmybshis->__get("outline_width") . " " .
            $Vcki4t4qmybshis->__get("outline_style") . " " .
            $Vexxkxtdr01j["hex"];
    }
    

    
    function get_border_spacing()
    {
        $Vnr1h2vcbxvj = explode(" ", $Vcki4t4qmybshis->_props["border_spacing"]);
        if (count($Vnr1h2vcbxvj) == 1) {
            $Vnr1h2vcbxvj[1] = $Vnr1h2vcbxvj[0];
        }
        return $Vnr1h2vcbxvj;
    }

    

    

    
    protected function _set_style_side_type($Vdidzwb0w3vc, $Voj5js1i2adw, $Vcki4t4qmybsype, $Vzyqcsfbm3q4, $V3xsptcgzss2mportant)
    {
        $V3ztho1nxwdy = $Vdidzwb0w3vc . '_' . $Voj5js1i2adw . $Vcki4t4qmybsype;

        if (!isset($Vcki4t4qmybshis->_important_props[$V3ztho1nxwdy]) || $V3xsptcgzss2mportant) {
            if ($Voj5js1i2adw === "bottom") {
                $Vcki4t4qmybshis->_computed_bottom_spacing = null; 
            }
            
            $Vcki4t4qmybshis->_prop_cache[$V3ztho1nxwdy] = null;
            if ($V3xsptcgzss2mportant) {
                $Vcki4t4qmybshis->_important_props[$V3ztho1nxwdy] = true;
            }
            $Vcki4t4qmybshis->_props[$V3ztho1nxwdy] = $Vzyqcsfbm3q4;
        }
    }

    
    protected function _set_style_sides_type($Vdidzwb0w3vc, $Vcki4t4qmybsop, $Vkabkv5ip0kgight, $Vbz3vmbr1h2vottom, $V3nb02w01gr5eft, $Vcki4t4qmybsype, $V3xsptcgzss2mportant)
    {
        $Vcki4t4qmybshis->_set_style_side_type($Vdidzwb0w3vc, 'top', $Vcki4t4qmybsype, $Vcki4t4qmybsop, $V3xsptcgzss2mportant);
        $Vcki4t4qmybshis->_set_style_side_type($Vdidzwb0w3vc, 'right', $Vcki4t4qmybsype, $Vkabkv5ip0kgight, $V3xsptcgzss2mportant);
        $Vcki4t4qmybshis->_set_style_side_type($Vdidzwb0w3vc, 'bottom', $Vcki4t4qmybsype, $Vbz3vmbr1h2vottom, $V3xsptcgzss2mportant);
        $Vcki4t4qmybshis->_set_style_side_type($Vdidzwb0w3vc, 'left', $Vcki4t4qmybsype, $V3nb02w01gr5eft, $V3xsptcgzss2mportant);
    }

    
    protected function _set_style_type($Vdidzwb0w3vc, $Vcki4t4qmybsype, $Vzyqcsfbm3q4, $V3xsptcgzss2mportant)
    {
        $Vzyqcsfbm3q4 = preg_replace("/\s*\,\s*/", ",", $Vzyqcsfbm3q4); 
        $Vnr1h2vcbxvj = explode(" ", $Vzyqcsfbm3q4);

        switch (count($Vnr1h2vcbxvj)) {
            case 1:
                $Vcki4t4qmybshis->_set_style_sides_type($Vdidzwb0w3vc, $Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[0], $Vcki4t4qmybsype, $V3xsptcgzss2mportant);
                break;
            case 2:
                $Vcki4t4qmybshis->_set_style_sides_type($Vdidzwb0w3vc, $Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[1], $Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[1], $Vcki4t4qmybsype, $V3xsptcgzss2mportant);
                break;
            case 3:
                $Vcki4t4qmybshis->_set_style_sides_type($Vdidzwb0w3vc, $Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[1], $Vnr1h2vcbxvj[2], $Vnr1h2vcbxvj[1], $Vcki4t4qmybsype, $V3xsptcgzss2mportant);
                break;
            case 4:
                $Vcki4t4qmybshis->_set_style_sides_type($Vdidzwb0w3vc, $Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[1], $Vnr1h2vcbxvj[2], $Vnr1h2vcbxvj[3], $Vcki4t4qmybsype, $V3xsptcgzss2mportant);
                break;
        }

        
        $Vcki4t4qmybshis->_prop_cache[$Vdidzwb0w3vc . $Vcki4t4qmybsype] = null;
        $Vcki4t4qmybshis->_props[$Vdidzwb0w3vc . $Vcki4t4qmybsype] = $Vzyqcsfbm3q4;
    }

    
    protected function _set_style_type_important($Vdidzwb0w3vc, $Vcki4t4qmybsype, $Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_type($Vdidzwb0w3vc, $Vcki4t4qmybsype, $Vzyqcsfbm3q4, isset($Vcki4t4qmybshis->_important_props[$Vdidzwb0w3vc . $Vcki4t4qmybsype]));
    }

    
    protected function _set_style_side_width_important($Vdidzwb0w3vc, $Voj5js1i2adw, $Vzyqcsfbm3q4)
    {
        if ($Voj5js1i2adw === "bottom") {
            $Vcki4t4qmybshis->_computed_bottom_spacing = null; 
        }
        
        $Vcki4t4qmybshis->_prop_cache[$Vdidzwb0w3vc . '_' . $Voj5js1i2adw] = null;
        $Vcki4t4qmybshis->_props[$Vdidzwb0w3vc . '_' . $Voj5js1i2adw] = str_replace("none", "0px", $Vzyqcsfbm3q4);
    }

    
    protected function _set_style($Vdidzwb0w3vc, $Vzyqcsfbm3q4, $V3xsptcgzss2mportant)
    {
        if (!isset($Vcki4t4qmybshis->_important_props[$Vdidzwb0w3vc]) || $V3xsptcgzss2mportant) {
            if ($V3xsptcgzss2mportant) {
                $Vcki4t4qmybshis->_important_props[$Vdidzwb0w3vc] = true;
            }
            
            $Vcki4t4qmybshis->_prop_cache[$Vdidzwb0w3vc] = null;
            $Vcki4t4qmybshis->_props[$Vdidzwb0w3vc] = $Vzyqcsfbm3q4;
        }
    }

    
    protected function _image($Vzyqcsfbm3q4)
    {
        $Vi3tzeasy1pp = $Vcki4t4qmybshis->_stylesheet->get_dompdf()->getOptions()->getDebugCss();
        $Vvqnovizplzf = "none";

        if (mb_strpos($Vzyqcsfbm3q4, "url") === false) {
            $Vio2vixcckdr = "none"; 
        } else {
            $Vzyqcsfbm3q4 = preg_replace("/url\(\s*['\"]?([^'\")]+)['\"]?\s*\)/", "\\1", trim($Vzyqcsfbm3q4));

            
            $Vvqnovizplzf = Helpers::explode_url($Vzyqcsfbm3q4);
            if ($Vvqnovizplzf["protocol"] == "" && $Vcki4t4qmybshis->_stylesheet->get_protocol() == "") {
                if ($Vvqnovizplzf["path"][0] === '/' || $Vvqnovizplzf["path"][0] === '\\') {
                    $Vio2vixcckdr = $_SERVER["DOCUMENT_ROOT"] . '/';
                } else {
                    $Vio2vixcckdr = $Vcki4t4qmybshis->_stylesheet->get_base_path();
                }

                $Vio2vixcckdr .= $Vvqnovizplzf["path"] . $Vvqnovizplzf["file"];
                $Vio2vixcckdr = realpath($Vio2vixcckdr);
                
                if (!$Vio2vixcckdr) {
                    $Vio2vixcckdr = 'none';
                }
            } else {
                $Vio2vixcckdr = Helpers::build_url($Vcki4t4qmybshis->_stylesheet->get_protocol(),
                    $Vcki4t4qmybshis->_stylesheet->get_host(),
                    $Vcki4t4qmybshis->_stylesheet->get_base_path(),
                    $Vzyqcsfbm3q4);
            }
        }
        if ($Vi3tzeasy1pp) {
            print "<pre>[_image\n";
            print_r($Vvqnovizplzf);
            print $Vcki4t4qmybshis->_stylesheet->get_protocol() . "\n" . $Vcki4t4qmybshis->_stylesheet->get_base_path() . "\n" . $Vio2vixcckdr . "\n";
            print "_image]</pre>";;
        }
        return $Vio2vixcckdr;
    }

    

    
    function set_color($Vexxkxtdr01j)
    {
        $Vhxdswanopzr = $Vcki4t4qmybshis->munge_color($Vexxkxtdr01j);

        if (is_null($Vhxdswanopzr) || !isset($Vhxdswanopzr["hex"])) {
            $Vexxkxtdr01j = "inherit";
        } else {
            $Vexxkxtdr01j = $Vhxdswanopzr["hex"];
        }

        
        $Vcki4t4qmybshis->_prop_cache["color"] = null;
        $Vcki4t4qmybshis->_props["color"] = $Vexxkxtdr01j;
    }

    
    function set_background_color($Vexxkxtdr01j)
    {
        $Vhxdswanopzr = $Vcki4t4qmybshis->munge_color($Vexxkxtdr01j);

        if (is_null($Vhxdswanopzr)) {
            return;
            
        }

        
        $Vcki4t4qmybshis->_prop_cache["background_color"] = null;
        $Vcki4t4qmybshis->_props["background_color"] = is_array($Vhxdswanopzr) ? $Vhxdswanopzr["hex"] : $Vhxdswanopzr;
    }

    
    function set_background_image($Vzyqcsfbm3q4)
    {
        
        $Vcki4t4qmybshis->_prop_cache["background_image"] = null;
        $Vcki4t4qmybshis->_props["background_image"] = $Vcki4t4qmybshis->_image($Vzyqcsfbm3q4);
    }

    
    function set_background_repeat($Vzyqcsfbm3q4)
    {
        if (is_null($Vzyqcsfbm3q4)) {
            $Vzyqcsfbm3q4 = self::$Vg2bme5jlm5x["background_repeat"];
        }

        
        $Vcki4t4qmybshis->_prop_cache["background_repeat"] = null;
        $Vcki4t4qmybshis->_props["background_repeat"] = $Vzyqcsfbm3q4;
    }

    
    function set_background_attachment($Vzyqcsfbm3q4)
    {
        if (is_null($Vzyqcsfbm3q4)) {
            $Vzyqcsfbm3q4 = self::$Vg2bme5jlm5x["background_attachment"];
        }

        
        $Vcki4t4qmybshis->_prop_cache["background_attachment"] = null;
        $Vcki4t4qmybshis->_props["background_attachment"] = $Vzyqcsfbm3q4;
    }

    
    function set_background_position($Vzyqcsfbm3q4)
    {
        if (is_null($Vzyqcsfbm3q4)) {
            $Vzyqcsfbm3q4 = self::$Vg2bme5jlm5x["background_position"];
        }

        
        $Vcki4t4qmybshis->_prop_cache["background_position"] = null;
        $Vcki4t4qmybshis->_props["background_position"] = $Vzyqcsfbm3q4;
    }

    
    function set_background($Vzyqcsfbm3q4)
    {
        $Vzyqcsfbm3q4 = trim($Vzyqcsfbm3q4);
        $V3xsptcgzss2mportant = isset($Vcki4t4qmybshis->_important_props["background"]);

        if ($Vzyqcsfbm3q4 === "none") {
            $Vcki4t4qmybshis->_set_style("background_image", "none", $V3xsptcgzss2mportant);
            $Vcki4t4qmybshis->_set_style("background_color", "transparent", $V3xsptcgzss2mportant);
        } else {
            $Vepim3znzh4w = array();
            $Vynpm04a4fx0 = preg_replace("/\s*\,\s*/", ",", $Vzyqcsfbm3q4); 
            $Vynpm04a4fx0 = preg_split("/\s+/", $Vynpm04a4fx0);

            foreach ($Vynpm04a4fx0 as $Vfhakhidzne2) {
                if (mb_substr($Vfhakhidzne2, 0, 3) === "url" || $Vfhakhidzne2 === "none") {
                    $Vcki4t4qmybshis->_set_style("background_image", $Vcki4t4qmybshis->_image($Vfhakhidzne2), $V3xsptcgzss2mportant);
                } elseif ($Vfhakhidzne2 === "fixed" || $Vfhakhidzne2 === "scroll") {
                    $Vcki4t4qmybshis->_set_style("background_attachment", $Vfhakhidzne2, $V3xsptcgzss2mportant);
                } elseif ($Vfhakhidzne2 === "repeat" || $Vfhakhidzne2 === "repeat-x" || $Vfhakhidzne2 === "repeat-y" || $Vfhakhidzne2 === "no-repeat") {
                    $Vcki4t4qmybshis->_set_style("background_repeat", $Vfhakhidzne2, $V3xsptcgzss2mportant);
                } elseif (($Vhxdswanopzr = $Vcki4t4qmybshis->munge_color($Vfhakhidzne2)) != null) {
                    $Vcki4t4qmybshis->_set_style("background_color", is_array($Vhxdswanopzr) ? $Vhxdswanopzr["hex"] : $Vhxdswanopzr, $V3xsptcgzss2mportant);
                } else {
                    $Vepim3znzh4w[] = $Vfhakhidzne2;
                }
            }

            if (count($Vepim3znzh4w)) {
                $Vcki4t4qmybshis->_set_style("background_position", implode(" ", $Vepim3znzh4w), $V3xsptcgzss2mportant);
            }
        }

        
        $Vcki4t4qmybshis->_prop_cache["background"] = null;
        $Vcki4t4qmybshis->_props["background"] = $Vzyqcsfbm3q4;
    }

    
    function set_font_size($Vlak25col1u3)
    {
        $Vcki4t4qmybshis->__font_size_calculated = false;
        
        $Vcki4t4qmybshis->_prop_cache["font_size"] = null;
        $Vcki4t4qmybshis->_props["font_size"] = $Vlak25col1u3;
    }

    
    function set_font($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->__font_size_calculated = false;
        
        $Vcki4t4qmybshis->_prop_cache["font"] = null;
        $Vcki4t4qmybshis->_props["font"] = $Vzyqcsfbm3q4;

        $V3xsptcgzss2mportant = isset($Vcki4t4qmybshis->_important_props["font"]);

        if (preg_match("/^(italic|oblique|normal)\s*(.*)$/i", $Vzyqcsfbm3q4, $Vyupu15qqw5c)) {
            $Vcki4t4qmybshis->_set_style("font_style", $Vyupu15qqw5c[1], $V3xsptcgzss2mportant);
            $Vzyqcsfbm3q4 = $Vyupu15qqw5c[2];
        } else {
            $Vcki4t4qmybshis->_set_style("font_style", self::$Vg2bme5jlm5x["font_style"], $V3xsptcgzss2mportant);
        }

        if (preg_match("/^(small-caps|normal)\s*(.*)$/i", $Vzyqcsfbm3q4, $Vyupu15qqw5c)) {
            $Vcki4t4qmybshis->_set_style("font_variant", $Vyupu15qqw5c[1], $V3xsptcgzss2mportant);
            $Vzyqcsfbm3q4 = $Vyupu15qqw5c[2];
        } else {
            $Vcki4t4qmybshis->_set_style("font_variant", self::$Vg2bme5jlm5x["font_variant"], $V3xsptcgzss2mportant);
        }

        
        if (preg_match("/^(bold|bolder|lighter|100|200|300|400|500|600|700|800|900|normal)\s*(.*)$/i", $Vzyqcsfbm3q4, $Vyupu15qqw5c) &&
            !preg_match("/^(?:pt|px|pc|em|ex|in|cm|mm|%)/", $Vyupu15qqw5c[2])
        ) {
            $Vcki4t4qmybshis->_set_style("font_weight", $Vyupu15qqw5c[1], $V3xsptcgzss2mportant);
            $Vzyqcsfbm3q4 = $Vyupu15qqw5c[2];
        } else {
            $Vcki4t4qmybshis->_set_style("font_weight", self::$Vg2bme5jlm5x["font_weight"], $V3xsptcgzss2mportant);
        }

        if (preg_match("/^(xx-small|x-small|small|medium|large|x-large|xx-large|smaller|larger|\d+\s*(?:pt|px|pc|em|ex|in|cm|mm|%))(?:\/|\s*)(.*)$/i", $Vzyqcsfbm3q4, $Vyupu15qqw5c)) {
            $Vcki4t4qmybshis->_set_style("font_size", $Vyupu15qqw5c[1], $V3xsptcgzss2mportant);
            $Vzyqcsfbm3q4 = $Vyupu15qqw5c[2];
            if (preg_match("/^(?:\/|\s*)(\d+\s*(?:pt|px|pc|em|ex|in|cm|mm|%)?)\s*(.*)$/i", $Vzyqcsfbm3q4, $Vyupu15qqw5c)) {
                $Vcki4t4qmybshis->_set_style("line_height", $Vyupu15qqw5c[1], $V3xsptcgzss2mportant);
                $Vzyqcsfbm3q4 = $Vyupu15qqw5c[2];
            } else {
                $Vcki4t4qmybshis->_set_style("line_height", self::$Vg2bme5jlm5x["line_height"], $V3xsptcgzss2mportant);
            }
        } else {
            $Vcki4t4qmybshis->_set_style("font_size", self::$Vg2bme5jlm5x["font_size"], $V3xsptcgzss2mportant);
            $Vcki4t4qmybshis->_set_style("line_height", self::$Vg2bme5jlm5x["line_height"], $V3xsptcgzss2mportant);
        }

        if (strlen($Vzyqcsfbm3q4) != 0) {
            $Vcki4t4qmybshis->_set_style("font_family", $Vzyqcsfbm3q4, $V3xsptcgzss2mportant);
        } else {
            $Vcki4t4qmybshis->_set_style("font_family", self::$Vg2bme5jlm5x["font_family"], $V3xsptcgzss2mportant);
        }
    }

    
    function set_page_break_before($Vbz3vmbr1h2vreak)
    {
        if ($Vbz3vmbr1h2vreak === "left" || $Vbz3vmbr1h2vreak === "right") {
            $Vbz3vmbr1h2vreak = "always";
        }

        
        $Vcki4t4qmybshis->_prop_cache["page_break_before"] = null;
        $Vcki4t4qmybshis->_props["page_break_before"] = $Vbz3vmbr1h2vreak;
    }

    
    function set_page_break_after($Vbz3vmbr1h2vreak)
    {
        if ($Vbz3vmbr1h2vreak === "left" || $Vbz3vmbr1h2vreak === "right") {
            $Vbz3vmbr1h2vreak = "always";
        }

        
        $Vcki4t4qmybshis->_prop_cache["page_break_after"] = null;
        $Vcki4t4qmybshis->_props["page_break_after"] = $Vbz3vmbr1h2vreak;
    }

    
    function set_margin_top($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_side_width_important('margin', 'top', $Vzyqcsfbm3q4);
    }

    
    function set_margin_right($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_side_width_important('margin', 'right', $Vzyqcsfbm3q4);
    }

    
    function set_margin_bottom($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_side_width_important('margin', 'bottom', $Vzyqcsfbm3q4);
    }

    
    function set_margin_left($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_side_width_important('margin', 'left', $Vzyqcsfbm3q4);
    }

    
    function set_margin($Vzyqcsfbm3q4)
    {
        $Vzyqcsfbm3q4 = str_replace("none", "0px", $Vzyqcsfbm3q4);
        $Vcki4t4qmybshis->_set_style_type_important('margin', '', $Vzyqcsfbm3q4);
    }

    
    function set_padding_top($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_side_width_important('padding', 'top', $Vzyqcsfbm3q4);
    }

    
    function set_padding_right($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_side_width_important('padding', 'right', $Vzyqcsfbm3q4);
    }

    
    function set_padding_bottom($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_side_width_important('padding', 'bottom', $Vzyqcsfbm3q4);
    }

    
    function set_padding_left($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_side_width_important('padding', 'left', $Vzyqcsfbm3q4);
    }

    
    function set_padding($Vzyqcsfbm3q4)
    {
        $Vzyqcsfbm3q4 = str_replace("none", "0px", $Vzyqcsfbm3q4);
        $Vcki4t4qmybshis->_set_style_type_important('padding', '', $Vzyqcsfbm3q4);
    }
    

    
    protected function _set_border($Voj5js1i2adw, $Vbz3vmbr1h2vorder_spec, $V3xsptcgzss2mportant)
    {
        $Vbz3vmbr1h2vorder_spec = preg_replace("/\s*\,\s*/", ",", $Vbz3vmbr1h2vorder_spec);
        
        $Vnr1h2vcbxvj = explode(" ", $Vbz3vmbr1h2vorder_spec);

        

        
        
        $Vcki4t4qmybshis->_set_style_side_type('border', $Voj5js1i2adw, '_style', self::$Vg2bme5jlm5x['border_' . $Voj5js1i2adw . '_style'], $V3xsptcgzss2mportant);
        $Vcki4t4qmybshis->_set_style_side_type('border', $Voj5js1i2adw, '_width', self::$Vg2bme5jlm5x['border_' . $Voj5js1i2adw . '_width'], $V3xsptcgzss2mportant);
        $Vcki4t4qmybshis->_set_style_side_type('border', $Voj5js1i2adw, '_color', self::$Vg2bme5jlm5x['border_' . $Voj5js1i2adw . '_color'], $V3xsptcgzss2mportant);

        foreach ($Vnr1h2vcbxvj as $Vqfra35f14fv) {
            $Vqfra35f14fv = trim($Vqfra35f14fv);
            if (in_array($Vqfra35f14fv, self::$Vn2tnb4bpsay)) {
                $Vcki4t4qmybshis->_set_style_side_type('border', $Voj5js1i2adw, '_style', $Vqfra35f14fv, $V3xsptcgzss2mportant);
            } else if (preg_match("/[.0-9]+(?:px|pt|pc|em|ex|%|in|mm|cm)|(?:thin|medium|thick)/", $Vqfra35f14fv)) {
                $Vcki4t4qmybshis->_set_style_side_type('border', $Voj5js1i2adw, '_width', $Vqfra35f14fv, $V3xsptcgzss2mportant);
            } else {
                
                $Vcki4t4qmybshis->_set_style_side_type('border', $Voj5js1i2adw, '_color', $Vqfra35f14fv, $V3xsptcgzss2mportant);
            }
        }

        
        $Vcki4t4qmybshis->_prop_cache['border_' . $Voj5js1i2adw] = null;
        $Vcki4t4qmybshis->_props['border_' . $Voj5js1i2adw] = $Vbz3vmbr1h2vorder_spec;
    }

    
    function set_border_top($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_border("top", $Vzyqcsfbm3q4, isset($Vcki4t4qmybshis->_important_props['border_top']));
    }

    
    function set_border_right($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_border("right", $Vzyqcsfbm3q4, isset($Vcki4t4qmybshis->_important_props['border_right']));
    }

    
    function set_border_bottom($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_border("bottom", $Vzyqcsfbm3q4, isset($Vcki4t4qmybshis->_important_props['border_bottom']));
    }

    
    function set_border_left($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_border("left", $Vzyqcsfbm3q4, isset($Vcki4t4qmybshis->_important_props['border_left']));
    }

    
    function set_border($Vzyqcsfbm3q4)
    {
        $V3xsptcgzss2mportant = isset($Vcki4t4qmybshis->_important_props["border"]);
        $Vcki4t4qmybshis->_set_border("top", $Vzyqcsfbm3q4, $V3xsptcgzss2mportant);
        $Vcki4t4qmybshis->_set_border("right", $Vzyqcsfbm3q4, $V3xsptcgzss2mportant);
        $Vcki4t4qmybshis->_set_border("bottom", $Vzyqcsfbm3q4, $V3xsptcgzss2mportant);
        $Vcki4t4qmybshis->_set_border("left", $Vzyqcsfbm3q4, $V3xsptcgzss2mportant);
        
        $Vcki4t4qmybshis->_prop_cache["border"] = null;
        $Vcki4t4qmybshis->_props["border"] = $Vzyqcsfbm3q4;
    }

    
    function set_border_width($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_type_important('border', '_width', $Vzyqcsfbm3q4);
    }

    
    function set_border_color($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_type_important('border', '_color', $Vzyqcsfbm3q4);
    }

    
    function set_border_style($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_type_important('border', '_style', $Vzyqcsfbm3q4);
    }

    
    function set_border_top_left_radius($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_border_radius_corner($Vzyqcsfbm3q4, "top_left");
    }

    
    function set_border_top_right_radius($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_border_radius_corner($Vzyqcsfbm3q4, "top_right");
    }

    
    function set_border_bottom_left_radius($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_border_radius_corner($Vzyqcsfbm3q4, "bottom_left");
    }

    
    function set_border_bottom_right_radius($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_border_radius_corner($Vzyqcsfbm3q4, "bottom_right");
    }

    
    function set_border_radius($Vzyqcsfbm3q4)
    {
        $Vzyqcsfbm3q4 = preg_replace("/\s*\,\s*/", ",", $Vzyqcsfbm3q4); 
        $Vnr1h2vcbxvj = explode(" ", $Vzyqcsfbm3q4);

        switch (count($Vnr1h2vcbxvj)) {
            case 1:
                $Vcki4t4qmybshis->_set_border_radii($Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[0]);
                break;
            case 2:
                $Vcki4t4qmybshis->_set_border_radii($Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[1], $Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[1]);
                break;
            case 3:
                $Vcki4t4qmybshis->_set_border_radii($Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[1], $Vnr1h2vcbxvj[2], $Vnr1h2vcbxvj[1]);
                break;
            case 4:
                $Vcki4t4qmybshis->_set_border_radii($Vnr1h2vcbxvj[0], $Vnr1h2vcbxvj[1], $Vnr1h2vcbxvj[2], $Vnr1h2vcbxvj[3]);
                break;
        }
    }

    
    protected function _set_border_radii($Vzyqcsfbm3q41, $Vzyqcsfbm3q42, $Vzyqcsfbm3q43, $Vzyqcsfbm3q44)
    {
        $Vcki4t4qmybshis->_set_border_radius_corner($Vzyqcsfbm3q41, "top_left");
        $Vcki4t4qmybshis->_set_border_radius_corner($Vzyqcsfbm3q42, "top_right");
        $Vcki4t4qmybshis->_set_border_radius_corner($Vzyqcsfbm3q43, "bottom_right");
        $Vcki4t4qmybshis->_set_border_radius_corner($Vzyqcsfbm3q44, "bottom_left");
    }

    
    protected function _set_border_radius_corner($Vzyqcsfbm3q4, $Vlgnos3mkad2)
    {
        $Vcki4t4qmybshis->_has_border_radius = true;

        
        $Vcki4t4qmybshis->_prop_cache["border_" . $Vlgnos3mkad2 . "_radius"] = null;

        $Vcki4t4qmybshis->_props["border_" . $Vlgnos3mkad2 . "_radius"] = $Vzyqcsfbm3q4;
    }

    
    function get_border_top_left_radius()
    {
        return $Vcki4t4qmybshis->_get_border_radius_corner("top_left");
    }

    
    function get_border_top_right_radius()
    {
        return $Vcki4t4qmybshis->_get_border_radius_corner("top_right");
    }

    
    function get_border_bottom_left_radius()
    {
        return $Vcki4t4qmybshis->_get_border_radius_corner("bottom_left");
    }

    
    function get_border_bottom_right_radius()
    {
        return $Vcki4t4qmybshis->_get_border_radius_corner("bottom_right");
    }

    
    protected function _get_border_radius_corner($Vlgnos3mkad2)
    {
        if (!isset($Vcki4t4qmybshis->_props["border_" . $Vlgnos3mkad2 . "_radius"]) || empty($Vcki4t4qmybshis->_props["border_" . $Vlgnos3mkad2 . "_radius"])) {
            return 0;
        }

        return $Vcki4t4qmybshis->length_in_pt($Vcki4t4qmybshis->_props["border_" . $Vlgnos3mkad2 . "_radius"]);
    }

    
    function set_outline($Vzyqcsfbm3q4)
    {
        $V3xsptcgzss2mportant = isset($Vcki4t4qmybshis->_important_props["outline"]);

        $V3ztho1nxwdys = array(
            "outline_style",
            "outline_width",
            "outline_color",
        );

        foreach ($V3ztho1nxwdys as $V3ztho1nxwdy) {
            $Vzfs2sbna2w1 = self::$Vg2bme5jlm5x[$V3ztho1nxwdy];

            if (!isset($Vcki4t4qmybshis->_important_props[$V3ztho1nxwdy]) || $V3xsptcgzss2mportant) {
                
                $Vcki4t4qmybshis->_prop_cache[$V3ztho1nxwdy] = null;
                if ($V3xsptcgzss2mportant) {
                    $Vcki4t4qmybshis->_important_props[$V3ztho1nxwdy] = true;
                }
                $Vcki4t4qmybshis->_props[$V3ztho1nxwdy] = $Vzfs2sbna2w1;
            }
        }

        $Vzyqcsfbm3q4 = preg_replace("/\s*\,\s*/", ",", $Vzyqcsfbm3q4); 
        $Vnr1h2vcbxvj = explode(" ", $Vzyqcsfbm3q4);
        foreach ($Vnr1h2vcbxvj as $Vqfra35f14fv) {
            $Vqfra35f14fv = trim($Vqfra35f14fv);

            if (in_array($Vqfra35f14fv, self::$Vn2tnb4bpsay)) {
                $Vcki4t4qmybshis->set_outline_style($Vqfra35f14fv);
            } else if (preg_match("/[.0-9]+(?:px|pt|pc|em|ex|%|in|mm|cm)|(?:thin|medium|thick)/", $Vqfra35f14fv)) {
                $Vcki4t4qmybshis->set_outline_width($Vqfra35f14fv);
            } else {
                
                $Vcki4t4qmybshis->set_outline_color($Vqfra35f14fv);
            }
        }

        
        $Vcki4t4qmybshis->_prop_cache["outline"] = null;
        $Vcki4t4qmybshis->_props["outline"] = $Vzyqcsfbm3q4;
    }

    
    function set_outline_width($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_type_important('outline', '_width', $Vzyqcsfbm3q4);
    }

    
    function set_outline_color($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_type_important('outline', '_color', $Vzyqcsfbm3q4);
    }

    
    function set_outline_style($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->_set_style_type_important('outline', '_style', $Vzyqcsfbm3q4);
    }

    
    function set_border_spacing($Vzyqcsfbm3q4)
    {
        $Vnr1h2vcbxvj = explode(" ", $Vzyqcsfbm3q4);

        if (count($Vnr1h2vcbxvj) == 1) {
            $Vnr1h2vcbxvj[1] = $Vnr1h2vcbxvj[0];
        }

        
        $Vcki4t4qmybshis->_prop_cache["border_spacing"] = null;
        $Vcki4t4qmybshis->_props["border_spacing"] = "$Vnr1h2vcbxvj[0] $Vnr1h2vcbxvj[1]";
    }

    
    function set_list_style_image($Vzyqcsfbm3q4)
    {
        
        $Vcki4t4qmybshis->_prop_cache["list_style_image"] = null;
        $Vcki4t4qmybshis->_props["list_style_image"] = $Vcki4t4qmybshis->_image($Vzyqcsfbm3q4);
    }

    
    function set_list_style($Vzyqcsfbm3q4)
    {
        $V3xsptcgzss2mportant = isset($Vcki4t4qmybshis->_important_props["list_style"]);
        $Vnr1h2vcbxvj = explode(" ", str_replace(",", " ", $Vzyqcsfbm3q4));

        static $Vcki4t4qmybsypes = array(
            "disc", "circle", "square",
            "decimal-leading-zero", "decimal", "1",
            "lower-roman", "upper-roman", "a", "A",
            "lower-greek",
            "lower-latin", "upper-latin",
            "lower-alpha", "upper-alpha",
            "armenian", "georgian", "hebrew",
            "cjk-ideographic", "hiragana", "katakana",
            "hiragana-iroha", "katakana-iroha", "none"
        );

        static $Vepim3znzh4witions = array("inside", "outside");

        foreach ($Vnr1h2vcbxvj as $Vqfra35f14fv) {
            
            if ($Vqfra35f14fv === "none") {
                $Vcki4t4qmybshis->_set_style("list_style_type", $Vqfra35f14fv, $V3xsptcgzss2mportant);
                $Vcki4t4qmybshis->_set_style("list_style_image", $Vqfra35f14fv, $V3xsptcgzss2mportant);
                continue;
            }

            
            
            
            

            if (mb_substr($Vqfra35f14fv, 0, 3) === "url") {
                $Vcki4t4qmybshis->_set_style("list_style_image", $Vcki4t4qmybshis->_image($Vqfra35f14fv), $V3xsptcgzss2mportant);
                continue;
            }

            if (in_array($Vqfra35f14fv, $Vcki4t4qmybsypes)) {
                $Vcki4t4qmybshis->_set_style("list_style_type", $Vqfra35f14fv, $V3xsptcgzss2mportant);
            } else if (in_array($Vqfra35f14fv, $Vepim3znzh4witions)) {
                $Vcki4t4qmybshis->_set_style("list_style_position", $Vqfra35f14fv, $V3xsptcgzss2mportant);
            }
        }

        
        $Vcki4t4qmybshis->_prop_cache["list_style"] = null;
        $Vcki4t4qmybshis->_props["list_style"] = $Vzyqcsfbm3q4;
    }

    
    function set_size($Vzyqcsfbm3q4)
    {
        $Vjxpogd0afis_re = "/(\d+\s*(?:pt|px|pc|em|ex|in|cm|mm|%))/";

        $Vzyqcsfbm3q4 = mb_strtolower($Vzyqcsfbm3q4);

        if ($Vzyqcsfbm3q4 === "auto") {
            return;
        }

        $V2crka1tlwcy = preg_split("/\s+/", $Vzyqcsfbm3q4);

        $Vyladn51gygj = array();
        if (preg_match($Vjxpogd0afis_re, $V2crka1tlwcy[0])) {
            $Vyladn51gygj[] = $Vcki4t4qmybshis->length_in_pt($V2crka1tlwcy[0]);

            if (isset($V2crka1tlwcy[1]) && preg_match($Vjxpogd0afis_re, $V2crka1tlwcy[1])) {
                $Vyladn51gygj[] = $Vcki4t4qmybshis->length_in_pt($V2crka1tlwcy[1]);
            } else {
                $Vyladn51gygj[] = $Vyladn51gygj[0];
            }

            if (isset($V2crka1tlwcy[2]) && $V2crka1tlwcy[2] === "landscape") {
                $Vyladn51gygj = array_reverse($Vyladn51gygj);
            }
        } elseif (isset(CPDF::$Vjvvabr4mx10[$V2crka1tlwcy[0]])) {
            $Vyladn51gygj = array_slice(CPDF::$Vjvvabr4mx10[$V2crka1tlwcy[0]], 2, 2);

            if (isset($V2crka1tlwcy[1]) && $V2crka1tlwcy[1] === "landscape") {
                $Vyladn51gygj = array_reverse($Vyladn51gygj);
            }
        } else {
            return;
        }

        $Vcki4t4qmybshis->_props["size"] = $Vyladn51gygj;
    }

    
    function get_transform()
    {
        $Vz2gmrcgy33o = "\s*([^,\s]+)\s*";
        $Vcki4t4qmybsr_value = "\s*([^,\s]+)\s*";
        $Vtmcaiuo2hqy = "\s*([^,\s]+(?:deg|rad)?)\s*";

        if (!preg_match_all("/[a-z]+\([^\)]+\)/i", $Vcki4t4qmybshis->_props["transform"], $V2crka1tlwcy, PREG_SET_ORDER)) {
            return null;
        }

        $V2lwcwa4i2jw = array(
            

            "translate" => "\($Vcki4t4qmybsr_value(?:,$Vcki4t4qmybsr_value)?\)",
            "translateX" => "\($Vcki4t4qmybsr_value\)",
            "translateY" => "\($Vcki4t4qmybsr_value\)",

            "scale" => "\($Vz2gmrcgy33o(?:,$Vz2gmrcgy33o)?\)",
            "scaleX" => "\($Vz2gmrcgy33o\)",
            "scaleY" => "\($Vz2gmrcgy33o\)",

            "rotate" => "\($Vtmcaiuo2hqy\)",

            "skew" => "\($Vtmcaiuo2hqy(?:,$Vtmcaiuo2hqy)?\)",
            "skewX" => "\($Vtmcaiuo2hqy\)",
            "skewY" => "\($Vtmcaiuo2hqy\)",
        );

        $Vcki4t4qmybsransforms = array();

        foreach ($V2crka1tlwcy as $Vtug2ggkwwbt) {
            $Vcki4t4qmybs = $Vtug2ggkwwbt[0];

            foreach ($V2lwcwa4i2jw as $Vpgf1maodsla => $Vsxwpun1fvg4) {
                if (preg_match("/$Vpgf1maodsla\s*$Vsxwpun1fvg4/i", $Vcki4t4qmybs, $Vyupu15qqw5ces)) {
                    $Vqfra35f14fvs = array_slice($Vyupu15qqw5ces, 1);

                    switch ($Vpgf1maodsla) {
                        
                        case "rotate":
                        case "skew":
                        case "skewX":
                        case "skewY":

                            foreach ($Vqfra35f14fvs as $V3xsptcgzss2 => $Vqfra35f14fv) {
                                if (strpos($Vqfra35f14fv, "rad")) {
                                    $Vqfra35f14fvs[$V3xsptcgzss2] = rad2deg(floatval($Vqfra35f14fv));
                                } else {
                                    $Vqfra35f14fvs[$V3xsptcgzss2] = floatval($Vqfra35f14fv);
                                }
                            }

                            switch ($Vpgf1maodsla) {
                                case "skew":
                                    if (!isset($Vqfra35f14fvs[1])) {
                                        $Vqfra35f14fvs[1] = 0;
                                    }
                                    break;
                                case "skewX":
                                    $Vpgf1maodsla = "skew";
                                    $Vqfra35f14fvs = array($Vqfra35f14fvs[0], 0);
                                    break;
                                case "skewY":
                                    $Vpgf1maodsla = "skew";
                                    $Vqfra35f14fvs = array(0, $Vqfra35f14fvs[0]);
                                    break;
                            }
                            break;

                        
                        case "translate":
                            $Vqfra35f14fvs[0] = $Vcki4t4qmybshis->length_in_pt($Vqfra35f14fvs[0], (float)$Vcki4t4qmybshis->length_in_pt($Vcki4t4qmybshis->width));

                            if (isset($Vqfra35f14fvs[1])) {
                                $Vqfra35f14fvs[1] = $Vcki4t4qmybshis->length_in_pt($Vqfra35f14fvs[1], (float)$Vcki4t4qmybshis->length_in_pt($Vcki4t4qmybshis->height));
                            } else {
                                $Vqfra35f14fvs[1] = 0;
                            }
                            break;

                        case "translateX":
                            $Vpgf1maodsla = "translate";
                            $Vqfra35f14fvs = array($Vcki4t4qmybshis->length_in_pt($Vqfra35f14fvs[0], (float)$Vcki4t4qmybshis->length_in_pt($Vcki4t4qmybshis->width)), 0);
                            break;

                        case "translateY":
                            $Vpgf1maodsla = "translate";
                            $Vqfra35f14fvs = array(0, $Vcki4t4qmybshis->length_in_pt($Vqfra35f14fvs[0], (float)$Vcki4t4qmybshis->length_in_pt($Vcki4t4qmybshis->height)));
                            break;

                        
                        case "scale":
                            if (!isset($Vqfra35f14fvs[1])) {
                                $Vqfra35f14fvs[1] = $Vqfra35f14fvs[0];
                            }
                            break;

                        case "scaleX":
                            $Vpgf1maodsla = "scale";
                            $Vqfra35f14fvs = array($Vqfra35f14fvs[0], 1.0);
                            break;

                        case "scaleY":
                            $Vpgf1maodsla = "scale";
                            $Vqfra35f14fvs = array(1.0, $Vqfra35f14fvs[0]);
                            break;
                    }

                    $Vcki4t4qmybsransforms[] = array(
                        $Vpgf1maodsla,
                        $Vqfra35f14fvs,
                    );
                }
            }
        }

        return $Vcki4t4qmybsransforms;
    }

    
    function set_transform($Vzyqcsfbm3q4)
    {
        
        $Vcki4t4qmybshis->_prop_cache["transform"] = null;
        $Vcki4t4qmybshis->_props["transform"] = $Vzyqcsfbm3q4;
    }

    
    function set__webkit_transform($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->set_transform($Vzyqcsfbm3q4);
    }

    
    function set__webkit_transform_origin($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->set_transform_origin($Vzyqcsfbm3q4);
    }

    
    function set_transform_origin($Vzyqcsfbm3q4)
    {
        
        $Vcki4t4qmybshis->_prop_cache["transform_origin"] = null;
        $Vcki4t4qmybshis->_props["transform_origin"] = $Vzyqcsfbm3q4;
    }

    
    function get_transform_origin() {
        $Vqfra35f14fvs = preg_split("/\s+/", $Vcki4t4qmybshis->_props['transform_origin']);

        if (count($Vqfra35f14fvs) === 0) {
            $Vqfra35f14fvs = preg_split("/\s+/", self::$Vg2bme5jlm5x["transform_origin"]);
        }

        $Vqfra35f14fvs = array_map(function($Vqfra35f14fv) {
            if (in_array($Vqfra35f14fv, array("top", "left"))) {
                return 0;
            } else if (in_array($Vqfra35f14fv, array("bottom", "right"))) {
                return "100%";
            } else {
                return $Vqfra35f14fv;
            }
        }, $Vqfra35f14fvs);

        if (!isset($Vqfra35f14fvs[1])) {
            $Vqfra35f14fvs[1] = $Vqfra35f14fvs[0];
        }

        return $Vqfra35f14fvs;
    }

    
    protected function parse_image_resolution($Vzyqcsfbm3q4)
    {
        
        

        $Vkabkv5ip0kge = '/^\s*(\d+|normal|auto)\s*$/';

        if (!preg_match($Vkabkv5ip0kge, $Vzyqcsfbm3q4, $Vyupu15qqw5ces)) {
            return null;
        }

        return $Vyupu15qqw5ces[1];
    }

    
    function set_background_image_resolution($Vzyqcsfbm3q4)
    {
        $Vhgbyoewrl3x = $Vcki4t4qmybshis->parse_image_resolution($Vzyqcsfbm3q4);

        $Vcki4t4qmybshis->_prop_cache["background_image_resolution"] = null;
        $Vcki4t4qmybshis->_props["background_image_resolution"] = $Vhgbyoewrl3x;
    }

    
    function set_image_resolution($Vzyqcsfbm3q4)
    {
        $Vhgbyoewrl3x = $Vcki4t4qmybshis->parse_image_resolution($Vzyqcsfbm3q4);

        $Vcki4t4qmybshis->_prop_cache["image_resolution"] = null;
        $Vcki4t4qmybshis->_props["image_resolution"] = $Vhgbyoewrl3x;
    }

    
    function set__dompdf_background_image_resolution($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->set_background_image_resolution($Vzyqcsfbm3q4);
    }

    
    function set__dompdf_image_resolution($Vzyqcsfbm3q4)
    {
        $Vcki4t4qmybshis->set_image_resolution($Vzyqcsfbm3q4);
    }

    
    function set_z_index($Vzyqcsfbm3q4)
    {
        if (round($Vzyqcsfbm3q4) != $Vzyqcsfbm3q4 && $Vzyqcsfbm3q4 !== "auto") {
            return;
        }

        $Vcki4t4qmybshis->_prop_cache["z_index"] = null;
        $Vcki4t4qmybshis->_props["z_index"] = $Vzyqcsfbm3q4;
    }

    
    function set_counter_increment($Vzyqcsfbm3q4)
    {
        $Vzyqcsfbm3q4 = trim($Vzyqcsfbm3q4);
        $Vqfra35f14fv = null;

        if (in_array($Vzyqcsfbm3q4, array("none", "inherit"))) {
            $Vqfra35f14fv = $Vzyqcsfbm3q4;
        } else {
            if (preg_match_all("/(" . self::CSS_IDENTIFIER . ")(?:\s+(" . self::CSS_INTEGER . "))?/", $Vzyqcsfbm3q4, $Vyupu15qqw5ces, PREG_SET_ORDER)) {
                $Vqfra35f14fv = array();
                foreach ($Vyupu15qqw5ces as $Vyupu15qqw5c) {
                    $Vqfra35f14fv[$Vyupu15qqw5c[1]] = isset($Vyupu15qqw5c[2]) ? $Vyupu15qqw5c[2] : 1;
                }
            }
        }

        $Vcki4t4qmybshis->_prop_cache["counter_increment"] = null;
        $Vcki4t4qmybshis->_props["counter_increment"] = $Vqfra35f14fv;
    }

    
    public function setFontMetrics(FontMetrics $Vj1pbeciqvz4)
    {
        $Vcki4t4qmybshis->fontMetrics = $Vj1pbeciqvz4;
        return $Vcki4t4qmybshis;
    }

    
    public function getFontMetrics()
    {
        return $Vcki4t4qmybshis->fontMetrics;
    }

    
    
    function __toString()
    {
        return print_r(array_merge(array("parent_font_size" => $Vcki4t4qmybshis->_parent_font_size),
            $Vcki4t4qmybshis->_props), true);
    }

    
    function debug_print()
    {
        
        print "parent_font_size:" . $Vcki4t4qmybshis->_parent_font_size . ";\n";
        
        foreach ($Vcki4t4qmybshis->_props as $V3ztho1nxwdy => $Vzyqcsfbm3q4) {
            
            print $V3ztho1nxwdy . ':' . $Vzyqcsfbm3q4;
            
            if (isset($Vcki4t4qmybshis->_important_props[$V3ztho1nxwdy])) {
                
                print '!important';
                
            }
            
            print ";\n";
            
        }
        
    }
}
