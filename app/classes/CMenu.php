<?php
namespace app\classes;


class CMenu extends MMenu
{
    public function get_menus_from_DB()
    {
        //Метод для запроса к базе данных
        $response = $this->return_menus();

        //В цикле записываем результат, приведённый к массиву в массив $endResponse
        while ($row = mysqli_fetch_assoc($response))
        {
            $endResponse[] = $row;
        }

        //Возвращаем конечный результат
        return $endResponse;
    }

    // возвращаем меню с БД
    public function get_pages_from_DB($menu_number){

        $res = $this->return_pages($menu_number); // запрос к БД
        while ($row = mysqli_fetch_array($res))
        {
            $mname[$row['id']] = $row;
        }
        return $mname;
    }

    // подготавливаем массив дочерных страниц
    public function prepare_children($pages){

        foreach ($pages as $page) {
            if ($page["parent_id"]) $children[$page["id"]] = $page["parent_id"];
        }
        return $children;
    }

    //Выводим пункт меню
    public function printItem($page, $pages, $children){

        echo '<li>';
        //Проверяем активна ли ссылка пункта подменю
        if($page['active_link_in_sidebar']){
            echo "<a href=\"my_project/?id={$page['id']}\"><i class=\"{$page['menu_icon']} {$page['icon_size']}\"> </i>{$page['menu_name']}</a>";
        }
        else{
            echo "<a href=\"\"><i class=\"{$page['menu_icon']} {$page['icon_size']}\"> </i>{$page['menu_name']}</a>";
        }


        // Выводились ли дочерние элементы?
        $ul = false;

        //Бесконечный цикл, в котором мы ищем все дочерние элементы
        while (true) {

            // Ищем в массиве $children елементы которые принадлежат родителю
            $key = array_search($page["id"], $children); // если нет - вылетаем с цикла while

            // Если дочерних элементов не найдено
            if (!$key) {
                // Если выводились дочерние элементы, то закрываем список
                if ($ul) echo "</ul>";
                break; // Выходим из цикла
            }

            // Удаляем найденный элемент (чтобы он не выводился ещё раз)
            unset($children[$key]);

            if (!$ul) {
                echo '<ul>'; // Начинаем внутренний список, если дочерних элементов ещё не было
                $ul = true; // Устанавливаем флаг
            }

            // Рекурсивно выводим все дочерние элементы
            echo self::printItem($pages[$key], $pages, $children);
        }
        echo "</li>";
    }
}