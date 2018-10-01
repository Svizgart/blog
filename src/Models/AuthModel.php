<?php

namespace Models;

class AuthModel
{
    private $login = 'admin';
    private $password  = 'admin';

    public function login($user, $password)
    {
        $password_hash = password_hash($this->password, PASSWORD_DEFAULT);
        if (trim($user) === $this->login && password_verify(trim($password), $password_hash) === true) {
            $_SESSION['username'] = $user;

            return true;
        }else{

            return false;
        }
    }

    public function loginOut($flag)
    {
        if ($flag === 'exit') {
            unset($_SESSION['username']);

            return true;
        }else{

            return false;
        }
    }
}
