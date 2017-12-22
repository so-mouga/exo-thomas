<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 15/12/2017
 * Time: 15:26
 */
declare(strict_types=1);

namespace Meeting\Collection;


use Meeting\Entity\Meeting;

class MeetingCollection
{


    /**
     * @var Meeting[]
     */
    private $meetings;

    public function __construct(Meeting ...$meetings)
    {
        $this->meetings = $meetings;
    }

    /**
     * @return Meeting[]
     */
    public function getMeetings(): array
    {
        return $this->meetings;
    }




}