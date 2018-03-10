<?php
if ($_POST['login'] == 'admin' && $_POST['password'] == 'MyProject'
    || $_POST['login'] == 'Daniil' && $_POST['password'] == 'my12345')
{
    ?><a href="index2.php">Войти как администратор</a> <?php
}
