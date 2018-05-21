<?php
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2018/5/21
 * Time: 10:20
 */

namespace App\Services;


use App\Contracts\Logger;

class ProjectLog
{
    public $log;

    public function __construct(Logger $logger)
    {
        $this->log = $logger;
    }

    public function show($message)
    {
        $this->log->execute($message);

        return true;
    }
}