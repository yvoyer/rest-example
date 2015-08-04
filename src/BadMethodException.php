<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul;

/**
 * Class BadMethodException
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
final class BadMethodException extends \Exception
{
    /**
     * @param Request $request
     *
     * @return BadMethodException
     */
    public static function createFromMethod(Request $request)
    {
        return new self("The method " . $request->getMethod() . " was not supported.");
    }
}
