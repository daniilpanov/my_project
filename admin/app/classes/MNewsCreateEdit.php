<?php
namespace app\classes;


class MNewsCreateEdit
{
    //Получение с БД всех новостей ИЛИ одной новости
    public function getNews($id = null)
    {
        $sql = "SELECT * FROM news";
        if (!is_null($id))
        {
            $sql .= " WHERE id = '{$id}'";
        }
        elseif (is_null($id))
        {
            $sql .= " ORDER BY id DESC";
        }
        $result = \app\classes\Db::getInstance()->sql($sql);
        return $result;
    }

    public function insertNews($sql)
    {
        \app\classes\Db::getInstance()->sql($sql);
    }

    public function finalUpdateNews($sql)
    {
        echo $sql;
        \app\classes\Db::getInstance()->sql($sql);
    }

    public function delete_news($id)
    {
        $sql = "DELETE FROM news WHERE id='{$id}'";
        \app\classes\Db::getInstance()->sql($sql);
    }
}