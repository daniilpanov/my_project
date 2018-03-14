<?php
require_once "header.php";
if (!$_POST)
{
    // Если нет $_POST, то подключаем:
    require_once "Views/Vlogin.php";
}
elseif ($_POST)
{
    if ($_POST['autorisation'])
    {
        // Иначе создаём объект для получения пользователей
        $autorisation = new \app\classes\Clogin();
        $check = $autorisation->checkUser($_POST['login'],$_POST['password']);
    }
}