<?php
/**
 * Created by PhpStorm.
 * User: Papp
 * Date: 2015.06.19.
 * Time: 0:01
 */

namespace Jackson;

class Lexer {

    private $scanner;

    public function __construct() {

    }

    public function setScanner($scanner) {
        $this->scanner = $scanner;
    }

    public function getScanner() {
        return $this->scanner;
    }

}