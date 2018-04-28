<?php
namespace app\classes;


class CNewsCreateEdit extends MNewsCreateEdit
{
    //Получение с БД всех новостей
    public function getAllNews()
    {
        $response = $this->getNews();

        foreach ($response as $value)
        {
            $news[] = $value;
        }
        return $news;
    }
}