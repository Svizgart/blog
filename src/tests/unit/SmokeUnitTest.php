<?php

use Controllers\AutController;

class SmokeUnitTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private $userInfo;
    private $model;

    private $loginTrue = 'admin';
    private $passwordTrue = 'admin';

    private $loginFalse = 'qwerty';
    private $passwordFalse = 'qwerty';

    protected function _before()
    {

    }

    protected function _after()
    {

    }

    // tests
    public function testLoginWithoutCorrectParameters()
    {
        $this->model = new AutController();

        expect_not($this->model->login($this->loginFalse, $this->passwordFalse));

    }

    public function testLoginWithoutParameters()
    {
        $login = '';
        $password = '';
        $this->model = new AutController();

        expect_not($this->model->login($login, $password));
    }

    public function testLoginCorrectParameters()
    {
        $this->model = new AutController();

        expect($this->model->login($this->loginTrue, $this->passwordTrue));
    }
}