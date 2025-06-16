<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => mt_rand(1, 10),
            'title' => fake()->sentence(mt_rand(3, 8)),
            'excerpt' => fake()->text(),
            'instructions' => fake()->realText(400),
            'description' => fake()->realText(800),
            'notes' => fake()->realText(),
            'prepare_time' => fake()->randomElement([0, 5, 10, 15, 20, 25, 30]),
            'cooking_time' => fake()->randomElement([15, 30, 45, 60, 75, 90]),
            'servings' => fake()->randomElement([2, 4, 6]),
            'youtube_url' => fake()->randomElement([
                'https://www.youtube.com/watch?v=P6W8kwmwcno',
                'https://www.youtube.com/watch?v=6LDswBUN21o',
                'https://www.youtube.com/watch?v=xniS7kMpW4I',
                'https://www.youtube.com/watch?v=pw14NzfYPa8',
                'https://www.youtube.com/watch?v=BHcyuzXRqLs'
            ]),
            'featured_at' => fake()->randomElement([true, false])? now(): null,
            'is_low_carb' => fake()->randomElement([true, false]),
            'is_high_protein' => fake()->randomElement([true, false]),
            'is_spicy' => fake()->randomElement([true, false]),
            'is_vegetarian' => fake()->randomElement([true, false]),
            'is_vegan' => fake()->randomElement([true, false]),
            'is_pescatarian' => fake()->randomElement([true, false]),
        ];
    }
}
