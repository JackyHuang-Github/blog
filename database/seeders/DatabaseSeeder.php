<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // $this->call(CgySeeder::class);
        // $this->call(TagSeeder::class);
        // $this->call(ArticleSeeder::class);
        // DB::Statement('SET FOREIGN_KEY_CHECKS=1;');

        // $this->call(ArticleSeeder::class);

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \App\Models\User::truncate();
        \App\Models\User::factory(10)->create();
        \App\Models\Post::truncate();
        \App\Models\Post::factory(10)->create();        
        $this->call(CgySeeder::class);
        $this->call(TagSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(ArticleTagSeeder::class);
        DB::Statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
