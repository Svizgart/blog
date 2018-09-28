<?php

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
    private $flagFaker= 'exit';

    protected function _before()
    {

    }

    protected function _after()
    {
    }

    // tests
    public function testLogout()
    {

    }

    public function testLogoutFakerParameter()
    {

    }

}