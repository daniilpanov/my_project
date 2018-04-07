<?php
namespace app\classes;

class MChangeAuth
{
    public function get_auth()
    {
        $sql = "SELECT id, login FROM users";

        $result = Db::getInstance()->sql($sql);

        return $result;
    }
    public function change_auth()
    {

    }
}