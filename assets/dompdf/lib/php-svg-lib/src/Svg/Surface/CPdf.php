<?php


namespace Svg\Surface;

class CPdf
{

    
    public $V0cluars52ry = 0;

    
    public $Vuzzc0akq2h4 = array();

    
    public $Visds0k4nx2c;

    
    public $V2j03ojtdq4d = array();

    
    public $Vmjq53cepgau = './fonts/Helvetica.afm';

    
    public $Vtd03g42lvmm = '';

    
    public $Vt4vwgjixfrg = '';

    
    public $Vtd03g42lvmmNum = 0;

    
    public $Vomlozjldwae;

    
    public $Vedj0u1qrs00;

    
    public $Vwwyiexqlpbe;

    
    public $Vf2dci1t3mrr = 0;

    
    private $Vjhhjebz4vn3 = 0;

    
    public $Vez0a5yllaaq = null;

    
    public $Viogzqjp34j0 = "nonzero";

    
    public $V2fvrrbyzi2y = null;

    
    public $V0qwmtst4nx1 = '';

    
    public $Vtrec4aklrxg = array("mode" => "Normal", "opacity" => 1.0);

    
    public $Vxnjmamz5fth = array("mode" => "Normal", "opacity" => 1.0);

    
    public $Vik2nveiijez = array();

    
    public $Vcz1c42tr5fx = 0;

    
    public $Vlkxllw0b3ff = 0;

    
    public $Vwvjp3dx4uxt = array();

    
    public $Vmdqcurf1ati = 0;

    
    public $Vg4k2ox20zjr = array();

    
    public $Vrwanbsuwez4 = array();

    
    public $Vkxmc0yg2q2f = 0;

    
    public $Vfk2x1k3v1kp = 0;

    
    public $Vi43cktvy0zi = array('compression' => true);

    
    public $Vv2mixozvnj0;

    
    public $V2odl0400jfx = 0;

    
    public $Vbbfdf0et0cn = 0;

    
    public $Vzvjtunhyjsj;

    
    public $V0x3wkgdgccy = array();

    
    public $Vjgooz20k3gx = '';

    
    public $Vjgooz20k3gxVersion = 6;

    
    public $Vynpm04a4fx0 = '';

    
    public $Vn1stn05hbnk = '';

    
    public $Vvnzeorb5je1 = '';

    
    public $Vitlwzjnolq5 = '';

    
    public $Vitlwzjnolq5_objnum = 0;

    
    public $Vymw24nspmav = '';

    
    public $V4ucxnxmpk3c = false;

    
    public $Vq1cltfupv1y = '';

    
    public $Vozegyvcnejr = array();

    
    public $Vmmtijxuirtg = 0;

    
    public $Vjclj01tytvj = array();

    
    public $Vcr53oyia53q = '';

    
    public $V4kwltqthghd = array();

    
    public $Vvang5g5yq3c = false;

    
    public $Vul0p13iaqij = '';

    
    protected $Vuzr3ztb0sly = false;

    
    protected $Vedj0u1qrs00Size = array("width" => 0, "height" => 0);

    
    protected $Vcd2vtrcc1gg = array();

    
    static protected $Vhncrog0sywc = 'iso-8859-1';

    
    static protected $V511ytr5ole2 = array(
        'courier',
        'courier-bold',
        'courier-oblique',
        'courier-boldoblique',
        'helvetica',
        'helvetica-bold',
        'helvetica-oblique',
        'helvetica-boldoblique',
        'times-roman',
        'times-bold',
        'times-italic',
        'times-bolditalic',
        'symbol',
        'zapfdingbats'
    );

    
    function __construct($Vngqupeaszjn = array(0, 0, 612, 792), $Vvang5g5yq3c = false, $Vjgooz20k3gx = '', $Vynpm04a4fx0 = '')
    {
        $Vcki4t4qmybshis->isUnicode = $Vvang5g5yq3c;
        $Vcki4t4qmybshis->fontcache = $Vjgooz20k3gx;
        $Vcki4t4qmybshis->tmp = $Vynpm04a4fx0;
        $Vcki4t4qmybshis->newDocument($Vngqupeaszjn);

        $Vcki4t4qmybshis->compressionReady = function_exists('gzcompress');

        if (in_array('Windows-1252', mb_list_encodings())) {
            self::$Vhncrog0sywc = 'Windows-1252';
        }

        
        $Vcki4t4qmybshis->setFontFamily('init');
        
    }

    

    
    protected function o_destination($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'destination', 'info' => array());
                $Vynpm04a4fx0 = '';
                switch ($Vi43cktvy0zi['type']) {
                    case 'XYZ':
                    case 'FitR':
                        $Vynpm04a4fx0 = ' ' . $Vi43cktvy0zi['p3'] . $Vynpm04a4fx0;
                    case 'FitH':
                    case 'FitV':
                    case 'FitBH':
                    case 'FitBV':
                        $Vynpm04a4fx0 = ' ' . $Vi43cktvy0zi['p1'] . ' ' . $Vi43cktvy0zi['p2'] . $Vynpm04a4fx0;
                    case 'Fit':
                    case 'FitB':
                        $Vynpm04a4fx0 = $Vi43cktvy0zi['type'] . $Vynpm04a4fx0;
                        $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['string'] = $Vynpm04a4fx0;
                        $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['page'] = $Vi43cktvy0zi['page'];
                }
                break;

