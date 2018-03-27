<?php
session_start();

require_once "header.php";
if($_GET['page']=="logout")
{
    unset($_SESSION['authorised']);
    header( 'Refresh: 1; url=http://localhost/my_project/admin/' );
}

if (!$_SESSION['authorised'])
{
    // Если нет $_POST, то подключаем:
    require_once "views/VLogin.php";
}

if($_SESSION['authorised'])
{
    // Если есть суперглобальный массив $_SESSION с ключом 'authorised', то подключаются body.php  &  footer.php
    require_once "body.php";
    require_once "footer.php";
}


if ($_POST)
{
    if ($_POST['authorisation'])
    {
        // Если пользователь что-то отправил в форме, создаём объект, при создании которого вызывается метод __construct
        new \app\classes\CLogin($_POST['login'],$_POST['password']);
    }
}
