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
    public $connection;

    public function connect()
    {
        try {
             return new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
        }catch( PDOException $Exception ) {
            echo $Exception->getMessage() . "<br>";
        }
    }
}

