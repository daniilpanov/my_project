<hr size="3px">
<?php
$pages = new \app\classes\CMenu();

?><div id='admin'>
    <a href='admin/'>Войти как администратор</a>
</div>


<div class='jumbotron menu'><i>
    <?php
    if (!$_GET['menu'])
    {
        $menus = $pages->prepareMenu(1);
    }
    elseif ($_GET['menu'])
    {
        $menus = $pages->prepareMenu($_GET['menu']);
    }

    if (!is_null($menus))
    {
        ?>
        <ol>
            <?php
            foreach ($menus as $value)
            {
                if (!is_null($value))
                {
                    echo "<li><a href='?page={$value['id']}'>{$value['menu_name']}</a></li>";
                }
            }
            ?>
        </ol>
        <?php
    }

    if (!$_GET['page'])
    {

    }
    elseif ($_GET['page'])
    {

    }
    $count = new app\classes\CCountMenu();
    $menuPages = $count->countMenu();
    var_export($menuPages);
    ?>
</i></div>