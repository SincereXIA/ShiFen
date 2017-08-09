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
        $messagesOnBoard = MessageBoard::latest()->get();
        return view('messageBoard.index', compact('messagesOnBoard'));
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
        //
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
