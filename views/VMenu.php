<hr size="3px">
<?php
$pages = new \app\classes\CMenu();
$count = new app\classes\CCountMenu();

?><div id='admin'>
    <a href='admin/'>Войти как администратор</a>
</div>

<input id="openMenu" type="checkbox">
<!--<label for="openMenu"><i class="icon-reorder icon-large"> </i></label>-->
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
            if (!$_GET['menu'])
            {
                foreach ($menus as $value)
                {
                    if (!is_null($value))
                    {
                        echo "<li><a class='menu' href='?page={$value['id']}'>{$value['menu_name']}</a></li>";
                    }
                }
            }
            elseif ($_GET['menu'])
            {
                foreach ($menus as $value)
                {
                    if (!is_null($value))
                    {
                        echo "<li><a class='menu' href='?page={$value['id']}&menu={$_GET['menu']}'>{$value['menu_name']}</a></li>";
                    }
                }
            }
            ?>
        </ol>
        <?php
    }
?><div id="menus"> <?php
    if (!$_GET['page'])
    {
        $menuPages = $count->countMenu();
        for ($a = 1;$a<=$menuPages;$a++)
        {
            echo "<a class='slide' href=?menu={$a}>{$a}</a>";
        }
    }
    elseif ($_GET['page'])
    {
        $menuPages = $count->countMenu();
        for ($a = 1;$a<=$menuPages;$a++)
        {
            echo "<a class='slide' href=?page={$_GET['page']}&menu={$a}>{$a}</a>";
        }
    }
    if (!$_GET['menu'])
    {
        echo "<h3>Вы на 1 странице меню.</h3>";
    }
    elseif ($_GET['menu'])
    {
        echo "<h3>Вы на {$_GET['menu']} странице меню.</h3>";
    }
    ?>
</div></i></div>