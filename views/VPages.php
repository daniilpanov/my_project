<hr size="3px">
<?php
//Создаём объекты классов, методы которых мы позже будем использовать
$pages = new \app\classes\CPages();
?>
<input id="openMenu" type="checkbox">
<!--<label for="openMenu"><i class="icon-reorder icon-large"> </i></label>-->
<div class='row menu'>
    <i>
        <div class="col-md-12">
            <ol>
                <?php
                if (!$_GET['page'])
                {
                    $allPages = $pages->get_pages($_GET['menu_page']);
//                var_export($allPages);
                    foreach ($allPages as $value)
                    {
                        echo "<li><a href='?page={$value['id']}'>{$value['menu_name']}</a></li>";
                    }
                }
                ?>
            </ol>

        </div>
        <a href="?goBack">Назад в список меню</a>
    </i>
</div>