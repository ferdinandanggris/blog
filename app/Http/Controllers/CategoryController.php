<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view("categories.index", [
            "page" => "Category",
            "title" => "Category",
            "categories" => Category::with('post')->get()
        ]);
    }

    public function show(Category $category)
    {
        return view("categories.category", [
            "page" => "Category",
            "title" => $category->name,
            // "posts" => Post::where('category_id', '=', $category->id)->latest()->paginate(6)->withQueryString()
            "posts" => Post::where('category_id', '=', $category->id)->latest()->paginate(6)
        ]);
    }
}
