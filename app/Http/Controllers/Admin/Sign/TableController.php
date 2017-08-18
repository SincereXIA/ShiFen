<?php

namespace App\Http\Controllers\Admin\Sign;

use App\Group;
use App\Http\Controllers\UserController;
use App\SignEvent;
use App\SignLog;
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
        $users = $group->users;
        return view('sign.table.create', compact('group', 'users'));
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
                }
            }
            SignLog::create($signLog);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
