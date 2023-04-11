<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function index()
    {
        $values = Post::all();

        $count = Post::count(); // 数字

        $first = Post::findOrFail(1); // インスタンス

        $whereBBB = Post::where('text', '=', 'aaa')->get();

        $queryBuilder = DB::table('posts')->where('text', '=', 'aaa')
        ->select('id', 'text')
        ->get();

        // dd($values, $count, $first, $whereBBB, $queryBuilder);

        return view('posts.post', compact('values'));
    }
}
