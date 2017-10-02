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
        return view('home.index', compact('auth', 'adminRight'));
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

    /**
     * 展示用户自己的个人信息
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showUserInfo()
    {
        $user = Auth::user();
        $userInfo = $user->userInfo;
        return view('auth.userInfo.show', compact('user', 'userInfo'));
    }
}
