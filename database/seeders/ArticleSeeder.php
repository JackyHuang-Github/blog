<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Article::truncate();
        //$faker = Factory::create('zh_TW');

        // for($i = 0; $i < 100; $i++) {
            // Article::create(['subject' => '主題', 'enabled' => true]);
            // Article::create([
            //     // 'subject' => '主題 ' . rand(1, 1000), 
            //     'subject' => $faker->sentence, 
            //     'enabled' => $faker->randomElement([true, false]), 
            //     'enabled_at' => Carbon::now()->addDays(rand(1, 20))
            //     // 'enabled_at' => Carbon::createFromFormat('Y-m-d', $faker->date)
            // ]);
        // }
        \App\Models\Article::factory()->times(100)->create();
    }
}
