<?php

namespace Database\Factories;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    
    protected $model = Posts::class;
    public function definition()
    {
        return [
                'title' => $this->faker->title(),
                'body' => $this->faker->paragraph(),
                'user_id' => '1',
                'created_at' => now(),
            ];
        
    }
}