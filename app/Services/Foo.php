<?php
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2018/4/13
 * Time: 17:27
 */

namespace App\Services;


class Foo
{

    private $bar;

    public function __construct(Bar $bar)
    {
        $this->bar = $bar;
    }

    public function doSomething()
    {
        $this->bar->doSomething();
        echo __METHOD__;
    }
}