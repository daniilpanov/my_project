<?php
namespace app\classes;


class MPages
{
    public function getPages($parent_id)
    {
        $sql = "SELECT id, menu_name FROM pages WHERE menu_number='{$parent_id}'";

        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}