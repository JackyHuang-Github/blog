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
            'content' => $this->faker->realText,
            'enabled_at' => Carbon::now()->addDays(rand(0, 20)),
            'sort' => rand(0, 20);
            'enabled' => $this->faker->randomElement([true, false]), 
            'pic' => $this->faker->imageUrl,
            'cgy_id' => rand(1, 20)
        ];
    }
}
