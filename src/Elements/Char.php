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

    public function __construct($content) {
        $this->content = $content;
    }


    public function getContent() {
        return $this->content;
    }


}