            case 'out':
                $Vynpm04a4fx0 = $Vsz1vjk4tj2c['info'];
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n" . '[' . $Vynpm04a4fx0['page'] . ' 0 R /' . $Vynpm04a4fx0['string'] . "]\nendobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_viewerPreferences($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'viewerPreferences', 'info' => array());
                break;

            case 'add':
                foreach ($Vi43cktvy0zi as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                    switch ($Vgu5dsd35kdp) {
                        case 'HideToolbar':
                        case 'HideMenubar':
                        case 'HideWindowUI':
                        case 'FitWindow':
                        case 'CenterWindow':
                        case 'NonFullScreenPageMode':
                        case 'Direction':
                            $Vsz1vjk4tj2c['info'][$Vgu5dsd35kdp] = $Vpszt12nvbau;
                            break;
                    }
                }
                break;

            case 'out':
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< ";
                foreach ($Vsz1vjk4tj2c['info'] as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                    $Vihxefallqs0 .= "\n/$Vgu5dsd35kdp $Vpszt12nvbau";
                }
                $Vihxefallqs0 .= "\n>>\n";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_catalog($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'catalog', 'info' => array());
                $Vcki4t4qmybshis->catalogId = $Vkriocz2qep2;
                break;

            case 'outlines':
            case 'pages':
            case 'openHere':
            case 'javascript':
                $Vsz1vjk4tj2c['info'][$Vmzgkmhd4ios] = $Vi43cktvy0zi;
                break;

            case 'viewerPreferences':
                if (!isset($Vsz1vjk4tj2c['info']['viewerPreferences'])) {
                    $Vcki4t4qmybshis->numObj++;
                    $Vcki4t4qmybshis->o_viewerPreferences($Vcki4t4qmybshis->numObj, 'new');
                    $Vsz1vjk4tj2c['info']['viewerPreferences'] = $Vcki4t4qmybshis->numObj;
                }

                $Vpszt12nvbaup = $Vsz1vjk4tj2c['info']['viewerPreferences'];
                $Vcki4t4qmybshis->o_viewerPreferences($Vpszt12nvbaup, 'add', $Vi43cktvy0zi);

                break;

            case 'out':
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< /Type /Catalog";

                foreach ($Vsz1vjk4tj2c['info'] as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                    switch ($Vgu5dsd35kdp) {
                        case 'outlines':
                            $Vihxefallqs0 .= "\n/Outlines $Vpszt12nvbau 0 R";
                            break;

                        case 'pages':
                            $Vihxefallqs0 .= "\n/Pages $Vpszt12nvbau 0 R";
                            break;

                        case 'viewerPreferences':
                            $Vihxefallqs0 .= "\n/ViewerPreferences $Vpszt12nvbau 0 R";
                            break;

                        case 'openHere':
                            $Vihxefallqs0 .= "\n/OpenAction $Vpszt12nvbau 0 R";
                            break;

                        case 'javascript':
                            $Vihxefallqs0 .= "\n/Names <</JavaScript $Vpszt12nvbau 0 R>>";
                            break;
                    }
                }

                $Vihxefallqs0 .= " >>\nendobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_pages($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'pages', 'info' => array());
                $Vcki4t4qmybshis->o_catalog($Vcki4t4qmybshis->catalogId, 'pages', $Vkriocz2qep2);
                break;

            case 'page':
                if (!is_array($Vi43cktvy0zi)) {
                    
                    $Vsz1vjk4tj2c['info']['pages'][] = $Vi43cktvy0zi;
                } else {
                    
                    
                    if (isset($Vi43cktvy0zi['id']) && isset($Vi43cktvy0zi['rid']) && isset($Vi43cktvy0zi['pos'])) {
                        $V3xsptcgzss2 = array_search($Vi43cktvy0zi['rid'], $Vsz1vjk4tj2c['info']['pages']);
                        if (isset($Vsz1vjk4tj2c['info']['pages'][$V3xsptcgzss2]) && $Vsz1vjk4tj2c['info']['pages'][$V3xsptcgzss2] == $Vi43cktvy0zi['rid']) {

                            
                            
                            switch ($Vi43cktvy0zi['pos']) {
                                case 'before':
                                    $Vgu5dsd35kdp = $V3xsptcgzss2;
                                    break;

                                case 'after':
                                    $Vgu5dsd35kdp = $V3xsptcgzss2 + 1;
                                    break;

                                default:
                                    $Vgu5dsd35kdp = -1;
                                    break;
                            }

                            if ($Vgu5dsd35kdp >= 0) {
                                for ($V0hg12l10vfx = count($Vsz1vjk4tj2c['info']['pages']) - 1; $V0hg12l10vfx >= $Vgu5dsd35kdp; $V0hg12l10vfx--) {
                                    $Vsz1vjk4tj2c['info']['pages'][$V0hg12l10vfx + 1] = $Vsz1vjk4tj2c['info']['pages'][$V0hg12l10vfx];
                                }

                                $Vsz1vjk4tj2c['info']['pages'][$Vgu5dsd35kdp] = $Vi43cktvy0zi['id'];
                            }
                        }
                    }
                }
                break;

            case 'procset':
                $Vsz1vjk4tj2c['info']['procset'] = $Vi43cktvy0zi;
                break;

            case 'mediaBox':
                $Vsz1vjk4tj2c['info']['mediaBox'] = $Vi43cktvy0zi;
                
                $Vcki4t4qmybshis->currentPageSize = array('width' => $Vi43cktvy0zi[2], 'height' => $Vi43cktvy0zi[3]);
                break;

            case 'font':
                $Vsz1vjk4tj2c['info']['fonts'][] = array('objNum' => $Vi43cktvy0zi['objNum'], 'fontNum' => $Vi43cktvy0zi['fontNum']);
                break;

            case 'extGState':
                $Vsz1vjk4tj2c['info']['extGStates'][] = array('objNum' => $Vi43cktvy0zi['objNum'], 'stateNum' => $Vi43cktvy0zi['stateNum']);
                break;

            case 'xObject':
                $Vsz1vjk4tj2c['info']['xObjects'][] = array('objNum' => $Vi43cktvy0zi['objNum'], 'label' => $Vi43cktvy0zi['label']);
                break;

            case 'out':
                if (count($Vsz1vjk4tj2c['info']['pages'])) {
                    $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< /Type /Pages\n/Kids [";
                    foreach ($Vsz1vjk4tj2c['info']['pages'] as $Vpszt12nvbau) {
                        $Vihxefallqs0 .= "$Vpszt12nvbau 0 R\n";
                    }

                    $Vihxefallqs0 .= "]\n/Count " . count($Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['pages']);

                    if ((isset($Vsz1vjk4tj2c['info']['fonts']) && count($Vsz1vjk4tj2c['info']['fonts'])) ||
                        isset($Vsz1vjk4tj2c['info']['procset']) ||
                        (isset($Vsz1vjk4tj2c['info']['extGStates']) && count($Vsz1vjk4tj2c['info']['extGStates']))
                    ) {
                        $Vihxefallqs0 .= "\n/Resources <<";

                        if (isset($Vsz1vjk4tj2c['info']['procset'])) {
                            $Vihxefallqs0 .= "\n/ProcSet " . $Vsz1vjk4tj2c['info']['procset'] . " 0 R";
                        }

                        if (isset($Vsz1vjk4tj2c['info']['fonts']) && count($Vsz1vjk4tj2c['info']['fonts'])) {
                            $Vihxefallqs0 .= "\n/Font << ";
                            foreach ($Vsz1vjk4tj2c['info']['fonts'] as $Vd1yi4gtktna) {
                                $Vihxefallqs0 .= "\n/F" . $Vd1yi4gtktna['fontNum'] . " " . $Vd1yi4gtktna['objNum'] . " 0 R";
                            }
                            $Vihxefallqs0 .= "\n>>";
                        }

                        if (isset($Vsz1vjk4tj2c['info']['xObjects']) && count($Vsz1vjk4tj2c['info']['xObjects'])) {
                            $Vihxefallqs0 .= "\n/XObject << ";
                            foreach ($Vsz1vjk4tj2c['info']['xObjects'] as $Vd1yi4gtktna) {
                                $Vihxefallqs0 .= "\n/" . $Vd1yi4gtktna['label'] . " " . $Vd1yi4gtktna['objNum'] . " 0 R";
                            }
                            $Vihxefallqs0 .= "\n>>";
                        }

                        if (isset($Vsz1vjk4tj2c['info']['extGStates']) && count($Vsz1vjk4tj2c['info']['extGStates'])) {
                            $Vihxefallqs0 .= "\n/ExtGState << ";
                            foreach ($Vsz1vjk4tj2c['info']['extGStates'] as $V2pdux31fysm) {
                                $Vihxefallqs0 .= "\n/GS" . $V2pdux31fysm['stateNum'] . " " . $V2pdux31fysm['objNum'] . " 0 R";
                            }
                            $Vihxefallqs0 .= "\n>>";
                        }

                        $Vihxefallqs0 .= "\n>>";
                        if (isset($Vsz1vjk4tj2c['info']['mediaBox'])) {
                            $Vynpm04a4fx0 = $Vsz1vjk4tj2c['info']['mediaBox'];
                            $Vihxefallqs0 .= "\n/MediaBox [" . sprintf(
                                    '%.3F %.3F %.3F %.3F',
                                    $Vynpm04a4fx0[0],
                                    $Vynpm04a4fx0[1],
                                    $Vynpm04a4fx0[2],
                                    $Vynpm04a4fx0[3]
                                ) . ']';
                        }
                    }

                    $Vihxefallqs0 .= "\n >>\nendobj";
                } else {
                    $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< /Type /Pages\n/Count 0\n>>\nendobj";
                }

                return $Vihxefallqs0;
        }
    }

    
    protected function o_outlines($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'outlines', 'info' => array('outlines' => array()));
                $Vcki4t4qmybshis->o_catalog($Vcki4t4qmybshis->catalogId, 'outlines', $Vkriocz2qep2);
                break;

            case 'outline':
                $Vsz1vjk4tj2c['info']['outlines'][] = $Vi43cktvy0zi;
                break;

            case 'out':
                if (count($Vsz1vjk4tj2c['info']['outlines'])) {
                    $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< /Type /Outlines /Kids [";
                    foreach ($Vsz1vjk4tj2c['info']['outlines'] as $Vpszt12nvbau) {
                        $Vihxefallqs0 .= "$Vpszt12nvbau 0 R ";
                    }

                    $Vihxefallqs0 .= "] /Count " . count($Vsz1vjk4tj2c['info']['outlines']) . " >>\nendobj";
                } else {
                    $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< /Type /Outlines /Count 0 >>\nendobj";
                }

                return $Vihxefallqs0;
        }
    }

    
    protected function o_font($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array(
                    't'    => 'font',
                    'info' => array(
                        'name'         => $Vi43cktvy0zi['name'],
                        'fontFileName' => $Vi43cktvy0zi['fontFileName'],
                        'SubType'      => 'Type1'
                    )
                );
                $Voitq4ofqdxq = $Vcki4t4qmybshis->numFonts;
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['fontNum'] = $Voitq4ofqdxq;

                
                if (isset($Vi43cktvy0zi['differences'])) {
                    
                    $Vcki4t4qmybshis->numObj++;
                    $Vcki4t4qmybshis->o_fontEncoding($Vcki4t4qmybshis->numObj, 'new', $Vi43cktvy0zi);
                    $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['encodingDictionary'] = $Vcki4t4qmybshis->numObj;
                } else {
                    if (isset($Vi43cktvy0zi['encoding'])) {
                        
                        switch ($Vi43cktvy0zi['encoding']) {
                            case 'WinAnsiEncoding':
                            case 'MacRomanEncoding':
                            case 'MacExpertEncoding':
                                $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['encoding'] = $Vi43cktvy0zi['encoding'];
                                break;

                            case 'none':
                                break;

                            default:
                                $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['encoding'] = 'WinAnsiEncoding';
                                break;
                        }
                    } else {
                        $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['encoding'] = 'WinAnsiEncoding';
                    }
                }

                if ($Vcki4t4qmybshis->fonts[$Vi43cktvy0zi['fontFileName']]['isUnicode']) {
                    
                    
                    
                    
                    
                    
                    

                    $Vebtvoabgjb4 = ++$Vcki4t4qmybshis->numObj;
                    $Vcki4t4qmybshis->o_contents($Vebtvoabgjb4, 'new', 'raw');
                    $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['toUnicode'] = $Vebtvoabgjb4;

                    $Vkqm20q022ea = <<<EOT
/CIDInit /ProcSet findresource begin
12 dict begin
begincmap
/CIDSystemInfo
<</Registry (Adobe)
/Ordering (UCS)
/Supplement 0
>> def
/CMapName /Adobe-Identity-UCS def
/CMapType 2 def
1 begincodespacerange
<0000> <FFFF>
endcodespacerange
1 beginbfrange
<0000> <FFFF> <0000>
endbfrange
endcmap
CMapName currentdict /CMap defineresource pop
end
end
EOT;

                    $Vihxefallqs0 = "<</Length " . mb_strlen($Vkqm20q022ea, '8bit') . " >>\n";
                    $Vihxefallqs0 .= "stream\n" . $Vkqm20q022ea . "endstream";

                    $Vcki4t4qmybshis->objects[$Vebtvoabgjb4]['c'] = $Vihxefallqs0;

                    $V2myfcajpvx0 = ++$Vcki4t4qmybshis->numObj;
                    $Vcki4t4qmybshis->o_fontDescendentCID($V2myfcajpvx0, 'new', $Vi43cktvy0zi);
                    $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['cidFont'] = $V2myfcajpvx0;
                }

                
                $Vcki4t4qmybshis->o_pages($Vcki4t4qmybshis->currentNode, 'font', array('fontNum' => $Voitq4ofqdxq, 'objNum' => $Vkriocz2qep2));
                break;

            case 'add':
                foreach ($Vi43cktvy0zi as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                    switch ($Vgu5dsd35kdp) {
                        case 'BaseFont':
                            $Vsz1vjk4tj2c['info']['name'] = $Vpszt12nvbau;
                            break;
                        case 'FirstChar':
                        case 'LastChar':
                        case 'Widths':
                        case 'FontDescriptor':
                        case 'SubType':
                            $Vcki4t4qmybshis->addMessage('o_font ' . $Vgu5dsd35kdp . " : " . $Vpszt12nvbau);
                            $Vsz1vjk4tj2c['info'][$Vgu5dsd35kdp] = $Vpszt12nvbau;
                            break;
                    }
                }

                
                if (isset($Vsz1vjk4tj2c['info']['cidFont'])) {
                    $Vcki4t4qmybshis->o_fontDescendentCID($Vsz1vjk4tj2c['info']['cidFont'], 'add', $Vi43cktvy0zi);
                }
                break;

            case 'out':
                if ($Vcki4t4qmybshis->fonts[$Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['fontFileName']]['isUnicode']) {
                    
                    
                    
                    
                    
                    
                    

                    $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<</Type /Font\n/Subtype /Type0\n";
                    $Vihxefallqs0 .= "/BaseFont /" . $Vsz1vjk4tj2c['info']['name'] . "\n";

                    
                    
                    $Vihxefallqs0 .= "/Encoding /Identity-H\n";
                    $Vihxefallqs0 .= "/DescendantFonts [" . $Vsz1vjk4tj2c['info']['cidFont'] . " 0 R]\n";
                    $Vihxefallqs0 .= "/ToUnicode " . $Vsz1vjk4tj2c['info']['toUnicode'] . " 0 R\n";
                    $Vihxefallqs0 .= ">>\n";
                    $Vihxefallqs0 .= "endobj";
                } else {
                    $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< /Type /Font\n/Subtype /" . $Vsz1vjk4tj2c['info']['SubType'] . "\n";
                    $Vihxefallqs0 .= "/Name /F" . $Vsz1vjk4tj2c['info']['fontNum'] . "\n";
                    $Vihxefallqs0 .= "/BaseFont /" . $Vsz1vjk4tj2c['info']['name'] . "\n";

                    if (isset($Vsz1vjk4tj2c['info']['encodingDictionary'])) {
                        
                        $Vihxefallqs0 .= "/Encoding " . $Vsz1vjk4tj2c['info']['encodingDictionary'] . " 0 R\n";
                    } else {
                        if (isset($Vsz1vjk4tj2c['info']['encoding'])) {
                            
                            $Vihxefallqs0 .= "/Encoding /" . $Vsz1vjk4tj2c['info']['encoding'] . "\n";
                        }
                    }

                    if (isset($Vsz1vjk4tj2c['info']['FirstChar'])) {
                        $Vihxefallqs0 .= "/FirstChar " . $Vsz1vjk4tj2c['info']['FirstChar'] . "\n";
                    }

                    if (isset($Vsz1vjk4tj2c['info']['LastChar'])) {
                        $Vihxefallqs0 .= "/LastChar " . $Vsz1vjk4tj2c['info']['LastChar'] . "\n";
                    }

                    if (isset($Vsz1vjk4tj2c['info']['Widths'])) {
                        $Vihxefallqs0 .= "/Widths " . $Vsz1vjk4tj2c['info']['Widths'] . " 0 R\n";
                    }

                    if (isset($Vsz1vjk4tj2c['info']['FontDescriptor'])) {
                        $Vihxefallqs0 .= "/FontDescriptor " . $Vsz1vjk4tj2c['info']['FontDescriptor'] . " 0 R\n";
                    }

                    $Vihxefallqs0 .= ">>\n";
                    $Vihxefallqs0 .= "endobj";
                }

                return $Vihxefallqs0;
        }
    }

    
    protected function o_fontDescriptor($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'fontDescriptor', 'info' => $Vi43cktvy0zi);
                break;

            case 'out':
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< /Type /FontDescriptor\n";
                foreach ($Vsz1vjk4tj2c['info'] as $V4qeqspuux02 => $Vpszt12nvbaualue) {
                    switch ($V4qeqspuux02) {
                        case 'Ascent':
                        case 'CapHeight':
                        case 'Descent':
                        case 'Flags':
                        case 'ItalicAngle':
                        case 'StemV':
                        case 'AvgWidth':
                        case 'Leading':
                        case 'MaxWidth':
                        case 'MissingWidth':
                        case 'StemH':
                        case 'XHeight':
                        case 'CharSet':
                            if (mb_strlen($Vpszt12nvbaualue, '8bit')) {
                                $Vihxefallqs0 .= "/$V4qeqspuux02 $Vpszt12nvbaualue\n";
                            }

                            break;
                        case 'FontFile':
                        case 'FontFile2':
                        case 'FontFile3':
                            $Vihxefallqs0 .= "/$V4qeqspuux02 $Vpszt12nvbaualue 0 R\n";
                            break;

                        case 'FontBBox':
                            $Vihxefallqs0 .= "/$V4qeqspuux02 [$Vpszt12nvbaualue[0] $Vpszt12nvbaualue[1] $Vpszt12nvbaualue[2] $Vpszt12nvbaualue[3]]\n";
                            break;

                        case 'FontName':
                            $Vihxefallqs0 .= "/$V4qeqspuux02 /$Vpszt12nvbaualue\n";
                            break;
                    }
                }

                $Vihxefallqs0 .= ">>\nendobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_fontEncoding($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'fontEncoding', 'info' => $Vi43cktvy0zi);
                break;

            case 'out':
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< /Type /Encoding\n";
                if (!isset($Vsz1vjk4tj2c['info']['encoding'])) {
                    $Vsz1vjk4tj2c['info']['encoding'] = 'WinAnsiEncoding';
                }

                if ($Vsz1vjk4tj2c['info']['encoding'] !== 'none') {
                    $Vihxefallqs0 .= "/BaseEncoding /" . $Vsz1vjk4tj2c['info']['encoding'] . "\n";
                }

                $Vihxefallqs0 .= "/Differences \n[";

                $Vsz1vjk4tj2cnum = -100;

                foreach ($Vsz1vjk4tj2c['info']['differences'] as $Vxnixw2qni35 => $V4qeqspuux02) {
                    if ($Vxnixw2qni35 != $Vsz1vjk4tj2cnum + 1) {
                        
                        $Vihxefallqs0 .= "\n$Vxnixw2qni35 /$V4qeqspuux02";
                    } else {
                        $Vihxefallqs0 .= " /$V4qeqspuux02";
                    }

                    $Vsz1vjk4tj2cnum = $Vxnixw2qni35;
                }

                $Vihxefallqs0 .= "\n]\n>>\nendobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_fontDescendentCID($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'fontDescendentCID', 'info' => $Vi43cktvy0zi);

                
                $Vpuoruruidre = ++$Vcki4t4qmybshis->numObj;
                $Vcki4t4qmybshis->o_contents($Vpuoruruidre, 'new', 'raw');
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['cidSystemInfo'] = $Vpuoruruidre;
                $Vihxefallqs0 = "<</Registry (Adobe)\n"; 
                $Vihxefallqs0 .= "/Ordering (UCS)\n"; 
                $Vihxefallqs0 .= "/Supplement 0\n"; 
                $Vihxefallqs0 .= ">>";
                $Vcki4t4qmybshis->objects[$Vpuoruruidre]['c'] = $Vihxefallqs0;

                
                $V5jmbehyv3sp = ++$Vcki4t4qmybshis->numObj;
                $Vcki4t4qmybshis->o_fontGIDtoCIDMap($V5jmbehyv3sp, 'new', $Vi43cktvy0zi);
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['cidToGidMap'] = $V5jmbehyv3sp;
                break;

            case 'add':
                foreach ($Vi43cktvy0zi as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                    switch ($Vgu5dsd35kdp) {
                        case 'BaseFont':
                            $Vsz1vjk4tj2c['info']['name'] = $Vpszt12nvbau;
                            break;

                        case 'FirstChar':
                        case 'LastChar':
                        case 'MissingWidth':
                        case 'FontDescriptor':
                        case 'SubType':
                            $Vcki4t4qmybshis->addMessage("o_fontDescendentCID $Vgu5dsd35kdp : $Vpszt12nvbau");
                            $Vsz1vjk4tj2c['info'][$Vgu5dsd35kdp] = $Vpszt12nvbau;
                            break;
                    }
                }

                
                $Vcki4t4qmybshis->o_fontGIDtoCIDMap($Vsz1vjk4tj2c['info']['cidToGidMap'], 'add', $Vi43cktvy0zi);
                break;

            case 'out':
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n";
                $Vihxefallqs0 .= "<</Type /Font\n";
                $Vihxefallqs0 .= "/Subtype /CIDFontType2\n";
                $Vihxefallqs0 .= "/BaseFont /" . $Vsz1vjk4tj2c['info']['name'] . "\n";
                $Vihxefallqs0 .= "/CIDSystemInfo " . $Vsz1vjk4tj2c['info']['cidSystemInfo'] . " 0 R\n";







                if (isset($Vsz1vjk4tj2c['info']['FontDescriptor'])) {
                    $Vihxefallqs0 .= "/FontDescriptor " . $Vsz1vjk4tj2c['info']['FontDescriptor'] . " 0 R\n";
                }

                if (isset($Vsz1vjk4tj2c['info']['MissingWidth'])) {
                    $Vihxefallqs0 .= "/DW " . $Vsz1vjk4tj2c['info']['MissingWidth'] . "\n";
                }

                if (isset($Vsz1vjk4tj2c['info']['fontFileName']) && isset($Vcki4t4qmybshis->fonts[$Vsz1vjk4tj2c['info']['fontFileName']]['CIDWidths'])) {
                    $V4tuavakmnoe = &$Vcki4t4qmybshis->fonts[$Vsz1vjk4tj2c['info']['fontFileName']]['CIDWidths'];
                    $Vhoifq2kocyt = '';
                    foreach ($V4tuavakmnoe as $Vj20gg5slcy5 => $Vhoifq2kocytidth) {
                        $Vhoifq2kocyt .= "$Vj20gg5slcy5 [$Vhoifq2kocytidth] ";
                    }
                    $Vihxefallqs0 .= "/W [$Vhoifq2kocyt]\n";
                }

                $Vihxefallqs0 .= "/CIDToGIDMap " . $Vsz1vjk4tj2c['info']['cidToGidMap'] . " 0 R\n";
                $Vihxefallqs0 .= ">>\n";
                $Vihxefallqs0 .= "endobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_fontGIDtoCIDMap($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'fontGIDtoCIDMap', 'info' => $Vi43cktvy0zi);
                break;

            case 'out':
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n";
                $Vwocpbt3va53 = $Vsz1vjk4tj2c['info']['fontFileName'];
                $Vynpm04a4fx0 = $Vcki4t4qmybshis->fonts[$Vwocpbt3va53]['CIDtoGID'] = base64_decode($Vcki4t4qmybshis->fonts[$Vwocpbt3va53]['CIDtoGID']);

                $Vnnlzd432u0m = isset($Vcki4t4qmybshis->fonts[$Vwocpbt3va53]['CIDtoGID_Compressed']) &&
                    $Vcki4t4qmybshis->fonts[$Vwocpbt3va53]['CIDtoGID_Compressed'];

                if (!$Vnnlzd432u0m && isset($Vsz1vjk4tj2c['raw'])) {
                    $Vihxefallqs0 .= $Vynpm04a4fx0;
                } else {
                    $Vihxefallqs0 .= "<<";

                    if (!$Vnnlzd432u0m && $Vcki4t4qmybshis->compressionReady && $Vcki4t4qmybshis->options['compression']) {
                        
                        $Vnnlzd432u0m = true;
                        $Vynpm04a4fx0 = gzcompress($Vynpm04a4fx0, 6);
                    }
                    if ($Vnnlzd432u0m) {
                        $Vihxefallqs0 .= "\n/Filter /FlateDecode";
                    }

                    $Vihxefallqs0 .= "\n/Length " . mb_strlen($Vynpm04a4fx0, '8bit') . ">>\nstream\n$Vynpm04a4fx0\nendstream";
                }

                $Vihxefallqs0 .= "\nendobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_procset($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'procset', 'info' => array('PDF' => 1, 'Text' => 1));
                $Vcki4t4qmybshis->o_pages($Vcki4t4qmybshis->currentNode, 'procset', $Vkriocz2qep2);
                $Vcki4t4qmybshis->procsetObjectId = $Vkriocz2qep2;
                break;

            case 'add':
                
                
                switch ($Vi43cktvy0zi) {
                    case 'ImageB':
                    case 'ImageC':
                    case 'ImageI':
                        $Vsz1vjk4tj2c['info'][$Vi43cktvy0zi] = 1;
                        break;
                }
                break;

            case 'out':
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n[";
                foreach ($Vsz1vjk4tj2c['info'] as $V4qeqspuux02 => $Vpszt12nvbaual) {
                    $Vihxefallqs0 .= "/$V4qeqspuux02 ";
                }
                $Vihxefallqs0 .= "]\nendobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_info($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->infoObject = $Vkriocz2qep2;
                $Vgc0usxqfufi = 'D:' . @date('Ymd');
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array(
                    't'    => 'info',
                    'info' => array(
                        'Creator'      => 'R and OS php pdf writer, http://www.ros.co.nz',
                        'CreationDate' => $Vgc0usxqfufi
                    )
                );
                break;
            case 'Title':
            case 'Author':
            case 'Subject':
            case 'Keywords':
            case 'Creator':
            case 'Producer':
            case 'CreationDate':
            case 'ModDate':
            case 'Trapped':
                $Vsz1vjk4tj2c['info'][$Vmzgkmhd4ios] = $Vi43cktvy0zi;
                break;

            case 'out':
                if ($Vcki4t4qmybshis->encrypted) {
                    $Vcki4t4qmybshis->encryptInit($Vkriocz2qep2);
                }

                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<<\n";
                foreach ($Vsz1vjk4tj2c['info'] as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                    $Vihxefallqs0 .= "/$Vgu5dsd35kdp (";

                    if ($Vcki4t4qmybshis->encrypted) {
                        $Vpszt12nvbau = $Vcki4t4qmybshis->ARC4($Vpszt12nvbau);
                    } 
                    elseif (!in_array($Vgu5dsd35kdp, array('CreationDate', 'ModDate'))) {
                        $Vpszt12nvbau = $Vcki4t4qmybshis->filterText($Vpszt12nvbau);
                    }

                    $Vihxefallqs0 .= $Vpszt12nvbau;
                    $Vihxefallqs0 .= ")\n";
                }

                $Vihxefallqs0 .= ">>\nendobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_action($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                if (is_array($Vi43cktvy0zi)) {
                    $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'action', 'info' => $Vi43cktvy0zi, 'type' => $Vi43cktvy0zi['type']);
                } else {
                    
                    $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'action', 'info' => $Vi43cktvy0zi, 'type' => 'URI');
                }
                break;

            case 'out':
                if ($Vcki4t4qmybshis->encrypted) {
                    $Vcki4t4qmybshis->encryptInit($Vkriocz2qep2);
                }

                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< /Type /Action";
                switch ($Vsz1vjk4tj2c['type']) {
                    case 'ilink':
                        if (!isset($Vcki4t4qmybshis->destinations[(string)$Vsz1vjk4tj2c['info']['label']])) {
                            break;
                        }

                        
                        $Vihxefallqs0 .= "\n/S /GoTo\n/D " . $Vcki4t4qmybshis->destinations[(string)$Vsz1vjk4tj2c['info']['label']] . " 0 R";
                        break;

                    case 'URI':
                        $Vihxefallqs0 .= "\n/S /URI\n/URI (";
                        if ($Vcki4t4qmybshis->encrypted) {
                            $Vihxefallqs0 .= $Vcki4t4qmybshis->filterText($Vcki4t4qmybshis->ARC4($Vsz1vjk4tj2c['info']), true, false);
                        } else {
                            $Vihxefallqs0 .= $Vcki4t4qmybshis->filterText($Vsz1vjk4tj2c['info'], true, false);
                        }

                        $Vihxefallqs0 .= ")";
                        break;
                }

                $Vihxefallqs0 .= "\n>>\nendobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_annotation($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                
                $Vshyl1pxm23p = $Vcki4t4qmybshis->currentPage;
                $Vcki4t4qmybshis->o_page($Vshyl1pxm23p, 'annot', $Vkriocz2qep2);

                
                switch ($Vi43cktvy0zi['type']) {
                    case 'link':
                        $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'annotation', 'info' => $Vi43cktvy0zi);
                        $Vcki4t4qmybshis->numObj++;
                        $Vcki4t4qmybshis->o_action($Vcki4t4qmybshis->numObj, 'new', $Vi43cktvy0zi['url']);
                        $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['actionId'] = $Vcki4t4qmybshis->numObj;
                        break;

                    case 'ilink':
                        
                        $V4qeqspuux02 = $Vi43cktvy0zi['label'];
                        $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'annotation', 'info' => $Vi43cktvy0zi);
                        $Vcki4t4qmybshis->numObj++;
                        $Vcki4t4qmybshis->o_action($Vcki4t4qmybshis->numObj, 'new', array('type' => 'ilink', 'label' => $V4qeqspuux02));
                        $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['actionId'] = $Vcki4t4qmybshis->numObj;
                        break;
                }
                break;

            case 'out':
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< /Type /Annot";
                switch ($Vsz1vjk4tj2c['info']['type']) {
                    case 'link':
                    case 'ilink':
                        $Vihxefallqs0 .= "\n/Subtype /Link";
                        break;
                }
                $Vihxefallqs0 .= "\n/A " . $Vsz1vjk4tj2c['info']['actionId'] . " 0 R";
                $Vihxefallqs0 .= "\n/Border [0 0 0]";
                $Vihxefallqs0 .= "\n/H /I";
                $Vihxefallqs0 .= "\n/Rect [ ";

                foreach ($Vsz1vjk4tj2c['info']['rect'] as $Vpszt12nvbau) {
                    $Vihxefallqs0 .= sprintf("%.4F ", $Vpszt12nvbau);
                }

                $Vihxefallqs0 .= "]";
                $Vihxefallqs0 .= "\n>>\nendobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_page($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->numPages++;
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array(
                    't'    => 'page',
                    'info' => array(
                        'parent'  => $Vcki4t4qmybshis->currentNode,
                        'pageNum' => $Vcki4t4qmybshis->numPages
                    )
                );

                if (is_array($Vi43cktvy0zi)) {
                    
                    $Vi43cktvy0zi['id'] = $Vkriocz2qep2;
                    $Vcki4t4qmybshis->o_pages($Vcki4t4qmybshis->currentNode, 'page', $Vi43cktvy0zi);
                } else {
                    $Vcki4t4qmybshis->o_pages($Vcki4t4qmybshis->currentNode, 'page', $Vkriocz2qep2);
                }

                $Vcki4t4qmybshis->currentPage = $Vkriocz2qep2;
                
                $Vcki4t4qmybshis->numObj++;
                $Vcki4t4qmybshis->o_contents($Vcki4t4qmybshis->numObj, 'new', $Vkriocz2qep2);
                $Vcki4t4qmybshis->currentContents = $Vcki4t4qmybshis->numObj;
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['contents'] = array();
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['contents'][] = $Vcki4t4qmybshis->numObj;

                $Vyupu15qqw5c = ($Vcki4t4qmybshis->numPages % 2 ? 'odd' : 'even');
                foreach ($Vcki4t4qmybshis->addLooseObjects as $Vsz1vjk4tj2cId => $Vu4wqouveu13) {
                    if ($Vu4wqouveu13 === 'all' || $Vyupu15qqw5c === $Vu4wqouveu13) {
                        $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['contents'][] = $Vsz1vjk4tj2cId;
                    }
                }
                break;

            case 'content':
                $Vsz1vjk4tj2c['info']['contents'][] = $Vi43cktvy0zi;
                break;

            case 'annot':
                
                if (!isset($Vsz1vjk4tj2c['info']['annot'])) {
                    $Vsz1vjk4tj2c['info']['annot'] = array();
                }

                
                $Vsz1vjk4tj2c['info']['annot'][] = $Vi43cktvy0zi;
                break;

            case 'out':
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< /Type /Page";
                $Vihxefallqs0 .= "\n/Parent " . $Vsz1vjk4tj2c['info']['parent'] . " 0 R";

                if (isset($Vsz1vjk4tj2c['info']['annot'])) {
                    $Vihxefallqs0 .= "\n/Annots [";
                    foreach ($Vsz1vjk4tj2c['info']['annot'] as $Vabmsf2gmjhn) {
                        $Vihxefallqs0 .= " $Vabmsf2gmjhn 0 R";
                    }
                    $Vihxefallqs0 .= " ]";
                }

                $Vj4h4hyymhja = count($Vsz1vjk4tj2c['info']['contents']);
                if ($Vj4h4hyymhja == 1) {
                    $Vihxefallqs0 .= "\n/Contents " . $Vsz1vjk4tj2c['info']['contents'][0] . " 0 R";
                } else {
                    if ($Vj4h4hyymhja > 1) {
                        $Vihxefallqs0 .= "\n/Contents [\n";

                        
                        
                        
                        foreach ($Vsz1vjk4tj2c['info']['contents'] as $Vgtjejoqgulr) {
                            $Vihxefallqs0 .= "$Vgtjejoqgulr 0 R\n";
                        }
                        $Vihxefallqs0 .= "]";
                    }
                }

                $Vihxefallqs0 .= "\n>>\nendobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_contents($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'contents', 'c' => '', 'info' => array());
                if (mb_strlen($Vi43cktvy0zi, '8bit') && intval($Vi43cktvy0zi)) {
                    
                    $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['onPage'] = $Vi43cktvy0zi;
                } else {
                    if ($Vi43cktvy0zi === 'raw') {
                        
                        $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['raw'] = 1;
                    }
                }
                break;

            case 'add':
                
                foreach ($Vi43cktvy0zi as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                    $Vsz1vjk4tj2c['info'][$Vgu5dsd35kdp] = $Vpszt12nvbau;
                }

            case 'out':
                $Vynpm04a4fx0 = $Vsz1vjk4tj2c['c'];
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n";

                if (isset($Vcki4t4qmybshis->objects[$Vkriocz2qep2]['raw'])) {
                    $Vihxefallqs0 .= $Vynpm04a4fx0;
                } else {
                    $Vihxefallqs0 .= "<<";
                    if ($Vcki4t4qmybshis->compressionReady && $Vcki4t4qmybshis->options['compression']) {
                        
                        $Vihxefallqs0 .= " /Filter /FlateDecode";
                        $Vynpm04a4fx0 = gzcompress($Vynpm04a4fx0, 6);
                    }

                    if ($Vcki4t4qmybshis->encrypted) {
                        $Vcki4t4qmybshis->encryptInit($Vkriocz2qep2);
                        $Vynpm04a4fx0 = $Vcki4t4qmybshis->ARC4($Vynpm04a4fx0);
                    }

                    foreach ($Vsz1vjk4tj2c['info'] as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                        $Vihxefallqs0 .= "\n/$Vgu5dsd35kdp $Vpszt12nvbau";
                    }

                    $Vihxefallqs0 .= "\n/Length " . mb_strlen($Vynpm04a4fx0, '8bit') . " >>\nstream\n$Vynpm04a4fx0\nendstream";
                }

                $Vihxefallqs0 .= "\nendobj";

                return $Vihxefallqs0;
        }
    }

    protected function o_embedjs($Vkriocz2qep2, $Vmzgkmhd4ios)
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array(
                    't'    => 'embedjs',
                    'info' => array(
                        'Names' => '[(EmbeddedJS) ' . ($Vkriocz2qep2 + 1) . ' 0 R]'
                    )
                );
                break;

            case 'out':
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< ";
                foreach ($Vsz1vjk4tj2c['info'] as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                    $Vihxefallqs0 .= "\n/$Vgu5dsd35kdp $Vpszt12nvbau";
                }
                $Vihxefallqs0 .= "\n>>\nendobj";

                return $Vihxefallqs0;
        }
    }

    protected function o_javascript($Vkriocz2qep2, $Vmzgkmhd4ios, $Vl0bhwxpf0qo = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array(
                    't'    => 'javascript',
                    'info' => array(
                        'S'  => '/JavaScript',
                        'JS' => '(' . $Vcki4t4qmybshis->filterText($Vl0bhwxpf0qo) . ')',
                    )
                );
                break;

            case 'out':
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< ";
                foreach ($Vsz1vjk4tj2c['info'] as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                    $Vihxefallqs0 .= "\n/$Vgu5dsd35kdp $Vpszt12nvbau";
                }
                $Vihxefallqs0 .= "\n>>\nendobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_image($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'image', 'data' => &$Vi43cktvy0zi['data'], 'info' => array());

                $V3xsptcgzss2nfo =& $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info'];

                $V3xsptcgzss2nfo['Type'] = '/XObject';
                $V3xsptcgzss2nfo['Subtype'] = '/Image';
                $V3xsptcgzss2nfo['Width'] = $Vi43cktvy0zi['iw'];
                $V3xsptcgzss2nfo['Height'] = $Vi43cktvy0zi['ih'];

                if (isset($Vi43cktvy0zi['masked']) && $Vi43cktvy0zi['masked']) {
                    $V3xsptcgzss2nfo['SMask'] = ($Vcki4t4qmybshis->numObj - 1) . ' 0 R';
                }

                if (!isset($Vi43cktvy0zi['type']) || $Vi43cktvy0zi['type'] === 'jpg') {
                    if (!isset($Vi43cktvy0zi['channels'])) {
                        $Vi43cktvy0zi['channels'] = 3;
                    }

                    switch ($Vi43cktvy0zi['channels']) {
                        case  1:
                            $V3xsptcgzss2nfo['ColorSpace'] = '/DeviceGray';
                            break;
                        case  4:
                            $V3xsptcgzss2nfo['ColorSpace'] = '/DeviceCMYK';
                            break;
                        default:
                            $V3xsptcgzss2nfo['ColorSpace'] = '/DeviceRGB';
                            break;
                    }

                    if ($V3xsptcgzss2nfo['ColorSpace'] === '/DeviceCMYK') {
                        $V3xsptcgzss2nfo['Decode'] = '[1 0 1 0 1 0 1 0]';
                    }

                    $V3xsptcgzss2nfo['Filter'] = '/DCTDecode';
                    $V3xsptcgzss2nfo['BitsPerComponent'] = 8;
                } else {
                    if ($Vi43cktvy0zi['type'] === 'png') {
                        $V3xsptcgzss2nfo['Filter'] = '/FlateDecode';
                        $V3xsptcgzss2nfo['DecodeParms'] = '<< /Predictor 15 /Colors ' . $Vi43cktvy0zi['ncolor'] . ' /Columns ' . $Vi43cktvy0zi['iw'] . ' /BitsPerComponent ' . $Vi43cktvy0zi['bitsPerComponent'] . '>>';

                        if ($Vi43cktvy0zi['isMask']) {
                            $V3xsptcgzss2nfo['ColorSpace'] = '/DeviceGray';
                        } else {
                            if (mb_strlen($Vi43cktvy0zi['pdata'], '8bit')) {
                                $Vynpm04a4fx0 = ' [ /Indexed /DeviceRGB ' . (mb_strlen($Vi43cktvy0zi['pdata'], '8bit') / 3 - 1) . ' ';
                                $Vcki4t4qmybshis->numObj++;
                                $Vcki4t4qmybshis->o_contents($Vcki4t4qmybshis->numObj, 'new');
                                $Vcki4t4qmybshis->objects[$Vcki4t4qmybshis->numObj]['c'] = $Vi43cktvy0zi['pdata'];
                                $Vynpm04a4fx0 .= $Vcki4t4qmybshis->numObj . ' 0 R';
                                $Vynpm04a4fx0 .= ' ]';
                                $V3xsptcgzss2nfo['ColorSpace'] = $Vynpm04a4fx0;

                                if (isset($Vi43cktvy0zi['transparency'])) {
                                    $Vpjldf3nzz34 = $Vi43cktvy0zi['transparency'];
                                    switch ($Vpjldf3nzz34['type']) {
                                        case 'indexed':
                                            $Vynpm04a4fx0 = ' [ ' . $Vpjldf3nzz34['data'] . ' ' . $Vpjldf3nzz34['data'] . '] ';
                                            $V3xsptcgzss2nfo['Mask'] = $Vynpm04a4fx0;
                                            break;

                                        case 'color-key':
                                            $Vynpm04a4fx0 = ' [ ' .
                                                $Vpjldf3nzz34['r'] . ' ' . $Vpjldf3nzz34['r'] .
                                                $Vpjldf3nzz34['g'] . ' ' . $Vpjldf3nzz34['g'] .
                                                $Vpjldf3nzz34['b'] . ' ' . $Vpjldf3nzz34['b'] .
                                                ' ] ';
                                            $V3xsptcgzss2nfo['Mask'] = $Vynpm04a4fx0;
                                            break;
                                    }
                                }
                            } else {
                                if (isset($Vi43cktvy0zi['transparency'])) {
                                    $Vpjldf3nzz34 = $Vi43cktvy0zi['transparency'];

                                    switch ($Vpjldf3nzz34['type']) {
                                        case 'indexed':
                                            $Vynpm04a4fx0 = ' [ ' . $Vpjldf3nzz34['data'] . ' ' . $Vpjldf3nzz34['data'] . '] ';
                                            $V3xsptcgzss2nfo['Mask'] = $Vynpm04a4fx0;
                                            break;

                                        case 'color-key':
                                            $Vynpm04a4fx0 = ' [ ' .
                                                $Vpjldf3nzz34['r'] . ' ' . $Vpjldf3nzz34['r'] . ' ' .
                                                $Vpjldf3nzz34['g'] . ' ' . $Vpjldf3nzz34['g'] . ' ' .
                                                $Vpjldf3nzz34['b'] . ' ' . $Vpjldf3nzz34['b'] .
                                                ' ] ';
                                            $V3xsptcgzss2nfo['Mask'] = $Vynpm04a4fx0;
                                            break;
                                    }
                                }
                                $V3xsptcgzss2nfo['ColorSpace'] = '/' . $Vi43cktvy0zi['color'];
                            }
                        }

                        $V3xsptcgzss2nfo['BitsPerComponent'] = $Vi43cktvy0zi['bitsPerComponent'];
                    }
                }

                
                
                $Vcki4t4qmybshis->o_pages($Vcki4t4qmybshis->currentNode, 'xObject', array('label' => $Vi43cktvy0zi['label'], 'objNum' => $Vkriocz2qep2));

                
                $Vcki4t4qmybshis->o_procset($Vcki4t4qmybshis->procsetObjectId, 'add', 'ImageC');
                break;

            case 'out':
                $Vynpm04a4fx0 = &$Vsz1vjk4tj2c['data'];
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<<";

                foreach ($Vsz1vjk4tj2c['info'] as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                    $Vihxefallqs0 .= "\n/$Vgu5dsd35kdp $Vpszt12nvbau";
                }

                if ($Vcki4t4qmybshis->encrypted) {
                    $Vcki4t4qmybshis->encryptInit($Vkriocz2qep2);
                    $Vynpm04a4fx0 = $Vcki4t4qmybshis->ARC4($Vynpm04a4fx0);
                }

                $Vihxefallqs0 .= "\n/Length " . mb_strlen($Vynpm04a4fx0, '8bit') . ">>\nstream\n$Vynpm04a4fx0\nendstream\nendobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_extGState($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = "")
    {
        static $Vpszt12nvbaualid_params = array(
            "LW",
            "LC",
            "LC",
            "LJ",
            "ML",
            "D",
            "RI",
            "OP",
            "op",
            "OPM",
            "Font",
            "BG",
            "BG2",
            "UCR",
            "TR",
            "TR2",
            "HT",
            "FL",
            "SM",
            "SA",
            "BM",
            "SMask",
            "CA",
            "ca",
            "AIS",
            "TK"
        );

        if ($Vmzgkmhd4ios !== "new") {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case "new":
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'extGState', 'info' => $Vi43cktvy0zi);

                
                $Vcki4t4qmybshis->numStates++;
                $Vcki4t4qmybshis->o_pages($Vcki4t4qmybshis->currentNode, 'extGState', array("objNum" => $Vkriocz2qep2, "stateNum" => $Vcki4t4qmybshis->numStates));
                break;

            case "out":
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<< /Type /ExtGState\n";

                foreach ($Vsz1vjk4tj2c["info"] as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                    if (!in_array($Vgu5dsd35kdp, $Vpszt12nvbaualid_params)) {
                        continue;
                    }
                    $Vihxefallqs0 .= "/$Vgu5dsd35kdp $Vpszt12nvbau\n";
                }

                $Vihxefallqs0 .= ">>\nendobj";

                return $Vihxefallqs0;
        }
    }

    
    protected function o_encryption($Vkriocz2qep2, $Vmzgkmhd4ios, $Vi43cktvy0zi = '')
    {
        if ($Vmzgkmhd4ios !== 'new') {
            $Vsz1vjk4tj2c = &$Vcki4t4qmybshis->objects[$Vkriocz2qep2];
        }

        switch ($Vmzgkmhd4ios) {
            case 'new':
                
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2] = array('t' => 'encryption', 'info' => $Vi43cktvy0zi);
                $Vcki4t4qmybshis->arc4_objnum = $Vkriocz2qep2;

                
                $Vipjhkrqa1zd = chr(0x28) . chr(0xBF) . chr(0x4E) . chr(0x5E) . chr(0x4E) . chr(0x75) . chr(0x8A) . chr(0x41)
                    . chr(0x64) . chr(0x00) . chr(0x4E) . chr(0x56) . chr(0xFF) . chr(0xFA) . chr(0x01) . chr(0x08)
                    . chr(0x2E) . chr(0x2E) . chr(0x00) . chr(0xB6) . chr(0xD0) . chr(0x68) . chr(0x3E) . chr(0x80)
                    . chr(0x2F) . chr(0x0C) . chr(0xA9) . chr(0xFE) . chr(0x64) . chr(0x53) . chr(0x69) . chr(0x7A);

                $V1st2w4mm2ug = mb_strlen($Vi43cktvy0zi['owner'], '8bit');

                if ($V1st2w4mm2ug > 32) {
                    $Vsz1vjk4tj2cwner = substr($Vi43cktvy0zi['owner'], 0, 32);
                } else {
                    if ($V1st2w4mm2ug < 32) {
                        $Vsz1vjk4tj2cwner = $Vi43cktvy0zi['owner'] . substr($Vipjhkrqa1zd, 0, 32 - $V1st2w4mm2ug);
                    } else {
                        $Vsz1vjk4tj2cwner = $Vi43cktvy0zi['owner'];
                    }
                }

                $V1st2w4mm2ug = mb_strlen($Vi43cktvy0zi['user'], '8bit');
                if ($V1st2w4mm2ug > 32) {
                    $Vb2abdn1sfoz = substr($Vi43cktvy0zi['user'], 0, 32);
                } else {
                    if ($V1st2w4mm2ug < 32) {
                        $Vb2abdn1sfoz = $Vi43cktvy0zi['user'] . substr($Vipjhkrqa1zd, 0, 32 - $V1st2w4mm2ug);
                    } else {
                        $Vb2abdn1sfoz = $Vi43cktvy0zi['user'];
                    }
                }

                $Vynpm04a4fx0 = $Vcki4t4qmybshis->md5_16($Vsz1vjk4tj2cwner);
                $Vsz1vjk4tj2ckey = substr($Vynpm04a4fx0, 0, 5);
                $Vcki4t4qmybshis->ARC4_init($Vsz1vjk4tj2ckey);
                $Vsz1vjk4tj2cvalue = $Vcki4t4qmybshis->ARC4($Vb2abdn1sfoz);
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['O'] = $Vsz1vjk4tj2cvalue;

                
                $Vynpm04a4fx0 = $Vcki4t4qmybshis->md5_16(
                    $Vb2abdn1sfoz . $Vsz1vjk4tj2cvalue . chr($Vi43cktvy0zi['p']) . chr(255) . chr(255) . chr(255) . $Vcki4t4qmybshis->fileIdentifier
                );

                $Vde3eh2pl0vj = substr($Vynpm04a4fx0, 0, 5);
                $Vcki4t4qmybshis->ARC4_init($Vde3eh2pl0vj);
                $Vcki4t4qmybshis->encryptionKey = $Vde3eh2pl0vj;
                $Vcki4t4qmybshis->encrypted = true;
                $Vdutj0i32nrd = $Vcki4t4qmybshis->ARC4($Vipjhkrqa1zd);
                $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['info']['U'] = $Vdutj0i32nrd;
                $Vcki4t4qmybshis->encryptionKey = $Vde3eh2pl0vj;
                
                break;

            case 'out':
                $Vihxefallqs0 = "\n$Vkriocz2qep2 0 obj\n<<";
                $Vihxefallqs0 .= "\n/Filter /Standard";
                $Vihxefallqs0 .= "\n/V 1";
                $Vihxefallqs0 .= "\n/R 2";
                $Vihxefallqs0 .= "\n/O (" . $Vcki4t4qmybshis->filterText($Vsz1vjk4tj2c['info']['O'], true, false) . ')';
                $Vihxefallqs0 .= "\n/U (" . $Vcki4t4qmybshis->filterText($Vsz1vjk4tj2c['info']['U'], true, false) . ')';
                
                $Vsz1vjk4tj2c['info']['p'] = (($Vsz1vjk4tj2c['info']['p'] ^ 255) + 1) * -1;
                $Vihxefallqs0 .= "\n/P " . ($Vsz1vjk4tj2c['info']['p']);
                $Vihxefallqs0 .= "\n>>\nendobj";

                return $Vihxefallqs0;
        }
    }

    

    
    function md5_16($V5jic1hsgori)
    {
        $Vynpm04a4fx0 = md5($V5jic1hsgori);
        $Vsz1vjk4tj2cut = '';
        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 <= 30; $V3xsptcgzss2 = $V3xsptcgzss2 + 2) {
            $Vsz1vjk4tj2cut .= chr(hexdec(substr($Vynpm04a4fx0, $V3xsptcgzss2, 2)));
        }

        return $Vsz1vjk4tj2cut;
    }

    
    function encryptInit($Vkriocz2qep2)
    {
        $Vynpm04a4fx0 = $Vcki4t4qmybshis->encryptionKey;
        $Vm1reqmc3mb4 = dechex($Vkriocz2qep2);
        if (mb_strlen($Vm1reqmc3mb4, '8bit') < 6) {
            $Vm1reqmc3mb4 = substr('000000', 0, 6 - mb_strlen($Vm1reqmc3mb4, '8bit')) . $Vm1reqmc3mb4;
        }
        $Vynpm04a4fx0 .= chr(hexdec(substr($Vm1reqmc3mb4, 4, 2))) . chr(hexdec(substr($Vm1reqmc3mb4, 2, 2))) . chr(
                hexdec(substr($Vm1reqmc3mb4, 0, 2))
            ) . chr(0) . chr(0);
        $Vgu5dsd35kdpey = $Vcki4t4qmybshis->md5_16($Vynpm04a4fx0);
        $Vcki4t4qmybshis->ARC4_init(substr($Vgu5dsd35kdpey, 0, 10));
    }

    
    function ARC4_init($Vgu5dsd35kdpey = '')
    {
        $Vcki4t4qmybshis->arc4 = '';

        
        if (mb_strlen($Vgu5dsd35kdpey, '8bit') == 0) {
            return;
        }

        $Vgu5dsd35kdp = '';
        while (mb_strlen($Vgu5dsd35kdp, '8bit') < 256) {
            $Vgu5dsd35kdp .= $Vgu5dsd35kdpey;
        }

        $Vgu5dsd35kdp = substr($Vgu5dsd35kdp, 0, 256);
        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < 256; $V3xsptcgzss2++) {
            $Vcki4t4qmybshis->arc4 .= chr($V3xsptcgzss2);
        }

        $V0hg12l10vfx = 0;

        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < 256; $V3xsptcgzss2++) {
            $Vcki4t4qmybs = $Vcki4t4qmybshis->arc4[$V3xsptcgzss2];
            $V0hg12l10vfx = ($V0hg12l10vfx + ord($Vcki4t4qmybs) + ord($Vgu5dsd35kdp[$V3xsptcgzss2])) % 256;
            $Vcki4t4qmybshis->arc4[$V3xsptcgzss2] = $Vcki4t4qmybshis->arc4[$V0hg12l10vfx];
            $Vcki4t4qmybshis->arc4[$V0hg12l10vfx] = $Vcki4t4qmybs;
        }
    }

    
    function ARC4($Vcki4t4qmybsext)
    {
        $V1st2w4mm2ug = mb_strlen($Vcki4t4qmybsext, '8bit');
        $Vrr3orqjztc2 = 0;
        $Vbz3vmbr1h2v = 0;
        $Vv03lfntnmcz = $Vcki4t4qmybshis->arc4;
        $Vsz1vjk4tj2cut = '';
        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $V1st2w4mm2ug; $V3xsptcgzss2++) {
            $Vrr3orqjztc2 = ($Vrr3orqjztc2 + 1) % 256;
            $Vcki4t4qmybs = $Vv03lfntnmcz[$Vrr3orqjztc2];
            $Vbz3vmbr1h2v = ($Vbz3vmbr1h2v + ord($Vcki4t4qmybs)) % 256;
            $Vv03lfntnmcz[$Vrr3orqjztc2] = $Vv03lfntnmcz[$Vbz3vmbr1h2v];
            $Vv03lfntnmcz[$Vbz3vmbr1h2v] = $Vcki4t4qmybs;
            $Vgu5dsd35kdp = ord($Vv03lfntnmcz[(ord($Vv03lfntnmcz[$Vrr3orqjztc2]) + ord($Vv03lfntnmcz[$Vbz3vmbr1h2v])) % 256]);
            $Vsz1vjk4tj2cut .= chr(ord($Vcki4t4qmybsext[$V3xsptcgzss2]) ^ $Vgu5dsd35kdp);
        }

        return $Vsz1vjk4tj2cut;
    }

    

    
    function addLink($Vsp0omgzz2yw, $Vxkyhwivqsr4, $V3pe5qrlaiol, $Vjxqwkabkvag, $Vzdywlaebz1l)
    {
        $Vcki4t4qmybshis->numObj++;
        $V3xsptcgzss2nfo = array('type' => 'link', 'url' => $Vsp0omgzz2yw, 'rect' => array($Vxkyhwivqsr4, $V3pe5qrlaiol, $Vjxqwkabkvag, $Vzdywlaebz1l));
        $Vcki4t4qmybshis->o_annotation($Vcki4t4qmybshis->numObj, 'new', $V3xsptcgzss2nfo);
    }

    
    function addInternalLink($V4qeqspuux02, $Vxkyhwivqsr4, $V3pe5qrlaiol, $Vjxqwkabkvag, $Vzdywlaebz1l)
    {
        $Vcki4t4qmybshis->numObj++;
        $V3xsptcgzss2nfo = array('type' => 'ilink', 'label' => $V4qeqspuux02, 'rect' => array($Vxkyhwivqsr4, $V3pe5qrlaiol, $Vjxqwkabkvag, $Vzdywlaebz1l));
        $Vcki4t4qmybshis->o_annotation($Vcki4t4qmybshis->numObj, 'new', $V3xsptcgzss2nfo);
    }

    
    function setEncryption($Vb2abdn1sfozPass = '', $Vsz1vjk4tj2cwnerPass = '', $V10ybkmamotp = array())
    {
        $Vksopkgqixky = bindec("11000000");

        $Vi43cktvy0zi = array('print' => 4, 'modify' => 8, 'copy' => 16, 'add' => 32);

        foreach ($V10ybkmamotp as $Vgu5dsd35kdp => $Vpszt12nvbau) {
            if ($Vpszt12nvbau && isset($Vi43cktvy0zi[$Vgu5dsd35kdp])) {
                $Vksopkgqixky += $Vi43cktvy0zi[$Vgu5dsd35kdp];
            } else {
                if (isset($Vi43cktvy0zi[$Vpszt12nvbau])) {
                    $Vksopkgqixky += $Vi43cktvy0zi[$Vpszt12nvbau];
                }
            }
        }

        
        if ($Vcki4t4qmybshis->arc4_objnum == 0) {
            
            $Vcki4t4qmybshis->numObj++;
            if (mb_strlen($Vsz1vjk4tj2cwnerPass) == 0) {
                $Vsz1vjk4tj2cwnerPass = $Vb2abdn1sfozPass;
            }

            $Vcki4t4qmybshis->o_encryption($Vcki4t4qmybshis->numObj, 'new', array('user' => $Vb2abdn1sfozPass, 'owner' => $Vsz1vjk4tj2cwnerPass, 'p' => $Vksopkgqixky));
        }
    }

    
    function checkAllHere()
    {
    }

    
    function output($Vpe1ucmbxygf = false)
    {
        if ($Vpe1ucmbxygf) {
            
            $Vcki4t4qmybshis->options['compression'] = false;
        }

        if ($Vcki4t4qmybshis->javascript) {
            $Vcki4t4qmybshis->numObj++;

            $V0hg12l10vfxs_id = $Vcki4t4qmybshis->numObj;
            $Vcki4t4qmybshis->o_embedjs($V0hg12l10vfxs_id, 'new');
            $Vcki4t4qmybshis->o_javascript(++$Vcki4t4qmybshis->numObj, 'new', $Vcki4t4qmybshis->javascript);

            $Vkriocz2qep2 = $Vcki4t4qmybshis->catalogId;

            $Vcki4t4qmybshis->o_catalog($Vkriocz2qep2, 'javascript', $V0hg12l10vfxs_id);
        }

        if ($Vcki4t4qmybshis->arc4_objnum) {
            $Vcki4t4qmybshis->ARC4_init($Vcki4t4qmybshis->encryptionKey);
        }

        $Vcki4t4qmybshis->checkAllHere();

        $Vymkyc5vf2lp = array();
        $Vv03lfntnmczontent = '%PDF-1.3';
        $Vksopkgqixkyos = mb_strlen($Vv03lfntnmczontent, '8bit');

        foreach ($Vcki4t4qmybshis->objects as $Vgu5dsd35kdp => $Vpszt12nvbau) {
            $Vynpm04a4fx0 = 'o_' . $Vpszt12nvbau['t'];
            $Vv03lfntnmczont = $Vcki4t4qmybshis->$Vynpm04a4fx0($Vgu5dsd35kdp, 'out');
            $Vv03lfntnmczontent .= $Vv03lfntnmczont;
            $Vymkyc5vf2lp[] = $Vksopkgqixkyos;
            $Vksopkgqixkyos += mb_strlen($Vv03lfntnmczont, '8bit');
        }

        $Vv03lfntnmczontent .= "\nxref\n0 " . (count($Vymkyc5vf2lp) + 1) . "\n0000000000 65535 f \n";

        foreach ($Vymkyc5vf2lp as $Vksopkgqixky) {
            $Vv03lfntnmczontent .= str_pad($Vksopkgqixky, 10, "0", STR_PAD_LEFT) . " 00000 n \n";
        }

        $Vv03lfntnmczontent .= "trailer\n<<\n/Size " . (count($Vymkyc5vf2lp) + 1) . "\n/Root 1 0 R\n/Info $Vcki4t4qmybshis->infoObject 0 R\n";

        
        if ($Vcki4t4qmybshis->arc4_objnum > 0) {
            $Vv03lfntnmczontent .= "/Encrypt $Vcki4t4qmybshis->arc4_objnum 0 R\n";
        }

        if (mb_strlen($Vcki4t4qmybshis->fileIdentifier, '8bit')) {
            $Vv03lfntnmczontent .= "/ID[<$Vcki4t4qmybshis->fileIdentifier><$Vcki4t4qmybshis->fileIdentifier>]\n";
        }

        
        $Vksopkgqixkyos++;

        $Vv03lfntnmczontent .= ">>\nstartxref\n$Vksopkgqixkyos\n%%EOF\n";

        return $Vv03lfntnmczontent;
    }

    
    private function newDocument($Vngqupeaszjn = array(0, 0, 612, 792))
    {
        $Vcki4t4qmybshis->numObj = 0;
        $Vcki4t4qmybshis->objects = array();

        $Vcki4t4qmybshis->numObj++;
        $Vcki4t4qmybshis->o_catalog($Vcki4t4qmybshis->numObj, 'new');

        $Vcki4t4qmybshis->numObj++;
        $Vcki4t4qmybshis->o_outlines($Vcki4t4qmybshis->numObj, 'new');

        $Vcki4t4qmybshis->numObj++;
        $Vcki4t4qmybshis->o_pages($Vcki4t4qmybshis->numObj, 'new');

        $Vcki4t4qmybshis->o_pages($Vcki4t4qmybshis->numObj, 'mediaBox', $Vngqupeaszjn);
        $Vcki4t4qmybshis->currentNode = 3;

        $Vcki4t4qmybshis->numObj++;
        $Vcki4t4qmybshis->o_procset($Vcki4t4qmybshis->numObj, 'new');

        $Vcki4t4qmybshis->numObj++;
        $Vcki4t4qmybshis->o_info($Vcki4t4qmybshis->numObj, 'new');

        $Vcki4t4qmybshis->numObj++;
        $Vcki4t4qmybshis->o_page($Vcki4t4qmybshis->numObj, 'new');

        
        
        $Vcki4t4qmybshis->firstPageId = $Vcki4t4qmybshis->currentContents;
    }

    
    private function openFont($V3h4z3hxorxj)
    {
        
        $Vksopkgqixkyos = strrpos($V3h4z3hxorxj, '/');

        if ($Vksopkgqixkyos === false) {
            $Va1ihhd3c2hn = './';
            $Vpgf1maodsla = $V3h4z3hxorxj;
        } else {
            $Va1ihhd3c2hn = substr($V3h4z3hxorxj, 0, $Vksopkgqixkyos + 1);
            $Vpgf1maodsla = substr($V3h4z3hxorxj, $Vksopkgqixkyos + 1);
        }

        $Vjgooz20k3gx = $Vcki4t4qmybshis->fontcache;
        if ($Vjgooz20k3gx == '') {
            $Vjgooz20k3gx = $Va1ihhd3c2hn;
        }

        
        
        
        
        

        $Vcki4t4qmybshis->addMessage("openFont: $V3h4z3hxorxj - $Vpgf1maodsla");

        if (!$Vcki4t4qmybshis->isUnicode || in_array(mb_strtolower(basename($Vpgf1maodsla)), self::$V511ytr5ole2)) {
            $Vdmeyjtjmbp2 = "$Vpgf1maodsla.afm";
        } else {
            $Vdmeyjtjmbp2 = "$Vpgf1maodsla.ufm";
        }

        $Vv03lfntnmczache_name = "$Vdmeyjtjmbp2.php";
        $Vcki4t4qmybshis->addMessage("metrics: $Vdmeyjtjmbp2, cache: $Vv03lfntnmczache_name");

        if (file_exists($Vjgooz20k3gx . $Vv03lfntnmczache_name)) {
            $Vcki4t4qmybshis->addMessage("openFont: php file exists $Vjgooz20k3gx$Vv03lfntnmczache_name");
            $Vcki4t4qmybshis->fonts[$V3h4z3hxorxj] = require($Vjgooz20k3gx . $Vv03lfntnmczache_name);

            if (!isset($Vcki4t4qmybshis->fonts[$V3h4z3hxorxj]['_version_']) || $Vcki4t4qmybshis->fonts[$V3h4z3hxorxj]['_version_'] != $Vcki4t4qmybshis->fontcacheVersion) {
                
                $Vcki4t4qmybshis->addMessage('openFont: clear out, make way for new version.');
                $Vcki4t4qmybshis->fonts[$V3h4z3hxorxj] = null;
                unset($Vcki4t4qmybshis->fonts[$V3h4z3hxorxj]);
            }
        } else {
            $Vsz1vjk4tj2cld_cache_name = "php_$Vdmeyjtjmbp2";
            if (file_exists($Vjgooz20k3gx . $Vsz1vjk4tj2cld_cache_name)) {
                $Vcki4t4qmybshis->addMessage(
                    "openFont: php file doesn't exist $Vjgooz20k3gx$Vv03lfntnmczache_name, creating it from the old format"
                );
                $Vsz1vjk4tj2cld_cache = file_get_contents($Vjgooz20k3gx . $Vsz1vjk4tj2cld_cache_name);
                file_put_contents($Vjgooz20k3gx . $Vv03lfntnmczache_name, '<?php return ' . $Vsz1vjk4tj2cld_cache . ';');

                return $Vcki4t4qmybshis->openFont($V3h4z3hxorxj);
            }
        }

        if (!isset($Vcki4t4qmybshis->fonts[$V3h4z3hxorxj]) && file_exists($Va1ihhd3c2hn . $Vdmeyjtjmbp2)) {
            
            $Vcki4t4qmybshis->addMessage("openFont: build php file from $Va1ihhd3c2hn$Vdmeyjtjmbp2");
            $Vb3z3shnu1vn = array();

            
            $Vb3z3shnu1vn['codeToName'] = array();

            
            
            $Vb3z3shnu1vn['isUnicode'] = (strtolower(substr($Vdmeyjtjmbp2, -3)) !== 'afm');

            $Vj20gg5slcy5togid = '';
            if ($Vb3z3shnu1vn['isUnicode']) {
                $Vj20gg5slcy5togid = str_pad('', 256 * 256 * 2, "\x00");
            }

            $Vtkhurg4sowd = file($Va1ihhd3c2hn . $Vdmeyjtjmbp2);

            foreach ($Vtkhurg4sowd as $Vlpuhjbs31k4) {
                $Vnwijnctkkq3 = trim($Vlpuhjbs31k4);
                $Vksopkgqixkyos = strpos($Vnwijnctkkq3, ' ');

                if ($Vksopkgqixkyos) {
                    
                    $Vgu5dsd35kdpey = substr($Vnwijnctkkq3, 0, $Vksopkgqixkyos);
                    switch ($Vgu5dsd35kdpey) {
                        case 'FontName':
                        case 'FullName':
                        case 'FamilyName':
                        case 'PostScriptName':
                        case 'Weight':
                        case 'ItalicAngle':
                        case 'IsFixedPitch':
                        case 'CharacterSet':
                        case 'UnderlinePosition':
                        case 'UnderlineThickness':
                        case 'Version':
                        case 'EncodingScheme':
                        case 'CapHeight':
                        case 'XHeight':
                        case 'Ascender':
                        case 'Descender':
                        case 'StdHW':
                        case 'StdVW':
                        case 'StartCharMetrics':
                        case 'FontHeightOffset': 
                            $Vb3z3shnu1vn[$Vgu5dsd35kdpey] = trim(substr($Vnwijnctkkq3, $Vksopkgqixkyos));
                            break;

                        case 'FontBBox':
                            $Vb3z3shnu1vn[$Vgu5dsd35kdpey] = explode(' ', trim(substr($Vnwijnctkkq3, $Vksopkgqixkyos)));
                            break;

                        
                        case 'C': 
                            $Vbz3vmbr1h2vits = explode(';', trim($Vnwijnctkkq3));
                            $V4iopdcxmetj = array();

                            foreach ($Vbz3vmbr1h2vits as $Vbz3vmbr1h2vit) {
                                $Vbz3vmbr1h2vits2 = explode(' ', trim($Vbz3vmbr1h2vit));
                                if (mb_strlen($Vbz3vmbr1h2vits2[0], '8bit') == 0) {
                                    continue;
                                }

                                if (count($Vbz3vmbr1h2vits2) > 2) {
                                    $V4iopdcxmetj[$Vbz3vmbr1h2vits2[0]] = array();
                                    for ($V3xsptcgzss2 = 1; $V3xsptcgzss2 < count($Vbz3vmbr1h2vits2); $V3xsptcgzss2++) {
                                        $V4iopdcxmetj[$Vbz3vmbr1h2vits2[0]][] = $Vbz3vmbr1h2vits2[$V3xsptcgzss2];
                                    }
                                } else {
                                    if (count($Vbz3vmbr1h2vits2) == 2) {
                                        $V4iopdcxmetj[$Vbz3vmbr1h2vits2[0]] = $Vbz3vmbr1h2vits2[1];
                                    }
                                }
                            }

                            $Vv03lfntnmcz = (int)$V4iopdcxmetj['C'];
                            $V1qcutcuyu3m = $V4iopdcxmetj['N'];
                            $Vhoifq2kocytidth = floatval($V4iopdcxmetj['WX']);

                            if ($Vv03lfntnmcz >= 0) {
                                if ($Vv03lfntnmcz != hexdec($V1qcutcuyu3m)) {
                                    $Vb3z3shnu1vn['codeToName'][$Vv03lfntnmcz] = $V1qcutcuyu3m;
                                }
                                $Vb3z3shnu1vn['C'][$Vv03lfntnmcz] = $Vhoifq2kocytidth;
                            } else {
                                $Vb3z3shnu1vn['C'][$V1qcutcuyu3m] = $Vhoifq2kocytidth;
                            }

                            if (!isset($Vb3z3shnu1vn['MissingWidth']) && $Vv03lfntnmcz == -1 && $V1qcutcuyu3m === '.notdef') {
                                $Vb3z3shnu1vn['MissingWidth'] = $Vhoifq2kocytidth;
                            }

                            break;

                        
                        case 'U': 
                            if (!$Vb3z3shnu1vn['isUnicode']) {
                                break;
                            }

                            $Vbz3vmbr1h2vits = explode(';', trim($Vnwijnctkkq3));
                            $V4iopdcxmetj = array();

                            foreach ($Vbz3vmbr1h2vits as $Vbz3vmbr1h2vit) {
                                $Vbz3vmbr1h2vits2 = explode(' ', trim($Vbz3vmbr1h2vit));
                                if (mb_strlen($Vbz3vmbr1h2vits2[0], '8bit') === 0) {
                                    continue;
                                }

                                if (count($Vbz3vmbr1h2vits2) > 2) {
                                    $V4iopdcxmetj[$Vbz3vmbr1h2vits2[0]] = array();
                                    for ($V3xsptcgzss2 = 1; $V3xsptcgzss2 < count($Vbz3vmbr1h2vits2); $V3xsptcgzss2++) {
                                        $V4iopdcxmetj[$Vbz3vmbr1h2vits2[0]][] = $Vbz3vmbr1h2vits2[$V3xsptcgzss2];
                                    }
                                } else {
                                    if (count($Vbz3vmbr1h2vits2) == 2) {
                                        $V4iopdcxmetj[$Vbz3vmbr1h2vits2[0]] = $Vbz3vmbr1h2vits2[1];
                                    }
                                }
                            }

                            $Vv03lfntnmcz = (int)$V4iopdcxmetj['U'];
                            $V1qcutcuyu3m = $V4iopdcxmetj['N'];
                            $Vsciikjjbu53 = $V4iopdcxmetj['G'];
                            $Vhoifq2kocytidth = floatval($V4iopdcxmetj['WX']);

                            if ($Vv03lfntnmcz >= 0) {
                                
                                if ($Vv03lfntnmcz >= 0 && $Vv03lfntnmcz < 0xFFFF && $Vsciikjjbu53) {
                                    $Vj20gg5slcy5togid[$Vv03lfntnmcz * 2] = chr($Vsciikjjbu53 >> 8);
                                    $Vj20gg5slcy5togid[$Vv03lfntnmcz * 2 + 1] = chr($Vsciikjjbu53 & 0xFF);
                                }

                                if ($Vv03lfntnmcz != hexdec($V1qcutcuyu3m)) {
                                    $Vb3z3shnu1vn['codeToName'][$Vv03lfntnmcz] = $V1qcutcuyu3m;
                                }
                                $Vb3z3shnu1vn['C'][$Vv03lfntnmcz] = $Vhoifq2kocytidth;
                            } else {
                                $Vb3z3shnu1vn['C'][$V1qcutcuyu3m] = $Vhoifq2kocytidth;
                            }

                            if (!isset($Vb3z3shnu1vn['MissingWidth']) && $Vv03lfntnmcz == -1 && $V1qcutcuyu3m === '.notdef') {
                                $Vb3z3shnu1vn['MissingWidth'] = $Vhoifq2kocytidth;
                            }

                            break;

                        case 'KPX':
                            break; 
                            
                            $Vbz3vmbr1h2vits = explode(' ', trim($Vnwijnctkkq3));
                            $Vb3z3shnu1vn['KPX'][$Vbz3vmbr1h2vits[1]][$Vbz3vmbr1h2vits[2]] = $Vbz3vmbr1h2vits[3];
                            break;
                    }
                }
            }

            if ($Vcki4t4qmybshis->compressionReady && $Vcki4t4qmybshis->options['compression']) {
                
                $Vb3z3shnu1vn['CIDtoGID_Compressed'] = true;
                $Vj20gg5slcy5togid = gzcompress($Vj20gg5slcy5togid, 6);
            }
            $Vb3z3shnu1vn['CIDtoGID'] = base64_encode($Vj20gg5slcy5togid);
            $Vb3z3shnu1vn['_version_'] = $Vcki4t4qmybshis->fontcacheVersion;
            $Vcki4t4qmybshis->fonts[$V3h4z3hxorxj] = $Vb3z3shnu1vn;

            
            
            if (is_dir(substr($Vjgooz20k3gx, 0, -1)) && is_writable(substr($Vjgooz20k3gx, 0, -1))) {
                file_put_contents($Vjgooz20k3gx . $Vv03lfntnmczache_name, '<?php return ' . var_export($Vb3z3shnu1vn, true) . ';');
            }
            $Vb3z3shnu1vn = null;
        }

        if (!isset($Vcki4t4qmybshis->fonts[$V3h4z3hxorxj])) {
            $Vcki4t4qmybshis->addMessage("openFont: no font file found for $V3h4z3hxorxj. Do you need to run load_font.php?");
        }

        
    }

    
    function selectFont($V3h4z3hxorxjName, $Vgpqcvfkvgzo = '', $Vb1jc3ulilu4 = true)
    {
        $Vrv0pwu03qua = substr($V3h4z3hxorxjName, -4);
        if ($Vrv0pwu03qua === '.afm' || $Vrv0pwu03qua === '.ufm') {
            $V3h4z3hxorxjName = substr($V3h4z3hxorxjName, 0, mb_strlen($V3h4z3hxorxjName) - 4);
        }

        if (!isset($Vcki4t4qmybshis->fonts[$V3h4z3hxorxjName])) {
            $Vcki4t4qmybshis->addMessage("selectFont: selecting - $V3h4z3hxorxjName - $Vgpqcvfkvgzo, $Vb1jc3ulilu4");

            
            $Vcki4t4qmybshis->openFont($V3h4z3hxorxjName);

            if (isset($Vcki4t4qmybshis->fonts[$V3h4z3hxorxjName])) {
                $Vcki4t4qmybshis->numObj++;
                $Vcki4t4qmybshis->numFonts++;

                $V3h4z3hxorxj = &$Vcki4t4qmybshis->fonts[$V3h4z3hxorxjName];

                
                $Vksopkgqixkyos = strrpos($V3h4z3hxorxjName, '/');
                
                $Vpgf1maodsla = substr($V3h4z3hxorxjName, $Vksopkgqixkyos + 1);
                $Vi43cktvy0zi = array('name' => $Vpgf1maodsla, 'fontFileName' => $V3h4z3hxorxjName);

                if (is_array($Vgpqcvfkvgzo)) {
                    
                    if (isset($Vgpqcvfkvgzo['encoding'])) {
                        $Vi43cktvy0zi['encoding'] = $Vgpqcvfkvgzo['encoding'];
                    }

                    if (isset($Vgpqcvfkvgzo['differences'])) {
                        $Vi43cktvy0zi['differences'] = $Vgpqcvfkvgzo['differences'];
                    }
                } else {
                    if (mb_strlen($Vgpqcvfkvgzo, '8bit')) {
                        
                        $Vi43cktvy0zi['encoding'] = $Vgpqcvfkvgzo;
                    }
                }

                $V3h4z3hxorxjObj = $Vcki4t4qmybshis->numObj;
                $Vcki4t4qmybshis->o_font($Vcki4t4qmybshis->numObj, 'new', $Vi43cktvy0zi);
                $V3h4z3hxorxj['fontNum'] = $Vcki4t4qmybshis->numFonts;

                
                
                
                $Vbz3vmbr1h2vasefile = $V3h4z3hxorxjName;

                $V4saqrh43dhw = '';
                if (file_exists("$Vbz3vmbr1h2vasefile.pfb")) {
                    $V4saqrh43dhw = 'pfb';
                } else {
                    if (file_exists("$Vbz3vmbr1h2vasefile.ttf")) {
                        $V4saqrh43dhw = 'ttf';
                    }
                }

                $Vlh4o4dvepwk = "$Vbz3vmbr1h2vasefile.$V4saqrh43dhw";

                
                
                $Vcki4t4qmybshis->addMessage('selectFont: checking for - ' . $Vlh4o4dvepwk);

                
                
                if ($V4saqrh43dhw) {
                    $Vrr3orqjztc2dobeFontName = isset($V3h4z3hxorxj['PostScriptName']) ? $V3h4z3hxorxj['PostScriptName'] : $V3h4z3hxorxj['FontName'];
                    
                    $Vcki4t4qmybshis->addMessage("selectFont: adding font file - $Vlh4o4dvepwk - $Vrr3orqjztc2dobeFontName");

                    
                    $Vgidepai0gmc = -1;
                    $Vajdpjg0jwh4 = 0;
                    $Vhoifq2kocytidths = array();
                    $V4tuavakmnoe = array();

                    foreach ($V3h4z3hxorxj['C'] as $Vxnixw2qni35 => $Vcyg5xmwfpxo) {
                        if (intval($Vxnixw2qni35) > 0 || $Vxnixw2qni35 == '0') {
                            if (!$V3h4z3hxorxj['isUnicode']) {
                                
                                if ($Vajdpjg0jwh4 > 0 && $Vxnixw2qni35 > $Vajdpjg0jwh4 + 1) {
                                    for ($V3xsptcgzss2 = $Vajdpjg0jwh4 + 1; $V3xsptcgzss2 < $Vxnixw2qni35; $V3xsptcgzss2++) {
                                        $Vhoifq2kocytidths[] = 0;
                                    }
                                }
                            }

                            $Vhoifq2kocytidths[] = $Vcyg5xmwfpxo;

                            if ($V3h4z3hxorxj['isUnicode']) {
                                $V4tuavakmnoe[$Vxnixw2qni35] = $Vcyg5xmwfpxo;
                            }

                            if ($Vgidepai0gmc == -1) {
                                $Vgidepai0gmc = $Vxnixw2qni35;
                            }

                            $Vajdpjg0jwh4 = $Vxnixw2qni35;
                        }
                    }

                    
                    if (isset($Vi43cktvy0zi['differences'])) {
                        foreach ($Vi43cktvy0zi['differences'] as $Vv03lfntnmczharNum => $Vv03lfntnmczharName) {
                            if ($Vv03lfntnmczharNum > $Vajdpjg0jwh4) {
                                if (!$V3h4z3hxorxj['isUnicode']) {
                                    
                                    for ($V3xsptcgzss2 = $Vajdpjg0jwh4 + 1; $V3xsptcgzss2 <= $Vv03lfntnmczharNum; $V3xsptcgzss2++) {
                                        $Vhoifq2kocytidths[] = 0;
                                    }
                                }

                                $Vajdpjg0jwh4 = $Vv03lfntnmczharNum;
                            }

                            if (isset($V3h4z3hxorxj['C'][$Vv03lfntnmczharName])) {
                                $Vhoifq2kocytidths[$Vv03lfntnmczharNum - $Vgidepai0gmc] = $V3h4z3hxorxj['C'][$Vv03lfntnmczharName];
                                if ($V3h4z3hxorxj['isUnicode']) {
                                    $V4tuavakmnoe[$Vv03lfntnmczharName] = $V3h4z3hxorxj['C'][$Vv03lfntnmczharName];
                                }
                            }
                        }
                    }

                    if ($V3h4z3hxorxj['isUnicode']) {
                        $V3h4z3hxorxj['CIDWidths'] = $V4tuavakmnoe;
                    }

                    $Vcki4t4qmybshis->addMessage('selectFont: FirstChar = ' . $Vgidepai0gmc);
                    $Vcki4t4qmybshis->addMessage('selectFont: LastChar = ' . $Vajdpjg0jwh4);

                    $Vhoifq2kocytidthid = -1;

                    if (!$V3h4z3hxorxj['isUnicode']) {
                        

                        $Vcki4t4qmybshis->numObj++;
                        $Vcki4t4qmybshis->o_contents($Vcki4t4qmybshis->numObj, 'new', 'raw');
                        $Vcki4t4qmybshis->objects[$Vcki4t4qmybshis->numObj]['c'] .= '[' . implode(' ', $Vhoifq2kocytidths) . ']';
                        $Vhoifq2kocytidthid = $Vcki4t4qmybshis->numObj;
                    }

                    $Vequhpemwax5 = 500;
                    $V2svjql3ae2z = 70;

                    if (isset($V3h4z3hxorxj['MissingWidth'])) {
                        $Vequhpemwax5 = $V3h4z3hxorxj['MissingWidth'];
                    }
                    if (isset($V3h4z3hxorxj['StdVW'])) {
                        $V2svjql3ae2z = $V3h4z3hxorxj['StdVW'];
                    } else {
                        if (isset($V3h4z3hxorxj['Weight']) && preg_match('!(bold|black)!i', $V3h4z3hxorxj['Weight'])) {
                            $V2svjql3ae2z = 120;
                        }
                    }

                    
                    
                    
                    
                    if (!$Vcki4t4qmybshis->isUnicode || $V4saqrh43dhw !== 'ttf' || empty($Vcki4t4qmybshis->stringSubsets)) {
                        $Vb3z3shnu1vn = file_get_contents($Vlh4o4dvepwk);
                    } else {
                        $Vcki4t4qmybshis->stringSubsets[$V3h4z3hxorxjName][] = 32; 

                        $V2nxahdpg1do = $Vcki4t4qmybshis->stringSubsets[$V3h4z3hxorxjName];
                        sort($V2nxahdpg1do);

                        
                        $V3h4z3hxorxj_obj = Font::load($Vlh4o4dvepwk);
                        $V3h4z3hxorxj_obj->parse();

                        
                        $V3h4z3hxorxj_obj->setSubset($V2nxahdpg1do);
                        $V3h4z3hxorxj_obj->reduce();

                        
                        $Vynpm04a4fx0_name = "$Vlh4o4dvepwk.tmp." . uniqid();
                        $V3h4z3hxorxj_obj->open($Vynpm04a4fx0_name, Font_Binary_Stream::modeWrite);
                        $V3h4z3hxorxj_obj->encode(array("OS/2"));
                        $V3h4z3hxorxj_obj->close();

                        
                        $V3h4z3hxorxj_obj = Font::load($Vynpm04a4fx0_name);

                        
                        $Veqbujijlzvr = null;
                        foreach ($V3h4z3hxorxj_obj->getData("cmap", "subtables") as $V5wth3hje3v5) {
                            if ($V5wth3hje3v5["platformID"] == 0 || $V5wth3hje3v5["platformID"] == 3 && $V5wth3hje3v5["platformSpecificID"] == 1) {
                                $Veqbujijlzvr = $V5wth3hje3v5;
                                break;
                            }
                        }

                        if ($Veqbujijlzvr) {
                            $Vsciikjjbu53IndexArray = $Veqbujijlzvr["glyphIndexArray"];
                            $Veega4hhzixh = $V3h4z3hxorxj_obj->getData("hmtx");

                            unset($Vsciikjjbu53IndexArray[0xFFFF]);

                            $Vj20gg5slcy5togid = str_pad('', max(array_keys($Vsciikjjbu53IndexArray)) * 2 + 1, "\x00");
                            $V3h4z3hxorxj['CIDWidths'] = array();
                            foreach ($Vsciikjjbu53IndexArray as $Vj20gg5slcy5 => $Vmfzzxc0mebw) {
                                if ($Vj20gg5slcy5 >= 0 && $Vj20gg5slcy5 < 0xFFFF && $Vmfzzxc0mebw) {
                                    $Vj20gg5slcy5togid[$Vj20gg5slcy5 * 2] = chr($Vmfzzxc0mebw >> 8);
                                    $Vj20gg5slcy5togid[$Vj20gg5slcy5 * 2 + 1] = chr($Vmfzzxc0mebw & 0xFF);
                                }

                                $Vhoifq2kocytidth = $V3h4z3hxorxj_obj->normalizeFUnit(isset($Veega4hhzixh[$Vmfzzxc0mebw]) ? $Veega4hhzixh[$Vmfzzxc0mebw][0] : $Veega4hhzixh[0][0]);
                                $V3h4z3hxorxj['CIDWidths'][$Vj20gg5slcy5] = $Vhoifq2kocytidth;
                            }

                            $V3h4z3hxorxj['CIDtoGID'] = base64_encode(gzcompress($Vj20gg5slcy5togid));
                            $V3h4z3hxorxj['CIDtoGID_Compressed'] = true;

                            $Vb3z3shnu1vn = file_get_contents($Vynpm04a4fx0_name);
                        } else {
                            $Vb3z3shnu1vn = file_get_contents($Vlh4o4dvepwk);
                        }

                        $V3h4z3hxorxj_obj->close();
                        unlink($Vynpm04a4fx0_name);
                    }

                    
                    $Vcki4t4qmybshis->numObj++;
                    $V3h4z3hxorxjDescriptorId = $Vcki4t4qmybshis->numObj;

                    $Vcki4t4qmybshis->numObj++;
                    $Vksopkgqixkyfbid = $Vcki4t4qmybshis->numObj;

                    
                    $Vp32irv4kujs = 0;

                    if ($V3h4z3hxorxj['ItalicAngle'] != 0) {
                        $Vp32irv4kujs += pow(2, 6);
                    }

                    if ($V3h4z3hxorxj['IsFixedPitch'] === 'true') {
                        $Vp32irv4kujs += 1;
                    }

                    $Vp32irv4kujs += pow(2, 5); 
                    $V10ravdmyvu2 = array(
                        'Ascent'       => 'Ascender',
                        'CapHeight'    => 'CapHeight',
                        'MissingWidth' => 'MissingWidth',
                        'Descent'      => 'Descender',
                        'FontBBox'     => 'FontBBox',
                        'ItalicAngle'  => 'ItalicAngle'
                    );
                    $V532jisjpta5 = array(
                        'Flags'    => $Vp32irv4kujs,
                        'FontName' => $Vrr3orqjztc2dobeFontName,
                        'StemV'    => $V2svjql3ae2z
                    );

                    foreach ($V10ravdmyvu2 as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                        if (isset($V3h4z3hxorxj[$Vpszt12nvbau])) {
                            $V532jisjpta5[$Vgu5dsd35kdp] = $V3h4z3hxorxj[$Vpszt12nvbau];
                        }
                    }

                    if ($V4saqrh43dhw === 'pfb') {
                        $V532jisjpta5['FontFile'] = $Vksopkgqixkyfbid;
                    } else {
                        if ($V4saqrh43dhw === 'ttf') {
                            $V532jisjpta5['FontFile2'] = $Vksopkgqixkyfbid;
                        }
                    }

                    $Vcki4t4qmybshis->o_fontDescriptor($V3h4z3hxorxjDescriptorId, 'new', $V532jisjpta5);

                    
                    $Vcki4t4qmybshis->o_contents($Vcki4t4qmybshis->numObj, 'new');
                    $Vcki4t4qmybshis->objects[$Vksopkgqixkyfbid]['c'] .= $Vb3z3shnu1vn;

                    
                    if ($V4saqrh43dhw === 'pfb') {
                        $Vd0wnk0nlcgi = strpos($Vb3z3shnu1vn, 'eexec') + 6;
                        $Vmm3rrvv2jeq = strpos($Vb3z3shnu1vn, '00000000') - $Vd0wnk0nlcgi;
                        $Vkf1fvslyagt = mb_strlen($Vb3z3shnu1vn, '8bit') - $Vmm3rrvv2jeq - $Vd0wnk0nlcgi;
                        $Vcki4t4qmybshis->o_contents(
                            $Vcki4t4qmybshis->numObj,
                            'add',
                            array('Length1' => $Vd0wnk0nlcgi, 'Length2' => $Vmm3rrvv2jeq, 'Length3' => $Vkf1fvslyagt)
                        );
                    } else {
                        if ($V4saqrh43dhw == 'ttf') {
                            $Vd0wnk0nlcgi = mb_strlen($Vb3z3shnu1vn, '8bit');
                            $Vcki4t4qmybshis->o_contents($Vcki4t4qmybshis->numObj, 'add', array('Length1' => $Vd0wnk0nlcgi));
                        }
                    }

                    
                    $Vynpm04a4fx0 = array(
                        'BaseFont'       => $Vrr3orqjztc2dobeFontName,
                        'MissingWidth'   => $Vequhpemwax5,
                        'Widths'         => $Vhoifq2kocytidthid,
                        'FirstChar'      => $Vgidepai0gmc,
                        'LastChar'       => $Vajdpjg0jwh4,
                        'FontDescriptor' => $V3h4z3hxorxjDescriptorId
                    );

                    if ($V4saqrh43dhw === 'ttf') {
                        $Vynpm04a4fx0['SubType'] = 'TrueType';
                    }

                    $Vcki4t4qmybshis->addMessage("adding extra info to font.($V3h4z3hxorxjObj)");

                    foreach ($Vynpm04a4fx0 as $V2j4cdxaokbs => $Vqsnymdeznwy) {
                        $Vcki4t4qmybshis->addMessage("$V2j4cdxaokbs : $Vqsnymdeznwy");
                    }

                    $Vcki4t4qmybshis->o_font($V3h4z3hxorxjObj, 'add', $Vynpm04a4fx0);
                } else {
                    $Vcki4t4qmybshis->addMessage(
                        'selectFont: pfb or ttf file not found, ok if this is one of the 14 standard fonts'
                    );
                }

                
                
                if (isset($Vi43cktvy0zi['differences'])) {
                    $V3h4z3hxorxj['differences'] = $Vi43cktvy0zi['differences'];
                }
            }
        }

        if ($Vb1jc3ulilu4 && isset($Vcki4t4qmybshis->fonts[$V3h4z3hxorxjName])) {
            
            $Vcki4t4qmybshis->currentBaseFont = $V3h4z3hxorxjName;

            
            
            $Vcki4t4qmybshis->currentFont = $Vcki4t4qmybshis->currentBaseFont;
            $Vcki4t4qmybshis->currentFontNum = $Vcki4t4qmybshis->fonts[$Vcki4t4qmybshis->currentFont]['fontNum'];

            
        }

        return $Vcki4t4qmybshis->currentFontNum;
        
    }

    
    private function setCurrentFont()
    {
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        $Vcki4t4qmybshis->currentFont = $Vcki4t4qmybshis->currentBaseFont;
        $Vcki4t4qmybshis->currentFontNum = $Vcki4t4qmybshis->fonts[$Vcki4t4qmybshis->currentFont]['fontNum'];
        
    }

    
    function getFirstPageId()
    {
        return $Vcki4t4qmybshis->firstPageId;
    }

    
    private function addContent($Vv03lfntnmczontent)
    {
        $Vcki4t4qmybshis->objects[$Vcki4t4qmybshis->currentContents]['c'] .= $Vv03lfntnmczontent;
    }

    
    function setColor($Vv03lfntnmczolor, $Vztyfnp5rh4r = false)
    {
        $V1qcutcuyu3mew_color = array($Vv03lfntnmczolor[0], $Vv03lfntnmczolor[1], $Vv03lfntnmczolor[2], isset($Vv03lfntnmczolor[3]) ? $Vv03lfntnmczolor[3] : null);

        if (!$Vztyfnp5rh4r && $Vcki4t4qmybshis->currentColor == $V1qcutcuyu3mew_color) {
            return;
        }

        if (isset($V1qcutcuyu3mew_color[3])) {
            
            $Vcki4t4qmybshis->addContent(vsprintf("\n%.3F %.3F %.3F %.3F k", $Vcki4t4qmybshis->currentColor));
        } else {
            if (isset($V1qcutcuyu3mew_color[2])) {
                
                $Vcki4t4qmybshis->addContent(vsprintf("\n%.3F %.3F %.3F rg", $V1qcutcuyu3mew_color));
            }
        }
    }

    
    function setFillRule($Viogzqjp34j0)
    {
        if (!in_array($Viogzqjp34j0, array("nonzero", "evenodd"))) {
            return;
        }

        $Vcki4t4qmybshis->fillRule = $Viogzqjp34j0;
    }

    
    function setStrokeColor($Vv03lfntnmczolor, $Vztyfnp5rh4r = false)
    {
        $V1qcutcuyu3mew_color = array($Vv03lfntnmczolor[0], $Vv03lfntnmczolor[1], $Vv03lfntnmczolor[2], isset($Vv03lfntnmczolor[3]) ? $Vv03lfntnmczolor[3] : null);

        if (!$Vztyfnp5rh4r && $Vcki4t4qmybshis->currentStrokeColor == $V1qcutcuyu3mew_color) {
            return;
        }

        if (isset($V1qcutcuyu3mew_color[3])) {
            
            $Vcki4t4qmybshis->addContent(vsprintf("\n%.3F %.3F %.3F %.3F K", $Vcki4t4qmybshis->currentStrokeColor));
        } else {
            if (isset($V1qcutcuyu3mew_color[2])) {
                
                $Vcki4t4qmybshis->addContent(vsprintf("\n%.3F %.3F %.3F RG", $V1qcutcuyu3mew_color));
            }
        }
    }

    
    function setGraphicsState($Vksopkgqixkyarameters)
    {
        
        
        $Vcki4t4qmybshis->numObj++;
        $Vcki4t4qmybshis->o_extGState($Vcki4t4qmybshis->numObj, 'new', $Vksopkgqixkyarameters);
        $Vcki4t4qmybshis->addContent("\n/GS$Vcki4t4qmybshis->numStates gs");
    }

    
    function setLineTransparency($Vgauloeyyiwd, $Vsz1vjk4tj2cpacity)
    {
        static $Vbz3vmbr1h2vlend_modes = array(
            "Normal",
            "Multiply",
            "Screen",
            "Overlay",
            "Darken",
            "Lighten",
            "ColorDogde",
            "ColorBurn",
            "HardLight",
            "SoftLight",
            "Difference",
            "Exclusion"
        );

        if (!in_array($Vgauloeyyiwd, $Vbz3vmbr1h2vlend_modes)) {
            $Vgauloeyyiwd = "Normal";
        }

        
        if ($Vgauloeyyiwd === $Vcki4t4qmybshis->currentLineTransparency["mode"] &&
            $Vsz1vjk4tj2cpacity == $Vcki4t4qmybshis->currentLineTransparency["opacity"]
        ) {
            return;
        }

        $Vcki4t4qmybshis->currentLineTransparency["mode"] = $Vgauloeyyiwd;
        $Vcki4t4qmybshis->currentLineTransparency["opacity"] = $Vsz1vjk4tj2cpacity;

        $Vi43cktvy0zi = array(
            "BM" => "/$Vgauloeyyiwd",
            "CA" => (float)$Vsz1vjk4tj2cpacity
        );

        $Vcki4t4qmybshis->setGraphicsState($Vi43cktvy0zi);
    }

    
    function setFillTransparency($Vgauloeyyiwd, $Vsz1vjk4tj2cpacity)
    {
        static $Vbz3vmbr1h2vlend_modes = array(
            "Normal",
            "Multiply",
            "Screen",
            "Overlay",
            "Darken",
            "Lighten",
            "ColorDogde",
            "ColorBurn",
            "HardLight",
            "SoftLight",
            "Difference",
            "Exclusion"
        );

        if (!in_array($Vgauloeyyiwd, $Vbz3vmbr1h2vlend_modes)) {
            $Vgauloeyyiwd = "Normal";
        }

        if ($Vgauloeyyiwd === $Vcki4t4qmybshis->currentFillTransparency["mode"] &&
            $Vsz1vjk4tj2cpacity == $Vcki4t4qmybshis->currentFillTransparency["opacity"]
        ) {
            return;
        }

        $Vcki4t4qmybshis->currentFillTransparency["mode"] = $Vgauloeyyiwd;
        $Vcki4t4qmybshis->currentFillTransparency["opacity"] = $Vsz1vjk4tj2cpacity;

        $Vi43cktvy0zi = array(
            "BM" => "/$Vgauloeyyiwd",
            "ca" => (float)$Vsz1vjk4tj2cpacity,
        );

        $Vcki4t4qmybshis->setGraphicsState($Vi43cktvy0zi);
    }

    function lineTo($Vs4gloy23a1d, $Vopgub02o3q2)
    {
        $Vcki4t4qmybshis->addContent(sprintf("\n%.3F %.3F l", $Vs4gloy23a1d, $Vopgub02o3q2));
    }

    function moveTo($Vs4gloy23a1d, $Vopgub02o3q2)
    {
        $Vcki4t4qmybshis->addContent(sprintf("\n%.3F %.3F m", $Vs4gloy23a1d, $Vopgub02o3q2));
    }

    
    function curveTo($Vjxqwkabkvag, $Vzdywlaebz1l, $Vs4gloy23a1d2, $Vopgub02o3q22, $Vs4gloy23a1d3, $Vopgub02o3q23)
    {
        $Vcki4t4qmybshis->addContent(sprintf("\n%.3F %.3F %.3F %.3F %.3F %.3F c", $Vjxqwkabkvag, $Vzdywlaebz1l, $Vs4gloy23a1d2, $Vopgub02o3q22, $Vs4gloy23a1d3, $Vopgub02o3q23));
    }

    
    function quadTo($Vv03lfntnmczpx, $Vv03lfntnmczpy, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        $Vcki4t4qmybshis->addContent(sprintf("\n%.3F %.3F %.3F %.3F v", $Vv03lfntnmczpx, $Vv03lfntnmczpy, $Vs4gloy23a1d, $Vopgub02o3q2));
    }

    function closePath()
    {
        $Vcki4t4qmybshis->addContent(' h');
    }

    function endPath()
    {
        $Vcki4t4qmybshis->addContent(' n');
    }

    
    function ellipse(
        $Vxkyhwivqsr4,
        $V3pe5qrlaiol,
        $Vflxal01hfm5,
        $Vmsjiwqai3ku = 0,
        $Vrr3orqjztc2ngle = 0,
        $V1qcutcuyu3mSeg = 8,
        $Vrr3orqjztc2start = 0,
        $Vrr3orqjztc2finish = 360,
        $Vv03lfntnmczlose = true,
        $Vm4rhtdms15t = false,
        $Vihuafvzvxcv = true,
        $V3xsptcgzss2ncomplete = false
    ) {
        if ($Vflxal01hfm5 == 0) {
            return;
        }

        if ($Vmsjiwqai3ku == 0) {
            $Vmsjiwqai3ku = $Vflxal01hfm5;
        }

        if ($V1qcutcuyu3mSeg < 2) {
            $V1qcutcuyu3mSeg = 2;
        }

        $Vrr3orqjztc2start = deg2rad((float)$Vrr3orqjztc2start);
        $Vrr3orqjztc2finish = deg2rad((float)$Vrr3orqjztc2finish);
        $Vcki4t4qmybsotalAngle = $Vrr3orqjztc2finish - $Vrr3orqjztc2start;

        $Vcyg5xmwfpxot = $Vcki4t4qmybsotalAngle / $V1qcutcuyu3mSeg;
        $Vcyg5xmwfpxotm = $Vcyg5xmwfpxot / 3;

        if ($Vrr3orqjztc2ngle != 0) {
            $Vrr3orqjztc2 = -1 * deg2rad((float)$Vrr3orqjztc2ngle);

            $Vcki4t4qmybshis->addContent(
                sprintf("\n q %.3F %.3F %.3F %.3F %.3F %.3F cm", cos($Vrr3orqjztc2), -sin($Vrr3orqjztc2), sin($Vrr3orqjztc2), cos($Vrr3orqjztc2), $Vxkyhwivqsr4, $V3pe5qrlaiol)
            );

            $Vxkyhwivqsr4 = 0;
            $V3pe5qrlaiol = 0;
        }

        $Vcki4t4qmybs1 = $Vrr3orqjztc2start;
        $Vrr3orqjztc20 = $Vxkyhwivqsr4 + $Vflxal01hfm5 * cos($Vcki4t4qmybs1);
        $Vbz3vmbr1h2v0 = $V3pe5qrlaiol + $Vmsjiwqai3ku * sin($Vcki4t4qmybs1);
        $Vv03lfntnmcz0 = -$Vflxal01hfm5 * sin($Vcki4t4qmybs1);
        $Vcyg5xmwfpxo0 = $Vmsjiwqai3ku * cos($Vcki4t4qmybs1);

        if (!$V3xsptcgzss2ncomplete) {
            $Vcki4t4qmybshis->addContent(sprintf("\n%.3F %.3F m ", $Vrr3orqjztc20, $Vbz3vmbr1h2v0));
        }

        for ($V3xsptcgzss2 = 1; $V3xsptcgzss2 <= $V1qcutcuyu3mSeg; $V3xsptcgzss2++) {
            
            $Vcki4t4qmybs1 = $V3xsptcgzss2 * $Vcyg5xmwfpxot + $Vrr3orqjztc2start;
            $Vrr3orqjztc21 = $Vxkyhwivqsr4 + $Vflxal01hfm5 * cos($Vcki4t4qmybs1);
            $Vbz3vmbr1h2v1 = $V3pe5qrlaiol + $Vmsjiwqai3ku * sin($Vcki4t4qmybs1);
            $Vv03lfntnmcz1 = -$Vflxal01hfm5 * sin($Vcki4t4qmybs1);
            $Vcyg5xmwfpxo1 = $Vmsjiwqai3ku * cos($Vcki4t4qmybs1);

            $Vcki4t4qmybshis->addContent(
                sprintf(
                    "\n%.3F %.3F %.3F %.3F %.3F %.3F c",
                    ($Vrr3orqjztc20 + $Vv03lfntnmcz0 * $Vcyg5xmwfpxotm),
                    ($Vbz3vmbr1h2v0 + $Vcyg5xmwfpxo0 * $Vcyg5xmwfpxotm),
                    ($Vrr3orqjztc21 - $Vv03lfntnmcz1 * $Vcyg5xmwfpxotm),
                    ($Vbz3vmbr1h2v1 - $Vcyg5xmwfpxo1 * $Vcyg5xmwfpxotm),
                    $Vrr3orqjztc21,
                    $Vbz3vmbr1h2v1
                )
            );

            $Vrr3orqjztc20 = $Vrr3orqjztc21;
            $Vbz3vmbr1h2v0 = $Vbz3vmbr1h2v1;
            $Vv03lfntnmcz0 = $Vv03lfntnmcz1;
            $Vcyg5xmwfpxo0 = $Vcyg5xmwfpxo1;
        }

        if (!$V3xsptcgzss2ncomplete) {
            if ($Vm4rhtdms15t) {
                $Vcki4t4qmybshis->addContent(' f');
            }

            if ($Vihuafvzvxcv) {
                if ($Vv03lfntnmczlose) {
                    $Vcki4t4qmybshis->addContent(' s'); 
                } else {
                    $Vcki4t4qmybshis->addContent(' S');
                }
            }
        }

        if ($Vrr3orqjztc2ngle != 0) {
            $Vcki4t4qmybshis->addContent(' Q');
        }
    }

    
    function setLineStyle($Vhoifq2kocytidth = 1, $Vv03lfntnmczap = '', $V0hg12l10vfxoin = '', $Vcyg5xmwfpxoash = '', $Vksopkgqixkyhase = 0)
    {
        
        $V5jic1hsgori = '';

        if ($Vhoifq2kocytidth > 0) {
            $V5jic1hsgori .= sprintf("%.3F w", $Vhoifq2kocytidth);
        }

        $Vv03lfntnmcza = array('butt' => 0, 'round' => 1, 'square' => 2);

        if (isset($Vv03lfntnmcza[$Vv03lfntnmczap])) {
            $V5jic1hsgori .= " $Vv03lfntnmcza[$Vv03lfntnmczap] J";
        }

        $V0hg12l10vfxa = array('miter' => 0, 'round' => 1, 'bevel' => 2);

        if (isset($V0hg12l10vfxa[$V0hg12l10vfxoin])) {
            $V5jic1hsgori .= " $V0hg12l10vfxa[$V0hg12l10vfxoin] j";
        }

        if (is_array($Vcyg5xmwfpxoash)) {
            $V5jic1hsgori .= ' [ ' . implode(' ', $Vcyg5xmwfpxoash) . " ] $Vksopkgqixkyhase d";
        }

        $Vcki4t4qmybshis->currentLineStyle = $V5jic1hsgori;
        $Vcki4t4qmybshis->addContent("\n$V5jic1hsgori");
    }

    function rect($Vjxqwkabkvag, $Vzdywlaebz1l, $Vhoifq2kocytidth, $Vku40chc0ddp)
    {
        $Vcki4t4qmybshis->addContent(sprintf("\n%.3F %.3F %.3F %.3F re", $Vjxqwkabkvag, $Vzdywlaebz1l, $Vhoifq2kocytidth, $Vku40chc0ddp));
    }

    function stroke()
    {
        $Vcki4t4qmybshis->addContent("\nS");
    }

    function fill()
    {
        $Vcki4t4qmybshis->addContent("\nf".($Vcki4t4qmybshis->fillRule === "evenodd" ? "*" : ""));
    }

    function fillStroke()
    {
        $Vcki4t4qmybshis->addContent("\nb".($Vcki4t4qmybshis->fillRule === "evenodd" ? "*" : ""));
    }

    
    function save()
    {
        $Vcki4t4qmybshis->addContent("\nq");
    }

    
    function restore()
    {
        $Vcki4t4qmybshis->addContent("\nQ");
    }

    
    function scale($Vvyyy23v5fb4, $V2fb2ve5h53x, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        $Vopgub02o3q2 = $Vcki4t4qmybshis->currentPageSize["height"] - $Vopgub02o3q2;

        $Vcki4t4qmybsm = array(
            $Vvyyy23v5fb4,            0,
            0,               $V2fb2ve5h53x,
            $Vs4gloy23a1d * (1 - $Vvyyy23v5fb4), $Vopgub02o3q2 * (1 - $V2fb2ve5h53x)
        );

        $Vcki4t4qmybshis->transform($Vcki4t4qmybsm);
    }

    
    function translate($Vcki4t4qmybs_x, $Vcki4t4qmybs_y)
    {
        $Vcki4t4qmybsm = array(
            1,    0,
            0,    1,
            $Vcki4t4qmybs_x, -$Vcki4t4qmybs_y
        );

        $Vcki4t4qmybshis->transform($Vcki4t4qmybsm);
    }

    
    function rotate($Vrr3orqjztc2ngle, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        $Vopgub02o3q2 = $Vcki4t4qmybshis->currentPageSize["height"] - $Vopgub02o3q2;

        $Vrr3orqjztc2 = deg2rad($Vrr3orqjztc2ngle);
        $Vv03lfntnmczos_a = cos($Vrr3orqjztc2);
        $Vgdmmikhhqfi = sin($Vrr3orqjztc2);

        $Vcki4t4qmybsm = array(
            $Vv03lfntnmczos_a,                         -$Vgdmmikhhqfi,
            $Vgdmmikhhqfi,                         $Vv03lfntnmczos_a,
            $Vs4gloy23a1d - $Vgdmmikhhqfi * $Vopgub02o3q2 - $Vv03lfntnmczos_a * $Vs4gloy23a1d, $Vopgub02o3q2 - $Vv03lfntnmczos_a * $Vopgub02o3q2 + $Vgdmmikhhqfi * $Vs4gloy23a1d,
        );

        $Vcki4t4qmybshis->transform($Vcki4t4qmybsm);
    }

    
    function skew($Vrr3orqjztc2ngle_x, $Vrr3orqjztc2ngle_y, $Vs4gloy23a1d, $Vopgub02o3q2)
    {
        $Vopgub02o3q2 = $Vcki4t4qmybshis->currentPageSize["height"] - $Vopgub02o3q2;

        $Vcki4t4qmybsan_x = tan(deg2rad($Vrr3orqjztc2ngle_x));
        $Vcki4t4qmybsan_y = tan(deg2rad($Vrr3orqjztc2ngle_y));

        $Vcki4t4qmybsm = array(
            1,           -$Vcki4t4qmybsan_y,
            -$Vcki4t4qmybsan_x,     1,
            $Vcki4t4qmybsan_x * $Vopgub02o3q2, $Vcki4t4qmybsan_y * $Vs4gloy23a1d,
        );

        $Vcki4t4qmybshis->transform($Vcki4t4qmybsm);
    }

    
    function transform($Vcki4t4qmybsm)
    {
        $Vcki4t4qmybshis->addContent(vsprintf("\n %.3F %.3F %.3F %.3F %.3F %.3F cm", $Vcki4t4qmybsm));
    }

    
    function newPage($V3xsptcgzss2nsert = 0, $Vkriocz2qep2 = 0, $Vksopkgqixkyos = 'after')
    {
        
        

        if ($Vcki4t4qmybshis->nStateStack) {
            for ($V3xsptcgzss2 = $Vcki4t4qmybshis->nStateStack; $V3xsptcgzss2 >= 1; $V3xsptcgzss2--) {
                $Vcki4t4qmybshis->restoreState($V3xsptcgzss2);
            }
        }

        $Vcki4t4qmybshis->numObj++;

        if ($V3xsptcgzss2nsert) {
            
            
            $V3n1cqnppzq4 = $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['onPage'];
            $Vsz1vjk4tj2cpt = array('rid' => $V3n1cqnppzq4, 'pos' => $Vksopkgqixkyos);
            $Vcki4t4qmybshis->o_page($Vcki4t4qmybshis->numObj, 'new', $Vsz1vjk4tj2cpt);
        } else {
            $Vcki4t4qmybshis->o_page($Vcki4t4qmybshis->numObj, 'new');
        }

        
        if ($Vcki4t4qmybshis->nStateStack) {
            for ($V3xsptcgzss2 = 1; $V3xsptcgzss2 <= $Vcki4t4qmybshis->nStateStack; $V3xsptcgzss2++) {
                $Vcki4t4qmybshis->saveState($V3xsptcgzss2);
            }
        }

        
        if (isset($Vcki4t4qmybshis->currentColor)) {
            $Vcki4t4qmybshis->setColor($Vcki4t4qmybshis->currentColor, true);
        }

        if (isset($Vcki4t4qmybshis->currentStrokeColor)) {
            $Vcki4t4qmybshis->setStrokeColor($Vcki4t4qmybshis->currentStrokeColor, true);
        }

        
        if (mb_strlen($Vcki4t4qmybshis->currentLineStyle, '8bit')) {
            $Vcki4t4qmybshis->addContent("\n$Vcki4t4qmybshis->currentLineStyle");
        }

        
        return $Vcki4t4qmybshis->currentContents;
    }

    
    function stream($Vi43cktvy0zi = '')
    {
        
        
        
        
        
        
        
        
        
        if (!is_array($Vi43cktvy0zi)) {
            $Vi43cktvy0zi = array();
        }

        if (headers_sent()) {
            die("Unable to stream pdf: headers already sent");
        }

        $Vpe1ucmbxygf = empty($Vi43cktvy0zi['compression']);
        $Vynpm04a4fx0 = ltrim($Vcki4t4qmybshis->output($Vpe1ucmbxygf));

        header("Cache-Control: private");
        header("Content-type: application/pdf");

        
        header("Content-Length: " . mb_strlen($Vynpm04a4fx0, '8bit'));
        $Vtkhurg4sowdName = (isset($Vi43cktvy0zi['Content-Disposition']) ? $Vi43cktvy0zi['Content-Disposition'] : 'file.pdf');

        if (!isset($Vi43cktvy0zi["Attachment"])) {
            $Vi43cktvy0zi["Attachment"] = true;
        }

        $Vrr3orqjztc2ttachment = $Vi43cktvy0zi["Attachment"] ? "attachment" : "inline";

        
        $Vgpqcvfkvgzo = mb_detect_encoding($Vtkhurg4sowdName);
        $V1dqjmexh5hm = mb_convert_encoding($Vtkhurg4sowdName, "ISO-8859-1", $Vgpqcvfkvgzo);
        $Vwie1theeeik = rawurlencode($V1dqjmexh5hm);
        $V3z01rts5dgi = rawurlencode($Vtkhurg4sowdName);

        header(
            "Content-Disposition: $Vrr3orqjztc2ttachment; filename=" . $Vwie1theeeik . "; filename*=UTF-8''$V3z01rts5dgi"
        );

        if (isset($Vi43cktvy0zi['Accept-Ranges']) && $Vi43cktvy0zi['Accept-Ranges'] == 1) {
            
            header("Accept-Ranges: " . mb_strlen($Vynpm04a4fx0, '8bit'));
        }

        echo $Vynpm04a4fx0;
        flush();
    }

    
    function getFontHeight($Vlak25col1u3)
    {
        if (!$Vcki4t4qmybshis->numFonts) {
            $Vcki4t4qmybshis->selectFont($Vcki4t4qmybshis->defaultFont);
        }

        $V3h4z3hxorxj = $Vcki4t4qmybshis->fonts[$Vcki4t4qmybshis->currentFont];

        
        if (isset($V3h4z3hxorxj['Ascender']) && isset($V3h4z3hxorxj['Descender'])) {
            $Vjlmjalejjxa = $V3h4z3hxorxj['Ascender'] - $V3h4z3hxorxj['Descender'];
        } else {
            $Vjlmjalejjxa = $V3h4z3hxorxj['FontBBox'][3] - $V3h4z3hxorxj['FontBBox'][1];
        }

        
        
        if (isset($V3h4z3hxorxj['FontHeightOffset'])) {
            
            
            
            
            
            
            
            $Vjlmjalejjxa += (int)$V3h4z3hxorxj['FontHeightOffset'];
        }

        return $Vlak25col1u3 * $Vjlmjalejjxa / 1000;
    }

    function getFontXHeight($Vlak25col1u3)
    {
        if (!$Vcki4t4qmybshis->numFonts) {
            $Vcki4t4qmybshis->selectFont($Vcki4t4qmybshis->defaultFont);
        }

        $V3h4z3hxorxj = $Vcki4t4qmybshis->fonts[$Vcki4t4qmybshis->currentFont];

        
        if (isset($V3h4z3hxorxj['XHeight'])) {
            $Vs4gloy23a1dh = $V3h4z3hxorxj['Ascender'] - $V3h4z3hxorxj['Descender'];
        } else {
            $Vs4gloy23a1dh = $Vcki4t4qmybshis->getFontHeight($Vlak25col1u3) / 2;
        }

        return $Vlak25col1u3 * $Vs4gloy23a1dh / 1000;
    }

    
    function getFontDescender($Vlak25col1u3)
    {
        
        if (!$Vcki4t4qmybshis->numFonts) {
            $Vcki4t4qmybshis->selectFont($Vcki4t4qmybshis->defaultFont);
        }

        
        $Vjlmjalejjxa = $Vcki4t4qmybshis->fonts[$Vcki4t4qmybshis->currentFont]['Descender'];

        return $Vlak25col1u3 * $Vjlmjalejjxa / 1000;
    }

    
    function filterText($Vcki4t4qmybsext, $Vbz3vmbr1h2vom = true, $Vv03lfntnmczonvert_encoding = true)
    {
        if (!$Vcki4t4qmybshis->numFonts) {
            $Vcki4t4qmybshis->selectFont($Vcki4t4qmybshis->defaultFont);
        }

        if ($Vv03lfntnmczonvert_encoding) {
            $Vv03lfntnmczf = $Vcki4t4qmybshis->currentFont;
            if (isset($Vcki4t4qmybshis->fonts[$Vv03lfntnmczf]) && $Vcki4t4qmybshis->fonts[$Vv03lfntnmczf]['isUnicode']) {
                
                $Vcki4t4qmybsext = $Vcki4t4qmybshis->utf8toUtf16BE($Vcki4t4qmybsext, $Vbz3vmbr1h2vom);
            } else {
                
                $Vcki4t4qmybsext = mb_convert_encoding($Vcki4t4qmybsext, self::$Vhncrog0sywc, 'UTF-8');
            }
        }

        
        return strtr($Vcki4t4qmybsext, array(')' => '\\)', '(' => '\\(', '\\' => '\\\\', chr(13) => '\r'));
    }

    
    private function getTextPosition($Vs4gloy23a1d, $Vopgub02o3q2, $Vrr3orqjztc2ngle, $Vlak25col1u3, $Vhoifq2kocyta, $Vcki4t4qmybsext)
    {
        
        $Vhoifq2kocyt = $Vcki4t4qmybshis->getTextWidth($Vlak25col1u3, $Vcki4t4qmybsext);

        
        $Vhoifq2kocytords = explode(' ', $Vcki4t4qmybsext);
        $V1qcutcuyu3mspaces = count($Vhoifq2kocytords) - 1;
        $Vhoifq2kocyt += $Vhoifq2kocyta * $V1qcutcuyu3mspaces;
        $Vrr3orqjztc2 = deg2rad((float)$Vrr3orqjztc2ngle);

        return array(cos($Vrr3orqjztc2) * $Vhoifq2kocyt + $Vs4gloy23a1d, -sin($Vrr3orqjztc2) * $Vhoifq2kocyt + $Vopgub02o3q2);
    }

    
    function toUpper($Vyupu15qqw5ces)
    {
        return mb_strtoupper($Vyupu15qqw5ces[0]);
    }

    function concatMatches($Vyupu15qqw5ces)
    {
        $Vadkcwffkfxw = "";
        foreach ($Vyupu15qqw5ces as $Vyupu15qqw5c) {
            $Vadkcwffkfxw .= $Vyupu15qqw5c[0];
        }

        return $Vadkcwffkfxw;
    }

    
    function registerText($V3h4z3hxorxj, $Vcki4t4qmybsext)
    {
        if (!$Vcki4t4qmybshis->isUnicode || in_array(mb_strtolower(basename($V3h4z3hxorxj)), self::$V511ytr5ole2)) {
            return;
        }

        if (!isset($Vcki4t4qmybshis->stringSubsets[$V3h4z3hxorxj])) {
            $Vcki4t4qmybshis->stringSubsets[$V3h4z3hxorxj] = array();
        }

        $Vcki4t4qmybshis->stringSubsets[$V3h4z3hxorxj] = array_unique(
            array_merge($Vcki4t4qmybshis->stringSubsets[$V3h4z3hxorxj], $Vcki4t4qmybshis->utf8toCodePointsArray($Vcki4t4qmybsext))
        );
    }

    
    function addText($Vs4gloy23a1d, $Vopgub02o3q2, $Vlak25col1u3, $Vcki4t4qmybsext, $Vrr3orqjztc2ngle = 0, $V2odl0400jfx = 0, $Vbbfdf0et0cn = 0, $Vma13dsbwl2y = false)
    {
        if (!$Vcki4t4qmybshis->numFonts) {
            $Vcki4t4qmybshis->selectFont($Vcki4t4qmybshis->defaultFont);
        }

        $Vcki4t4qmybsext = str_replace(array("\r", "\n"), "", $Vcki4t4qmybsext);

        if ($Vma13dsbwl2y) {
            preg_match_all("/(\P{Ll}+)/u", $Vcki4t4qmybsext, $Vyupu15qqw5ces, PREG_SET_ORDER);
            $Vcdncpyqhakh = $Vcki4t4qmybshis->concatMatches($Vyupu15qqw5ces);
            d($Vcdncpyqhakh);

            preg_match_all("/(\p{Ll}+)/u", $Vcki4t4qmybsext, $Vyupu15qqw5ces, PREG_SET_ORDER);
            $Vsz1vjk4tj2cther = $Vcki4t4qmybshis->concatMatches($Vyupu15qqw5ces);
            d($Vsz1vjk4tj2cther);

            
        }

        
        if ($Vcki4t4qmybshis->nCallback > 0) {
            for ($V3xsptcgzss2 = $Vcki4t4qmybshis->nCallback; $V3xsptcgzss2 > 0; $V3xsptcgzss2--) {
                
                $V3xsptcgzss2nfo = array(
                    'x'         => $Vs4gloy23a1d,
                    'y'         => $Vopgub02o3q2,
                    'angle'     => $Vrr3orqjztc2ngle,
                    'status'    => 'sol',
                    'p'         => $Vcki4t4qmybshis->callback[$V3xsptcgzss2]['p'],
                    'nCallback' => $Vcki4t4qmybshis->callback[$V3xsptcgzss2]['nCallback'],
                    'height'    => $Vcki4t4qmybshis->callback[$V3xsptcgzss2]['height'],
                    'descender' => $Vcki4t4qmybshis->callback[$V3xsptcgzss2]['descender']
                );

                $Vhhv3tomoeyc = $Vcki4t4qmybshis->callback[$V3xsptcgzss2]['f'];
                $Vcki4t4qmybshis->$Vhhv3tomoeyc($V3xsptcgzss2nfo);
            }
        }

        if ($Vrr3orqjztc2ngle == 0) {
            $Vcki4t4qmybshis->addContent(sprintf("\nBT %.3F %.3F Td", $Vs4gloy23a1d, $Vopgub02o3q2));
        } else {
            $Vrr3orqjztc2 = deg2rad((float)$Vrr3orqjztc2ngle);
            $Vcki4t4qmybshis->addContent(
                sprintf("\nBT %.3F %.3F %.3F %.3F %.3F %.3F Tm", cos($Vrr3orqjztc2), -sin($Vrr3orqjztc2), sin($Vrr3orqjztc2), cos($Vrr3orqjztc2), $Vs4gloy23a1d, $Vopgub02o3q2)
            );
        }

        if ($V2odl0400jfx != 0 || $V2odl0400jfx != $Vcki4t4qmybshis->wordSpaceAdjust) {
            $Vcki4t4qmybshis->wordSpaceAdjust = $V2odl0400jfx;
            $Vcki4t4qmybshis->addContent(sprintf(" %.3F Tw", $V2odl0400jfx));
        }

        if ($Vbbfdf0et0cn != 0 || $Vbbfdf0et0cn != $Vcki4t4qmybshis->charSpaceAdjust) {
            $Vcki4t4qmybshis->charSpaceAdjust = $Vbbfdf0et0cn;
            $Vcki4t4qmybshis->addContent(sprintf(" %.3F Tc", $Vbbfdf0et0cn));
        }

        $V1st2w4mm2ug = mb_strlen($Vcki4t4qmybsext);
        $Vn0xvbhzyr1e = 0;

        if ($Vn0xvbhzyr1e < $V1st2w4mm2ug) {
            $Vksopkgqixkyart = $Vcki4t4qmybsext; 
            $Vksopkgqixkylace_text = $Vcki4t4qmybshis->filterText($Vksopkgqixkyart, false);
            
            $Vv03lfntnmczf = $Vcki4t4qmybshis->currentFont;
            if ($Vcki4t4qmybshis->fonts[$Vv03lfntnmczf]['isUnicode'] && $V2odl0400jfx != 0) {
                $Vaqfpbb0q4el = 1000 / $Vlak25col1u3;
                
                $Vksopkgqixkylace_text = str_replace(' ', ' ) ' . (-round($Vaqfpbb0q4el * $V2odl0400jfx)) . ' (', $Vksopkgqixkylace_text);
            }
            $Vcki4t4qmybshis->addContent(" /F$Vcki4t4qmybshis->currentFontNum " . sprintf('%.1F Tf ', $Vlak25col1u3));
            $Vcki4t4qmybshis->addContent(" [($Vksopkgqixkylace_text)] TJ");
        }

        $Vcki4t4qmybshis->addContent(' ET');

        
        if ($Vcki4t4qmybshis->nCallback > 0) {
            for ($V3xsptcgzss2 = $Vcki4t4qmybshis->nCallback; $V3xsptcgzss2 > 0; $V3xsptcgzss2--) {
                
                $Vynpm04a4fx0 = $Vcki4t4qmybshis->getTextPosition($Vs4gloy23a1d, $Vopgub02o3q2, $Vrr3orqjztc2ngle, $Vlak25col1u3, $V2odl0400jfx, $Vcki4t4qmybsext);
                $V3xsptcgzss2nfo = array(
                    'x'         => $Vynpm04a4fx0[0],
                    'y'         => $Vynpm04a4fx0[1],
                    'angle'     => $Vrr3orqjztc2ngle,
                    'status'    => 'eol',
                    'p'         => $Vcki4t4qmybshis->callback[$V3xsptcgzss2]['p'],
                    'nCallback' => $Vcki4t4qmybshis->callback[$V3xsptcgzss2]['nCallback'],
                    'height'    => $Vcki4t4qmybshis->callback[$V3xsptcgzss2]['height'],
                    'descender' => $Vcki4t4qmybshis->callback[$V3xsptcgzss2]['descender']
                );
                $Vhhv3tomoeyc = $Vcki4t4qmybshis->callback[$V3xsptcgzss2]['f'];
                $Vcki4t4qmybshis->$Vhhv3tomoeyc($V3xsptcgzss2nfo);
            }
        }
    }

    
    function getTextWidth($Vlak25col1u3, $Vcki4t4qmybsext, $Vhoifq2kocytord_spacing = 0, $Vv03lfntnmczhar_spacing = 0)
    {
        static $Vsz1vjk4tj2crd_cache = array();

        
        
        
        $Vdaxiqttej1d = $Vcki4t4qmybshis->currentTextState;

        if (!$Vcki4t4qmybshis->numFonts) {
            $Vcki4t4qmybshis->selectFont($Vcki4t4qmybshis->defaultFont);
        }

        $Vcki4t4qmybsext = str_replace(array("\r", "\n"), "", $Vcki4t4qmybsext);

        
        $Vcki4t4qmybsext = "$Vcki4t4qmybsext";

        
        
        $Vhoifq2kocyt = 0;
        $Vv03lfntnmczf = $Vcki4t4qmybshis->currentFont;
        $Vv03lfntnmczurrent_font = $Vcki4t4qmybshis->fonts[$Vv03lfntnmczf];
        $Vaqfpbb0q4el = 1000 / ($Vlak25col1u3 > 0 ? $Vlak25col1u3 : 1);
        $V1qcutcuyu3m_spaces = 0;

        if ($Vv03lfntnmczurrent_font['isUnicode']) {
            
            
            $Vnuoybo0aifl = $Vcki4t4qmybshis->utf8toCodePointsArray($Vcki4t4qmybsext);

            foreach ($Vnuoybo0aifl as $Vv03lfntnmczhar) {
                
                if (isset($Vv03lfntnmczurrent_font['differences'][$Vv03lfntnmczhar])) {
                    $Vv03lfntnmczhar = $Vv03lfntnmczurrent_font['differences'][$Vv03lfntnmczhar];
                }

                if (isset($Vv03lfntnmczurrent_font['C'][$Vv03lfntnmczhar])) {
                    $Vv03lfntnmczhar_width = $Vv03lfntnmczurrent_font['C'][$Vv03lfntnmczhar];

                    
                    $Vhoifq2kocyt += $Vv03lfntnmczhar_width;

                    
                    if (isset($Vv03lfntnmczurrent_font['codeToName'][$Vv03lfntnmczhar]) && $Vv03lfntnmczurrent_font['codeToName'][$Vv03lfntnmczhar] === 'space') {  
                        $Vhoifq2kocyt += $Vhoifq2kocytord_spacing * $Vaqfpbb0q4el;
                        $V1qcutcuyu3m_spaces++;
                    }
                }
            }

            
            if ($Vv03lfntnmczhar_spacing != 0) {
                $Vhoifq2kocyt += $Vv03lfntnmczhar_spacing * $Vaqfpbb0q4el * (count($Vnuoybo0aifl) + $V1qcutcuyu3m_spaces);
            }

        } else {
            
            if ($Vcki4t4qmybshis->isUnicode) {
                $Vcki4t4qmybsext = mb_convert_encoding($Vcki4t4qmybsext, 'Windows-1252', 'UTF-8');
            }

            $V1st2w4mm2ug = mb_strlen($Vcki4t4qmybsext, 'Windows-1252');

            for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $V1st2w4mm2ug; $V3xsptcgzss2++) {
                $Vv03lfntnmcz = $Vcki4t4qmybsext[$V3xsptcgzss2];
                $Vv03lfntnmczhar = isset($Vsz1vjk4tj2crd_cache[$Vv03lfntnmcz]) ? $Vsz1vjk4tj2crd_cache[$Vv03lfntnmcz] : ($Vsz1vjk4tj2crd_cache[$Vv03lfntnmcz] = ord($Vv03lfntnmcz));

                
                if (isset($Vv03lfntnmczurrent_font['differences'][$Vv03lfntnmczhar])) {
                    $Vv03lfntnmczhar = $Vv03lfntnmczurrent_font['differences'][$Vv03lfntnmczhar];
                }

                if (isset($Vv03lfntnmczurrent_font['C'][$Vv03lfntnmczhar])) {
                    $Vv03lfntnmczhar_width = $Vv03lfntnmczurrent_font['C'][$Vv03lfntnmczhar];

                    
                    $Vhoifq2kocyt += $Vv03lfntnmczhar_width;

                    
                    if (isset($Vv03lfntnmczurrent_font['codeToName'][$Vv03lfntnmczhar]) && $Vv03lfntnmczurrent_font['codeToName'][$Vv03lfntnmczhar] === 'space') {  
                        $Vhoifq2kocyt += $Vhoifq2kocytord_spacing * $Vaqfpbb0q4el;
                        $V1qcutcuyu3m_spaces++;
                    }
                }
            }

            
            if ($Vv03lfntnmczhar_spacing != 0) {
                $Vhoifq2kocyt += $Vv03lfntnmczhar_spacing * $Vaqfpbb0q4el * ($V1st2w4mm2ug + $V1qcutcuyu3m_spaces);
            }
        }

        $Vcki4t4qmybshis->currentTextState = $Vdaxiqttej1d;
        $Vcki4t4qmybshis->setCurrentFont();

        return $Vhoifq2kocyt * $Vlak25col1u3 / 1000;
    }

    
    function saveState($VksopkgqixkyageEnd = 0)
    {
        if ($VksopkgqixkyageEnd) {
            
            
            
            $Vsz1vjk4tj2cpt = $Vcki4t4qmybshis->stateStack[$VksopkgqixkyageEnd];
            
            $Vcki4t4qmybshis->setColor($Vsz1vjk4tj2cpt['col'], true);
            $Vcki4t4qmybshis->setStrokeColor($Vsz1vjk4tj2cpt['str'], true);
            $Vcki4t4qmybshis->addContent("\n" . $Vsz1vjk4tj2cpt['lin']);
            
        } else {
            $Vcki4t4qmybshis->nStateStack++;
            $Vcki4t4qmybshis->stateStack[$Vcki4t4qmybshis->nStateStack] = array(
                'col' => $Vcki4t4qmybshis->currentColor,
                'str' => $Vcki4t4qmybshis->currentStrokeColor,
                'lin' => $Vcki4t4qmybshis->currentLineStyle
            );
        }

        $Vcki4t4qmybshis->save();
    }

    
    function restoreState($VksopkgqixkyageEnd = 0)
    {
        if (!$VksopkgqixkyageEnd) {
            $V1qcutcuyu3m = $Vcki4t4qmybshis->nStateStack;
            $Vcki4t4qmybshis->currentColor = $Vcki4t4qmybshis->stateStack[$V1qcutcuyu3m]['col'];
            $Vcki4t4qmybshis->currentStrokeColor = $Vcki4t4qmybshis->stateStack[$V1qcutcuyu3m]['str'];
            $Vcki4t4qmybshis->addContent("\n" . $Vcki4t4qmybshis->stateStack[$V1qcutcuyu3m]['lin']);
            $Vcki4t4qmybshis->currentLineStyle = $Vcki4t4qmybshis->stateStack[$V1qcutcuyu3m]['lin'];
            $Vcki4t4qmybshis->stateStack[$V1qcutcuyu3m] = null;
            unset($Vcki4t4qmybshis->stateStack[$V1qcutcuyu3m]);
            $Vcki4t4qmybshis->nStateStack--;
        }

        $Vcki4t4qmybshis->restore();
    }

    
    function openObject()
    {
        $Vcki4t4qmybshis->nStack++;
        $Vcki4t4qmybshis->stack[$Vcki4t4qmybshis->nStack] = array('c' => $Vcki4t4qmybshis->currentContents, 'p' => $Vcki4t4qmybshis->currentPage);
        
        $Vcki4t4qmybshis->numObj++;
        $Vcki4t4qmybshis->o_contents($Vcki4t4qmybshis->numObj, 'new');
        $Vcki4t4qmybshis->currentContents = $Vcki4t4qmybshis->numObj;
        $Vcki4t4qmybshis->looseObjects[$Vcki4t4qmybshis->numObj] = 1;

        return $Vcki4t4qmybshis->numObj;
    }

    
    function reopenObject($Vkriocz2qep2)
    {
        $Vcki4t4qmybshis->nStack++;
        $Vcki4t4qmybshis->stack[$Vcki4t4qmybshis->nStack] = array('c' => $Vcki4t4qmybshis->currentContents, 'p' => $Vcki4t4qmybshis->currentPage);
        $Vcki4t4qmybshis->currentContents = $Vkriocz2qep2;

        
        if (isset($Vcki4t4qmybshis->objects[$Vkriocz2qep2]['onPage'])) {
            $Vcki4t4qmybshis->currentPage = $Vcki4t4qmybshis->objects[$Vkriocz2qep2]['onPage'];
        }
    }

    
    function closeObject()
    {
        
        
        if ($Vcki4t4qmybshis->nStack > 0) {
            $Vcki4t4qmybshis->currentContents = $Vcki4t4qmybshis->stack[$Vcki4t4qmybshis->nStack]['c'];
            $Vcki4t4qmybshis->currentPage = $Vcki4t4qmybshis->stack[$Vcki4t4qmybshis->nStack]['p'];
            $Vcki4t4qmybshis->nStack--;
            
            
        }
    }

    
    function stopObject($Vkriocz2qep2)
    {
        
        
        if (isset($Vcki4t4qmybshis->addLooseObjects[$Vkriocz2qep2])) {
            $Vcki4t4qmybshis->addLooseObjects[$Vkriocz2qep2] = '';
        }
    }

    
    function addObject($Vkriocz2qep2, $Vi43cktvy0zi = 'add')
    {
        
        if (isset($Vcki4t4qmybshis->looseObjects[$Vkriocz2qep2]) && $Vcki4t4qmybshis->currentContents != $Vkriocz2qep2) {
            
            switch ($Vi43cktvy0zi) {
                case 'all':
                    
                    
                    $Vcki4t4qmybshis->addLooseObjects[$Vkriocz2qep2] = 'all';

                case 'add':
                    if (isset($Vcki4t4qmybshis->objects[$Vcki4t4qmybshis->currentContents]['onPage'])) {
                        
                        
                        $Vcki4t4qmybshis->o_page($Vcki4t4qmybshis->objects[$Vcki4t4qmybshis->currentContents]['onPage'], 'content', $Vkriocz2qep2);
                    }
                    break;

                case 'even':
                    $Vcki4t4qmybshis->addLooseObjects[$Vkriocz2qep2] = 'even';
                    $VksopkgqixkyageObjectId = $Vcki4t4qmybshis->objects[$Vcki4t4qmybshis->currentContents]['onPage'];
                    if ($Vcki4t4qmybshis->objects[$VksopkgqixkyageObjectId]['info']['pageNum'] % 2 == 0) {
                        $Vcki4t4qmybshis->addObject($Vkriocz2qep2);
                        
                    }
                    break;

                case 'odd':
                    $Vcki4t4qmybshis->addLooseObjects[$Vkriocz2qep2] = 'odd';
                    $VksopkgqixkyageObjectId = $Vcki4t4qmybshis->objects[$Vcki4t4qmybshis->currentContents]['onPage'];
                    if ($Vcki4t4qmybshis->objects[$VksopkgqixkyageObjectId]['info']['pageNum'] % 2 == 1) {
                        $Vcki4t4qmybshis->addObject($Vkriocz2qep2);
                        
                    }
                    break;

                case 'next':
                    $Vcki4t4qmybshis->addLooseObjects[$Vkriocz2qep2] = 'all';
                    break;

                case 'nexteven':
                    $Vcki4t4qmybshis->addLooseObjects[$Vkriocz2qep2] = 'even';
                    break;

                case 'nextodd':
                    $Vcki4t4qmybshis->addLooseObjects[$Vkriocz2qep2] = 'odd';
                    break;
            }
        }
    }

    
    function serializeObject($Vkriocz2qep2)
    {
        if (array_key_exists($Vkriocz2qep2, $Vcki4t4qmybshis->objects)) {
            return serialize($Vcki4t4qmybshis->objects[$Vkriocz2qep2]);
        }
    }

    
    function restoreSerializedObject($Vsz1vjk4tj2cbj)
    {
        $Vsz1vjk4tj2cbj_id = $Vcki4t4qmybshis->openObject();
        $Vcki4t4qmybshis->objects[$Vsz1vjk4tj2cbj_id] = unserialize($Vsz1vjk4tj2cbj);
        $Vcki4t4qmybshis->closeObject();

        return $Vsz1vjk4tj2cbj_id;
    }

    
    function addInfo($V4qeqspuux02, $Vpszt12nvbaualue = 0)
    {
        
        
        
        
        if (is_array($V4qeqspuux02)) {
            foreach ($V4qeqspuux02 as $V3nb02w01gr5 => $Vpszt12nvbau) {
                $Vcki4t4qmybshis->o_info($Vcki4t4qmybshis->infoObject, $V3nb02w01gr5, $Vpszt12nvbau);
            }
        } else {
            $Vcki4t4qmybshis->o_info($Vcki4t4qmybshis->infoObject, $V4qeqspuux02, $Vpszt12nvbaualue);
        }
    }

    
    function setPreferences($V4qeqspuux02, $Vpszt12nvbaualue = 0)
    {
        
        if (is_array($V4qeqspuux02)) {
            foreach ($V4qeqspuux02 as $V3nb02w01gr5 => $Vpszt12nvbau) {
                $Vcki4t4qmybshis->o_catalog($Vcki4t4qmybshis->catalogId, 'viewerPreferences', array($V3nb02w01gr5 => $Vpszt12nvbau));
            }
        } else {
            $Vcki4t4qmybshis->o_catalog($Vcki4t4qmybshis->catalogId, 'viewerPreferences', array($V4qeqspuux02 => $Vpszt12nvbaualue));
        }
    }

    
    private function getBytes(&$Vb3z3shnu1vn, $Vksopkgqixkyos, $Vxnixw2qni35)
    {
        
        $Vc00k54nbbvf = 0;
        for ($V3xsptcgzss2 = 0; $V3xsptcgzss2 < $Vxnixw2qni35; $V3xsptcgzss2++) {
            $Vc00k54nbbvf *= 256;
            $Vc00k54nbbvf += ord($Vb3z3shnu1vn[$Vksopkgqixkyos + $V3xsptcgzss2]);
        }

        return $Vc00k54nbbvf;
    }

    
    function image_iscached($V3xsptcgzss2mgname)
    {
        return isset($Vcki4t4qmybshis->imagelist[$V3xsptcgzss2mgname]);
    }

    
    function addImagePng($Vtkhurg4sowd, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt = 0.0, $Vjlmjalejjxa = 0.0, &$V3xsptcgzss2mg, $V3xsptcgzss2s_mask = false, $Ve1y5aych2ii = null)
    {
        if (!function_exists("imagepng")) {
            throw new Exception("The PHP GD extension is required, but is not installed.");
        }

        
        if (isset($Vcki4t4qmybshis->imagelist[$Vtkhurg4sowd])) {
            $Vb3z3shnu1vn = null;
        } else {
            
            
            
            
            
            
            
            
            
            

            
            imagesavealpha($V3xsptcgzss2mg, false);

            $V4eft4yxa3zs = 0;

            ob_start();
            @imagepng($V3xsptcgzss2mg);
            $Vb3z3shnu1vn = ob_get_clean();

            if ($Vb3z3shnu1vn == '') {
                $V4eft4yxa3zs = 1;
                $V4eft4yxa3zsmsg = 'trouble writing file from GD';
            }

            if ($V4eft4yxa3zs) {
                $Vcki4t4qmybshis->addMessage('PNG error - (' . $Vtkhurg4sowd . ') ' . $V4eft4yxa3zsmsg);

                return;
            }
        }  

        $Vcki4t4qmybshis->addPngFromBuf($Vtkhurg4sowd, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vb3z3shnu1vn, $V3xsptcgzss2s_mask, $Ve1y5aych2ii);
    }

    protected function addImagePngAlpha($Vtkhurg4sowd, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vbz3vmbr1h2vyte)
    {
        
        $V3xsptcgzss2mg = imagecreatefrompng($Vtkhurg4sowd);

        if ($V3xsptcgzss2mg === false) {
            return;
        }

        
        $Vvljiohyt4jf = ($Vbz3vmbr1h2vyte & 4) !== 4;

        $Vhoifq2kocytpx = imagesx($V3xsptcgzss2mg);
        $Vjlmjalejjxapx = imagesy($V3xsptcgzss2mg);

        imagesavealpha($V3xsptcgzss2mg, false);

        
        $Vcki4t4qmybsempfile_alpha = tempnam($Vcki4t4qmybshis->tmp, "cpdf_img_");
        @unlink($Vcki4t4qmybsempfile_alpha);
        $Vcki4t4qmybsempfile_alpha = "$Vcki4t4qmybsempfile_alpha.png";

        
        $Vcki4t4qmybsempfile_plain = tempnam($Vcki4t4qmybshis->tmp, "cpdf_img_");
        @unlink($Vcki4t4qmybsempfile_plain);
        $Vcki4t4qmybsempfile_plain = "$Vcki4t4qmybsempfile_plain.png";

        $V3xsptcgzss2mgalpha = imagecreate($Vhoifq2kocytpx, $Vjlmjalejjxapx);
        imagesavealpha($V3xsptcgzss2mgalpha, false);

        
        for ($Vv03lfntnmcz = 0; $Vv03lfntnmcz < 256; ++$Vv03lfntnmcz) {
            imagecolorallocate($V3xsptcgzss2mgalpha, $Vv03lfntnmcz, $Vv03lfntnmcz, $Vv03lfntnmcz);
        }

        
        if (extension_loaded("gmagick")) {
            $Vamrolmtkq3q = new Gmagick($Vtkhurg4sowd);
            $Vamrolmtkq3q->setimageformat('png');

            
            $Vrr3orqjztc2lpha_channel_neg = clone $Vamrolmtkq3q;
            $Vrr3orqjztc2lpha_channel_neg->separateimagechannel(Gmagick::CHANNEL_OPACITY);

            
            $Vrr3orqjztc2lpha_channel = new Gmagick();
            $Vrr3orqjztc2lpha_channel->newimage($Vhoifq2kocytpx, $Vjlmjalejjxapx, "#FFFFFF", "png");
            $Vrr3orqjztc2lpha_channel->compositeimage($Vrr3orqjztc2lpha_channel_neg, Gmagick::COMPOSITE_DIFFERENCE, 0, 0);
            $Vrr3orqjztc2lpha_channel->separateimagechannel(Gmagick::CHANNEL_RED);
            $Vrr3orqjztc2lpha_channel->writeimage($Vcki4t4qmybsempfile_alpha);

            
            $V3xsptcgzss2mgalpha_ = imagecreatefrompng($Vcki4t4qmybsempfile_alpha);
            imagecopy($V3xsptcgzss2mgalpha, $V3xsptcgzss2mgalpha_, 0, 0, 0, 0, $Vhoifq2kocytpx, $Vjlmjalejjxapx);
            imagedestroy($V3xsptcgzss2mgalpha_);
            imagepng($V3xsptcgzss2mgalpha, $Vcki4t4qmybsempfile_alpha);

            
            $Vv03lfntnmczolor_channels = new Gmagick();
            $Vv03lfntnmczolor_channels->newimage($Vhoifq2kocytpx, $Vjlmjalejjxapx, "#FFFFFF", "png");
            $Vv03lfntnmczolor_channels->compositeimage($Vamrolmtkq3q, Gmagick::COMPOSITE_COPYRED, 0, 0);
            $Vv03lfntnmczolor_channels->compositeimage($Vamrolmtkq3q, Gmagick::COMPOSITE_COPYGREEN, 0, 0);
            $Vv03lfntnmczolor_channels->compositeimage($Vamrolmtkq3q, Gmagick::COMPOSITE_COPYBLUE, 0, 0);
            $Vv03lfntnmczolor_channels->writeimage($Vcki4t4qmybsempfile_plain);

            $V3xsptcgzss2mgplain = imagecreatefrompng($Vcki4t4qmybsempfile_plain);
        } 
        elseif (extension_loaded("imagick")) {
            
            
            static $V3xsptcgzss2magickClonable = null;
            if ($V3xsptcgzss2magickClonable === null) {
                $V3xsptcgzss2magickClonable = version_compare(phpversion('imagick'), '3.0.1rc1') > 0;
            }

            $V3xsptcgzss2magick = new Imagick($Vtkhurg4sowd);
            $V3xsptcgzss2magick->setFormat('png');

            
            $Vrr3orqjztc2lpha_channel = $V3xsptcgzss2magickClonable ? clone $V3xsptcgzss2magick : $V3xsptcgzss2magick->clone();
            $Vrr3orqjztc2lpha_channel->separateImageChannel(Imagick::CHANNEL_ALPHA);
            $Vrr3orqjztc2lpha_channel->negateImage(true);
            $Vrr3orqjztc2lpha_channel->writeImage($Vcki4t4qmybsempfile_alpha);

            
            $V3xsptcgzss2mgalpha_ = imagecreatefrompng($Vcki4t4qmybsempfile_alpha);
            imagecopy($V3xsptcgzss2mgalpha, $V3xsptcgzss2mgalpha_, 0, 0, 0, 0, $Vhoifq2kocytpx, $Vjlmjalejjxapx);
            imagedestroy($V3xsptcgzss2mgalpha_);
            imagepng($V3xsptcgzss2mgalpha, $Vcki4t4qmybsempfile_alpha);

            
            $Vv03lfntnmczolor_channels = new Imagick();
            $Vv03lfntnmczolor_channels->newImage($Vhoifq2kocytpx, $Vjlmjalejjxapx, "#FFFFFF", "png");
            $Vv03lfntnmczolor_channels->compositeImage($V3xsptcgzss2magick, Imagick::COMPOSITE_COPYRED, 0, 0);
            $Vv03lfntnmczolor_channels->compositeImage($V3xsptcgzss2magick, Imagick::COMPOSITE_COPYGREEN, 0, 0);
            $Vv03lfntnmczolor_channels->compositeImage($V3xsptcgzss2magick, Imagick::COMPOSITE_COPYBLUE, 0, 0);
            $Vv03lfntnmczolor_channels->writeImage($Vcki4t4qmybsempfile_plain);

            $V3xsptcgzss2mgplain = imagecreatefrompng($Vcki4t4qmybsempfile_plain);
        } else {
            
            $Vrr3orqjztc2llocated_colors = array();

            
            for ($Vs4gloy23a1dpx = 0; $Vs4gloy23a1dpx < $Vhoifq2kocytpx; ++$Vs4gloy23a1dpx) {
                for ($Vopgub02o3q2px = 0; $Vopgub02o3q2px < $Vjlmjalejjxapx; ++$Vopgub02o3q2px) {
                    $Vv03lfntnmczolor = imagecolorat($V3xsptcgzss2mg, $Vs4gloy23a1dpx, $Vopgub02o3q2px);
                    $Vv03lfntnmczol = imagecolorsforindex($V3xsptcgzss2mg, $Vv03lfntnmczolor);
                    $Vrr3orqjztc2lpha = $Vv03lfntnmczol['alpha'];

                    if ($Vvljiohyt4jf) {
                        
                        $Vgskqx0pbz4f = 2.2;
                        $Vksopkgqixkyixel = pow((((127 - $Vrr3orqjztc2lpha) * 255 / 127) / 255), $Vgskqx0pbz4f) * 255;
                    } else {
                        
                        $Vksopkgqixkyixel = (127 - $Vrr3orqjztc2lpha) * 2;

                        $Vgu5dsd35kdpey = $Vv03lfntnmczol['red'] . $Vv03lfntnmczol['green'] . $Vv03lfntnmczol['blue'];

                        if (!isset($Vrr3orqjztc2llocated_colors[$Vgu5dsd35kdpey])) {
                            $Vksopkgqixkyixel_img = imagecolorallocate($V3xsptcgzss2mg, $Vv03lfntnmczol['red'], $Vv03lfntnmczol['green'], $Vv03lfntnmczol['blue']);
                            $Vrr3orqjztc2llocated_colors[$Vgu5dsd35kdpey] = $Vksopkgqixkyixel_img;
                        } else {
                            $Vksopkgqixkyixel_img = $Vrr3orqjztc2llocated_colors[$Vgu5dsd35kdpey];
                        }

                        imagesetpixel($V3xsptcgzss2mg, $Vs4gloy23a1dpx, $Vopgub02o3q2px, $Vksopkgqixkyixel_img);
                    }

                    imagesetpixel($V3xsptcgzss2mgalpha, $Vs4gloy23a1dpx, $Vopgub02o3q2px, $Vksopkgqixkyixel);
                }
            }

            
            $V3xsptcgzss2mgplain = imagecreatetruecolor($Vhoifq2kocytpx, $Vjlmjalejjxapx);
            imagecopy($V3xsptcgzss2mgplain, $V3xsptcgzss2mg, 0, 0, 0, 0, $Vhoifq2kocytpx, $Vjlmjalejjxapx);
            imagedestroy($V3xsptcgzss2mg);

            imagepng($V3xsptcgzss2mgalpha, $Vcki4t4qmybsempfile_alpha);
            imagepng($V3xsptcgzss2mgplain, $Vcki4t4qmybsempfile_plain);
        }

        
        $Vcki4t4qmybshis->addImagePng($Vcki4t4qmybsempfile_alpha, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $V3xsptcgzss2mgalpha, true);
        imagedestroy($V3xsptcgzss2mgalpha);

        
        $Vcki4t4qmybshis->addImagePng($Vcki4t4qmybsempfile_plain, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $V3xsptcgzss2mgplain, false, true);
        imagedestroy($V3xsptcgzss2mgplain);

        
        unlink($Vcki4t4qmybsempfile_alpha);
        unlink($Vcki4t4qmybsempfile_plain);
    }

    
    function addPngFromFile($Vtkhurg4sowd, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt = 0, $Vjlmjalejjxa = 0)
    {
        if (!function_exists("imagecreatefrompng")) {
            throw new Exception("The PHP GD extension is required, but is not installed.");
        }

        
        if (isset($Vcki4t4qmybshis->imagelist[$Vtkhurg4sowd])) {
            $V3xsptcgzss2mg = null;
        } else {
            $V3xsptcgzss2nfo = file_get_contents($Vtkhurg4sowd, false, null, 24, 5);
            $V1phfyh5exyy = unpack("CbitDepth/CcolorType/CcompressionMethod/CfilterMethod/CinterlaceMethod", $V3xsptcgzss2nfo);
            $Vbz3vmbr1h2vit_depth = $V1phfyh5exyy["bitDepth"];
            $Vv03lfntnmczolor_type = $V1phfyh5exyy["colorType"];

            
            
            
            
            $V3xsptcgzss2s_alpha = in_array($Vv03lfntnmczolor_type, array(4, 6)) || ($Vv03lfntnmczolor_type == 3 && $Vbz3vmbr1h2vit_depth != 4);

            if ($V3xsptcgzss2s_alpha) { 
                return $Vcki4t4qmybshis->addImagePngAlpha($Vtkhurg4sowd, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $Vv03lfntnmczolor_type);
            }

            
            
            
            
            
            
            
            
            
            
            $V3xsptcgzss2mgtmp = @imagecreatefrompng($Vtkhurg4sowd);
            if (!$V3xsptcgzss2mgtmp) {
                return;
            }
            $Vjz2piyfb2ut = imagesx($V3xsptcgzss2mgtmp);
            $Vskekw1ijrky = imagesy($V3xsptcgzss2mgtmp);
            $V3xsptcgzss2mg = imagecreatetruecolor($Vjz2piyfb2ut, $Vskekw1ijrky);
            imagealphablending($V3xsptcgzss2mg, true);

            
            $Vcki4t4qmybsi = imagecolortransparent($V3xsptcgzss2mgtmp);
            if ($Vcki4t4qmybsi >= 0) {
                $Vcki4t4qmybsc = imagecolorsforindex($V3xsptcgzss2mgtmp, $Vcki4t4qmybsi);
                $Vcki4t4qmybsi = imagecolorallocate($V3xsptcgzss2mg, $Vcki4t4qmybsc['red'], $Vcki4t4qmybsc['green'], $Vcki4t4qmybsc['blue']);
                imagefill($V3xsptcgzss2mg, 0, 0, $Vcki4t4qmybsi);
                imagecolortransparent($V3xsptcgzss2mg, $Vcki4t4qmybsi);
            } else {
                imagefill($V3xsptcgzss2mg, 1, 1, imagecolorallocate($V3xsptcgzss2mg, 255, 255, 255));
            }

            imagecopy($V3xsptcgzss2mg, $V3xsptcgzss2mgtmp, 0, 0, 0, 0, $Vjz2piyfb2ut, $Vskekw1ijrky);
            imagedestroy($V3xsptcgzss2mgtmp);
        }
        $Vcki4t4qmybshis->addImagePng($Vtkhurg4sowd, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $V3xsptcgzss2mg);

        if ($V3xsptcgzss2mg) {
            imagedestroy($V3xsptcgzss2mg);
        }
    }

    
    function addPngFromBuf($Vtkhurg4sowd, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt = 0.0, $Vjlmjalejjxa = 0.0, &$Vb3z3shnu1vn, $V3xsptcgzss2s_mask = false, $Ve1y5aych2ii = null)
    {
        if (isset($Vcki4t4qmybshis->imagelist[$Vtkhurg4sowd])) {
            $Vb3z3shnu1vn = null;
            $V3xsptcgzss2nfo['width'] = $Vcki4t4qmybshis->imagelist[$Vtkhurg4sowd]['w'];
            $V3xsptcgzss2nfo['height'] = $Vcki4t4qmybshis->imagelist[$Vtkhurg4sowd]['h'];
            $V4qeqspuux02 = $Vcki4t4qmybshis->imagelist[$Vtkhurg4sowd]['label'];
        } else {
            if ($Vb3z3shnu1vn == null) {
                $Vcki4t4qmybshis->addMessage('addPngFromBuf error - data not present!');

                return;
            }

            $V4eft4yxa3zs = 0;

            if (!$V4eft4yxa3zs) {
                $Vjlmjalejjxaeader = chr(137) . chr(80) . chr(78) . chr(71) . chr(13) . chr(10) . chr(26) . chr(10);

                if (mb_substr($Vb3z3shnu1vn, 0, 8, '8bit') != $Vjlmjalejjxaeader) {
                    $V4eft4yxa3zs = 1;

                    $V4eft4yxa3zsmsg = 'this file does not have a valid header';
                }
            }

            if (!$V4eft4yxa3zs) {
                
                $Vksopkgqixky = 8;
                $V1st2w4mm2ug = mb_strlen($Vb3z3shnu1vn, '8bit');

                
                $VjlmjalejjxaaveHeader = 0;
                $V3xsptcgzss2nfo = array();
                $Vkriocz2qep2ata = '';
                $Vksopkgqixkydata = '';

                while ($Vksopkgqixky < $V1st2w4mm2ug) {
                    $Vv03lfntnmczhunkLen = $Vcki4t4qmybshis->getBytes($Vb3z3shnu1vn, $Vksopkgqixky, 4);
                    $Vv03lfntnmczhunkType = mb_substr($Vb3z3shnu1vn, $Vksopkgqixky + 4, 4, '8bit');

                    switch ($Vv03lfntnmczhunkType) {
                        case 'IHDR':
                            
                            $V3xsptcgzss2nfo['width'] = $Vcki4t4qmybshis->getBytes($Vb3z3shnu1vn, $Vksopkgqixky + 8, 4);
                            $V3xsptcgzss2nfo['height'] = $Vcki4t4qmybshis->getBytes($Vb3z3shnu1vn, $Vksopkgqixky + 12, 4);
                            $V3xsptcgzss2nfo['bitDepth'] = ord($Vb3z3shnu1vn[$Vksopkgqixky + 16]);
                            $V3xsptcgzss2nfo['colorType'] = ord($Vb3z3shnu1vn[$Vksopkgqixky + 17]);
                            $V3xsptcgzss2nfo['compressionMethod'] = ord($Vb3z3shnu1vn[$Vksopkgqixky + 18]);
                            $V3xsptcgzss2nfo['filterMethod'] = ord($Vb3z3shnu1vn[$Vksopkgqixky + 19]);
                            $V3xsptcgzss2nfo['interlaceMethod'] = ord($Vb3z3shnu1vn[$Vksopkgqixky + 20]);

                            
                            $VjlmjalejjxaaveHeader = 1;
                            if ($V3xsptcgzss2nfo['compressionMethod'] != 0) {
                                $V4eft4yxa3zs = 1;

                                
                                if (DEBUGPNG) {
                                    print '[addPngFromFile unsupported compression method ' . $Vtkhurg4sowd . ']';
                                }

                                $V4eft4yxa3zsmsg = 'unsupported compression method';
                            }

                            if ($V3xsptcgzss2nfo['filterMethod'] != 0) {
                                $V4eft4yxa3zs = 1;

                                
                                if (DEBUGPNG) {
                                    print '[addPngFromFile unsupported filter method ' . $Vtkhurg4sowd . ']';
                                }

                                $V4eft4yxa3zsmsg = 'unsupported filter method';
                            }
                            break;

                        case 'PLTE':
                            $Vksopkgqixkydata .= mb_substr($Vb3z3shnu1vn, $Vksopkgqixky + 8, $Vv03lfntnmczhunkLen, '8bit');
                            break;

                        case 'IDAT':
                            $Vkriocz2qep2ata .= mb_substr($Vb3z3shnu1vn, $Vksopkgqixky + 8, $Vv03lfntnmczhunkLen, '8bit');
                            break;

                        case 'tRNS':
                            
                            
                            $Vpjldf3nzz34 = array();

                            switch ($V3xsptcgzss2nfo['colorType']) {
                                
                                case 3:
                                    
                                    
                                    
                                    $Vpjldf3nzz34['type'] = 'indexed';
                                    $Vcki4t4qmybsrans = 0;

                                    for ($V3xsptcgzss2 = $Vv03lfntnmczhunkLen; $V3xsptcgzss2 >= 0; $V3xsptcgzss2--) {
                                        if (ord($Vb3z3shnu1vn[$Vksopkgqixky + 8 + $V3xsptcgzss2]) == 0) {
                                            $Vcki4t4qmybsrans = $V3xsptcgzss2;
                                        }
                                    }

                                    $Vpjldf3nzz34['data'] = $Vcki4t4qmybsrans;
                                    break;

                                
                                case 0:
                                    
                                    
                                    $Vpjldf3nzz34['type'] = 'indexed';
                                    $Vpjldf3nzz34['data'] = ord($Vb3z3shnu1vn[$Vksopkgqixky + 8 + 1]);
                                    break;

                                
                                case 2:
                                    
                                    $Vpjldf3nzz34['r'] = $Vcki4t4qmybshis->getBytes($Vb3z3shnu1vn, $Vksopkgqixky + 8, 2);
                                    
                                    $Vpjldf3nzz34['g'] = $Vcki4t4qmybshis->getBytes($Vb3z3shnu1vn, $Vksopkgqixky + 10, 2);
                                    
                                    $Vpjldf3nzz34['b'] = $Vcki4t4qmybshis->getBytes($Vb3z3shnu1vn, $Vksopkgqixky + 12, 2);
                                    

                                    $Vpjldf3nzz34['type'] = 'color-key';
                                    break;

                                
                                default:
                                    if (DEBUGPNG) {
                                        print '[addPngFromFile unsupported transparency type ' . $Vtkhurg4sowd . ']';
                                    }
                                    break;
                            }

                            
                            break;

                        default:
                            break;
                    }

                    $Vksopkgqixky += $Vv03lfntnmczhunkLen + 12;
                }

                if (!$VjlmjalejjxaaveHeader) {
                    $V4eft4yxa3zs = 1;

                    
                    if (DEBUGPNG) {
                        print '[addPngFromFile information header is missing ' . $Vtkhurg4sowd . ']';
                    }

                    $V4eft4yxa3zsmsg = 'information header is missing';
                }

                if (isset($V3xsptcgzss2nfo['interlaceMethod']) && $V3xsptcgzss2nfo['interlaceMethod']) {
                    $V4eft4yxa3zs = 1;

                    
                    if (DEBUGPNG) {
                        print '[addPngFromFile no support for interlaced images in pdf ' . $Vtkhurg4sowd . ']';
                    }

                    $V4eft4yxa3zsmsg = 'There appears to be no support for interlaced images in pdf.';
                }
            }

            if (!$V4eft4yxa3zs && $V3xsptcgzss2nfo['bitDepth'] > 8) {
                $V4eft4yxa3zs = 1;

                
                if (DEBUGPNG) {
                    print '[addPngFromFile bit depth of 8 or less is supported ' . $Vtkhurg4sowd . ']';
                }

                $V4eft4yxa3zsmsg = 'only bit depth of 8 or less is supported';
            }

            if (!$V4eft4yxa3zs) {
                switch ($V3xsptcgzss2nfo['colorType']) {
                    case 3:
                        $Vv03lfntnmczolor = 'DeviceRGB';
                        $V1qcutcuyu3mcolor = 1;
                        break;

                    case 2:
                        $Vv03lfntnmczolor = 'DeviceRGB';
                        $V1qcutcuyu3mcolor = 3;
                        break;

                    case 0:
                        $Vv03lfntnmczolor = 'DeviceGray';
                        $V1qcutcuyu3mcolor = 1;
                        break;

                    default:
                        $V4eft4yxa3zs = 1;

                        
                        if (DEBUGPNG) {
                            print '[addPngFromFile alpha channel not supported: ' . $V3xsptcgzss2nfo['colorType'] . ' ' . $Vtkhurg4sowd . ']';
                        }

                        $V4eft4yxa3zsmsg = 'transparancey alpha channel not supported, transparency only supported for palette images.';
                }
            }

            if ($V4eft4yxa3zs) {
                $Vcki4t4qmybshis->addMessage('PNG error - (' . $Vtkhurg4sowd . ') ' . $V4eft4yxa3zsmsg);

                return;
            }

            
            
            $Vcki4t4qmybshis->numImages++;
            $V3xsptcgzss2m = $Vcki4t4qmybshis->numImages;
            $V4qeqspuux02 = "I$V3xsptcgzss2m";
            $Vcki4t4qmybshis->numObj++;

            
            $Vi43cktvy0zi = array(
                'label'            => $V4qeqspuux02,
                'data'             => $Vkriocz2qep2ata,
                'bitsPerComponent' => $V3xsptcgzss2nfo['bitDepth'],
                'pdata'            => $Vksopkgqixkydata,
                'iw'               => $V3xsptcgzss2nfo['width'],
                'ih'               => $V3xsptcgzss2nfo['height'],
                'type'             => 'png',
                'color'            => $Vv03lfntnmczolor,
                'ncolor'           => $V1qcutcuyu3mcolor,
                'masked'           => $Ve1y5aych2ii,
                'isMask'           => $V3xsptcgzss2s_mask
            );

            if (isset($Vpjldf3nzz34)) {
                $Vi43cktvy0zi['transparency'] = $Vpjldf3nzz34;
            }

            $Vcki4t4qmybshis->o_image($Vcki4t4qmybshis->numObj, 'new', $Vi43cktvy0zi);
            $Vcki4t4qmybshis->imagelist[$Vtkhurg4sowd] = array('label' => $V4qeqspuux02, 'w' => $V3xsptcgzss2nfo['width'], 'h' => $V3xsptcgzss2nfo['height']);
        }

        if ($V3xsptcgzss2s_mask) {
            return;
        }

        if ($Vhoifq2kocyt <= 0 && $Vjlmjalejjxa <= 0) {
            $Vhoifq2kocyt = $V3xsptcgzss2nfo['width'];
            $Vjlmjalejjxa = $V3xsptcgzss2nfo['height'];
        }

        if ($Vhoifq2kocyt <= 0) {
            $Vhoifq2kocyt = $Vjlmjalejjxa / $V3xsptcgzss2nfo['height'] * $V3xsptcgzss2nfo['width'];
        }

        if ($Vjlmjalejjxa <= 0) {
            $Vjlmjalejjxa = $Vhoifq2kocyt * $V3xsptcgzss2nfo['height'] / $V3xsptcgzss2nfo['width'];
        }

        $Vcki4t4qmybshis->addContent(sprintf("\nq\n%.3F 0 0 %.3F %.3F %.3F cm /%s Do\nQ", $Vhoifq2kocyt, $Vjlmjalejjxa, $Vs4gloy23a1d, $Vopgub02o3q2, $V4qeqspuux02));
    }

    
    function addJpegFromFile($V3xsptcgzss2mg, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt = 0, $Vjlmjalejjxa = 0)
    {
        
        

        if (!file_exists($V3xsptcgzss2mg)) {
            return;
        }

        if ($Vcki4t4qmybshis->image_iscached($V3xsptcgzss2mg)) {
            $Vb3z3shnu1vn = null;
            $V3xsptcgzss2mageWidth = $Vcki4t4qmybshis->imagelist[$V3xsptcgzss2mg]['w'];
            $V3xsptcgzss2mageHeight = $Vcki4t4qmybshis->imagelist[$V3xsptcgzss2mg]['h'];
            $Vv03lfntnmczhannels = $Vcki4t4qmybshis->imagelist[$V3xsptcgzss2mg]['c'];
        } else {
            $Vynpm04a4fx0 = getimagesize($V3xsptcgzss2mg);
            $V3xsptcgzss2mageWidth = $Vynpm04a4fx0[0];
            $V3xsptcgzss2mageHeight = $Vynpm04a4fx0[1];

            if (isset($Vynpm04a4fx0['channels'])) {
                $Vv03lfntnmczhannels = $Vynpm04a4fx0['channels'];
            } else {
                $Vv03lfntnmczhannels = 3;
            }

            $Vb3z3shnu1vn = file_get_contents($V3xsptcgzss2mg);
        }

        if ($Vhoifq2kocyt <= 0 && $Vjlmjalejjxa <= 0) {
            $Vhoifq2kocyt = $V3xsptcgzss2mageWidth;
        }

        if ($Vhoifq2kocyt == 0) {
            $Vhoifq2kocyt = $Vjlmjalejjxa / $V3xsptcgzss2mageHeight * $V3xsptcgzss2mageWidth;
        }

        if ($Vjlmjalejjxa == 0) {
            $Vjlmjalejjxa = $Vhoifq2kocyt * $V3xsptcgzss2mageHeight / $V3xsptcgzss2mageWidth;
        }

        $Vcki4t4qmybshis->addJpegImage_common($Vb3z3shnu1vn, $Vs4gloy23a1d, $Vopgub02o3q2, $Vhoifq2kocyt, $Vjlmjalejjxa, $V3xsptcgzss2mageWidth, $V3xsptcgzss2mageHeight, $Vv03lfntnmczhannels, $V3xsptcgzss2mg);
    }

    
    private function addJpegImage_common(
        &$Vb3z3shnu1vn,
        $Vs4gloy23a1d,
        $Vopgub02o3q2,
        $Vhoifq2kocyt = 0,
        $Vjlmjalejjxa = 0,
        $V3xsptcgzss2mageWidth,
        $V3xsptcgzss2mageHeight,
        $Vv03lfntnmczhannels = 3,
        $V3xsptcgzss2mgname
    ) {
        if ($Vcki4t4qmybshis->image_iscached($V3xsptcgzss2mgname)) {
            $V4qeqspuux02 = $Vcki4t4qmybshis->imagelist[$V3xsptcgzss2mgname]['label'];
            
            

        } else {
            if ($Vb3z3shnu1vn == null) {
                $Vcki4t4qmybshis->addMessage('addJpegImage_common error - (' . $V3xsptcgzss2mgname . ') data not present!');

                return;
            }

            
            
            $Vcki4t4qmybshis->numImages++;
            $V3xsptcgzss2m = $Vcki4t4qmybshis->numImages;
            $V4qeqspuux02 = "I$V3xsptcgzss2m";
            $Vcki4t4qmybshis->numObj++;

            $Vcki4t4qmybshis->o_image(
                $Vcki4t4qmybshis->numObj,
                'new',
                array(
                    'label'    => $V4qeqspuux02,
                    'data'     => &$Vb3z3shnu1vn,
                    'iw'       => $V3xsptcgzss2mageWidth,
                    'ih'       => $V3xsptcgzss2mageHeight,
                    'channels' => $Vv03lfntnmczhannels
                )
            );

            $Vcki4t4qmybshis->imagelist[$V3xsptcgzss2mgname] = array(
                'label' => $V4qeqspuux02,
                'w'     => $V3xsptcgzss2mageWidth,
                'h'     => $V3xsptcgzss2mageHeight,
                'c'     => $Vv03lfntnmczhannels
            );
        }

        $Vcki4t4qmybshis->addContent(sprintf("\nq\n%.3F 0 0 %.3F %.3F %.3F cm /%s Do\nQ ", $Vhoifq2kocyt, $Vjlmjalejjxa, $Vs4gloy23a1d, $Vopgub02o3q2, $V4qeqspuux02));
    }

    
    function openHere($Vdidzwb0w3vc, $Vrr3orqjztc2 = 0, $Vbz3vmbr1h2v = 0, $Vv03lfntnmcz = 0)
    {
        
        
        
        
        
        
        
        
        
        
        $Vcki4t4qmybshis->numObj++;
        $Vcki4t4qmybshis->o_destination(
            $Vcki4t4qmybshis->numObj,
            'new',
            array('page' => $Vcki4t4qmybshis->currentPage, 'type' => $Vdidzwb0w3vc, 'p1' => $Vrr3orqjztc2, 'p2' => $Vbz3vmbr1h2v, 'p3' => $Vv03lfntnmcz)
        );
        $Vkriocz2qep2 = $Vcki4t4qmybshis->catalogId;
        $Vcki4t4qmybshis->o_catalog($Vkriocz2qep2, 'openHere', $Vcki4t4qmybshis->numObj);
    }

    
    function addJavascript($Vl0bhwxpf0qo)
    {
        $Vcki4t4qmybshis->javascript .= $Vl0bhwxpf0qo;
    }

    
    function addDestination($V4qeqspuux02, $Vdidzwb0w3vc, $Vrr3orqjztc2 = 0, $Vbz3vmbr1h2v = 0, $Vv03lfntnmcz = 0)
    {
        
        
        
        $Vcki4t4qmybshis->numObj++;
        $Vcki4t4qmybshis->o_destination(
            $Vcki4t4qmybshis->numObj,
            'new',
            array('page' => $Vcki4t4qmybshis->currentPage, 'type' => $Vdidzwb0w3vc, 'p1' => $Vrr3orqjztc2, 'p2' => $Vbz3vmbr1h2v, 'p3' => $Vv03lfntnmcz)
        );
        $Vkriocz2qep2 = $Vcki4t4qmybshis->numObj;

        
        $Vcki4t4qmybshis->destinations["$V4qeqspuux02"] = $Vkriocz2qep2;
    }

    
    function setFontFamily($Vu3vfak1w4uv, $Vi43cktvy0zi = '')
    {
        if (!is_array($Vi43cktvy0zi)) {
            if ($Vu3vfak1w4uv === 'init') {
                
                
                
                $Vcki4t4qmybshis->fontFamilies['Helvetica.afm'] =
                    array(
                        'b'  => 'Helvetica-Bold.afm',
                        'i'  => 'Helvetica-Oblique.afm',
                        'bi' => 'Helvetica-BoldOblique.afm',
                        'ib' => 'Helvetica-BoldOblique.afm'
                    );

                $Vcki4t4qmybshis->fontFamilies['Courier.afm'] =
                    array(
                        'b'  => 'Courier-Bold.afm',
                        'i'  => 'Courier-Oblique.afm',
                        'bi' => 'Courier-BoldOblique.afm',
                        'ib' => 'Courier-BoldOblique.afm'
                    );

                $Vcki4t4qmybshis->fontFamilies['Times-Roman.afm'] =
                    array(
                        'b'  => 'Times-Bold.afm',
                        'i'  => 'Times-Italic.afm',
                        'bi' => 'Times-BoldItalic.afm',
                        'ib' => 'Times-BoldItalic.afm'
                    );
            }
        } else {

            
            
            if (mb_strlen($Vu3vfak1w4uv)) {
                $Vcki4t4qmybshis->fontFamilies[$Vu3vfak1w4uv] = $Vi43cktvy0zi;
            }
        }
    }

    
    function addMessage($Vw4u5rrepkk1)
    {
        $Vcki4t4qmybshis->messages .= $Vw4u5rrepkk1 . "\n";
    }

    
    function transaction($Vmzgkmhd4ios)
    {
        switch ($Vmzgkmhd4ios) {
            case 'start':
                
                $Vb3z3shnu1vn = get_object_vars($Vcki4t4qmybshis);
                $Vcki4t4qmybshis->checkpoint = $Vb3z3shnu1vn;
                unset($Vb3z3shnu1vn);
                break;

            case 'commit':
                if (is_array($Vcki4t4qmybshis->checkpoint) && isset($Vcki4t4qmybshis->checkpoint['checkpoint'])) {
                    $Vynpm04a4fx0 = $Vcki4t4qmybshis->checkpoint['checkpoint'];
                    $Vcki4t4qmybshis->checkpoint = $Vynpm04a4fx0;
                    unset($Vynpm04a4fx0);
                } else {
                    $Vcki4t4qmybshis->checkpoint = '';
                }
                break;

            case 'rewind':
                
                if (is_array($Vcki4t4qmybshis->checkpoint)) {
                    
                    $Vynpm04a4fx0 = $Vcki4t4qmybshis->checkpoint;

                    foreach ($Vynpm04a4fx0 as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                        if ($Vgu5dsd35kdp !== 'checkpoint') {
                            $Vcki4t4qmybshis->$Vgu5dsd35kdp = $Vpszt12nvbau;
                        }
                    }
                    unset($Vynpm04a4fx0);
                }
                break;

            case 'abort':
                if (is_array($Vcki4t4qmybshis->checkpoint)) {
                    
                    $Vynpm04a4fx0 = $Vcki4t4qmybshis->checkpoint;
                    foreach ($Vynpm04a4fx0 as $Vgu5dsd35kdp => $Vpszt12nvbau) {
                        $Vcki4t4qmybshis->$Vgu5dsd35kdp = $Vpszt12nvbau;
                    }
                    unset($Vynpm04a4fx0);
                }
                break;
        }
    }
}
