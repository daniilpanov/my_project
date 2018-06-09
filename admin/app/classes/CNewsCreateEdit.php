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

    public function getImg()
    {
        getFiles::getInstance()->getFiles('C:/xampp/htdocs/my_project/img/',  30000);

        echo 'img/'.$_FILES['file']['name'];
    }

    public function createNews($post)
    {
        $post['image_width'] = (int)$post['image_width'];
        if ($post['image_width']>300)
        {
            echo "<h4>Введите в поле для размера картинки число, которое меньше или равно 300!</h4>";
        }
        else
        {
            //For a news image
            if (!empty($_FILES['file']['tmp_name']))
            {
                echo $post['image'] = $this->getImg();
            }

            //Создаём запрос:
            // сюда будем прикреплять ключи,
            $keys = "INSERT INTO news (";
            // а сюда - значения
            $values = "VALUES(";

            //Считаем post
            $count = count($post);
            // переменная для счёта
            $counter = 0;
            //Перебираем post как ключ и значение
            foreach ($post as $key => $val) {
                $counter++;
                if ($counter != $count)//если это - не конечный эл. массива, то
                {
                    //формируем две вот такие части запроса:
                    $keys .= $key . ', ';
                    $values .= "'{$val}', ";
                } else//Иначе:
                {
                    //формируем конечные части запроса
                    $keys .= $key . ') ';
                    $values .= "'{$val}')";
                }

            }
            // и соединяем их
            $sql = $keys . $values;


            // отправляем информацию в базу
            $this->insertNews($sql);
        }
    }

    public function updateNews($id, $post)
    {
        $post['image_width'] = (int)$post['image_width'];
        if ($post['image_width']>300)
        {
            echo "<h4>Введите в поле для размера картинки число, которое меньше или равно 300!</h4>";
        }
        else
        {
            //For a news image
            if (isset($_FILES['file']['tmp_name']))
            {
                echo $post['image'] = $this->getImg();
                echo "OK";
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
            //header('Location: ?page=newsList');
        }
    }

    public function deleteNews($id)
    {
        $this->delete_news($id);
    }
}