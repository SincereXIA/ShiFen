<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProgressLog;

class ShowIndexController extends Controller
{
    public function index(){
        return view('showIndex.index');
    }
    public function about(){
        return view('showIndex.about');
    }
    public function process(){
        $processLogs = ProgressLog::orderBy('created_at')->get();
        return view('showIndex.processLog',compact('processLogs'));
    }
    public function message(){
        return view('showIndex.message');
    }
}
