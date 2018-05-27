<?php
$page_content = new \app\classes\CContent();
if ($_GET['page'])
{
    $content = $page_content->prepareContent($_GET['page']);
    if (empty($content))
    {
        header('Location: 404.php');
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
