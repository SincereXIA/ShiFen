<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Messagecontroller extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $notifications = $user->notifications;
        return view('home.messageCenter', compact('user', 'notifications'));
    }
}
