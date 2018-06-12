<?php
namespace app\classes;


class MAuthCreateEdit
{
    //Получение с БД всех пользователей ИЛИ одного пользователя
    protected function get_auth($id = null)
    {
        $sql = "SELECT * FROM users";
        if(!is_null($id))
        {
            $sql .= " WHERE id={$id}";
        }
        $result = \app\classes\Db::getInstance()->sql($sql);
        return $result;
    }

    //Создание пользователей
    protected function insertAuth($sql)
    {
        Db::getInstance()->sql($sql);
    }

    //Удаление пользователей
    protected function deleteAuth($auth)
    {
        $sql = "DELETE FROM users WHERE id='{$auth}'";
        Db::getInstance()->sql($sql);
    }

    //Обновление пользователей
    protected function finalUpdateAuth($sql)
    {
        Db::getInstance()->sql($sql);
    }
}