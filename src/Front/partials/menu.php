<div class="navbar-header page-scroll">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        Menu <i class="fa fa-bars"></i>
    </button>
    <a class="navbar-brand" href="../../index.php">my blog</a>
</div><!-- Collect the nav links, forms, and other content for toggling -->

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a href="../../index.php">Home</a>
        </li>
        <!--<li>
            <a href="about.php">About</a>
        </li>-->
        <!--<li>
            <a href="post.php">Sample Post</a>
        </li>-->
        <?php if ( isset($_SESSION['username'])):?>
        <li>
            <a href="../../add_article.php">добавить статью</a>
        </li>
        <?php endif; ?>

        <?php
        if (isset($_SESSION['username'])):?>
        <li>
            <a href="../../index.php?exit=1">Выйти</a>
        </li>
        <?php else: ?>
        <li>
            <a href="../../form_aut.php">Войти</a>
        </li>
        <?php endif; ?>
    </ul>
</div>
<!-- /.navbar-collapse -->