<?php
session_start();

spl_autoload_register(function ($name)
{
    include_once str_replace("\\", DIRECTORY_SEPARATOR, $name) . '.php';
});

$flag = $_REQUEST['flag'] ?? null;

if ("store" === $flag) {
    $createPost = new \Controllers\PostsController;
    $createPost->store($_POST['title'], $_POST['description'], $_POST['text']);
}elseif ("edit" === $flag) {
    $createPost = new \Controllers\PostsController;
    $createPost->edit($_POST['title'], $_POST['description'], $_POST['text'], $_POST['id']);
}elseif ("auth" === $flag) {
    $login = new \Controllers\AuthController();
    $login->login($_POST['login'], $_POST['password']);
}elseif ("exit" === $flag) {
    $loginOut = new \Controllers\AuthController();
    $loginOut->loginOut($flag);
}

if (isset($_POST['value']) && isset($_POST['id'])) {
    $loginOut = new \Controllers\PostsController();
    $loginOut->rating(intval($_POST['value']), intval($_POST['id']), intval($_POST['rating_db']), intval($_POST['rait_count']));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Clean Blog</title>
    <?php include_once 'Front/partials/header.html' ?>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->


            <?php include_once 'Front/partials/menu.php'; ?>
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/home-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Персональный блог</h1>
                        <hr class="small">
                        <span class="subheading">на тему и без темы</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <?php
                $getPosts = new Controllers\PostsController();
                foreach ($getPosts->index() as $post):?>

                <div class="post-preview">
                    <a href="about.php?flag=show&id=<?= $post['id']?>">
                        <h2 class="post-title">
                            <?= $post['title']?>
                        </h2>
                        <h3 class="post-subtitle">
                            <?= $post['description']?>
                        </h3>
                    </a>
                    <p class="post-meta"><!-- Posted by <a href="#">Start Bootstrap</a> -->
                        <?= "Рейтинг - " . round($post['rating'] / $post['rait_count']) . "<br>" . $post['date'] ?>
                    </p>

                </div>
                    <hr>
                <?php if ( isset($_SESSION['username'])):?>
                            <div class="form-group col-xs-6">
                            <a href="edit_article.php?flag=update&id=<?= $post['id']?>">
                                <button type="submit" class="btn btn-default">Изменить</button>
                            </a>
                        </div>
                <?php endif; ?>
                    <!-- Pager -->
                    <ul class="pager">
                        <li class="next">
                            <a href="about.php?flag=show&id=<?= $post['id']?>">Posts &rarr;</a>
                        </li>
                    </ul>
                <?php endforeach; ?>


            </div>
        </div>
    </div>

    <hr>

<?php include_once 'Front/partials/footer.html' ?>

</body>

</html>
