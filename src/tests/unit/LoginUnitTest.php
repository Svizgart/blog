<?php

use Controllers\AuthController;

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

        $model = new AuthController();

        //$model->login($this->loginFaker, $this->passwordFaker);
        expect($this->tester->assertEqual);
    }

    public function testLoginWithoutParameters()
    {

    }

    public function testLoginCorrectParameters()
    {

    }
}