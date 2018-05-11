<hr size="3px">
<?php
//Создаём объекты классов, методы которых мы позже будем использовать
$pages = new \app\classes\CMenu();
?>
<i>
    <div class="col-md-4" id="menu">
        <?php
        $menus = $pages->prepareMenu();//Список меню
        $allPages = $pages->preparePages();//Список страниц

        if (!is_null($menus))
        {

            foreach ($menus as $value)
            {
                if (!is_null($value))//Если $value не пустая, то
                {
                    //выводим название меню
                    echo "<u class='menu'><i class='{$value['icon']} {$value['icon_size']}'></i>{$value['name']}</u>";

                    //страницы меню:
                    echo "<ul>";
                    //в цикле foreach перебираем массив со страницами
                    foreach ($allPages as $item)
                    {
                        //и если в нём menu_number странички совпадает с id меню, то
                        if ($item['menu_number'] == $value['id'])
                        {
                            // получаем массив всего меню с БД $items[id] = array;

                            $items = $pages->get_menu_from_DB($item["id"]);
                            //выводим эти странички
                            foreach ($items as $val)
                            {
                                echo "<li><a class='pages' href='?page={$val['id']}'>
                                <i class='{$val['menu_icon']} {$val['icon_size']}'></i> 
                                {$val['menu_name']}</a></li>";
                            }
                        }
                    }
                    echo "</ul>";
                }
            }
            require_once "views/VNews.php";
            ?>

        </div><!--class="col-md-3" id="menu"-->
        <?php
    }
?>
</i>