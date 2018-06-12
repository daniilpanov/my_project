<?php
namespace app\classes;


class MNewsCreateEdit
{
    //Получение с БД всех новостей ИЛИ одной новости
    protected function getNews($id = null)
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

    protected function insertNews($sql)
    {
        \app\classes\Db::getInstance()->sql($sql);
    }

    protected function finalUpdateNews($sql)
    {
        echo $sql;
        \app\classes\Db::getInstance()->sql($sql);
    }

    protected function delete_news($id)
    {
        $sql = "DELETE FROM news WHERE id='{$id}'";
        \app\classes\Db::getInstance()->sql($sql);
    }
}