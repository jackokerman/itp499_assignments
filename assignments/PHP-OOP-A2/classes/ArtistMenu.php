<?php

class ArtistMenu {

    protected $name;
    protected $artists;

    public function __construct($name, $artists) {
        $this->name = $name;
        $this->artists = $artists;
    }

    public function __toString() {
        $menu = "<select name=" . $this->name .">";
        foreach($this->artists as $artist) {
            $menu .= "<option value=" . $artist["id"] . ">" . $artist["artist_name"] ."</option>";
        }
        $menu .= '</select>';

        return $menu;
    }
}
