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
            $cleanData = request()->validate([
                'email' => ['required',Rule::exists('subscribe_new_blogs','email')]
            ]);
            User::find(auth()->id())->update(['is_subscribe'=> false]);
            SubscribeNewBlog::where('email',$cleanData)->delete();
            return back()->with('success','Unsubscribe is successful.');
        }else{
            $cleanData = request()->validate([
                'email' => ['required',Rule::unique('subscribe_new_blogs','email')]
            ]);
            SubscribeNewBlog::create($cleanData);
            User::find(auth()->id())->update(['is_subscribe'=> true]);
            return back()->with('success','Subscribe is now successfully.');
        }  
        
    }
}
