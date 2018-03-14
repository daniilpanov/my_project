<hr size="3px">
<?php
$pages = new \admin\app\classes\CMenu();
$menus = $pages->prepareMenu();
echo "<div id='admin'><a href='../index.php'>Войти как посетитель</a></div>";
    echo "<table id='menu'>";
        foreach ($menus as $value)
        {
            echo "<tr><td>{$value['id']}</td><td>{$value['menu_name']}</td><input type='checkbox' name='page[]' value='{$value['id']}' ></tr>";
        }
    echo "</table>";