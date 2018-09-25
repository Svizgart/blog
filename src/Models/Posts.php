<?php

namespace Models;

use Models\Model;

class Posts extends Model
{

    private $db;
    private $table;

    public function __construct($db)
    {
        parent::__construct($db);
        $this->table = 'posts';
    }

    private function validate($title, $description, $text)
    {
        $error = [];

        if ($title === '')
            $error[] = "Поле title не должно быть пустым";
        elseif (mb_strlen($title)<5)
            $error[] = "Поле title не может быть короче 5-и символов";
        elseif (mb_strlen($title)>100)
            $error[] = "Поле title не может быть дленее 100 символов";
        elseif ($description === '')
            $error[] = "Поле description не должно быть пустым";
        elseif (mb_strlen($description)<10)
            $error[] = "Поле description не может быть короче 10-и символов";
        elseif (mb_strlen($title)>250)
            $error[] = "Поле title не может быть дленее 250 символов";
        elseif ($text === '')
            $error[] = "Поле text не должно быть пустым";
        elseif (mb_strlen($text)<10)
            $error[] = "Поле text не может быть короче 10-и символов";
        elseif (mb_strlen($text)>65535)
            $error[] = "Поле text не может быть дленее 65535 символов";

        return $error;
    }

    public function addPost($title, $description, $text)
    {
        if ($this->validate($title, $description, $text) === []) {
            $sql = "INSERT INTO posts (title, description, text)VALUES (:title, :description, :text)";
            $param = [
                'title' => $title,
                'description' => $description,
                'text' => $text
            ];
            $query = $this->db->prepari($sql);
            $result = $query->execute($param);

            return !$result ? false : $this->db->lastInsertId();
        }
    }

    public function editPost($id, $title, $description, $text)
    {
        if ($this->validate($title, $description, $text) === []) {
            $sql = "UPDATE posts SET title=:title, description=:description, text=:text";
            $param = [
                'title' => $title,
                'description' => $description,
                'text' => $text
            ];
            $query = $this->db->prepari($sql);
            $result = $query->execute($param);

            return !$result ? false : true;
        }
    }
    
}