<?php
namespace app\classes;


class CNews extends MNews
{
    //метод для получения новостей
    public function getNews()
    {
        $response = $this->getAllNews($this->getLimitOfNews());

        while ($row = mysqli_fetch_assoc($response))
        {
            $result[] = $row;
        }

        return $result;
    }

    public function getAllNewsFromDB()
    {
        $response = $this->getAllNews();

        while ($row = mysqli_fetch_assoc($response))
        {
            $result[] = $row;
        }

        return $result;
    }

    //метод для подсчёта новостей
    public function counter()
    {
        $response = mysqli_fetch_assoc($this->countNews());
//        var_export($response);
        return $response['COUNT(id)'];
    }
}