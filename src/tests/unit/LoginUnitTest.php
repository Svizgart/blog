<?php

use Models\AuthModel;

class LoginUnitTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private $loginTrue = 'admin';
    private $passwordTrue = 'admin';

    private $loginFaker = 'qwerty';
    private $passwordFaker = 'qwerty';

    protected function _before()
    {

    }

    protected function _after()
    {
        if (isset($_SESSION['username'])) {
            unset($_SESSION['username']);
        }
    }

    // tests
    public function testLoginWithoutCorrectParameters()
    {
        $model = new AuthModel();

        $this->assertFalse($model->login($this->loginFaker, $this->passwordFaker));
    }

    public function testLoginFakerLogin()
    {
        $model = new AuthModel();

        $this->assertFalse($model->login($this->loginFaker, $this->passwordTrue));
    }

    public function testLoginFakerPassword(): string
    {
        $model = new AuthModel();

        $this->assertFalse($model->login($this->loginTrue, $this->passwordFaker));
    }

    public function testLoginWithoutParameters()
    {
        $login = '';
        $password = '';

        $model = new AuthModel();
        $this->assertFalse($model->login($login, $password));
    }

    public function testLoginCorrectParameters()
    {
        $model = new AuthModel();
        $this->assertTrue($model->login($this->loginTrue, $this->passwordTrue));
    }
}