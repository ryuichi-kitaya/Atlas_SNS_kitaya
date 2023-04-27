<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    public function tweet(Request $request)
    {
       //ログインしているユーザーのID
       $post = $request->input('newPost');
       $user = Auth::user()->id;
       Post::create([
        'post' => $post,
        //user_idを追加
        'user_id' => $user,
    ]);
       return redirect('/top');
    }

    public function index(){
        $list = Post::get();
        return view('posts.index',['list'=>$list]);
    }
}
