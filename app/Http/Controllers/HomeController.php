<?php

namespace App\Http\Controllers;

use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();
        if ($auth->userInfo == null) {
            return $this->finishUserInfo();
        }
        if (count($auth->adminGroups) > 0) {
            $adminRight = true;
        } else {
            $adminRight = false;
        }
        \Session::flash('flash_info', '欢迎您，感谢您参与拾纷的内部测试，若您在测试中发现了任何问题，或是有好的建议，请与作者联系');
        return view('home.index', compact('auth', 'adminRight'))->withErrors(['拾纷目前处于建构状态！']);
    }

    public function signLog()
    {
        $auth = Auth::user();
        $absentTimes = $auth->signLogs()->where('status', '=', 'absent')->count();
        $offTimes = $auth->signLogs()->where('status', '=', 'off')->count();
        $lateTimes = $auth->signLogs()->where('status', '=', 'late')->count();
        $attendTimes = $auth->signLogs()->where('status', '=', 'attend')->count();
        return view('home.signLog', compact(
            'absentTimes',
            'offTimes',
            'lateTimes',
            'attendTimes'
        ));
    }

    /**
     * 用户初始化用户信息
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finishUserInfo()
    {
        if (\Gate::denies('firstUserInfo')) {
            abort('403');
        }
        $user = \Auth::user();
        return view('auth.userInfo.finishUserInfo', compact('user'));
    }

    /**
     * 初始化用户信息保存
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function StoreFinishUserInfo(Request $request)
    {
        $this->validate($request, [
            'gender' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|digits_between:11,11',
            'password' => 'required|min:6|max:20',
            'repeat_password' => 'required|same:password'
        ]);
        if (\Gate::denies('firstUserInfo')) {
            abort('403');
        }
        $user = \Auth::user();
        $userInfo = new UserInfo([
            'user_id' => \Auth::id(),
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'real_name' => $request->real_name
        ]);
        $userInfo->save();

        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->update();
        \Session::flash('flash_info', '信息初始化成功');
        return redirect()->route('home');
    }
}
