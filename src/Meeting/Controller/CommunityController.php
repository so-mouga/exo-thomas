<?php
/**
 * Created by PhpStorm.
 * User: mougammadaly
 * Date: 22/12/17
 * Time: 10:04
 */
declare(strict_types=1);

namespace Meeting\Controller;


use Meeting\Repository\CommunityRepository;
use Meeting\Repository\MeetingRepository;

class CommunityController
{
    /**
     * @var CommunityRepository
     */
    private $communityRepository;
    /**
     * @var MeetingRepository
     */
    private $meetingRepository;

    public function __construct(CommunityRepository $communityRepository,MeetingRepository $meetingRepository)
    {
        $this->communityRepository = $communityRepository;
        $this->meetingRepository = $meetingRepository;
    }

    public function indexAction()
    {
        $meetings = $this->meetingRepository->findAllMeetingByCommunity($_GET['id']);
        $community = $this->communityRepository->findById($_GET['id']);

        ob_start();
        include __DIR__.'/../../../views/meeting/community-details.phtml';
        return ob_get_clean();
    }

}