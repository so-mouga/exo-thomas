<?php
/**
 * Created by PhpStorm.
 * User: mougammadaly
 * Date: 21/12/17
 * Time: 12:12
 */
declare(strict_types=1);

namespace Meeting\Factory;

use Meeting\Repository\UserRepository;
use PDO;
use Psr\Container\ContainerInterface;

class UserRepositoryFactory
{
    public function __invoke(ContainerInterface $container) : UserRepository
    {
        $pdo = $container->get(PDO::class);

        return new UserRepository($pdo);
    }
}