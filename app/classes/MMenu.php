<?php
namespace app\classes;


class MMenu
{
    public function getMenu($id)
    {
        for ($endId = $id;$endId<=($id+4);$endId++)
        {
            $sql = "SELECT id, menu_name FROM pages WHERE id='{$endId}'";
            $result[] = Db::getInstance()->sql($sql);
        }

        return $result;
    }
    
}