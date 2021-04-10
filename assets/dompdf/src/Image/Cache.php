<?php

namespace Dompdf\Image;

use Dompdf\Dompdf;
use Dompdf\Helpers;
use Dompdf\Exception\ImageException;


class Cache
{
    
    protected static $Vigava0jmjch = array();

    
    public static $Vp4dew3xrbtu = "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABABAMAAABYR2ztAAAAA3NCSVQICAjb4U/gAAAAHlBMVEWZmZn////g4OCkpKS1tbXv7++9vb2tra3m5ub5+fkFnN6oAAAACXBIWXMAAAsSAAALEgHS3X78AAAAHHRFWHRTb2Z0d2FyZQBBZG9iZSBGaXJld29ya3MgQ1M0BrLToAAAABZ0RVh0Q3JlYXRpb24gVGltZQAwNC8xMi8xMRPnI58AAAGZSURBVEiJhZbPasMwDMbTw2DHKhDQcbDQPsEge4BAjg0Mxh5gkBcY7Niwkpx32PvOjv9JspX60It/+fxJsqxW1b11gN11rA7N3v6vAd5nfR9fDYCTDiyzAeA6qgKd9QDNoAtsAKyKCxzAAfhdBuyHGwC3oovNvQOaxxJwnSNg3ZQFAlBy4ax7AG6ZBLrgA5Cn038SAPgREiaJHJASwXYEhEQQIACyikTTCWCBJJoANBfpPAKQdBLHFMBYkctcBKIE9lAGggt6gRjgA2GV44CL7m1WgS08fAAdsPHxyyMAIyHujgRwEldHArCKy5cBz90+gNOyf8TTyKOUQN2LPEmgnWWPcKD+sr+rnuqTK1avAcHfRSv3afTgVAbqmCPiggLtGM8aSkBNOidVjADrmIDYebT1PoGsWJEE8Oc0b96aZoe4iMBZPiADB6RAzEUA2vwRmyiAL3Lfv6MBSEmUEg7ALt/3LhxwLgj4QNw4UCbKEsaBNpPsyRbgVRASFig78BIGyJNIJQyQTwIi0RvgT98H+Mi6W67j3X8H/427u5bfpQGVAAAAAElFTkSuQmCC";

