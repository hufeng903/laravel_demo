<?php
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2018/5/21
 * Time: 10:13
 */

namespace App\Contracts;


interface Logger
{
    public function execute($message);
}