<?php
namespace app\classes;


class MPageCreateEdit
{
    public function getPagesList()
    {
        $sql = "SELECT id, menu_name, created FROM pages";
        $result = Db::getInstance()->sql($sql);

        return $result;
    }
    public function insertPage($sql)
    {
        echo $sql;
        Db::getInstance()->sql($sql);
    }
}