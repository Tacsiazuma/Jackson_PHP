<?php
/**
 * Created by PhpStorm.
 * User: Papp
 * Date: 2015.06.20.
 * Time: 10:27
 */

class TokenTest extends PHPUnit_Framework_TestCase {

    private $token;

    public function setUp() {
        $this->token = new \Jackson\Elements\Token("{}");
    }

    public function testGetters() {
        $content = $this->token->getContent();

        $this->assertEquals($content, "{}", "Token should contain a valid literal!");
        $char = $this->token->getChar();
        $this->assertEquals(get_class($char), "Jackson\Elements\Char", "Token should contain a char!");
        $this->assertEquals($char->getContent(), "{", "Token should contain the starting char!");
    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testExceptionOnNullContent() {
        $token = new \Jackson\Elements\Token(null);
    }

}
