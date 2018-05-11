<?php
namespace app\classes;


class CMenuCreateEdit extends MMenuCreateEdit
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

    //Получение с БД всех меню
    public function getAllMenus()
    {
        $response = $this->getMenu();

        foreach ($response as $value)
        {
            $menu[] = $value;
        }
        return $menu;
    }

    //Создание меню
    public function createMenu($post)
    {
        $this->pos_inc($post['position']);

        //Создаём запрос:
        // сюда будем прикреплять ключи,
        $keys = "INSERT INTO menu (";
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
                $values .= "'{$val}', ";
            }
            else//Иначе:
            {
                //формируем конечные части запроса
                $keys .= $key.') ';
                $values .= "'{$val}')";
            }

        }
        // и соединяем их
        $sql = $keys.$values;


        // отправляем информацию в базу
        $this->insertMenu($sql);
    }

    //Удаление меню
    public function deleteMenus($menu)
    {
        $this->deleteMenu($menu);
    }

    //Обновление меню
    public function updateMenu($id,$place)
    {
        $this->pos_inc($place['position']);

        //Начало запроса:
        $sql = "UPDATE menu SET ";

        //Считаем эл. массива place(колонки в таблице, которые надо изменить)
        $count = count($place);
        // переменная для счёта
        $counter = 0;
        //Перебираем place как ключ и значение
        foreach ($place as $key => $val)
        {
            $counter++;
            if($counter != $count)//если это - не конечный эл. массива, то
            {
                //формируем две вот такую часть запроса:
                $sql .= $key."='{$val}', ";
            }
            else//Иначе:
            {
                //формируем конечную часть запроса
                $sql .= $key."='{$val}' ";
            }

        }
        //Завершающая часть запроса
        $sql .="WHERE id = '{$id}'";
        $this->finalUpdateMenu($sql);
    }

}