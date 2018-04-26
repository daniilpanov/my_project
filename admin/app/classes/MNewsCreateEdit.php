<?php
namespace app\classes;


class MNewsCreateEdit
{
    public function getNews()
    {
        $sql = "SELECT * FROM news";
        $result = \app\classes\Db::getInstance()->sql($sql);
        return $result;
    }

    public function insertNews($sql)
    {
        Db::getInstance()->sql($sql);
    }

    public function deleteNews($news)
    {
        $sql = "DELETE FROM news WHERE id='{$news}'";
        Db::getInstance()->sql($sql);
    }

    public function finalUpdateNews($sql)
    {
        Db::getInstance()->sql($sql);
    }
}