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
        $this->jsonString = "{[\"öt\":\"hat\"]}";
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
        $this->jsonString = "{[\"öt\":\"hat\"]}";
        $this->scanner->setSourceText($this->jsonString);
        $this->lexer = new Lexer();
        $this->lexer->setScanner($this->scanner);
        $token = $this->lexer->get();
        $this->assertEquals(get_class($token), "Jackson\Elements\Token", "The lexer get method should provide a token");
        $this->assertEquals(\Jackson\Elements\Token::OBJ_START, $token->getType(), "The object start token missing");
        $token = $this->lexer->get();
        $this->assertEquals(\Jackson\Elements\Token::ARRAY_START, $token->getType(), "The array start token missing");
        $token = $this->lexer->get();
        $this->assertEquals(\Jackson\Elements\Token::STRING, $token->getType(), "The string token missing");
        $this->assertEquals("öt", $token->getContent(), "The string token content isn't valid");
        $token = $this->lexer->get();
        $this->assertEquals(\Jackson\Elements\Token::COLON, $token->getType(), "The colon token missing");
        $token = $this->lexer->get();
        $this->assertEquals(\Jackson\Elements\Token::STRING, $token->getType(), "The string token missing");
        $this->assertEquals("hat", $token->getContent(), "The string token content isn't valid");
        $token = $this->lexer->get();
        $this->assertEquals(\Jackson\Elements\Token::ARRAY_END, $token->getType(), "The array end token missing");

        $token = $this->lexer->get();
        $this->assertEquals(\Jackson\Elements\Token::OBJ_END, $token->getType(), "The object end token missing");
        $token = $this->lexer->get();
        $this->assertEquals(\Jackson\Elements\Token::EOF, $token->getType(), "The EOF token missing");
    }





}
