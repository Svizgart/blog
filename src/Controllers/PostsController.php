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
            ->query('SELECT * FROM posts ORDER BY date DESC')
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
        if (isset($_SESSION['username'])){
            $error = $this->validate($title, $description, $text);
            $sql = "INSERT INTO posts (title, description, text, date) VALUE (:title, :description, :text, :data_post)";
            $query = $this->db->connect()->prepare($sql);

            if (!empty($title) && !empty($description) && !empty($text) && $error ===[]) {
                $query->execute([
                    ':title' => trim($title),
                    ':description' => trim($description),
                    ':text' => trim($text),
                    ':data_post' => date('Y-m-d H-i-s'),
                ]);

                header('Location: /index.php');
            }
        }
    }

    private function validate($title, $description, $text)
    {
        $error = [];

        if (trim($title) === '') {
            $error[] = "Поле title не должно быть пустым";
        }
        if (mb_strlen(trim($title))<5) {
            $error[] = "Поле title не может быть короче 5-и символов";
        }
        if (mb_strlen(strip_tags(trim($title)))>100) {
            $error[] = "Поле title не может быть дленее 100 символов";
        }
        if (mb_strlen(strip_tags(trim($description))) === '') {
            $error[] = "Поле description не должно быть пустым";
        }
        if (mb_strlen(strip_tags(trim($description)))<10) {
            $error[] = "Поле description не может быть короче 10-и символов";
        }
        if (mb_strlen(strip_tags(trim($description)))>250) {
            $error[] = "Поле description не может быть дленее 250 символов";
        }
        if (trim($text) === '') {
            $error[] = "Поле text не должно быть пустым";
        }
        if (mb_strlen(trim($text))<10) {
            $error[] = "Поле text не может быть короче 10-и символов";
        }
        if (mb_strlen(trim($text))>65535) {
            $error[] = "Поле text не может быть дленее 65535 символов";
        }

        return $error;
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
        $error = $this->validate($title, $description, $text);
        //var_dump($error);
        $data_pas = date('Y-m-d H-i-s');

        if (!empty($id) && !empty($title) && !empty($description)  && !empty($text) && $error === []) {

            $sql = "UPDATE posts 
                    SET title = :title, description = :description, text = :text_post, date = :date_pas 
                    where id = :id";
            $stmt = $this->db
                ->connect()
                ->prepare($sql);

            $stmt->bindValue(':title', $title);
            $stmt->bindValue(':description', $description);
            $stmt->bindValue(':text_post', $text);
            $stmt->bindValue(':date_pas', $data_pas);
            $stmt->bindValue(':id', $id);

            if ($stmt->execute()) {
                header('Location: /index.php');
            };

        }else{

            var_dump($error);
           // echo 'не все поля заполнены';
        }
    }
}