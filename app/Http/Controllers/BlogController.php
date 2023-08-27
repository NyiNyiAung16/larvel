<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;

class BlogController extends Controller
{
    
    function index() {
        return view('blogs.index',[
            'blogs' => Blog::with('category','author','comments')
            ->latest()
            ->filter(request(['search','category','author']))
            ->paginate(6)
        ]);
    }

    function show(Blog $blog) {

        return view('blogs.show',[
            'blog'=> $blog->load('comments','author'),
            'randomBlogs'=>Blog::inRandomOrder()->take(3)->get()->load('category','author')
        ]);
    }
}
