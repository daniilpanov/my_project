<?php
namespace app\classes;


class CPageCreateEdit extends MPageCreateEdit
{
    public function getAllPages()
    {
        $response = $this->getPagesList();
        while($row = mysqli_fetch_assoc($response))
        {
            $pagesList[] = $row;
        }


        return $pagesList;
    }

    // создаём страницу
    function createPage($post)
    {
        $keys = "INSERT INTO pages (";
        $values ="VALUES(";
        $count = count($post);
        $counter = 0;
        foreach ($post as $key => $val)
        {
            $counter++;
            if($counter != $count)
            {
                $keys .= $key.', ';
                $values .= "'{$val}', ";
            }
            else
            {
                $keys .= $key.') ';
                $values .= "'{$val}')";
            }

        }

        $sql = $keys.$values;

        // отправляем информацию в базу

        $this->insertPage($sql);
    }

    public function getAllMenus()
    {
        $response = $this->getMenuList();

        while ($row = mysqli_fetch_assoc($response))
        {
            $menus[] = $row;
        }

        return $menus;
    }

    public function deletePages($page)
    {
        $this->deletePage($page);
    }
}