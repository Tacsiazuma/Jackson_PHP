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

    private $scanner;

    private $buffer;

    private $starterChars = array(
        "[", "{"
    );
    private $endingChars = array(
        "}", "]"
    );

    public function __construct() {
        $this->getChar(); // initially fill the buffer
    }

    public function setScanner($scanner) {
        $this->scanner = $scanner;
    }

    public function getScanner() {
        return $this->scanner;
    }

    private function getChar() {

    }

    public function get() {
        return new Token("{}");
    }

}