<?php
namespace app\classes;


class MPageCreateEdit
{
    // список страниц
    public function getPagesList()
    {
        $sql = "SELECT id, menu_name, created FROM pages";
        $result = Db::getInstance()->sql($sql);

        return $result;
    }

    // добавить страницу
    public function insertPage($sql)
    {
        echo $sql;
        Db::getInstance()->sql($sql);
    }

    // получить список меню
    public function getMenuList()
    {
        $sql = "SELECT id, name FROM menu";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }


}