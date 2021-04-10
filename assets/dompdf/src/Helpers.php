<?php
namespace Dompdf;

class Helpers
{
    
    public static function pre_r($Vgsmtcmr0fdv, $V10rd4cdsrnu = false)
    {
        if ($V10rd4cdsrnu) {
            return "<pre>" . print_r($Vgsmtcmr0fdv, true) . "</pre>";
        }

        if (php_sapi_name() !== "cli") {
            echo "<pre>";
        }

        print_r($Vgsmtcmr0fdv);

        if (php_sapi_name() !== "cli") {
            echo "</pre>";
        } else {
            echo "\n";
        }

        flush();

        return null;
    }

      
    public static function build_url($V3i5fom43o3t, $Vg5lte3qjxow, $Vrwgzxrfmage, $Vsp0omgzz2yw)
    {
        $V3i5fom43o3t = mb_strtolower($V3i5fom43o3t);
        if (strlen($Vsp0omgzz2yw) == 0) {
            
            return $V3i5fom43o3t . $Vg5lte3qjxow . $Vrwgzxrfmage;
        }

        
        if (mb_strpos($Vsp0omgzz2yw, "://") !== false || mb_substr($Vsp0omgzz2yw, 0, 1) === "#" || mb_strpos($Vsp0omgzz2yw, "data:") === 0 || mb_strpos($Vsp0omgzz2yw, "mailto:") === 0) {
            return $Vsp0omgzz2yw;
        }

        $Vc00k54nbbvf = $V3i5fom43o3t;

        if (!in_array(mb_strtolower($V3i5fom43o3t), array("http://", "https://", "ftp://", "ftps://"))) {
            
            
            
            
            if ($Vsp0omgzz2yw[0] !== '/' && (strtoupper(substr(PHP_OS, 0, 3)) !== 'WIN' || (mb_strlen($Vsp0omgzz2yw) > 1 && $Vsp0omgzz2yw[0] !== '\\' && $Vsp0omgzz2yw[1] !== ':'))) {
                
                $Vc00k54nbbvf .= realpath($Vrwgzxrfmage) . '/';
            }
            $Vc00k54nbbvf .= $Vsp0omgzz2yw;
            $Vc00k54nbbvf = preg_replace('/\?(.*)$/', "", $Vc00k54nbbvf);
            return $Vc00k54nbbvf;
        }

        
        if (strpos($Vsp0omgzz2yw, '//') === 0) {
            $Vc00k54nbbvf .= substr($Vsp0omgzz2yw, 2);
            
        } elseif ($Vsp0omgzz2yw[0] === '/' || $Vsp0omgzz2yw[0] === '\\') {
            
            $Vc00k54nbbvf .= $Vg5lte3qjxow . $Vsp0omgzz2yw;
        } else {
            
            
            $Vc00k54nbbvf .= $Vg5lte3qjxow . $Vrwgzxrfmage . $Vsp0omgzz2yw;
        }

        return $Vc00k54nbbvf;
    }

    
    public static function buildContentDispositionHeader($V0jrqoexftpy, $Vaqmmjdxljsi)
    {
        $Vgpqcvfkvgzo = mb_detect_encoding($Vaqmmjdxljsi);
        $V1dqjmexh5hm = mb_convert_encoding($Vaqmmjdxljsi, "ISO-8859-1", $Vgpqcvfkvgzo);
        $V1dqjmexh5hm = str_replace("\"", "", $V1dqjmexh5hm);
        $V3z01rts5dgi = rawurlencode($Vaqmmjdxljsi);

        $Vv05g4znxv4g = "Content-Disposition: $V0jrqoexftpy; filename=\"$V1dqjmexh5hm\"";
        if ($V1dqjmexh5hm !== $Vaqmmjdxljsi) {
            $Vv05g4znxv4g .= "; filename*=UTF-8''$V3z01rts5dgi";
        }

        return $Vv05g4znxv4g;
    }

    
    public static function dec2roman($Vxnixw2qni35)
    {

        static $Vcchekcffllu = array("", "i", "ii", "iii", "iv", "v", "vi", "vii", "viii", "ix");
        static $Vlruiaps5xah = array("", "x", "xx", "xxx", "xl", "l", "lx", "lxx", "lxxx", "xc");
        static $V30mjmi4kklp = array("", "c", "cc", "ccc", "cd", "d", "dc", "dcc", "dccc", "cm");
        static $Vhrsz5kfzz3z = array("", "m", "mm", "mmm");

        if (!is_numeric($Vxnixw2qni35)) {
            throw new Exception("dec2roman() requires a numeric argument.");
        }

        if ($Vxnixw2qni35 > 4000 || $Vxnixw2qni35 < 0) {
            return "(out of range)";
        }

        $Vxnixw2qni35 = strrev((string)$Vxnixw2qni35);

        $Vc00k54nbbvf = "";
        switch (mb_strlen($Vxnixw2qni35)) {
            
            case 4:
                $Vc00k54nbbvf .= $Vhrsz5kfzz3z[$Vxnixw2qni35[3]];
            
            case 3:
                $Vc00k54nbbvf .= $V30mjmi4kklp[$Vxnixw2qni35[2]];
            
            case 2:
                $Vc00k54nbbvf .= $Vlruiaps5xah[$Vxnixw2qni35[1]];
            
            case 1:
                $Vc00k54nbbvf .= $Vcchekcffllu[$Vxnixw2qni35[0]];
            default:
                break;
        }

        return $Vc00k54nbbvf;
    }

    
    public static function is_percent($Vqfra35f14fv)
    {
        return false !== mb_strpos($Vqfra35f14fv, "%");
    }

    
    public static function parse_data_uri($V32cio3rrjla)
    {
        if (!preg_match('/^data:(?P<mime>[a-z0-9\/+-.]+)(;charset=(?P<charset>[a-z0-9-])+)?(?P<base64>;base64)?\,(?P<data>.*)?/is', $V32cio3rrjla, $Vyupu15qqw5c)) {
            return false;
        }

        $Vyupu15qqw5c['data'] = rawurldecode($Vyupu15qqw5c['data']);
        $Vxrvbhqnqlwj = array(
            'charset' => $Vyupu15qqw5c['charset'] ? $Vyupu15qqw5c['charset'] : 'US-ASCII',
            'mime' => $Vyupu15qqw5c['mime'] ? $Vyupu15qqw5c['mime'] : 'text/plain',
            'data' => $Vyupu15qqw5c['base64'] ? base64_decode($Vyupu15qqw5c['data']) : $Vyupu15qqw5c['data'],
        );

        return $Vxrvbhqnqlwj;
    }

    
    public static function encodeURI($Vqnvjr1nxmrx) {
        $V0o10vxmbakz = array(
            '%2D'=>'-','%5F'=>'_','%2E'=>'.','%21'=>'!', '%7E'=>'~',
            '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')'
        );
        $Vtrkbbsioceq = array(
            '%3B'=>';','%2C'=>',','%2F'=>'/','%3F'=>'?','%3A'=>':',
            '%40'=>'@','%26'=>'&','%3D'=>'=','%2B'=>'+','%24'=>'$'
        );
        $Vm04ow3mq0ey = array(
            '%23'=>'#'
        );
        return strtr(rawurlencode(rawurldecode($Vqnvjr1nxmrx)), array_merge($Vtrkbbsioceq,$V0o10vxmbakz,$Vm04ow3mq0ey));
    }

    
    public static function rle8_decode($Vadkcwffkfxw, $Vztt3qdrrikx)
    {
        $V5aewge25emw = $Vztt3qdrrikx + (3 - ($Vztt3qdrrikx - 1) % 4);
        $Vpu0eaxrabtr = '';
        $Vrhfdosod533 = strlen($Vadkcwffkfxw);

        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vrhfdosod533; $V3xsptcgzss2++) {
            $Vsz1vjk4tj2c = ord($Vadkcwffkfxw[$V3xsptcgzss2]);
            switch ($Vsz1vjk4tj2c) {
                case 0: # ESCAPE
                    $V3xsptcgzss2++;
                    switch (ord($Vadkcwffkfxw[$V3xsptcgzss2])) {
                        case 0: # NEW LINE
                            $Vvovolipqbje = $V5aewge25emw - strlen($Vpu0eaxrabtr) % $V5aewge25emw;
                            if ($Vvovolipqbje < $V5aewge25emw) {
                                $Vpu0eaxrabtr .= str_repeat(chr(0), $Vvovolipqbje); # pad line
                            }
                            break;
                        case 1: # END OF FILE
                            $Vvovolipqbje = $V5aewge25emw - strlen($Vpu0eaxrabtr) % $V5aewge25emw;
                            if ($Vvovolipqbje < $V5aewge25emw) {
                                $Vpu0eaxrabtr .= str_repeat(chr(0), $Vvovolipqbje); # pad line
                            }
                            break 3;
                        case 2: # DELTA
                            $V3xsptcgzss2 += 2;
                            break;
                        default: # ABSOLUTE MODE
                            $Vxnixw2qni35 = ord($Vadkcwffkfxw[$V3xsptcgzss2]);
                            for ($V0hg12l10vfx = 0; $V0hg12l10vfx < $Vxnixw2qni35; $V0hg12l10vfx++) {
                                $Vpu0eaxrabtr .= $Vadkcwffkfxw[++$V3xsptcgzss2];
                            }
                            if ($Vxnixw2qni35 % 2) {
                                $V3xsptcgzss2++;
                            }
                    }
                    break;
                default:
                    $Vpu0eaxrabtr .= str_repeat($Vadkcwffkfxw[++$V3xsptcgzss2], $Vsz1vjk4tj2c);
            }
        }
        return $Vpu0eaxrabtr;
    }

    
    public static function rle4_decode($Vadkcwffkfxw, $Vztt3qdrrikx)
    {
        $Vhoifq2kocyt = floor($Vztt3qdrrikx / 2) + ($Vztt3qdrrikx % 2);
        $V5aewge25emw = $Vhoifq2kocyt + (3 - (($Vztt3qdrrikx - 1) / 2) % 4);
        $V4l4wtjpubho = array();
        $Vrhfdosod533 = strlen($Vadkcwffkfxw);
        $Vv03lfntnmcz = 0;

        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vrhfdosod533; $V3xsptcgzss2++) {
            $Vsz1vjk4tj2c = ord($Vadkcwffkfxw[$V3xsptcgzss2]);
            switch ($Vsz1vjk4tj2c) {
                case 0: # ESCAPE
                    $V3xsptcgzss2++;
                    switch (ord($Vadkcwffkfxw[$V3xsptcgzss2])) {
                        case 0: # NEW LINE
                            while (count($V4l4wtjpubho) % $V5aewge25emw != 0) {
                                $V4l4wtjpubho[] = 0;
                            }
                            break;
                        case 1: # END OF FILE
                            while (count($V4l4wtjpubho) % $V5aewge25emw != 0) {
                                $V4l4wtjpubho[] = 0;
                            }
                            break 3;
                        case 2: # DELTA
                            $V3xsptcgzss2 += 2;
                            break;
                        default: # ABSOLUTE MODE
                            $Vxnixw2qni35 = ord($Vadkcwffkfxw[$V3xsptcgzss2]);
                            for ($V0hg12l10vfx = 0; $V0hg12l10vfx < $Vxnixw2qni35; $V0hg12l10vfx++) {
                                if ($V0hg12l10vfx % 2 == 0) {
                                    $Vv03lfntnmcz = ord($Vadkcwffkfxw[++$V3xsptcgzss2]);
                                    $V4l4wtjpubho[] = ($Vv03lfntnmcz & 240) >> 4;
                                } else {
                                    $V4l4wtjpubho[] = $Vv03lfntnmcz & 15;
                                }
                            }

                            if ($Vxnixw2qni35 % 2 == 0) {
                                $V3xsptcgzss2++;
                            }
                    }
                    break;
                default:
                    $Vv03lfntnmcz = ord($Vadkcwffkfxw[++$V3xsptcgzss2]);
                    for ($V0hg12l10vfx = 0; $V0hg12l10vfx < $Vsz1vjk4tj2c; $V0hg12l10vfx++) {
                        $V4l4wtjpubho[] = ($V0hg12l10vfx % 2 == 0 ? ($Vv03lfntnmcz & 240) >> 4 : $Vv03lfntnmcz & 15);
                    }
            }
        }

        $Vpu0eaxrabtr = '';
        if (count($V4l4wtjpubho) % 2) {
            $V4l4wtjpubho[] = 0;
        }

        $Vrhfdosod533 = count($V4l4wtjpubho) / 2;

        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vrhfdosod533; $V3xsptcgzss2++) {
            $Vpu0eaxrabtr .= chr(16 * $V4l4wtjpubho[2 * $V3xsptcgzss2] + $V4l4wtjpubho[2 * $V3xsptcgzss2 + 1]);
        }

        return $Vpu0eaxrabtr;
    }

    
    public static function explode_url($Vsp0omgzz2yw)
    {
        $V3i5fom43o3t = "";
        $Vg5lte3qjxow = "";
        $Vio2vixcckdr = "";
        $Vtkhurg4sowd = "";

        $Vnr1h2vcbxvj = parse_url($Vsp0omgzz2yw);
        if ( isset($Vnr1h2vcbxvj["scheme"]) ) {
            $Vnr1h2vcbxvj["scheme"] = mb_strtolower($Vnr1h2vcbxvj["scheme"]);
        }

        
        if (isset($Vnr1h2vcbxvj["scheme"]) && $Vnr1h2vcbxvj["scheme"] !== "file" && strlen($Vnr1h2vcbxvj["scheme"]) > 1) {
            $V3i5fom43o3t = $Vnr1h2vcbxvj["scheme"] . "://";

            if (isset($Vnr1h2vcbxvj["user"])) {
                $Vg5lte3qjxow .= $Vnr1h2vcbxvj["user"];

                if (isset($Vnr1h2vcbxvj["pass"])) {
                    $Vg5lte3qjxow .= ":" . $Vnr1h2vcbxvj["pass"];
                }

                $Vg5lte3qjxow .= "@";
            }

            if (isset($Vnr1h2vcbxvj["host"])) {
                $Vg5lte3qjxow .= $Vnr1h2vcbxvj["host"];
            }

            if (isset($Vnr1h2vcbxvj["port"])) {
                $Vg5lte3qjxow .= ":" . $Vnr1h2vcbxvj["port"];
            }

            if (isset($Vnr1h2vcbxvj["path"]) && $Vnr1h2vcbxvj["path"] !== "") {
                
                if ($Vnr1h2vcbxvj["path"][mb_strlen($Vnr1h2vcbxvj["path"]) - 1] === "/") {
                    $Vio2vixcckdr = $Vnr1h2vcbxvj["path"];
                    $Vtkhurg4sowd = "";
                } else {
                    $Vio2vixcckdr = rtrim(dirname($Vnr1h2vcbxvj["path"]), '/\\') . "/";
                    $Vtkhurg4sowd = basename($Vnr1h2vcbxvj["path"]);
                }
            }

            if (isset($Vnr1h2vcbxvj["query"])) {
                $Vtkhurg4sowd .= "?" . $Vnr1h2vcbxvj["query"];
            }

            if (isset($Vnr1h2vcbxvj["fragment"])) {
                $Vtkhurg4sowd .= "#" . $Vnr1h2vcbxvj["fragment"];
            }

        } else {

            $V3xsptcgzss2 = mb_stripos($Vsp0omgzz2yw, "file://");
            if ($V3xsptcgzss2 !== false) {
                $Vsp0omgzz2yw = mb_substr($Vsp0omgzz2yw, $V3xsptcgzss2 + 7);
            }

            $V3i5fom43o3t = ""; 
            

            $Vg5lte3qjxow = ""; 
            $Vtkhurg4sowd = basename($Vsp0omgzz2yw);

            $Vio2vixcckdr = dirname($Vsp0omgzz2yw);

            
            if ($Vio2vixcckdr !== false) {
                $Vio2vixcckdr .= '/';

            } else {
                
                $V3i5fom43o3t = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://';

                $Vg5lte3qjxow = isset($_SERVER["HTTP_HOST"]) ? $_SERVER["HTTP_HOST"] : php_uname("n");

                if (substr($Vnr1h2vcbxvj["path"], 0, 1) === '/') {
                    $Vio2vixcckdr = dirname($Vnr1h2vcbxvj["path"]);
                } else {
                    $Vio2vixcckdr = '/' . rtrim(dirname($_SERVER["SCRIPT_NAME"]), '/') . '/' . $Vnr1h2vcbxvj["path"];
                }
            }
        }

        $Vc00k54nbbvf = array($V3i5fom43o3t, $Vg5lte3qjxow, $Vio2vixcckdr, $Vtkhurg4sowd,
            "protocol" => $V3i5fom43o3t,
            "host" => $Vg5lte3qjxow,
            "path" => $Vio2vixcckdr,
            "file" => $Vtkhurg4sowd);
        return $Vc00k54nbbvf;
    }

    
    public static function dompdf_debug($Vxeifmjzikkj, $Vmgxrjtj0g2j)
    {
        global $V2nakebusgxe, $Vect0zfyvf0c, $Vmbd53y4vbxc;
        if (isset($V2nakebusgxe[$Vxeifmjzikkj]) && ($Vect0zfyvf0c || $Vmbd53y4vbxc)) {
            $Vnr1h2vcbxvj = debug_backtrace();

            echo basename($Vnr1h2vcbxvj[0]["file"]) . " (" . $Vnr1h2vcbxvj[0]["line"] . "): " . $Vnr1h2vcbxvj[1]["function"] . ": ";
            Helpers::pre_r($Vmgxrjtj0g2j);
        }
    }

    
    public static function record_warnings($Vvaa0q1sfn5f, $Vc05nx4aidck, $Vb4xxsjbg1i1, $Vhich3d2h0i1)
    {
        
        if (!($Vvaa0q1sfn5f & (E_WARNING | E_NOTICE | E_USER_NOTICE | E_USER_WARNING))) {
            throw new Exception($Vc05nx4aidck . " $Vvaa0q1sfn5f");
        }

        global $Vzm5jqiedkr4;
        global $Vect0zfyvf0c;

        if ($Vect0zfyvf0c) {
            echo $Vc05nx4aidck . "\n";
        }

        $Vzm5jqiedkr4[] = $Vc05nx4aidck;
    }

    
    public static function unichr($Vv03lfntnmcz)
    {
        if ($Vv03lfntnmcz <= 0x7F) {
            return chr($Vv03lfntnmcz);
        } else if ($Vv03lfntnmcz <= 0x7FF) {
            return chr(0xC0 | $Vv03lfntnmcz >> 6) . chr(0x80 | $Vv03lfntnmcz & 0x3F);
        } else if ($Vv03lfntnmcz <= 0xFFFF) {
            return chr(0xE0 | $Vv03lfntnmcz >> 12) . chr(0x80 | $Vv03lfntnmcz >> 6 & 0x3F)
            . chr(0x80 | $Vv03lfntnmcz & 0x3F);
        } else if ($Vv03lfntnmcz <= 0x10FFFF) {
            return chr(0xF0 | $Vv03lfntnmcz >> 18) . chr(0x80 | $Vv03lfntnmcz >> 12 & 0x3F)
            . chr(0x80 | $Vv03lfntnmcz >> 6 & 0x3F)
            . chr(0x80 | $Vv03lfntnmcz & 0x3F);
        }
        return false;
    }

    
    public static function cmyk_to_rgb($Vv03lfntnmcz, $V5wavc1ylt2i = null, $Vopgub02o3q2 = null, $Vgu5dsd35kdp = null)
    {
        if (is_array($Vv03lfntnmcz)) {
            list($Vv03lfntnmcz, $V5wavc1ylt2i, $Vopgub02o3q2, $Vgu5dsd35kdp) = $Vv03lfntnmcz;
        }

        $Vv03lfntnmcz *= 255;
        $V5wavc1ylt2i *= 255;
        $Vopgub02o3q2 *= 255;
        $Vgu5dsd35kdp *= 255;

        $Vkabkv5ip0kg = (1 - round(2.55 * ($Vv03lfntnmcz + $Vgu5dsd35kdp)));
        $Vg5wspvkpf2e = (1 - round(2.55 * ($V5wavc1ylt2i + $Vgu5dsd35kdp)));
        $Vbz3vmbr1h2v = (1 - round(2.55 * ($Vopgub02o3q2 + $Vgu5dsd35kdp)));

        if ($Vkabkv5ip0kg < 0) {
            $Vkabkv5ip0kg = 0;
        }
        if ($Vg5wspvkpf2e < 0) {
            $Vg5wspvkpf2e = 0;
        }
        if ($Vbz3vmbr1h2v < 0) {
            $Vbz3vmbr1h2v = 0;
        }

        return array(
            $Vkabkv5ip0kg, $Vg5wspvkpf2e, $Vbz3vmbr1h2v,
            "r" => $Vkabkv5ip0kg, "g" => $Vg5wspvkpf2e, "b" => $Vbz3vmbr1h2v
        );
    }

    
    public static function dompdf_getimagesize($Vaqmmjdxljsi, $Vv03lfntnmczontext = null)
    {
        static $Vv03lfntnmczache = array();

        if (isset($Vv03lfntnmczache[$Vaqmmjdxljsi])) {
            return $Vv03lfntnmczache[$Vaqmmjdxljsi];
        }

        list($Vztt3qdrrikx, $Vku40chc0ddp, $Vxeifmjzikkj) = getimagesize($Vaqmmjdxljsi);

        
        $Vxeifmjzikkjs = array(
            IMAGETYPE_JPEG => "jpeg",
            IMAGETYPE_GIF  => "gif",
            IMAGETYPE_BMP  => "bmp",
            IMAGETYPE_PNG  => "png",
        );

        $Vxeifmjzikkj = isset($Vxeifmjzikkjs[$Vxeifmjzikkj]) ? $Vxeifmjzikkjs[$Vxeifmjzikkj] : null;

        if ($Vztt3qdrrikx == null || $Vku40chc0ddp == null) {
            list($Vb3z3shnu1vn, $Vebqaigzmksq) = Helpers::getFileContent($Vaqmmjdxljsi, $Vv03lfntnmczontext);

            if (substr($Vb3z3shnu1vn, 0, 2) === "BM") {
                $V5wavc1ylt2ieta = unpack('vtype/Vfilesize/Vreserved/Voffset/Vheadersize/Vwidth/Vheight', $Vb3z3shnu1vn);
                $Vztt3qdrrikx = (int)$V5wavc1ylt2ieta['width'];
                $Vku40chc0ddp = (int)$V5wavc1ylt2ieta['height'];
                $Vxeifmjzikkj = "bmp";
            }
            else {
                if (strpos($Vb3z3shnu1vn, "<svg") !== false) {
                    $V4qtyvi2vak4 = new \Svg\Document();
                    $V4qtyvi2vak4->loadFile($Vaqmmjdxljsi);

                    list($Vztt3qdrrikx, $Vku40chc0ddp) = $V4qtyvi2vak4->getDimensions();
                    $Vxeifmjzikkj = "svg";
                }
            }

        }

        return $Vv03lfntnmczache[$Vaqmmjdxljsi] = array($Vztt3qdrrikx, $Vku40chc0ddp, $Vxeifmjzikkj);
    }

    
    public static function imagecreatefrombmp($Vaqmmjdxljsi, $Vv03lfntnmczontext = null)
    {
        if (!function_exists("imagecreatetruecolor")) {
            trigger_error("The PHP GD extension is required, but is not installed.", E_ERROR);
            return false;
        }

        
        if (!($V23aw3elgvet = fopen($Vaqmmjdxljsi, 'rb'))) {
            trigger_error('imagecreatefrombmp: Can not open ' . $Vaqmmjdxljsi, E_USER_WARNING);
            return false;
        }

        $Vbz3vmbr1h2vytes_read = 0;

        
        $V5wavc1ylt2ieta = unpack('vtype/Vfilesize/Vreserved/Voffset', fread($V23aw3elgvet, 14));

        
        if ($V5wavc1ylt2ieta['type'] != 19778) {
            trigger_error('imagecreatefrombmp: ' . $Vaqmmjdxljsi . ' is not a bitmap!', E_USER_WARNING);
            return false;
        }

        
        $V5wavc1ylt2ieta += unpack('Vheadersize/Vwidth/Vheight/vplanes/vbits/Vcompression/Vimagesize/Vxres/Vyres/Vcolors/Vimportant', fread($V23aw3elgvet, 40));
        $Vbz3vmbr1h2vytes_read += 40;

        
        if ($V5wavc1ylt2ieta['compression'] == 3) {
            $V5wavc1ylt2ieta += unpack('VrMask/VgMask/VbMask', fread($V23aw3elgvet, 12));
            $Vbz3vmbr1h2vytes_read += 12;
        }

        
        $V5wavc1ylt2ieta['bytes'] = $V5wavc1ylt2ieta['bits'] / 8;
        $V5wavc1ylt2ieta['decal'] = 4 - (4 * (($V5wavc1ylt2ieta['width'] * $V5wavc1ylt2ieta['bytes'] / 4) - floor($V5wavc1ylt2ieta['width'] * $V5wavc1ylt2ieta['bytes'] / 4)));
        if ($V5wavc1ylt2ieta['decal'] == 4) {
            $V5wavc1ylt2ieta['decal'] = 0;
        }

        
        if ($V5wavc1ylt2ieta['imagesize'] < 1) {
            $V5wavc1ylt2ieta['imagesize'] = $V5wavc1ylt2ieta['filesize'] - $V5wavc1ylt2ieta['offset'];
            
            if ($V5wavc1ylt2ieta['imagesize'] < 1) {
                $V5wavc1ylt2ieta['imagesize'] = @filesize($Vaqmmjdxljsi) - $V5wavc1ylt2ieta['offset'];
                if ($V5wavc1ylt2ieta['imagesize'] < 1) {
                    trigger_error('imagecreatefrombmp: Can not obtain filesize of ' . $Vaqmmjdxljsi . '!', E_USER_WARNING);
                    return false;
                }
            }
        }

        
        $V5wavc1ylt2ieta['colors'] = !$V5wavc1ylt2ieta['colors'] ? pow(2, $V5wavc1ylt2ieta['bits']) : $V5wavc1ylt2ieta['colors'];

        
        $Vdh1ynponut5 = array();
        if ($V5wavc1ylt2ieta['bits'] < 16) {
            $Vdh1ynponut5 = unpack('l' . $V5wavc1ylt2ieta['colors'], fread($V23aw3elgvet, $V5wavc1ylt2ieta['colors'] * 4));
            
            if ($Vdh1ynponut5[1] < 0) {
                foreach ($Vdh1ynponut5 as $V3xsptcgzss2 => $Vv03lfntnmczolor) {
                    $Vdh1ynponut5[$V3xsptcgzss2] = $Vv03lfntnmczolor + 16777216;
                }
            }
        }

        
        if ($V5wavc1ylt2ieta['headersize'] > $Vbz3vmbr1h2vytes_read) {
            fread($V23aw3elgvet, $V5wavc1ylt2ieta['headersize'] - $Vbz3vmbr1h2vytes_read);
        }

        
        $V3xsptcgzss2m = imagecreatetruecolor($V5wavc1ylt2ieta['width'], $V5wavc1ylt2ieta['height']);
        $Vb3z3shnu1vn = fread($V23aw3elgvet, $V5wavc1ylt2ieta['imagesize']);

        
        switch ($V5wavc1ylt2ieta['compression']) {
            case 1:
                $Vb3z3shnu1vn = Helpers::rle8_decode($Vb3z3shnu1vn, $V5wavc1ylt2ieta['width']);
                break;
            case 2:
                $Vb3z3shnu1vn = Helpers::rle4_decode($Vb3z3shnu1vn, $V5wavc1ylt2ieta['width']);
                break;
        }

        $Vksopkgqixky = 0;
        $Vd155fmh5hnd = chr(0);
        $Vopgub02o3q2 = $V5wavc1ylt2ieta['height'] - 1;
        $V4eft4yxa3zs = 'imagecreatefrombmp: ' . $Vaqmmjdxljsi . ' has not enough data!';

        
        while ($Vopgub02o3q2 >= 0) {
            $Vs4gloy23a1d = 0;
            while ($Vs4gloy23a1d < $V5wavc1ylt2ieta['width']) {
                switch ($V5wavc1ylt2ieta['bits']) {
                    case 32:
                    case 24:
                        if (!($Vksopkgqixkyart = substr($Vb3z3shnu1vn, $Vksopkgqixky, 3 ))) {
                            trigger_error($V4eft4yxa3zs, E_USER_WARNING);
                            return $V3xsptcgzss2m;
                        }
                        $Vv03lfntnmczolor = unpack('V', $Vksopkgqixkyart . $Vd155fmh5hnd);
                        break;
                    case 16:
                        if (!($Vksopkgqixkyart = substr($Vb3z3shnu1vn, $Vksopkgqixky, 2 ))) {
                            trigger_error($V4eft4yxa3zs, E_USER_WARNING);
                            return $V3xsptcgzss2m;
                        }
                        $Vv03lfntnmczolor = unpack('v', $Vksopkgqixkyart);

                        if (empty($V5wavc1ylt2ieta['rMask']) || $V5wavc1ylt2ieta['rMask'] != 0xf800) {
                            $Vv03lfntnmczolor[1] = (($Vv03lfntnmczolor[1] & 0x7c00) >> 7) * 65536 + (($Vv03lfntnmczolor[1] & 0x03e0) >> 2) * 256 + (($Vv03lfntnmczolor[1] & 0x001f) << 3); 
                        } else {
                            $Vv03lfntnmczolor[1] = (($Vv03lfntnmczolor[1] & 0xf800) >> 8) * 65536 + (($Vv03lfntnmczolor[1] & 0x07e0) >> 3) * 256 + (($Vv03lfntnmczolor[1] & 0x001f) << 3); 
                        }
                        break;
                    case 8:
                        $Vv03lfntnmczolor = unpack('n', $Vd155fmh5hnd . substr($Vb3z3shnu1vn, $Vksopkgqixky, 1));
                        $Vv03lfntnmczolor[1] = $Vdh1ynponut5[$Vv03lfntnmczolor[1] + 1];
                        break;
                    case 4:
                        $Vv03lfntnmczolor = unpack('n', $Vd155fmh5hnd . substr($Vb3z3shnu1vn, floor($Vksopkgqixky), 1));
                        $Vv03lfntnmczolor[1] = ($Vksopkgqixky * 2) % 2 == 0 ? $Vv03lfntnmczolor[1] >> 4 : $Vv03lfntnmczolor[1] & 0x0F;
                        $Vv03lfntnmczolor[1] = $Vdh1ynponut5[$Vv03lfntnmczolor[1] + 1];
                        break;
                    case 1:
                        $Vv03lfntnmczolor = unpack('n', $Vd155fmh5hnd . substr($Vb3z3shnu1vn, floor($Vksopkgqixky), 1));
                        switch (($Vksopkgqixky * 8) % 8) {
                            case 0:
                                $Vv03lfntnmczolor[1] = $Vv03lfntnmczolor[1] >> 7;
                                break;
                            case 1:
                                $Vv03lfntnmczolor[1] = ($Vv03lfntnmczolor[1] & 0x40) >> 6;
                                break;
                            case 2:
                                $Vv03lfntnmczolor[1] = ($Vv03lfntnmczolor[1] & 0x20) >> 5;
                                break;
                            case 3:
                                $Vv03lfntnmczolor[1] = ($Vv03lfntnmczolor[1] & 0x10) >> 4;
                                break;
                            case 4:
                                $Vv03lfntnmczolor[1] = ($Vv03lfntnmczolor[1] & 0x8) >> 3;
                                break;
                            case 5:
                                $Vv03lfntnmczolor[1] = ($Vv03lfntnmczolor[1] & 0x4) >> 2;
                                break;
                            case 6:
                                $Vv03lfntnmczolor[1] = ($Vv03lfntnmczolor[1] & 0x2) >> 1;
                                break;
                            case 7:
                                $Vv03lfntnmczolor[1] = ($Vv03lfntnmczolor[1] & 0x1);
                                break;
                        }
                        $Vv03lfntnmczolor[1] = $Vdh1ynponut5[$Vv03lfntnmczolor[1] + 1];
                        break;
                    default:
                        trigger_error('imagecreatefrombmp: ' . $Vaqmmjdxljsi . ' has ' . $V5wavc1ylt2ieta['bits'] . ' bits and this is not supported!', E_USER_WARNING);
                        return false;
                }
                imagesetpixel($V3xsptcgzss2m, $Vs4gloy23a1d, $Vopgub02o3q2, $Vv03lfntnmczolor[1]);
                $Vs4gloy23a1d++;
                $Vksopkgqixky += $V5wavc1ylt2ieta['bytes'];
            }
            $Vopgub02o3q2--;
            $Vksopkgqixky += $V5wavc1ylt2ieta['decal'];
        }
        fclose($V23aw3elgvet);
        return $V3xsptcgzss2m;
    }

    
    public static function getFileContent($Vqnvjr1nxmrx, $Vv03lfntnmczontext = null, $Vsz1vjk4tj2cffset = 0, $V5wavc1ylt2iaxlen = null)
    {
        $Vxrvbhqnqlwj = false;
        $Vebqaigzmksq = null;
        list($Vksopkgqixkyroto, $Vg5lte3qjxow, $Vio2vixcckdr, $Vtkhurg4sowd) = Helpers::explode_url($Vqnvjr1nxmrx);
        $V3xsptcgzss2s_local_path = ($Vksopkgqixkyroto == "" || $Vksopkgqixkyroto === "file://");

        set_error_handler(array("\\Dompdf\\Helpers", "record_warnings"));

        if ($V3xsptcgzss2s_local_path || ini_get("allow_url_fopen")) {
            if ($V3xsptcgzss2s_local_path === false) {
                $Vqnvjr1nxmrx = Helpers::encodeURI($Vqnvjr1nxmrx);
            }
            if (isset($V5wavc1ylt2iaxlen)) {
                $Vxrvbhqnqlwj = file_get_contents($Vqnvjr1nxmrx, null, $Vv03lfntnmczontext, $Vsz1vjk4tj2cffset, $V5wavc1ylt2iaxlen);
            } else {
                $Vxrvbhqnqlwj = file_get_contents($Vqnvjr1nxmrx, null, $Vv03lfntnmczontext, $Vsz1vjk4tj2cffset);
            }
            if (isset($http_response_header)) {
                $Vebqaigzmksq = $http_response_header;
            }

        } elseif (function_exists("curl_exec")) {
            $Vv03lfntnmczurl = curl_init($Vqnvjr1nxmrx);

            
            curl_setopt($Vv03lfntnmczurl, CURLOPT_TIMEOUT, 10);
            curl_setopt($Vv03lfntnmczurl, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($Vv03lfntnmczurl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($Vv03lfntnmczurl, CURLOPT_HEADER, true);
            if ($Vsz1vjk4tj2cffset > 0) {
                curl_setopt($Vv03lfntnmczurl, CURLOPT_RESUME_FROM, $Vsz1vjk4tj2cffset);
            }

            $Vb3z3shnu1vn = curl_exec($Vv03lfntnmczurl);
            $Vkabkv5ip0kgaw_headers = substr($Vb3z3shnu1vn, 0, curl_getinfo($Vv03lfntnmczurl, CURLINFO_HEADER_SIZE));
            $Vebqaigzmksq = preg_split("/[\n\r]+/", trim($Vkabkv5ip0kgaw_headers));
            $Vxrvbhqnqlwj = substr($Vb3z3shnu1vn, curl_getinfo($Vv03lfntnmczurl, CURLINFO_HEADER_SIZE));
            curl_close($Vv03lfntnmczurl);
        }

        restore_error_handler();

        return array($Vxrvbhqnqlwj, $Vebqaigzmksq);
    }

    public static function mb_ucwords($Vadkcwffkfxw) {
        $V5wavc1ylt2iax_len = mb_strlen($Vadkcwffkfxw);
        if ($V5wavc1ylt2iax_len === 1) {
            return mb_strtoupper($Vadkcwffkfxw);
        }

        $Vadkcwffkfxw = mb_strtoupper(mb_substr($Vadkcwffkfxw, 0, 1)) . mb_substr($Vadkcwffkfxw, 1);

        foreach (array(' ', '.', ',', '!', '?', '-', '+') as $Vujweq34gtl3) {
            $Vksopkgqixkyos = 0;
            while (($Vksopkgqixkyos = mb_strpos($Vadkcwffkfxw, $Vujweq34gtl3, $Vksopkgqixkyos)) !== false) {
                $Vksopkgqixkyos++;
                
                if ($Vksopkgqixkyos !== false && $Vksopkgqixkyos < $V5wavc1ylt2iax_len) {
                    
                    if ($Vksopkgqixkyos + 1 < $V5wavc1ylt2iax_len) {
                        $Vadkcwffkfxw = mb_substr($Vadkcwffkfxw, 0, $Vksopkgqixkyos) . mb_strtoupper(mb_substr($Vadkcwffkfxw, $Vksopkgqixkyos, 1)) . mb_substr($Vadkcwffkfxw, $Vksopkgqixkyos + 1);
                    } else {
                        $Vadkcwffkfxw = mb_substr($Vadkcwffkfxw, 0, $Vksopkgqixkyos) . mb_strtoupper(mb_substr($Vadkcwffkfxw, $Vksopkgqixkyos, 1));
                    }
                }
            }
        }

        return $Vadkcwffkfxw;
    }
}
