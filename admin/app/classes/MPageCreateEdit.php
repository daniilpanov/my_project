<?php
namespace app\classes;


class MPageCreateEdit
{
    // список страниц
    public function getPagesList()
    {
        $sql = "SELECT * FROM pages";
        $result = Db::getInstance()->sql($sql);

        return $result;
    }

    // добавить страницу
    public function insertPage($sql)
    {
        Db::getInstance()->sql($sql);
    }

    // получить список меню
    public function getMenuList()
    {
        $sql = "SELECT id, name FROM menu";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }

    // удалить страницу
    public function deletePage($page)
    {
        $sql = "DELETE FROM pages WHERE id='{$page}'";
        Db::getInstance()->sql($sql);
    }

    // обновить страницу
    public function finalUpdatePage($sql)
    {
        Db::getInstance()->sql($sql);
    }

    // возвращает список всех страниц со всей информацией по каждой
    public function menu_pos()
    {
        $sql = "SELECT * FROM pages ORDER BY `position` ASC";
        $res = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
        return $res; // возвращаем результат
    }

    // позиция в меню
    public function pos_inc($pos)
    {
        $sql = "UPDATE pages SET position = position+1 WHERE position >= {$pos}";
        echo $sql;
        \app\classes\Db::getInstance()->sql($sql);// выполняем запрос

    }
}