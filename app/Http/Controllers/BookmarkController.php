<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookmarkController extends Controller
{
    public function store($postId) {
        $user = \Auth::user();
        if (!$user->is_bookmark($postId)) {
            $user->bookmark_posts()->attach($postId);
        }
        return back()->with('message', 'ブックマークしました');
    }//

    public function destroy($postId) {
        $user = \Auth::user();
        if ($user->is_bookmark($postId)) {
            $user->bookmark_posts()->detach($postId);
        }
        return back()->with('message', 'ブックマーク解除しました');
    }//
}
