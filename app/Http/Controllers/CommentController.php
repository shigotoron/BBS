<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();
        $post_id = $data['post_id'];

        Comment::insertGetID([
            'content' => $data['content'], 
            'post_id' => $post_id, 
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('post', compact('post_id'));
    }

    /**
     * このアクションを追加
     */
    public function edit($comment_id)
    {
        $comment = Comment::where('id', $comment_id)
                          ->where('user_id', Auth::id())
                          ->first();

        return view('edit_comment', compact('comment'));
    }
}
