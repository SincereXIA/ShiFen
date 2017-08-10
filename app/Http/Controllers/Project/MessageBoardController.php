<?php

namespace App\Http\Controllers\Project;

use App\Http\Requests\CreatMessageOnBoardRequest;
use App\MessageBoard;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MessageBoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messagesOnBoard = MessageBoard::where('comment_id', '=', 0)->latest()->get();
        $commentsOnBoard = MessageBoard::where('comment_id', '>', 0)->get();
        return view('messageBoard.index', compact('messagesOnBoard', 'commentsOnBoard'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreatMessageOnBoardRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatMessageOnBoardRequest $request)
    {
        if (Auth::check() and $request->anonymous != true) {
            if ($request->user_id == Auth::id()) {
                $messageOnBoard = MessageBoard::create($request->all());
            } else {
                abort('403', '身份验证失败');
            }
        } else {
            $messageOnBoard = MessageBoard::create([
                'body' => $request->body,
                'user_id' => null,
                'comment_id' => $request->comment_id,
            ]);
        }

        return redirect()->route('messageBoard.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $messageOnBoard = MessageBoard::findOrFail($id);
        if ($messageOnBoard->user_id == Auth::id()) {
            return view('messageBoard.edit', compact('messageOnBoard', 'id'));
        } else abort('403', '无访问权限,请检查用户登录');
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
        $messageOnBoard = MessageBoard::findOrFail($id);
        if ($messageOnBoard->user_id == Auth::id()) {
            $messageOnBoard->update($request->all());
        } else {
            abort('403', '请检查用户权限');
        }

        return redirect()->route('messageBoard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = MessageBoard::findOrFail($id);
        if ($message->user->id == Auth::id()) {
            $message->delete();
        }
        return redirect()->route('messageBoard.index');

    }

    /**
     * 回复一条message
     * @param $id
     */
    public function reply($id)
    {
        $message = MessageBoard::findOrFail($id);
        return view('messageBoard.reply', compact('message', 'id'));
    }
}
