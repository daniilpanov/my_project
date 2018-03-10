<?php
namespace app\classes;


class MMenu
{
    public function getMenu()
    {
        $sql = "SELECT id, menu_name FROM pages";
        $result = \app\classes\Db::getInstance()->sql($sql);
        return $result;
    }
    
}