<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Mail\SendMail;
use Carbon;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    /**
     * 发送邮件
     *
     * @return bool
     */
    public function send()
    {
        //如果这里有多个账号
        //Mail::to(['45678@qq.com','123456@qq.com'...])->send(new SendMail());

        //可以添加抄送cc, 隐藏抄送bcc(也可以同时抄送，密送给多个邮箱，格式同to里面地址)
        //Mail::to(['address' => '789@qq.com'])->cc(['address' => '456@qq.com'])->bcc(['address' => '124@qq.com'])->send(new SendMail());

        //即使发送
//        Mail::to(['address' => '851427094@qq.com'])->send(new SendMail());

        //添加队列
//        Mail::to(['address' => '851427094@qq.com'])->queue($message);


        Mail::to(['address' => '851427094@qq.com'])->send(new SendMail());

        return response()->json(['message' => 'success']);
    }
}
