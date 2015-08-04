<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul;

/**
 * Class User
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
final class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    /**
     * @var string
     */
    private $status;

    /**
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return User
     */
    public static function Jane()
    {
        $user = new self(2);
        $user->setEmail('jane@example.com');
        $user->setUsername('jane');
        $user->setStatus('active');

        return $user;
    }

    /**
     * @return User
     */
    public static function John()
    {
        $user = new self(4);
        $user->setEmail('john@example.com');
        $user->setUsername('john');
        $user->setStatus('active');

        return $user;
    }

    /**
     * @return User
     */
    public static function Bill()
    {
        $user = new self(6);
        $user->setEmail('bill@some-place.com');
        $user->setUsername('bill');
        $user->setStatus('disable');

        return $user;
    }

    /**
     * @return User
     */
    public static function Bob()
    {
        $user = new self(10);
        $user->setEmail('bob@example.com');
        $user->setUsername('bob');
        $user->setStatus('active');

        return $user;
    }
}
