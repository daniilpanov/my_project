<?php
namespace app\classes;


class Mlogin
{
    public function getUser($login)
    {
        $sql = "SELECT password FROM users WHERE login='{$login}'";
        if ($response = Db::getInstance()->sql($sql))
        {
            return $response;
        }
        elseif (!$response = Db::getInstance()->sql($sql))
        {
            $response = false;
            return $response;
        }
    }
}