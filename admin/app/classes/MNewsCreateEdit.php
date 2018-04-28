<?php
namespace app\classes;


class MNewsCreateEdit
{
    //Получение с БД всех новостей
    public function getNews()
    {
        $sql = "SELECT * FROM news";
        $result = \app\classes\Db::getInstance()->sql($sql);
        return $result;
    }
}