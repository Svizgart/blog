<?php

use Models\AuthModel;
use Faker\Factory;

class LoginUnitTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    private $loginTrue = 'admin';
    private $passwordTrue = 'admin';

    private $faker;

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
        $this->faker = Factory::create();

        $this->assertFalse($model->login($this->faker->userName(), $this->faker->password()));
    }

    public function testLoginFakerLogin()
    {
        $model = new AuthModel();
        $this->faker = Factory::create();

        $this->assertFalse($model->login($this->faker->userName(), $this->passwordTrue));
    }

    public function testLoginFakerPassword()
    {
        $model = new AuthModel();
        $this->faker = Factory::create();

        $this->assertFalse($model->login($this->loginTrue, $this->faker->password()));
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