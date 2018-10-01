<?php

use Models\PostsModel;
use Models\AuthModel;
use Faker\Factory;

class PostsUnitTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    private $login = 'admin';
    private $password = 'admin';

    private $faker;

    protected function _before()
    {
        if (!isset($_SESSION['username'])) {
            $model = new AuthModel();
            $model->login($this->login, $this->password);
        }
    }

    protected function _after()
    {
    }

    // tests
    public function testFormAddingPostEmptyFields()
    {
        $title = '';
        $description = '';
        $text = '';

        $post = new PostsModel();
        $this->tester->assertFalse($post->store($title, $description, $text));
    }

    public function testFormAddPostWithFullMargins()
    {
        $this->faker = Factory::create();
        $title = $this->faker->text(100);
        $description = $this->faker->text(200);
        $text = $this->faker->text(400);

        $post = new PostsModel();
        $this->tester->assertTrue($post->store($title, $description, $text));
    }

    /*public function testFormEditPost()
    {
        $post = new PostsModel();
    }*/

}