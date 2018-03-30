<?php
function __autoload($name)
{
    // конвертируем полный путь в пространстве имён с \ в /
    $name = str_replace('\\', '/', $name);
    //echo $name."<br>";//для отладки
    require_once($name.'.php');
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>

    <!--Meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="">
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <meta name="Robots" content="all" />
    <meta name="Rating" content="General" />
    <meta name="Author" content="" />
    <!--End Meta-->

    <title>сайт `my_project`</title>

    <!--CSS-->
    <link href="styles/bootstrap-3.3.2/dist/css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="styles/bootstrap-3.3.2/dist/js/bootstrap.js" rel="script">
    <link href="styles/jquery.navgoco.css" rel="stylesheet" />
    <link href="img/">
    <link href="styles/style.css" rel="stylesheet" />
    <!--End CSS-->

    <!--Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Marck+Script&subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!--End Fonts-->

    <!--Favicon-->
    <link rel="shortcut icon" href="favicon.ico" />
    <!--End Favicon-->

    <!--Java scripts-->
    <script type="text/javascript" src="js/jquery/jquery-1.11.3.js"></script>
    <script type="text/javascript" src="js/jquery/jquery.cookie.js"></script>
    <script type="text/javascript" src="js/jquery/jquery.navgoco.js"></script>
    <script type="text/javascript" src="js/jquery/jquery.lightbox-0.5.js"></script>
    <!--End Java scripts-->

    <!--Bootstrap-->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!--End Bootstrap-->

</head>