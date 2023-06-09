<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class FollowsController extends Controller
{
    //
    public function followlist(){
        //ログインしているユーザー（私）
        $user = Auth::user();
        //私がフォローしている人たち
        $followings = $user->following;
        $users = User::get();
        $posts = Post::query()->whereIn('user_id', Auth::user()->following()->pluck('followed_id'))->latest()->get();
        return view('follows.followList')->with([
            'posts' => $posts,
            //followingsを使いますと記述
            'followings' => $followings
        ]);
    }
    public function followerlist(){
        $user = Auth::user();
        $followers = $user->followed;
        $users = User::get();
        $posts = Post::query()->whereIn('user_id', Auth::user()->followed()->pluck('following_id'))->latest()->get();
        return view('follows.followerList')->with([
            'posts' => $posts,
            'followers' => $followers
        ]);
    }
    //他ユーザーのプロフィールに遷移
    public function otherprofile($id){
        $user = User::where('id', $id)->first();
        $posts = Post::where('user_id', $id)->get();
        return view('users.otherprofile',compact('user','posts'));
    }

    public function follow(Request $request, User $user)
    {   //user()=今現在ログインしている人=自分
        //following()=自分がフォローしている人を取得
        //attach=フォローさせる
        $request->user()->following()->attach($user->id);
        return back();
    }

    //フォロー解除する
    public function unfollow(Request $request,User $user)
    {
        //
        $request->user()->following()->detach($user->id);
        return back();
    }
}
