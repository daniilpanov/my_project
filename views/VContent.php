<?php
$page_content = new \app\classes\CContent();
if ($_GET['page'])
{
    //Если есть GET page, то, чтобы вывелся title СТРАНИЦЫ, удаляем весь массив NContent
    unset($NContent);
    $content = $page_content->prepareContent($_GET['page']);
}
elseif (!$_GET['page'])
{
    $content = $page_content->prepareContent(1);
}
