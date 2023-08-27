<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog){
        $cleanData = request()->validate([
            'body' => 'required'
        ]);

        $cleanData['blog_id'] = $blog->id;
        $cleanData['user_id'] = auth()->id();
        
        Comment::create($cleanData);
        return back();
    }
}
