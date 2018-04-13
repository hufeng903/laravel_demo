<?php
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2018/4/13
 * Time: 17:25
 */

namespace App\Services;


class TestContainer
{
    public $s = array();

    /**
     * @param $k string 属性名
     * @param $c mixed 赋予属于的值
     */
    function __set($k, $c)
    {
        $this->s[$k] = $c;
    }

    /**
     * @param $k string 属性名
     * @return mixed
     */
    function __get($k)
    {
        return $this->s[$k]($this);
    }
}