<?php
/**
 * Created by PhpStorm.
 * User: hu
 * Date: 2018/3/15
 * Time: 11:53
 */

namespace App\Services;


use Iterator;
use RecursiveIteratorIterator;
use Symfony\Component\Finder\Iterator\FilterIterator;
use Symfony\Component\Finder\Iterator\RecursiveDirectoryIterator;

/**
 * Class ScandirFileIterator
 * @package App\Services
 */
class ScandirFileIterator extends FilterIterator
{
    /**
     * 满足条件的后缀名文件
     * @var array
     */
    protected $ext = [
        'png'
    ];

    /**
     * ScandirFileIterator constructor.
     * @param $path
     */
    public function __construct($path)
    {
        parent::__construct(new RecursiveDirectoryIterator($path, true));
    }

    /**
     * 获取指定后缀文件
     *
     * @return bool
     */
    public function accept()
    {
        // TODO 搜索支持子目录文件夹

        $item = $this->getInnerIterator();

        if ($item->isFile() && in_array(pathinfo($item->getFilename(), PATHINFO_EXTENSION), $this->ext)) {
            return TRUE;
        }
    }
}