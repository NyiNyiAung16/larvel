<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Http\Request;

class subscribeController extends Controller
{
    public function subscribe(Blog $blog){
        if($blog->isSubscribed()){
            $blog->subscribedUsers()->detach(auth()->id());
            return back()->with('success','Unsubscribe is successful');
        }else{
            $blog->subscribedUsers()->attach(auth()->id());
            return back()->with('success','Subscribe is successful');
        }
    }
}
