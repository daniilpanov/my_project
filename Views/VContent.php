<?php
$page_content = new \app\classes\CContent();
if ($_GET)
{
    $content = $page_content->prepareContent($_GET['page']);
}
elseif (!$_GET)
{
    $content = $page_content->prepareContent(1);
}