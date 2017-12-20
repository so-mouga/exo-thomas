<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 15/12/2017
 * Time: 11:36
 */
declare(strict_types=1);

namespace Meeting\Entity;


class Meeting
{

    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;
    /**
     * @var string
     */
    private $description;
    /**
     * @var \DateTime
     */
    private $dateStart;
    /**
     * @var \DateTimeImmutable
     */
    private $dateEnd;
    /**
     * @var Community
     */
    private $community;

    public function __construct(int $id, string $title, string $description, \DateTimeImmutable $dateStart, \DateTimeImmutable $dateEnd, Community $community)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
        $this->community = $community;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return \DateTime
     */
    public function getDateStart(): \DateTime
    {
        return $this->dateStart;
    }

    /**
     * @return \DateTimeImmutable
     */
    public function getDateEnd(): \DateTimeImmutable
    {
        return $this->dateEnd;
    }

    /**
     * @return Community
     */
    public function getCommunity(): Community
    {
        return $this->community;
    }

}