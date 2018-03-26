<?php
namespace app\classes;


class CForget extends MForget
{
    public function get($name,$email,$get)
    {
        //Объявляем переменные для улучшенной шифровки
        $salt1 = "fish";
        $salt2 = "meat";

        //Шифруем данные переменных с паролем и логином
        $preparedName = md5(md5($salt1).md5($name).md5($salt2));
        $preparedEmail = md5(md5($salt1).md5($email).md5($salt2));

        //Метод prepare вызывает метод checkUser и передаёт ему переменные с зашифрованными логином и паролем
        $this->checkEmail($preparedName,$preparedEmail,$get);
    }

    public function checkEmail($name,$email,$get)
    {
        if($result = $this->getData($get,$name))//Если запрос прошел
        {
            //Записываем в $dataFromDb $result как массив
            $dataFromDb = mysqli_fetch_assoc($result);

            //Проверка
            if ($dataFromDb['email'] == $email)
            {
                return $dataFromDb[$get];
                //(потом надо сделать так,
                //чтобы КОД для получения логина/пароля приходил на почту(Email))
            }

        }
    }
}