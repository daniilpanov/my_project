<?php
namespace app\classes;


class MSettings
{
    public function getSettings()
    {
        $sql = "SELECT * FROM constants";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}