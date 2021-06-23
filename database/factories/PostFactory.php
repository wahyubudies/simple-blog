<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image'     => $this->faker->imageUrl($width = 250, $height = 250),
            'title'     => $this->faker->sentence(),
            'content'   => $this->faker->paragraph()
        ];
    }
}
