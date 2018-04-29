<?php
namespace app\classes;


class CAuthCreateEdit extends MAuthCreateEdit
{
    //Метод для получения с БД всех пользователей
    public function getAllAuth()
    {
        $response = $this->getAuth();

        foreach ($response as $value)
        {
            $menu[] = $value;
        }
        return $menu;
    }

    //Метод для получения разрешенияи на редактирование пользователя
    public function CheckAuth($id, $password)
    {
        //шифрование пароля
        //Объявляем переменные для улучшенной шифровки
        $salt1 = "fish";
        $salt2 = "meat";

        //Шифруем данные переменных с паролем и логином

        $preparedPassword = md5(md5($salt1).md5($password).md5($salt2));

        //echo $preparedPassword;//Для отладки

        //Метод prepare вызывает метод checkUser и передаёт ему переменные с зашифрованными логином и паролем
        $this->checkUser($id,$preparedPassword);
    }

    //Метод, проверяющий, правильно ли введён пароль и логин, или нет
    public function checkUser($id,$password)
    {
        if($result = $this->getUser($id))//Если запрос прошел
        {
            //Записываем в $userFromDb $result как массив
            $userFromDb = mysqli_fetch_assoc($result);

            //Проверка
            if($userFromDb['password'] == $password)
            {
                $_SESSION['permission'] = TRUE;
            }
            else
            {
                echo "Неправильно введён пароль";
            }
        }
    }

    //Метод для создания пользователей
    public function createAuth($post)
    {
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
    public function deleteOneAuth($menu)
    {
        $this->deleteAuth($menu);
    }

    //Метод дляь обновления пользователя
    public function updateAuth($id,$place)
    {
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