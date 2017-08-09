<?php

namespace App\Http\Controllers\Project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ProgressLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class ProgressController extends Controller
{
    /**
     * 展示progressLog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $progressLogs = ProgressLog::orderBy('created_at')->get();
        Auth::id()==1 ? $editRight = true:$editRight = false;
        return view('showIndex.progressLog',compact('progressLogs','editRight'));
    }

    /**
     * get -> 创建新的processLog
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void 创建视图
     */
    public function create(){
        $id = Auth::id();
        if ($id == 1)
            return view('progress.create');
        else return abort('403','无管理权限，请登录');
    }

    /**
     * post -> 存储新的processLog到数据库
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function store(Request $request){
        $id = Auth::id();
        if($id == 1){
            $processLog = ProgressLog::create([
                'user_id' => $id,
                'body' => $request->body,
            ]);
        }
        else return abort('403', '非法用户权限');
        return redirect()->route('progress.index');
    }

    /**
     * 编辑一条progressLog
     * @param int $id 序号
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id){
        $progressLog = ProgressLog::findOrFail($id);
        return view('progress.edit',compact('progressLog'));
    }

    /**
     * process 更新
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id){

        $processLog = ProgressLog::findOrFail($id);
        $processLog->update([
            'body' => $request->body,
        ]);

        return redirect()->route('progress.index');;
    }
}
