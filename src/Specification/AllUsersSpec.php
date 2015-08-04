<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul\Specification;

use Doctrine\Common\Collections\Criteria;

/**
 * Class AllUsersSpec
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
final class AllUsersSpec implements UserSpecification
{
    /**
     * @return Criteria
     */
    public function getCriteria()
    {
        return Criteria::create();
    }
}
