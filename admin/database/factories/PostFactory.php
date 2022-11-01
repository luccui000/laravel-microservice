<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_ids = DB::table('users')->pluck('id')->toArray();

        $title = $this->faker->sentence(2);
        $slug = Str::slug($title);
        $published = [Post::DRAFT, Post::PUBLISHED, Post::TRASHED];

        return [
            'title' => $title,
            'slug' => $slug,
            'body' => $this->faker->paragraph(),
            'is_new' => random_int(0, 1),
            'is_hot' => random_int(0, 1),
            'published' => $published[array_rand($published)],
            'user_id' => $user_ids[array_rand($user_ids)],
        ];
    }
}
