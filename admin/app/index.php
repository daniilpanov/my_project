<!DOCTYPE html>
<html lang="ru">
<head>
    <style>
        body
        {
            text-align: center;
            background: url("img/3-d-blue-cubes-wallpaper-1920x1080.jpg");
        }
        form
        {
            z-index: 500;
            background-color: gray;
        }
        input
        {
            background-color: #00047f;
            color: #c5e3ff;
            padding: 5px;
            border-radius: 5px;
        }
        a
        {
            border: black solid 1px;
            text-decoration: none;
            margin: 1em 0;
            padding: 0.1em;
            width: 100%;
            display: block;
            text-align: center;
            color: #ff0012;
            font-size: 520%;
            font-family: Verdana, serif;
            background: unset #245b00;
        }
        a:hover
        {
            color: #00047f;
        }
    </style>
    <meta charset="UTF-8">
    <title>Войти как администратор</title>
</head>
<body>
<?if (empty($_POST)) { ?>
    <form method="post">
        <input type="text" name="login" placeholder="Логин">
        <input type="password" name="password" placeholder="Пароль">
        <input type="submit" value="Войти">
    </form>
    <?}?>
<?php
if (!empty($_POST))
{
    if ($_POST['login'] == 'admin' && $_POST['password'] == 'MyProject'
    || $_POST['login'] == 'Daniil' && $_POST['password'] == 'my12345')
    {
        ?><a href="index2.php">Войти как администратор</a> <?php
    }
}
?>
</body>
</html>