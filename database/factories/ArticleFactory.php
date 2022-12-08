<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Article;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        Article::truncate();

        return [
            'subject' => $this->faker->realText(20), 
            'content' => 'a',
            'enabled' => $this->faker->randomElement([true, false]), 
            'pic' => $this->faker->imageUrl($width=640, $height=480),
            'cgy_id' => rand(1, 10),
            'enabled_at' => Carbon::now()->addDays(rand(1, 20))
        ];
    }
}
