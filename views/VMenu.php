<hr size="3px">
<?php
//Создаём объекты классов, методы которых мы позже будем использовать
$pages = new \app\classes\CMenu();

?>
<i>
    <div class="col-md-3" id="menu">
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
                    echo "<u class='menu'>{$value['name']}</u>";

                    //страницы меню:
                    echo "<ul>";
                    //в цикле foreach перебираем массив со страницами
                    foreach ($allPages as $item)
                    {
                        //и если в нём menu_number странички совпадает с id меню, то
                        if ($item['menu_number'] == $value['id'])
                        {
                            //выводим эти странички
                            echo "<li><a class='pages' href='?page={$item['id']}'>
                            <i class='{$item['menu_icon']} {$item['icon_size']}'></i> 
                            {$item['menu_name']}</a></li>";
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