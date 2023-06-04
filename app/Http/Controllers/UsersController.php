<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request){
        $keyword = $request ->input('keyword');//変数を定義
        if(!empty($keyword)){
            $users =User::where('username', 'LIKE', "%{$keyword}%")->get();//ユーザー検索であいまい検索
        }else{
        $users = User::get();
        }
        return view('users.search',compact('keyword','users'));//定義した変数をbladeに移行する記述
    }

    public function searchView(){
        $users = User::get();
        return view('users.search',compact('users'));
    }
    //画像をpublicディレクトリに保存する記述
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
}
