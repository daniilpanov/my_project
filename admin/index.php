<?php
session_start();

require_once "header.php";
if($_GET['page']=="logout")
{
    unset($_SESSION['autorisated']);
}

if (!$_POST)
{
    // Если нет $_POST, то подключаем:
    require_once "Views/Vlogin.php";
}

if($_SESSION['autorisated'])
{
    echo "Вошли<a href='?page=logout'>Выйти</a>";
    require_once "body.php";
    require_once "footer.php";
}


if ($_POST)
{
    if ($_POST['autorisation'])
    {
        // Иначе создаём объект для получения пользователей
        $autorisation = new \app\classes\Clogin();
        $check = $autorisation->checkUser($_POST['login'],$_POST['password']);
    }
}
