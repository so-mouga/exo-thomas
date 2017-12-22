<?php
/**
 * Created by PhpStorm.
 * User: mougammadaly
 * Date: 22/12/17
 * Time: 13:59
 */
declare(strict_types=1);


namespace Meeting\Factory;


use Meeting\Controller\UserController;
use Meeting\Repository\MeetingRepository;
use Meeting\Repository\UserRepository;
use Psr\Container\ContainerInterface;

class UserControllerFactory
{
    public function __invoke(ContainerInterface $container) :UserController
    {
        $meetingRepository = $container->get(MeetingRepository::class);
        $userRepository = $container->get(UserRepository::class);

        return new UserController($meetingRepository, $userRepository);
    }

}