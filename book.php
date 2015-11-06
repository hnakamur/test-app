<?php

class Book {
  
  private $title;
  
  public function buyBook($money) {
    if ($money < 400) {
      return "NG";      
    } else if(400 <= $money) {
      return "OK"; 
    }
  }
  
  public function setTitle($title) {
    $this->title = $title;
  }

  public function getTitle() {
    return $this->title;
  }  
}
