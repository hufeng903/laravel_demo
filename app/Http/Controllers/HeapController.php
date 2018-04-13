<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SplMaxHeap;
use SplMinHeap;

class HeapController extends Controller
{
    /**
     * 实现堆排序，从大到小，从小到大
     * 如果插入的是数组，第一个值开始比较，第一值一样，比较下一个值
     * 类似于字符比较，从前往后比较，前一个相同，比较下一个
     */
    public function draw()
    {
        $h = new SplMaxHeap();

        $h->insert([9, 11]);
//        $h->insert([0, 1]);
//        $h->insert([1, 2]);
//        $h->insert([1, 3]);
//        $h->insert([1, 4]);
//        $h->insert([1, 5]);
//        $h->insert([3, 6]);
//        $h->insert([2, 7]);
//        $h->insert([3, 8]);
        $h->insert([5, 9]);
        $h->insert([9, 10]);

//        $h->insert(22);
//        $h->insert(1);
//        $h->insert(12);
//        $h->insert(4);

        dd($h, $h->current(), $h->top());

        for ($h->top(); $h->valid(); $h->next()) {
            list($parentId, $myId) = $h->current();
            echo "$myId ($parentId)\n";
        }
    }
}
