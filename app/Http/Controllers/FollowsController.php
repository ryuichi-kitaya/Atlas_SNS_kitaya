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
    
    //フォローする
    public function follow(User $user)
    {
        $follower = auth()->user();
        $is_following = $follower->isFollowing($user->id);
        if(!$is_following){
            $follower->follow($user->id);
            return back();
        }  
    }

    //フォロー解除する
    public function unfollow(User $user)
    {
        $follower = auth()->user();
        $is_following = $follower->isFollowing($user->id);
        if($is_following){
        $follower->unfollow($user->id);
        return redirect();
        }
    }
}
