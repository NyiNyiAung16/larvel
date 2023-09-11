<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    //    $user1 = User::factory()->create([
    //     'name'=>'Nyi Nyi'
    //    ]);
    //    $user2 = User::factory()->create([
    //     'name'=>'Mg Mg'
    //    ]);

    //    $category1 = Category::factory()->create([
    //     'name'=>'Frontend',
    //     'slug'=>'frontend'
    //    ]);

    //    $category2 = Category::factory()->create([
    //     'name'=>'Backend',
    //     'slug'=>'backend'
    //    ]);

    //    Blog::factory(4)->create([
    //     'user_id'=>$user1->id,
    //     'category_id'=>$category1->id
    //    ]);

    //    Blog::factory(2)->create([
    //     'user_id'=>$user2->id,
    //     'category_id'=>$category2->id
    //    ]);

        Blog::factory(50)
        ->has(Comment::factory()->count(4))
        ->create([]);
        

       

    }
}
