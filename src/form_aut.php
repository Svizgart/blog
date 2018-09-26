<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location: /index.php');
}
?><!doctype html>
<html lang="en">
<head>
    <?php include_once 'Front/partials/header.html'; ?>
</head>
<body>

<div class="container">
    <form class="form-signin" role="form" action="index.php" method="post">
        <div class="form-group">
            <label for="inputEmail" class="control-label col-xs-2">Login</label>
            <div class="col-xs-10">
                <input type="text" class="form-control" name="login" placeholder="Login">
            </div>
        </div>
        <div class="form-group">
            <label for="inputPassword" class="control-label col-xs-2">Пароль</label>
            <div class="col-xs-10">
                <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Пароль">
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-offset-2 col-xs-10">
                <button type="submit" class="btn btn-primary">Войти</button>
            </div>
        </div>
        <input type="hidden" name="flag" value="aut">
    </form>
</div>

</body>
</html>
