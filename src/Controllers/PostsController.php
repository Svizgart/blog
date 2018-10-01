<?php

namespace Controllers;

use Models\PostsModel;
use Services\PdoConnection;

class PostsController
{
    private $model;
    private $db;

    public function __construct()
    {
        $this->model = new PostsModel();
        $this->db = new PdoConnection();
    }

    public function index()
    {
        return $this->model->allPosts();
    }

    public function showPosts($id)
    {
        return $this->model->show($id);
    }

    public function store($title, $description, $text)
    {
        if (isset($_SESSION['username'])){
            if ($this->model->store($title, $description, $text)) {
                header('Location: /index.php');
            }else{
                header('Location: /add_article.php');
            }
        }else{
            header('Location: /form_auth.php');
        }
    }

    function update($id)
    {
        return $this->model->update($id);
    }

    public function edit(string $title, string $description, string $text, int $id)
    {
        if (isset($_SESSION['username'])){
            if ($this->model->edit($title, $description, $text, $id)) {
                header('Location: /index.php');
            }

        }else{
            header('Location: /form_auth.php');
        }
        return false;
    }
}