<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul\Specification;

use Doctrine\Common\Collections\Criteria;

/**
 * Class UsersWithStatusSpec
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
final class UsersWithStatusSpec implements UserSpecification
{
    /**
     * @var string
     */
    private $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    /**
     * @return Criteria
     */
    public function getCriteria()
    {
        return Criteria::create()
            ->andWhere(Criteria::expr()->eq('status', $this->status));
    }
}
