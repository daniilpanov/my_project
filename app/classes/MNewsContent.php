<?php
namespace app\classes;


class MNewsContent
{
    public function getContent($id)
    {
        $sql = "SELECT title, content FROM news WHERE id='{$id}'";
        $result = Db::getInstance()->sql($sql);

        return $result;
    }
}