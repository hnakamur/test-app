<?php
  require_once('book.php');

  $book = new book();
  
  $book->setTitle("ハリーポッター");
  print $book->getTitle();
  
  print $book->buyBook(400);
