<hr size="3px">
<?php
$pages = new \app\classes\CMenu();
$menus = $pages->prepareMenu();

    echo "<div class='jumbotron'><i>";
        foreach ($menus as $value)
        {
            echo "<a class='menu' href='index.php?page={$value['id']}'>{$value['menu_name']}</a>";
        }
    echo "</i></div>";



