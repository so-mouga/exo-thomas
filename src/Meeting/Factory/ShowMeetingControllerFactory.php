<?php
/**
 * Created by PhpStorm.
 * User: mougammadaly
 * Date: 21/12/17
 * Time: 11:55
 */
declare(strict_types=1);


namespace Meeting\Factory;


use Meeting\Controller\ShowMeetingController;
use Meeting\Repository\MeetingRepository;
use Meeting\Repository\UserRepository;
use Psr\Container\ContainerInterface;


class ShowMeetingControllerFactory
{
    public function __invoke(ContainerInterface $container) : ShowMeetingController
    {
        $meetingRepository = $container->get(MeetingRepository::class);
        $userRepository = $container->get(UserRepository::class);

        return new ShowMeetingController($meetingRepository, $userRepository);
    }

}