<?php
namespace app\classes;


class MMenuCreateEdit
{
    //Получение с БД всех меню
    public function getMenu()
    {
        $sql = "SELECT * FROM menu";
        $result = \app\classes\Db::getInstance()->sql($sql);
        return $result;
    }

    //Создание меню
    public function insertMenu($sql)
    {
        Db::getInstance()->sql($sql);
    }

    //Удаление меню
    public function deleteMenu($menu)
    {
        $sql = "DELETE FROM menu WHERE id='{$menu}'";
        Db::getInstance()->sql($sql);
    }

    //Обновление меню
    public function finalUpdateMenu($sql)
    {
        Db::getInstance()->sql($sql);
    }
}