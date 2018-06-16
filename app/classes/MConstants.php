<?php
namespace app\classes;


class MConstants
{
    protected function getSiteName()
    {
        $sql = "SELECT `value` FROM constants WHERE name='site_name'";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }
}