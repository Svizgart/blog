<?php
spl_autoload_register(function ($name)
{
    include_once str_replace("\\", DIRECTORY_SEPARATOR, $name) . '.php';
});

$flag = $_REQUEST['flag'] ?? null;

if ("update" === $flag) {
    $onePost = new \Controllers\PostsController;
    $editPost = $onePost->update($_GET['id']);
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

    <title>Добавть новую статью</title>

    <?php include_once 'header.html';?>

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->

        <?php include_once 'menu.php'; ?>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background-color: #234565">
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
            <p>Статья будет добавлена сразу после сохранения</p>
            <p>Все поля обязательны для заполнения!</p>

            <form name="sentMessage" id="contactForm" novalidate action="index.php" method="POST">
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Title*</label>
                        <input type="text" class="form-control" placeholder="Title" id="title"
                               name="title" value="<?= $editPost['title']?>">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>
                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Description*</label>
                        <input type="text" class="form-control" placeholder="Description" id="description"
                               name="description" value="<?= $editPost['description']?>">
                        <p class="help-block text-danger"></p>
                    </div>
                </div>

                <div class="row control-group">
                    <div class="form-group col-xs-12 floating-label-form-group controls">
                        <label>Text*</label>
                        <div id="editor">
                            <textarea name="text" id='edit' style="margin-top: 30px;">
                                <?php echo $editPost['text']?>
                            </textarea>
                        </div>
                    </div>
                </div>

                <input type="hidden" name="flag" value="edit">
                <input type="hidden" name="id" value="<?php echo $editPost['id']?>">

                <br>
                <div id="success"></div>
                <div class="row">
                    <div class="form-group col-xs-12">
                        <button type="submit" class="btn btn-default">Сохронить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<hr>

<?php include_once 'footer.html'?>

</body>

</html>
