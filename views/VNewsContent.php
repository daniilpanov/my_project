<?php
$newsC = new app\classes\CNewsContent();
$NContent = $newsC->getNewsContent($_GET['news']);
if ($_GET['news'])
{
    if (empty($NContent))
    {
        header('Location: 404.php?not_found='.$_SERVER['PHP_SELF']);
    }
    //Если есть GET news, то, чтобы вывелся title НОВОСТИ, удаляем весь массив content
    unset($content);
}
