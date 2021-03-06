<?php
namespace app\classes;


class CLogin extends MLogin
{
    //__construct при создании объекта вызывает метод 'prepare'
    public function __construct($login,$password)
    {
        // __construct вызывает метод prepare, передавая ему переменные с логином и паролем
        $this->prepare($login,$password);
    }

    //Метод для шифрования пароля
    public function prepare($login,$password)
    {
        //Объявляем переменные для улучшенной шифровки
        $salt1 = "fish";
        $salt2 = "meat";

        //Шифруем данные переменных с паролем и логином

        $preparedPassword = md5(md5($salt1).md5($password).md5($salt2));

        //echo $preparedPassword;//Для отладки

        //Метод prepare вызывает метод checkUser и передаёт ему переменные с зашифрованными логином и паролем
        $this->checkUser($login,$preparedPassword);
    }

    //Метод, проверяющий, правильно ли введён пароль и логин, или нет
    public function checkUser($login,$password)
    {
        if($result = $this->getUser($login))//Если запрос прошел
        {
            //Записываем в $userFromDb $result как массив
            $userFromDb = mysqli_fetch_assoc($result);

            //Проверка
            if($userFromDb['password'] == $password)
            {
                $_SESSION['authorised'] = TRUE;

                //Переход на главную страницу
                header( 'Refresh: 1; url=http://localhost/my_project/admin/' );
            }
            else
            {
                echo "Нет такого пользователя";
            }
        }

    }
}