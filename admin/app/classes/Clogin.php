<?php
namespace app\classes;


class Clogin extends Mlogin
{
    public function checkUser($user,$password)
    {
        $result = $this->getUser($user);
        $userFromDb = mysqli_fetch_assoc($result);
        var_export($userFromDb);
        // Если прошел запрос
        if ($result !== false)
        {
            foreach ($userFromDb as $value)
            {
                if ($password == $value)
                {
                    // Если пароль верен
                    require_once "body.php";
                    require_once "footer.php";
                }
            }
        }
    }
}