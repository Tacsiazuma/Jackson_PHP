<?php
/**
 * Created by PhpStorm.
 * User: Papp
 * Date: 2015.06.19.
 * Time: 0:01
 */
use Jackson\Scanner;



class ScannerTest extends PHPUnit_Framework_TestCase {


    public function __construct() {
        parent::__construct();
    }


    public function testScannerExists() {
        $scanner = new Scanner();
        $this->assertTrue(is_object($scanner));
    }


}
