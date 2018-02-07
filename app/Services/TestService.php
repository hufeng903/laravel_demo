<?php
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2017/9/18
 * Time: 16:30
 */

namespace App\Services;


use App\Contracts\TestContract;

class TestService implements TestContract
{
    public function callMe($controller)
    {
        dd('Call Me From TestServiceProvider In '.$controller);
    }
}