<?php
namespace app\classes;


class MForget
{
    public function getData($name, $get)
    {
        $sql = "SELECT {$get},email FROM users WHERE `name&surname` = '{$name}'";
        if($response = Db::getInstance()->sql($sql))
        {
            return $response;
        }
        return $response;
    }
}