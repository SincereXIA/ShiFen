<?php

namespace App\Http\Controllers\Admin\Sign;

use App\Group;
use App\Http\Controllers\UserController;
use App\SignExcuse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use TCG\Voyager\Models\User;

class ExcuseController extends Controller
{
    /**
     * 获取某个组内待审核的所有请假条
     *
     * @param $group_id
     * @return array
     */
    public function getExcusesInGroups($group_id)
    {
        $signExcuses = [];
        $users = Group::findOrFail($group_id)->users()->orderBy('id')->get();
        foreach ($users as $user) {
            if ($user->signExcuses()->where('status', 'checking')->count() > 0)
                foreach ($user->signExcuses as $signExcuse) {
                    $signExcuses[] = $signExcuse;
                }
        }
        return $signExcuses;
    }

    /**
     * 展示所有待审核的请假条
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $controller = new UserController();
        foreach ($allAdminAtGroups = $controller->allAdminAtGroups(\Auth::id()) as $adminAtGroups) {
            foreach ($adminAtGroups as $controlledGroup) {
                $groupExcuses[$controlledGroup->id] = $this->getExcusesInGroups($controlledGroup->id);
            }
        }
        $adminGroups = \Auth::user()->adminGroups;
        return view('sign.excuse.admin.index', compact('adminGroups', 'allAdminAtGroups', 'groupExcuses'));
    }

    /**
     * 通过一条请假条
     *
     * @param Request $request
     * @internal param $excuse_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pass(Request $request)
    {
        $excuse = SignExcuse::findOrFail($request->excuse_id);
        $excuse->status = 'ok';
        $excuse->censor_id = \Auth::id();
        $excuse->update();
        return redirect()->route('sign-excuse.adminIndex');
    }

    /**
     * 拒绝一条请假条
     *
     * @param $excuse_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function refuse($excuse_id)
    {
        $excuse = Group::findOrFail($excuse_id);
        $excuse->status = 'refuse';
        $excuse->censor_id = \Auth::id();
        $excuse->update();
        return redirect()->route('sign-excuse.adminIndex');
    }

    /**
     * 查看（审核）一条请假条
     * @param $excuse_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($excuse_id)
    {
        $excuse = SignExcuse::findOrFail($excuse_id);
        return view('sign.excuse.admin.show', compact('excuse'));
    }

}
