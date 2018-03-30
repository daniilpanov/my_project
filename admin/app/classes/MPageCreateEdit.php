<?php
namespace app\classes;


class MPageCreateEdit
{
    public function getPagesList()
    {
        $sql = "SELECT id, menu_name FROM pages";
        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}