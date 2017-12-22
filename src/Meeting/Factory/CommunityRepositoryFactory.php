<?php
/**
 * Created by PhpStorm.
 * User: mougammadaly
 * Date: 22/12/17
 * Time: 09:57
 */
declare(strict_types=1);

namespace Meeting\Factory;


use Meeting\Repository\CommunityRepository;
use Psr\Container\ContainerInterface;

class CommunityRepositoryFactory
{
    public function __invoke(ContainerInterface $container) :CommunityRepository
    {
        $pdo = $container->get(\PDO::class);

        return new CommunityRepository($pdo);
    }

}