<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SplMinHeap;

class HeapController extends Controller
{
    public function draw()
    {
        $h = new SplMinHeap();

        $h->insert([9, 11]);
        $h->insert([0, 1]);
        $h->insert([1, 2]);
        $h->insert([1, 3]);
        $h->insert([1, 4]);
        $h->insert([1, 5]);
        $h->insert([3, 6]);
        $h->insert([2, 7]);
        $h->insert([3, 8]);
        $h->insert([5, 9]);
        $h->insert([9, 10]);

        dd($h);

        for ($h->top(); $h->valid(); $h->next()) {
            list($parentId, $myId) = $h->current();
            echo "$myId ($parentId)\n";
        }
    }
}
