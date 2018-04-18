<hr size="3px">
<?php
//Создаём объекты классов, методы которых мы позже будем использовать
$pages = new \app\classes\CMenu();
$count = new app\classes\CCountMenu();

?>
<input id="openMenu" type="checkbox">
<!--<label for="openMenu"><i class="icon-reorder icon-large"> </i></label>-->
<div class='row menu'>
    <i>
        <div class="col-md-12">
            <?php
            $menus = $pages->prepareMenu();//Список страниц
            $allPages = $pages->preparePages();//Список страниц

            if (!is_null($menus))
            {
            ?>
                <ol>
                    <?php

                    foreach ($menus as $value)
                    {
                        if (!is_null($value))//Если $value не пустая, то
                        {
                            //выводим ссылку
                            echo "<li class='menu'>{$value['name']}</li><ul>";
                            foreach ($allPages as $item)
                            {
                                if ($item['menu_number'] == $value['id'])
                                echo "<li><a href='?page={$item['id']}'>{$item['menu_name']}</a></li>";
                            }
                            echo "</ul>";
                        }
                    }

                    ?>
                </ol>
            </div>
            <?php
        }
    ?>
            <div id="menus"><?php
            //Используем зтот метод для подсчёта страниц меню
            $menuPages = $count->countMenu();
            //В цикле выводим ссылки на страницы меню
            for ($a = 1;$a<=$menuPages;$a++)
            {
                echo "<a class='slide' href=?menu={$a}>{$a}</a>";
            }

            //Выводим, на какой странице меню находится пользователь
            if (!$_GET['menu'])
            {
                echo "<br><span id='fromMenus'>Вы на 1 странице меню.</span>";
            }
            elseif ($_GET['menu'])
            {
                echo "<br><span id='fromMenus'>Вы на {$_GET['menu']} странице меню.</span>";
            }
            ?>
        </div>
    </i>
</div>