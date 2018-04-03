<?php
namespace app\classes;


class MMenu
{
    public function getMenu($id)
    {
        //В цикле for делаем 5 запросов к БД, начиная от указанного в дочернем классе id
        for ($endId = $id;$endId<=($id+4);$endId++)
        {
            //SQL код запроса к БД
            $sql = "SELECT id, menu_name FROM pages WHERE id='{$endId}'";

            //Вызываем статический метод класса Db для получения объекта и у него вызываем метод sql для запроса к БД
            $result[] = Db::getInstance()->sql($sql);
        }

        //Возвращаем результат
        return $result;
    }
}