<?php


namespace Svg\Tests;

include_once __DIR__ . "/../../src/autoload.php";

use Svg\Style;

class StyleTest extends \PHPUnit_Framework_TestCase
{

    public function test_parseColor()
    {
        $this->assertEquals("none", Style::parseColor("none"));
        $this->assertEquals(array(255, 0, 0), Style::parseColor("RED"));
        $this->assertEquals(array(0, 0, 255), Style::parseColor("blue"));
        $this->assertEquals(null, Style::parseColor("foo"));
        $this->assertEquals(array(0, 0, 0), Style::parseColor("black"));
        $this->assertEquals(array(255, 255, 255), Style::parseColor("white"));
        $this->assertEquals(array(0, 0, 0), Style::parseColor("#000000"));
        $this->assertEquals(array(255, 255, 255), Style::parseColor("#ffffff"));
        $this->assertEquals(array(0, 0, 0), Style::parseColor("rgb(0,0,0)"));
        $this->assertEquals(array(255, 255, 255), Style::parseColor("rgb(255,255,255)"));
        $this->assertEquals(array(0, 0, 0), Style::parseColor("rgb(0, 0, 0)"));
        $this->assertEquals(array(255, 255, 255), Style::parseColor("rgb(255, 255, 255)"));
    }

    public function test_fromAttributes()
    {
        $Vdidzwb0w3vc = new Style();

        $Voywws15cvz5 = array(
            "color" => "blue",
            "fill" => "#fff",
            "stroke" => "none",
        );

        $Vdidzwb0w3vc->fromAttributes($Voywws15cvz5);

        $this->assertEquals(array(0, 0, 255), $Vdidzwb0w3vc->color);
        $this->assertEquals(array(255, 255, 255), $Vdidzwb0w3vc->fill);
        $this->assertEquals("none", $Vdidzwb0w3vc->stroke);
    }

    public function test_convertSize()
    {
        $this->assertEquals(1, Style::convertSize(1));
        $this->assertEquals(10, Style::convertSize("10px")); 
        $this->assertEquals(10, Style::convertSize("10pt"));
        $this->assertEquals(8, Style::convertSize("80%", 10, 72));
    }

}
