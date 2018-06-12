<?php
namespace app\classes;


class MPageCreateEdit
{
    // список страниц
    protected function getPagesList()
    {
        $sql = "SELECT * FROM pages ORDER BY position";
        $result = Db::getInstance()->sql($sql);

        return $result;
    }

    // добавить страницу
    protected function insertPage($sql)
    {
        Db::getInstance()->sql($sql);
    }

    // получить список меню
    protected function getMenuList()
    {
        $sql = "SELECT id, name FROM menu";
        $result = Db::getInstance()->sql($sql);
        return $result;
    }

    // удалить страницу
    protected function deletePage($page)
    {
        $sql = "DELETE FROM pages WHERE id='{$page}'";
        Db::getInstance()->sql($sql);
    }

    // обновить страницу
    protected function finalUpdatePage($sql)
    {
        Db::getInstance()->sql($sql);
    }

    // возвращает список всех страниц со всей информацией по каждой
    protected function menu_pos()
    {
        $sql = "SELECT * FROM pages ORDER BY `position` ASC";
        $res = \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
        return $res; // возвращаем результат
    }

    // позиция в меню
    protected function pos_inc($pos)
    {
        $sql = "UPDATE pages SET position = position+1 WHERE position >= {$pos}";
        \app\classes\Db::getInstance()->sql($sql);// выполняем запрос
    }
}