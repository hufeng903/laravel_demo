<?php
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2018/5/21
 * Time: 10:14
 */

namespace App\Services;


use App\Contracts\Logger;

class UserLogger implements Logger
{

    public function execute($message)
    {
        info('this log is from user :'.$message);
        return true;
    }

}