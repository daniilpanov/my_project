<?php
namespace app\classes;


class Clogin extends Mlogin
{
    public function __construct($login,$password)
    {
        // __construct вызывает метод prepare, передавая ему переменные с логином и паролем
        $this->prepare($login,$password);
    }

    public function prepare($login,$password)
    {
        //Объявляем переменные для улучшенной шифровки
        $salt1 = "fish";
        $salt2 = "meat";

        //Шифруем данные переменных с паролем и логином
        $login2 = md5($salt1).md5($login).md5($salt2);
        $password2 = md5($salt1).md5($password).md5($salt2);

        //Метод prepare вызывает метод checkUser и передаёт ему переменные с зашифрованными логином и паролем
        $this->checkUser($login2,$password2);
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