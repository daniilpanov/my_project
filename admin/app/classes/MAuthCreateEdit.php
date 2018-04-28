<?php
namespace app\classes;


class MAuthCreateEdit
{
    //Получение с БД всех пользователей
    public function getAuth()
    {
        $sql = "SELECT * FROM users";
        $result = \app\classes\Db::getInstance()->sql($sql);
        return $result;
    }

    //Метод, проверяющий, правильно ли введён пароль и логин, или нет
    public function getUser($id)
    {
        //SQL-запрос
        $sql = "SELECT `password` FROM `users` WHERE id='{$id}'";
        //если запрос - истина, то возвращаем результат
        if($response = Db::getInstance()->sql($sql))
        {
            return $response;
        }
    }

    //Создание пользователей
    public function insertAuth($sql)
    {
        Db::getInstance()->sql($sql);
    }

    //Удаление пользователей
    public function deleteAuth($menu)
    {
        $sql = "DELETE FROM users WHERE id='{$menu}'";
        Db::getInstance()->sql($sql);
    }

    //Обновление пользователей
    public function finalUpdateAuth($sql)
    {
        Db::getInstance()->sql($sql);
    }
}