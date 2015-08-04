<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul\Specification;

use Doctrine\Common\Collections\Criteria;

/**
 * Class CompositeSpec
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
final class CompositeSpec implements UserSpecification
{
    /**
     * @var UserSpecification[]
     */
    private $specs = array();

    /**
     * @param UserSpecification $specification
     */
    public function addSpec(UserSpecification $specification)
    {
        $this->specs[] = $specification;
    }

    /**
     * @return Criteria
     */
    public function getCriteria()
    {
        $criteria = Criteria::create();
        foreach ($this->specs as $spec) {
            $criteria->andWhere($spec->getCriteria()->getWhereExpression());
        }

        return $criteria;
    }
}
