<?php
namespace app\classes;


class MSettings
{
    public function getSettings($name = null)
    {
        $sql = "SELECT * FROM constants";
        if (!is_null($name))
        {
            $sql .= " WHERE name = '{$name}'";
        }
        $result = Db::getInstance()->sql($sql);
        return $result;
    }

    public function insertSettings($sql)
    {
        Db::getInstance()->sql($sql);
    }
}