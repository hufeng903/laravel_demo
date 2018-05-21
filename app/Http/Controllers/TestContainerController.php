<?php

namespace App\Http\Controllers;

use App\Contracts\Logger;
use App\Services\Bar;
use App\Services\Bim;
use App\Services\Foo;
use App\Services\ProjectLog;
use App\Services\SystemLogger;
use App\Services\TestContainer;
use App\Services\UserLogger;
use Illuminate\Http\Request;

class TestContainerController extends Controller
{
    //

    public function index()
    {
        dd(app());

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


    public function logger()
    {
        $usr_project_log = new ProjectLog(new UserLogger());

        //记录用户日志
        $usr_project_log->show('用户日志');


        $system_project_log = new ProjectLog(new SystemLogger());

        //记录系统日志
        $system_project_log->show('系统日志');

        return response()->json(['处理成功,返回成功']);
    }


    public function logger_v1()
    {
        //绑定接口到实现
        app()->bind(Logger::class, function() {
            return new UserLogger();
        });

        (new ProjectLog(app()->make(Logger::class)))->show('什么日志');

        return response()->json(['处理成功,返回成功']);
    }
}
