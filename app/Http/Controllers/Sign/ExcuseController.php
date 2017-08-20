<?php

namespace App\Http\Controllers\Sign;

use App\SignExcuse;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ExcuseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::findOrFail(Auth::id());
        $checkings = $user->SignExcuses()->where('status', 'checking')->get();
        $refuses = $user->SignExcuses()->where('status', 'refuse')->get();
        $passes = $user->SignExcuses()->where('status', 'ok')->get();
        return view('sign.excuse.index', compact('checkings', 'refuses', 'passes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auth = Auth::user();
        return view('sign.excuse.create', compact('auth'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $excuse = new SignExcuse();
        $excuse::create([
            'user_id' => User::where('student_id', '=', $request->student_id)->firstOrFail()->id,
            'start_at' => Carbon::createFromFormat('Y-m-d\TH:i', $request->start_time)->toDateTimeString(),
            'end_at' => Carbon::createFromFormat('Y-m-d\TH:i', $request->end_time)->toDateTimeString(),
            'reason' => $request->reason,
        ]);
        \Session::flash('flash_info', '请假条已经提交，等待审核');
        return redirect()->route('sign-excuse.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $excuse = SignExcuse::findOrFail($id);
        return view('sign.excuse.show', compact('excuse'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $excuse = SignExcuse::findOrFail($id);
        return view('sign.excuse.edit', compact('excuse'));
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
        $excuse = SignExcuse::findOrFail($id);
        $excuse->reason = $request->reason;
        $excuse->start_at = Carbon::createFromFormat('Y-m-d\TH:i', $request->start_at)->toDateTimeString();
        $excuse->end_at = Carbon::createFromFormat('Y-m-d\TH:i', $request->end_at)->toDateTimeString();
        $excuse->update();
        \Session::flash('flash_info', '请假条修改成功');
        return redirect()->route('sign-excuse.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SignExcuse::destroy($id);
        \Session::flash('flash_info', '请假条已删除');
        return redirect()->route('sign-excuse.index');
    }
}
