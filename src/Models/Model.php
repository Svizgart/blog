<?php

namespace Models;

class Model
{
    private $db;
    private $table;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function all()
    {
        $sql = "SELECT * FROM {$this->table} ORDER BY data DESC";
        $query = $this->db->prepari($sql);
        $result = $query->execute();

        return !$result ? false : $query->fetchAll;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = {$id}";
        $query = $this->db->prepari($sql);
        $result = $query->execute();

        return !$result ? false : $query->fetch;

    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE id=:id";
        $param = [
            'id' => $id
        ];
        $query = $this->db->prepari($sql);
        $result = $query->execute($param);

        return !$result ? false : true;
    }
}