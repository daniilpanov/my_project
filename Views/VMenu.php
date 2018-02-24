<hr size="3px">
<?php
$pages = new \app\classes\CMenu();
$menus = $pages->prepareMenu();
echo "<div id='admin><a href='admin/app''>Войти как администратор</a></div>";
echo "<input type='checkbox' id='hidden-visible' hidden><label for='hidden-visible'><h1>></h1></label> ";
    echo "<div class='jumbotron'><i>";
        foreach ($menus as $value)
        {
            echo "<a class='menu' href='index.php?page={$value['id']}'>{$value['menu_name']}</a>";
        }
    echo "</i></div>";



