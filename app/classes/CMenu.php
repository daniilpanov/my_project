<?php
namespace app\classes;


class CMenu extends MMenu
{
    public function prepareMenu($id)
    {
        $id = 1+(5*$id-5);

        $response = $this->getMenu($id);

        foreach ($response as $value)
        {
            $endResponse[] = mysqli_fetch_assoc($value);
        }

        return $endResponse;
    }
}