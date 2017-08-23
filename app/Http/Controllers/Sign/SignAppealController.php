<?php

namespace App\Http\Controllers\Sign;

use App\Http\Controllers\UserController;
use App\SignAppeal;
use App\SignLog;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SignAppealController extends Controller
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
    public function create($signLog_id)
    {
        $signLog = SignLog::findOrFail($signLog_id);
        if ($signLog->signAppeal != null)
            abort('403', '当申诉已存在时，不能重复提交');
        $user = $signLog->user;
        return view('sign.appeal.create', compact('signLog', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store($signLog_id, Request $request)
    {
        $appeal = new SignAppeal();
        $appeal::create([
            'reason' => $request->reason,
            'status' => 'checking',
            'log_id' => $request->signLog_id,
            'user_id' => \Auth::id()
        ]);
        \Session::flash('flash_info', '申诉已经提交，等待审核');
        return redirect()->route('signLog.index', SignLog::findOrFail($signLog_id)->status);
    }

    /**
     * Display the specified resource.
     *
     * @param $signAppeal_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show($signAppeal_id)
    {
        $signAppeal = SignAppeal::findOrFail($signAppeal_id);
        return view('sign.appeal.show', compact('signAppeal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $signAppeal_id
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit($signAppeal_id)
    {
        $signAppeal = SignAppeal::findOrFail($signAppeal_id);
        $signLog = $signAppeal->signLog;
        if ($signAppeal->status == 'ok')
            abort('403', '当申诉已通过时，不能进行修改');
        $user = $signLog->user;
        return view('sign.appeal.create', compact('signLog', 'user'));
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
