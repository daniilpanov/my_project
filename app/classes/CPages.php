<?php
namespace app\classes;


class CPages extends MPages
{
    public function get_pages($parent_id)
    {
        $response = $this->getPages($parent_id);

        while ($row = mysqli_fetch_assoc($response))
        {
            $result[] = $row;
        }

        return $result;
    }
}