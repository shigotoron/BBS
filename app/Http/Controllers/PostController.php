<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all(); // フォームで送信されたデータをすべてとってきます

        $post_id = Post::insertGetId([
            'user_id' => Auth::id(), // ログイン中のユーザーの ID を格納します
            'title' => $data['title'], // 入力された文字列を格納します
            'content' => $data['content'], // 入力された文字列を格納します
        ]);

        return redirect()->route('post', compact('post_id'));
    }

    public function post($post_id)
    {
        $post = Post::where('id', $post_id)->first();
        if (is_null($post)) {
            abort(404);
        }
        return view('post', compact('post'));
    }

    /**
     * このアクションを追加
     */
    public function show()
    {
        $posts = Post::where('user_id', Auth::id())->latest('updated_at')->get();
        return view('dashboard', compact('posts'));
    }
}
