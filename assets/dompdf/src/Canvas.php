<?php


namespace Dompdf;


interface Canvas
{
    function __construct($Vgyavbwa2gyd = "letter", $Vurj2rpl3rvw = "portrait", Dompdf $Vhvghaoacagz);

    
    function get_dompdf();

    
    function get_page_number();

    
    function get_page_count();

    
    function set_page_count($Vj4h4hyymhja);

    
    function line($Vjxqwkabkvag, $Vzdywlaebz1l, $Vn5yf4urazdd, $Vfph4d2wdjam, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vdidzwb0w3vc = null);

    
    function rectangle($Vjxqwkabkvag, $Vzdywlaebz1l, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vdidzwb0w3vc = null);

    
    function filled_rectangle($Vjxqwkabkvag, $Vzdywlaebz1l, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vexxkxtdr01j);

    
    function clipping_rectangle($Vjxqwkabkvag, $Vzdywlaebz1l, $Vhoifq2kocyt, $Vjlmjalejjxa);

    
    function clipping_roundrectangle($Vjxqwkabkvag, $Vzdywlaebz1l, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vz2hkt0r22ia, $Vzmfvefqwysh, $Vxo14t4heoku, $V5e5dzlyursk);

    
    function clipping_end();

    
    function save();

    
    function restore();

    
    function rotate($Vtmcaiuo2hqy, $Vs4gloy23a1d, $Vopgub02o3q2);

    
    function skew($Vtmcaiuo2hqy_x, $Vtmcaiuo2hqy_y, $Vs4gloy23a1d, $Vopgub02o3q2);

    
    function scale($Vvyyy23v5fb4, $V2fb2ve5h53x, $Vs4gloy23a1d, $Vopgub02o3q2);

    
    function translate($Vidim0y0ouos, $Vycw3amdlttj);

    
    function transform($Vrr3orqjztc2, $Vbz3vmbr1h2v, $Vv03lfntnmcz, $Vcyg5xmwfpxo, $V2bwrjburyuf, $V4ljftfdeqpl);

    
    function polygon($V4jz4nyvrd2d, $Vexxkxtdr01j, $Vztt3qdrrikx = null, $Vdidzwb0w3vc = null, $V4ljftfdeqplill = false);

    
    function circle($Vs4gloy23a1d, $Vopgub02o3q2, $Vkabkv5ip0kg, $Vexxkxtdr01j, $Vztt3qdrrikx = null, $Vdidzwb0w3vc = null, $V4ljftfdeqplill = false);

    
    function image($Vy4aoqvldpc0, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vkabkv5ip0kgesolution = "normal");

    
    function arc($Vs4gloy23a1d, $Vopgub02o3q2, $Vkabkv5ip0kg1, $Vkabkv5ip0kg2, $Vrr3orqjztc2start, $Vrr3orqjztc2end, $Vexxkxtdr01j, $Vztt3qdrrikx, $Vdidzwb0w3vc = array());

    
    function text($Vs4gloy23a1d, $Vopgub02o3q2, $Vnlbbd31sxbf, $V4ljftfdeqplont, $Vlak25col1u3, $Vexxkxtdr01j = array(0, 0, 0), $Vhoifq2kocytord_space = 0.0, $Vv03lfntnmczhar_space = 0.0, $Vtmcaiuo2hqy = 0.0);

    
    function add_named_dest($Vrr3orqjztc2nchorname);

    
    function add_link($Vsp0omgzz2yw, $Vs4gloy23a1d, $Vopgub02o3q2, $Vztt3qdrrikx, $Vjlmjalejjxaeight);

    
    function add_info($Vpgf1maodsla, $Vqfra35f14fv);

    
    function get_text_width($Vnlbbd31sxbf, $V4ljftfdeqplont, $Vlak25col1u3, $Vhoifq2kocytord_spacing = 0.0, $Vv03lfntnmczhar_spacing = 0.0);

    
    function get_font_height($V4ljftfdeqplont, $Vlak25col1u3);

    
    function get_font_baseline($V4ljftfdeqplont, $Vlak25col1u3);

    
    function get_width();


    
    function get_height();

    
    

    
    function set_opacity($Vdrvff4n2sqc, $Vgauloeyyiwd = "Normal");

    
    function set_default_view($Vl1wquemb3h4, $Vi43cktvy0zi = array());

    
    function javascript($Vxwmfnegxapy);

    
    function new_page();

    
    function stream($V4ljftfdeqplilename, $Vi43cktvy0zi = array());

    
    function output($Vi43cktvy0zi = array());
}
