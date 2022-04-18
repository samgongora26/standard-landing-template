<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;


class PageController extends Controller
{
    //-------TOURS--------
    public function tours(Request $requests){
        return Inertia::render('Admin/Tours', [
            'posts' => Post::latest()
                ->where('category_id', '=', "1")
                ->get()
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
