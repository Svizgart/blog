<?php

namespace Controllers;

use Services\PdoConnection;

class PostsController
{
    protected $db;

    public function __construct()
    {
        $this->db = new PdoConnection();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->db
            ->connect()
            ->query('SELECT * FROM posts')
            ->fetchAll();
    }

    public function show($id)
    {
        return $this->db
            ->connect()
            ->query("SELECT * FROM posts WHERE id={$id}")
            ->fetch();
    }

    public function store($title, $description, $text)
    {
        $sql = "INSERT INTO posts (title, description, text, date) VALUE (:title, :description, :text, :data_post)";
        $query = $this->db->connect()->prepare($sql);

        if (!empty($title) && !empty($description) && !empty($text)) {
            $query->execute([
                ':title' => trim($title),
                ':description' => trim($description),
                ':text' => trim($text),
                ':data_post' => date('Y-m-d H-i-s'),
            ]);
        }
    }

    function update($id)
    {
        return $this->db
            ->connect()
            ->query("SELECT * FROM posts WHERE id={$id}")
            ->fetch();
    }

    public function edit(string $title, string $description, string $text, int $id)
    {
        if (!empty($title) && !empty($description) && !empty($text) && !empty($id)) {

            $data_pas = date('Y-m-d H-i-s');

            $sql = "UPDATE posts SET title = :title, description = :description, text = :text_post, date = :date_pas where id = :id";
            $stmt = $this->db
                ->connect()
                ->prepare($sql);

            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':description', $description);
            $stmt->bindValue(':text_post', $text);
            $stmt->bindValue(':date_pas', $data_pas);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

        }else{
            echo 'не все поля заполнены';
        }
    }
}