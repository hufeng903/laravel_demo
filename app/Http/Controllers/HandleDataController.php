<?php

namespace App\Http\Controllers;

use App\Models\Physical;
use App\Models\PhysicalExam;
use App\Models\PhysicalExamNormal;
use App\Models\PhysicalPosition;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HandleDataController extends Controller
{
    //处理体格检查数据格式，每个病例最后检查项后面加三栏空记录
    public function insertThreeNull()
    {
        $physical = PhysicalPosition::whereBetween('ch_id',[1,100])->get()->toArray();
        $ids = DB::select("select SUBSTRING_INDEX(GROUP_CONCAT(id),',',-1) AS 'id'
                           FROM
                                `test_physical_position`
                            WHERE
                                ch_id IN (
                                    SELECT
                                        id
                                    FROM
                                        `test_new_case_history`
                                )
                            GROUP BY
                                ch_id");

        $ids_arr = [];
        foreach ($ids as $id) {
            array_push($ids_arr,(int)$id->id);
        }

        $insert = [];
        foreach ($physical as $item) {
            $insert[] = ['ch_id' => $item['ch_id'],'detail' => trim($item['detail']),'part' => $item['part']];
            if (in_array($item['id'],$ids_arr)) {
                $insert[] = ['ch_id' => $item['ch_id'],'detail' => null,'part' => null];
                $insert[] = ['ch_id' => $item['ch_id'],'detail' => null,'part' => null];
                $insert[] = ['ch_id' => $item['ch_id'],'detail' => null,'part' => null];
            }
        }

        DB::table('physical')->insert($insert);

        echo '操作成功';
    }

    //删除体格检查信息中，开始非中文字符
    public function deleteStartChar()
    {
        $physical = PhysicalPosition::get(['id','detail',DB::raw("left(detail,1) as str")])->toArray();

        foreach ($physical as $item) {

            //去掉空格
//            PhysicalPosition::whereId($item['id'])->update(['detail' => trim($item['detail'])]);

            //
            if (!preg_match('/^[\x{4e00}-\x{9fa5}]+$/u', $item['str'])) {
                PhysicalPosition::whereId($item['id'])->update(['bak' => str_replace($item['str'],'',$item['detail'])]);
            }
        }

        dd($physical);
    }

    //根据处理的体格检查数据
    //有异常值的使用异常值，无异常值的使用默认正常值，
    //数据存入病历体格检查表
    public function insertPhysical()
    {
        set_time_limit(0);
        ini_set('memory_limit','2048M');

        //获取默认的体格检查数据
        $default_physical = PhysicalExamNormal::where('type',1)->whereNotNull('value')->get(['slug','value']);

        //获取处理的数据
        $import = Physical::whereNotNull('detail')->chunk(100,function ($physical) use ($default_physical){

            $import = $physical->groupBy('ch_id')->toArray();

            $insert = [];
            foreach ($import as $keys => $item) {
                $default = $default_physical->transform(function($item, $key) use ($keys) {
                    return  [
                        'history_id'=> $keys,
                        'slug' => $item['slug'],
                        'value' => $item['value'],
                        'is_score' => null
                    ];
                })->keyBy('slug')->toArray();

                foreach ($item as $k => $v) {
                    if (!empty($v['slug'])) {
                        $default[$v['slug']]['value'] = $v['detail'];
                        $default[$v['slug']]['is_score'] = 1;
                    }
                }

                $insert = array_merge($insert,array_values($default));
            }

            ob_flush();
            flush();
            PhysicalExam::insert($insert);
            echo '处理体格检查完成100个<br/>';
        });

//        $insert = [];

    }

    //随机产生体格检查分数
    public function randomScore()
    {
    }

    //处理插入辅助检查数据
    public function insertLabExam()
    {
        set_time_limit(0);
        ini_set('memory_limit','2048M');

//        $lab_exams = DB::table('exam')->get();
//
//        $insert = [];
//
//        foreach ($lab_exams as $item) {
//            $insert[] = [
//                'normal_id' => $item->normal_id,
//                'history_id' => $item->ch_id,
//                'value' => $item->result,
//                'is_score' => 1,
//            ];
//        }
//
//        DB::table('lab_exam_abnormal')->insert($insert);
//
//        echo '插入辅助检查成功';
//        flush();

        DB::table('exam')->where('ch_id','<',91)->orderBy('id')->chunk(100,function ($lab_exam) {
            $insert = [];

            foreach ($lab_exam as $item) {
                $insert[] = [
                    'normal_id' => $item->normal_id,
                    'history_id' => $item->ch_id,
                    'value' => $item->result,
                    'is_score' => 1,
                ];
            }

            ob_flush();
            flush();
            echo '插入辅助检查成功100条<br/>';
            return DB::table('lab_exam_abnormal')->insert($insert);

//            echo '插入辅助检查成功100条<br/>';
        });
    }

    //处理插入诊断疾病数据
    public function insertDiagnosis()
    {
        set_time_limit(0);
        ini_set('memory_limit','1024M');


        DB::table('diagnosis_content')->orderBy('id')->chunk(100,function($diagnosis){
            $insert = [];
            foreach ($diagnosis as $item) {
                $insert[] = [
                    'entity_id' => $item->ch_id,
                    'relation_id' => $item->disease_id,
                    'type' => 2,
                ];
            }

            echo '插入100条记录成功<br>';
            ob_flush();
            flush();
            return DB::table('new_case_history_maps')->insert($insert);
        });
    }
}
