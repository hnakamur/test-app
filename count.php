<?php

class Count {
  public function countUp() {
    for($i=0;$i<10;$i++){
      print outCount($i);
    }
  }
  
  private function outCount($i) {
    return "カウント：".$i;
  }
}
