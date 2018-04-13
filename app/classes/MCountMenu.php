<?php
namespace app\classes;


class MCountMenu
{
    public function getCounter()
    {
        //SQL код для запроса к базе данных
        $sql = "SELECT id FROM menu";

        //Вызываем статический метод класса Db
        $result = Db::getInstance()->sql($sql);

        //Возвращаем результат
        return $result;
    }
}