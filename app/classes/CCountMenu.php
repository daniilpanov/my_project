<?php
namespace app\classes;


class CCountMenu extends MCountMenu
{
    public function countMenu()
    {
        $response = $this->getCounter();
        while ($row = mysqli_fetch_assoc($response))
        {
            $result[] = $row;
        }
        $result = count($result);
        $result = ceil($result/5);
        $result = explode(.0,$result);

        return $result[0];
    }
}