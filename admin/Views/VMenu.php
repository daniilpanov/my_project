<hr size="3px">
<?php
$pages = new \app\classes\CMenu();
$menus = $pages->prepareMenu();
echo "<div id='admin'><a href='admin/app'>Войти как администратор</a></div>";
    echo "<div class='jumbotron'><i><ul>";
        foreach ($menus as $value)
        {
            echo "<li><a class='menu' href='index.php?page={$value['id']}'>{$value['menu_name']}</a></li>";
        }
    echo "</ul></i></div>";



