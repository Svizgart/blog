<?php
session_start();
spl_autoload_register(function ($name)
{
    include_once str_replace("\\", DIRECTORY_SEPARATOR, $name) . '.php';
});

$flag = $_REQUEST['flag'] ?? null;

if ("show" === $flag){
    $onePost = new \Controllers\PostsController;
    $showPost = $onePost->show($_GET['id']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

   <?php include_once 'Front/partials/header.html' ?>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <?php include_once 'Front/partials/menu.php' ?>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header" style="background-image: url('img/about-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1><?php echo $showPost['title'] ?></h1>
                        <hr class="small">
                        <?php if ( isset($_SESSION['username'])):?>

                                <a href="edit_article.php?flag=update&id=<?php echo $showPost['id']?>">
                                    <button type="submit" class="btn btn-default">Изменить</button>
                                </a>

                        <?php endif; ?>
                        <!--<span class="subheading">This is what I do.</span>-->
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
                echo $showPost['text'];
                ?>
            </div>
        </div>
    </div>
    <hr>

    <?php include_once 'Front/partials/footer.html' ?>

</body>

</html>
