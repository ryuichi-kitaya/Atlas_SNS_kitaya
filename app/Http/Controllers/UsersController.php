<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request){ //ユーザーを表示させるための記述
        $user = Auth::user()->id;
        $user = $request->input('username');
        return view('users.search');
    }
}
