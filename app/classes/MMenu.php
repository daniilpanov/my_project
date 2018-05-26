<?php
namespace app\classes;


class MMenu
{
    public function return_menus()
    {
        $sql = "SELECT id, name FROM menu ORDER BY position"; // готовим запрос

        $res = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
        return $res; // возвращаем результат
    }
    public function return_pages($menu_number)
    {
        $sql="SELECT id, parent_id, menu_icon, icon_size, menu_name FROM pages WHERE menu_number ='{$menu_number}' ORDER BY position";
        $res = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
        return $res; // возвращаем результат
    }
}