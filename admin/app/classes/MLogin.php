<?php
namespace app\classes;


class MLogin
{
    //Метод, проверяющий, правильно ли введён пароль и логин, или нет
    protected function getUser($login)
    {
        //SQL-запрос
        $sql = "SELECT `password` FROM `users` WHERE login='{$login}'";
        //если запрос - истина, то возвращаем результат
        if($response = Db::getInstance()->sql($sql))
        {
            return $response;
        }
    }
}