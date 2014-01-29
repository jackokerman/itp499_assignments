<?php

class GenreMenu {

    protected $name;
    protected $genres;

    public function __construct($name, $genres) {
        $this->name = $name;
        $this->genres = $genres;
    }

    public function __toString() {
        $menu = "<select name=" . $this->name .">";
        foreach($this->genres as $genre) {
            $menu .= "<option value=" . $genre["id"] . ">" . $genre["genre"] ."</option>";
        }
        $menu .= '</select>';

        return $menu;
    }
} 