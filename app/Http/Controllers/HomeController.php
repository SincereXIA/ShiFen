<?php

namespace App\Http\Controllers;

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
}
