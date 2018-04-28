<?php
namespace app\classes;


class CPageCreateEdit extends MPageCreateEdit
{
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

    //Создание страничек
    function createPage($post)
    {
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
                $values .= "'{$val}', ";
            }
            else//Иначе:
            {
                //формируем конечные части запроса
                $keys .= $key.') ';
                $values .= "'{$val}')";
            }

        }

        $sql = $keys.$values;

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
    public function updatePage($id,$place)
    {
        //Начало запроса:
        $sql = "UPDATE pages SET ";
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
        // и соединяем их
        $sql .="WHERE id = '{$id}'";
        // отправляем информацию в базу
        $this->finalUpdatePage($sql);
    }
}