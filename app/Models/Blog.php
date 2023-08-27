<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query,$filter){
     
        $query->when($filter['search'] ?? null, function ($query) use($filter)
        {
            $query->where(function ($query) use($filter) {
                $query->where('title','Like','%'.$filter['search'].'%')
                    ->orWhere('intro','Like','%'.$filter['search'].'%');
            });
        });

        $query->when($filter['category'] ?? null, function ($query) use($filter)
        {
            $query->whereHas('category', function ($catQuery) use($filter) {
                $catQuery->whereSlug($filter['category']);
            });
        });

        $query->when($filter['author'] ?? null, function ($query) use($filter)
        {
            $query->whereHas('author', function ($autQuery) use($filter) {
                $autQuery->whereName($filter['author']);
            });
        });
    } 
}
