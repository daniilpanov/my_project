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

    // создаём страницу
    function createPage($post)
    {
        $aux_sql=null;
        $count = count($post);
        $counter = 0;
        foreach ($post as $key => $val)
        {
            $counter++ ;
            if($counter != $count)
            {
                $aux_sql .= $key.'=\''.$val.'\',';
            }
            else
            {
                $aux_sql .= $key.'=\''.$val.'\'';
            }

        }
        echo $aux_sql;
        // отправляем информацию в базу
        $this->insertPage($aux_sql);
    }
}