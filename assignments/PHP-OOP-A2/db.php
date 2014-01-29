<?php
/**
 * Created by PhpStorm.
 * User: Jack
 * Date: 1/28/14
 * Time: 6:12 PM
 */

$host = 'itp460.usc.edu';
$dbname = 'music';
$user = 'student';
$pass = 'ttrojan';

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);