<?php
namespace app\classes;


class CContent extends MContent
{
    public function prepareContent($id)
    {
        $response = $this->getContent($id);
        $content = mysqli_fetch_assoc($response);
        return $content;
    }
}