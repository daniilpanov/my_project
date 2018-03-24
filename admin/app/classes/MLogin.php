<?php
namespace app\classes;


class MLogin
{
    public function getUser($login)
    {
        $sql = "SELECT `password`, `name&surname`, `email` FROM `users` WHERE login='{$login}'";
        if($response = Db::getInstance()->sql($sql))
        {
            return $response;
        }

    }
}