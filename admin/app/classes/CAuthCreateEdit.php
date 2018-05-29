<?php
namespace app\classes;


class CAuthCreateEdit extends MAuthCreateEdit
{
    //Метод для получения с БД всех пользователей
    public function getAllAuth()
    {
        $response = $this->get_auth();
        foreach ($response as $value)
        {
            $auth[] = $value;
        }
        return $auth;
    }

    //Метод для получения пароля и логина пользователя
    public function getAuth($id)
    {
        $response = $this->get_auth($id);
        $auth = mysqli_fetch_assoc($response);
        return $auth;
    }

    //Метод для создания пользователей
    public function createAuth($post)
    {
        //Поскольку пароль ещё не зашифрован, шифруем его:
        $post['password'] = md5(md5('fish').md5($post['password']).md5('meat'));

        //Создаём запрос:
        // сюда будем прикреплять ключи,
        $keys = "INSERT INTO users (";
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
        $this->insertAuth($sql);
    }

    //Метод для удаления пользователей
    public function deleteOneAuth($auth)
    {
        $this->deleteAuth($auth);
    }

    //Метод дляь обновления пользователя
    public function updateAuth($id,$place)
    {
        if (!$_POST['lastPassword'])
        {
            //Поскольку пароль ещё не зашифрован, шифруем его:
            $place['password'] = md5(md5('fish').md5($place['password']).md5('meat'));

            //Начало запроса:
            $sql = "UPDATE users SET ";

            //Считаем эл. массива place(колонки в таблице, которые надо изменить)
            $count = count($place);
            // переменная для счёта
            $counter = 0;
            //Перебираем place как ключ и значение
            foreach ($place as $key => $val)
            {
                $counter++;
                if($counter != $count)//если это - не конечный эл. массива, то
                {
                    //формируем вот такую часть запроса:
                    $sql .= $key."='{$val}', ";
                }
                else//Иначе:
                {
                    //формируем конечную часть запроса
                    $sql .= $key."='{$val}' ";
                }

            }
            //Завершающая часть запроса
            $sql .="WHERE id = '{$id}'";
            $this->finalUpdateAuth($sql);
        }
    }
}