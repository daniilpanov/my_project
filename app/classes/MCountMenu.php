<?php
namespace app\classes;


class MCountMenu
{
    public function getCounter()
    {
        $sql = "SELECT COUNT(id) FROM pages";

        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}