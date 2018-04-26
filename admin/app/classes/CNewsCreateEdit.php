<?php
namespace app\classes;


class CNewsCreateEdit extends MNewsCreateEdit
{
    public function getAllNews()
    {
        $response = $this->getNews();

        foreach ($response as $value)
        {
            $news[] = $value;
        }
        return $news;
    }

    public function createNews($post)
    {
        $keys = "INSERT INTO news (";
        $values ="VALUES(";
        $count = count($post);
        $counter = 0;
        foreach ($post as $key => $val)
        {
            $counter++;
            if($counter != $count)
            {
                $keys .= $key.', ';
                $values .= "'{$val}', ";
            }
            else
            {
                $keys .= $key.') ';
                $values .= "'{$val}')";
            }

        }

        $sql = $keys.$values;

        // отправляем информацию в базу

        $this->insertNews($sql);
    }

    public function deleteSelectedNews($news)
    {
        $this->deleteNews($news);
    }

    public function updateNews($id,$place)
    {
        $sql = "UPDATE news SET ";
        $count = count($place);
        $counter = 0;
        foreach ($place as $key => $val)
        {
            $counter++;
            if($counter != $count)
            {
                $sql .= $key."='{$val}', ";
            }
            else
            {
                $sql .= $key."='{$val}' ";
            }

        }
        $sql .="WHERE id = '{$id}'";
        $this->finalUpdateNews($sql);
    }
}