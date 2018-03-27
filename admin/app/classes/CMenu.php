<?php
namespace admin\app\classes;


class CMenu extends MMenu
{
    public function prepareMenu()
    {
        $response = $this->getMenu();

        foreach ($response as $value)
        {
            $menu[] = $value;
        }
        return $menu;
    }
}