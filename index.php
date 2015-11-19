<?php
  require_once('book.php');

  $book = new book();
  
  $book->setTitle("ハローポッター");
  print $book->getTitle();
  
  print $book->buyBook(400);
