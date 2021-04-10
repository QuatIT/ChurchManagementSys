<?php


namespace Svg\Surface;

use Svg\Style;


interface SurfaceInterface
{
    public function save();

    public function restore();

    
    public function scale($Vs4gloy23a1d, $Vopgub02o3q2);

    public function rotate($Vtmcaiuo2hqy);

    public function translate($Vs4gloy23a1d, $Vopgub02o3q2);

    public function transform($Vrr3orqjztc2, $Vbz3vmbr1h2v, $Vv03lfntnmcz, $Vcyg5xmwfpxo, $V2bwrjburyuf, $V4ljftfdeqpl);

    
    public function beginPath();

    public function closePath();

    public function fill();

    public function stroke();

    public function endPath();

    public function fillStroke();

    public function clip();

    
    public function fillText($Vnlbbd31sxbf, $Vs4gloy23a1d, $Vopgub02o3q2, $Vv44wp1i5zfs = null);

    public function strokeText($Vnlbbd31sxbf, $Vs4gloy23a1d, $Vopgub02o3q2, $Vv44wp1i5zfs = null);

    public function measureText($Vnlbbd31sxbf);

    
    public function drawImage($Vnxkvrc5q2ng, $Vjz2piyfb2ut, $Vskekw1ijrky, $Vwuismxitwwp = null, $Vdsvjjxxrru4 = null, $Vcyg5xmwfpxox = null, $Vcyg5xmwfpxoy = null, $Vcyg5xmwfpxow = null, $Vcyg5xmwfpxoh = null);

    
    public function lineTo($Vs4gloy23a1d, $Vopgub02o3q2);

    public function moveTo($Vs4gloy23a1d, $Vopgub02o3q2);

    public function quadraticCurveTo($Vv03lfntnmczpx, $Vv03lfntnmczpy, $Vs4gloy23a1d, $Vopgub02o3q2);

    public function bezierCurveTo($Vv03lfntnmczp1x, $Vv03lfntnmczp1y, $Vv03lfntnmczp2x, $Vv03lfntnmczp2y, $Vs4gloy23a1d, $Vopgub02o3q2);

    public function arcTo($Vs4gloy23a1d1, $Vopgub02o3q21, $Vs4gloy23a1d2, $Vopgub02o3q22, $V4tsg1pc0dnr);

    public function circle($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnr);

    public function arc($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnr, $Vk21laijil03, $V2bwrjburyufndAngle, $Vrr3orqjztc2nticlockwise = false);

    public function ellipse($Vs4gloy23a1d, $Vopgub02o3q2, $V4tsg1pc0dnrX, $V4tsg1pc0dnrY, $Vodyfhojz44d, $Vk21laijil03, $V2bwrjburyufndAngle, $Vrr3orqjztc2nticlockwise);

    
    public function rect($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vvyapc0zfcyf = 0, $Vzvzlsqbnl5g = 0);

    public function fillRect($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa);

    public function strokeRect($Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa);

    public function setStyle(Style $Vdidzwb0w3vc);

    
    public function getStyle();

    public function setFont($V4ljftfdeqplamily, $Vdidzwb0w3vc, $Vhoifq2kocyteight);
}
