<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul;

use Star\Example\RestFul\Specification\AllUsersSpec;
use Star\Example\RestFul\Specification\UserSpecification;

/**
 * Class MyCleanService
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
final class MyCleanService
{
    /**
     * @var CleanUserRepository
     */
    private $users;

    /**
     * @param PoorRepository $users
     */
    public function __construct(PoorRepository $users)
    {
        $this->users = $users;
    }

    /**
     * @param Specification\UserSpecification $specification
     * @return User[]
     */
    public function getAll(UserSpecification $specification)
    {
        return $this->users->filter($specification);
    }
}
