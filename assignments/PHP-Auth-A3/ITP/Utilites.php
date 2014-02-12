<?php

namespace ITP;

Class Utilites {

    public static function getPDO() {
        $host = 'itp460.usc.edu';
        $dbname = 'music';
        $user = 'student';
        $pass = 'ttrojan';

        return new \PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }

}