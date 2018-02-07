<?php
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2017/8/16
 * Time: 14:59
 */

namespace App\Observe;


class UserObserve
{
    public function creating($model)
    {
        $model->creator_id = 100;
    }
}