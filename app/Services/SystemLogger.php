<?php
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2018/5/21
 * Time: 10:15
 */

namespace App\Services;


use App\Contracts\Logger;

class SystemLogger implements Logger
{
    public function execute($message)
    {
        info('this log is from system :'.$message);

        return true;
    }
}