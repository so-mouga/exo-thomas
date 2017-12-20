<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 15/12/2017
 * Time: 12:45
 */

namespace Meeting\Factory;


use Meeting\Repository\MeetingRepository;
use PDO;
use Psr\Container\ContainerInterface;


class MeetingRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : MeetingRepository
    {
        $pdo = $container->get(PDO::class);

        return new MeetingRepository($pdo);
    }

}