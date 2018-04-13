<?php
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2018/4/13
 * Time: 17:27
 */

namespace App\Services;


class Bar
{
    private $bim;

    public function __construct(Bim $bim)
    {
        $this->bim = $bim;
    }

    public function doSomething()
    {
        $this->bim->doSomething();
        echo __METHOD__, '|';
    }
}