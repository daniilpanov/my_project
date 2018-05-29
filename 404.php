<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Проблема при загрузке этой страницы</title>

    <style rel="stylesheet" type="text/css" media="all">
        #error_code
        {
            /*ALL TYPES OF 'background-image: radial-gradient'*/
            background-image:         radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            background-image:      -o-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            background-image:     -ms-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            background-image:    -moz-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            background-image: -webkit-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);

            -o-background-image:         radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            -o-background-image:      -o-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            -o-background-image:     -ms-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            -o-background-image:    -moz-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            -o-background-image: -webkit-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);

            -moz-background-image:         radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            -moz-background-image:      -o-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            -moz-background-image:     -ms-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            -moz-background-image:    -moz-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            -moz-background-image: -webkit-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);

            -webkit-background-image:         radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            -webkit-background-image:      -o-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            -webkit-background-image:     -ms-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            -webkit-background-image:    -moz-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            -webkit-background-image: -webkit-radial-gradient(ellipse at center, #ffcb00 40%, #000341 70%);
            /*END__ALL TYPES OF 'background-image: radial-gradient'*/

            color: black;

            border-radius: 10px;
            -moz-border-radius: 10px;
            -webkit-border-radius: 10px;

            float: left;
            margin: 0 50px;
            padding: 25px;

            height: 100%;
        }
        #error_code fieldset
        {
            margin: 25px;
            padding: 25px;
            text-align: center;
        }
        #error_code fieldset legend
        {
            text-align: center;
            font-size: 25px;
            font-family: Verdana,Arial,sans-serif;
        }

        #more
        {
            font-size: 20px;
        }
        #more ul
        {
            text-decoration: underline;
        }

        a
        {
            display: block;
            padding: 5px;
            margin: 5px;
            border-radius: 5px;
            -moz-border-radius: 5px;
            -webkit-border-radius: 5px;
            text-decoration: none;
            color: darkred;

            transition-duration: 2s;
            -o-transition-duration: 2s;
            -moz-transition-duration: 2s;
            -webkit-transition-duration: 2s;
        }
        a:hover
        {
            font-size: 30px;
            color: black;
        }

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

        pre
        {
            background-color: #b9b9b9;
            color: darkred;
            padding: 1em;
            font-size: 1.6em;
            border: 2px solid red;

            box-shadow: 0 0 1px 5px red;
            -o-box-shadow: 0 0 1px 5px red;
            -moz-box-shadow: 0 0 1px 5px red;
            -webkit-box-shadow: 4px 4px 6px 5px #b90000;

            text-shadow: 1px 1px 3px darkred;
        }
        pre span
        {
            text-shadow: none;
            font-size: 3.5em;
            color: rgba(0, 0, 0, 0.5);
        }
    </style>
</head>
<body>
<div id="page">
        <?php
        if(!empty($_GET['not_found']))
        {
            echo "<pre>
            Страница 
            <span>&#10077;</span><u><b><i>".$_GET['not_found']."</i></b></u><span>&#10078;</span>
             не существует</pre><hr>";
        }
        ?>
    <?php
    if (!$_GET['call'] == 'true')
    {
       ?>
        <div id="error_code">
            <fieldset>
                <legend>код ошибки:</legend>
                <h1><strong><i>error <u>404</u></i></strong></h1>
            </fieldset>
        </div>
        <div id="more">
            <h3>Возможные причины:</h3>
            <ul>
                <li>Неправильно указан адрес страницы</li>
                <li>Страница удалена</li>
                <li>Баг на сервере</li>
            </ul>
        </div>
        <div id="some_tags_a">
            <a href="?call=true">Связаться с администратором сайта</a>
            <a href="index.php">Обратно на главную страницу</a>
        </div>
        <?php
    }
    elseif ($_GET['call'])
    {
        ?>
        <a href="404.php">Назад</a>
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
    }

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
</div>
</body>
</html>