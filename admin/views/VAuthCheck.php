<?php
if (!$_POST['password'])
{
    ?>
    <form method="post">
        <table>
            <thead>
            <tr><td><h3>Для того, чтобы изменить данные этого пользователя,</h3></td></tr>
            <tr><td><h3>Вам надо написать ниже его пароль</h3></td></tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <input type="password" name="password" placeholder="Пароль">
                    <label><span class="glyphicon glyphicon-remove"></span><input type="reset" hidden></label>
                </td>
            </tr>
            <tr><td><input type="submit" value="Продолжить"></td></tr>
            </tbody>
        </table>
    </form>
    <?php
}
elseif ($_POST['password'])
{
    $vcreateeditauth->CheckAuth($_GET['editAuth'], $_POST['password']);
}

if ($_SESSION['permission'] === TRUE)
{
    ?>
    <a href="?editUser=<?=$_GET['editAuth']?>">Продолжить</a>
    <?php
}