<?php
/**
 * Created by PhpStorm.
 * User: Papp
 * Date: 2015.06.20.
 * Time: 10:04
 */

use Jackson\Scanner;
use Jackson\Lexer;

class LexerTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->scanner = new Scanner();
        $this->jsonString = json_encode(new \StdClass());
        $this->scanner->setSourceText($this->jsonString);
        $this->lexer = new Lexer();
        $this->lexer->setScanner($this->scanner);
    }

    public function testLexerExists() {
        $this->assertTrue(is_object($this->lexer));
    }

    public function testLexerGettersAndSetters() {
        $this->assertEquals(get_class($this->lexer->getScanner()), "Jackson\\Scanner", "The scanner provided by the lexer's getter is not valid" );
    }

    public function testLexerGet() {
        $token = $this->lexer->get();
        $this->assertEquals(get_class($token), "Jackson\Elements\Token", "The lexer get method should provide a token");
        $content = $token->getContent();

        $this->assertEquals($content, "{}", "Token should contain a valid literal!");
        $this->assertTrue($content[0] == "{" || $content[0] == "[", "Tokens should start with starting chars");
    }




}
