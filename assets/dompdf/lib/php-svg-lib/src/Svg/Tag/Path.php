<?php


namespace Svg\Tag;

use Svg\Surface\SurfaceInterface;

class Path extends Shape
{
    static $V3hm23p5mqem = array(
        'm' => 2,
        'l' => 2,
        'h' => 1,
        'v' => 1,
        'c' => 6,
        's' => 4,
        'q' => 4,
        't' => 2,
        'a' => 7,
    );

    static $Vlwqhei1brhq = array(
        'm' => 'l',
        'M' => 'L',
    );

    public function start($Voywws15cvz5)
    {
        if (!isset($Voywws15cvz5['d'])) {
            $Vcki4t4qmybshis->hasShape = false;

            return;
        }

        $V0tiu4czys2m = array();
        preg_match_all('/([MZLHVCSQTAmzlhvcsqta])([eE ,\-.\d]+)*/', $Voywws15cvz5['d'], $V0tiu4czys2m, PREG_SET_ORDER);

        $Vio2vixcckdr = array();
        foreach ($V0tiu4czys2m as $Vv03lfntnmcz) {
            if (count($Vv03lfntnmcz) == 3) {
                $Vtuyql0vigxq = array();
                preg_match_all('/([-+]?((\d+\.\d+)|((\d+)|(\.\d+)))(?:e[-+]?\d+)?)/i', $Vv03lfntnmcz[2], $Vtuyql0vigxq, PREG_PATTERN_ORDER);
                $Vfxeymomkggo = $Vtuyql0vigxq[0];
                $Vv03lfntnmczommandLower = strtolower($Vv03lfntnmcz[1]);

                if (
                    isset(self::$V3hm23p5mqem[$Vv03lfntnmczommandLower]) &&
                    ($Vv03lfntnmczommandLength = self::$V3hm23p5mqem[$Vv03lfntnmczommandLower]) &&
                    count($Vfxeymomkggo) > $Vv03lfntnmczommandLength
                ) {
                    $Vh2wugvumpym = isset(self::$Vlwqhei1brhq[$Vv03lfntnmcz[1]]) ? self::$Vlwqhei1brhq[$Vv03lfntnmcz[1]] : $Vv03lfntnmcz[1];
                    $Vv03lfntnmczommand = $Vv03lfntnmcz[1];

                    for ($Vgu5dsd35kdp = 0, $Vgu5dsd35kdplen = count($Vfxeymomkggo); $Vgu5dsd35kdp < $Vgu5dsd35kdplen; $Vgu5dsd35kdp += $Vv03lfntnmczommandLength) {
                        $V5qxe50qy1ec = array_slice($Vfxeymomkggo, $Vgu5dsd35kdp, $Vgu5dsd35kdp + $Vv03lfntnmczommandLength);
                        array_unshift($V5qxe50qy1ec, $Vv03lfntnmczommand);
                        $Vio2vixcckdr[] = $V5qxe50qy1ec;

                        $Vv03lfntnmczommand = $Vh2wugvumpym;
                    }
                } else {
                    array_unshift($Vfxeymomkggo, $Vv03lfntnmcz[1]);
                    $Vio2vixcckdr[] = $Vfxeymomkggo;
                }

            } else {
                $Vfxeymomkggo = array($Vv03lfntnmcz[1]);

                $Vio2vixcckdr[] = $Vfxeymomkggo;
            }
        }

        $Vyjtkau4njyv = $Vcki4t4qmybshis->document->getSurface();

        
        $Vv03lfntnmczurrent = null; 
        $Vvmpaxraydqz = null;
        $V2my1bfaoywc = 0;
        $Vzekhkyiobnc = 0;
        $Vs4gloy23a1d = 0; 
        $Vopgub02o3q2 = 0; 
        $Vv03lfntnmczontrolX = 0; 
        $Vv03lfntnmczontrolY = 0; 
        $Vjcx0zcsckcb = null;
        $Vswimifpecds = null;
        $Vgbfrc2v1aui = null;
        $Vv0n5vob4umq = null;
        $V3nb02w01gr5 = 0; 
        $Vcki4t4qmybs = 0; 
        $Vln1fgaz3yy3 = null;

        foreach ($Vio2vixcckdr as $Vv03lfntnmczurrent) {
            switch ($Vv03lfntnmczurrent[0]) { 
                case 'l': 
                    $Vs4gloy23a1d += $Vv03lfntnmczurrent[1];
                    $Vopgub02o3q2 += $Vv03lfntnmczurrent[2];
                    $Vyjtkau4njyv->lineTo($Vs4gloy23a1d + $V3nb02w01gr5, $Vopgub02o3q2 + $Vcki4t4qmybs);
                    break;

                case 'L': 
                    $Vs4gloy23a1d = $Vv03lfntnmczurrent[1];
                    $Vopgub02o3q2 = $Vv03lfntnmczurrent[2];
                    $Vyjtkau4njyv->lineTo($Vs4gloy23a1d + $V3nb02w01gr5, $Vopgub02o3q2 + $Vcki4t4qmybs);
                    break;

                case 'h': 
                    $Vs4gloy23a1d += $Vv03lfntnmczurrent[1];
                    $Vyjtkau4njyv->lineTo($Vs4gloy23a1d + $V3nb02w01gr5, $Vopgub02o3q2 + $Vcki4t4qmybs);
                    break;

                case 'H': 
                    $Vs4gloy23a1d = $Vv03lfntnmczurrent[1];
                    $Vyjtkau4njyv->lineTo($Vs4gloy23a1d + $V3nb02w01gr5, $Vopgub02o3q2 + $Vcki4t4qmybs);
                    break;

                case 'v': 
                    $Vopgub02o3q2 += $Vv03lfntnmczurrent[1];
                    $Vyjtkau4njyv->lineTo($Vs4gloy23a1d + $V3nb02w01gr5, $Vopgub02o3q2 + $Vcki4t4qmybs);
                    break;

                case 'V': 
                    $Vopgub02o3q2 = $Vv03lfntnmczurrent[1];
                    $Vyjtkau4njyv->lineTo($Vs4gloy23a1d + $V3nb02w01gr5, $Vopgub02o3q2 + $Vcki4t4qmybs);
                    break;

                case 'm': 
                    $Vs4gloy23a1d += $Vv03lfntnmczurrent[1];
                    $Vopgub02o3q2 += $Vv03lfntnmczurrent[2];
                    $V2my1bfaoywc = $Vs4gloy23a1d;
                    $Vzekhkyiobnc = $Vopgub02o3q2;
                    $Vyjtkau4njyv->moveTo($Vs4gloy23a1d + $V3nb02w01gr5, $Vopgub02o3q2 + $Vcki4t4qmybs);
                    break;

                case 'M': 
                    $Vs4gloy23a1d = $Vv03lfntnmczurrent[1];
                    $Vopgub02o3q2 = $Vv03lfntnmczurrent[2];
                    $V2my1bfaoywc = $Vs4gloy23a1d;
                    $Vzekhkyiobnc = $Vopgub02o3q2;
                    $Vyjtkau4njyv->moveTo($Vs4gloy23a1d + $V3nb02w01gr5, $Vopgub02o3q2 + $Vcki4t4qmybs);
                    break;

                case 'c': 
                    $Vjcx0zcsckcb = $Vs4gloy23a1d + $Vv03lfntnmczurrent[5];
                    $Vswimifpecds = $Vopgub02o3q2 + $Vv03lfntnmczurrent[6];
                    $Vv03lfntnmczontrolX = $Vs4gloy23a1d + $Vv03lfntnmczurrent[3];
                    $Vv03lfntnmczontrolY = $Vopgub02o3q2 + $Vv03lfntnmczurrent[4];
                    $Vyjtkau4njyv->bezierCurveTo(
                        $Vs4gloy23a1d + $Vv03lfntnmczurrent[1] + $V3nb02w01gr5, 
                        $Vopgub02o3q2 + $Vv03lfntnmczurrent[2] + $Vcki4t4qmybs, 
                        $Vv03lfntnmczontrolX + $V3nb02w01gr5, 
                        $Vv03lfntnmczontrolY + $Vcki4t4qmybs, 
                        $Vjcx0zcsckcb + $V3nb02w01gr5,
                        $Vswimifpecds + $Vcki4t4qmybs
                    );
                    $Vs4gloy23a1d = $Vjcx0zcsckcb;
                    $Vopgub02o3q2 = $Vswimifpecds;
                    break;

                case 'C': 
                    $Vs4gloy23a1d = $Vv03lfntnmczurrent[5];
                    $Vopgub02o3q2 = $Vv03lfntnmczurrent[6];
                    $Vv03lfntnmczontrolX = $Vv03lfntnmczurrent[3];
                    $Vv03lfntnmczontrolY = $Vv03lfntnmczurrent[4];
                    $Vyjtkau4njyv->bezierCurveTo(
                        $Vv03lfntnmczurrent[1] + $V3nb02w01gr5,
                        $Vv03lfntnmczurrent[2] + $Vcki4t4qmybs,
                        $Vv03lfntnmczontrolX + $V3nb02w01gr5,
                        $Vv03lfntnmczontrolY + $Vcki4t4qmybs,
                        $Vs4gloy23a1d + $V3nb02w01gr5,
                        $Vopgub02o3q2 + $Vcki4t4qmybs
                    );
                    break;

                case 's': 

                    
                    $Vjcx0zcsckcb = $Vs4gloy23a1d + $Vv03lfntnmczurrent[3];
                    $Vswimifpecds = $Vopgub02o3q2 + $Vv03lfntnmczurrent[4];

                    if (!preg_match('/[CcSs]/', $Vvmpaxraydqz[0])) {
                        
                        
                        $Vv03lfntnmczontrolX = $Vs4gloy23a1d;
                        $Vv03lfntnmczontrolY = $Vopgub02o3q2;
                    } else {
                        
                        $Vv03lfntnmczontrolX = 2 * $Vs4gloy23a1d - $Vv03lfntnmczontrolX;
                        $Vv03lfntnmczontrolY = 2 * $Vopgub02o3q2 - $Vv03lfntnmczontrolY;
                    }

                    $Vyjtkau4njyv->bezierCurveTo(
                        $Vv03lfntnmczontrolX + $V3nb02w01gr5,
                        $Vv03lfntnmczontrolY + $Vcki4t4qmybs,
                        $Vs4gloy23a1d + $Vv03lfntnmczurrent[1] + $V3nb02w01gr5,
                        $Vopgub02o3q2 + $Vv03lfntnmczurrent[2] + $Vcki4t4qmybs,
                        $Vjcx0zcsckcb + $V3nb02w01gr5,
                        $Vswimifpecds + $Vcki4t4qmybs
                    );
                    
                    
                    
                    
                    $Vv03lfntnmczontrolX = $Vs4gloy23a1d + $Vv03lfntnmczurrent[1];
                    $Vv03lfntnmczontrolY = $Vopgub02o3q2 + $Vv03lfntnmczurrent[2];

                    $Vs4gloy23a1d = $Vjcx0zcsckcb;
                    $Vopgub02o3q2 = $Vswimifpecds;
                    break;

                case 'S': 
                    $Vjcx0zcsckcb = $Vv03lfntnmczurrent[3];
                    $Vswimifpecds = $Vv03lfntnmczurrent[4];

                    if (!preg_match('/[CcSs]/', $Vvmpaxraydqz[0])) {
                        
                        
                        $Vv03lfntnmczontrolX = $Vs4gloy23a1d;
                        $Vv03lfntnmczontrolY = $Vopgub02o3q2;
                    } else {
                        
                        $Vv03lfntnmczontrolX = 2 * $Vs4gloy23a1d - $Vv03lfntnmczontrolX;
                        $Vv03lfntnmczontrolY = 2 * $Vopgub02o3q2 - $Vv03lfntnmczontrolY;
                    }

                    $Vyjtkau4njyv->bezierCurveTo(
                        $Vv03lfntnmczontrolX + $V3nb02w01gr5,
                        $Vv03lfntnmczontrolY + $Vcki4t4qmybs,
                        $Vv03lfntnmczurrent[1] + $V3nb02w01gr5,
                        $Vv03lfntnmczurrent[2] + $Vcki4t4qmybs,
                        $Vjcx0zcsckcb + $V3nb02w01gr5,
                        $Vswimifpecds + $Vcki4t4qmybs
                    );
                    $Vs4gloy23a1d = $Vjcx0zcsckcb;
                    $Vopgub02o3q2 = $Vswimifpecds;

                    
                    
                    
                    
                    $Vv03lfntnmczontrolX = $Vv03lfntnmczurrent[1];
                    $Vv03lfntnmczontrolY = $Vv03lfntnmczurrent[2];

                    break;

                case 'q': 
                    
                    $Vjcx0zcsckcb = $Vs4gloy23a1d + $Vv03lfntnmczurrent[3];
                    $Vswimifpecds = $Vopgub02o3q2 + $Vv03lfntnmczurrent[4];

                    $Vv03lfntnmczontrolX = $Vs4gloy23a1d + $Vv03lfntnmczurrent[1];
                    $Vv03lfntnmczontrolY = $Vopgub02o3q2 + $Vv03lfntnmczurrent[2];

                    $Vyjtkau4njyv->quadraticCurveTo(
                        $Vv03lfntnmczontrolX + $V3nb02w01gr5,
                        $Vv03lfntnmczontrolY + $Vcki4t4qmybs,
                        $Vjcx0zcsckcb + $V3nb02w01gr5,
                        $Vswimifpecds + $Vcki4t4qmybs
                    );
                    $Vs4gloy23a1d = $Vjcx0zcsckcb;
                    $Vopgub02o3q2 = $Vswimifpecds;
                    break;

                case 'Q': 
                    $Vjcx0zcsckcb = $Vv03lfntnmczurrent[3];
                    $Vswimifpecds = $Vv03lfntnmczurrent[4];

                    $Vyjtkau4njyv->quadraticCurveTo(
                        $Vv03lfntnmczurrent[1] + $V3nb02w01gr5,
                        $Vv03lfntnmczurrent[2] + $Vcki4t4qmybs,
                        $Vjcx0zcsckcb + $V3nb02w01gr5,
                        $Vswimifpecds + $Vcki4t4qmybs
                    );
                    $Vs4gloy23a1d = $Vjcx0zcsckcb;
                    $Vopgub02o3q2 = $Vswimifpecds;
                    $Vv03lfntnmczontrolX = $Vv03lfntnmczurrent[1];
                    $Vv03lfntnmczontrolY = $Vv03lfntnmczurrent[2];
                    break;

                case 't': 

                    
                    $Vjcx0zcsckcb = $Vs4gloy23a1d + $Vv03lfntnmczurrent[1];
                    $Vswimifpecds = $Vopgub02o3q2 + $Vv03lfntnmczurrent[2];

                    if (preg_match("/[QqTt]/", $Vvmpaxraydqz[0])) {
                        
                        
                        $Vv03lfntnmczontrolX = $Vs4gloy23a1d;
                        $Vv03lfntnmczontrolY = $Vopgub02o3q2;
                    } else {
                        if ($Vvmpaxraydqz[0] === 't') {
                            
                            $Vv03lfntnmczontrolX = 2 * $Vs4gloy23a1d - $Vgbfrc2v1aui;
                            $Vv03lfntnmczontrolY = 2 * $Vopgub02o3q2 - $Vv0n5vob4umq;
                        } else {
                            if ($Vvmpaxraydqz[0] === 'q') {
                                
                                $Vv03lfntnmczontrolX = 2 * $Vs4gloy23a1d - $Vv03lfntnmczontrolX;
                                $Vv03lfntnmczontrolY = 2 * $Vopgub02o3q2 - $Vv03lfntnmczontrolY;
                            }
                        }
                    }

                    $Vgbfrc2v1aui = $Vv03lfntnmczontrolX;
                    $Vv0n5vob4umq = $Vv03lfntnmczontrolY;

                    $Vyjtkau4njyv->quadraticCurveTo(
                        $Vv03lfntnmczontrolX + $V3nb02w01gr5,
                        $Vv03lfntnmczontrolY + $Vcki4t4qmybs,
                        $Vjcx0zcsckcb + $V3nb02w01gr5,
                        $Vswimifpecds + $Vcki4t4qmybs
                    );
                    $Vs4gloy23a1d = $Vjcx0zcsckcb;
                    $Vopgub02o3q2 = $Vswimifpecds;
                    $Vv03lfntnmczontrolX = $Vs4gloy23a1d + $Vv03lfntnmczurrent[1];
                    $Vv03lfntnmczontrolY = $Vopgub02o3q2 + $Vv03lfntnmczurrent[2];
                    break;

                case 'T':
                    $Vjcx0zcsckcb = $Vv03lfntnmczurrent[1];
                    $Vswimifpecds = $Vv03lfntnmczurrent[2];

                    
                    $Vv03lfntnmczontrolX = 2 * $Vs4gloy23a1d - $Vv03lfntnmczontrolX;
                    $Vv03lfntnmczontrolY = 2 * $Vopgub02o3q2 - $Vv03lfntnmczontrolY;
                    $Vyjtkau4njyv->quadraticCurveTo(
                        $Vv03lfntnmczontrolX + $V3nb02w01gr5,
                        $Vv03lfntnmczontrolY + $Vcki4t4qmybs,
                        $Vjcx0zcsckcb + $V3nb02w01gr5,
                        $Vswimifpecds + $Vcki4t4qmybs
                    );
                    $Vs4gloy23a1d = $Vjcx0zcsckcb;
                    $Vopgub02o3q2 = $Vswimifpecds;
                    break;

                case 'a':
                    
                    $Vcki4t4qmybshis->drawArc(
                        $Vyjtkau4njyv,
                        $Vs4gloy23a1d + $V3nb02w01gr5,
                        $Vopgub02o3q2 + $Vcki4t4qmybs,
                        array(
                            $Vv03lfntnmczurrent[1],
                            $Vv03lfntnmczurrent[2],
                            $Vv03lfntnmczurrent[3],
                            $Vv03lfntnmczurrent[4],
                            $Vv03lfntnmczurrent[5],
                            $Vv03lfntnmczurrent[6] + $Vs4gloy23a1d + $V3nb02w01gr5,
                            $Vv03lfntnmczurrent[7] + $Vopgub02o3q2 + $Vcki4t4qmybs
                        )
                    );
                    $Vs4gloy23a1d += $Vv03lfntnmczurrent[6];
                    $Vopgub02o3q2 += $Vv03lfntnmczurrent[7];
                    break;

                case 'A':
                    
                    $Vcki4t4qmybshis->drawArc(
                        $Vyjtkau4njyv,
                        $Vs4gloy23a1d + $V3nb02w01gr5,
                        $Vopgub02o3q2 + $Vcki4t4qmybs,
                        array(
                            $Vv03lfntnmczurrent[1],
                            $Vv03lfntnmczurrent[2],
                            $Vv03lfntnmczurrent[3],
                            $Vv03lfntnmczurrent[4],
                            $Vv03lfntnmczurrent[5],
                            $Vv03lfntnmczurrent[6] + $V3nb02w01gr5,
                            $Vv03lfntnmczurrent[7] + $Vcki4t4qmybs
                        )
                    );
                    $Vs4gloy23a1d = $Vv03lfntnmczurrent[6];
                    $Vopgub02o3q2 = $Vv03lfntnmczurrent[7];
                    break;

                case 'z':
                case 'Z':
                    $Vs4gloy23a1d = $V2my1bfaoywc;
                    $Vopgub02o3q2 = $Vzekhkyiobnc;
                    $Vyjtkau4njyv->closePath();
                    break;
            }
            $Vvmpaxraydqz = $Vv03lfntnmczurrent;
        }
    }

