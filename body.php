<body>
<header>
    <div style="text-align: center;">
        <table id="header">
            <tr>
                <!--Логотип сайта-->
                <td id="logo" class="col-3">
                    <img src="img/compass_pic.png" width="100px" height="100px" border="0">
                </td>
                <!--Название сайта-->
                <td id="siteName" class="col-8">
                    <h1>MY PROJECT</h1>
                </td>
            </tr>
        </table>
    </div>
    <div id="admin">
        Если Вы хотите стать одним из администраторов этого сайта, нажмите <a href="callToAdmin.php?back=index.php" target="_blank">сюда</a>
    </div>
</header>
<?php
//Создаём объекты классов, методы которых мы позже будем использовать
$topPages = new \app\classes\CTopMenu();
$pages = new \app\classes\CMenu();
$news = new app\classes\CNews();

require_once "views/VTopMenu.php";
?>
<div class="row">
<?php
require_once "views/VMenu.php";
?>
    <div class='col-md-7' id="content">
        <?php
        if (!$_GET || $_GET['page'])
        {
            echo $content['content'];
        }
        ?>
        <?php

        // Router
        if ($_GET)
        {
            ?>
            <?php
            if ($_GET['news'])
            {
                echo $NContent['content'];
            }
            elseif ($_GET['all'] == 'news')
            {
                require_once "views/VAllNews.php";
            }
            ?>
            <?php
        }
        elseif ($_POST)
        {

        }
        ?>
    </div>
</div>
