<?php
namespace app\classes;


class MNews
{
    //функция для получения новостей
    public function getAllNews()
    {
        $sql = "SELECT id, name, description, image, image_width FROM news ORDER BY id DESC LIMIT 5";
        $result = Db::getInstance()->sql($sql);

        return $result;
    }

    //функция для подсчёта новостей
    public function countNews()
    {
        $sql = "SELECT COUNT(id) FROM news";
        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}