<?php
/**
 * Created by PhpStorm.
 * User: mougammadaly
 * Date: 22/12/17
 * Time: 13:56
 */
declare(strict_types=1);

namespace Meeting\Controller;


use Meeting\Repository\MeetingRepository;
use Meeting\Repository\UserRepository;

class UserController
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
        $user = $this->userRepository->findById($_GET['id']);
        $meetings = $this->userRepository->findAllMeetingByUser($_GET['id']);

        ob_start();
        include __DIR__.'/../../../views/meeting/user-detailles.phtml';
        return ob_get_clean();

    }
}