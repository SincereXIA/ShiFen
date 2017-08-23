<?php

namespace App\Http\Controllers\Admin\Sign;

use App\Group;
use App\Http\Controllers\UserController;
use App\SignAppeal;
use App\SignLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppealController extends Controller
{
    /**
     * 获取某个组内待审核的所有申诉
     *
     * @param $group_id
     * @return array
     */
    public function getAppealsInGroups($group_id)
    {
        $signAppeals = [];
        $users = Group::findOrFail($group_id)->users()->orderBy('id')->get();
        foreach ($users as $user) {
            if ($user->signAppeals()->where('status', 'checking')->count() > 0)
                foreach ($user->signAppeals()->where('status', 'checking')->get() as $signAppeal) {
                    $signAppeals[] = $signAppeal;
                }
        }
        return $signAppeals;
    }

    /**
     * 展示所有待审核的申诉
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $controller = new UserController();
        foreach ($allAdminAtGroups = $controller->allAdminAtGroups(\Auth::id()) as $adminAtGroups) {
            foreach ($adminAtGroups as $controlledGroup) {
                $groupAppeals[$controlledGroup->id] = $this->getAppealsInGroups($controlledGroup->id);
            }
        }
        $adminGroups = \Auth::user()->adminGroups;
        return view('sign.Appeal.admin.index', compact('adminGroups', 'allAdminAtGroups', 'groupAppeals'));
    }

    /**
     * 通过一条申诉
     *
     * @param Request $request
     * @internal param $excuse_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function pass(Request $request)
    {
        $appeal = SignAppeal::findOrFail($request->appeal_id);
        $appeal->status = 'ok';
        $appeal->censor_id = \Auth::id();
        $signLog = $appeal->signLog;
        $signLog->status = $request->pass_status ? $request->pass_status : 'attend';
        $signLog->update();
        $appeal->update();
        \Session::flash('flash_info', '已批准请假条');
        return redirect()->route('sign-appeal.adminIndex');
    }

    /**
     * 查看（审核）申诉
     * @param $signLog_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @internal param $excuse_id
     */
    public function adminShow($signLog_id)
    {
        $signAppeal = SignLog::findOrFail($signLog_id)->signAppeal;
        return view('sign.appeal.admin.show', compact('signAppeal'));
    }

    /**
     * 拒绝一条申诉
     *
     * @param $signLog_id
     * @return \Illuminate\Http\RedirectResponse
     * @internal param $excuse_id
     */
    public function refuse($signLog_id)
    {
        $signAppeal = SignLog::findOrFail($signLog_id)->signAppeal;
        $signAppeal->status = 'refuse';
        $signAppeal->censor_id = \Auth::id();
        $signAppeal->update();
        \Session::flash('flash_info', '已拒绝申诉');
        return redirect()->route('sign-appeal.adminIndex');
    }
}