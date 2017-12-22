<?php
/**
 * Created by PhpStorm.
 * User: mougammadaly
 * Date: 22/12/17
 * Time: 09:55
 */
declare(strict_types=1);

namespace Meeting\Repository;


use Meeting\Collection\MeetingCollection;
use Meeting\Entity\Community;
use Meeting\Entity\Meeting;

class CommunityRepository
{
    /**
     * @var \PDO
     */
    private $database;

    public function __construct(\PDO $database)
    {
        $this->database = $database;
    }

    public function findById($id) :Community
    {
        $statement = $this->database->prepare('
        SELECT id, name
        FROM communities 
        WHERE id = :communityId;');

        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->execute(['communityId' => $id]);

        if (!$community = $statement->fetch()) {
            return null;
        }

        return new Community(intval($community['id']), $community['name']);

    }

}