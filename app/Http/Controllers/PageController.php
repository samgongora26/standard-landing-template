<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;


class PageController extends Controller
{
    //-------TOURS--------
    public function tours(Request $requests){
        //Load all the tours
        $posts = Post::orderBy('id', 'desc')
            ->where('category_id', '=', "1")
            ->get();
            // ->paginate(6)
        return Inertia::render('Admin/Tours', [
            'posts' => $posts
        ]);
    }

    public function tour(Post $post){
        //Show a tour
        return Inertia::render('Admin/Show', [
            'post' => $post,
            'goBack' => 'tours'
        ]); 
    }

    //-------SERVICIOS--------
    public function servicies(){
        //Load all the servicies
        $servicies_list = Post::orderBy('id', 'desc')
            ->where('category_id', '=', "2")
            ->get();
            // ->paginate(6);
        // dd($servicies_list);
        return Inertia::render('Admin/Servicies', [
            'posts' => $servicies_list
        ]);
    }

    public function service(Post $post){
        //Show a service
        return Inertia::render('Admin/Show', [
            'post' => $post,
            'goBack' => 'servicies'
        ]); 
    }

    public function CreateServicies(Post $post){
        Post::factory()->count(13)->create();
    }
}
