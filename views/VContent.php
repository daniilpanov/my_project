<?php
$page_content = new \app\classes\CContent();
if ($_GET['page'])
{
    $content = $page_content->prepareContent($_GET['page']);
}
elseif (!$_GET['page'])
{
    $content = $page_content->prepareContent(1);
}