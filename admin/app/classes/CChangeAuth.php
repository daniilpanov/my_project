<?php
namespace app\classes;

class CChangeAuth extends MChangeAuth
{
    public function getAuth()
    {
        $response = $this->get_auth();
        while ($row = mysqli_fetch_assoc($response))
        {
            $result[] = $row;
        }

        return $result;
    }

    public function changeAuth()
    {

    }
}