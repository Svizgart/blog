<?php
/**
 * Created by PhpStorm.
 * User: aleksandr.cayko
 * Date: 02.10.2018
 * Time: 10:08
 */

namespace Models;

use Services\PdoConnection;

class Model
{
    protected $db;

    public function __construct()
    {
        $this->db = new PdoConnection();
    }

}