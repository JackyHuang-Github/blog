<?php

namespace Database\Seeders;

use Carbon\Carbon;
use faker\Factory;
use App\Models\Cgy;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CgySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cgy::truncate();
        $faker = Factory::create('zh_TW');

        for($i = 0; $i < 100; $i++) {
            // Cgy::create(['subject' => '主題', 'enabled' => true]);
            Cgy::create([
                // 'subject' => '主題 ' . rand(1, 1000), 
                'subject' => $faker->sentence, 
                'enabled' => $faker->randomElement([true, false]), 
                'enabled_at' => Carbon::now()->addDays(rand(1, 20))
                // 'enabled_at' => Carbon::createFromFormat('Y-m-d', $faker->date)
            ]);
        }
    }
}
