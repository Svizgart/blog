<?php

include_once 'PDO_connection.php';

$connection->prepare("INSERT INTO posts title, description, text VALUE (:title), (:description), (:text) ");
$connection->execute([
    ':title' => $_POST['title'],
    ':description' => $_POST['description'],
    ':text' => $_POST['text'],
]);

$red = $connection->fetchAll();

function store()
{
    if ($_POST['title']) {

    }else{
        echo 'БОРОДА!';
    }
}