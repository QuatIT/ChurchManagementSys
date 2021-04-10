<?php

namespace FontLib\Tests;

use FontLib\Font;

class FontTest extends \PHPUnit_Framework_TestCase
{
    
    public function testLoadFileNotFound()
    {
        Font::load('non-existing/font.ttf');
    }

    public function testLoadTTFFontSuccessfully()
    {
        $Vpo2nfuz0suo = Font::load('sample-fonts/IntelClear-Light.ttf');

        $this->assertInstanceOf('FontLib\TrueType\File', $Vpo2nfuz0suo);
    }

    public function test12CmapFormat()
    {
        $Vpo2nfuz0suo = Font::load('sample-fonts/NotoSansShavian-Regular.ttf');

        $Vpo2nfuz0suo->parse();

        $Vhh1bww3ynlj = $Vpo2nfuz0suo->getData("cmap", "subtables");

        $Vbrwitnyhbw3 = $Vhh1bww3ynlj[0];

        $this->assertEquals(4, $Vbrwitnyhbw3['format']);
        $this->assertEquals(6, $Vbrwitnyhbw3['segCount']);
        $this->assertEquals($Vbrwitnyhbw3['segCount'], count($Vbrwitnyhbw3['startCode']));
        $this->assertEquals($Vbrwitnyhbw3['segCount'], count($Vbrwitnyhbw3['endCode']));

        $Vq3vaqifikau = $Vhh1bww3ynlj[1];

        $this->assertEquals(12, $Vq3vaqifikau['format']);
        $this->assertEquals(6, $Vq3vaqifikau['ngroups']);
        $this->assertEquals(6, count($Vq3vaqifikau['startCode']));
        $this->assertEquals(6, count($Vq3vaqifikau['endCode']));
        $this->assertEquals(53, count($Vq3vaqifikau['glyphIndexArray']));
    }

}
