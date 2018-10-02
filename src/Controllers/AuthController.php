<?php

namespace Controllers;

use Models\AuthModel;

class AuthController
{
    private function formatString($str)
    {
        $str = trim($str);
        $str = stripslashes($str);
        $str = strip_tags($str);
        return $str;
    }

    public function login($user, $password)
    {
        $model = new AuthModel();
        if ($model->login($this->formatString($user), $this->formatString($password))) {
            header('Location: /index.php');
        }else{
            header('Location: /form_auth.php');
        }
    }

    /**
     * @return string
     */
    public function loginOut(string $flag)
    {
        $model = new AuthModel();
        if ($model->loginOut($this->formatString($flag))) {
            header('Location: /index.php');
        }else{
            header('Location: /index.php');
        }
    }
}