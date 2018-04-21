<?php
namespace app\classes;


class MMenuCreateEdit
{
    public function getMenu()
    {
        $sql = "SELECT id, name, created, updated FROM menu";
        $result = \app\classes\Db::getInstance()->sql($sql);
        return $result;
    }

    public function insertMenu($sql)
    {
        Db::getInstance()->sql($sql);
    }

    public function deleteMenu($menu)
    {
        $sql = "DELETE FROM menu WHERE id='{$menu}'";
        Db::getInstance()->sql($sql);
    }
}