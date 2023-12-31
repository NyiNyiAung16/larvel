<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'body'=>fake()->paragraph(),
            'slug'=>fake()->slug(),
            'intro'=>fake()->sentence(),
            'reading_time' => fake()->date(),
            'user_id'=>User::factory(),
           'category_id'=>Category::factory()
        ];
    }
}
