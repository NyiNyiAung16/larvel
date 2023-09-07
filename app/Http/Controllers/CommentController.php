<?php

namespace App\Http\Controllers;

use App\Mail\NotifyUser;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CommentController extends Controller
{
    public function store(Blog $blog){
        $cleanData = request()->validate([
            'body' => 'required'
        ]);
        
        $cleanData['user_id'] = auth()->id();
        $comment = $blog->comments()->create($cleanData);
        $blog->subscribedUsers->filter(function ($user){
            return $user->id !== auth()->id();
        })->each(function ($user) use($comment) {
            Mail::to($user->email)->queue(new NotifyUser($comment,$user));
        });
        return back();
    }

    public function delete(Comment $comment){
        $comment->where('id',$comment->id)->delete();
        return back();
    }

    public function edit(Comment $comment){
        return view('comments.edit',[
            'comment'=> $comment
        ]);
    }

    public function update(Comment $comment){
        $commentBody = request('body');
        $c = $comment->where('id',$comment->id)->get();
        $c[0]->body = $commentBody;
        $c[0]->update();
        return redirect()->route('blog.show',[$comment->blog]);
    }
}
