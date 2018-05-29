<?php
if ($_GET['editAuth'])
{
    $auth = $vcreateeditauth->getAuth($_GET['editAuth']);
    if (!$_POST['lastPassword'])
    {
        ?>
        <form method="post">
        <pre id="check">
            Для того, чтобы изменить данные пользователя <?=$auth['login']?>,
            Вам необходимо записать ниже его пароль:
            <input type="password" name="lastPassword" placeholder="Пароль"><label><span class="glyphicon glyphicon-remove"></span><input type="reset" hidden></label>
            <input type="submit" value="Продолжить">
        </pre>

        </form>
        <?php
    }
    elseif ($_POST['lastPassword'])
    {
        $_SESSION['password_from_DB'] = md5(md5('fish').md5($_POST['lastPassword']).md5('meat'));
        if ($_SESSION['password_from_DB'] == $auth['password'])
        {
            $_SESSION['password'] = $_POST['lastPassword'];
            require_once "views/VAuthEdit.php";
        }
        else
        {
            echo "Вы не правильно ввели пароль!";
        }
    }
}
elseif ($_GET['deleteAuth'])
{
    $auth = $vcreateeditauth->getAuth($_GET['deleteAuth']);
    if (!$_POST['lastPassword'])
    {
        ?>
        <form method="post">
        <pre id="check">
            Для того, чтобы удалить пользователя <?=$auth['login']?>,
            Вам необходимо записать ниже его пароль:
            <input type="password" name="lastPassword" placeholder="Пароль"><label><span class="glyphicon glyphicon-remove"></span><input type="reset" hidden></label>
            <input type="submit" value="Продолжить">
        </pre>

        </form>
        <?php
    }
    elseif ($_POST['lastPassword'])
    {
        $_SESSION['password_from_DB'] = md5(md5('fish').md5($_POST['lastPassword']).md5('meat'));
        if ($_SESSION['password_from_DB'] == $auth['password'])
        {
            $_SESSION['password'] = $_POST['lastPassword'];
            require_once "views/VAuthDelete.php";
        }
        else
        {
            echo "Вы не правильно ввели пароль!";
        }
    }
}
