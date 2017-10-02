<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeChatController extends Controller
{
    public function serve()
    {

        \Log::info('request arrived.');
        $wechat = app('wechat');
        $wechat->server->setMessageHandler(function ($message) {

            if ($message->Event == "subscribe") {
                return "欢迎关注拾纷！";
            }

            $userName = $message->FromUserName;  //发送方帐号（OpenID, 代表用户的唯一标识）
            $createTime = $message->CreateTime;    //消息创建时间（时间戳）
            $messageID = $message->MsgId;       //消息 ID（64位整型）
            $message = "你的账户：" . $userName . "\n" . "当前UNIX时间戳：" . $createTime . "\n" . "消息ID：" . $messageID . "\n";
            $info = "\n拾纷正在开发中，拾纷旨在提供班级互联、通知发布、登记投票、签到请假、资源整合等功能。\n拾纷-时纷-记忆留存\n拾纷是作者的第一个php项目，采用MVC框架敏捷开发，我们仍在学习";
            $homePage = "\n<a href=\"http://www.sumblog.cn\">点击进入拾纷主页</a>";
            return "欢迎关注 拾纷！" . "\n" . $message . $info . $homePage;

        });


        \Log::info('return response.');

        return $wechat->server->serve();
    }
}
