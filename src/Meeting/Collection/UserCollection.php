<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 15/12/2017
 * Time: 11:56
 */
declare(strict_types=1);

namespace Meeting\Collection;


use Application\Entity\User;

class UserCollection
{

    /**
     * @var User[]
     */
    private $users;

    public function __construct(User ...$users)
    {

        $this->users = $users;
    }

    /**
     * @return User[]
     */
    public function getUsers(): array
    {
        return $this->users;
    }


}