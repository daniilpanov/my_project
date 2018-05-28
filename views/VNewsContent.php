<?php
$newsC = new app\classes\CNewsContent();
$NContent = $newsC->getNewsContent($_GET['news']);
if ($_GET['news'])
{
    if (empty($NContent))
    {
        $not_found = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        header('Location: 404.php?not_found='.$not_found);
    }
    elseif (!empty($NContent))
    {
        unset($not_found);
    }
    //Если есть GET news, то, чтобы вывелся title НОВОСТИ, удаляем весь массив content
    unset($content);
}
