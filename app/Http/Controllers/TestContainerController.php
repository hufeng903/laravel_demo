<?php

namespace App\Http\Controllers;

use App\Services\Bar;
use App\Services\Bim;
use App\Services\Foo;
use App\Services\TestContainer;
use Illuminate\Http\Request;

class TestContainerController extends Controller
{
    //

    public function index()
    {
        $c = new TestContainer();

        //使用魔法方法__set
        //把Bim()对象 赋值给bim属性
        $c->bim = function () {
            return new Bim();
        };

        //使用魔法方法__set
        //把Bar()对象 赋值给bar属性
        $c->bar = function ($c) {
            return new Bar($c->bim);
        };

        //使用魔法方法__set
        //把Foo()对象 赋值给foo属性
        $c->foo = function ($c) {
            return new Foo($c->bar);
        };

        /**
         * $c 内容
         *
         * TestContainer {#273 ▼
        +s: array:3 [▼
        "bim" => Closure {#274 ▶}
        "bar" => Closure {#280 ▶}
        "foo" => Closure {#281 ▶}
        ]
        }
         */

        // 从容器中取得Foo
        $foo = $c->foo;

        /**
         * $foo 内容
         *
         *Foo {#282 ▼
        -bar: Bar {#283 ▼
        -bim: Bim {#284}
        }
        }
         */


        $foo->doSomething();
    }
}
