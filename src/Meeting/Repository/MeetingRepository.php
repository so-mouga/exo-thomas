<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 15/12/2017
 * Time: 12:40
 */

namespace Meeting\Repository;
use Application\Entity\Lecturer;
use Meeting\Collection\MeetingCollection;
use Meeting\Collection\UserCollection;
use Meeting\Entity\Attendee;
use Meeting\Entity\Community;
use Meeting\Entity\Meeting;
use Meeting\Entity\Organiser;
use Meeting\Entity\User;
use PDO;


class MeetingRepository
{
    /**
     * @var PDO
     */
    private $database;

    public function __construct(PDO $database)
    {
        $this->database = $database;
    }

    public function fetchAll() :MeetingCollection
    {
        $statement = $this->database->query(
            'SELECT m.id as id_meeting , m.title, m.description, m.date_start, m.date_end, c.id as id_community, c.name   
                        FROM  meetings m 
                        left JOIN communities c
                        ON m.community_id = c.id
                        ORDER BY  m.id');
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $datas = $statement->fetchAll();
        $meetings = [];
        foreach ($datas as $meeting){
            $meetings[] = new Meeting($meeting['id_meeting'],$meeting['title'],$meeting['description'],new \DateTimeImmutable($meeting['date_start']) ,new \DateTimeImmutable($meeting['date_end']),new Community($meeting['id_community'], $meeting['name']));
        }
        return new MeetingCollection(... $meetings);
    }

    public function findById(int $idMeeting) :Meeting
    {
        $statement = $this->database->prepare(
            'SELECT m.id as id_meeting , m.title, m.description, m.date_start, m.date_end, c.id as id_community, c.name   
                        FROM  meetings m 
                        left JOIN communities c
                        ON m.community_id = c.id
                        WHERE m.id = :id');
        $statement->setFetchMode(PDO::FETCH_ASSOC);
        $statement->execute([':id' => $idMeeting]);

        if (!$meeting = $statement->fetch()) {
            return null;
        }

        return new Meeting($meeting['id_meeting'],$meeting['title'],$meeting['description'], new \DateTimeImmutable($meeting['date_start']) ,new \DateTimeImmutable($meeting['date_end']),new Community($meeting['id_community'], $meeting['name']));
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

    public function findAllOrganisersByMeeting($meeting)
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


    public function findAllMeetingByCommunity($id)
    {
        $statement = $this->database->prepare('
                        SELECT m.id as id_meeting , m.title, m.description, m.date_start, m.date_end, c.id as id_community, c.name   
                        FROM  meetings m 
                        left JOIN communities c
                        ON m.community_id = c.id
                        WHERE community_id = :communityId;');

        $statement->setFetchMode(\PDO::FETCH_ASSOC);
        $statement->execute(['communityId' => $id]);

        if (!$datas = $statement->fetchAll()) {
            return null;
        }

        $meetings = [];
        foreach ($datas as $meeting){
            $meetings[] = new Meeting($meeting['id_meeting'],$meeting['title'],$meeting['description'],new \DateTimeImmutable($meeting['date_start']) ,new \DateTimeImmutable($meeting['date_end']),new Community($meeting['id_community'], $meeting['name']));
        }
        return new MeetingCollection(... $meetings);

    }

}