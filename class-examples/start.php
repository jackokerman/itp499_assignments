<?php

require_once "Book.php";

$phpOOs = new Book("PHP Object Oriented Solutions", 300);
$jsGoodParts = new Book("JS Good Parts", 145);

echo Book::count();