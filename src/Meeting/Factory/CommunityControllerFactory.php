<?php
/**
 * Created by PhpStorm.
 * User: mougammadaly
 * Date: 22/12/17
 * Time: 10:50
 */

namespace Meeting\Factory;


use Meeting\Controller\CommunityController;
use Meeting\Repository\CommunityRepository;
use Meeting\Repository\MeetingRepository;
use Psr\Container\ContainerInterface;

class CommunityControllerFactory
{
    public function __invoke(ContainerInterface $container) :CommunityController
    {
        $communityRepository = $container->get(CommunityRepository::class);
        $meetingRepository = $container->get(MeetingRepository::class);

        return new CommunityController($communityRepository, $meetingRepository);
    }

}