<?php

$host = 'mariadb:3306';
$db = 'blog';
$user = 'root';
$pass = '';

try {
    $connection  = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
}catch( PDOException $Exception ) {
    echo $Exception->getMessage() . "<br>";
}