<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    

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

    public function update(Request $request){//投稿を更新する記述
        $id = $request->input('id');
        $post = $request->input('upPost');
        Post::where('id',$id)->update(['post' => $post]);
        return redirect('/top');
    }

    public function delete($id)//投稿を削除する記述
    {
        Post::where('id',$id)->delete();
        return redirect('/top');
    }
}
