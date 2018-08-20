<?php

namespace App\Http\Controllers;

use App\Services\Fibonacci;
use App\Services\ScandirFileIterator;

class IteratorController extends Controller
{
    /**
     * 斐波那契数列数列
     */
    public function fibonacci()
    {
        $seq = new Fibonacci;
        $i = 0;

        foreach ($seq as $f) {
            echo "$f ";
            if ($i++ === 15) break;
        }
    }

    /**
     * 查看文件夹指定中指定后缀文件
     */
    public function scandir()
    {
//        foreach (new ScandirFileIterator('E:\me') as $item) {
//            echo $item . PHP_EOL;
//        }

        foreach (new ScandirFileIterator('E:\me\\') as $item) {
            echo $item. '<br>';
        }
    }
}
