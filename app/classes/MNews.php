<?php
namespace app\classes;


class MNews
{
    protected function getLimitOfNews()
    {
        $sql = "SELECT `value` FROM constants WHERE `name` = 'news_per_page'";
        $response = Db::getInstance()->sql($sql);
        $result = mysqli_fetch_assoc($response);
        return $result['news_per_page'];
    }

    //метод для получения новостей
    protected function getAllNews($limit = null)
    {
        $sql = "SELECT id, name, description, image, image_width, type_of_measure_unit FROM news ORDER BY id DESC";
        if (!is_null($limit))
        {
            $sql .= " LIMIT {$limit}";
        }
        $result = Db::getInstance()->sql($sql);

        return $result;
    }

    //метод для подсчёта новостей
    protected function countNews()
    {
        $sql = "SELECT COUNT(id) FROM news";
        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}