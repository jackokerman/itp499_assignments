<?php

require_once "Product.php";

class Book extends Product {

    public $pages;
    public $authors;
    protected $listedAt;

   protected static $createdCount = 0;

    public function __construct($title, $pages) {
        static::$createdCount++;
        $this->pages = $pages;
        $this->listedAt = time();
        parent::__construct($title);
    }

    public static function count() {
        return static::$createdCount;
    }
}