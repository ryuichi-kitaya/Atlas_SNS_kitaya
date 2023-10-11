<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Post;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        $user = Auth::user();
        return view('users.profile',compact('user'));
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

    public function edit(Request $request){
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|min:2|max:12',
            'mail' => 'required|string|email|min:5|max:40|unique:users',
            'password' => 'alpha_num|string|min:8|max:20|confirmed',
            'bio' => 'string|max:150',
            'images' => 'nullable|file|mimes:jpg,png,bmp,gif,svg',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        } else {
            $user_data = [
                'username' => $request->input('username'),
                'mail' => $request->input('mail'),
                'password' => bcrypt($request->input('password')),
                'bio' => $request->input('bio'),
            ];
            if ($request->hasFile('image')) {
                //送信された内容にイメージを持っていたら・・・
                $image = $request->file('image')->getClientOriginalName();
                //先ほど送信された画像の名前・・・
                $request->file('image')->storeAs('public/images', $image);
                //画像の格納先を記述している
                $user_data['images'] = $image;
                //プロフィール更新したユーザーが持っているデータ
            }
            $user->update($user_data);
            return redirect('users.profile');
        }
    }

}
