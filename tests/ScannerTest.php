<?php
/**
 * Created by PhpStorm.
 * User: Papp
 * Date: 2015.06.19.
 * Time: 0:01
 */
use Jackson\Scanner;
use Jackson\Lexer;

class ScannerTest extends PHPUnit_Framework_TestCase {

    private $scanner = null;
    private $jsonString;


    public function setUp() {
        $this->scanner = new Scanner();
        $this->jsonString = json_encode(new \StdClass());
        $this->scanner->setSourceText($this->jsonString);
        $this->lexer = new Lexer();
        $this->lexer->setScanner($this->scanner);
    }


    public function testScannerExists() {
        $this->assertTrue(is_object($this->scanner));
    }

    /**
     * @expectedException InvalidArgumentException
     */

    public function testScannerExceptionOnNullContent() {
        $this->scanner->setSourceText(null);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testScannerExceptionOnMissingStartParentheses() {
        $this->scanner->setSourceText("342423422344 }");
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testScannerExceptionOnMissingEndingParentheses() {
        $this->scanner->setSourceText("{ 342423422344 ");
    }


    public function testScannerSetterGetter() {
        $gettext = $this->scanner->getSourceText();
        $this->assertEquals( $this->jsonString, $gettext, "The source text and the contained text not equals!");
    }

    public function testScannerHasFunction() {
        $this->assertTrue($this->scanner->has());
        $index = strlen($this->jsonString) -1;
        $this->assertEquals($index, $this->scanner->getLastIndex());
    }


    public function testScannerGetFunction() {
        $char = $this->scanner->get();
        $this->assertTrue(is_object($char), "Scanner isn't handing back objects on get method!");
        $this->assertTrue(get_class($char) == "Jackson\Elements\Char", "The object is not instance of Char!" );
        $this->assertEquals("{", $char->getContent(), "The Char object isn't containing the right char");
        $char = $this->scanner->get();
        $this->assertEquals("}", $char->getContent(), "The Char object isn't containing the right char");
        $this->assertFalse($this->scanner->has(), "The Scanner should return false as it has no more chars left");
    }

}
