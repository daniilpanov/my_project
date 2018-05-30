<?php
namespace app\classes;


class CPageCreateEdit extends MPageCreateEdit
{
    // возвращает список меню и добавляет надпись "-в конец списка-"
    public function menu_return($last_pos = null)
    {
        // получаем список всех меню
        $res = $this->menu_pos();
        while ($row = mysqli_fetch_assoc($res))
        {
            // заносим в новый массив
            $menu[$row['menu_name']] = $row['position'];
        }
        // добавляем в конец массива пункт "-в конец списка-"
        if($last_pos)
        {
            $k = end($menu);
            $menu[$last_pos] = $k+1;
        }
        return $menu;
    }

    //Получение с БД всех страничек
    public function getAllPages()
    {
        $response = $this->getPagesList();
        while($row = mysqli_fetch_assoc($response))
        {
            $pagesList[] = $row;
        }


        return $pagesList;
    }

    // возвращает список категорий
    function category_return()
    {
        // получаем список всех категорий
        $res = $this->menu_pos();

        // добавляем в начало массива пункт "нет"
        $menu['-нет-'] = 0;

        while ($row = mysqli_fetch_assoc($res))
        {
            // заносим в новый массив
            $menu[$row['menu_name']] = $row['id'];
        }

        return $menu;
    }

    //Создание страничек
    public function createPage($post)
    {
        //var_export($post);// для отладки

        // для установки позиций остальных страничек
        $this->pos_inc($post['position']);


        //Создаём запрос:
        // сюда будем прикреплять ключи,
        $keys = "INSERT INTO pages (";
        // а сюда - значения
        $values ="VALUES(";

        //Считаем post
        $count = count($post);
        // переменная для счёта
        $counter = 0;
        //Перебираем post как ключ и значение
        foreach ($post as $key => $val)
        {
            $counter++;
            if($counter != $count)//если это - не конечный эл. массива, то
            {
                //формируем две вот такие части запроса:
                $keys .= $key.', ';
                $val = str_replace("'", "&rsquo;", $val);
                $values .= "'{$val}', ";
            }
            else//Иначе:
            {
                //формируем конечные части запроса
                $keys .= $key.') ';
                $val = str_replace("'", "&rsquo;", $val);
                $values .= "'{$val}')";
            }

        }

        $sql = $keys.$values;

//        echo $sql;
        // отправляем информацию в базу

        $this->insertPage($sql);
    }

    //Получение меню(в создании страницы надо указать меню, в котором страничка будет находится)
    public function getAllMenus()
    {
        $response = $this->getMenuList();

        while ($row = mysqli_fetch_assoc($response))
        {
            $menus[] = $row;
        }

        return $menus;
    }

    //Удаление страничек
    public function deletePages($page)
    {
        $this->deletePage($page);
    }

    //Обновление страничек
    public function updatePage($id,$post)
    {
        //Меняем позицию:
        $this->pos_inc($post['position']);

        //Начало запроса:
        $sql = "UPDATE pages SET ";
        //Считаем эл. массива place(колонки в таблице, которые надо изменить)
        $count = count($post);
        // переменная для счёта
        $counter = 0;
        //Перебираем place как ключ и значение
        foreach ($post as $key => $val)
        {
            $counter++;
            if($counter != $count)//если это - не конечный эл. массива, то
            {
                //формируем две вот такую часть запроса:
                $val = str_replace("'", "&prime;", $val);
                $val = str_replace('"', '&Prime;', $val);
                $sql .= $key."='{$val}', ";
            }
            else//Иначе:
            {
                //формируем конечную часть запроса
                $val = str_replace("'", "&prime;", $val);
                $val = str_replace('"', '&Prime;', $val);
                $sql .= $key."='{$val}' ";
            }
        }
        // и соединяем их
        $sql .=" WHERE id = '{$id}'";

//        echo $sql;

        // отправляем информацию в базу
        $this->finalUpdatePage($sql);
    }
}