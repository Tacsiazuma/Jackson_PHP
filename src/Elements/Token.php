<?php
/**
 * Created by PhpStorm.
 * User: Papp
 * Date: 2015.06.19.
 * Time: 0:00
 */

namespace Jackson\Elements;

class Token {

    private $content, $char;

    const STRING = 1;
    const OBJ_START = 2;
    const OBJ_END = 3;
    const COLON = 4;
    const COMMA = 8;
    const ARRAY_START = 5;
    const ARRAY_END = 6;
    const EOF = 7;

    public function __construct(Char $char) {
        $this->char = $char;
        $this->content = $char->getContent();
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }


    public function appendContent($char) {
        $this->content .= $char;
    }


    public function getContent() {
        return $this->content;
    }

    public function getChar() {
        return $this->char;
    }

}