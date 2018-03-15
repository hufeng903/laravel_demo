<?php

namespace App\Http\Controllers;

use App\Services\Fibonacci;
use App\Services\ScandirFileIterator;

class IteratorController extends Controller
{
    public function fibonacci()
    {
        $seq = new Fibonacci;

        dd($seq);

        $i = 0;
        foreach ($seq as $f) {
            echo "$f ";
            if ($i++ === 15) break;
        }
    }

    public function scandir()
    {
        foreach (new ScandirFileIterator('E:\qycache') as $item) {
            echo $item . PHP_EOL;
        }
    }
}
