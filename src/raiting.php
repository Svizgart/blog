<?php 
if($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')
{
echo "Вы поставили оценку ".$_GET["user_votes"]." за статью №".$_GET["id_arc"];
}
?>