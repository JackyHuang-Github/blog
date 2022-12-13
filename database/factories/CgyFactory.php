<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cgy>
 */
class CgyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            // 'subject' => '主題 ' . rand(1, 1000), 
            'subject' => $this->faker->realText(15), 
            'enabled' => $this->faker->randomElement([true, false]), 
            'enabled_at' => Carbon::now()->addDays(rand(1, 20)),
            'pic' => $this->faker->imageUrl($width = 640, $height = 480)
        ];
    }
}