    function drawArc(SurfaceInterface $Vyjtkau4njyv, $Vu5ffr5lmaj5, $Vvg2dh2arwb5, $Vv03lfntnmczoords)
    {
        $Vvyapc0zfcyf = $Vv03lfntnmczoords[0];
        $Vzvzlsqbnl5g = $Vv03lfntnmczoords[1];
        $V4mu32x20q34 = $Vv03lfntnmczoords[2];
        $V3nb02w01gr5arge = $Vv03lfntnmczoords[3];
        $V1zkflo3xrnp = $Vv03lfntnmczoords[4];
        $Vcki4t4qmybsx = $Vv03lfntnmczoords[5];
        $Vcki4t4qmybsy = $Vv03lfntnmczoords[6];
        $Vexmuntaqxdw = array(
            array(),
            array(),
            array(),
            array(),
        );

        $VexmuntaqxdwNorm = $Vcki4t4qmybshis->arcToSegments($Vcki4t4qmybsx - $Vu5ffr5lmaj5, $Vcki4t4qmybsy - $Vvg2dh2arwb5, $Vvyapc0zfcyf, $Vzvzlsqbnl5g, $V3nb02w01gr5arge, $V1zkflo3xrnp, $V4mu32x20q34);

        for ($V3xsptcgzss2 = 0, $V3nb02w01gr5en = count($VexmuntaqxdwNorm); $V3xsptcgzss2 < $V3nb02w01gr5en; $V3xsptcgzss2++) {
            $Vexmuntaqxdw[$V3xsptcgzss2][0] = $VexmuntaqxdwNorm[$V3xsptcgzss2][0] + $Vu5ffr5lmaj5;
            $Vexmuntaqxdw[$V3xsptcgzss2][1] = $VexmuntaqxdwNorm[$V3xsptcgzss2][1] + $Vvg2dh2arwb5;
            $Vexmuntaqxdw[$V3xsptcgzss2][2] = $VexmuntaqxdwNorm[$V3xsptcgzss2][2] + $Vu5ffr5lmaj5;
            $Vexmuntaqxdw[$V3xsptcgzss2][3] = $VexmuntaqxdwNorm[$V3xsptcgzss2][3] + $Vvg2dh2arwb5;
            $Vexmuntaqxdw[$V3xsptcgzss2][4] = $VexmuntaqxdwNorm[$V3xsptcgzss2][4] + $Vu5ffr5lmaj5;
            $Vexmuntaqxdw[$V3xsptcgzss2][5] = $VexmuntaqxdwNorm[$V3xsptcgzss2][5] + $Vvg2dh2arwb5;

            call_user_func_array(array($Vyjtkau4njyv, "bezierCurveTo"), $Vexmuntaqxdw[$V3xsptcgzss2]);
        }
    }

