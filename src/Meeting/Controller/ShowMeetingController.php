<?php
/**
 * Created by PhpStorm.
 * User: mougammadaly
 * Date: 21/12/17
 * Time: 11:53
 */
declare(strict_types=1);

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
        $meeting = $this->meetingRepository->findById(intval($_GET['id']));
        $attendees = $this->meetingRepository->findAllAttendeesByMeeting($meeting);
        $organisers = $this->meetingRepository->findAllOrganisersByMeeting($meeting);

        ob_start();
        include __DIR__.'/../../../views/meeting/meeting-details.phtml';
        return ob_get_clean();

    }

}