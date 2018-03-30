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
}