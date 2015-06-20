<?php
/**
 * Created by PhpStorm.
 * User: Papp
 * Date: 2015.06.20.
 * Time: 10:04
 */

use Jackson\Elements\Char;

class CharTest extends PHPUnit_Framework_TestCase {

    private $char;

    public function setUp() {
        $this->char = new Char("{", 0);
    }

    public function testCharContainsTheRightChar() {
        $this->assertEquals("{", $this->char->getContent(), "The Char object isn't containing the right char");
    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testExceptionOnNullContent() {
        $char = new Char(null, 0);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testExceptionOnLongContent() {
        $char = new Char("  ", 0);
    }

}
