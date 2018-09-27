<?php

namespace Controllers;


class AutController
{
    private $login = 'admin';
    private $password  = 'admin';

    public function login($user, $password)
    {
        $password_hesh = password_hash($this->password, PASSWORD_DEFAULT);

        if (trim($user) === $this->login && password_verify(trim($password), $password_hesh)) {
            $_SESSION['username'] = $user;

            header('Location: /index.php');
        }else{
            //echo "Не верные данные для входа!";
            header('Location: /form_aut.php');
        }
    }

    /**
     * @return string
     */
    public function loginOut($flag): string
    {
        if ($flag === 'exit') {
            unset($_SESSION['username']);
            header('Location: /index.php');
        }
    }
}