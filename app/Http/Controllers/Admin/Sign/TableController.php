<?php

namespace App\Http\Controllers\Admin\Sign;

use App\Group;
use App\Http\Controllers\UserController;
use App\Notifications\SignEventNotification;
use App\SignEvent;
use App\SignLog;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //获取用户具有管理权限的用户组
        $allAdminAtGroups = [];
        foreach ($adminGroups = \Auth::user()->adminGroups as $adminGroup) {
            $allAdminAtGroups[$adminGroup->id] = $adminGroup->adminAtGroups;
        }
        /*
         * $adminGroups 用户有管理权限的用户组
         * $allAdminAtGroups 每个有管理权限的用户组所管理的组 键名为管理权限的组ID 二维数组！
         */
        return view('sign.table.index', compact('adminGroups', 'allAdminAtGroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $group_id
     * @return \Illuminate\Http\Response
     */
    public function create($group_id)
    {
        $group = Group::findOrFail($group_id);
        $users = $group->users()->orderBy('student_id')->get();
        return view('sign.table.create', compact('group', 'users'));
    }

    public function createFromWifi($group_id)
    {
        $group = Group::findOrFail($group_id);
        return view('sign.table.createFromWifi', compact('group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //新建签到事项
        $signEvent = SignEvent::create([
            'event_name' => $request->event_name != null ? $request->event_name : '未命名',
            'group_id' => $request->group_id,
            'censor_id' => $request->censor_id,
            'event_time' => $request->event_time,
        ]);
        $signEventId = $signEvent->id;

        $userController = new UserController();

        //为每个用户写入签到结果
        $group = Group::findOrFail($request->group_id);
        $users = $group->users;
        foreach ($users as $user) {
            $signLog = [];
            $signLog['user_id'] = $user->id;
            $signLog['event_id'] = $signEventId;

            if ($request->has($user->id)) {
                $signLog['status'] = 'attend';
            } else {
                if ($userController->isLeave($user->id)) {
                    $signLog['status'] = 'off';
                    $signLog['excuse_id'] = $userController->getExcuses($user->id)[0]->id;
                } else {
                    $signLog['status'] = 'absent';
                    $messageInformation = array();
                    $messageInformation['title'] = "【系统通知】 $signEvent->event_name 未签到";
                    $messageInformation['body'] = "【系统通知】 $signEvent->event_name 未签到";
                    $messageInformation['level'] = 'urgent';
                    $messageInformation['creator'] = \Auth::id();
                    $messageInformation['time'] = Carbon::now()->timestamp;
                    $user->notify(new SignEventNotification($messageInformation));
                }
            }
            SignLog::create($signLog);
        }
        \Session::flash('flash_info', '签到表成功保存');
        return redirect()->route('sign-table.show', $signEventId);
    }

    public function storeFromWifi(Request $request)
    {
        //获取上传签到表
        $file_path = $request->file('file')->getRealPath();

        if (file_exists($file_path)) {
            $userController = new UserController();
            $absentStudents = [];
            $time = '';

            $fp = fopen($file_path, "r");
            $str = fread($fp, filesize($file_path));//指定读取大小，这里把整个文件内容读取出来
            preg_match_all('/\b\d{11}\b(?=.+✘)/', $str, $absentStudents); //正则匹配被标记为未到的学号
            preg_match('/(?<=［时间］).+/', $str, $time);
            $time = Carbon::createFromFormat('Y-m-d H:i', $time[0])->toDateTimeString();

            //开始录入Log数据
            $signEventId = $this->storeToDB($request->event_name, $request->group_id, $request->censor_id, $time, $absentStudents[0]);
            \Session::flash('flash_info', '签到表成功保存');
            return redirect()->route('sign-table.show', $signEventId);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param $signEvent_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($signEvent_id)
    {
        $signEvent = SignEvent::findOrFail($signEvent_id);
        $signLogs = $signEvent->signLogs()->orderBy('user_id')->get();
        return view('sign.table.show', compact('signEvent', 'signLogs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $signEvent_id
     * @return \Illuminate\Http\Response
     */
    public function edit($signEvent_id)
    {
        $signEvent = SignEvent::findOrFail($signEvent_id);
        if (\Gate::denies('editSignTable', $signEvent))
            abort('403', '只有超级管理员或事件的创建者可以修改签到表');
        $signLogs = $signEvent->signLogs()->orderBy('user_id')->get();
        return view('sign.table.edit', compact('signEvent', 'signLogs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param $signEvent_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, $signEvent_id)
    {
        $signEvent = SignEvent::findOrFail($signEvent_id);
        if (\Gate::denies('editSignTable', $signEvent))
            abort('403', '只有超级管理员或事件的创建者可以修改签到表');

        $signEvent = SignEvent::findOrfail($signEvent_id);
        $signLogs = $signEvent->signLogs()->get();

        foreach ($signLogs as $signLog) {
            if ($request->has($signLog->id)) {
                if ($request[$signLog->id] == '到课')
                    $signLog->status = 'attend';
                elseif ($request[$signLog->id] == '旷课')
                    $signLog->status = 'absent';
                elseif ($request[$signLog->id] == '请假')
                    $signLog->status = 'off';
                elseif ($request[$signLog->id] == '请假')
                    $signLog->status = 'off';
            }
            $signLog->update();
        }

        $signEvent->event_name = $request->event_name;
        $signEvent->update();
        \Session::flash('flash_info', '签到表修改成功');
        return redirect()->route('sign-table.show', $signEvent_id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $signEvent_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy($signEvent_id)
    {
        $group_id = SignEvent::findOrFail($signEvent_id)->group->id;
        $signLogs = SignLog::where('event_id', $signEvent_id)->get();
        foreach ($signLogs as $signLog) {
            $signLog->delete();
        }
        SignEvent::destroy($signEvent_id);
        \Session::flash('flash_info', '签到表已删除');
        return redirect()->route('sign-table.groupShow', $group_id);
    }

    /**
     * 展示组内的所有签到表
     *
     * @param $group_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function group($group_id)
    {
        $group = Group::findOrFail($group_id);
        $signEvents = $group->signEvents;
        return view('sign.table.groupShow', compact('group', 'signEvents'));
    }

    private function storeToDB($event_name, $group_id, $censor_id, $event_time, $absentUsers)
    {
        //新建签到事项
        $signEvent = SignEvent::create([
            'event_name' => $event_name,
            'group_id' => $group_id,
            'censor_id' => $censor_id,
            'event_time' => $event_time,
        ]);
        $signEventId = $signEvent->id;

        $userController = new UserController();

        //为每个用户写入签到结果
        $group = Group::findOrFail($group_id);
        $users = $group->users;
        foreach ($users as $user) {
            $signLog = [];
            $signLog['user_id'] = $user->id;
            $signLog['event_id'] = $signEventId;
            if (!in_array((string)($user->student_id), $absentUsers)) {
                $signLog['status'] = 'attend';
            } else {
                if ($userController->isLeave($user->id)) {
                    $signLog['status'] = 'off';
                    $signLog['excuse_id'] = $userController->getExcuses($user->id)[0]->id;
                } else {
                    $signLog['status'] = 'absent';
                }
            }
            SignLog::create($signLog);
        }
        return $signEventId;
    }
}