    public static $Vkfwsmm4gtoh = "Image not found or type unknown";

    
    protected static $V3mbiykvshg0;

    
    static function resolve_url($Vsp0omgzz2yw, $V3i5fom43o3t, $Vg5lte3qjxow, $Vrwgzxrfmage, Dompdf $Vhvghaoacagz)
    {
        self::$V3mbiykvshg0 = $Vhvghaoacagz;

        $V3i5fom43o3t = mb_strtolower($V3i5fom43o3t);
        $Vvqnovizplzf = Helpers::explode_url($Vsp0omgzz2yw);
        $Vw4u5rrepkk1 = null;

        $Vrsifeyws0e5 = ($V3i5fom43o3t && $V3i5fom43o3t !== "file://") || ($Vvqnovizplzf['protocol'] != "");

        $V32cio3rrjla = strpos($Vvqnovizplzf['protocol'], "data:") === 0;
        $V5rxfglbslgm = null;
        $Vm1dtck3lyc2 = $Vhvghaoacagz->getOptions()->getIsRemoteEnabled();

        try {

            
            if (!$Vm1dtck3lyc2 && $Vrsifeyws0e5 && !$V32cio3rrjla) {
                throw new ImageException("Remote file access is disabled.", E_WARNING);
            } 
            else {
                if ($Vm1dtck3lyc2 && $Vrsifeyws0e5 || $V32cio3rrjla) {
                    
                    $V5rxfglbslgm = Helpers::build_url($V3i5fom43o3t, $Vg5lte3qjxow, $Vrwgzxrfmage, $Vsp0omgzz2yw);

                    
                    if (isset(self::$Vigava0jmjch[$V5rxfglbslgm])) {
                        $Vqwtsunw2bt1 = self::$Vigava0jmjch[$V5rxfglbslgm];
                    } 
                    else {
                        $Vwly5twschnk = $Vhvghaoacagz->getOptions()->getTempDir();
                        $Vqwtsunw2bt1 = tempnam($Vwly5twschnk, "ca_dompdf_img_");
                        $Vnxkvrc5q2ng = "";

                        if ($V32cio3rrjla) {
                            if ($Vy4pubmfjlhm = Helpers::parse_data_uri($Vsp0omgzz2yw)) {
                                $Vnxkvrc5q2ng = $Vy4pubmfjlhm['data'];
                            }
                        } else {
                            list($Vnxkvrc5q2ng, $http_response_header) = Helpers::getFileContent($V5rxfglbslgm, $Vhvghaoacagz->getHttpContext());
                        }

                        
                        if (strlen($Vnxkvrc5q2ng) == 0) {
                            $Vmgxrjtj0g2j = ($V32cio3rrjla ? "Data-URI could not be parsed" : "Image not found");
                            throw new ImageException($Vmgxrjtj0g2j, E_WARNING);
                        } 
                        else {
                            
                            
                            
                            
                            
                            file_put_contents($Vqwtsunw2bt1, $Vnxkvrc5q2ng);
                        }
                    }
                } 
                else {
                    $Vqwtsunw2bt1 = Helpers::build_url($V3i5fom43o3t, $Vg5lte3qjxow, $Vrwgzxrfmage, $Vsp0omgzz2yw);
                }
            }

            
            if (!is_readable($Vqwtsunw2bt1) || !filesize($Vqwtsunw2bt1)) {
                throw new ImageException("Image not readable or empty", E_WARNING);
            } 
            else {
                list($Vztt3qdrrikx, $Vku40chc0ddp, $Vxeifmjzikkj) = Helpers::dompdf_getimagesize($Vqwtsunw2bt1, $Vhvghaoacagz->getHttpContext());

                
                if ($Vztt3qdrrikx && $Vku40chc0ddp && in_array($Vxeifmjzikkj, array("gif", "png", "jpeg", "bmp", "svg"))) {
                    
                    
                    if ($Vm1dtck3lyc2 && $Vrsifeyws0e5 || $V32cio3rrjla) {
                        self::$Vigava0jmjch[$V5rxfglbslgm] = $Vqwtsunw2bt1;
                    }
                } 
                else {
                    throw new ImageException("Image type unknown", E_WARNING);
                }
            }
        } catch (ImageException $V2bwrjburyuf) {
            $Vqwtsunw2bt1 = self::$Vp4dew3xrbtu;
            $Vxeifmjzikkj = "png";
            $Vw4u5rrepkk1 = self::$Vkfwsmm4gtoh;
            Helpers::record_warnings($V2bwrjburyuf->getCode(), $V2bwrjburyuf->getMessage() . " \n $Vsp0omgzz2yw", $V2bwrjburyuf->getFile(), $V2bwrjburyuf->getLine());
        }

        return array($Vqwtsunw2bt1, $Vxeifmjzikkj, $Vw4u5rrepkk1);
    }

    
    static function clear()
    {
        if (empty(self::$Vigava0jmjch) || self::$V3mbiykvshg0->getOptions()->getDebugKeepTemp()) {
            return;
        }

        foreach (self::$Vigava0jmjch as $Vtkhurg4sowd) {
            if (self::$V3mbiykvshg0->getOptions()->getDebugPng()) {
                print "[clear unlink $Vtkhurg4sowd]";
            }
            unlink($Vtkhurg4sowd);
        }

        self::$Vigava0jmjch = array();
    }

    static function detect_type($Vtkhurg4sowd, $V0skazf5h5xa = null)
    {
        list(, , $Vxeifmjzikkj) = Helpers::dompdf_getimagesize($Vtkhurg4sowd, $V0skazf5h5xa);

        return $Vxeifmjzikkj;
    }

    static function is_broken($Vsp0omgzz2yw)
    {
        return $Vsp0omgzz2yw === self::$Vp4dew3xrbtu;
    }
}

if (file_exists(realpath(__DIR__ . "/../../lib/res/broken_image.png"))) {
    Cache::$Vp4dew3xrbtu = realpath(__DIR__ . "/../../lib/res/broken_image.png");
}
