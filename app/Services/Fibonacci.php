<?php
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2018/3/15
 * Time: 11:49
 */

namespace App\Services;


/**
 * Class Fibonacci
 * @package App\Services
 */
class Fibonacci implements \Iterator
{
    /**
     * @var int
     */
    private $previous = 1;

    /**
     * @var int
     */
    private $current = 0;

    /**
     * @var int
     */
    private $key = 0;

    /**
     * 当前项
     *
     * @return int|mixed
     */
    public function current()
    {
        return $this->current;
    }

    /**
     * 当前键
     *
     * @return int|mixed
     */
    public function key()
    {
        return $this->key;
    }

    /**
     * 下个选项
     */
    public function next()
    {
        // 关键在这里
        // 将当前值保存到  $newprevious
        $newprevious = $this->current;

        // 将上一个值与当前值的和赋给当前值
        $this->current += $this->previous;

        // 前一个当前值赋给上一个值
        $this->previous = $newprevious;
        $this->key++;
    }

    /**
     * 回到开始
     */
    public function rewind()
    {
        $this->previous = 1;
        $this->current = 0;
        $this->key = 0;
    }

    /**
     * 验证合法
     *
     * @return bool
     */
    public function valid()
    {
        return true;
    }
}