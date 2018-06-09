<?php
function __autoload($name)
{
    $name = str_replace("\\", "/", $name);

    require_once ($name.'.php');
}
$send = new app\classes\SendMail();
?>
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
    </style>
</head>
<a href="<?=$_GET['back']?>">Назад</a>
<div id="sendMail">
    <form method="post">
        <fieldset>
            <legend><h3><i>Вы связываетесь с администратором этого сайта через <u>e-mail</u></i></h3></legend>
            <table id="make_call">
                <tr>
                    <td><label for="email">Ваш e-mail: </label></td>
                    <td>
                        <input type="email" name="from" placeholder="Ваш e-mail" id="email" required spellcheck="false">
                    </td>
                </tr>
                <tr>
                    <td><label for="subject">Тема Вашего сообщения: </label></td>
                    <td>
                        <input type="text" name="subject" placeholder="Тема Вашего сообщения: " id="subject" spellcheck="false">
                    </td>
                </tr>
                <tr>
                    <td><label for="phone">Ваш телефон: </label></td>
                    <td>
                        <input type="tel" name="phone" placeholder="Ваш телефон: " id="phone" spellcheck="false">
                    </td>
                </tr>
                <tr>
                    <td><label for="text">Ваше сообщение: </label></td>
                    <td>
                        <textarea name="message" id="text" placeholder="Ваше сообщение: " spellcheck="false"></textarea>
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
    $from = $_POST['from'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    $phone = $_POST['phone'];
    $send->send_mail($from, $subject, $message, $phone);
}
?>
</html>
