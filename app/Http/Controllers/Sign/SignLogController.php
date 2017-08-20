<?php

namespace App\Http\Controllers\Sign;

use App\SignLog;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignLogController extends Controller
{
    public function index($status)
    {
        $absentSignLogs = SignLog::where('user_id', \Auth::id())->where('status', 'absent')
            ->orderBy('created_at', 'desc')->get();
        $attendSignLogs = SignLog::where('user_id', \Auth::id())->where('status', 'attend')
            ->orderBy('created_at', 'desc')->get();
        $offSignLogs = SignLog::where('user_id', \Auth::id())->where('status', 'off')
            ->orderBy('created_at', 'desc')->get();
        $lateSignLogs = SignLog::where('user_id', \Auth::id())->where('status', 'late')
            ->orderBy('created_at', 'desc')->get();

        return view('sign.log.index', compact('absentSignLogs', 'attendSignLogs', 'offSignLogs', 'lateSignLogs', 'status'));
    }

    public function show($signLog_id)
    {
        $signLog = SignLog::findOrFail($signLog_id);
        $signEvent = $signLog->signEvent;
        return view('sign.log.show', compact('signLog', 'signEvent'));
    }
}
