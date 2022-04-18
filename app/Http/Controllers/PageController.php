<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //-------TOURS--------
    public function tours(){
        return view('tours',[
            // 'posts' => Post::with('user')->latest()->paginate()
        ]);
    }

    public function tour(Post $post){
        // $allPosts = Post::with('user')->count();
        // dd($allPosts);
        return view('tour' , [
            // 'post' => $post, 'allPosts' => $allPosts
        ]);
    }

    //-------SERVICIOS--------
    public function servicies(){
        return view('servicies',[
            // 'posts' => Post::with('user')->latest()->paginate()
        ]);
    }

    public function service(Post $post){
        // $allPosts = Post::with('user')->count();
        // dd($allPosts);
        return view('service' , [
            // 'post' => $post, 'allPosts' => $allPosts
        ]);
    }
}
