<?php

class Test {
  public function test() {
    for($i=0;$i<10;$i++){
      print inTest($i);
    }
  }
  
  private function inTest($i) {
    return "カウント：".$i;
  }
}
