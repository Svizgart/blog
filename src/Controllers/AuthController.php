<?php

namespace Controllers;

use Models\AuthModel;

class AuthController
{
    public function login($user, $password)
    {
        $model = new AuthModel();
        if ($model->login($user, $password)) {
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
        if ($model->loginOut($flag)) {
            header('Location: /index.php');
        }else{
            header('Location: /index.php');
        }
    }
}