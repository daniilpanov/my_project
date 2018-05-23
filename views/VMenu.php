<hr size="3px">
<?php
//Создаём объекты классов, методы которых мы позже будем использовать
$pages = new \app\classes\CMenu();

$menus = $pages->get_menus_from_DB();//Список меню
?>
<i>
    <div class="col-md-4" id="menu">
        <?php

    if (!is_null($menus))
    {
        // выведедем каждое название меню по отдельности (одна итерация - одно меню)
        foreach ($menus_items as $menu) {

            if($menu["header_visible"]== 1){
                echo "<h4>".$menu["menu_name"]."</h4>"; // выведем название меню
            }

            // ПОДГОТАВЛИВАЕМ МАССИВЫ СТРАНИЦ ДЛЯ ФОРМИРОВАНИЯ МЕНЮ

            // подготавливаем массив всех страниц для определённого меню $all_pages[id] = array(страница со всеми полями с этим id);
            $all_pages = $pages->get_pages_from_DB($menu['id']);//Список страниц

            // подготавливаем массив дочерных страниц $children[$all_pages["id"]] = $all_pages["parent_id"]
            // например, $children[3] = 1;
            $children = $pages->prepare_children($all_pages);

            // выводим каждую страницу меню
            foreach ($all_pages as $item_page) {
                // если элемент не имеет дочерных элементов выводим его
                if(!$item_page["parent_id"]) {
                    echo $pages->printItem($item_page, $all_pages, $children);
                }

        }


    }
            require_once "views/VNews.php";
            ?>

        </div><!--class="col-md-3" id="menu"-->
        <?php
    }
?>
</i>