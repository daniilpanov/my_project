<?php
namespace app\classes;


class CTopMenu extends MTopMenu
{
    public function get_all_top_pages()
    {
        $response = $this->get_all_pages_for_top_menu();
        while ($row = mysqli_fetch_array($response))
        {
            $result[$row['id']] = $row;
        }
        return $result;
    }

    // подготавливаем массив дочерных страниц
    public function prepare_children($pages)
    {
        foreach ($pages as $page)
        {
            if (!empty($page["parent_id"]))
            {
                $children[$page["id"]] = $page["parent_id"];
            }
        }
        return $children;
    }

    //Выводим пункт меню
    public function print_item($page, $pages, $children)
    {
        echo '<li>';
        echo "<a href=\"?page={$page['id']}\" class='pages'>
                  <i class=\"{$page['menu_icon']} {$page['icon_size']}\"></i>{$page['menu_name']}
              </a>";
        // Выводились ли дочерние элементы?
        $ul = false;
        //Бесконечный цикл, в котором мы ищем все дочерние элементы
        while (true)
        {
            // Ищем в массиве $children елементы которые принадлежат родителю
            $key = array_search($page["id"], $children); // если нет - вылетаем с цикла while

            // Если дочерних элементов не найдено
            if (!$key)
            {
                // Если выводились дочерние элементы, то закрываем список
                if ($ul)
                {
                    echo "</ul>";
                }
                break; // Выходим из цикла
            }

            // Удаляем найденный элемент (чтобы он не выводился ещё раз)
            unset($children[$key]);

            if (!$ul)
            {
                echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class=\'caret\'></b></a><ul class="dropdown-menu">'; // Начинаем внутренний список, если дочерних элементов ещё не было
                $ul = true; // Устанавливаем флаг
            }

            // Рекурсивно выводим все дочерние элементы
            echo self::print_item($pages[$key], $pages, $children);
        }
        echo "</li>";
    }
}