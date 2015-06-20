<?php
/**
 * Created by PhpStorm.
 * User: Papp
 * Date: 2015.06.19.
 * Time: 0:00
 */

namespace Jackson\Elements;


class Char {

    private $content;

    const CHAR_EOF = "\0";

    public function __construct($content, $index) {
        if (!is_string($content) || strlen($content) > 1) throw new \InvalidArgumentException;
        $this->content = $content;
        $this->index = $index;
    }


    public function getContent() {
        return $this->content;
    }


}