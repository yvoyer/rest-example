<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul;

use Star\Example\RestFul\Specification\UserSpecification;

/**
 * Class CleanUserRepository
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
interface CleanUserRepository
{
    /**
     * @param UserSpecification $specification
     *
     * @return User[]
     */
    public function filter(UserSpecification $specification);
}
