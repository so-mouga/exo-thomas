<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 15/12/2017
 * Time: 12:26
 */

namespace Meeting\Controller;


use Meeting\Repository\MeetingRepository;
use Meeting\Repository\UserRepository;

class MeetingController
{


    /**
     * @var MeetingRepository
     */
    private $meetingRepository;

    public function __construct(MeetingRepository $meetingRepository)
    {
        $this->meetingRepository = $meetingRepository;
    }

    public function indexAction() : string
    {

        $this->meetingRepository->


        ob_start();
        include __DIR__.'/../../../views/meeting/index.phtml';
        return ob_get_clean();
    }


}