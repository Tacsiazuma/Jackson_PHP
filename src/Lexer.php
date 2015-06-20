<?php
/**
 * Created by PhpStorm.
 * User: Papp
 * Date: 2015.06.19.
 * Time: 0:01
 */

namespace Jackson;

use Jackson\Elements\Token;


class Lexer {

    /**
     * The scanner object
     * @var \Jackson\Scanner
     */
    private $scanner;

    private $buffer;

    private $char;

    private $lastchar;

    private $starterChars = array(
        "[", "{"
    );


    const COLON = ":";
    const STRING_DELIMITER = "\"";
    const ARRAY_START = "[";
    const ARRAY_END = "]";
    const OBJ_START = "{";
    const OBJ_END = "}";
    const COMMA = ",";


    private $symbols = array(
        "{","[",":","}", "]", ","
    );

    private $whitespaceChars = array(
        "\t", "\n", " "

    );

    private $eofChar =  "\0";

    public function __construct() {
    }

    public function setScanner($scanner) {
        $this->scanner = $scanner;
    }

    public function getScanner() {
        return $this->scanner;
    }

    private function getChar() {


        $this->lastchar = $this->buffer;
        // load a char
        $this->char = $this->scanner->get();
        // load its content
        $this->buffer = $this->char->getContent();

    }

    public function get() {
        $content = "";
        // "{[{"" : "", "": ""}]}"
        $this->getChar(); // initially get a char

        // EOF tokens
        if ($this->buffer == $this->eofChar) {
            $token = new Token($this->char);
            $token->setType(Token::EOF);
            return $token;
        }

        // on whitespace chars simply step over
        while (in_array($this->buffer, $this->whitespaceChars)) {
            $this->getChar();
        }

        // one character symbols outside string literals
        if (in_array($this->buffer, $this->symbols)) {
            switch ($this->buffer) {
                case self::COLON :
                    $token = new Token($this->char);
                    $token->setType(Token::COLON);
                    break;
                case self::COMMA :
                    $token = new Token($this->char);
                    $token->setType(Token::COMMA);
                    break;
                case self::ARRAY_START :
                    $token = new Token($this->char);
                    $token->setType(Token::ARRAY_START);
                    break;
                case self::ARRAY_END :
                    $token = new Token($this->char);
                    $token->setType(Token::ARRAY_END);
                    break;
                case self::OBJ_START :
                    $token = new Token($this->char);
                    $token->setType(Token::OBJ_START);
                    break;
                case self::OBJ_END :
                    $token = new Token($this->char);
                    $token->setType(Token::OBJ_END);
                    break;
            }
            return $token;
        }


        // found a string
        if ($this->buffer == self::STRING_DELIMITER) {

            // advance a char
            $this->getChar();
            // put it into a token
            $token = new Token($this->char); // start a token
            $token->setType(Token::STRING);
            while( $this->buffer != '"' ) {
                $this->getChar();
                if ($this->buffer != '"')
                    $token->appendContent($this->buffer);
            }
            return $token;
        }

        exit("Unknown char: " .$this->buffer);
    }


}