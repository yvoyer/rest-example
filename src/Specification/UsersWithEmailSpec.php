<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul\Specification;

use Doctrine\Common\Collections\Criteria;

/**
 * Class UsersWithEmailSpec
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
final class UsersWithEmailSpec implements UserSpecification
{
    /**
     * @var string
     */
    private $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    /**
     * @return Criteria
     */
    public function getCriteria()
    {
        return Criteria::create()
            ->andWhere(Criteria::expr()->contains('email', $this->email));
    }
}
