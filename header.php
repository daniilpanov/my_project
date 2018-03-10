<?php
function __autoload($name)
{
    // конвертируем полный путь в пространстве имён с \ в /
    $name = str_replace('\\', '/', $name);

    require_once($name.'.php');
}
require_once "Views/VContent.php";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?=$content['title']?>|сайт`my_project`</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>