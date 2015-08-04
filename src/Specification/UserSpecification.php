<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul\Specification;

use Doctrine\Common\Collections\Criteria;

/**
 * Class UserSpecification
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
interface UserSpecification
{
    /**
     * @return Criteria
     */
    public function getCriteria();
}
