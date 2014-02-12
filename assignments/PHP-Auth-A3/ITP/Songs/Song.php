<?php

class Song {

    protected $title;
    protected $artist;
    protected $genre;
    protected $price;

    public function __construct($title, $artist, $genre, $price) {
        $this->title = $title;
        $this->artist = $artist;
        $this->genre = $genre;
        $this->price = $price;
    }


} 