    function arcToSegments($Vcki4t4qmybsoX, $Vcki4t4qmybsoY, $Vvyapc0zfcyf, $Vzvzlsqbnl5g, $V3nb02w01gr5arge, $V1zkflo3xrnp, $V4mu32x20q34ateX)
    {
        $Vcki4t4qmybsh = $V4mu32x20q34ateX * M_PI / 180;
        $Vpupor2fxtp5 = sin($Vcki4t4qmybsh);
        $Vv03lfntnmczosTh = cos($Vcki4t4qmybsh);
        $Vr3po20a1vok = 0;
        $Vxuh5dk33uju = 0;

        $Vvyapc0zfcyf = abs($Vvyapc0zfcyf);
        $Vzvzlsqbnl5g = abs($Vzvzlsqbnl5g);

        $Vvrqfemeghic = -$Vv03lfntnmczosTh * $Vcki4t4qmybsoX * 0.5 - $Vpupor2fxtp5 * $Vcki4t4qmybsoY * 0.5;
        $Vvsvymcu0h2b = -$Vv03lfntnmczosTh * $Vcki4t4qmybsoY * 0.5 + $Vpupor2fxtp5 * $Vcki4t4qmybsoX * 0.5;
        $Vvyapc0zfcyf2 = $Vvyapc0zfcyf * $Vvyapc0zfcyf;
        $Vzvzlsqbnl5g2 = $Vzvzlsqbnl5g * $Vzvzlsqbnl5g;
        $Vvsvymcu0h2b2 = $Vvsvymcu0h2b * $Vvsvymcu0h2b;
        $Vvrqfemeghic2 = $Vvrqfemeghic * $Vvrqfemeghic;
        $Vpzsrb4px1fx = $Vvyapc0zfcyf2 * $Vzvzlsqbnl5g2 - $Vvyapc0zfcyf2 * $Vvsvymcu0h2b2 - $Vzvzlsqbnl5g2 * $Vvrqfemeghic2;
        $Vzlqynjxsspd = 0;

        if ($Vpzsrb4px1fx < 0) {
            $Vujweq34gtl3 = sqrt(1 - $Vpzsrb4px1fx / ($Vvyapc0zfcyf2 * $Vzvzlsqbnl5g2));
            $Vvyapc0zfcyf *= $Vujweq34gtl3;
            $Vzvzlsqbnl5g *= $Vujweq34gtl3;
        } else {
            $Vzlqynjxsspd = ($V3nb02w01gr5arge == $V1zkflo3xrnp ? -1.0 : 1.0) * sqrt($Vpzsrb4px1fx / ($Vvyapc0zfcyf2 * $Vvsvymcu0h2b2 + $Vzvzlsqbnl5g2 * $Vvrqfemeghic2));
        }

        $Vv03lfntnmczx = $Vzlqynjxsspd * $Vvyapc0zfcyf * $Vvsvymcu0h2b / $Vzvzlsqbnl5g;
        $Vv03lfntnmczy = -$Vzlqynjxsspd * $Vzvzlsqbnl5g * $Vvrqfemeghic / $Vvyapc0zfcyf;
        $Vv03lfntnmczx1 = $Vv03lfntnmczosTh * $Vv03lfntnmczx - $Vpupor2fxtp5 * $Vv03lfntnmczy + $Vcki4t4qmybsoX * 0.5;
        $Vv03lfntnmczy1 = $Vpupor2fxtp5 * $Vv03lfntnmczx + $Vv03lfntnmczosTh * $Vv03lfntnmczy + $Vcki4t4qmybsoY * 0.5;
        $Vstnsbem13gb = $Vcki4t4qmybshis->calcVectorAngle(1, 0, ($Vvrqfemeghic - $Vv03lfntnmczx) / $Vvyapc0zfcyf, ($Vvsvymcu0h2b - $Vv03lfntnmczy) / $Vzvzlsqbnl5g);
        $Vbqo0mplkqo0 = $Vcki4t4qmybshis->calcVectorAngle(($Vvrqfemeghic - $Vv03lfntnmczx) / $Vvyapc0zfcyf, ($Vvsvymcu0h2b - $Vv03lfntnmczy) / $Vzvzlsqbnl5g, (-$Vvrqfemeghic - $Vv03lfntnmczx) / $Vvyapc0zfcyf, (-$Vvsvymcu0h2b - $Vv03lfntnmczy) / $Vzvzlsqbnl5g);

        if ($V1zkflo3xrnp == 0 && $Vbqo0mplkqo0 > 0) {
            $Vbqo0mplkqo0 -= 2 * M_PI;
        } else {
            if ($V1zkflo3xrnp == 1 && $Vbqo0mplkqo0 < 0) {
                $Vbqo0mplkqo0 += 2 * M_PI;
            }
        }

        
        $Vujweq34gtl3egments = ceil(abs($Vbqo0mplkqo0 / M_PI * 2));
        $Vxrvbhqnqlwj = array();
        $V22v2dti43tn = $Vbqo0mplkqo0 / $Vujweq34gtl3egments;
        $Vqlflqvft3gj = 8 / 3 * sin($V22v2dti43tn / 4) * sin($V22v2dti43tn / 4) / sin($V22v2dti43tn / 2);
        $Vcki4t4qmybsh3 = $Vstnsbem13gb + $V22v2dti43tn;

        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vujweq34gtl3egments; $V3xsptcgzss2++) {
            $Vxrvbhqnqlwj[$V3xsptcgzss2] = $Vcki4t4qmybshis->segmentToBezier(
                $Vstnsbem13gb,
                $Vcki4t4qmybsh3,
                $Vv03lfntnmczosTh,
                $Vpupor2fxtp5,
                $Vvyapc0zfcyf,
                $Vzvzlsqbnl5g,
                $Vv03lfntnmczx1,
                $Vv03lfntnmczy1,
                $Vqlflqvft3gj,
                $Vr3po20a1vok,
                $Vxuh5dk33uju
            );
            $Vr3po20a1vok = $Vxrvbhqnqlwj[$V3xsptcgzss2][4];
            $Vxuh5dk33uju = $Vxrvbhqnqlwj[$V3xsptcgzss2][5];
            $Vstnsbem13gb = $Vcki4t4qmybsh3;
            $Vcki4t4qmybsh3 += $V22v2dti43tn;
        }

