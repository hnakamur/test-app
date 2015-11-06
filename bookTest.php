<?php

class bookTest extends PHPUnit_Framework_TestCase {
  public function testBuy() {
    $this->assertEquals("NG", buy(350));
    $this->assertEquals("OK", buy(400));
  }
}

