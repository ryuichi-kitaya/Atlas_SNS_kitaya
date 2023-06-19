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
        $users = User::get();
        $posts = Post::query()->whereIn('user_id', Auth::user()->following()->pluck('followed_id'))->latest()->get();
        return view('follows.followList')->with([
            'posts' => $posts,
        ]);
    }
    public function followerlist(){
        $users = User::get();
        $posts = Post::query()->whereIn('user_id', Auth::user()->followed()->pluck('following_id'))->latest()->get();
        return view('follows.followerList')->with([
            'posts' => $posts,
        ]);
    }

    public function image(Request $request, User $user)
    {
        $originalImg = $request->user_icon;
        if($originalImg->isValid()){
            $filePath = $originalImg->store('public');
            $user->image = str_replace('public/','',$filePath);
            $user->save();
            return redirect("/user/{$user->id}")->with('user',$user);
        }
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
