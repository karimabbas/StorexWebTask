<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text,
            'image'=> $this->faker->image,
            'description' => $this->faker->sentence(15),
            'category_id' => Category::inRandomOrder()->first()->id,
            'rate' => rand(2, 1),

        ];
    }
}
