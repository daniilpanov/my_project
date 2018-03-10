<!DOCTYPE html>
<html lang="ru">
<head>
    <style>

    </style>
    <meta charset="UTF-8">
    <title>Войти как администратор</title>
</head>
<body>
<?php
if (empty($_POST))
{
    ?>
    <form method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <input type="submit" value="Войти">
    </form>
<?php
}
elseif (!empty($_POST))
{
    require_once "goToInside.php";
}
?>
</body>
</html>