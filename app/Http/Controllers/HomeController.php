<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

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
        return view('home');
    }

//    public function comment(Request $request)
//    {
//          return back();
////        $coments =new Comment();
////        $coments->news_id=$request->news_id;
////        $coments->comment=$request->comment;
////        $coments->user_id=Auth::user()->id;
////        $coments->save();
////        return back();
//    }
}
