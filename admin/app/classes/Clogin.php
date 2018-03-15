<?php
namespace app\classes;


class Clogin extends Mlogin
{
    public function checkUser($user,$password)
    {
        if($result = $this->getUser($user))
        {
            $userFromDb = mysqli_fetch_assoc($result);
            if($userFromDb['password'] == $password)
            {
                $_SESSION['autorisated'] = TRUE;
            }
        }
        else
        {
            echo "Нет такого пользователь";
        }



    }
}