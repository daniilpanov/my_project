<?php
$page_content = new \app\classes\CContent();
if ($_GET['page'])
{
    $content = $page_content->prepareContent($_GET['page']);
    if (empty($content))
    {
        $not_found = $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        header('Location: 404.php?not_found='.$not_found);
    }
    elseif (!empty($content))
    {
        unset($not_found);
    }
    //Если есть GET page, то, чтобы вывелся title СТРАНИЦЫ, удаляем весь массив NContent
    unset($NContent);

}
elseif (!$_GET['page'])
{
    $content = $page_content->prepareContent(1);
    if (is_null($content))
    {
        $id = 1;
        while (is_null($content))
        {
            $id++;
            $content = $page_content->prepareContent($id);
        }
    }
}
