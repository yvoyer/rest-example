<?php
/**
 * This file is part of the RESTFull project.
 *
 * (c) Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */

namespace Star\Example\RestFul;

use Star\Example\RestFul\Specification\AllUsersSpec;
use Star\Example\RestFul\Specification\CompositeSpec;
use Star\Example\RestFul\Specification\UsersWithEmailSpec;
use Star\Example\RestFul\Specification\UsersWithNameSpec;
use Star\Example\RestFul\Specification\UsersWithStatusSpec;

/**
 * Class UserController
 *
 * @author Yannick Voyer <star.yvoyer@gmail.com> (http://github.com/yvoyer)
 */
final class UserController
{
    /**
     * @var PoorRepository
     */
    private $repository;

    /**
     * @var MyCleanService
     */
    private $cleanService;

    public function __construct()
    {
        $this->repository = new InMemoryUsers(array(
            User::Jane(),
            User::John(),
            User::Bill(),
            User::Bob(),
        ));

        $this->cleanService = new MyCleanService($this->repository);
    }

    /**
     * @param Request $request
     *
     * @throws BadMethodException
     * @return User[] todo would return json response
     */
    public function listAction(Request $request)
    {
        if (! $request->isGet()) {
            throw BadMethodException::createFromMethod($request);
        }

        $status = $request->get('status');
        if ($status) {
            return $this->repository->findAllByStatus($status);
        }

        $name = $request->get('name');
        if ($name) {
            return $this->repository->findAllByName($name);
        }

        $email = $request->get('email');
        if ($email) {
            return $this->repository->findAllByEmail($email);
        }

        return $this->repository->findAll();
    }

    /**
     * @param Request $request
     *
     * @throws BadMethodException
     * @return User[] todo would return json response
     */
    public function cleanList(Request $request)
    {
        if (! $request->isGet()) {
            throw BadMethodException::createFromMethod($request);
        }

        $specs = new CompositeSpec();

        if ($request->get('status')) {
            $specs->addSpec(new UsersWithStatusSpec($request->get('status')));
        }

        $name = $request->get('name');
        if ($name) {
            $specs->addSpec(new UsersWithNameSpec($name));
        }

        $email = $request->get('email');
        if ($email) {
            $specs->addSpec(new UsersWithEmailSpec($email));
        }

        return $this->cleanService->getAll($specs);
    }
}
