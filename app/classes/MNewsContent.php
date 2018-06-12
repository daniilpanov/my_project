<?php
namespace app\classes;


class MNewsContent
{
    protected function getContent($id = null)
    {
        $sql = "SELECT title, content FROM news WHERE id='{$id}'";
        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}