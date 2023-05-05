<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request){ 
        $keyword = $request ->input('keyword');
        $query = Post::query();
        if(!empty($keyword)){
            $query->where('username', 'LIKE', "%{$keyword}%");
        }
        return view('users.search');
    }
}
