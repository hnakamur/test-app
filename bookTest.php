<?php

class bookTest extends PHPUnit_Framework_TestCase {
  public function testBuyBook() {
    $this->assertEquals("NG", buyBook(350));
    $this->assertEquals("OK", buyBook(400));
  }
}

