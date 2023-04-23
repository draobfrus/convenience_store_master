<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\MstStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Pagination\Paginator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 検索対応
        $search = $request->search;
        $query = Post::search($search);
        $posts = $query->orderBy('created_at', 'desc')->paginate(12);

        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stores = MstStore::all();
        return view('post.create', compact('stores'));
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
        $post->store_id=$request->store_id;

        if ($request->file('image')){
            //s3アップロード開始
            $image = $request->file('image');
            // バケットの`image`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('image', $image);
            // アップロードした画像のフルパスを取得
            $post->image = Storage::disk('s3')->url($path);
        }

        $post->save();

        // 二重送信対策
        $request->session()->regenerateToken();
        return redirect()->route('post.index')->with('message', '投稿しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $this->authorize('view', $post);
        $stores = MstStore::all();
        return view('post.edit', compact('post', 'stores'));
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
        $this->authorize('update', $post);
        $inputs = $request->validate([
            'title'=>'required|max:255',
            'body'=>'required|max:1000',
            'image'=>'image|max:1024'
        ]);

        $post->title=$request->title;
        $post->body=$request->body;
        $post->user_id=auth()->user()->id;
        $post->store_id=$request->store_id;

        if ($request->file('image')){
            //s3アップロード開始
            $image = $request->file('image');
            // バケットの`image`フォルダへアップロード
            $path = Storage::disk('s3')->putFile('image', $image);
            // アップロードした画像のフルパスを取得
            $post->image = Storage::disk('s3')->url($path);
        }

        $post->save();

        return redirect()->route('post.show', compact('post'))->with('message', '更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        return redirect()->route('post.index')->with('message', '削除しました');
    }

    public function bookmark_posts()
    {
        // ログインユーザーがブックマークした投稿を$postsに代入
        $posts = \Auth::user()->bookmark_posts()->orderBy('created_at', 'desc')->paginate(12);
        return view('post.bookmarks', compact('posts'));
    }

    public function my_posts()
    {
        // ログインユーザーが作成した投稿を$postsに代入
        $posts = \Auth::user()->posts()->orderBy('created_at', 'desc')->paginate(12);
        return view('post.myposts', compact('posts'));
    }
}
