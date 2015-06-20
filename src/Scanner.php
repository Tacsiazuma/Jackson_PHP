<?php
/**
 * Created by PhpStorm.
 * User: Papp
 * Date: 2015.06.18.
 * Time: 23:59
 */
namespace Jackson;

use Jackson\Elements\Char;


class Scanner {

    private $sourceText;
    private $sourceIndex = 0;
    private $lastIndex;

    public function setSourceText($text) {
        if (!is_string($text)) throw new \InvalidArgumentException;
        $this->sourceText = $text;
        $this->lastIndex = strlen ( $this->sourceText ) - 1;
    }

    public function getSourceText() {
        return $this->sourceText;
    }

    public function has() {
        return $this->sourceIndex <= $this->lastIndex;
    }

    public function getLastIndex() {
        return $this->lastIndex;
    }

    // the main function to get character objects from the byte array
    public function get() {
        $char = $this->sourceText[$this->sourceIndex];

        $this->sourceIndex++;
        return new Char($char);
    }


}
