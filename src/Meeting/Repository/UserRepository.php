<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 15/12/2017
 * Time: 12:12
 */

namespace Meeting\Repository;
use Meeting\Collection\UserCollection;
use Meeting\Entity\Attendee;
use Meeting\Entity\Meeting;
use Meeting\Entity\Organiser;
use Meeting\Entity\User;
use PDO;


class UserRepository
{
    /**
     * @var PDO
     */
    private $database;

    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function findAllAttendeesByMeeting(Meeting $meeting) :Attendee
    {
        $statement = $this->database->prepare(
            'SELECT u.id as id_user , u.name 
                        FROM  users u 
                        JOIN attendees a
                        ON a.user_id = u.id
                        JOIN meetings m
                        on a.meeting_id = m.id
                        WHERE m.id = :id');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute([':id' => $meeting->getId()]);

        if (!$users = $statement->fetchAll()) {
            return null;
        }

        $attendees = [];
        foreach ($users as $user){
            $attendees[] = new User($user['id_user'],$user['name']);
        }

        return new Attendee($meeting, new UserCollection(... $attendees));
    }

    public function findAllOrganisersByMeeting($meeting) :Organiser
    {
        $statement = $this->database->prepare(
            'SELECT u.id as id_user , u.name 
                        FROM  users u 
                        JOIN organisers a
                        ON a.user_id = u.id
                        JOIN meetings m
                        on a.meeting_id = m.id
                        WHERE m.id = :id');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute([':id' => $meeting->getId()]);

        if (!$users = $statement->fetchAll()) {
            return null;
        }

        $attendees = [];
        foreach ($users as $user){
            $attendees[] = new User($user['id_user'],$user['name']);
        }

        return new Organiser($meeting, new UserCollection(... $attendees));
    }

    public function findById($id) :User
    {

        $statement = $this->database->prepare(
            'SELECT id as id_user, name 
                        FROM  users 
                        WHERE id = :id');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute([':id' => $id]);

        if (!$user = $statement->fetch()) {
            return null;
        }

        return new User(intval($user['id_user']), $user['name']);

    }

    public function findAllMeetingByUser($id) :array
    {
        $statement = $this->database->prepare(
        ' SELECT u.name as user_name, m.id as meeting_id, m.title as meeting_title, description as meeting_description, m.date_start as meeting_date_start, m.date_end as meeting_date_end, c.name as community_id, 1 as is_organiser
                    FROM users u
                    inner join organisers o on u.id = o.user_id
                    inner join meetings m on o.meeting_id = m.id
                    inner join communities c on c.id = m.community_id
                    WHERE u.id = :id
                    
                    UNION
                    
                    SELECT u.name as user_name, m.id as meeting_id, m.title as meeting_title, m.description as meeting_description, m.date_start as meeting_date_start, m.date_end as meeting_date_end, c.name as community_id, 0 as is_organiser
                    FROM users u
                    inner join attendees a on u.id = a.user_id
                    inner join meetings m on a.meeting_id = m.id
                    inner join communities c on c.id = m.community_id
                    WHERE u.id = :id');

        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute([':id' => $id]);

        if (!$meetings = $statement->fetchAll()) {
            return null;
        }

        return $meetings;
    }

}