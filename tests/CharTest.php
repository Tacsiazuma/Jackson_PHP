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
        $this->char = new Char("{");
    }

    public function testCharContainsTheRightChar() {
        $this->assertEquals("{", $this->char->getContent(), "The Char object isn't containing the right char");
    }

}
