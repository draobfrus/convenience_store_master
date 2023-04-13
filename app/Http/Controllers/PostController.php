<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
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
    public function create()
    {
        return view('post.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $inputs = $request->validate([
            'title'=>'required|max:255',
            'body'=>'required|max:1000',
            'image'=>'image|max:1024'
        ]);
        $post=new Post();
        $post->title=$request->title;
        $post->body=$request->body;
        $post->user_id=auth()->user()->id;
        if (request('image')){
          // 画像ファイル名を作成、$nameに代入
          $original = request()->file('image')->getClientOriginalName();
          $name = date('Ymd_His').'_'.$original;
          // $nameの名前で画像ファイルを指定した場所へ保存
          request()->file('image')->move('storage/images', $name);
          // $nameの名前で画像ファイル名をデータベースへ保存
          $post->image = $name;
        }
        $post->save();
        return redirect()->route('post.create')->with('message', '投稿しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
