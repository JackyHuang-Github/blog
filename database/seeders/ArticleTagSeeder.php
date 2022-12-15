<?php

namespace Database\Seeders;

use App\Models\ArticleTag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ArticleTag::truncate();

        ArticleTag::factory()->times(100)->create();
    }
}
