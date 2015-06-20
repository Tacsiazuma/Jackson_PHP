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


    public function __construct($content) {
        if (!is_string($content)) throw new \InvalidArgumentException;
        $this->content = $content;
        $this->char = new Char($content[0]);
    }



    public function getContent() {
        return $this->content;
    }

    public function getChar() {
        return $this->char;
    }

}