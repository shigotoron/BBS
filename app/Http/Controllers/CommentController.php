<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth; // 追記
use App\Models\Comment; // 追記

class CommentController extends Controller
{
    /**
     * このアクションを追加
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $post_id = $data['post_id'];

        Comment::create([
            'content' => $data['content'], 
            'post_id' => $post_id, 
            'user_id' => Auth::id(), 
        ]);

        return redirect()->route('post', compact('post_id'));
    }
}
