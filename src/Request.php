<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul;

/**
 * Class Request
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
final class Request
{
    /**
     * @var Method
     */
    private $method;

    /**
     * @var array
     */
    private $args;

    /**
     * @param Method $method
     * @param array $args
     */
    public function __construct(Method $method, array $args = array())
    {
        $this->method = $method;
        $this->args = $args;
    }

    /**
     * @return Method
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $index
     *
     * @return mixed
     */
    public function get($index)
    {
        if (isset($this->args[$index])) {
            return $this->args[$index];
        }

        return null;
    }

    public function isPost()
    {
        return $this->method instanceof Post;
    }

    public function isGet()
    {
        return $this->method instanceof Get;
    }

    public static function GetRequest(array $args = array())
    {
        return new self(new Get(), $args);
    }

    public static function PostRequest(array $args = array())
    {
        return new self(new Post(), $args);
    }
}