        return $Vxrvbhqnqlwj;
    }

    function segmentToBezier($Vcki4t4qmybsh2, $Vcki4t4qmybsh3, $Vv03lfntnmczosTh, $Vpupor2fxtp5, $Vvyapc0zfcyf, $Vzvzlsqbnl5g, $Vv03lfntnmczx1, $Vv03lfntnmczy1, $Vqlflqvft3gj, $Vr3po20a1vok, $Vxuh5dk33uju)
    {
        $Vv03lfntnmczosth2 = cos($Vcki4t4qmybsh2);
        $Vujweq34gtl3inth2 = sin($Vcki4t4qmybsh2);
        $Vv03lfntnmczosth3 = cos($Vcki4t4qmybsh3);
        $Vujweq34gtl3inth3 = sin($Vcki4t4qmybsh3);
        $Vcki4t4qmybsoX = $Vv03lfntnmczosTh * $Vvyapc0zfcyf * $Vv03lfntnmczosth3 - $Vpupor2fxtp5 * $Vzvzlsqbnl5g * $Vujweq34gtl3inth3 + $Vv03lfntnmczx1;
        $Vcki4t4qmybsoY = $Vpupor2fxtp5 * $Vvyapc0zfcyf * $Vv03lfntnmczosth3 + $Vv03lfntnmczosTh * $Vzvzlsqbnl5g * $Vujweq34gtl3inth3 + $Vv03lfntnmczy1;
        $Vv03lfntnmczp1X = $Vr3po20a1vok + $Vqlflqvft3gj * (-$Vv03lfntnmczosTh * $Vvyapc0zfcyf * $Vujweq34gtl3inth2 - $Vpupor2fxtp5 * $Vzvzlsqbnl5g * $Vv03lfntnmczosth2);
        $Vv03lfntnmczp1Y = $Vxuh5dk33uju + $Vqlflqvft3gj * (-$Vpupor2fxtp5 * $Vvyapc0zfcyf * $Vujweq34gtl3inth2 + $Vv03lfntnmczosTh * $Vzvzlsqbnl5g * $Vv03lfntnmczosth2);
        $Vv03lfntnmczp2X = $Vcki4t4qmybsoX + $Vqlflqvft3gj * ($Vv03lfntnmczosTh * $Vvyapc0zfcyf * $Vujweq34gtl3inth3 + $Vpupor2fxtp5 * $Vzvzlsqbnl5g * $Vv03lfntnmczosth3);
        $Vv03lfntnmczp2Y = $Vcki4t4qmybsoY + $Vqlflqvft3gj * ($Vpupor2fxtp5 * $Vvyapc0zfcyf * $Vujweq34gtl3inth3 - $Vv03lfntnmczosTh * $Vzvzlsqbnl5g * $Vv03lfntnmczosth3);

        return array(
            $Vv03lfntnmczp1X,
            $Vv03lfntnmczp1Y,
            $Vv03lfntnmczp2X,
            $Vv03lfntnmczp2Y,
            $Vcki4t4qmybsoX,
            $Vcki4t4qmybsoY
        );
    }

    function calcVectorAngle($Veztxrhnjjgw, $Vna0qo3dqg3a, $Vpep34v1a5ki, $Vipmhq5decau)
    {
        $Vcki4t4qmybsa = atan2($Vna0qo3dqg3a, $Veztxrhnjjgw);
        $Vcki4t4qmybsb = atan2($Vipmhq5decau, $Vpep34v1a5ki);
        if ($Vcki4t4qmybsb >= $Vcki4t4qmybsa) {
            return $Vcki4t4qmybsb - $Vcki4t4qmybsa;
        } else {
            return 2 * M_PI - ($Vcki4t4qmybsa - $Vcki4t4qmybsb);
        }
    }
}
