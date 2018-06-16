<?php
namespace app\classes;


class CConstants extends MConstants
{
    public function returnSiteName()
    {
        $response = $this->getSiteName();

        $result = mysqli_fetch_row($response);

        return $result[0];
    }
}