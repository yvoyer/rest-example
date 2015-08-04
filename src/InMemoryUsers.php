<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul;

use Doctrine\Common\Collections\ArrayCollection;
use Star\Example\RestFul\Specification\UserSpecification;

/**
 * Class InMemoryUsers
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
final class InMemoryUsers implements PoorRepository, CleanUserRepository
{
    /**
     * @var User[]|ArrayCollection
     */
    private $users;

    /**
     * @param User[] $users
     */
    public function __construct(array $users)
    {
        $this->users = new ArrayCollection();
        foreach ($users as $user) {
            $this->save($user);
        }
    }

    /**
     * @param User $user
     */
    public function save(User $user)
    {
        $this->users[$user->getId()] = $user;
    }

    /**
     * @return User[]
     */
    public function findAll()
    {
        return $this->users->toArray();
    }

    /**
     * @param $status
     *
     * @return User[]
     */
    public function findAllByStatus($status)
    {
        $users = array();
        foreach ($this->users as $user) {
            if ($user->getStatus() == $status) {
                $users[] = $user;
            }
        }

        return $users;
    }

    /**
     * @param UserSpecification $specification
     *
     * @return User[]
     */
    public function filter(UserSpecification $specification)
    {
        return $this->users->matching($specification->getCriteria());
    }

    /**
     * @param $name
     *
     * @return User[]
     * @deprecated
     */
    public function findAllByName($name)
    {
        $users = array();
        foreach ($this->users as $user) {
            if ($user->getUsername() == $name) {
                $users[] = $user;
            }
        }

        return $users;
    }

    /**
     * @param $email
     *
     * @return User[]
     * @deprecated
     */
    public function findAllByEmail($email)
    {
        $users = array();
        foreach ($this->users as $user) {
            if (false !== strpos($user->getEmail(), $email)) {
                $users[] = $user;
            }
        }

        return $users;
    }
}
