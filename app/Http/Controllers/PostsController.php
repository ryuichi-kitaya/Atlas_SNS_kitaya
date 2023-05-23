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
       Post::create([ //ポストモデルを呼び出す
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
    //フォロー機能  リレーション
    public function followings()
    {
        return $this->belongsToMany(User::class, 'follows', 'following_id', 'followed_id');
    }
    //フォロー解除  リレーション
    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'following_id');
    }
    
    //フォローする
    public function follow(Int $user_id)
    {
        return $this->followers()->attach($user_id);
    }

    //フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->followers()->detach($user_id);
    }

}
