<?php
namespace app\classes;


class CCountMenu extends MCountMenu
{
    public function countMenu()
    {
        $response = $this->getCounter();

        $result = ceil($response/5);

        return $result;
    }
}