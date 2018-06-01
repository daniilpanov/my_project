<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Обратная связь</title>
    <style rel="stylesheet">
        form fieldset
        {
            background-color: darkgrey;
            font-family: "Comic Sans MS", Aharoni, Verdana, serif;
        }
        form input,textarea
        {
            padding: 10px;
            display: block;
            background-color: #6e0000;
            font-family: "Comic Sans MS", Aharoni, Verdana, serif;
            color: whitesmoke;
            border: revert;
        }

        #result
        {
            font-size: 3em;
        }
    </style>
</head>
<a href="<?=$_GET['back']?>">Назад</a>
<div id="sendMail">
    <form method="post">
        <fieldset>
            <legend><h3><i>Вы связываетесь с администратором этого сайта через <u>e-mail</u></i></h3></legend>
            <input type="hidden" name="to" value="daniil_panov2005@mail.ru">
            <input type="text" placeholder="Ваш телефон:" name="phone" style="margin-left: -10000000000px">
            <table id="make_call">
                <tr>
                    <td><label for="email">Ваш e-mail: </label></td>
                    <td>
                        <input type="email" name="from" placeholder="Ваш e-mail" id="email" required spellcheck="false">
                    </td>
                </tr>
                <tr>
                    <td><label for="text">Ваше сообщение: </label></td>
                    <td>
                        <textarea name="text" id="text" placeholder="Ваше сообщение: " spellcheck="false"></textarea>
                    </td>
                </tr>
                <tr><td></td><td><input type="submit" name="send" value="Отправить сообщение"></td></tr>
            </table>
        </fieldset>
    </form>
</div>
<?php
if ($_POST['send'])
{
    if (empty($_POST['phone']))
    {
        if (!mail($_POST['to'], $_POST['from'], $_POST['text']))
        {
            echo "<u id='result'>Что-то пошло не так&hellip;</u>";
        }
        echo "<u id='result'>Ваше сообщение было отправлено администратору сайта.";

    }

    elseif (!empty($_POST['phone']))
    {
        ?>
        <script type="text/javascript">alert('Вы - робот!!!')</script>
        <?php
        header( 'Location: index.php');
    }
}
?>
</html>
