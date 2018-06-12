<?php
namespace app\classes;


class MContent
{
    protected function getContent($id)
    {
        $sql = "SELECT content, title FROM pages WHERE id={$id}";
        $result = \app\classes\Db::getInstance()->sql($sql);
        return $result;
    }
}