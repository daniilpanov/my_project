<?php
$pagesList = $vcreateedit->getAllPages();
foreach ($pagesList as $value)
{
    echo "<a href='?editPage={$value['id']}'>{$value['menu_name']}</a><br>";
}