<?php

namespace App\Http\Controllers;

use App\SignExcuse;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * 获取用户管理的所有用户组
     *
     * @return array
     */
    public function allAdminAtGroups($id)
    {
        //获取用户具有管理权限的用户组
        $allAdminAtGroups = [];
        foreach (User::findOrFail($id)->adminGroups as $adminGroup) {
            $allAdminAtGroups[$adminGroup->id] = $adminGroup->adminAtGroups;
        }

        //返回二维数组 键名：管理组id 键值：被管理组管理的用户组array
        return $allAdminAtGroups;
    }

    /**
     * 判断用户是否处于请假状态
     *
     * @param $user_id
     * @return bool
     */
    public function isLeave($user_id)
    {
        if (count(\DB::select(
                'select * from `sign_excuses` where user_id =' . (string)$user_id . ' AND UNIX_TIMESTAMP(end_at) > UNIX_TIMESTAMP() AND UNIX_TIMESTAMP(start_at) < UNIX_TIMESTAMP()')) > 0) {
            return true;
        } else
            return false;
    }

    /**
     * 用户还没过期的请假条
     * @param $user_id
     * @return array
     */
    public function getExcuses($user_id)
    {
        $excuses = [];
        if ($this->isLeave($user_id)) {
            foreach (\DB::select('select * from `sign_excuses` where user_id = ' . (string)$user_id . ' AND UNIX_TIMESTAMP(end_at) > UNIX_TIMESTAMP()  AND UNIX_TIMESTAMP(start_at) < UNIX_TIMESTAMP()') as $dbExcuse) {
                $excuses[] = SignExcuse::findOrFail($dbExcuse->id);
            }
        }
        return $excuses;
    }
}
