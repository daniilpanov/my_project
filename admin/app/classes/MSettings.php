<?php
namespace app\classes;


class MSettings
{
    protected function getSettings()
    {
        $sql = "SELECT * FROM constants";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }

    protected function insertSettings($sql)
    {
        Db::getInstance()->sql($sql);
    }
}