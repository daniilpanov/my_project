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

    public function getOneNews($id)
    {
        $result = mysqli_fetch_assoc($this->getNews($id));
        return $result;
    }

    public function getImg($param = null)
    {
        $newFilename = 'C:/xampp/htdocs/my_project/img/'.$_FILES['image']['name'];
        $forReturn = 'img/'.$_FILES['image']['name'];
        $uploadInfo = $_FILES['image'];

        if (is_null($param))
        {
            if (!move_uploaded_file($uploadInfo['tmp_name'], $newFilename))
            {
                die('Не удалось осуществить сохранение файла');
            }
            else
            {
                //Перемещаем файл из временной папки в указанную

                return $forReturn;
            }
        }
        elseif ($param == 'edit')
        {
            if(!move_uploaded_file($uploadInfo['tmp_name'], $newFilename))
            {
                return false;
            }
            else
            {
                //Перемещаем файл из временной папки в указанную

                return $forReturn;
            }
        }
    }

    public function createNews($post)
    {
        //For a news image
        if (!empty($_FILES['image']['tmp_name']))
        {
            $post['image'] = $this->getImg();
        }

        //Создаём запрос:
        // сюда будем прикреплять ключи,
        $keys = "INSERT INTO news (";
        // а сюда - значения
        $values ="VALUES(";

        //Считаем post
        $count = count($post);
        // переменная для счёта
        $counter = 0;
        //Перебираем post как ключ и значение
        foreach ($post as $key => $val)
        {
            $counter++;
            if($counter != $count)//если это - не конечный эл. массива, то
            {
                //формируем две вот такие части запроса:
                $keys .= $key.', ';
                $values .= "'{$val}', ";
            }
            else//Иначе:
            {
                //формируем конечные части запроса
                $keys .= $key.') ';
                $values .= "'{$val}')";
            }

        }
        // и соединяем их
        $sql = $keys.$values;


        // отправляем информацию в базу
        $this->insertNews($sql);
    }

    public function updateNews($id, $post)
    {
        //For a news image
        if (isset($_FILES['image']['tmp_name']))
        {
            $post['image'] = $this->getImg('edit');
            if ($post['image'] === false)
            {
                unset($post['image']);
            }
        }

        //Начало запроса:
        $sql = "UPDATE news SET ";
        //Считаем эл. массива place(колонки в таблице, которые надо изменить)
        $count = count($post);
        // переменная для счёта
        $counter = 0;
        //Перебираем place как ключ и значение
        foreach ($post as $key => $val)
        {
            $counter++;
            if($counter != $count)//если это - не конечный эл. массива, то
            {
                //формируем две вот такую часть запроса:
                $val = str_replace("'", "&prime;", $val);
                $val = str_replace('"', '&Prime;', $val);
                $sql .= $key."='{$val}', ";
            }
            else//Иначе:
            {
                //формируем конечную часть запроса
                $val = str_replace("'", "&prime;", $val);
                $val = str_replace('"', '&Prime;', $val);
                $sql .= $key."='{$val}' ";
            }
        }
        // и соединяем их
        $sql .=" WHERE id = '{$id}'";

//        echo $sql;

        // отправляем информацию в базу
        $this->finalUpdateNews($sql);
    }

    public function deleteNews($id)
    {
        $this->delete_news($id);
    }
}