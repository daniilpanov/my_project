<?php
namespace app\classes;


class CMenuCreateEdit extends MMenuCreateEdit
{
    public function getAllMenus()
    {
        $response = $this->getMenu();

        foreach ($response as $value)
        {
            $menu[] = $value;
        }
        return $menu;
    }

    public function createMenu($post)
    {
        $keys = "INSERT INTO menu (";
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

        $this->insertMenu($sql);
    }

    public function deleteMenus($menu)
    {
        $this->deleteMenu($menu);
    }

    public function updateMenu($id,$place)
    {
        $sql = "UPDATE menu SET ";
        $count = count($place);
        $counter = 0;
        foreach ($place as $key => $val)
        {
            $counter++;
            if($counter != $count)
            {
                $sql .= $key."='{$val}', ";
            }
            else
            {
                $sql .= $key."='{$val}' ";
            }

        }
        $sql .="WHERE id = '{$id}'";
        $this->finalUpdateMenu($sql);
    }
}