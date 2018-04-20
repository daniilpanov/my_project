<?php
namespace app\classes;


class CNews extends MNews
{
    //функция для получения новостей
    public function getNews()
    {
        $response = $this->getAllNews();

        while ($row = mysqli_fetch_assoc($response))
        {
            $result[] = $row;
        }

        return $result;
    }

    //функция для подсчёта новостей
    public function counter()
    {
        $response = mysqli_fetch_assoc($this->countNews());
//        var_export($response);
        return $response['COUNT(id)'];
    }
}