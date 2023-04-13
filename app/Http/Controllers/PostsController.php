<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    public function tweet(Request $request)
    {
       $post = $request->input('newPost');
       Post::create(['post' => $post]);
       return redirect('/top');
    }
}
