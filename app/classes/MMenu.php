<?php
namespace app\classes;


class MMenu
{
    public function getMenu()
    {
        $sql = "SELECT id, name, icon, icon_size FROM menu";
        $result = Db::getInstance()->sql($sql);

        //Возвращаем результат
        return $result;
    }
    public function getPages()
    {
        $sql = "SELECT id, menu_number, menu_name, icon_size, menu_icon FROM pages ORDER BY position ASC";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}