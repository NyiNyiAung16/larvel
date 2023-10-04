<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\SubscribeNewBlog;
use App\Models\User;
use Illuminate\Validation\Rule;

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

    public function subscribeNewBlogs(){
        if(auth()->user()->is_subscribe){
            User::find(auth()->id())->update(['is_subscribe'=> false]);
            SubscribeNewBlog::where('email',request('email'))->delete();
        }else{
            User::find(auth()->id())->update(['is_subscribe'=> true]);
            $cleanData = request()->validate([
                'email' => ['required',Rule::unique('subscribe_new_blogs','email')]
            ]);
            SubscribeNewBlog::create($cleanData);
        }  
        return back();
    }
}
