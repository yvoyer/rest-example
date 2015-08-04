<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul;

/**
 * Class RestFullTest
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
final class RestFullTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var UserController
     */
    private $userController;

    public function setUp()
    {
        $this->userController = new UserController();
    }

    public function test_it_should_return_all_the_users()
    {
        $this->assertCount(4, $this->userController->listAction(Request::GetRequest()));
        $this->assertCount(4, $this->userController->cleanList(Request::GetRequest()));
    }

    public function test_it_should_return_all_the_active_users()
    {
        $this->assertCount(3, $this->userController->listAction(Request::GetRequest(array('status' => 'active'))));
        $this->assertCount(3, $this->userController->cleanList(Request::GetRequest(array('status' => 'active'))));
    }

    public function test_it_should_return_all_the_users_with_name()
    {
        $this->assertCount(1, $this->userController->listAction(Request::GetRequest(array('name' => 'john'))));
        $this->assertCount(1, $this->userController->cleanList(Request::GetRequest(array('name' => 'john'))));
    }

    public function test_it_should_return_all_the_users_with_email_like()
    {
        $this->assertCount(3, $this->userController->listAction(Request::GetRequest(array('email' => 'example.com'))));
        $this->assertCount(3, $this->userController->cleanList(Request::GetRequest(array('email' => 'example.com'))));
    }

    public function test_it_should_return_all_the_users_with_email_and_status_poor()
    {
        $this->assertCount(
            0,
            $this->userController->listAction(
                Request::GetRequest(
                    array(
                        // Bob is active
                        'name' => 'bob',
                        'status' => 'disable',
                    )
                )
            )
        );
    }

    public function test_it_should_return_all_the_users_with_email_and_status_better()
    {
        $this->assertCount(
            0,
            $this->userController->cleanList(
                Request::GetRequest(
                    array(
                        // Bob is active
                        'name' => 'bob',
                        'status' => 'disable',
                    )
                )
            )
        );
    }
}
