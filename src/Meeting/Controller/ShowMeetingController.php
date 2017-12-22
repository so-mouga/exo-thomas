<?php
/**
 * Created by PhpStorm.
 * User: mougammadaly
 * Date: 21/12/17
 * Time: 11:53
 */

namespace Meeting\Controller;


use Meeting\Repository\MeetingRepository;
use Meeting\Repository\UserRepository;

class ShowMeetingController
{
    /**
     * @var MeetingRepository
     */
    private $meetingRepository;
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(MeetingRepository $meetingRepository, UserRepository $userRepository)
    {
        $this->meetingRepository = $meetingRepository;
        $this->userRepository = $userRepository;
    }

    public function indexAction()
    {
        $idMeeting = $_GET['id'];
        $meeting = $this->meetingRepository->findById($idMeeting);
        $attendees = $this->meetingRepository->findAllAttendeesByMeeting($meeting);
        $organisers = $this->meetingRepository->findAllOrganisersByMeeting($meeting);

        ob_start();
        include __DIR__.'/../../../views/meeting/meeting-details.phtml';
        return ob_get_clean();

    }

}