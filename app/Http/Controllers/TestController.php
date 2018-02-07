<?php

namespace App\Http\Controllers;

use App\Contracts\TestContract;
use App\Models\Physical;
use App\Models\PhysicalPosition;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Empty_;
use PRedis;
use Redis;

class TestController extends Controller
{
    public function __construct(TestContract $test)
    {
        $this->test = $test;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //测试服务
//         $test = App::make('test');
//         $test->callMe('TestController');

        $this->test->callMe('test');

        //处理初始化数据
        $question = Question::get(['id','le_1','le_2','le_3','le_4','diagnosis','lab_exam','content'])->toArray();
        dd($question);

        foreach ($question as $k => $v) {
            $content = [];
            if (empty($v['lab_exam'])) {
                if (!empty($v['le_1'])) {
                    $content[] = ['title' => $this->replace_str($v['le_1']),'img' => $v['le_2']];
                }
                if (!empty($v['le_3'])) {
                    $content[] = ['title' => $this->replace_str($v['le_3']),'img' => $v['le_4']];
                }
            } else {
                $content[] = ['title' => $this->replace_str($v['lab_exam']),'img' => null];
            }

            $question[$k]['content'] = ['lab_exam' => $content,'diagnosis' => $this->replace_str($v['diagnosis'])];
            Question::whereId($v['id'])->update(['content' => json_encode($question[$k]['content'])]);
        }


        //处理诊断结果数据
        $result = Question::get(['id','tr_1','tr_2','tr_3','tr_4','tr_result'])->toArray();
        foreach ($result as $key => $v) {
            $field = [];

            if (!empty($v['tr_1'])) {
                $field['desc'][] = ['text' => $this->replace_str($v['tr_1']),'img' => $v['tr_2']];
            }
            if (!empty($v['tr_3'])) {
                $field['desc'][] = ['text' => $this->replace_str($v['tr_3']),'img' => $v['tr_4']];
            }

            if (!isset($field['desc'])) {
                $field['desc'] = [];
            }
            if (!empty($v['tr_result'])) {
                $field['treatment_result'] = $this->replace_str($v['tr_result']);
            } else {
                $field['treatment_result'] = '';
            }

            if (!empty($field)) {
                Question::whereId($v['id'])->update(['field1' => json_encode($field)]);
            }
        }

        dd($result);
    }


    /**
     * 替换字符串
     *
     * @param null $str
     * @return mixed
     */
    private  function replace_str($str = null)
    {
        return str_replace("</b>","</color>",str_replace("<b>","<color=black>",str_replace("\r\n",'<n>',$str)));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
