<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FollowsController extends Controller
{
    //
    public function follow(){
        return view('follows.followList');
    }
    public function followed(){
        return view('follows.followerList');
    }
}
