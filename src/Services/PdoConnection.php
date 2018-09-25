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

    public function connect()
    {
        $db = new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->password);
        return $db->exec;
    }
}

