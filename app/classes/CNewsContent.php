<?php
namespace app\classes;


class CNewsContent extends MNewsContent
{
    public function getNewsContent($id)
    {
        $response = $this->getContent($id);

        while ($row = mysqli_fetch_assoc($response))
        {
            $result[] = $row;
        }

        return $result[0];
    }

    public function getAllNews()
    {

    }
}