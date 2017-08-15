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
        $absentTimes = $auth->signLogs()->where('status', '=', 'absent')->count();
        $offTimes = $auth->signLogs()->where('status', '=', 'off')->count();
        $lateTimes = $auth->signLogs()->where('status', '=', 'late')->count();
        $attendTimes = $auth->signLogs()->where('status', '=', 'attend')->count();
        return view('home', compact(
            'absentTimes',
            'offTimes',
            'lateTimes',
            'attendTimes'
        ));
    }
}
