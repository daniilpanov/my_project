<?php
namespace app\classes;


class MNewsContent
{
    public function getContent($id = null)
    {
        $sql = "SELECT title, content FROM news WHERE id='{$id}'";
        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}