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
       $post = $request->input('post');
       $user = Auth::user()->id;
       $request->validate([
        'post' => 'required|min:1|max:150',
       ]);
       Post::create([ //ポストモデルを呼び出す
        'post' => $post,
        //user_idを追加
        'user_id' => $user,
    ]);
       return redirect('/top');
    }

    public function index(){
        $following = Auth::user()->following()->pluck('followed_id');
        //dd($following);
        $list = Post::orderBy('created_at','desc')->with('user')->whereIn('user_id',$following)->orWhere('user_id',Auth::user()->id)->get();
        return view('posts.index',['list'=>$list]);
    }

    public function update(Request $request){//投稿を更新する記述
        $user_id = Auth::id();
        $id = $request->input('id');
        $post = $request->input('upPost');
        Post::where('id',$id)->update(['post' => $post]);
        $request->validate([
            'post' => 'min:1|max:150',
        ]);
        return redirect('/top');
    }

    public function delete($id)//投稿を削除する記述
    {
        $user_id = Auth::id();
        Post::where('id',$id)->delete();
        return redirect('/top');
    }
    

}
