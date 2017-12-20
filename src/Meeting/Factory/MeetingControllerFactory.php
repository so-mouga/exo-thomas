<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 15/12/2017
 * Time: 12:38
 */
declare(strict_types=1);

namespace Meeting\Factory;

use Meeting\Controller\MeetingController;
use Meeting\Repository\MeetingRepository;
use Psr\Container\ContainerInterface;

class MeetingControllerFactory
{
    public function __invoke(ContainerInterface $container) : MeetingController
    {
        $meetingRepository = $container->get(MeetingRepository::class);

        return new MeetingController($meetingRepository);
    }
}