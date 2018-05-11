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
        $sql = "SELECT * FROM pages ORDER BY position ASC";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }
    public function return_menu($menu_number)
    {
        $sql="SELECT id, parent_id, menu_icon, icon_size, menu_name FROM pages WHERE menu_number ='{$menu_number}' ORDER BY position";
        $res = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
        return $res; // возвращаем результат
    }
}