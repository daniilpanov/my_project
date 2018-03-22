<?php
namespace app\classes;


class Clogin extends Mlogin
{
    public function prepare($login,$password)
    {
        //Объявляем переменные для улучшенной шифровки
        $salt1 = "fish";
        $salt2 = "meat";

        //Шифруем данные переменных с паролем и логином
        $prepare[] = md5($salt1).md5($login).md5($salt2);
        $prepare[] = md5($salt1).md5($password).md5($salt2);

        //Возвращаем массив с зашифрованными данными
        return $prepare;
    }


    public function checkUser($login,$password)
    {
        if($result = $this->getUser($login))//Если запрос прошел
        {
            //Записываем в $userFromDb $result как массив
            $userFromDb = mysqli_fetch_assoc($result);

            //Проверка
            if($userFromDb['password'] == $password)
            {
                $_SESSION['autorisated'] = TRUE;

                //Переход на главную страницу
                header( 'Refresh: 3; url=http://localhost/my_project/admin/' );
            }
            else
            {
                echo "Нет такого пользователя";
            }
        }

    }
}