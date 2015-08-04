<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul;

/**
 * Class PoorRepository
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
interface PoorRepository
{
    /**
     * @return User[]
     * @deprecated
     */
    public function findAll();

    /**
     * @param $status
     *
     * @return User[]
     * @deprecated
     */
    public function findAllByStatus($status);

    /**
     * @param $name
     *
     * @return User[]
     * @deprecated
     */
    public function findAllByName($name);

    /**
     * @param $email
     *
     * @return User[]
     * @deprecated
     */
    public function findAllByEmail($email);
}
