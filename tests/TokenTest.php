<?php
/**
 * Created by PhpStorm.
 * User: Papp
 * Date: 2015.06.20.
 * Time: 10:27
 */

use Jackson\Elements\Char;


class TokenTest extends PHPUnit_Framework_TestCase {

    private $token;

    public function setUp() {
        $this->token = new \Jackson\Elements\Token(new Char("{", 0));
    }

    public function testGetters() {

        $char = $this->token->getChar();
        $this->assertEquals(get_class($char), "Jackson\Elements\Char", "Token should contain a char!");
        $this->assertEquals($char->getContent(), "{", "Token should contain the starting char!");
    }


}
