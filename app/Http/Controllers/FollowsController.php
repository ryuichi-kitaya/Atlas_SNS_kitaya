<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    //
    public function followlist(){
        return view('follows.followList');
    }
    public function followerlist(){
        return view('follows.followerList');
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
        $request->user()->followed()->detach($user->id);
        return back();
    }
}
