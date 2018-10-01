<?php

use Models\AuthModel;

use Controllers\AuthController;
class LogoutUnitTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $model;

    private $loginTrue = 'admin';
    private $passwordTrue = 'admin';

    private $flagTrue = 'exit';
    private $flagFaker= 'Exit';

    protected function _before()
    {
        if (!isset($_SESSION['username'])) {
            $model = new AuthModel();
            $model->login($this->loginTrue, $this->passwordTrue);
        }
    }

    protected function _after()
    {
    }

    // tests
    public function testLogout()
    {
        $model = new AuthModel();
        $this->assertTrue($model->loginOut($this->flagTrue));
    }

    public function testLogoutFakerParameter()
    {
        $model = new AuthModel();
        $this->assertFalse($model->loginOut($this->flagFaker));
    }

}