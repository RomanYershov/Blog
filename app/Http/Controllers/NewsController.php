<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\News;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::with('user')->with('comments.user')->paginate(1);

        return view("home")->with(compact("news", "comments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("news.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $news=new News();
        $news->text=$request->text;
        $name=Storage::put("images", $request->file("image"));
        $url=Storage::url($name);
        $news->image=$url;
        $news->user_id=Auth::user()->id;
        $news->save();
        return redirect("/home")->with(compact("news"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function comment(Request $request)
    {

        $comment =new Comment();
        $comment->news_id=$request->news_id;
        $comment->comment=$request->comment;
        $comment->user_id=Auth::user()->id;
        $comment->save();
        return back();
    }
}
