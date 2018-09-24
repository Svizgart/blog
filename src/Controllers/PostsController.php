<?php

namespace Controllers;

use Services\PdoConnection;

//include_once 'PDO_connection.php';

class PostsController
{
    /**
     * @return mixed
     */
    public function index()
    {
        $db = new PdoConnection();
        $db->connect();
//var_dump($db);
        $spl = 'SELECT * FROM posts';
        print_r( $posts = $db->connect()->query($spl));
    }

    public function store($title, $description, $text)
    {
        $request = PdoConnection::prepare(
            "INSERT INTO posts (title, description, text, date) 
              VALUE (:title, :description, :text, :data_post)");

        if (!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['text'])) {
            $result = $request->execute([
                ':title' => trim($title),
                ':description' => trim($description),
                ':text' => trim($text),
                ':data_post' => date('Y-m-d H-i-s'),
            ]);

            if (!$result)
                echo 'error!';

        }else{
            echo "Не заполнены обязательные поля!";
        }

        header('Location: http://localhost:8080');
    }


}





function update($title, $description, $text)
{
    echo $title, '<br>' . $description, '<br>' . $text;
}