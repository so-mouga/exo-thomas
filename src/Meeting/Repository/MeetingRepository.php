<?php
/**
 * Created by PhpStorm.
 * User: kevinmouga
 * Date: 15/12/2017
 * Time: 12:40
 */

namespace Meeting\Repository;
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


}