<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {

        return view('index', [
            "page" => "Home",
            "title" => "Home",
            "posts" => Post::with('category')->latest()->filter(request('search'))->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('post', [
            "page" => "Home",
            "title" => "Single Post",
            "post" => $post->load('category')
        ]);
    }
}
