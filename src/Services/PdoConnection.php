<?php

namespace Services;

use PDO;
use PDOException;

class PdoConnection
{
    private $host = 'mariadb:3306';
    private $db = 'blog';
    private $user = 'root';
    private $password = '';
    public static $connect;


    public function connect()
    {
        if (self::$connect instanceof PDO) {
            return self::$connect;
        }
        try {
             self::$connect = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
             return self::$connect;
        }catch( PDOException $Exception ) {
            echo $Exception->getMessage() . "<br>";
        }
    }
}

