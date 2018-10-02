<?php

namespace Controllers;

use Models\PostsModel;
use Services\PdoConnection;

class PostsController
{
    private $model;
    private $db;

    private function formatString($str)
    {
        $str = trim($str);
        return $str;
    }

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
            if ($this->model->store($this->formatString($title), $this->formatString($description), $text)) {
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

    public function edit($title,$description,$text, $id)
    {
        if (isset($_SESSION['username'])){
            $error = $this->model->validate($title, $description, $text);

            if (!empty($id) && !empty($title) && !empty($description)  && !empty($text) && $error === []) {
                if ($this->model->edit($this->formatString($title), $this->formatString($description), $text, $id)) {
                    header('Location: /index.php');
                }
            }else{
            header("Location: /edit_article.php?flag=update&id=$id");
        }
        }else{
            header('Location: /form_auth.php');
        }

        return false;
    }
}