<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 15/12/2017
 * Time: 12:01
 */

namespace Meeting\Entity;


use Meeting\Collection\UserCollection;

class Organiser
{
    /**
     * @var Meeting
     */
    private $meeting;
    /**
     * @var UserCollection
     */
    private $userCollection;

    public function __construct(Meeting $meeting, UserCollection $userCollection)
    {
        $this->meeting = $meeting;
        $this->userCollection = $userCollection;
    }

    /**
     * @return Meeting
     */
    public function getMeeting(): Meeting
    {
        return $this->meeting;
    }

    /**
     * @return UserCollection
     */
    public function getUserCollection(): UserCollection
    {
        return $this->userCollection;
    }



}