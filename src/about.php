<?php
session_start();
spl_autoload_register(function ($name)
{
    include_once str_replace("\\", DIRECTORY_SEPARATOR, $name) . '.php';
});

$flag = $_REQUEST['flag'] ?? null;

if ("show" === $flag){
    $onePost = new \Controllers\PostsController;
    $showPost = $onePost->showPosts(intval($_GET['id']));

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
                $value = ['/<\/?script>.*?<\/?script>/', '/<\/?iframe>.*?<\/?iframe>/'];
                echo preg_replace($value , "", $showPost['text']);
                ?>
                <div class="col-md-12 end-xs">
                    <!--<div class="list__rating">-->
                    <?/* if($showPost['click']):*/?>
                        <div class="rating">
                            <form name="<?= $showPost['title'] ?>" autocomplete="off">
                                <div id="rating" class="rating" data-id="<?= $showPost['id']?>"
                                     data-rating_db="<?= $showPost['rating'] ?>"
                                     data-rait_count="<?= $showPost['rait_count']?>">
                                    <input type="radio" id="star5" name="rating" value="5" <? if($showPost->rating == 5): ?> checked <? endif ?>>
                                    <label for="star5"></label>
                                    <input type="radio" id="star4" name="rating" value="4" <? if($showPost->rating == 4): ?> checked <? endif ?>>
                                    <label for="star4"></label>
                                    <input type="radio" id="star3" name="rating" value="3" <? if($showPost->rating == 3): ?> checked <? endif ?>>
                                    <label for="star3"></label>
                                    <input type="radio" id="star2" name="rating" value="2" <? if($showPost->rating == 2): ?> checked <? endif ?>>
                                    <label for="star2"></label>
                                    <input type="radio" id="star1" name="rating" value="1" <? if($showPost->rating == 1): ?> checked <? endif ?>>
                                    <label for="star1"></label>
                                </div>
                            </form>
                        </div>
                    <?/* else:*/?><!--
                        <?/* for($i = 1; $i <= $showPost->rating; $i++):*/?>
                            <i class="fa fa-star star-set"></i>
                    <?/* endfor */?>
                        <?/* for($i = 1; $i <= (5 - $showPost->rating); $i++):*/?>
                            <i class="fa fa-star star-unset"></i>
                    <?/* endfor */?>
                    --><?/* endif */?>
                </div>
        </div>
    </div>
    <hr>

    <?php include_once 'Front/partials/footer.html' ?>

</body>

</html>
