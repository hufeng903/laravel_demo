<?php
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2018/4/13
 * Time: 16:59
 */

namespace App\Services;


use App\Contracts\TestContract;

class TestContractOne implements TestContract
{
    public function callMe()
    {
        dd('Call Me From TestContractOne');
    }
}